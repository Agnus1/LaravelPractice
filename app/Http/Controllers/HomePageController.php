<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function homepage()
    {
        $articles = \App\Models\Article::query()
            ->select(['title', 'description', 'published_at'])
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->limit(3)
            ->get();

        return view('pages.homepage', ['articles' => $articles]);
    }
}
