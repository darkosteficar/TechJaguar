<?php

namespace App\Http\Livewire\Build;

use Livewire\Component;

class PcCase extends Component
{

    public $pcCase;
    public $errors;

    public function mount($pcCase,$errors)
    {
        $this->pcCase = $pcCase;
        $this->errors = $errors;             
    }

    public function render()
    {
        $erors = $this->errors;
        return view('livewire.build.pc-case',['erors'=>$erors]);
    }
}