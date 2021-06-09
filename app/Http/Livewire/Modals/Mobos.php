<?php

namespace App\Http\Livewire\Modals;

use App\Models\Mobo;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Mobos extends ModalComponent
{
    public $name = 'name';
    public $mobo;
    public $images = array();

    public function mount($mobo)
    {
        $this->mobo = Mobo::find($mobo);
        $this->images = $this->mobo->images()->get();
    }


    public function render()
    {
        return view('livewire.modals.mobos');
    }
}
