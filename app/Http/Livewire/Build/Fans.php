<?php

namespace App\Http\Livewire\Build;

use Livewire\Component;

class Fans extends Component
{

    public $fans = array();
    public $errors;

    public function mount($fans,$errors)
    {
        $this->fans = $fans;
        $this->errors = $errors;             
    }

    public function render()
    {
        $erors = $this->errors;
        return view('livewire.build.fans',['erors'=>$erors]);
    }
}
