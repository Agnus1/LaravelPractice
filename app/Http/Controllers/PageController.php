<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Repositories\SalonsRepositoryContract;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function contactinfo()
    {
        return view('pages.contactinfo');
    }

    public function conditions()
    {
        return view('pages.conditions');
    }

    public function financial()
    {
        return view('pages.financial');
    }

    public function salons(SalonsRepositoryContract $salonsRepository)
    {
        $salons = $salonsRepository->get();
        return view('pages.salons', compact('salons'));
    }
    
    public function account()
    {
        return view('pages.account');
    }
}
