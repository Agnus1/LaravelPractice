<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Carbon;

class CreateArticleController extends Controller
{
    public function store()
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
            'description' => 'required',
        ]);

        $article = new Article([
            'title' => request('title'),
            'description' => request('description'),
            'body' => request('body'),
            'slug' => \Faker\Factory::create()->unique()->slug,
        ]);

        if (request('is_published')) {
            $article->published_at = Carbon::now();
        }
        $article->save();

        return view('pages.create');
    }
}
