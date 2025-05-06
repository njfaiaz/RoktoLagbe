<?php

namespace App\Filters\Components;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class Number
{
    public function handle(array $content, Closure $next): mixed
    {
        if (!empty($content['params']['phone_number'])) {
            $content['builder']->whereHas('profiles', function (Builder $query) use ($content) {
                $query->where('phone_number', 'like', '%' . $content['params']['phone_number'] . '%');
            });
        }

        return $next($content);
    }
}
