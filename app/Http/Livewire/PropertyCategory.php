<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PropertyCategory extends Component
{
    public $categories;

    public function render()
    {
        return view('livewire.property-category',
            ['categories'=>$this->categories]
        );
    }



}
