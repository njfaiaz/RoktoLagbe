<?php

namespace App\Filters;

use App\Filters\Components\Blood;
use App\Filters\Components\Category;
use App\Filters\Components\District;
use App\Filters\Components\Union;
use App\Filters\Components\Upazila;

class AdminUserSearchFilter extends BaseFilter
{
    protected function getFilters(): array
    {
        return [
            Blood::class,
            District::class,
            Upazila::class,
            Union::class,
            Category::class,
        ];
    }
}
