<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Blood;
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

        $profile = User::with('profiles', 'addresses')->where('username', $username)->firstOrFail();
        $bloods = Blood::all();
        $districts = District::all();
        $upazilaes = Upazila::all();
        $unions = Union::all();
        $address = Address::all();
        // return response()->json($profile);
        return view('admin.profile.edit', compact('profile', 'bloods', 'districts', 'unions', 'upazilaes', 'address'));
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
}
