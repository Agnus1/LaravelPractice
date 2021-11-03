<?php

namespace App\View\Components\panels;

use Illuminate\View\Component;

class newsSection extends Component
{

    public $news;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $news = \App\Models\Article::query()
            ->limit(3)
            ->select(['title', 'description', 'published_at'])
            ->latest('published_at')
            ->get();
        $this->news = $news;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.panels.news-section', ['news' => $this->news]);
    }
}
