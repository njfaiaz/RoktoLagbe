<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DonateHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrHistoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $donateHistories = DonateHistory::where('user_id', $user->id)->latest('donation_date')->get();
        return view('frontend.history.index', compact('donateHistories'));
    }
}
