<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DeleteButton extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
     public $user;
     public $route;
    public function __construct($user,$route)
    {
        $this->user = $user;
        $this->route=$route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.delete-button',
        [
            'user'=>$this->user,
            'route'=>$this->route
        ]
        );
    }
}
