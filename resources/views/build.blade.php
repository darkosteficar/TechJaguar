@extends('layouts.app')


@section('content')
@php
    if(count($components['gpus']) > 0){
        $gpu_id = $components['gpus'][0]->id;
    }
    
    
@endphp
<div class="xl:flex mt-10 justify-between mx-6">
   
    <div class="xl:w-3/12 xl:mb-0 mb-3 w-full">
        <div>
            @auth
            @if (!$saved)
                <form action="" method="POST">
                    @csrf
                    <div class="bg-gray-900 bg-opacity-70">
                        <div class="flex text-green-400 items-center pl-2 mb-2 pt-2">
                            <i class="fas fa-save fa-lg mr-2"></i>
                            <p class="text-lg text-gray-300 font-semibold">SAVE THE BUILD:</p>
                        </div>
                        
                        <label for="name" class="mx-2 text-gray-300">Build Name:</label>
                        <input type="text" class=" bg-gray-800 border-green-400 border h-8 rounded-sm focus:border-gray-600 focus:bg-gray-700 pl-4 text-white  font-semibold focus:outline-none focus:ring-0" placeholder="e.g. AMD Build">
                        <button class="btn-green-select ml-4">Store</button>
                    </div>
                </form>
            @else
                <form action="{{ route('build.add', []) }}" method="POST">
                    @csrf
                    <div class="bg-gray-900 bg-opacity-70">
                        <div class="flex text-green-400 items-center pl-2 mb-2 pt-2">
                            <i class="fas fa-plus fa-lg mr-2"></i>
                            <p class="text-lg text-gray-300 font-semibold">NEW BUILD:</p>
                        </div>
                        <div class="2xl:ml-0 xl:ml-2 ml-0">
                            <label for="name" class="mx-2 text-gray-300">Build Name:</label>
                            <input name="name" type="text" class=" bg-gray-800 border-green-400 border  h-8 rounded-sm focus:border-gray-600 focus:bg-gray-700 2xl:ml-0 2xl:mt-0 mt-1 ml-2 text-white  font-semibold focus:outline-none focus:ring-0" placeholder=" e.g. AMD Build">
                            <button class="btn-green-select ml-2 2xl:mt-0 xl:mt-2 mt-0 2xl:text-base text-sm">Store</button>
                        </div>
                        
                    </div>
                </form>
            @endif
            <div>
                <div class="bg-gray-900 bg-opacity-70 mb-2" x-data="{show: false}">
                    <div class="flex text-green-400 items-center pl-2 mb-1 pt-2">
                        <i class="fas fa-list fa-lg mr-2"></i>
                        <p class="text-lg text-gray-300 font-semibold">SAVED BUILDS</p>
                    </div>
                    <button x-show='!show'  class="btn-green-select ml-4 py-1 px-2" @click="show = true">SHOW</button>
                    <button x-show='show' class="btn-green-select ml-4 py-1 px-2" @click="show = false">HIDE</button>
                    <div x-show='show' x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-90"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-90">
                        @foreach (auth()->user()->builds as $build)
                        
                            <div class="flex justify-between items-center ml-4 pb-2">
                                
                                <form action="{{ route('build.select', []) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="build_id" value="{{ $build->id }}">
                                    <p class="text-gray-300 ml-2">{{ $build->name }}</p>
                                    <button class="btn-green-select mr-4 py-1 px-2">SELECT</button>
                                </form>
                                @if ($build->id != request()->cookie('build_id'))
                                    
                                        
                                        <!-- modal div -->
                                        <div class="mt-6" x-data="{ open: false }">

                                            <button class="btn-green-select mr-4 py-1 px-2" @click="open = true">X</button>
                                    
                                            <!-- Dialog (full screen) -->
                                            <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);" x-show="open"  >
                                                
                                            <div class="h-auto p-4 mx-2 text-left bg-gray-900 rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0 " @click.away="open = false">
                                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                <h3 class="text-lg font-medium leading-6 text-gray-200">
                                                    Are you sure you want to delete this build?
                                                </h3>
                                    
                                                <div class="mt-2">
                                                    <p class="text-sm leading-5 text-gray-500">
                                                    {{ $build->name }}
                                                    </p>
                                                </div>
                                            </div>
                                    
                                                <div class="mt-5 sm:mt-6">
                                                <span class="flex w-full justify-between rounded-md shadow-sm">
                                                    <form action="{{ route('build.delete', []) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="build_id" value="{{ $build->id }}">
                                                        <button  class="btn-green-select">
                                                            DELETE
                                                        </button>
                                                    </form>
                                                    <button @click="open = false" class="btn-green-select">
                                                        CANCEL
                                                    </button>
                                                </span>
                                                </div>
                                    
                                            </div>
                                            </div>
                                        </div>
                                  
                                @endif
                                
                               
                            </div>
                        
                        @endforeach
                    </div>
                    
                </div>
            </div>
            @endauth
        </div>
        <div class=" bg-gray-900 bg-opacity-70 border border-green-400 p-2">
            
            <div class="ml-2 flex mb-2 font-medium items-center 2xl:text-lg">
                <i class="fas fa-bolt fa-lg text-green-400 mr-2"></i>
                <p class=" text-gray-300 ">Estimated Wattage: </p>
                <p class=" text-green-400  ml-1"> {{ $power_req }} W</p>
            </div>

            <div class="flex mb-2 items-center 2xl:text-lg">
                <i class="fab fa-artstation fa-lg text-green-400 mr-2"></i>
                <p class="font-medium text-gray-300 ">CPU Manufacturer: </p>
                @if (isset($components['cpu']))
                    <p class=" text-green-400 ml-1  "> {{ $components['cpu']->manufacturer->name }}</p>
                @else
                    <p class=" text-green-400 ml-1"> -</p>
                @endif
            </div>
            <div class="flex mb-2 items-center 2xl:text-lg">
                <i class="fas fa-microchip fa-lg text-green-400 mr-2"></i>
                <p class="font-medium text-gray-300 ">CPU Socket: </p>
                @if (isset($components['cpu']))
                    <p class=" text-green-400 ml-1"> {{ $components['cpu']->socket }}</p>
                @else
                    <p class=" text-green-400 ml-1"> -</p>
                @endif
            </div>
            <div class="flex mb-2 items-center 2xl:text-lg">
                <i class="fas fa-tachometer-alt fa-lg text-green-400 mr-2"></i>
                <p class="font-medium text-gray-300 ">CPU Boost Clock: </p>
                @if (isset($components['cpu']))
                    <p class=" text-green-400  ml-1"> {{ number_format($components['cpu']->boost_clock,2)  }} Ghz</p>
                @else
                    <p class=" text-green-400  ml-1"> -</p>
                @endif
            </div>
            <div class="flex mb-2 items-center 2xl:text-lg">
                <i class="fas fa-memory fa-lg text-green-400 mr-2"></i>
                <p class="font-medium text-gray-300 ">Total RAM: </p>
                @if (isset($others['ram_capacity']))
                    <p class=" text-green-400 ml-1"> {{ $others['ram_capacity'] .' GB'}} </p>
                @else
                    <p class=" text-green-400 ml-1"> -</p>
                @endif
                
            </div>
            <div class="flex mb-2 items-center 2xl:text-lg">
                <i class="fas fa-tachometer-alt fa-lg text-green-400 mr-2"></i>
                <p class="font-medium text-gray-300 ">RAM Speed: </p>
                @if (isset($others['ram_speed']))
                    <p class=" text-green-400 ml-1"> {{ $others['ram_speed'] .' Mhz'}} </p>
                @else
                    <p class=" text-green-400 ml-1"> -</p>
                @endif
            </div>
            
            <div class="flex mb-2 items-center 2xl:text-lg">
                <i class="fas fa-hdd fa-lg text-green-400 mr-2"></i>
                <p class="font-medium text-gray-300 ">HDD+SSD Capacity: </p>
                @if (isset($others['capacity']))
                    <p class=" text-green-400 ml-1"> {{ $others['capacity'] .' GB'}} </p>
                @else
                    <p class=" text-green-400 ml-1"> -</p>
                @endif
                
            </div>
            <div class="flex mb-2 items-center 2xl:text-lg">
                <i class="fas fa-server fa-lg text-green-400 mr-2"></i>
                <p class="font-medium text-gray-300 text-lg">Case type: </p>
                @if (isset($others['case']))
                <p class=" text-green-400 ml-1"> {{ $others['case'] }} </p>
                @else
                    <p class=" text-green-400 ml-1"> -</p>
                @endif
            </div>
            <div class="flex mb-2 items-center 2xl:text-lg">
                <i class="fas fa-fan fa-lg text-green-400 mr-2"></i>
                <p class="font-medium text-gray-300 text-lg">Cooling: </p>
                @if (isset($others['cooler']))
                <p class=" text-green-400 ml-1"> {{ $others['cooler'] }} </p>
                @else
                    <p class=" text-green-400 ml-1"> -</p>
                @endif
            </div>


        </div>
       
        <div class="border border-red-500 font-semibold text-lg mt-2 text-gray-300 p-2 bg-gray-900 bg-opacity-70">
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle mr-2 text-red-500"></i>
                <p>BUILD ERRORS:</p>
            </div>
            
            <div class="bg-gray-900 text-red-500 ">
                <div>
                    @if (count($errors['mobo_case']) > 0)
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1">MOTHERBOARD/CASE</p>
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
                        <p class="text-md text-gray-200 font-normal pt-1 pl-1">MOTHERBOARD/PROCCESOR</p>
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
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1">POWER SUPPLY</p>
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
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1">GPU</p>
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
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1">RAM</p>
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
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1">DATA STORAGE</p>
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
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1">FANS</p>
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
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1">COOLER</p>
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
                <p>WARNINGS:</p>
            </div>
            
            <div class="bg-gray-900 text-yellow-500 ">
                <div>
                    @if (count($warnings['mobo_cpu']) > 0)
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1"> MOTHERBOARD/PROCCESOR</p>
                    
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
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1">POWER SUPPLY</p>
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
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1"> GPU</p>
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
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1">RAM</p>
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
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1">DATA STORAGE</p>
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
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1">FANS</p>
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
                    <p class="text-md text-gray-200 font-normal pt-1 pl-1">COOLER</p>
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
   
    <div class="xl:w-9/12 w-full bg-gray-900 bg-opacity-70  mb-5 font-semibold text-green-400  xl:ml-6">
        
        @if (session()->has('success'))
        <div class="bg-gray-900 bg-opacity-70 text-white font-semibold rounded-sm py-2 mb-2 border border-gray-400 flex">
            <p class="ml-2">{{ session('success') }}</p><p class="ml-2 text-green-400 ">{{ session('item') }}</p><p class="ml-2">{{ session('success2') }}</p>
            
        </div>
        @endif
        <div class="">
            <div class="lg:flex hidden   pb-2 pl-3 text-green-400 bg-opacity-70 shadow-2xl font-light bg:text-gray-900 pt-2 
            ">
                <p class="w-2/12 border-r border-green-400 mr-4 font-semibold">COMPONENT</p>
                <p class="w-6/12 border-r border-green-400 mr-4 font-semibold">SELECTION</p>
                <p class="w-3/12 border-r border-green-400 mr-4 font-semibold">MANUFACTURER</p>
                <p class="w-2/12 border-r border-green-400 mr-4 font-semibold">MSRP</p>
                <p class="w-1/12 mr-2 font-semibold">DELETE</p>
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
                <p class="text-gray-300 mr-2 font-medium">TOTAL:</p>
                <p class="font-semibold">{{ number_format($total,2) }} kn</p>
            </div>
            <p class="text-gray-300 ml-2 py-1 text-sm font-light">Total price is a sum of the MSRPs of the parts</p>

        </div>

    </div>
    
    


</div>

@endsection