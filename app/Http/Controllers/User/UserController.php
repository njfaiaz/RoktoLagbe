<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
        $user = User::where('username', $username)->firstOrFail();

        return view('frontend.profile.index', compact('user'));
    }
}
