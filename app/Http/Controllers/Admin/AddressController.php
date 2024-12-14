<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = District::with('upazilas.unions')->get();
        // return response()->json($addresses);

        return view('admin.address.index', compact('addresses'));
    }
}
