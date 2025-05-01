<?php

declare(strict_types=1);

namespace App\Filters\Components;

use Closure;
use App\Constants\Role as RoleConstant;
use Illuminate\Database\Eloquent\Builder;

class Union implements ComponentInterface
{
    public function handle(array $content, Closure $next): mixed
    {
        if (isset($content['params']['union_id'])) {
            $content['builder']->whereHas('addresses', function (Builder $query) use ($content) {
                $query->where('union_id', $content['params']['union_id']);
            });
        }

        return $next($content);
    }
}
