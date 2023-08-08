<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FeaturedRecommended extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $value;
     public $className;
    public function __construct($value,$className)
    {
        $this->value = $value;
        $this->className=$className;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.featured-recommended',
            ['value'=>$this->value,'className'=>$this->className]
        );
    }
}
