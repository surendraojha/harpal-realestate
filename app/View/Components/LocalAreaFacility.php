<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LocalAreaFacility extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $additional_features;
    public $checked_features;

    public function __construct($features,$checked=null)
    {
        $this->additional_features = $features;
        $this->checked_features = $checked;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        return view('components.local-area-facility',
            [
                'additional_features'=>$this->additional_features,
                'checked_features' => $this->checked_features
            ]

        );
    }
}
