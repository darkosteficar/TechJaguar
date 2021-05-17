@extends('layouts.app')


@section('content')
@php
    if(isset($components['gpus'])){
        $gpu_id = $components['gpus'][0]->id;
    }

    
@endphp
<div class="flex mt-24 justify-between mx-24">
    <div class="w-1/5">
        <div class=" bg-gray-900 border border-green-400 p-2">
            <div class="flex mb-2">
                <img src="images/wattage.png" alt="" width="30">
                <p class="font-medium text-gray-300 text-lg">Estimated Wattage: </p>
                <p class="font-semibold text-green-400 text-xl ml-1"> 422W</p>
            </div>

            <div class="flex mb-2">
                <img src="images/wattage.png" alt="" width="30">
                <p class="font-medium text-gray-300 text-lg">CPU Manufacturer: </p>
                <p class="font-semibold text-green-400 text-xl ml-1"> AMD</p>
            </div>
            <div class="flex mb-2">
                <img src="images/wattage.png" alt="" width="30">
                <p class="font-medium text-gray-300 text-lg">CPU Socket: </p>
                <p class="font-semibold text-green-400 text-xl ml-1"> AM4</p>
            </div>


        </div>
        <div class="border border-red-500 font-semibold text-lg mt-2 text-gray-300 p-2 bg-gray-900">
            <p>Compatibility Issues:</p>
            <p>None</p>
        </div>
    </div>
    <div class="w-4/5  mb-5 font-semibold text-green-400 ml-6">
        
        @if (session()->has('success'))
        <div class="bg-green-400 text-white font-semibold rounded-sm py-2 mb-2 border-2 border-gray-400 flex">
            <p class="ml-2">{{ session('success') }}</p><p class="ml-2 text-gray-600 ">{{ session('item') }}</p><p class="ml-2">{{ session('success2') }}</p>
            
        </div>
        @endif
        <div class="">
            <div class="flex mb-2 pl-3">
                <p class="w-2/12">Component</p>
                <p class="w-9/12">Selection</p>
                <p class="w-2/12">Base Price</p>
                <p class="w-1/12 pl-3">Remove</p>
            </div>


            @if(isset($components['cpu']))
            <div class="flex items-center pl-3 bg-gray-700 border border-green-400">
                <p class="w-2/12 ">CPU</p>
                <div class="w-9/12">
                    <div class="flex items-center p-3 space-x-3">
                        <img src="images/{{ $components['cpu']->images()->first()->path }}" alt="" width="100" class="border border-green-400">
                        <p>{{ $components['cpu']->name  }}</p>
                    </div>
                </div>
                <div class="flex">
                </div>
                <p class="w-2/12">{{ number_format($components['cpu']->price,2) }} kn</p>
                <div class="w-1/12 ">
                    <form action="{{ route('build.cpu.remove', ['id'=>$components['cpu']->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="inline-block px-6 py-2 text-sm font-semibold leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripplehover:shadow-lg hover:bg-green-600 focus:outline-none my-2 self-center"  type="submit">
                            X
                        </button>
                    </form>
                </div>
            </div>
            @else
            <div class="flex items-center pl-3 bg-gray-700 border border-green-400">
                <p class="w-1/5">CPU</p>
                <div class="w-30">
                    <div>
                        <a href="{{ route('build.cpu', []) }}">
                            <button class="inline-block px-6 py-2 text-sm font-medium leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none my-2">
                                Select CPU
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            @endif

            @if(isset($components['gpus']))
                
                    <div class="pl-3 bg-gray-700 border border-green-400">
                            <div class="flex items-center">
                                <p class="w-2/12 my-2 -mr-4">GPUS </p>
                                <div class="w-11/12 ">
                                    @foreach ($components['gpus'] as $gpu)
                                    
                                    <div class="flex items-center  ">
                                        <div class="w-9/12">
                                            <div class="flex items-center p-3 space-x-3">
                                                <img src="images/{{ $gpu->images()->first()->path }}" alt="" width="100" class="border border-green-400">
                                                <p>{{ $gpu->name  }}</p>
                                            </div>
                                        </div>
                                        <div class="flex">
                                        </div>
                                        <p class="w-2/12">{{ number_format($gpu->price,2) }} kn</p>
                                        <div class="w-1/12 ">
                                            <form action="{{ route('build.gpu.remove', ['id'=>$gpu->id]) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="inline-block px-6 py-2 text-sm font-semibold leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripplehover:shadow-lg hover:bg-green-600 focus:outline-none my-2 self-center"  type="submit">
                                                    X
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <form action="{{ route('build.gpu.add', ['id'=>$gpu_id]) }}" method="POST">
                                @csrf
                                <button class="inline-block px-6 py-2 text-sm font-medium leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none mt-2 mb-4 ml-2 ">
                                    Add another GPU
                                </button>  
                            </form>
                           
                        </div>
                    
                
            @else
            <div class="flex items-center pl-3 bg-gray-700 border border-green-400">
                <p class="w-1/5">GPU</p>
                <div class="w-30">
                    <div>
                        <a href="{{ route('build.gpu', []) }}">
                            <button class="inline-block px-6 py-2 text-sm font-medium leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none my-2">
                                Select GPU
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            @endif

           
            @if(isset($components['rams']))
                
                    <div class="pl-3 bg-gray-700 border border-green-400">
                            <div class="flex items-center">
                                <p class="w-2/12 my-2 -mr-4">RAM </p>
                                <div class="w-11/12 ">
                                    @foreach ($components['rams'] as $ram)
                                    
                                    <div class="flex items-center  ">
                                        <div class="w-9/12">
                                            <div class="flex items-center p-3 space-x-3">
                                                <img src="images/{{ $ram->images()->first()->path }}" alt="" width="100" class="border border-green-400">
                                                <p>{{ $ram->name  }}</p>
                                            </div>
                                        </div>
                                        <div class="flex">
                                        </div>
                                        <p class="w-2/12">{{ number_format($ram->price,2) }} kn</p>
                                        <div class="w-1/12 ">
                                            <form action="{{ route('build.ram.remove', ['id'=>$ram->id]) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="inline-block px-6 py-2 text-sm font-semibold leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripplehover:shadow-lg hover:bg-green-600 focus:outline-none my-2 self-center"  type="submit">
                                                    X
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <a href="{{ route('build.ram', []) }}">
                                <button class="inline-block px-6 py-2 text-sm font-medium leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none my-2">
                                    Select RAM
                                </button>
                            </a>
                           
                        </div>
                    
                
            @else
            <div class="flex items-center pl-3 bg-gray-700 border border-green-400">
                <p class="w-1/5">RAM</p>
                <div class="w-30">
                    <div>
                        <a href="{{ route('build.ram', []) }}">
                            <button class="inline-block px-6 py-2 text-sm font-medium leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none my-2">
                                Select RAM
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            @endif

            @if(isset($components['storages']))
                
                    <div class="pl-3 bg-gray-700 border border-green-400">
                            <div class="flex items-center">
                                <p class="w-2/12 my-2 -mr-4">STORAGE </p>
                                <div class="w-11/12 ">
                                    @foreach ($components['storages'] as $storage)
                                    
                                    <div class="flex items-center  ">
                                        <div class="w-9/12">
                                            <div class="flex items-center p-3 space-x-3">
                                                <img src="images/{{ $storage->images()->first()->path }}" alt="" width="100" class="border border-green-400">
                                                <p>{{ $storage->name  }}</p>
                                            </div>
                                        </div>
                                        <div class="flex">
                                        </div>
                                        <p class="w-2/12">{{ number_format($storage->price,2) }} kn</p>
                                        <div class="w-1/12 ">
                                            <form action="{{ route('build.storage.remove', ['id'=>$storage->id]) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="inline-block px-6 py-2 text-sm font-semibold leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripplehover:shadow-lg hover:bg-green-600 focus:outline-none my-2 self-center"  type="submit">
                                                    X
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <a href="{{ route('build.storage', []) }}">
                                <button class="inline-block px-6 py-2 text-sm font-medium leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none my-2">
                                    Select STORAGE
                                </button>
                            </a>
                           
                        </div>
                    
                
            @else
            <div class="flex items-center pl-3 bg-gray-700 border border-green-400">
                <p class="w-1/5">STORAGE</p>
                <div class="w-30">
                    <div>
                        <a href="{{ route('build.storage', []) }}">
                            <button class="inline-block px-6 py-2 text-sm font-medium leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none my-2">
                                Select STORAGE
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            @endif

            @if(isset($components['mobo']))
                <div class="flex items-center pl-3 bg-gray-700 border border-green-400">
                    <p class="w-2/12 ">MOBO</p>
                    <div class="w-9/12">
                        <div class="flex items-center p-3 space-x-3">
                            <img src="images/{{ $components['mobo']->images()->first()->path }}" alt="" width="100" class="border border-green-400">
                            <p>{{ $components['mobo']->name  }}</p>
                        </div>
                    </div>
                    <div class="flex">
                    </div>
                    <p class="w-2/12">{{ number_format($components['mobo']->price,2) }} kn</p>
                    <div class="w-1/12 ">
                        <form action="{{ route('build.mobo.remove', ['id'=>$components['mobo']->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="inline-block px-6 py-2 text-sm font-semibold leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripplehover:shadow-lg hover:bg-green-600 focus:outline-none my-2 self-center"  type="submit">
                                X
                            </button>
                        </form>
                    </div>
                </div>
            @else
            <div class="flex items-center pl-3 bg-gray-700 border border-green-400">
                <p class="w-1/5">MOBO</p>
                <div class="w-30">
                    <div>
                        <a href="{{ route('build.mobo', []) }}">
                            <button class="inline-block px-6 py-2 text-sm font-medium leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none my-2">
                                Select Motherboard
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            @endif



            @if(isset($components['psu']))
                <div class="flex items-center pl-3 bg-gray-700 border border-green-400">
                    <p class="w-2/12 ">PSU</p>
                    <div class="w-9/12">
                        <div class="flex items-center p-3 space-x-3">
                            <img src="images/{{ $components['psu']->images()->first()->path }}" alt="" width="100" class="border border-green-400">
                            <p>{{ $components['psu']->name  }}</p>
                        </div>
                    </div>
                    <div class="flex">
                    </div>
                    <p class="w-2/12">{{ number_format($components['psu']->price,2) }} kn</p>
                    <div class="w-1/12 ">
                        <form action="{{ route('build.psu.remove', ['id'=>$components['psu']->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="inline-block px-6 py-2 text-sm font-semibold leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripplehover:shadow-lg hover:bg-green-600 focus:outline-none my-2 self-center"  type="submit">
                                X
                            </button>
                        </form>
                    </div>
                </div>
            @else
            <div class="flex items-center pl-3 bg-gray-700 border border-green-400">
                <p class="w-1/5">PSU</p>
                <div class="w-30">
                    <div>
                        <a href="{{ route('build.psu', []) }}">
                            <button class="inline-block px-6 py-2 text-sm font-medium leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none my-2">
                                Select Power Supply
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            @endif


            @if(isset($components['cooler']))
                <div class="flex items-center pl-3 bg-gray-700 border border-green-400">
                    <p class="w-2/12 ">COOLER</p>
                    <div class="w-9/12">
                        <div class="flex items-center p-3 space-x-3">
                            <img src="images/{{ $components['cooler']->images()->first()->path }}" alt="" width="100" class="border border-green-400">
                            <p>{{ $components['cooler']->name  }}</p>
                        </div>
                    </div>
                    <div class="flex">
                    </div>
                    <p class="w-2/12">{{ number_format($components['cooler']->price,2) }} kn</p>
                    <div class="w-1/12 ">
                        <form action="{{ route('build.cooler.remove', ['id'=>$components['cooler']->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="inline-block px-6 py-2 text-sm font-semibold leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripplehover:shadow-lg hover:bg-green-600 focus:outline-none my-2 self-center"  type="submit">
                                X
                            </button>
                        </form>
                    </div>
                </div>
            @else
            <div class="flex items-center pl-3 bg-gray-700 border border-green-400">
                <p class="w-1/5">COOLER</p>
                <div class="w-30">
                    <div>
                        <a href="{{ route('build.cooler', []) }}">
                            <button class="inline-block px-6 py-2 text-sm font-medium leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none my-2">
                                Select Cooler
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            @endif

            @if(isset($components['pc_case']))
                <div class="flex items-center pl-3 bg-gray-700 border border-green-400">
                    <p class="w-2/12 ">KUĆIŠTA</p>
                    <div class="w-9/12">
                        <div class="flex items-center p-3 space-x-3">
                            <img src="images/{{ $components['pc_case']->images()->first()->path }}" alt="" width="100" class="border border-green-400">
                            <p>{{ $components['pc_case']->name  }}</p>
                        </div>
                    </div>
                    <div class="flex">
                    </div>
                    <p class="w-2/12">{{ number_format($components['pc_case']->price,2) }} kn</p>
                    <div class="w-1/12 ">
                        <form action="{{ route('build.pc_case.remove', ['id'=>$components['pc_case']->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="inline-block px-6 py-2 text-sm font-semibold leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripplehover:shadow-lg hover:bg-green-600 focus:outline-none my-2 self-center"  type="submit">
                                X
                            </button>
                        </form>
                    </div>
                </div>
            @else
            <div class="flex items-center pl-3 bg-gray-700 border border-green-400">
                <p class="w-1/5">CASE</p>
                <div class="w-30">
                    <div>
                        <a href="{{ route('build.pc_case', []) }}">
                            <button class="inline-block px-6 py-2 text-sm font-medium leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none my-2">
                                Select a Case
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            @endif
        </div>        
           
            <div class="flex items-center  bg-gray-700 border border-green-400 text-xl p-4">
                <p class="text-gray-300 mr-2 font-medium">TOTAL:</p>
                <p class="font-semibold">4,291.21 kn</p>

            </div>

        </div>

    </div>
    


</div>

@endsection