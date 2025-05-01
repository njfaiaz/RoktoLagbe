<?php

namespace App\Filters\Components;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class District implements ComponentInterface
{
    public function handle(array $content, Closure $next): mixed
    {
        if (isset($content['params']['district_id'])) {
            $content['builder']->whereHas('addresses', function (Builder $query) use ($content) {
                $query->where('district_id', $content['params']['district_id']);
            });
        }

        return $next($content);
    }
}
