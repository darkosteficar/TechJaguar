<?php

namespace App\Http\Livewire\Build;

use Livewire\Component;

class Mobo extends Component
{

    public $mobo;
    public $errors;

    public function mount($mobo,$errors)
    {
        $this->mobo = $mobo;
        $this->errors = $errors;             
    }

    public function render()
    {
        $erors = $this->errors;
        return view('livewire.build.mobo',['erors'=>$erors]);
    }
}