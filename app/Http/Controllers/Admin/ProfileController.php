<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Blood;
use App\Models\District;
use App\Models\Profile;
use App\Models\Union;
use App\Models\Upazila;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Unique;

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

        $profile = User::with('profile', 'address')->where('username', $username)->firstOrFail();
        $districts = District::all();
        // $upazila = Upazila::where('district_id', $profile->district_id)->get();
        // $unions = Union::where('upazila_id', $profile->upazila_id)->get();
        // return response()->json($profile);
        return view('admin.profile.edit', compact('profile'));
    }

    public function updateProfile(Request $request)
    {
        // return response()->json($request);

        $request->validate([
            'profile_image' => 'image|mimes:png,jpg,jpeg'
        ]);
        $profile_id = $request->id;
        $profile = User::findOrFail($profile_id);


        if ($request->file('profile_image')) {
            $image = $request->file('profile_image');
            $name_gen = time() . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(180, 180)->save(public_path('images/profile/' . $name_gen));

            if ($profile->profile_image && file_exists(public_path($profile->profile_image))) {
                File::delete(public_path($profile->profile_image));
            }

            $profile->profile_image = 'images/profile/' . $name_gen;

            $profile->Update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            return Redirect()->back();
        } else {

            $profile->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            return redirect()->back();
        }
    }

    public function updateProfileInfo(Request $request)
    {
        // return response()->json($request);
        $request->validate([
            'phone_number' => 'digits:11',
            'all_donation_time' => 'integer',
            'previous_donation_date' => 'date',
            'gender' => 'nullable|in:Male,Female'
        ]);

        $profile_id = $request->id;

        Profile::findOrFail($profile_id)->update([
            'user_id' => Auth()->id(),
            'gender' => $request->gender,
            'blood_group' => $request->blood_group,
            'phone_number' => $request->phone_number,
            'previous_donation_date' => $request->previous_donation_date,
            'all_donation_time' => $request->all_donation_time,
        ]);
        return redirect()->back();
    }



    // public function updateProfileInfo(Request $request, $id)
    // {
    //     $profile = Profile::findOrFail($id);
    //     // return response()->json($request);
    //     $request->validate([
    //         'phone_number' => 'digits:11',
    //         'all_donation_time' => 'integer',
    //         'previous_donation_date' => 'date',
    //         'gender' => 'nullable|in:Male,Female'
    //     ]);


    //     $profile->update([
    //         'gender' => $request->gender,
    //         'blood_group' => $request->blood_group,
    //         'phone_number' => $request->phone_number,
    //         'previous_donation_date' => $request->previous_donation_date,
    //         'all_donation_time' => $request->all_donation_time,
    //     ]);
    //     return redirect()->back();
    // }
}
