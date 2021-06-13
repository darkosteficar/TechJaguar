<?php

namespace App\Http\Livewire\Build;

use App\Models\Cpu;
use Livewire\Component;

class Cpus extends Component
{

    public Cpu $cpu;
    public $errors;

    public function mount($cpu,$errors)
    {
        $this->cpu = $cpu;
        $this->errors = $errors;             
    }

    public function render()
    {
        $erors = $this->errors;
        return view('livewire.build.cpus',['erors'=>$erors]);
    }
}
