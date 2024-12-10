<?php

namespace App\Enums;

enum UserStatus: int {

    case ACTIVE = 1;
    case INACTIVE = 2;

    public function title(): string
    {
        return match($this)
        {
            $this::ACTIVE => 'active',
            $this::INACTIVE => 'inactive'
        };
    }
}