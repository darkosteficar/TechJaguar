<?php

namespace App\Http\Livewire\Modals;


use App\Models\Fan;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Fans extends ModalComponent
{
    public $name = 'name';
    public $fan;
    public $images = array();

    public function mount($fan)
    {
        $this->fan = fan::find($fan);
        $this->images = $this->fan->images()->get();
    }

    public function render()
    {
        return view('livewire.modals.fans');
    }
}
