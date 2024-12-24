<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Union;
use App\Models\Upazila;
use Illuminate\Http\Request;

class FrSearchController extends Controller
{
    public function index()
    {
        return view('frontend.seaarch.index');
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
