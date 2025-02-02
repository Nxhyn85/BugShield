<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaderboardController extends Controller
{

    public function index()
    {   

        $users = User::orderBy('rank')->orderBy('points', 'desc')->get();
        return view('leaderboard.leaderboard', compact('users'));
    }
}
