<?php

namespace App\Repositories;

use App\Services\SalonsClientServiceContract;
use Illuminate\Support\Collection;

class SalonsRepository implements SalonsRepositoryContract
{

    private $salonsService;
    private $cacheTags = 'salons';

    public function __construct(SalonsClientServiceContract $salonsService)
    {
        $this->salonsService = $salonsService;
    }

    public function get() : Collection
    {
        $salons = \Cache::tags($this->cacheTags)->remember(
                    'salons.get', 
                    now()->addMinutes(5), 
                    function () {
                        return $this->salonsService->get();
                    });
        return $salons;
    }

    public function getRandom(int $count) : Collection
    {
        $salons = \Cache::tags($this->cacheTags)->remember(
                    'salons.getRandom.' . $count, 
                    now()->addMinutes(5), 
                    function () use ($count) {
                        return $this->salonsService->getRandom($count);
                    });
        return $salons;
    }
}