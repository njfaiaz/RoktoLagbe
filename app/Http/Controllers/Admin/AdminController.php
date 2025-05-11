<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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


    public function userStats()
    {
        $total = User::count();
        $active = User::where('status', UserStatus::ACTIVE->value)->count();
        $inactive = User::where('status', UserStatus::INACTIVE->value)->count();

        return response()->json([
            'labels' => [UserStatus::ACTIVE->title(), UserStatus::INACTIVE->title()],
            'data' => [$active, $inactive],
        ]);
    }

    public function userLocationStats()
    {
        // Users grouped by district
        $data = DB::table('users')
            ->join('addresses', 'users.id', '=', 'addresses.user_id')
            ->join('districts', 'addresses.district_id', '=', 'districts.id')
            ->select('districts.district_name as location', DB::raw('count(*) as total'))
            ->groupBy('districts.district_name')
            ->get();

        return response()->json([
            'labels' => $data->pluck('location'),
            'data' => $data->pluck('total'),
        ]);
    }
}
