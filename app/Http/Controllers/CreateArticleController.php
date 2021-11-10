<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class CreateArticleController extends Controller
{
    public function store()
    {
        $this->validate(request(), [
            'title' => 'required|min:10|max:20',
            'body' => 'required|min:50',
            'description' => 'required|min:20|max:255',
        ]);

        $article = new Article([
            'title' => request('title'),
            'description' => request('description'),
            'body' => request('body'),
            'slug' => Str::slug(request('title') . uniqid()),
        ]);

        if (request('is_published')) {
            $article->published_at = Carbon::now();
        }

        $article->save();

        return view('pages.create');
    }
}
