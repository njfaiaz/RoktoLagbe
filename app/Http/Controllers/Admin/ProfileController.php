<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestAddress;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Address;
use App\Models\Blood;
use App\Models\District;
use App\Models\Profile;
use App\Models\Union;
use App\Models\Upazila;
use App\Models\User;
use App\Services\ProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $id      = Auth::user()->id;
        $profile = User::find($id);

        return view('admin.profile.index', compact('profile'));
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

        return view('admin.profile.edit', compact('profile', 'bloods', 'districts', 'unions', 'upazilaes', 'address', 'user'));
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






    public function searchDistricts(Request $request)
    {
        $query     = $request->get('query');
        $districts = District::where('district_name', 'LIKE', "%$query%")->get();
        return response()->json($districts);
    }

    public function searchUpazilas(Request $request)
    {
        $query      = $request->get('query');
        $districtId = $request->get('district_id');
        $upazilas   = Upazila::where('district_id', $districtId)
            ->where('upazila_name', 'LIKE', "%$query%")
            ->get();
        return response()->json($upazilas);
    }

    public function searchUnions(Request $request)
    {
        $query     = $request->get('query');
        $upazilaId = $request->get('upazila_id');
        $unions    = Union::where('upazila_id', $upazilaId)
            ->where('union_name', 'LIKE', "%$query%")
            ->get();
        return response()->json($unions);
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
}
