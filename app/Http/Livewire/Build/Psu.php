<?php

namespace App\Http\Livewire\Build;

use Livewire\Component;

class Psu extends Component
{

    public $psu;
    public $errors;

    public function mount($psu,$errors)
    {
        $this->psu = $psu;
        $this->errors = $errors;             
    }

    public function render()
    {
        $erors = $this->errors;
        return view('livewire.build.psu',['erors'=>$erors]);
    }
}