<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blood;
use App\Models\User;
use Illuminate\Http\Request;

class DonateHistoryController extends Controller
{
    public function index()
    {
        $users = User::with('donateHistory', 'addresses.district', 'addresses.upazila', 'addresses.union')->get();
        $bloods = Blood::all();
        $user = auth()->user();

        // Check if user has addresses and safely access the first address
        $address = $user->addresses ? $user->addresses->first() : null;

        return view('admin.donate.index', compact('users', 'bloods', 'user', 'address'));
    }
}
