<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestAddress;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Models\Blood;
use App\Models\District;
use App\Models\DonateHistory;
use App\Models\Profile;
use App\Models\Union;
use App\Models\Upazila;
use App\Models\User;
use App\Services\ProfileService;
use Illuminate\Support\Facades\Auth;

class FrProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user()->load('profiles', 'profiles.bloods', 'addresses.district', 'addresses.upazila', 'addresses.union');
        $totalDonateCount = DonateHistory::where('user_id', $user->id)->count();
        return view('frontend.profile.index', compact('user', 'totalDonateCount'));
    }

    public function Edit($username)
    {

        $profile = Profile::with('bloods')
            ->where('user_id', Auth::id())
            ->first();
        $user = auth()->user();
        $bloods    = Blood::all();
        $districts = District::all();
        $upazilaes = Upazila::all();
        $unions    = Union::all();
        $address = $user->addresses;

        return view('frontend.profile.edit', compact('profile', 'bloods', 'districts', 'unions', 'upazilaes', 'address', 'user'));
    }

    public function NameChange(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();
        $notification = array(
            'message' => ' User Profile Update Successfully',
            'alert' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function addressUpdate(RequestAddress $request)
    {
        $userId = auth()->id();

        Address::updateOrCreate(
            ['user_id' => $userId],
            $request->validated()
        );

        $notification = array(
            'message' => ' Address updated successfully!',
            'alert' => 'success'
        );
        return back()->with($notification);
    }


    public function update(UpdateProfileRequest $request, ProfileService $profileService)
    {
        $userId = auth()->id();

        $image = $request->hasFile('image') ? $request->file('image') : null;

        $message = $profileService->updateOrCreateProfile(
            $request->validated(),
            $userId,
            $image
        );

        $notification = array(
            'message' => ' Profile updated successfully!',
            'alert' => 'success'
        );
        return back()->with($notification);
    }
}
