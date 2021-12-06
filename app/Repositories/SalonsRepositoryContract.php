<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface SalonsRepositoryContract
{
	public function get() : Collection;
	public function getTwoRandom() : Collection;
}