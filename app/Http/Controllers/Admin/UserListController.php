<?php

namespace App\Http\Controllers\Admin;

use App\Filters\AdminUserSearchFilter;
use App\Http\Controllers\Controller;
use App\Models\Blood;
use App\Models\District;
use App\Models\Union;
use App\Models\Upazila;
use App\Models\User;
use App\Services\AdminUserSearchService;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    public function index(Request $request, AdminUserSearchService $userService)
    {
        $users = $userService->getFilteredUsers($request);
        $bloods = Blood::all();
        $districtName = $request->district_id ? District::find($request->district_id)?->district_name : '';

        return view('admin.user.index', compact('users', 'bloods', 'districtName'));
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


    public function userInactive()
    {
        $inActiveUser = User::where('status', '2')->with('profiles', 'addresses')->latest()->paginate(20);
        return view('admin.user.block_user', compact('inActiveUser'));
    }


    public function userActive()
    {
        $ActiveUser = User::where('status', '1')->with('profiles', 'addresses')->latest()->paginate(20);
        return view('admin.user.Active_user', compact('ActiveUser'));
    }

    public function inActiveApprove(Request $request)
    {
        $users = User::findOrFail($request->id);
        $status = $users->status === '2' ? '1' : '2';
        $users->update(['status' => $status]);

        return redirect()->back()->with([
            'message' => "This User Is Blocked.",
            'alert' => 'success',
        ]);
    }
    public function ActiveApprove(Request $request)
    {
        $users = User::findOrFail($request->id);
        $status = $users->status === '1' ? '2' : '1';
        $users->update(['status' => $status]);

        return redirect()->back()->with([
            'message' => "This User Is Un-Blocked",
            'alert' => 'success',
        ]);
    }
}
