<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CheckBoxTd extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
     public $value;
     public $user;
    public function __construct($value,$user)
    {
        $this->value = $value;
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.check-box-td',['value'=>$this->value,'user'=>$this->user]);
    }
}
