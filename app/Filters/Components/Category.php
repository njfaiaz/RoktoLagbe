<?php

namespace App\Filters\Components;

use Closure;
use Carbon\Carbon;

class Category
{
    public function handle($passable, Closure $next)
    {
        $builder = $passable['builder'];
        $params = $passable['params'];

        if (!empty($params['eligibility']) && in_array($params['eligibility'], ['eligible', 'not_eligible'])) {
            $eligibility = $params['eligibility'];

            $builder->where(function ($q) use ($eligibility) {
                $q->whereRaw('
                    DATE_ADD(
                        GREATEST(
                            COALESCE((SELECT MAX(donation_date) FROM donate_histories WHERE donate_histories.user_id = users.id), "1970-01-01"),
                            COALESCE((SELECT previous_donation_date FROM profiles WHERE profiles.user_id = users.id), "1970-01-01")
                        ),
                        INTERVAL 120 DAY
                    ) ' . ($eligibility === 'eligible' ? '<=' : '>') . ' NOW()
                ');
            });
        }

        $passable['builder'] = $builder;

        return $next($passable);
    }
}
