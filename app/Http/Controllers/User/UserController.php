<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blood;
use App\Models\District;
use App\Models\DonateHistory;
use App\Models\Profile;
use App\Models\Union;
use App\Models\Upazila;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

        return view('frontend.profile.show', compact('user', 'totalDonateCount'));
    }

    public function edit($username)
    {
        $user = auth()->user();
        $profile = Profile::with('bloods')
            ->where('user_id', Auth::id())
            ->first();

        $bloods    = Blood::all();
        $districts = District::all();
        $upazilaes = Upazila::all();
        $unions    = Union::all();
        $address = $user->addresses;

        return view('frontend.profile.edit', compact('profile', 'bloods', 'districts', 'unions', 'upazilaes', 'address', 'user'));
    }
}
