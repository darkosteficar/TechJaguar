<div>
    <div class="lg:flex lg:mt-10 mt-4 mx-6">
        <div class="lg:w-1/6 lg:block w-full mt-24 hidden mr-2">
            <a href="{{ route('build', []) }}">
                <button class="inline-block px-6 py-2 text-sm font-semibold leading-6 text-center text-gray-100 uppercase transition bg-green-500 bg-opacity-70 rounded shadow ripple hover:shadow-lg hover:bg-green-700 hover:text-white focus:outline-none my-2 self-center border border-green-400 hover:border-white">
                    Povratak na konfiguraciju
                </button>
            </a>
            <div class="border border-green-400  mr-2 ">
                <p class="font-semibold text-gray-200 text-xl pl-3 py-1 bg-green-600 bg-opacity-70">Omiljeno</p>
                <div class="flex items-center justify-between px-5 bg-gray-900 bg-opacity-70 py-2 border-b border-green-400">
                        <p class="text-green-400 font-semibold">fanMaster 212 EVO </p>
                        <img src="../images/212.jpg" alt="" width="60" class="border border-green-400">
                </div>
                <div class="flex items-center justify-between px-5 bg-gray-900 bg-opacity-70 py-2 border-b border-green-400">
                        <p class="text-green-400 font-semibold">fanMaster 212 EVO </p>
                        <img src="../images/212.jpg" alt="" width="60" class="border border-green-400">
                </div>
                <div class="flex items-center justify-between px-5 bg-gray-900 bg-opacity-70 py-2 border-b border-green-400">
                        <p class="text-green-400 font-semibold">fanMaster 212 EVO </p>
                        <img src="../images/212.jpg" alt="" width="60" class="border border-green-400">
                </div>
                <div class="flex items-center justify-between px-5 bg-gray-900 bg-opacity-70 py-2 border-b border-green-400">
                        <p class="text-green-400 font-semibold">fanMaster 212 EVO </p>
                        <img src="../images/212.jpg" alt="" width="60" class="border border-green-400">
                </div>
            </div>
        </div>
        <div class="lg:w-5/6 w-full mx-auto my-5 font-semibold text-green-400 ">
            <div class="lg:flex items-center justify-between  bg-gray-900 bg-opacity-70 px-3 py-3">
                <div class="flex justify-between  mb-4">
                    <p class="mb-1 font-semibold lg:text-3xl text-xl text-gray-200 w-1/3">VENTILATORI</p>
                    <div x-data="{show: false}" class="w-2/3 ">
                        <button @click="{show = !show}" @click.away="show = false" class="hover:bg-green-400 py-1 px-4 mb-2 font-medium hover:text-gray-800 shadow-2xl rounded-md bg-gray-900 bg-opacity-90 border border-green-400 text-green-400 transition ease-in duration-300 lg:hidden inline-block float-right" >Sorting</button>
                        <div x-show.transition.origin.top.left="show"  class=" justify-left pl-3  items-center  text-gray-200  bg-green-600 py-2 rounded-t-sm  select-none bg-opacity-70 space-y-2 flex-col mb-2">
                            
                            
                            <div class="flex pr-2 space-x-2 mt-10">
                                <div class="cursor-pointer w-full border-b-2 border-transparent hover:border-gray-800 hover:text-gray-800 flex items-center " wire:click="sortBy('name') ">
                                    @include('partials._sort-icon',['field'=>'name'])
                                    <p>IME</p>
                                </div>
                                <div class="cursor-pointer border-b-2 border-transparent hover:border-gray-800 hover:text-gray-800 w-full flex items-center" wire:click="sortBy('manufacturer_id')">
                                    @include('partials._sort-icon',['field'=>'manufacturer_id'])
                                    <p>PROIZVOĐAČ</p>
                                </div>
                            </div>
                            <div class="flex pr-2 space-x-2">
                                <div class="cursor-pointer border-b-2 border-transparent hover:border-gray-800 hover:text-gray-800 w-full flex items-center" wire:click="sortBy('speed')">
                                    @include('partials._sort-icon',['field'=>'speed'])
                                    <p>BRZINA</p>
                                </div>
                                <div class="cursor-pointer border-b-2 border-transparent hover:border-gray-800 hover:text-gray-800 w-full flex items-center" wire:click="sortBy('air_flow')">
                                    @include('partials._sort-icon',['field'=>'air_flow'])
                                    <p>PROTOK ZRAKA</p>
                                </div>
                            </div>
                            <div class="cursor-pointer border-b-2 border-transparent hover:border-gray-800 hover:text-gray-800 w-1/2 flex items-center" wire:click="sortBy('diameter')">
                                @include('partials._sort-icon',['field'=>'diameter'])
                                <p>VELIČINA</p>
                            </div>
                        
                            <p class="w-2/12" "></p>
                        </div>
                    </div>
                </div>
                
                <div class="flex justify-between items-center">
                    <div class="lg:mr-6 ml-6 lg:text-lg text-md ">
                       <label class=""> Po stranici: &nbsp; </label> 
                        <select wire:model="perPage" class="bg-gray-800 rounded-sm font-semibold border border-green-400 text-green-400  py-1">
                            <option>10</option>
                            <option>20</option>
                            <option>40</option>
                            <option>100</option>
                        </select>
                    </div>
                    <div class=" flex items-center text-white  inline-block mr-8">
                        <i class="fas fa-search mr-2 fa-lg text-green-400" ></i>
                        <input type="text"
                            class=" bg-gray-800 border-green-400 border w-full h-10 rounded-sm focus:border-gray-900 focus:bg-green-500 pl-4 text-white lg:text-md text-sm  focus:outline-none focus:ring-0 placeholder-gray-400 focus:placeholder-white"
                             wire:model.debounce.300ms="search" placeholder="Grafičke kartice">
                    </div>
                </div>
                
            </div>
            
            <hr class="lg:mb-6 mb-2 border border-green-400">
            <div class="mb-4 hidden lg:block" >
                <div class="flex justify-left pl-3 text-lg items-center font-semibold text-gray-200  bg-green-600 py-2 rounded-t-sm  select-none bg-opacity-70 space-x-2">
                    <p class="w-1/12 "></p>
                    <div class="cursor-pointer w-3/12 border-b-2 border-transparent hover:border-gray-800 hover:text-gray-800 flex items-center " wire:click="sortBy('name') ">
                        @include('partials._sort-icon',['field'=>'name'])
                         <p>IME</p>
                    </div>
                    <div class="cursor-pointer border-b-2 border-transparent hover:border-gray-800 hover:text-gray-800 w-2/12 flex items-center" wire:click="sortBy('manufacturer_id')">
                        @include('partials._sort-icon',['field'=>'manufacturer_id'])
                        <p>PROIZVOĐAČ</p>
                    </div>
                    <div class="cursor-pointer border-b-2 border-transparent hover:border-gray-800 hover:text-gray-800 w-2/12 flex items-center" wire:click="sortBy('speed')">
                        @include('partials._sort-icon',['field'=>'speed'])
                        <p>BRZINA</p>
                    </div>
                    <div class="cursor-pointer border-b-2 border-transparent hover:border-gray-800 hover:text-gray-800 w-1/12 flex items-center" wire:click="sortBy('air_flow')">
                        @include('partials._sort-icon',['field'=>'air_flow'])
                        <p>PROTOK ZRAKA</p>
                    </div>
                    <div class="cursor-pointer border-b-2 border-transparent hover:border-gray-800 hover:text-gray-800 w-1/12 flex items-center" wire:click="sortBy('diameter')">
                        @include('partials._sort-icon',['field'=>'diameter'])
                        <p>VELIČINA</p>
                    </div>
                    <p class="w-2/12" "></p>
                </div>

                @foreach ($fans as $fan)
                    <div class="flex items-center pl-3 bg-gray-900 bg-opacity-70 border border-green-400 text-lg ">

                        <div class="w-1/12">
                            <div class="flex items-center py-2 ">
                                <img src="../images/{{ $fan->images()->first()->path }}" alt="" width="60" class="border-green-500 border">
                            </div>
                        </div>
                        <div class="flex w-3/12" >
                            <p class="">{{ $fan->name }}</p>
                            
                        </div>
                        <div class="flex w-2/12">
                            <p>{{ $fan->manufacturer->name }}</p>
                        </div>
                        <div class="w-2/12 ">
                            <p>{{ $fan->speed }} RPM</p>
                        </div>
                        <div class="w-1/12">
                            <p>{{ $fan->air_flow }} CFM</p>
                        </div>
                        <div class="w-1/12">
                            <p>{{ $fan->diameter }} cm</p>
                        </div>
                        
                        <div class="w-1/12 flex justify-center">
                            
                            <form action="{{ route('build.fan.add', []) }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $fan->id }}">
                                
                                <button class="inline-block px-6 py-2 text-sm font-semibold leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripplehover:shadow-lg hover:bg-green-600 focus:outline-none my-2 self-center hover:text-white">
                                    DODAJ
                                </button>
                            </form>
    
                        </div>
                        <div class="w-1/12 flex justify-center">
                                <button
                                    class="inline-block px-6 py-2 text-sm font-semibold leading-6 text-center text-gray-700 uppercase transition bg-white rounded shadow ripple hover:shadow-lg hover:bg-gray-400 focus:outline-none my-2 self-center hover:text-white" wire:click='$emit("openModal", "modals.fans", @json(["fan" => "$fan->id"]))'">
                                    DETALJI
                                </button>
                        </div>


                    </div>
                @endforeach


                

            </div>

            <div class="mb-2 lg:hidden"  >
                
                @foreach ($fans as $fan)
                    <div class=" items-center pl-3 bg-gray-900 bg-opacity-70 border border-green-400  ">
                        <div class="flex items-center space-x-3">
                            <div class="w-2/12">
                                <div class="flex items-center py-2 ">
                                    <img src="../images/{{ $fan->images()->first()->path }}" alt="" width="60" class="border-green-500 border">
                                </div>
                            </div>
                            <div class=" w-3/12" >
                                <p class="">{{ $fan->name }}</p>
                                
                            </div>
                            <form action="{{ route('build.fan.add', []) }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $fan->id }}">
                                
                                <button class="inline-block px-6 py-2 text-xs font-semibold leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripplehover:shadow-lg hover:bg-green-600 focus:outline-none my-2 self-center hover:text-white">
                                    DODAJ
                                </button>
                            </form>
                            <button
                                class="inline-block px-6 py-2 text-xs font-semibold leading-6 text-center text-gray-700 uppercase transition bg-white rounded shadow ripple hover:shadow-lg hover:bg-gray-400 focus:outline-none my-2 self-center hover:text-white" wire:click='$emit("openModal", "modals.fans", @json(["fan" => "$fan->id"]))'>
                                DETALJI
                            </button>
                        </div>
                        <div class="flex">
                            <div class=" w-4/12">
                                <p class="font-light text-sm">PROIZVOĐAČ</p>
                                <p>{{ $fan->manufacturer->name }}</p>
                            </div>
                            <div class="w-4/12 ">
                                <p class="font-light text-sm">VELIČINA</p>
                                <p>{{ $fan->diameter }} cm</p>
                            </div>
                            <div class="w-4/12">
                                <p class="font-light text-sm">PROTOK ZRAKA</p>
                                <p>{{ $fan->air_flow }}  CFM</p>
                            </div>
                        </div>
                        <div class="flex my-2">
                            <div class="w-4/12">
                                <p class="font-light text-sm">BRZINA</p>
                                <p>{{ $fan->speed }} </p>
                            </div>
                        </div>
                    </div>
                @endforeach


                

            </div>
            
            {{ $fans->links('pagination::tailwind-jag') }}

        </div>



    </div>
</div>
