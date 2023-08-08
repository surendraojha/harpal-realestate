<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BackendPageNumber extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $index;
    public $page_number;
    public function __construct($index,$perPage=null)
    {
        $this->index = $index;
        $this->page_number =$perPage;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.backend-page-number',['index'=>$this->index,'per_page'=>$this->page_number]);
    }
}
