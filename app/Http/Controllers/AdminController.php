<?php

namespace App\Http\Controllers;

use App\Helpers\ReportHelper;
use App\Models\Admin;
use App\Models\Reports;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Http\Requests\Auth\LoginRequest;
use League\CommonMark\CommonMarkConverter;
use Illuminate\Support\Str;

class AdminController extends Controller
{

    public function index()
    {
        // Fetch the current authenticated user
        $current_user = Auth::user();
        
        // Fetch all users (assuming you need them for the dashboard)
        $users = User::all();
        
        // Define severity mapping
        $severityMapping = [
            'low' => 1,
            'medium' => 2,
            'high' => 3,
            'critical' => 4,
        ];
        
        // Fetch reports and sort by severity using the mapping
        $reports = Reports::orderBy(function ($query) use ($severityMapping) {
            // Use the actual report instance within the orderBy closure
            $query->select('severity'); // Select the field to be used for ordering
            $query->orderByRaw("FIELD(severity, 'critical', 'high', 'medium', 'low')");
        })->paginate(10);
        
        // Pass data to the view
        return view('admin.dashboard', compact('current_user', 'users', 'reports'));
    }



    public function create()
    {
        return view('admin.login');
    }

    public function store(LoginRequest $request)
    {
        $request->authenticate('admin');

        $request->session()->regenerate();

        return redirect()->intended('admin/dashboard');
    }


    public function profile()
    {
        $user = Auth::guard('admin')->user();
        return view('admin.profile.edit', compact('user'));
    }

    // Update Admin Profile
    public function updateProfile(Request $request)
    {

        $user = Admin::where('uid', Auth::guard('admin')->user()->uid)->firstOrFail();

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->uid),
            ],
        ]);

        // Update user data
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->save();

        return redirect()->back()->with('status', 'profile-updated');

    }

    // Update Admin Password
    public function updatePassword(Request $request)
    {

        $user = Admin::where('uid', Auth::guard('admin')->user()->uid)->firstOrFail();

        $data = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $user->update([
            'password' => Hash::make($data['password']),
        ]);;
        $user->save();

        return back()->with('status', 'password-updated');
    }

    public function showReport($uid)
    {
        $report = Reports::where('uid', $uid)->firstOrFail();
        $htmlContent = $report->description;
        $converter = new CommonMarkConverter();
        $htmlOutput = $converter->convert($htmlContent);
        
        $report->severityColor = ReportHelper::getSeverityColor($report->severity) ?? '';
        $report->statusColor = ReportHelper::getStatusColor($report->status) ?? '';

        return view('admin.report.show', compact('report', 'htmlOutput'));
    }

    public function updateReport(Request $request, $uid)
    {
        $report = Reports::where('uid', $uid)->firstOrFail();
        $user = User::where('uid', $report->user_uid)->firstOrFail();

        $data = $request->validate([
            'status' => ['required', 'string', 'max:100', 'in:accepted,not applicable,informative'],
            'severity' => ['string', 'max:100'],
            'points' => ['required', 'int'],
        ]);

        // return $request->all();
        $report->status = $data['status'];
        if(isset($data['severity'])){
            if($data['severity'] == 'low' || $data['severity'] == 'medium' || $data['severity'] == 'high' || $data['severity'] == 'critical'){
                $report->severity = $data['severity'];
            }
        }
        $report->points = $data['points'];
        $report->save();

        $user->points = $user->points + $data['points'];
        $user->save();

        $this->recalculateRanks();

        $user->save();
        return redirect()->back();
    }

    // Admins Functions
    // Retriving All admins
    public function admins()
    {
        $admins = Admin::all();
        // return dd($users);
        return view('admin.admins.admins', compact('admins'));

    }

    // Adding Admin
    public function addAdmin()
    {
        return view('admin.admins.add');
    }

    // Store Admin
    public function storeAdmin(Request $request)
    {
        // return $request->all();
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Password::defaults()],
        ]);

        
        $admin = new Admin();
        $admin->uid = Str::uuid()->toString();
        $admin->name = htmlspecialchars($data['name']);
        $admin->username = htmlspecialchars($data['username']);
        $admin->email = htmlspecialchars($data['email']);
        $admin->password = Hash::make($data['password']);
        $admin->save();

        return redirect('/admin/admins')->with('success', 'Admin Added Successfully.');
    }


    // Edit Admin
    public function editAdmin($uid)
    {
        $admin = Admin::where('uid', $uid)->firstOrFail();
        return view('admin.admins.edit', compact('admin'));
    }

    // Update Admin
    public function updateAdmin(Request $request, $uid)
    {
        $admin = Admin::where('uid', $uid)->firstOrFail();
        $data = $request->validate([
            'name' => ['string', 'max:255'],
            'username' => ['string', 'max:255', 'unique:users'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
        ]);

        $admin->name = htmlspecialchars($data['name']);
        $admin->username = htmlspecialchars($data['username']);
        $admin->email = htmlspecialchars($data['email']);
        $admin->save();
        return redirect('/admin/admins')->with('success', 'Admin Updated Successfully.');
    }

    // Delete Admins
    public function deleteAdmin($uid)
    {
        $admin = Admin::where('uid', $uid)->firstOrFail();
        $admin->delete();
        return redirect('/admin/admins')->with('success', 'Admin Deleted Successfully.');
    }

    // Retriving All Users
    public function users()
    {
        $users = User::withCount('reports')->get();
        // return dd($users);
        return view('admin.users', compact('users'));

    }

    // admin logout
    public function destroy(Request $request)
    {

        // return "destroy";
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    // edit user
    public function editUser($uid){
        $user = User::where('uid', $uid)->firstOrFail();
        return view('admin.users.edit', compact('user'));
    }

    // update user
    public function updateUser(Request $request, $uid){

        $user = User::where('uid', $uid)->firstOrFail();
        $data = $request->validate([
            'name' => ['string', 'max:255'],
            'username' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255'],
        ]);

        // dd($data);

        $user->name = htmlspecialchars($data['name']);
        $user->username = htmlspecialchars($data['username']);
        $user->email = htmlspecialchars($data['email']);
        $user->save();
        return redirect('/admin/users')->with('success', 'User Updated Successfully.');
    }

    // Delete User
    public function deleteUser($uid){

        $user = User::where('uid', $uid)->firstOrFail();
        $user->delete();
        return redirect('/admin/users')->with('success', 'User Deleted Successfully.');
    }

    // Helper Methods
    protected function recalculateRanks()
    {
        $users = User::orderBy('points', 'desc')->get();
        $rank = 1;

        foreach ($users as $user) {
            $user->rank = $rank++;
            $user->save();
        }
    }
}
