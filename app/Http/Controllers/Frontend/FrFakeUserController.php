<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\FakeUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrFakeUserController extends Controller
{
    public function index(Request $request, FakeUserService $userService)
    {
        $users = $userService->getFilteredFakeUsers($request);
        return view('frontend.fake.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::with('fakeUsers')->findOrFail($id);
        // return response()->json($user);
        return view('frontend.fake.show', compact('user'));
    }
}
