<?php

namespace App\Http\Livewire\Components;

use App\Models\Fan;
use Livewire\Component;
use Livewire\WithPagination;

class Fans extends Component
{
    use WithPagination;
    public $sortBy = 'name';
    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if($this->sortDirection == 'asc'){
            $this->sortDirection = 'desc';
        }
        else{
            $this->sortDirection = 'asc';
        }

        return $this->sortBy = $field;
    }
    
    public function render()
    {
        $fans = Fan::query()->search($this->search)->orderBy($this->sortBy,$this->sortDirection)->paginate($this->perPage);
        
        return view('livewire.components.fans',['fans'=>$fans]);
    }
}
