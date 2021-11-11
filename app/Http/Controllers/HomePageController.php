<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function homepage()
    {
        $articles = \App\Models\Article::getLatest();

        return view('pages.homepage', ['articles' => $articles]);
    }
}
