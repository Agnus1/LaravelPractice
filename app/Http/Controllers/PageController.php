<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

    public function forclients()
    {
        $cars = \App\Models\Car::get();
        return view('pages.forclients', ['cars' => $cars]);
    }

    public function salons()
    {
        return view('pages.salons');
    }
}
