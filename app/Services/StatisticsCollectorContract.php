<?php

namespace App\Services;

interface StatisticsCollectorContract
{
    public function collectData() : array;
}