<?php

namespace App\Filters\Components;

use Illuminate\Database\Eloquent\Builder;
use Closure;

class FakeComplainName
{
    public function handle(array $content, Closure $next): mixed
    {
        if (!empty($content['params']['name'])) {
            $content['builder']->whereHas('user', function ($query) use ($content) {
                $query->where('name', 'like', '%' . $content['params']['name'] . '%');
            });
        }


        return $next($content);
    }
}
