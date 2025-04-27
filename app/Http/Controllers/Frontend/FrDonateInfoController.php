<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DonateHistoryRequest;
use App\Models\Blood;
use App\Models\DonateHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrDonateInfoController extends Controller
{
    public function nextDonate()
    {
        $bloods    = Blood::all();
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
        return back()->with($notification);
    }
}
