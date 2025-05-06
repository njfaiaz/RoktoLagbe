<?php

namespace App\Filters\Components;

use Illuminate\Database\Eloquent\Builder;
use Closure;

class FakePhone
{
    public function handle(array $content, Closure $next): mixed
    {
        if (!empty($content['params']['fake_user_phone_number'])) {
            $content['builder']->where('fake_user_phone_number', 'like', '%' . $content['params']['fake_user_phone_number'] . '%');
        }

        return $next($content);
    }
}
