<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request\StoreProfileRequest;
use App\Models\Blood;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class FrProfileController extends Controller
{
    public function index()
    {
        $users = User::all();
        $bloods = Blood::all();
        return view('frontend.profile.edit', compact('bloods', 'users'));
    }

    public function store(Request $request)
    {
        // return response()->json('$request');
        $profile = Profile::create($request->all());

        // $profile->bloods()->sync($request->get('bloods'));
        // $profile->users()->sync($request->get('users'));
        return redirect()->back();
    }
}
