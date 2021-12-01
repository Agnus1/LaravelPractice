<?php

namespace App\View\Components\Panels;

use Illuminate\View\Component;
use \Illuminate\Support\Facades\Route;
use App\Repositories\CategoriesRepositoryContract;

class CategoriesMenu extends Component
{
    public $categories;
    public $descendants;
    public $currentCategoryName;
    public $categoriesRepository;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(CategoriesRepositoryContract $categoriesRepository)
    {
        $this->categories = $categoriesRepository->getRoots();
        $this->currentCategoryName = Route::getCurrentRoute()->slug ?? '';
        $this->categoriesRepository = $categoriesRepository;
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
