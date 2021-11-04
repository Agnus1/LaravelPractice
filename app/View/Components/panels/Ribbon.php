<?php

namespace App\View\Components\panels;

use Illuminate\View\Component;

class Ribbon extends Component
{
    public $articles;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $articles = \App\Models\Article::query()
            ->select(['title', 'description', 'published_at'])
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->limit(3)
            ->get();

        $this->articles = $articles;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.panels.ribbon');
    }
}
