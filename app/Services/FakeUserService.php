<?php

namespace App\Services;

use App\Filters\FakeUserFilter;
use App\Models\FakeUser;
use App\Models\User;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Http\Request;

class FakeUserService
{
    public function getFilteredFakeUsers(Request $request)
    {
        $builder = FakeUser::query();

        $filtered = app(Pipeline::class)
            ->send([
                'builder' => $builder,
                'params' => $request->all(),
            ])
            ->through((new FakeUserFilter())->filters())
            ->thenReturn();

        return $filtered['builder']
            ->with('user', 'user.profiles')
            ->orderByRaw("user_id = ? DESC", [auth()->id()])
            ->latest()
            ->paginate(20)
            ->withQueryString();
    }
}
