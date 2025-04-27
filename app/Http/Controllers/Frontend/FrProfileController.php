<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DonateHistory;
use Illuminate\Support\Facades\Auth;

class FrProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user()->load('profiles', 'profiles.bloods', 'addresses.district', 'addresses.upazila', 'addresses.union');
        $totalDonateCount = DonateHistory::where('user_id', $user->id)->count();
        return view('frontend.profile.index', compact('user', 'totalDonateCount'));
    }
}
