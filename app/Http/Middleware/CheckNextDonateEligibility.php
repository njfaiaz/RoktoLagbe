<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CheckNextDonateEligibility
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if (!$user) {
            return response()->view('404', [], 404);
        }

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

        if (!$baseDate) {
            return $next($request);
        }

        $allowedDate = Carbon::parse($baseDate)->addDays(120);

        if (now()->lt($allowedDate)) {
            return response()->view('404', [], 404);
        }

        return $next($request);
    }
}
