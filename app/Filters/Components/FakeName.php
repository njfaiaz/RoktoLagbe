<?php

namespace App\Filters\Components;

use Illuminate\Database\Eloquent\Builder;
use Closure;

class FakeName
{
    public function handle(array $content, Closure $next): mixed
    {
        if (!empty($content['params']['fake_user_name'])) {
            $content['builder']->where('fake_user_name', 'like', '%' . $content['params']['fake_user_name'] . '%');
        }

        return $next($content);
    }
}
