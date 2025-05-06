<?php

namespace App\Filters\Components;

use Closure;

class Name
{
    public function handle(array $content, Closure $next): mixed
    {
        if (!empty($content['params']['name'])) {
            $content['builder']->where('name', 'like', '%' . $content['params']['name'] . '%');
        }

        return $next($content);
    }
}
