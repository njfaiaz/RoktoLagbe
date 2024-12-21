<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Blood;
use App\Models\District;
use App\Models\Union;
use App\Models\Upazila;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
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

        $profile = User::with('profile', 'address')->where('username', $username)->firstOrFail();
        $bloods = Blood::all();
        $districts = District::all();
        $upazilaes = Upazila::all();
        $unions = Union::all();
        $address = Address::all();
        // return response()->json($profile);
        return view('admin.profile.edit', compact('profile', 'bloods', 'districts', 'unions', 'upazilaes', 'address'));
    }

    public function updateProfile(Request $request)
    {
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

    public function updateProfileInfo(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $request->validate([
            'phone_number' => 'nullable|digits:11',
            'all_donation_time' => 'nullable|integer',
            'previous_donation_date' => 'nullable|date',
            'gender' => 'required|in:Male,Female'
        ]);
        $user->profile()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'blood_id'   => $request->blood_id ?? null,
                'address_id' => $request->address_id ?? null,
                'phone_number' => $request->phone_number ?? null,
                'all_donation_time' => $request->all_donation_time ?? null,
                'gender'     => $request->gender ?? 'Not specified',
                'previous_donation_date'  => $request->previous_donation_date ?? now(),
            ]
        );

        return redirect()->back();
    }



    public function searchDistricts(Request $request)
    {
        $query = $request->get('query');
        $districts = District::where('district_name', 'LIKE', "%$query%")->get();
        return response()->json($districts);
    }

    public function searchUpazilas(Request $request)
    {
        $query = $request->get('query');
        $districtId = $request->get('district_id');
        $upazilas = Upazila::where('district_id', $districtId)
            ->where('upazila_name', 'LIKE', "%$query%")
            ->get();
        return response()->json($upazilas);
    }

    public function searchUnions(Request $request)
    {
        $query = $request->get('query');
        $upazilaId = $request->get('upazila_id');
        $unions = Union::where('upazila_id', $upazilaId)
            ->where('union_name', 'LIKE', "%$query%")
            ->get();
        return response()->json($unions);
    }

    public function updateAddressInfo(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $request->validate([
            'district_id' => 'nullable|integer|exists:districts,id',
            'upazila_id'  => 'nullable|integer|exists:upazilas,id',
            'union_id'    => 'nullable|integer|exists:unions,id',
        ]);
        $user->address()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'district_id'   => $request->district_id ?? null,
                'upazila_id' => $request->upazila_id ?? null,
                'union_id' => $request->union_id ?? null,
            ]
        );

        return redirect()->back();
    }
}
