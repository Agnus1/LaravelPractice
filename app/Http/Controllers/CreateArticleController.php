<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class CreateArticleController extends Controller
{
    public function store()
    {
        $fields = $this->validate(request(), [
            'title' => 'required|min:3|max:60',
            'body' => 'required|min:60',
            'description' => 'required|min:20|max:255',
        ]);
        $fields += ['slug' => Str::slug(request('title') . uniqid())];
        if (request('is_published')) {
            $fields['published_at'] = Carbon::now();
        }

        (new Article($fields))->save();

        return view('pages.create');
    }
}
