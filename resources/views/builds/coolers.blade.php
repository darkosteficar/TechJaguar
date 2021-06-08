@extends('layouts.app')

@section('content')
    
    @if ($component == 'coolers')
        <livewire:component-table />
    @endif
   
    <div class="bg-white">
        <p class="text-2xl">HEHEHE</p>
    </div>


@endsection