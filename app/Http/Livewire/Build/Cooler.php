<?php

namespace App\Http\Livewire\Build;

use Livewire\Component;

class Cooler extends Component
{

    public $cooler;
    public $errors;

    public function mount($cooler,$errors)
    {
        $this->cooler = $cooler;
        $this->errors = $errors;             
    }

    public function render()
    {
        $erors = $this->errors;
        return view('livewire.build.cooler',['erors'=>$erors]);
    }
}