<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NumberOfPeopleFilter extends Component
{

    public $capacity;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($capacity)
    {
        $this->capacity = $capacity;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        $capacity = $this->capacity;
        return view('components.number-of-people-filter',
            compact('capacity')
        );
    }
}
