<?php

namespace App\Http\Livewire\Modals;

use App\Models\Psu;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Psus extends ModalComponent
{
    public $name = 'name';
    public $psu;
    public $images = array();

    public function mount($psu)
    {
        $this->psu = Psu::find($psu);
        $this->images = $this->psu->images()->get();
    }


    public function render()
    {
        return view('livewire.modals.psus');
    }
}
