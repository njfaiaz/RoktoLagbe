<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProfileRequest;
use App\Models\Blood;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class FrProfileController extends Controller
{
    public function index()
    {
        return view('frontend.profile.index');
    }

    public function edit()
    {
        return view('frontend.profile.edit');
    }
}
