<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CharacterCount extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
     public $id;
     public $outputId;
    public function __construct($id,$outputId)
    {
        $this->id = $id;
        $this->outputId=$outputId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.character-count',
            ['id'=>$this->id,'outputId'=>$this->outputId]
        );
    }
}
