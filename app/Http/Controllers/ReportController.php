<?php

namespace App\Http\Controllers;

use App\Helpers\ReportHelper;
use App\Models\Programs;
use App\Models\User;
use App\Models\Reports;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use League\CommonMark\CommonMarkConverter;


class ReportController extends Controller
{
    public function index($programUid)
    {
        $program = Programs::where('uid', $programUid)->firstOrFail(); // Assuming 'uid' is the column name
        return view('report.submit_report', ['program' => $program]);
    }

    public function create(Request $request)
    {
        // return $request->all();
        $request->validate([
            'title' => 'required|string|max:255',
            'severity' => 'required|string|in:low,medium,high,critical',
            'description' => 'required',
            'programName' => 'required',
        ]);

        $current_user = auth()->user()->uid;

        $report = new Reports();
        $report->uid = Str::uuid();
        $report->title = htmlentities($request->title);
        $report->severity = htmlentities($request->severity);
        $report->description = htmlentities($request->description);
        $report->user_uid = $current_user;
        $report->program_name = $request->programName;
        $report->save();

        // Update total_reports count for the user
        $user = User::where('uid', $current_user)->first(); // Find the user
        $user->loadCount('reports'); // Load the count of reports using the relationship
            $user->total_reports = $user->reports_count; // Access the loaded count
            $user->save();
        

        return redirect()->route('dashboard')->with('success', 'Report Submitted Successfully.');
    }

    public function show($uid)
    {
        $report = Reports::where('uid', $uid)->firstOrFail();
        if($report->user_uid !== auth()->user()->uid) {
            abort(403);
        }
        $htmlContent = $report->description;
        $converter = new CommonMarkConverter();
        $htmlOutput = $converter->convert($htmlContent);
        
        $report->severityColor = ReportHelper::getSeverityColor($report->severity) ?? '';
        $report->statusColor = ReportHelper::getStatusColor($report->status) ?? '';

        return view('report.show', compact('report', 'htmlOutput'));
    }
}
