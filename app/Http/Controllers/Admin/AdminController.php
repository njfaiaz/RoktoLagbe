<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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


    // User Status & Count --------------------------------------------------------------------
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


    // Blood Group Name --------------------------------------------------------------------
    public function bloodGroupStats()
    {
        $data = Profile::join('bloods', 'profiles.blood_id', '=', 'bloods.id')
            ->select('bloods.blood_name', DB::raw('count(*) as total'))
            ->groupBy('bloods.blood_name')
            ->orderBy('bloods.blood_name')
            ->get();

        return response()->json([
            'labels' => $data->pluck('blood_name'),
            'data' => $data->pluck('total')
        ]);
    }


    // Address With Blood Name -------------------------------------------------------------------------
    public function userLocationStats()
    {
        $data = DB::table('users')
            ->join('addresses', 'users.id', '=', 'addresses.user_id')
            ->join('districts', 'addresses.district_id', '=', 'districts.id')
            ->join('profiles', 'users.id', '=', 'profiles.user_id')
            ->join('bloods', 'profiles.blood_id', '=', 'bloods.id')
            ->select('districts.district_name as district', 'bloods.blood_name as blood_group', DB::raw('count(*) as total'))
            ->groupBy('districts.district_name', 'bloods.blood_name')
            ->get();

        $districts = $data->pluck('district')->unique()->values();
        $bloodGroups = $data->pluck('blood_group')->unique()->values();

        $datasets = $bloodGroups->map(function ($group) use ($districts, $data) {
            return [
                'label' => $group,
                'data' => $districts->map(function ($district) use ($group, $data) {
                    $match = $data->firstWhere(fn($row) => $row->district === $district && $row->blood_group === $group);
                    return $match ? $match->total : 0;
                }),
                'backgroundColor' => '#' . substr(md5($group), 0, 6)
            ];
        });

        $totalUsers = $data->sum('total');

        return response()->json([
            'labels' => $districts,
            'datasets' => $datasets,
            'totalUsers' => $totalUsers
        ]);
    }


    // topDonors Name List --------------------------------------------------------------------
    public function topDonors()
    {
        $data = DB::table('donate_histories')
            ->join('users', 'donate_histories.user_id', '=', 'users.id')
            ->select('users.username', DB::raw('COUNT(donate_histories.id) as total_donations'))
            ->groupBy('users.username')
            ->orderByDesc('total_donations')
            ->limit(10)
            ->get();

        return response()->json([
            'labels' => $data->pluck('username'),
            'data' => $data->pluck('total_donations'),
        ]);
    }

    // Most Donate Blood Name List --------------------------------------------------------------------
    public function bloodDonationStats()
    {
        $data = DB::table('donate_histories')
            ->join('bloods', 'donate_histories.blood_id', '=', 'bloods.id')
            ->select(
                'bloods.blood_name',
                DB::raw('COUNT(*) as total_donations'),
            )
            ->groupBy('bloods.blood_name')
            ->orderByDesc('total_donations')
            ->get();

        return response()->json([
            'labels' => $data->pluck('blood_name'),
            'donations' => $data->pluck('total_donations'),
        ]);
    }
}
