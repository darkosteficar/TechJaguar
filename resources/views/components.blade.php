@extends('layouts.app')

@section('content')
    

    @if ($component == 'coolers')
        <livewire:components.coolers />
    @endif

    
    
@endsection