<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blood;
use App\Models\User;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    public function index()
    {
        $users = User::with('profiles', 'addresses')->get();
        // return response()->json($users);
        return view('admin.user.index', compact('users'));
    }

    public function userInactive()
    {
        $inActiveUser = User::where('status', '2')->with('profiles', 'addresses')->get();
        return view('admin.user.block_user', compact('inActiveUser'));
    }


    public function userActive()
    {
        $ActiveVendor = User::where('status', '1')->with('profiles', 'addresses')->get();
        return view('admin.user.Active_user', compact('ActiveVendor'));
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
