<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
=======
use App\Http\Requests\RequestAddress;
use App\Http\Requests\UpdateProfileRequest;
>>>>>>> main
use App\Models\Address;
use App\Models\Blood;
use App\Models\District;
use App\Models\Profile;
use App\Models\Union;
use App\Models\Upazila;
use App\Models\User;
<<<<<<< HEAD
=======
use App\Services\ProfileService;
>>>>>>> main
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
<<<<<<< HEAD
            $user = auth()->user();
=======
        $user = auth()->user();
>>>>>>> main
        $bloods    = Blood::all();
        $districts = District::all();
        $upazilaes = Upazila::all();
        $unions    = Union::all();
        $address = $user->addresses;

        return view('admin.profile.edit', compact('profile', 'bloods', 'districts', 'unions', 'upazilaes', 'address', 'user'));
    }

<<<<<<< HEAD
    public function update(Request $request)
    {
        // Validate the incoming data
        $validateData = $request->validate([
            'phone_number'           => 'required|string|max:20',
            'gender'                 => 'required|string|max:20',
            'blood_id'               => 'required|numeric|exists:bloods,id',
            'previous_donation_date' => 'required|date',
        ]);

        // Get the logged-in user's ID
        $userId = auth()->id();

        // Check if a profile already exists for the logged-in user
        $profile = Profile::where('user_id', $userId)->first();

        if ($profile) {
            // If the profile exists, update it
            $profile->update($validateData);
            $message   = 'Profile updated successfully!';
            $alertType = 'success';
        } else {
            // If no profile exists, create a new one
            $validateData['user_id'] = $userId; // Add the logged-in user ID to the data
            Profile::create($validateData);
            $message   = 'Profile created successfully!';
            $alertType = 'success';
        }

        // Return the response with the appropriate message and alert type
        return redirect()->back()->with($alertType, $message);
    }

=======


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


>>>>>>> main
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

<<<<<<< HEAD
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
=======




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



    public function NameChange(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();
        $notification = array(
            'message' => ' User Profile Update Successfully',
            'alert' => 'success'
        );
        return Redirect()->back()->with($notification);
>>>>>>> main
    }
}
