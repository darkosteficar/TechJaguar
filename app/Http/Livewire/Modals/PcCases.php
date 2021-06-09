<?php

namespace App\Http\Livewire\Modals;

use App\Models\PcCase;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class PcCases extends ModalComponent
{

    public $name = 'name';
    public $pcCase;
    public $images = array();

    public function mount($pcCase)
    {
        $this->pcCase = PcCase::find($pcCase);
        $this->images = $this->pcCase->images()->get();
    }


    public function render()
    {
        return view('livewire.modals.pc-cases');
    }
}
