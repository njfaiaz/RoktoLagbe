<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\FakeUserStoreRequest;
use App\Models\FakeUser;
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
        return view('frontend.fake.show', compact('user'));
    }

    public function create()
    {
        return view('frontend.fake.add');
    }

    public function store(FakeUserStoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        FakeUser::create($data);

        $notification = array(
            'message' => 'Fake User Add successfully!',
            'alert' => 'success'
        );
        return redirect()->route('user.fake')->with($notification);
    }
}
