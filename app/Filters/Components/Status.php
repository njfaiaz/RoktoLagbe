<?php

namespace App\Filters\Components;

use Closure;

class Status
{
    public function handle(array $content, Closure $next): mixed
    {
        $statusMap = [
            'active' => 1,
            'inactive' => 2,
        ];

        $inputStatus = $content['params']['status'] ?? null;

        if (!empty($inputStatus) && isset($statusMap[$inputStatus])) {
            $content['builder']->where('status', $statusMap[$inputStatus]);
        }

        return $next($content);
    }
}
