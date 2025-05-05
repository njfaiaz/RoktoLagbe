<?php

namespace App\Services;

use App\Models\User;
use App\Filters\AdminUserSearchFilter;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Http\Request;

class AdminUserSearchService
{
    public function getFilteredUsers(Request $request)
    {
        $builder = User::query();

        $filtered = app(Pipeline::class)
            ->send([
                'builder' => $builder,
                'params' => $request->all(),
            ])
            ->through((new AdminUserSearchFilter())->filters())
            ->thenReturn();

        return $filtered['builder']
            ->with('profiles', 'profiles.bloods', 'addresses.district', 'addresses.upazila', 'addresses.union')
            ->orderByRaw("id = ? DESC", [auth()->id()])
            ->latest()
            ->paginate(20)->withQueryString();
    }
}
