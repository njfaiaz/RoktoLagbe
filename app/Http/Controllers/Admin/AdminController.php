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
        $userStats = User::selectRaw("
            COUNT(*) as total,
            COUNT(CASE WHEN status = 1 THEN 1 END) as active,
            COUNT(CASE WHEN status = 2 THEN 1 END) as inactive
        ")->first();

        $profileCount = Profile::count();

        return view('admin.dashboard', [
            'totalUsers' => $userStats->total,
            'activeUserCount' => $userStats->active,
            'inactiveUserCount' => $userStats->inactive,
            'profile' => $profileCount
        ]);
    }
}
