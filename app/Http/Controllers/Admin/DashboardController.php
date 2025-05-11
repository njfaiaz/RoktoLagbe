<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Enums\UserStatus;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
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
