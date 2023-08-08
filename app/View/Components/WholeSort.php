<?php

namespace App\View\Components;

use Illuminate\View\Component;

class WholeSort extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $route;
     public $order;
    public function __construct($route,$order)
    {
        $this->route = $route;
        $this->order =$order;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.whole-sort',['route'=>$this->route,'order'=>$this->order]);
    }
}
