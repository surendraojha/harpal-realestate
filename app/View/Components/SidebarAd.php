<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SidebarAd extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $advertisement;
    public function __construct($advertisement)
    {
        $this->advertisement = $advertisement;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sidebar-ad',
            [
                'advertisement'=>$this->advertisement
            ]
        );
    }
}
