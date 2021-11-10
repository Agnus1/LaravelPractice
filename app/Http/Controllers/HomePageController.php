<?php

namespace App\Http\Controllers;

class HomePageController extends Controller
{
    public function homepage()
    {
        $articles = \App\Models\Article::getLatest();

        return view('pages.homepage', ['articles' => $articles]);
    }
}
