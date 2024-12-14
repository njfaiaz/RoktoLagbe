<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Union;
use App\Models\Upazila;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $profile = User::find($id);

        return view('admin.profile.index', compact('profile'));
    }

    public function Edit($username)
    {
        $profile = User::with('profile', 'district', 'upazila', 'union', 'address')->where('username', $username)->firstOrFail();
        $districts = District::all();
        $upazila = Upazila::where('district_id', $profile->district_id)->get();
        $unions = Union::where('upazila_id', $profile->upazila_id)->get();
        return response()->json($profile);
        return view('admin.profile.edit', compact('profile', 'districts', 'upazila', 'unions'));
    }
}
