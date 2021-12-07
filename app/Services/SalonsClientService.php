<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class SalonsClientService implements SalonsClientServiceContract
{
    private $request;
    protected $url = 'https://studentsapi.academy.qsoft.ru/api/v1/salons';

    public function __construct($login, $password)
    {
        $this->request = Http::withBasicAuth($login, $password);
    }

    public function get() : Collection
    {
        $response = $this->request->get($this->url);

        return $response->collect();
    }

    public function getRandom(int $count) : Collection
    {
        $response = $this->request->get($this->url . '?limit=' . $count . '&in_random_order');
        
        return $response->collect();
    }
}