<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MainSearch extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
     public $locations;
     public $categories;
    public function __construct($locations,$categories)
    {
        $this->locations = $locations;
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.main-search',

            ['locations'=>$this->locations,'categories'=>$this->categories]
        );
    }
}
