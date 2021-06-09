<?php

namespace App\Http\Livewire\Modals;


use App\Models\Image;
use App\Models\Cooler;
use LivewireUI\Modal\ModalComponent;

class Coolers extends ModalComponent
{
    public $name = 'name';
    public $cooler;
    public $images = array();

    public static function modalMaxWidth(): string
    {
        // 'sm'
        // 'md'
        return '2xl';
        // 'xl'
        // '2xl'
        // '3xl'
        // '4xl'
        // '5xl'
        // '6xl'
        // '7xl'
        //return '4xl';
    }

    public function mount($cooler)
    {
        $this->cooler = Cooler::find($cooler);
        $this->images = $this->cooler->images()->get();
    }
    
    public function render()
    {
        return view('livewire.modals.coolers');
    }
    
    
}
