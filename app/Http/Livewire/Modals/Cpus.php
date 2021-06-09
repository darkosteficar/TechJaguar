<?php

namespace App\Http\Livewire\Modals;


use App\Models\Cpu;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Cpus extends ModalComponent
{
    public $name = 'name';
    public $cpu;
    public $images = array();

    public function mount($cpu)
    {
        $this->cpu = Cpu::find($cpu);
        $this->images = $this->cpu->images()->get();
    }


    public function render()
    {
        return view('livewire.modals.cpus');
    }
}
