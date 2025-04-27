<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DonateHistory;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $loggedInUserId = auth()->id();

        $users = User::with('profiles', 'profiles.bloods', 'addresses.district', 'addresses.upazila', 'addresses.union')
            ->orderByRaw("id = ? DESC", [$loggedInUserId])
            ->latest()
            ->paginate(20);

        return view('frontend.home', compact('users'));
    }

    public function show($username)
    {
        $user = User::where('username', $username)
            ->with(
                'profiles',
                'profiles.bloods',
                'addresses.district',
                'addresses.upazila',
                'addresses.union',
                'donateHistories',
            )
            ->firstOrFail();
        // return response()->json($user);
        $totalDonateCount = DonateHistory::where('user_id', $user->id)->count();

        return view('frontend.profile.index', compact('user', 'totalDonateCount'));
    }
}
