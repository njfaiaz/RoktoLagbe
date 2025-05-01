<?php

namespace App\Filters\Components;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class Blood implements ComponentInterface
{
    public function handle(array $content, Closure $next): mixed
    {
        if (isset($content['params']['blood_name'])) {
            $content['builder']->whereHas('profiles', function (Builder $query) use ($content) {
                $query->where('blood_id', $content['params']['blood_name']);
            });
        }

        return $next($content);
    }
}
