<?php

namespace App\Filters\Components;

use Illuminate\Database\Eloquent\Builder;
use Closure;

class FakeDetails
{
    public function handle(array $content, Closure $next): mixed
    {
        if (!empty($content['params']['fake_user_details'])) {
            $content['builder']->where('fake_user_details', 'like', '%' . $content['params']['fake_user_details'] . '%');
        }

        return $next($content);
    }
}
