<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BoostFeatureList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $value;
     public $label;
    public function __construct($value,$label)
    {
        $this->label = $label;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.boost-feature-list',

            ['label'=>$this->label,'value'=>$this->value]
        );
    }
}
