<?php

namespace App\Http\Livewire\Build;

use Livewire\Component;

class Gpus extends Component
{

    public $gpus = array();
    public $errors;

    public function mount($gpus,$errors)
    {
        $this->gpus = $gpus;
        $this->errors = $errors;             
    }

    public function render()
    {
        $erors = $this->errors;
        return view('livewire.build.gpus',['erors'=>$erors]);
    }
}
