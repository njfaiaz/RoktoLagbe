<?php

namespace App\Filters;

abstract class BaseFilter
{
    abstract protected function getFilters(): array;

    public function filters(): array
    {
        return $this->getFilters();
    }
}
