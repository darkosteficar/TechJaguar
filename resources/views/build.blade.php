@extends('layouts.app')


@section('content')
@php
    if(count($components['gpus']) > 0){
        $gpu_id = $components['gpus'][0]->id;
    }
    
    
@endphp
<div class="flex mt-10 justify-between mx-24">
    <div class="w-3/12">
        <div class=" bg-gray-900 bg-opacity-70 border border-green-400 p-2">
            <div class="ml-2 flex mb-2 font-medium items-center">
                <i class="fas fa-bolt fa-lg text-green-400 mr-2"></i>
                <p class=" text-gray-300 text-lg">Estimated Wattage: </p>
                <p class=" text-green-400 text-xl ml-1"> {{ $power_req }} W</p>
            </div>

            <div class="flex mb-2 items-center">
                <i class="fab fa-artstation fa-lg text-green-400 mr-2"></i>
                <p class="font-medium text-gray-300 text-lg">CPU Manufacturer: </p>
                <p class=" text-green-400 text-xl ml-1"> AMD</p>
            </div>
            <div class="flex mb-2 items-center">
                <i class="fas fa-microchip fa-lg text-green-400 mr-2"></i>
                <p class="font-medium text-gray-300 text-lg">CPU Socket: </p>
                <p class=" text-green-400 text-xl ml-1"> AM4</p>
            </div>
            <div class="flex mb-2 items-center">
                <i class="fas fa-tachometer-alt fa-lg text-green-400 mr-2"></i>
                <p class="font-medium text-gray-300 text-lg">CPU Boost Clock: </p>
                <p class=" text-green-400 text-xl ml-1"> AM4</p>
            </div>
            <div class="flex mb-2 items-center">
                <i class="fas fa-memory fa-lg text-green-400 mr-2"></i>
                <p class="font-medium text-gray-300 text-lg">Total RAM: </p>
                <p class=" text-green-400 text-xl ml-1"> -</p>
            </div>
            <div class="flex mb-2 items-center">
                <i class="fas fa-tachometer-alt fa-lg text-green-400 mr-2"></i>
                <p class="font-medium text-gray-300 text-lg">RAM Speed: </p>
                <p class=" text-green-400 text-xl ml-1"> -</p>
            </div>
            
            <div class="flex mb-2 items-center">
                <i class="fas fa-hdd fa-lg text-green-400 mr-2"></i>
                <p class="font-medium text-gray-300 text-lg">HDD+SSD Capacity: </p>
                <p class="font-semibold text-green-400 text-xl ml-1"> -</p>
            </div>
            <div class="flex mb-2 items-center">
                <i class="fas fa-server fa-lg text-green-400 mr-2"></i>
                <p class="font-medium text-gray-300 text-lg">Case type: </p>
                <p class="font-semibold text-green-400 text-xl ml-1"> -</p>
            </div>
            <div class="flex mb-2 items-center">
                <i class="fas fa-fan fa-lg text-green-400 mr-2"></i>
                <p class="font-medium text-gray-300 text-lg">Cooling: </p>
                <p class="font-semibold text-green-400 text-xl ml-1"> -</p>
            </div>


        </div>
       
        <div class="border border-red-500 font-semibold text-lg mt-2 text-gray-300 p-2 bg-gray-900 bg-opacity-70">
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle mr-2 text-red-500"></i>
                <p>GREŠKE KOMPATIBILNOSTI:</p>
            </div>
            
            <div class="bg-gray-900 text-red-500 ">
                <div>
                    @if (count($errors['mobo_case']) > 0)
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1">MATIČNA PLOČA/KUČIŠTE</p>
                        @foreach ($errors['mobo_case'] as $key => $error)
                        @php
                            $counter = (int)$key;
                        @endphp
                            <p class=" text-sm p-1">{{ $counter+1 .'.'. $error }}</p>
                        @endforeach
                    @endif
                </div>
                <div>
                    @if (count($errors['mobo_cpu']) > 0)
                        <p class="text-md text-gray-200 font-normal pt-1 pl-1">MATIČNA PLOČA/PROCESOR</p>
                        @foreach ($errors['mobo_cpu'] as $key => $error)
                            @php
                                $counter = (int)$key;
                            @endphp
                            <p class="text-red-500 text-sm p-1">{{ $counter+1 .'.'. $error }}</p>
                            @php
                                $counter++;
                            @endphp
                        @endforeach
                    @endif
                </div>
                <div>
                    @if (count($errors['psu']) > 0)
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1">NAPAJANJE</p>
                        @foreach ($errors['psu'] as $key => $error)
                            @php
                                $counter = (int)$key;
                            @endphp
                            <p class="text-red-500 text-sm p-1">{{ $counter+1 .'.'. $error }}</p>
                            @php
                                $counter++;
                            @endphp
                        @endforeach
                    @endif
                </div>
                <div>
                    @if (count($errors['gpu']) > 0)
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1">GRAFIČKA KARTICA</p>
                        @foreach ($errors['gpu'] as $key => $error)
                            @php
                                $counter = (int)$key;
                            @endphp
                            <p class="text-red-500 text-sm p-1">{{ $counter+1 .'.'. $error }}</p>
                            @php
                                $counter++;
                            @endphp
                        @endforeach
                    @endif
                </div>
                <div>
                    @if (count($errors['ram']) > 0)
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1">RADNA MEMORIJA</p>
                        @foreach ($errors['ram'] as $key => $error)
                            @php
                                $counter = (int)$key;
                            @endphp
                            <p class="text-red-500 text-sm p-1">{{ $counter+1 .'.'. $error }}</p>
                            @php
                                $counter++;
                            @endphp
                        @endforeach
                    @endif
                </div>
                <div>
                    @if (count($errors['storage']) > 0)
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1">POHRANA PODATAKA</p>
                        @foreach ($errors['storage'] as $key => $error)
                            @php
                                $counter = (int)$key;
                            @endphp
                            <p class="text-red-500 text-sm p-1">{{ $counter+1 .'.'. $error }}</p>
                            @php
                                $counter++;
                            @endphp
                        @endforeach
                    @endif
                </div>
                <div>
                    @if (count($errors['fans']) > 0)
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1">VENTILATORI</p>
                        @foreach ($errors['fans'] as $key => $error)
                            @php
                                $counter = (int)$key;
                            @endphp
                            <p class="text-red-500 text-sm p-1">{{ $counter+1 .'.'. $error }}</p>
                            @php
                                $counter++;
                            @endphp
                        @endforeach
                    @endif
                </div>
                <div>
                    @if (count($errors['cooler']) > 0)
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1">HLADNJAK</p>
                        @foreach ($errors['cooler'] as $key => $error)
                            @php
                                $counter = (int)$key;
                            @endphp
                            <p class="text-red-500 text-sm p-1">{{ $counter+1 .'.'. $error }}</p>
                            @php
                                $counter++;
                            @endphp
                        @endforeach
                    @endif
                </div>

            </div>
        </div>
        <div class="border border-yellow-500 font-semibold text-lg mt-2 text-gray-300 p-2 bg-gray-900 bg-opacity-70">
            <div class="flex items-center">
                <i class="fas fa-exclamation-triangle mr-2 text-yellow-500"></i>
                <p>UPOZORENJA:</p>
            </div>
            
            <div class="bg-gray-900 text-yellow-500 ">
                <div>
                    @if (count($warnings['mobo_cpu']) > 0)
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1">MATIČNA PLOČA/PROCESOR</p>
                    
                        @foreach ($warnings['mobo_cpu'] as $key => $warning)
                        @php
                            $counter = (int)$key;
                        @endphp
                            <p class=" text-sm p-1">{{ $counter+1 .'.'. $warning }}</p>
                        @endforeach
                    @endif
                </div>
                <div>
                    @if (count($warnings['psu']) > 0)
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1">NAPAJANJE</p>
                        @foreach ($warnings['psu'] as $key => $warning)
                            @php
                                $counter = (int)$key;
                            @endphp
                            <p class="text-red-500 text-sm p-1">{{ $counter+1 .'.'. $warning }}</p>
                            @php
                                $counter++;
                            @endphp
                        @endforeach
                    @endif
                </div>
                <div>
                    @if (count($warnings['gpu']) > 0)
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1">GRAFIČKA KARTICA</p>
                        @foreach ($warnings['gpu'] as $key => $warning)
                            @php
                                $counter = (int)$key;
                            @endphp
                            <p class="text-red-500 text-sm p-1">{{ $counter+1 .'.'. $warning }}</p>
                            @php
                                $counter++;
                            @endphp
                        @endforeach
                    @endif
                </div>
                <div>
                    @if (count($warnings['ram']) > 0)
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1">RADNA MEMORIJA</p>
                        @foreach ($warnings['ram'] as $key => $warning)
                            @php
                                $counter = (int)$key;
                            @endphp
                            <p class="text-red-500 text-sm p-1">{{ $counter+1 .'.'. $warning }}</p>
                            @php
                                $counter++;
                            @endphp
                        @endforeach
                    @endif
                </div>
                <div>
                    @if (count($warnings['storage']) > 0)
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1">POHRANA PODATAKA</p>
                        @foreach ($warnings['storage'] as $key => $warning)
                            @php
                                $counter = (int)$key;
                            @endphp
                            <p class="text-red-500 text-sm p-1">{{ $counter+1 .'.'. $warning }}</p>
                            @php
                                $counter++;
                            @endphp
                        @endforeach
                    @endif
                </div>
                <div>
                    @if (count($warnings['fans']) > 0)
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1">VENTILATORI</p>
                        @foreach ($warnings['fans'] as $key => $warning)
                            @php
                                $counter = (int)$key;
                            @endphp
                            <p class="text-red-500 text-sm p-1">{{ $counter+1 .'.'. $warning }}</p>
                            @php
                                $counter++;
                            @endphp
                        @endforeach
                    @endif
                </div>
                <div>
                    @if (count($warnings['cooler']) > 0)
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1">HLADNJAK</p>
                        @foreach ($warnings['cooler'] as $key => $warning)
                            @php
                                $counter = (int)$key;
                            @endphp
                            <p class="text-red-500 text-sm p-1">{{ $counter+1 .'.'. $warning }}</p>
                            @php
                                $counter++;
                            @endphp
                        @endforeach
                    @endif
                </div>
            </div>
          
        </div>
    </div>
    <div class="w-9/12 bg-gray-900 bg-opacity-70  mb-5 font-semibold text-green-400  ml-6">
        
        @if (session()->has('success'))
        <div class="bg-gray-900 bg-opacity-70 text-white font-semibold rounded-sm py-2 mb-2 border border-gray-400 flex">
            <p class="ml-2">{{ session('success') }}</p><p class="ml-2 text-green-400 ">{{ session('item') }}</p><p class="ml-2">{{ session('success2') }}</p>
            
        </div>
        @endif
        <div class="">
            <div class="flex pb-2 pl-3 bg-green-400 bg-opacity-70 shadow-2xl font-light text-gray-900 pt-2">
                <p class="w-2/12 border-r border-gray-900 mr-4">KOMPONENTA</p>
                <p class="w-6/12 border-r border-gray-900 mr-4 ">ODABIR</p>
                <p class="w-3/12 border-r border-gray-900 mr-4">PROIZVOĐAČ</p>
                <p class="w-2/12 border-r border-gray-900 mr-4">MSRP</p>
                <p class="w-1/12 ">BRISANJE</p>
            </div>


            @if(isset($components['cpu']))
                
                <div class="flex items-center border border-green-400 font-medium">
                    <div class="w-2/12 ml-3 text-lg ">
                        <p class=" border p-2 inline border-gray-800 ">CPU</p>
                    </div>
                    
                    <div class="w-6/12">
                        <div class="flex items-center p-3 space-x-3">
                            <img src="images/{{ $components['cpu']->images()->first()->path }}" alt="" width="100" class="border border-green-400">
                            <p>{{ $components['cpu']->name }}</p>
                        </div>
                    </div>
                    <div class="w-3/12">
                        <p class=" border p-2 inline border-gray-800 ">{{ $components['cpu']->manufacturer->name }}</p>
                    </div>
                    <p class="w-2/12">{{ number_format($components['cpu']->price,2) }} kn</p>
                    <div class="w-1/12 ">
                        <form action="{{ route('build.cpu.remove', ['id'=>$components['cpu']->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn-green-remove"  type="submit">
                                X
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <div class="flex items-center pl- border-2 border-gray-900">
                    <p class="w-1/5 ml-3">CPU</p>
                    <div class="w-30">
                        <div>
                            <a href="{{ route('build.cpu', []) }}">
                                <button class="btn-green-select">
                                    Select CPU
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            @if(count($components['gpus']) > 0)
                
                <div class="pl- border border-green-400 font-medium">
                    <div class="flex items-center">
                        <div class="w-2/12  text-lg ">
                            <p class=" border p-2 ml-3 inline border-gray-800 ">GPUS</p>
                        </div>
                        <div class="w-11/12 ">
                            @foreach ($components['gpus'] as $gpu)
                            
                            <div class="flex items-center  ">
                                <div class="w-6/12">
                                    <div class="flex items-center py-3 px-2 space-x-3">
                                        <img src="images/{{ $gpu->images()->first()->path }}" alt="" width="100" class="border border-green-400">
                                        <p>{{ $gpu->name  }}</p>
                                    </div>
                                </div>
                                <div class="w-3/12">
                                    <p class=" border p-2 inline border-gray-800 ">{{ $gpu->manufacturer->name }}</p>
                                </div>
                                <p class="w-2/12">{{ number_format($gpu->price,2) }} kn</p>
                                <div class="w-1/12 ">
                                    <form action="{{ route('build.gpu.remove', ['id'=>$gpu->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-green-remove"  type="submit">
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
                        <button class="btn-green-select mb-4 text-sm ml-64">
                            Add another GPU
                        </button>  
                    </form>
                           
                </div>
                    
                
            @else
                <div class="flex items-center pl- border-2 border-gray-900">
                    <p class="w-1/5 ml-3">GPU</p>
                    <div class="w-30">
                        <div>
                            <a href="{{ route('build.gpu', []) }}">
                                <button class="btn-green-select">
                                    Select GPU
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            @endif

           
            @if(count($components['rams']) > 0)
                
                <div class="font-medium border border-green-400">
                    <div class="flex items-center">
                        <div class="w-2/12  text-lg ">
                            <p class=" border p-2 ml-3 inline border-gray-800 ">RAM</p>
                        </div>
                        <div class="w-11/12 ">
                            @foreach ($components['rams'] as $ram)
                            
                            <div class="flex items-center  ">
                                <div class="w-6/12">
                                    <div class="flex items-center p-3 space-x-3">
                                        <img src="images/{{ $ram->images()->first()->path }}" alt="" width="100" class="border border-green-400">
                                        <p>{{ $ram->name  }}</p>
                                    </div>
                                </div>
                                <div class="w-3/12">
                                    <p class=" border p-2 inline border-gray-800 ">{{ $ram->manufacturer->name }}</p>
                                </div>
                                <p class="w-2/12">{{ number_format($ram->price,2) }} kn</p>
                                <div class="w-1/12 ">
                                    <form action="{{ route('build.ram.remove', ['id'=>$ram->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-green-remove"  type="submit">
                                            X
                                        </button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <a href="{{ route('build.ram', []) }}">
                        <button class="btn-green-select ml-64">
                            Select RAM
                        </button>
                    </a>
                           
                </div>
                    
                
            @else
                <div class="flex items-center pl- border border-gray-900">
                    <p class="w-1/5 ml-3">RAM</p>
                    <div class="w-30">
                        <div>
                            <a href="{{ route('build.ram', []) }}">
                                <button class="btn-green-select ">
                                    Select RAM
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            @if(count($components['storages']) > 0)
                
                <div class="font-medium border border-green-400">
                    <div class="flex items-center">
                        <div class="w-2/12  text-lg ">
                            <p class=" border p-2 ml-3 inline border-gray-800 ">HDD/SSD</p>
                        </div>
                        <div class="w-11/12 ">
                            @foreach ($components['storages'] as $storage)
                           
                            <div class="flex items-center  ">
                                <div class="w-6/12">
                                    <div class="flex items-center p-3 space-x-3">
                                        <img src="images/{{ $storage->images()->first()->path }}" alt="" width="100" class="border border-green-400">
                                        <p>{{ $storage->name  }}</p>
                                    </div>
                                </div>
                                <div class="w-3/12">
                                    <p class=" border p-2 inline border-gray-800 ">{{ $storage->manufacturer->name }}</p>
                                </div>
                                <p class="w-2/12">{{ number_format($storage->price,2) }} kn</p>
                                <div class="w-1/12 ">
                                    <form action="{{ route('build.storage.remove', ['id'=>$storage->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-green-remove"  type="submit">
                                            X
                                        </button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <a href="{{ route('build.storage', []) }}">
                        <button class="btn-green-select ml-64">
                            Select HDD/SSD
                        </button>
                    </a>
                           
                </div>
                    
                
            @else
                <div class="flex items-center pl- border border-gray-900">
                    <p class="w-1/5 ml-3">HDD/SSD</p>
                    <div class="w-30">
                        <div>
                            <a href="{{ route('build.storage', []) }}">
                                <button class="btn-green-select ">
                                    Select HDD/SSD
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            @if(count($components['fans']) > 0)
                
                <div class="font-medium border border-green-400">
                    <div class="flex items-center">
                        <div class="w-2/12  text-lg ">
                            <p class=" border p-2 ml-3 inline border-gray-800 ">FAN</p>
                        </div>
                        <div class="w-11/12 ">
                            @foreach ($components['fans'] as $fan)
                            <div class="flex items-center  ">
                                <div class="w-6/12">
                                    <div class="flex items-center p-3 space-x-3">
                                        <img src="images/{{ $fan->images()->first()->path }}" alt="" width="100" class="border border-green-400">
                                        <p>{{ $fan->name  }}</p>
                                    </div>
                                </div>
                                <div class="w-3/12">
                                    <p class=" border p-2 inline border-gray-800 ">{{ $fan->manufacturer->name }}</p>
                                </div>
                                <p class="w-2/12">{{ number_format($fan->price,2) }} kn</p>
                                <div class="w-1/12 ">
                                    <form action="{{ route('build.fan.remove', ['id'=>$fan->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-green-remove"  type="submit">
                                            X
                                        </button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <a href="{{ route('build.fan', []) }}">
                        <button class="btn-green-select ml-64">
                            Select FAN
                        </button>
                    </a>
                           
                </div>
                    
                
            @else
                <div class="flex items-center pl- border border-gray-900">
                    <p class="w-1/5 ml-3">FAN</p>
                    <div class="w-30">
                        <div>
                            <a href="{{ route('build.fan', []) }}">
                                <button class="btn-green-select ">
                                    Select FAN
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            @if(isset($components['mobo']))
                <div class="flex items-center border  @if (in_array('mobo',$errors_components))
                    border-red-400 my-1 bg-red-500 bg-opacity-10
                @else
                    border-green-400
                @endif font-medium">
                    <div class="w-2/12 ml-3 text-lg ">
                        <p class=" border p-2 inline border-gray-800 ">MOBO</p>
                    </div>
                    
                    <div class="w-6/12">
                        <div class="flex items-center p-3 space-x-3">
                            <img src="images/{{ $components['mobo']->images()->first()->path }}" alt="" width="100" class="border border-green-400">
                            <p>{{ $components['mobo']->name }}</p>
                        </div>
                    </div>
                    <div class="w-3/12">
                        <p class=" border p-2 inline border-gray-800 ">{{ $components['mobo']->manufacturer->name }}</p>
                    </div>
                    <p class="w-2/12">{{ number_format($components['mobo']->price,2) }} kn</p>
                    <div class="w-1/12 ">
                        <form action="{{ route('build.mobo.remove', ['id'=>$components['mobo']->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn-green-remove"  type="submit">
                                X
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <div class="flex items-center pl- border-2 border-gray-900">
                    <p class="w-1/5 ml-3">MOBO</p>
                    <div class="w-30">
                        <div>
                            <a href="{{ route('build.mobo', []) }}">
                                <button class="btn-green-select">
                                    Select MOBO
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            @if(isset($components['psu']))
                <div class="flex items-center border border-green-400 font-medium">
                    <div class="w-2/12 ml-3 text-lg ">
                        <p class=" border p-2 inline border-gray-800 ">PSU</p>
                    </div>
                    
                    <div class="w-6/12">
                        <div class="flex items-center p-3 space-x-3">
                            <img src="images/{{ $components['psu']->images()->first()->path }}" alt="" width="100" class="border border-green-400">
                            <p>{{ $components['psu']->name }}</p>
                        </div>
                    </div>
                    <div class="w-3/12">
                        <p class=" border p-2 inline border-gray-800 ">{{ $components['psu']->manufacturer->name }}</p>
                    </div>
                    <p class="w-2/12">{{ number_format($components['psu']->price,2) }} kn</p>
                    <div class="w-1/12 ">
                        <form action="{{ route('build.psu.remove', ['id'=>$components['psu']->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn-green-remove"  type="submit">
                                X
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <div class="flex items-center pl- border-2 border-gray-900">
                    <p class="w-1/5 ml-3">PSU</p>
                    <div class="w-30">
                        <div>
                            <a href="{{ route('build.psu', []) }}">
                                <button class="btn-green-select">
                                    Select PSU
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            @endif


            @if(isset($components['cooler']))
              
                <div class="flex items-center border border-green-400 font-medium">
                    <div class="w-2/12 ml-3 text-lg ">
                        <p class=" border p-2 inline border-gray-800 ">COOLER</p>
                    </div>
                    
                    <div class="w-6/12">
                        <div class="flex items-center p-3 space-x-3">
                            <img src="images/{{ $components['cooler']->images()->first()->path }}" alt="" width="100" class="border border-green-400">
                            <p>{{ $components['cooler']->name }}</p>
                        </div>
                    </div>
                    <div class="w-3/12">
                        <p class=" border p-2 inline border-gray-800 ">{{ $components['cooler']->manufacturer->name }}</p>
                    </div>
                    <p class="w-2/12">{{ number_format($components['cooler']->price,2) }} kn</p>
                    <div class="w-1/12 ">
                        <form action="{{ route('build.cooler.remove', ['id'=>$components['cooler']->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn-green-remove"  type="submit">
                                X
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <div class="flex items-center pl- border-2 border-gray-900">
                    <p class="w-1/5 ml-3">COOLER</p>
                    <div class="w-30">
                        <div>
                            <a href="{{ route('build.cooler', []) }}">
                                <button class="btn-green-select">
                                    Select COOLER
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            @if(isset($components['pc_case']))
               
                <div class="flex items-center border @if (in_array('case',$errors_components))
                border-red-400 my-1
                @else
                    border-green-400
                @endif font-medium">
                    <div class="w-2/12 ml-3 text-lg ">
                        <p class=" border p-2 inline border-gray-800 ">CASE</p>
                    </div>
                    
                    <div class="w-6/12">
                        <div class="flex items-center p-3 space-x-3">
                            <img src="images/{{ $components['pc_case']->images()->first()->path }}" alt="" width="100" class="border border-green-400">
                            <p>{{ $components['pc_case']->name }}</p>
                        </div>
                    </div>
                    <div class="w-3/12">
                        <p class=" border p-2 inline border-gray-800 ">{{ $components['pc_case']->manufacturer->name }}</p>
                    </div>
                    <p class="w-2/12">{{ number_format($components['pc_case']->price,2) }} kn</p>
                    <div class="w-1/12 ">
                        <form action="{{ route('build.pc_case.remove', ['id'=>$components['pc_case']->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn-green-remove"  type="submit">
                                X
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <div class="flex items-center pl- border-2 border-gray-900">
                    <p class="w-1/5 ml-3">CASE</p>
                    <div class="w-30">
                        <div>
                            <a href="{{ route('build.pc_case', []) }}">
                                <button class="btn-green-select">
                                    Select CASE
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>        
           
            <div class="flex items-center border border-green-400 text-xl p-4">
                <p class="text-gray-300 mr-2 font-medium">UKUPNO:</p>
                <p class="font-semibold">{{ number_format($total,2) }} kn</p>
            </div>
            <p class="text-gray-300 ml-2 py-1 text-sm font-light">Ukupna cijena koja se prikazuje je zbroj preporučenih cijena od strane proizvođača</p>

        </div>

    </div>
    


</div>

@endsection