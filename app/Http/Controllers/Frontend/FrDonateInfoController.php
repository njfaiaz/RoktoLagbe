<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DonateHistoryRequest;
use App\Models\Blood;
use App\Models\DonateHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrDonateInfoController extends Controller
{
    public function nextDonate()
    {

        $user = auth()->user();
        $bloods    = Blood::all();
        $profilePreviousDate = optional($user->profiles)->previous_donation_date;
        $latestDonationDate = optional($user->donatehistories()->latest('donation_date')->first())->donation_date;
        $baseDate = null;

        if ($profilePreviousDate && $latestDonationDate) {
            $baseDate = Carbon::parse($profilePreviousDate)->gt(Carbon::parse($latestDonationDate))
                ? $profilePreviousDate
                : $latestDonationDate;
        } elseif ($profilePreviousDate) {
            $baseDate = $profilePreviousDate;
        } elseif ($latestDonationDate) {
            $baseDate = $latestDonationDate;
        }

        $allowedDate = Carbon::parse($baseDate)->addDays(120);

        if (now()->lt($allowedDate)) {
            return response()->view('404', [], 404);  // Show 404 if user is not eligible
        }

        return view('frontend.donate.edit', compact('bloods'));
    }



    public function store(DonateHistoryRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        DonateHistory::create($data);

        $notification = array(
            'message' => 'Donation history saved successfully!',
            'alert' => 'success'
        );
        return redirect()->route('user.dashboard')->with($notification);
    }
}
