<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CommercialProperty extends Component
{

    public $msg = '';
    public $studentId = 55;



    public function clickEvt()
    {
        // if($this->msg==1){
        //     $this->msg = "Residental Property";

        // }else{
        //     $this->msg = "Commercial Property";

        // }
    }

    public function trackClickEvt($studentId)
    {
        $this->msg = $studentId;
    }

    public function render()
    {

        // if($this->msg == 'Commercial Property'){
            return view('livewire.commercial-property',
                ['msg'=>$this->msg]
            );
        // }else{
        //     return view('livewire.residental-property',
        //         ['msg'=>$this->msg]
        //     );
        // }

    }
}
