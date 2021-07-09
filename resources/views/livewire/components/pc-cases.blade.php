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
                        <svg class="fill-current h-12 mr-4 mb-1 text-green-400" id="Layer_3"  viewBox="0 0 64 64"  xmlns="http://www.w3.org/2000/svg" data-name="Layer 3"><path d="m50.515 7.143-10-6a1 1 0 0 0 -.515-.143h-16a1 1 0 0 0 -.515.143l-10 6a1 1 0 0 0 -.485.857v50a1 1 0 0 0 .293.707l4 4a1 1 0 0 0 .707.293h28a1 1 0 0 0 .707-.293l4-4a1 1 0 0 0 .293-.707v-50a1 1 0 0 0 -.485-.857zm-5.515 35.857h-26v-2h26zm0-4h-26v-6h26zm-26 6h5v16h-5zm7 0h12v16h-12zm14 0h5v16h-5zm-15.723-42h15.446l5.277 3.166v24.834h-26v-24.834zm-9.277 5.566 2-1.2v52.22l-2-2zm34 49.02-2 2v-52.22l2 1.2z"/><path d="m32 24a6 6 0 0 0 3.6-10.8l-1.2 1.6a4 4 0 1 1 -4.8 0l-1.2-1.6a6 6 0 0 0 3.6 10.8z"/><path d="m31 10h2v6h-2z"/><path d="m37 35h2v2h-2z"/><path d="m41 35h2v2h-2z"/><path d="m32 48a4 4 0 1 0 4 4 4 4 0 0 0 -4-4zm0 6a2 2 0 1 1 2-2 2 2 0 0 1 -2 2z"/></svg>
                    </div>
                    <p class="mb-1 font-semibold lg:text-3xl text-xl text-gray-200 w-1/3 text-green-400 text-shadow-green">PC CASES</p>
                    
                  
                    <div x-data="{show: false}" class="w-2/3 ">
                        <button @click="{show = !show}" @click.away="show = false" class="hover:bg-green-400 py-1 px-4 mb-2 font-medium hover:text-gray-800 shadow-2xl rounded-md bg-gray-900 bg-opacity-90 border border-green-400 text-green-400 transition ease-in duration-300 lg:hidden inline-block float-right" >Sorting</button>
                        <div x-show.transition.origin.top.left="show"  class=" justify-left pl-3  items-center  text-gray-200  bg-green-600 py-2 rounded-t-sm  select-none bg-opacity-70 space-y-2 flex-col mb-2">
                            
                            
                            <div class="flex pr-2 space-x-2 mt-10">
                                <div class="cursor-pointer w-full border-b-2 border-transparent hover:border-gray-800 hover:text-gray-800 flex items-center " wire:click="sortBy('name') ">
                                    @include('partials._sort-icon',['field'=>'name'])
                                    <p>NAME</p>
                                </div>
                                <div class="cursor-pointer border-b-2 border-transparent hover:border-gray-800 hover:text-gray-800 w-full flex items-center" wire:click="sortBy('manufacturer_id')">
                                    @include('partials._sort-icon',['field'=>'manufacturer_id'])
                                    <p>MANUFACTURER</p>
                                </div>
                            </div>
                            <div class="flex pr-2 space-x-2">
                                <div class="cursor-pointer border-b-2 border-transparent hover:border-gray-800 hover:text-gray-800 w-full flex items-center" wire:click="sortBy('type')">
                                    @include('partials._sort-icon',['field'=>'type'])
                                    <p>TYPE</p>
                                </div>
                                <div class="cursor-pointer border-b-2 border-transparent hover:border-gray-800 hover:text-gray-800 w-full flex items-center" wire:click="sortBy('type')">
                                    @include('partials._sort-icon',['field'=>'height'])
                                    <p>HEIGHT</p>
                                </div>
                            </div>
                            <div class="cursor-pointer border-b-2 border-transparent hover:border-gray-800 hover:text-gray-800 w-1/2 flex items-center" wire:click="sortBy('max_gpu_length')">
                                @include('partials._sort-icon',['field'=>'max_gpu_length'])
                                <p>MAX GPU LENGTH</p>
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
                             wire:model.debounce.300ms="search" placeholder="PC Cases">
                    </div>
                </div>
                
            </div>
            
            <hr class="lg:mb-6 mb-2 border border-green-400">
            <div class="mb-4 hidden lg:block" >
                <div class="flex justify-left pl-3 text-lg items-center font-semibold text-gray-200  bg-green-600 py-2 rounded-t-sm  select-none bg-opacity-70 space-x-2 text-shadow">
                    <p class="w-1/12 "></p>
                    <div class="sorting-components w-3/12 py-3" wire:click="sortBy('name') ">
                        @include('partials._sort-icon',['field'=>'name'])
                         <p>NAME</p>
                    </div>
                    <div class="sorting-components w-2/12 py-3" wire:click="sortBy('manufacturer_id')">
                        @include('partials._sort-icon',['field'=>'manufacturer_id'])
                        <p>MANUFACTURER</p>
                    </div>
                    <div class="sorting-components w-2/12 py-3" wire:click="sortBy('type')">
                        @include('partials._sort-icon',['field'=>'type'])
                        <p>TYPE</p>
                    </div>
                    <div class="sorting-components w-1/12 py-1" wire:click="sortBy('height')">
                        <div class="hover:text-green-400 ">
                            @include('partials._sort-icon',['field'=>'height'])
                        </div>
                        <p class="leading-tight py-3">HEIGHT</p>
                    </div>
                    <div class="sorting-components w-1/12 leading-tight py-1" wire:click="sortBy('max_gpu_length')">
                        @include('partials._sort-icon',['field'=>'max_gpu_length'])
                        <p class="">MAX GPU LENGTH</p>
                    </div>
                    <p class="w-2/12" ></p>
                </div>

                @foreach ($pcCases as $pcCase)
                    <div class="flex items-center pl-3 bg-gray-900 bg-opacity-70 border border-green-400 2xl:text-lg text-shadow">

                        <div class="w-1/12">
                            <div class="flex items-center py-2 ">
                                <img src="../images/{{ $pcCase->images()->first()->path }}" alt="" width="60" class="border-green-500 border">
                            </div>
                        </div>
                        <div class="flex w-3/12" >
                            <p class="">{{ $pcCase->name }}</p>
                            
                        </div>
                        <div class="flex w-2/12">
                            <p>{{ $pcCase->manufacturer->name }}</p>
                        </div>
                        <div class="w-2/12 ">
                            <p class="ml-4">{{ $pcCase->type }} </p>
                        </div>
                        <div class="w-1/12">
                            <p class="ml-4">{{  $pcCase->height }}  mm</p>
                        </div>
                        <div class="w-1/12">
                            <p class="ml-4">{{ $pcCase->max_gpu_length }} mm</p>
                        </div>
                        
                        <div class="w-1/12 flex justify-center">
                            <input type="hidden" name="id" value="{{ $pcCase->id }}">
                            <button class="inline-block px-6 py-2 text-sm font-semibold leading-6 text-center text-gray-900 uppercase transition bg-green-400 rounded shadow ripplehover:shadow-lg hover:bg-green-600 focus:outline-none my-2 self-center hover:text-white "  wire:click='$emit("openModal", "modals.test", @json(["component_id" => "$pcCase->id", "component" => "PcCase"]))'>
                                ADD
                            </button>
                        </div>
                        <div class="w-1/12 flex justify-center mr-2">
                                <button
                                    class="inline-block px-6 py-2 text-sm font-semibold leading-6 text-center text-gray-700 uppercase transition bg-white rounded shadow ripple hover:shadow-lg hover:bg-gray-400 focus:outline-none my-2 self-center hover:text-white " wire:click='$emit("openModal", "modals.pc-cases", @json(["pcCase" => "$pcCase->id"]))'">
                                    DETAILS
                                </button>
                        </div>


                    </div>
                @endforeach


                

            </div>

            <div class="mb-2 lg:hidden"  >
                
                @foreach ($pcCases as $pcCase)
                    <div class=" items-center pl-3 bg-gray-900 bg-opacity-70 border border-green-400  text-shadow">
                        <div class="flex items-center justify-between space-x-3 pr-2">
                            <div class="w-2/12">
                                <div class="flex items-center py-2 ">
                                    <img src="../images/{{ $pcCase->images()->first()->path }}" alt="" width="60" class="border-green-500 border">
                                </div>
                            </div>
                            <div class=" w-3/12" >
                                <p class="">{{ $pcCase->name }}</p>
                                
                            </div>
                            
                            <input type="hidden" name="id" value="{{ $pcCase->id }}">
                            <button class="inline-block px-6 py-2 text-xs font-semibold leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripplehover:shadow-lg hover:bg-green-600 focus:outline-none my-2 self-center hover:text-white" wire:click='$emit("openModal", "modals.test", @json(["component_id" => "$pcCase->id", "component" => "PcCase"]))'>
                                ADD
                            </button>
                            
                            <button
                                class="inline-block px-6 py-2 text-xs font-semibold leading-6 text-center text-gray-700 uppercase transition bg-white rounded shadow ripple hover:shadow-lg hover:bg-gray-400 focus:outline-none my-2 self-center hover:text-white" wire:click='$emit("openModal", "modals.pcCases", @json(["pcCase" => "$pcCase->id"]))'>
                                DETAILS
                            </button>
                        </div>
                        <div class="flex">
                            <div class=" w-4/12">
                                <p class="font-light text-sm">MANUFACTURER</p>
                                <p>{{ $pcCase->manufacturer->name }}</p>
                            </div>
                            <div class="w-4/12 ">
                                <p class="font-light text-sm">type</p>
                                <p>{{ $pcCase->type }} </p>
                            </div>
                            <div class="w-4/12">
                                <p class="font-light text-sm">SIZE</p>
                                <p>{{ $pcCase->height  }}  </p>
                            </div>
                        </div>
                        <div class="flex my-2">
                            <div class="w-4/12">
                                <p class="font-light text-sm">RAM CAPACITY</p>
                                <p>{{ $pcCase->max_gpu_length }} </p>
                            </div>
                        </div>
                    </div>
                @endforeach


                

            </div>
            
            {{ $pcCases->links('pagination::tailwind-jag') }}

        </div>
        <!--
        <div class="lg:w-1/6 lg:block w-full mt-24 hidden mr-2">
            
            <div class="border border-green-400  mr-2 ">
                <p class="font-semibold text-gray-200 text-xl pl-3 py-1 bg-green-600 bg-opacity-70">Omiljeno</p>
                <div class="flex items-center justify-between px-5 bg-gray-900 bg-opacity-70 py-2 border-b border-green-400">
                        <p class="text-green-400 font-semibold">ramMaster 212 EVO </p>
                        <img src="../images/212.jpg" alt="" width="60" class="border border-green-400">
                </div>
                <div class="flex items-center justify-between px-5 bg-gray-900 bg-opacity-70 py-2 border-b border-green-400">
                        <p class="text-green-400 font-semibold">ramMaster 212 EVO </p>
                        <img src="../images/212.jpg" alt="" width="60" class="border border-green-400">
                </div>
                <div class="flex items-center justify-between px-5 bg-gray-900 bg-opacity-70 py-2 border-b border-green-400">
                        <p class="text-green-400 font-semibold">ramMaster 212 EVO </p>
                        <img src="../images/212.jpg" alt="" width="60" class="border border-green-400">
                </div>
                <div class="flex items-center justify-between px-5 bg-gray-900 bg-opacity-70 py-2 border-b border-green-400">
                        <p class="text-green-400 font-semibold">ramMaster 212 EVO </p>
                        <img src="../images/212.jpg" alt="" width="60" class="border border-green-400">
                </div>
            </div>
        </div>
    -->


    </div>
</div>
