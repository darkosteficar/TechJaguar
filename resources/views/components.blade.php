@extends('layouts.app')

@section('content')
    

    @if ($component == 'coolers')
        <livewire:components.coolers />
    @endif
    @if ($component == 'pc-cases')
    <livewire:components.pc-cases />
    @endif
    @if ($component == 'cpus')
    <livewire:components.cpus />
    @endif
    @if ($component == 'gpus')
    <livewire:components.gpus />
    @endif
    @if ($component == 'mobos')
    <livewire:components.mobos />
    @endif
    @if ($component == 'rams')
    <livewire:components.rams />
    @endif
    @if ($component == 'fans')
    <livewire:components.fans />
    @endif
    @if ($component == 'storages')
    <livewire:components.storages />
    @endif
    @if ($component == 'psus')
    <livewire:components.psus />
    @endif
    


    
    
@endsection