<?php

namespace App\Enums;

enum UserRole: int {

    case SUPER_ADMIN = 1;
    case USER = 2;

    public function title(): string
    {
        return match($this)
        {
            $this::SUPER_ADMIN => 'Super_Admin',
            $this::USER => 'User'
        };
    }
}