<?php

namespace App\View\Components\Panels;

use Illuminate\View\Component;
use App\Repositories\SalonsRepositoryContract;

class FooterSalons extends Component
{
    public $salons;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(SalonsRepositoryContract $salonsRepository)
    {
        $this->salons = $salonsRepository->getRandom(2);

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.panels.footer-salons');
    }
}
