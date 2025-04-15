<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    // public function update(Request $request)
    // {
    //     // Validate the incoming data
    //     $validateData = $request->validate([
    //         'phone_number'           => 'required|string|max:20',
    //         'gender'                 => 'required|string|max:20',
    //         'blood_id'               => 'required|numeric|exists:bloods,id',
    //         'previous_donation_date' => 'required|date',
    //     ]);

    //     // Get the logged-in user's ID
    //     $userId = auth()->id();

    //     // Check if a profile already exists for the logged-in user
    //     $profile = Profile::where('user_id', $userId)->first();

    //     if ($profile) {
    //         // If the profile exists, update it
    //         $profile->update($validateData);
    //         $message   = 'Profile updated successfully!';
    //         $alertType = 'success';
    //     } else {
    //         // If no profile exists, create a new one
    //         $validateData['user_id'] = $userId; // Add the logged-in user ID to the data
    //         Profile::create($validateData);
    //         $message   = 'Profile created successfully!';
    //         $alertType = 'success';
    //     }

    //     // Return the response with the appropriate message and alert type
    //     return redirect()->back()->with($alertType, $message);
    // }





    public function update(UpdateProfileRequest $request, Profile $profile, ProfileService $profileService)
    {
        $userId = auth()->id();

        $message = $profileService->updateOrCreateProfile(
            $request->validated(),
            $userId,
            $request->hasFile('image') ? $request->file('image') : null
        );

        return redirect()->back()->with([
            'success' => $message,
        ]);
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

    public function addressUpdate(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'district_id' => 'required|integer|exists:districts,id',
            'upazila_id'  => 'required|integer|exists:upazilas,id',
            'union_id'    => 'required|integer|exists:unions,id',
        ], [
            'district_id.required' => 'The district field is required.',
            'district_id.exists'   => 'The selected district is invalid.',
            'upazila_id.required'  => 'The upazila field is required.',
            'upazila_id.exists'    => 'The selected upazila is invalid.',
            'union_id.required'    => 'The union field is required.',
            'union_id.exists'      => 'The selected union is invalid.',
        ]);

        // Retrieve the authenticated user
        $user = auth()->user();

        // Check if the user already has an address
        $address = Address::where('user_id', $user->id)->first();

        if (!$address) {
            // Create a new address if none exists
            $address          = new Address();
            $address->user_id = $user->id;
        }

        // Update the address with validated data
        $address->district_id = $validatedData['district_id'];
        $address->upazila_id  = $validatedData['upazila_id'];
        $address->union_id    = $validatedData['union_id'];
        $address->save();

        // Return a success response
        return back()->with('success', 'Address updated successfully!');
    }
}
