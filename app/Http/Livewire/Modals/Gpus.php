<?php

namespace App\Http\Livewire\Modals;

use App\Models\Gpu;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Gpus extends ModalComponent
{
    public $name = 'name';
    public $gpu;
    public $images = array();

    public function mount($gpu)
    {
        $this->gpu = Gpu::find($gpu);
        $this->images = $this->gpu->images()->get();
    }


    public function render()
    {
        return view('livewire.modals.gpus');
    }
}
