<?php

namespace App\Filters\Components;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class Eligibility implements ComponentInterface
{
    public function handle(array $content, Closure $next): mixed
    {
        // Check if eligibility is provided and filter accordingly
        if (isset($content['params']['eligibility']) && $content['params']['eligibility'] != 'all') {
            $eligibility = $content['params']['eligibility'];

            if ($eligibility == 'eligible') {
                $content['builder']->where('eligibility', true); // Adjust based on your actual column and logic
            } elseif ($eligibility == 'not_eligible') {
                $content['builder']->where('eligibility', false); // Adjust based on your actual column and logic
            }
        }

        return $next($content);
    }
}
