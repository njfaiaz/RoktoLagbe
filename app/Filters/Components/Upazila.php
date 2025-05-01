<?php

declare(strict_types=1);

namespace App\Filters\Components;

use Closure;
use App\Constants\Role as RoleConstant;
use Illuminate\Database\Eloquent\Builder;

class Upazila implements ComponentInterface
{
    public function handle(array $content, Closure $next): mixed
    {
        if (isset($content['params']['upazila_id'])) {
            $content['builder']->whereHas('addresses', function (Builder $query) use ($content) {
                $query->where('upazila_id', $content['params']['upazila_id']);
            });
        }

        return $next($content);
    }
}
