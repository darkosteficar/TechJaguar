<?php

namespace App\Http\Livewire\Modals;


use App\Models\Ram;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Rams extends ModalComponent
{
    public $name = 'name';
    public $ram;
    public $images = array();

    public function mount($ram)
    {
        $this->ram = ram::find($ram);
        $this->images = $this->ram->images()->get();
    }

    public function render()
    {
        return view('livewire.modals.rams');
    }
}
