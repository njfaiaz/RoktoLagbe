<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Blood;
use App\Models\District;
use App\Models\Profile;
use App\Models\Union;
use App\Models\Upazila;
use App\Models\User;
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

        $bloods    = Blood::all();
        $districts = District::all();
        $upazilaes = Upazila::all();
        $unions    = Union::all();
        $address   = Address::all();

       
        return view('admin.profile.edit', compact('profile', 'bloods', 'districts', 'unions', 'upazilaes', 'address'));
    }

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
}
