<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SalonsClientService
{
    private $request;

    public function __construct($login, $password)
    {
        $this->request = Http::withBasicAuth($login, $password);
    }

    public function get()
    {
        $response = $this->request->retry(5, 100)->get('https://studentsapi.academy.qsoft.ru/api/v1/salons');

        return $response->collect();
    }

    public function getTwoRandom()
    {
        $response = $this->request->retry(5, 100)->get('https://studentsapi.academy.qsoft.ru/api/v1/salons?limit=2&in_random_order');
        
        return $response->collect();
    }
}