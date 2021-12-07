<?php

namespace App\Services;

use Illuminate\Support\Collection;

interface SalonsClientServiceContract
{
    public function get() : Collection;
    public function getRandom(int $count) : Collection;
}