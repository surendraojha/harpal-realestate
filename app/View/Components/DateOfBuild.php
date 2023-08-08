<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DateOfBuild extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $information;
    public function __construct($information=null)
    {
        $this->information = $information;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.date-of-build',['information'=>$this->information]);
    }
}
