<?php

namespace App\Http\Controllers;

use App\Models\Programs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use League\CommonMark\CommonMarkConverter;

class ProgramsController extends Controller
{
    public function index()
    {
        $programs = Programs::all();

        return view('admin.programs.programs', compact('programs'));
    }

    public function indexForUsers()
    {
        $programs = Programs::all();
        return view('programs', compact('programs'));
    }

    public function viewProgramForUsers($uid)
    {
        $program = Programs::where('uid', $uid)->firstOrFail();

        $htmlContent = $program->description;
        $converter = new CommonMarkConverter();
        $htmlOutput = $converter->convert($htmlContent);

        return view('view_program', compact('program', 'htmlOutput'));
    }

    public function addProgram()
    {
        return view('admin.programs.add_program');
    }


    public function storeProgram(Request $request)
    {
        $data = $request->validate([
            'programName' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ]);

        // return $data;
        $program = new Programs();
        $program->uid = Str::uuid()->toString();
        $program->programName = htmlspecialchars($data['programName']);
        $program->description = htmlspecialchars($data['description']);
        $program->save();
        return redirect('/admin/programs')->with('success', 'Program Added Successfully');
    }

    public function editProgram($uid)
    {
        $program = Programs::where('uid', $uid)->firstOrFail();
        return view('admin.programs.edit_program', compact('program'));
    }

    public function updateProgram(Request $request, $uid)
    {
        $data = $request->validate([
            'programName' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ]);
        $program = Programs::where('uid', $uid)->firstOrFail();
        $program->programName = htmlspecialchars($data['programName']);
        $program->description = htmlspecialchars($data['description']);
        $program->save();
        return redirect('/admin/programs')->with('success', 'Program Updated Successfully');
    }

    public function deleteProgram($uid)
    {
        $program = Programs::where('uid', $uid)->firstOrFail();
        $program->delete();
        return redirect('/admin/programs')->with('success', 'Program Deleted Successfully');
    }
}
