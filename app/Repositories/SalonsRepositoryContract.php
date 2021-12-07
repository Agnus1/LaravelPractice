<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface SalonsRepositoryContract
{
	public function get() : Collection;
	public function getRandom(int $count) : Collection;
}