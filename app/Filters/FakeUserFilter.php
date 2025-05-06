<?php

namespace App\Filters;

use App\Filters\Components\FakeComplainName;
use App\Filters\Components\FakeDetails;
use App\Filters\Components\FakeName;
use App\Filters\Components\FakePhone;

class FakeUserFilter extends BaseFilter
{
    protected function getFilters(): array
    {
        return [
            FakeComplainName::class,
            FakeName::class,
            FakePhone::class,
            FakeDetails::class,
        ];
    }
}
