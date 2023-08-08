<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MetaHead extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
     public $meta;
    public function __construct($meta)
    {
        $this->meta =$meta;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.meta-head',
        ['meta'=>$this->meta]
        );
    }
}
