<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = District::select('id', 'district_name')->with(['upazilas:id,district_id,upazila_name', 'upazilas.unions:id,upazila_id,union_name'])->get();

        // return response()->json($addresses);

        return view('admin.address.index', compact('addresses'));
    }
}
