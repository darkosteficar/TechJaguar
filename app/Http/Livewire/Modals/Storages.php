<?php

namespace App\Http\Livewire\Modals;


use App\Models\Storage;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Storages extends ModalComponent
{
    public $name = 'name';
    public $storage;
    public $images = array();

    public function mount($storage)
    {
        $this->storage = Storage::find($storage);
        $this->images = $this->storage->images()->get();
    }

    public function render()
    {
        return view('livewire.modals.storages');
    }
}
