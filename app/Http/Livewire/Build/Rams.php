<?php

namespace App\Http\Livewire\Build;

use Livewire\Component;

class Rams extends Component
{

    public $rams = array();
    public $errors;

    public function mount($rams,$errors)
    {
        $this->rams = $rams;
        $this->errors = $errors;             
    }

    public function render()
    {
        $erors = $this->errors;
        return view('livewire.build.rams',['erors'=>$erors]);
    }
}
