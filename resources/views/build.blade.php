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
                @if (isset($components['cpu']))
                    <p class=" text-green-400 text-xl ml-1"> {{ $components['cpu']->manufacturer->name }}</p>
                @else
                    <p class=" text-green-400 text-xl ml-1"> -</p>
                @endif
            </div>
            <div class="flex mb-2 items-center">
                <i class="fas fa-microchip fa-lg text-green-400 mr-2"></i>
                <p class="font-medium text-gray-300 text-lg">CPU Socket: </p>
                @if (isset($components['cpu']))
                    <p class=" text-green-400 text-xl ml-1"> {{ $components['cpu']->socket }}</p>
                @else
                    <p class=" text-green-400 text-xl ml-1"> -</p>
                @endif
            </div>
            <div class="flex mb-2 items-center">
                <i class="fas fa-tachometer-alt fa-lg text-green-400 mr-2"></i>
                <p class="font-medium text-gray-300 text-lg">CPU Boost Clock: </p>
                @if (isset($components['cpu']))
                    <p class=" text-green-400 text-xl ml-1"> {{ number_format($components['cpu']->boost_clock,2)  }} Ghz</p>
                @else
                    <p class=" text-green-400 text-xl ml-1"> -</p>
                @endif
            </div>
            <div class="flex mb-2 items-center">
                <i class="fas fa-memory fa-lg text-green-400 mr-2"></i>
                <p class="font-medium text-gray-300 text-lg">Total RAM: </p>
                @if (isset($others['ram_capacity']))
                    <p class=" text-green-400 text-xl ml-1"> {{ $others['ram_capacity'] .' GB'}} </p>
                @else
                    <p class=" text-green-400 text-xl ml-1"> -</p>
                @endif
                
            </div>
            <div class="flex mb-2 items-center">
                <i class="fas fa-tachometer-alt fa-lg text-green-400 mr-2"></i>
                <p class="font-medium text-gray-300 text-lg">RAM Speed: </p>
                @if (isset($others['ram_speed']))
                    <p class=" text-green-400 text-xl ml-1"> {{ $others['ram_speed'] .' Mhz'}} </p>
                @else
                    <p class=" text-green-400 text-xl ml-1"> -</p>
                @endif
            </div>
            
            <div class="flex mb-2 items-center">
                <i class="fas fa-hdd fa-lg text-green-400 mr-2"></i>
                <p class="font-medium text-gray-300 text-lg">HDD+SSD Capacity: </p>
                @if (isset($others['capacity']))
                    <p class=" text-green-400 text-xl ml-1"> {{ $others['capacity'] .' GB'}} </p>
                @else
                    <p class=" text-green-400 text-xl ml-1"> -</p>
                @endif
                
            </div>
            <div class="flex mb-2 items-center">
                <i class="fas fa-server fa-lg text-green-400 mr-2"></i>
                <p class="font-medium text-gray-300 text-lg">Case type: </p>
                @if (isset($others['case']))
                <p class=" text-green-400 text-xl ml-1"> {{ $others['case'] }} </p>
                @else
                    <p class=" text-green-400 text-xl ml-1"> -</p>
                @endif
            </div>
            <div class="flex mb-2 items-center">
                <i class="fas fa-fan fa-lg text-green-400 mr-2"></i>
                <p class="font-medium text-gray-300 text-lg">Cooling: </p>
                @if (isset($others['cooler']))
                <p class=" text-green-400 text-xl ml-1"> {{ $others['cooler'] }} </p>
                @else
                    <p class=" text-green-400 text-xl ml-1"> -</p>
                @endif
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
                    @if (count($errors['gpus']) > 0)
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1">GRAFIČKA KARTICA</p>
                        @foreach ($errors['gpus'] as $key => $error)
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
                    @if (count($errors['rams']) > 0)
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1">RADNA MEMORIJA</p>
                        @foreach ($errors['rams'] as $key => $error)
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
                    @if (count($errors['storages']) > 0)
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1">POHRANA PODATAKA</p>
                        @foreach ($errors['storages'] as $key => $error)
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
                            <p class="text-yellow-500 text-sm p-1">{{ $counter+1 .'.'. $warning }}</p>
                            @php
                                $counter++;
                            @endphp
                        @endforeach
                    @endif
                </div>
                <div>
                    @if (count($warnings['gpus']) > 0)
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1">GRAFIČKA KARTICA</p>
                        @foreach ($warnings['gpu'] as $key => $warning)
                            @php
                                $counter = (int)$key;
                            @endphp
                            <p class="text-yellow-500 text-sm p-1">{{ $counter+1 .'.'. $warning }}</p>
                            @php
                                $counter++;
                            @endphp
                        @endforeach
                    @endif
                </div>
                <div>
                    @if (count($warnings['rams']) > 0)
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1">RADNA MEMORIJA</p>
                        @foreach ($warnings['rams'] as $key => $warning)
                            @php
                                $counter = (int)$key;
                            @endphp
                            <p class="text-yellow-500 text-sm p-1">{{ $counter+1 .'.'. $warning }}</p>
                            @php
                                $counter++;
                            @endphp
                        @endforeach
                    @endif
                </div>
                <div>
                    @if (count($warnings['storages']) > 0)
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1">POHRANA PODATAKA</p>
                        @foreach ($warnings['storage'] as $key => $warning)
                            @php
                                $counter = (int)$key;
                            @endphp
                            <p class="text-yellow-500 text-sm p-1">{{ $counter+1 .'.'. $warning }}</p>
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
                            <p class="text-yellow-500 text-sm p-1">{{ $counter+1 .'.'. $warning }}</p>
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
                            <p class="text-yellow-500 text-sm p-1">{{ $counter+1 .'.'. $warning }}</p>
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
            <livewire:build.cpus :cpu="$components['cpu']" :errors="$errors_components"/>
             
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
            <livewire:build.gpus :gpus="$components['gpus']" :errors="$errors_components"/>
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
            <livewire:build.rams :rams="$components['rams']" :errors="$errors_components"/>
               
                    
                
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
            <livewire:build.storages :storages="$components['storages']" :errors="$errors_components"/>
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
            <livewire:build.fans :fans="$components['fans']" :errors="$errors_components"/>
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
            <livewire:build.mobo :mobo="$components['mobo']" :errors="$errors_components"/>
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
            <livewire:build.psu :psu="$components['psu']" :errors="$errors_components"/>
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
                <livewire:build.cooler :cooler="$components['cooler']" :errors="$errors_components"/>
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
                <livewire:build.pc-case :pc_case="$components['pc_case']" :errors="$errors_components"/>
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