<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reports;
use App\Helpers\ReportHelper;
use App\Models\User;

class UserHomeController extends Controller
{
    public function index()
    {
        $current_user = Auth::user();
        
        $reports = Reports::where('user_uid', $current_user->uid)->paginate(10);
        $user = User::where('uid', $current_user->uid)->firstOrFail();
        $rank = $user->rank;
        // return $rank;

        // return $report->severityColor;
        return view('dashboard', compact('reports', 'current_user', 'rank'));
    }
}
