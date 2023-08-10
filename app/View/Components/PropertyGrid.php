<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PropertyGrid extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $information;
    public function __construct($information)
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
        $data['information'] = $this->information;
        return view('components.property-grid',$data);
    }
}
