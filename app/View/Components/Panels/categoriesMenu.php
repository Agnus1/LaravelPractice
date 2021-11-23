<?php

namespace App\View\Components\panels;

use Illuminate\View\Component;
use App\Models\Category;
use App\Repositories\CategoriesRepository;
use \Illuminate\Support\Facades\Route;
use App\Repositories\CategoriesRepositoryContract;

class categoriesMenu extends Component
{
    public $categories;
    public $descendants;
    public $currentCategoryName;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(CategoriesRepositoryContract $categoriesRepository)
    {
        $this->categories = $categoriesRepository->getRoots();
        $this->currentCategoryName = Route::getCurrentRoute()->category ? Route::getCurrentRoute()->category->name : '';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.panels.categories-menu');
    }
}
