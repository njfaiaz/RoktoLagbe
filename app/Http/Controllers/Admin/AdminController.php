<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $profile = Profile::count();
        $activeUserCount = User::where('status', 1)->count();
        $inactiveUserCount = User::where('status', 2)->count();
        return view('admin.dashboard', compact('totalUsers', 'activeUserCount', 'inactiveUserCount', 'profile'));
    }
}
