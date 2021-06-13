<?php

namespace App\Http\Livewire\Build;

use Livewire\Component;

class Storages extends Component
{

    public $storages = array();
    public $errors;

    public function mount($storages,$errors)
    {
        $this->storages = $storages;
        $this->errors = $errors;             
    }

    public function render()
    {
        $erors = $this->errors;
        return view('livewire.build.storages',['erors'=>$erors]);
    }
}
