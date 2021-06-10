<?php

namespace App\Http\Livewire\Modals;


use App\Models\Cpu;
use App\Models\Fan;
use App\Models\Gpu;
use App\Models\Psu;
use App\Models\Ram;
use App\Models\Mobo;
use App\Models\Cooler;
use App\Models\PcCase;
use App\Models\Storage;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Test extends ModalComponent
{
    public $name;
    public $component;
    public $foundComponent;
    public $component_id;
    public $images = array();

    public function mount($component_id)
    {
        if($this->component == "Cpu"){
            $this->foundComponent = Cpu::find($this->component_id);
        }
        elseif ($this->component == "Gpu") {
            $this->foundComponent = Gpu::find($this->component_id);
        }
        elseif ($this->component == "PcCase") {
            $this->foundComponent = PcCase::find($this->component_id);
        }
        elseif ($this->component == "Ram") {
            $this->foundComponent = Ram::find($this->component_id);
        }
        elseif ($this->component == "Fan") {
            $this->foundComponent = Fan::find($this->component_id);
        }
        elseif ($this->component == "Psu") {
            $this->foundComponent = Psu::find($this->component_id);
        }
        elseif ($this->component == "Cooler") {
            $this->foundComponent = Cooler::find($this->component_id);
        }
        elseif ($this->component == "Mobo") {
            $this->foundComponent = Mobo::find($this->component_id);
        }
        elseif ($this->component == "Storage") {
            $this->foundComponent = Storage::find($this->component_id);
        }
        $this->images = $this->foundComponent->images()->first();
        $this->name = strtolower($this->component);
        
    }

    public function render()
    {
        
        return view('livewire.modals.test');
    }
}
