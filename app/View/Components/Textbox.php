<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Textbox extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $information;
    public $d;
    public function __construct($information,$d=null)
    {
        $this->information = $information;
        $this->d = $d;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $data['information'] = $this->information;
        $data['d']= $this->d;

        // dd('ram',$data['d']);
        return view('components.textbox',$data);
    }
}
