<div>
    <div class=" lg:mt-10 mt-4 mx-6">
        <a href="{{ route('build', []) }}">
            <button class="inline-block px-6 py-2 text-sm font-semibold leading-6 text-center text-gray-100 uppercase transition bg-green-500 bg-opacity-70 rounded shadow ripple hover:shadow-lg hover:bg-green-700 hover:text-white focus:outline-none my-2 self-center border border-green-400 hover:border-white text-shadow">
                BACK TO THE BUILD
            </button>
        </a>
        <div class="w-full mx-auto my-5 font-semibold text-green-400 ">
            <div class="lg:flex items-center justify-between  bg-gray-900 bg-opacity-70 px-3 py-3">
                <div class="flex justify-between items-center mb-4">
                    
                    
                    <div class="">
                        <svg class="fill-current h-12 mr-4 mb-1 text-green-400" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 128 128"><g><path d="M121.5,48.79a1.75,1.75,0,0,0,0-3.5h-7.1V31.83h7.1a1.75,1.75,0,0,0,0-3.5h-7.1V15.35a1.751,1.751,0,0,0-1.75-1.75H99.67V6.5a1.75,1.75,0,0,0-3.5,0v7.1H82.71V6.5a1.75,1.75,0,0,0-3.5,0v7.1H65.75V6.5a1.75,1.75,0,0,0-3.5,0v7.1H48.79V6.5a1.75,1.75,0,0,0-3.5,0v7.1H31.83V6.5a1.75,1.75,0,0,0-3.5,0v7.1H15.35a1.751,1.751,0,0,0-1.75,1.75V28.33H6.5a1.75,1.75,0,0,0,0,3.5h7.1V45.29H6.5a1.75,1.75,0,0,0,0,3.5h7.1V62.25H6.5a1.75,1.75,0,0,0,0,3.5h7.1V79.21H6.5a1.75,1.75,0,0,0,0,3.5h7.1V96.17H6.5a1.75,1.75,0,0,0,0,3.5h7.1v12.98a1.751,1.751,0,0,0,1.75,1.75H28.33v7.1a1.75,1.75,0,0,0,3.5,0v-7.1H45.29v7.1a1.75,1.75,0,0,0,3.5,0v-7.1H62.25v7.1a1.75,1.75,0,0,0,3.5,0v-7.1H79.21v7.1a1.75,1.75,0,0,0,3.5,0v-7.1H96.17v7.1a1.75,1.75,0,0,0,3.5,0v-7.1h12.98a1.751,1.751,0,0,0,1.75-1.75V99.67h7.1a1.75,1.75,0,0,0,0-3.5h-7.1V82.71h7.1a1.75,1.75,0,0,0,0-3.5h-7.1V65.75h7.1a1.75,1.75,0,0,0,0-3.5h-7.1V48.79ZM110.9,110.9H17.1V17.1h93.8Z"/><path d="M103.65,92.9a1.751,1.751,0,0,0-1.75,1.75v7.25H94.65a1.75,1.75,0,0,0,0,3.5h9a1.751,1.751,0,0,0,1.75-1.75v-9A1.751,1.751,0,0,0,103.65,92.9Z"/><path d="M24.35,105.4h9a1.75,1.75,0,0,0,0-3.5H26.1V94.65a1.75,1.75,0,0,0-3.5,0v9A1.751,1.751,0,0,0,24.35,105.4Z"/><path d="M94.65,26.1h7.25v7.25a1.75,1.75,0,0,0,3.5,0v-9a1.751,1.751,0,0,0-1.75-1.75h-9a1.75,1.75,0,0,0,0,3.5Z"/><path d="M24.35,35.1a1.751,1.751,0,0,0,1.75-1.75V26.1h7.25a1.75,1.75,0,0,0,0-3.5h-9a1.751,1.751,0,0,0-1.75,1.75v9A1.751,1.751,0,0,0,24.35,35.1Z"/><path d="M43.9,75.375a11.455,11.455,0,0,0,8.287-3.583l-2.815-2.625A7.3,7.3,0,0,1,43.9,71.728a7.732,7.732,0,0,1,0-15.456,7.23,7.23,0,0,1,5.44,2.561l2.847-2.656a11.437,11.437,0,1,0-8.287,19.2Z"/><path d="M59.264,67.6h5.568c4.7,0,8.223-3.008,8.223-7.3s-3.519-7.3-8.223-7.3H55.265V74.991h4Zm0-10.912h5.12c2.72,0,4.608,1.376,4.608,3.616S67.1,63.92,64.384,63.92h-5.12Z"/><path d="M85.952,75.375a9.324,9.324,0,0,0,9.7-9.759V53.009H91.679V65.488c0,3.648-2.367,6.271-5.727,6.271-3.328,0-5.7-2.623-5.7-6.271V53.009h-4V65.616A9.342,9.342,0,0,0,85.952,75.375Z"/></g></svg>
                    </div>
                    <p class="mb-1 font-semibold lg:text-3xl text-xl text-gray-200 w-1/3 text-green-400 text-shadow-green">CPUs</p>
                  
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
                                <div class="cursor-pointer border-b-2 border-transparent hover:border-gray-800 hover:text-gray-800 w-full flex items-center" wire:click="sortBy('series')">
                                    @include('partials._sort-icon',['field'=>'series'])
                                    <p>SERIJA</p>
                                </div>
                                <div class="cursor-pointer border-b-2 border-transparent hover:border-gray-800 hover:text-gray-800 w-full flex items-center" wire:click="sortBy('base_clock')">
                                    @include('partials._sort-icon',['field'=>'base_clock'])
                                    <p>RADNI TAKT</p>
                                </div>
                            </div>
                            <div class="cursor-pointer border-b-2 border-transparent hover:border-gray-800 hover:text-gray-800 w-1/2 flex items-center" wire:click="sortBy('core_count')">
                                @include('partials._sort-icon',['field'=>'core_count'])
                                <p>BROJ JEZGRI</p>
                            </div>
                        
                            <p class="w-2/12" "></p>
                        </div>
                    </div>
                </div>
                
                <div class="flex justify-between items-center">
                    <div class="lg:mr-6 ml-6 lg:text-lg text-md ">
                       <label class="text-shadow-green"> Per Page: &nbsp; </label> 
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
                             wire:model.debounce.300ms="search" placeholder="CPUs">
                    </div>
                </div>
                
            </div>
            
            <hr class="lg:mb-6 mb-2 border border-green-400">
            <div class="mb-4 hidden lg:block" >
                <div class="flex justify-left pl-3 text-lg items-center font-semibold text-gray-200  bg-green-600 py-2 rounded-t-sm  select-none bg-opacity-70 space-x-2 text-shadow">
                    <p class="w-1/12 "></p>
                    <div class="sorting-components w-3/12 " wire:click="sortBy('name') ">
                        @include('partials._sort-icon',['field'=>'name'])
                         <p>NAME</p>
                    </div>
                    <div class="sorting-components w-2/12" wire:click="sortBy('manufacturer_id')">
                        @include('partials._sort-icon',['field'=>'manufacturer_id'])
                        <p>MANUFACTURER</p>
                    </div>
                    <div class="sorting-components w-2/12" wire:click="sortBy('series')">
                        @include('partials._sort-icon',['field'=>'series'])
                        <p>SERIES</p>
                    </div>
                    <div class="sorting-components w-1/12" wire:click="sortBy('base_clock')">
                        <div class="hover:text-green-400 ">
                            @include('partials._sort-icon',['field'=>'base_clock'])
                        </div>
                        <p class="leading-tight">CORE CLOCK</p>
                    </div>
                    <div class="sorting-components w-1/12 " wire:click="sortBy('core_count')">
                        @include('partials._sort-icon',['field'=>'core_count'])
                        <p class="leading-tight ">CORE COUNT</p>
                    </div>
                    <p class="w-2/12" "></p>
                </div>

                @foreach ($cpus as $cpu)
                    <div class="flex items-center pl-3 bg-gray-900 bg-opacity-70 border border-green-400 text-lg text-shadow">

                        <div class="w-1/12">
                            <div class="flex items-center py-2 ">
                                <img src="../images/{{ $cpu->images()->first()->path }}" alt="" width="60" class="border-green-500 border">
                            </div>
                        </div>
                        <div class="flex w-3/12" >
                            <p class="">{{ $cpu->name }}</p>
                            
                        </div>
                        <div class="flex w-2/12">
                            <p>{{ $cpu->manufacturer->name }}</p>
                        </div>
                        <div class="w-2/12 ">
                            <p>{{ $cpu->series }} </p>
                        </div>
                        <div class="w-1/12">
                            <p>{{ $cpu->base_clock }}  GB</p>
                        </div>
                        <div class="w-1/12">
                            <p class="ml-4">{{ $cpu->core_count }} </p>
                        </div>
                        
                        <div class="w-1/12 flex justify-center">
                            <input type="hidden" name="id" value="{{ $cpu->id }}">
                            <button class="inline-block px-6 py-2 text-sm font-semibold leading-6 text-center text-gray-900 uppercase transition bg-green-400 rounded shadow ripplehover:shadow-lg hover:bg-green-600 focus:outline-none my-2 self-center hover:text-white "  wire:click='$emit("openModal", "modals.test", @json(["component_id" => "$cpu->id", "component" => "Cpu"]))'>
                                ADD
                            </button>
                        </div>
                        <div class="w-1/12 flex justify-center">
                                <button
                                    class="inline-block px-6 py-2 text-sm font-semibold leading-6 text-center text-gray-700 uppercase transition bg-white rounded shadow ripple hover:shadow-lg hover:bg-gray-400 focus:outline-none my-2 self-center hover:text-white " wire:click='$emit("openModal", "modals.cpus", @json(["cpu" => "$cpu->id"]))'">
                                    DETAILS
                                </button>
                        </div>


                    </div>
                @endforeach


                

            </div>

            <div class="mb-2 lg:hidden"  >
                
                @foreach ($cpus as $cpu)
                    <div class=" items-center pl-3 bg-gray-900 bg-opacity-70 border border-green-400  text-shadow">
                        <div class="flex items-center justify-between space-x-3 pr-2">
                            <div class="w-2/12">
                                <div class="flex items-center py-2 ">
                                    <img src="../images/{{ $cpu->images()->first()->path }}" alt="" width="60" class="border-green-500 border">
                                </div>
                            </div>
                            <div class=" w-3/12" >
                                <p class="">{{ $cpu->name }}</p>
                                
                            </div>
                            
                            <input type="hidden" name="id" value="{{ $cpu->id }}">
                            <button class="inline-block px-6 py-2 text-xs font-semibold leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripplehover:shadow-lg hover:bg-green-600 focus:outline-none my-2 self-center hover:text-white" wire:click='$emit("openModal", "modals.test", @json(["component_id" => "$cpu->id", "component" => "Cpu"]))'>
                                DODAJ
                            </button>
                            
                            <button
                                class="inline-block px-6 py-2 text-xs font-semibold leading-6 text-center text-gray-700 uppercase transition bg-white rounded shadow ripple hover:shadow-lg hover:bg-gray-400 focus:outline-none my-2 self-center hover:text-white" wire:click='$emit("openModal", "modals.cpus", @json(["cpu" => "$cpu->id"]))'>
                                DETALJI
                            </button>
                        </div>
                        <div class="flex">
                            <div class=" w-4/12">
                                <p class="font-light text-sm">PROIZVOĐAČ</p>
                                <p>{{ $cpu->manufacturer->name }}</p>
                            </div>
                            <div class="w-4/12 ">
                                <p class="font-light text-sm">SERIJA</p>
                                <p>{{ $cpu->series }} </p>
                            </div>
                            <div class="w-4/12">
                                <p class="font-light text-sm">RADNI TAKT</p>
                                <p>{{ $cpu->base_clock }}  GB</p>
                            </div>
                        </div>
                        <div class="flex my-2">
                            <div class="w-4/12">
                                <p class="font-light text-sm">VRSTA MEMORIJE</p>
                                <p>{{ $cpu->core_count }} </p>
                            </div>
                        </div>
                    </div>
                @endforeach


                

            </div>
            
            {{ $cpus->links('pagination::tailwind-jag') }}

        </div>
        <!--
        <div class="lg:w-1/6 lg:block w-full mt-24 hidden mr-2">
            
            <div class="border border-green-400  mr-2 ">
                <p class="font-semibold text-gray-200 text-xl pl-3 py-1 bg-green-600 bg-opacity-70">Omiljeno</p>
                <div class="flex items-center justify-between px-5 bg-gray-900 bg-opacity-70 py-2 border-b border-green-400">
                        <p class="text-green-400 font-semibold">cpuMaster 212 EVO </p>
                        <img src="../images/212.jpg" alt="" width="60" class="border border-green-400">
                </div>
                <div class="flex items-center justify-between px-5 bg-gray-900 bg-opacity-70 py-2 border-b border-green-400">
                        <p class="text-green-400 font-semibold">cpuMaster 212 EVO </p>
                        <img src="../images/212.jpg" alt="" width="60" class="border border-green-400">
                </div>
                <div class="flex items-center justify-between px-5 bg-gray-900 bg-opacity-70 py-2 border-b border-green-400">
                        <p class="text-green-400 font-semibold">cpuMaster 212 EVO </p>
                        <img src="../images/212.jpg" alt="" width="60" class="border border-green-400">
                </div>
                <div class="flex items-center justify-between px-5 bg-gray-900 bg-opacity-70 py-2 border-b border-green-400">
                        <p class="text-green-400 font-semibold">cpuMaster 212 EVO </p>
                        <img src="../images/212.jpg" alt="" width="60" class="border border-green-400">
                </div>
            </div>
        </div>
    -->


    </div>
</div>
