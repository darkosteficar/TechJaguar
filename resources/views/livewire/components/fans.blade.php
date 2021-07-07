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
                        <svg class="fill-current h-12 mr-4 mb-1 text-green-400"  viewBox="0 0 512 512"  xmlns="http://www.w3.org/2000/svg"><path d="m462 40c-5.519531 0-10 4.480469-10 10s4.480469 10 10 10 10-4.480469 10-10-4.480469-10-10-10zm0 0"/><path d="m462 452c-5.519531 0-10 4.480469-10 10s4.480469 10 10 10 10-4.480469 10-10-4.480469-10-10-10zm0 0"/><path d="m50 60c5.519531 0 10-4.480469 10-10s-4.480469-10-10-10-10 4.480469-10 10 4.480469 10 10 10zm0 0"/><path d="m50 452c-5.519531 0-10 4.480469-10 10s4.480469 10 10 10 10-4.480469 10-10-4.480469-10-10-10zm0 0"/><path d="m56 266h.25c5.410156-.140625 9.75-4.558594 9.75-10s-4.339844-9.859375-9.75-10c-.078125 0-.171875 0-.25 0-5.519531 0-10 4.480469-10 10s4.480469 10 10 10zm0 0"/><path d="m462 0h-412c-27.570312 0-50 22.429688-50 50v412c0 27.570312 22.429688 50 50 50h412c27.570312 0 50-22.429688 50-50v-412c0-27.570312-22.429688-50-50-50zm30 462c0 16.542969-13.457031 30-30 30h-412c-16.542969 0-30-13.457031-30-30v-412c0-16.542969 13.457031-30 30-30h412c16.542969 0 30 13.457031 30 30zm0 0"/><path d="m256 46c-102.023438 0-186.207031 72.140625-205.839844 168.1875-1.101562 5.410156 2.386719 10.695312 7.796875 11.800781 5.410157 1.101563 10.695313-2.386719 11.800781-7.796875 18.023438-88.183594 96.347657-152.191406 186.242188-152.191406 104.765625 0 190 85.234375 190 190s-85.234375 190-190 190c-90.453125 0-167.050781-62.621094-186.261719-152.285156-1.15625-5.398438-6.476562-8.839844-11.875-7.683594-5.398437 1.15625-8.839843 6.472656-7.683593 11.875 20.566406 95.96875 102.238281 168.09375 205.820312 168.09375 116.34375 0 210-93.570312 210-210 0-115.792969-94.207031-210-210-210zm0 0"/><path d="m366 176c0-49.625-40.375-90-90-90h-20c-5.523438 0-10 4.476562-10 10v83.390625c-16.683594-20.613281-42.121094-33.390625-70-33.390625-49.625 0-90 40.375-90 90v20c0 5.523438 4.476562 9.988281 10 9.988281h83.390625c-20.613281 16.6875-33.390625 42.132813-33.390625 70.011719 0 49.625 40.375 90 90 90h20c5.523438 0 10-4.476562 10-10v-83.390625c16.683594 20.613281 42.121094 33.390625 70 33.390625 49.625 0 90-40.375 90-90v-20c0-5.523438-4.476562-10-10-10h-83.390625c20.613281-16.683594 33.390625-42.121094 33.390625-70zm-90-70c38.597656 0 70 31.402344 70 70 0 28.402344-17.035156 53.550781-42.503906 64.390625-5.566406-16.921875-19.910156-29.785156-37.496094-33.375v-101.015625zm-18.097656 179.9375c-16.96875 1.023438-30.847656-11.925781-31.839844-28.035156-1.054688-17.496094 12.804688-31.902344 29.9375-31.902344 16.417969 0 30 13.316406 30 30 0 15.816406-12.351562 28.96875-28.097656 29.9375zm-151.902344-49.9375c0-38.597656 31.402344-70 70-70 28.402344 0 53.550781 17.035156 64.390625 42.503906-16.921875 5.566406-29.785156 19.910156-33.375 37.496094h-101.015625zm130 170c-38.597656 0-70-31.402344-70-70 0-28.402344 17.035156-53.550781 42.503906-64.390625 5.566406 16.921875 19.910156 29.785156 37.496094 33.375v101.015625zm170-130c0 38.597656-31.402344 70-70 70-28.402344 0-53.550781-17.035156-64.390625-42.503906 16.921875-5.566406 29.785156-19.910156 33.375-37.496094h101.015625zm0 0"/>
                        </svg>
                    </div>
                    <p class="mb-1 font-semibold lg:text-3xl text-xl text-gray-200 w-1/3 text-green-400 text-shadow-green">FANS</p>
                    
                  
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
                                <div class="cursor-pointer border-b-2 border-transparent hover:border-gray-800 hover:text-gray-800 w-full flex items-center" wire:click="sortBy('speed')">
                                    @include('partials._sort-icon',['field'=>'speed'])
                                    <p>SPEED</p>
                                </div>
                                <div class="cursor-pointer border-b-2 border-transparent hover:border-gray-800 hover:text-gray-800 w-full flex items-center" wire:click="sortBy('type')">
                                    @include('partials._sort-icon',['field'=>'noise'])
                                    <p>NOISE</p>
                                </div>
                            </div>
                            <div class="cursor-pointer border-b-2 border-transparent hover:border-gray-800 hover:text-gray-800 w-1/2 flex items-center" wire:click="sortBy('air_flow')">
                                @include('partials._sort-icon',['field'=>'air_flow'])
                                <p>AIR FLOW</p>
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
                             wire:model.debounce.300ms="search" placeholder="rams">
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
                    <div class="sorting-components w-2/12 py-3" wire:click="sortBy('speed')">
                        @include('partials._sort-icon',['field'=>'speed'])
                        <p>SPEED</p>
                    </div>
                    <div class="sorting-components w-1/12 py-1" wire:click="sortBy('vram')">
                        <div class="hover:text-green-400 ">
                            @include('partials._sort-icon',['field'=>'noise'])
                        </div>
                        <p class="leading-tight py-3">NOISE</p>
                    </div>
                    <div class="sorting-components w-1/12 py-3" wire:click="sortBy('air_flow')">
                        @include('partials._sort-icon',['field'=>'air_flow'])
                        <p class="">AIR FLOW</p>
                    </div>
                    <p class="w-2/12" "></p>
                </div>

                @foreach ($fans as $fan)
                    <div class="flex items-center pl-3 bg-gray-900 bg-opacity-70 border border-green-400 2xl:text-lg text-shadow">

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
                            <p class="ml-4">{{ $fan->speed }} RPM</p>
                        </div>
                        <div class="w-1/12">
                            <p class="ml-4">{{  $fan->noise }}  db</p>
                        </div>
                        <div class="w-1/12">
                            <p class="ml-4">{{ $fan->air_flow }} CFM</p>
                        </div>
                        
                        <div class="w-1/12 flex justify-center">
                            <input type="hidden" name="id" value="{{ $fan->id }}">
                            <button class="inline-block px-6 py-2 text-sm font-semibold leading-6 text-center text-gray-900 uppercase transition bg-green-400 rounded shadow ripplehover:shadow-lg hover:bg-green-600 focus:outline-none my-2 self-center hover:text-white "  wire:click='$emit("openModal", "modals.test", @json(["component_id" => "$fan->id", "component" => "Fan"]))'>
                                ADD
                            </button>
                        </div>
                        <div class="w-1/12 flex justify-center mr-2">
                                <button
                                    class="inline-block px-6 py-2 text-sm font-semibold leading-6 text-center text-gray-700 uppercase transition bg-white rounded shadow ripple hover:shadow-lg hover:bg-gray-400 focus:outline-none my-2 self-center hover:text-white " wire:click='$emit("openModal", "modals.fans", @json(["fan" => "$fan->id"]))'">
                                    DETAILS
                                </button>
                        </div>


                    </div>
                @endforeach


                

            </div>

            <div class="mb-2 lg:hidden"  >
                
                @foreach ($fans as $fan)
                    <div class=" items-center pl-3 bg-gray-900 bg-opacity-70 border border-green-400  text-shadow">
                        <div class="flex items-center justify-between space-x-3 pr-2">
                            <div class="w-2/12">
                                <div class="flex items-center py-2 ">
                                    <img src="../images/{{ $fan->images()->first()->path }}" alt="" width="60" class="border-green-500 border">
                                </div>
                            </div>
                            <div class=" w-3/12" >
                                <p class="">{{ $fan->name }}</p>
                                
                            </div>
                            
                            <input type="hidden" name="id" value="{{ $fan->id }}">
                            <button class="inline-block px-6 py-2 text-xs font-semibold leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripplehover:shadow-lg hover:bg-green-600 focus:outline-none my-2 self-center hover:text-white" wire:click='$emit("openModal", "modals.test", @json(["component_id" => "$fan->id", "component" => "fan"]))'>
                                ADD
                            </button>
                            
                            <button
                                class="inline-block px-6 py-2 text-xs font-semibold leading-6 text-center text-gray-700 uppercase transition bg-white rounded shadow ripple hover:shadow-lg hover:bg-gray-400 focus:outline-none my-2 self-center hover:text-white" wire:click='$emit("openModal", "modals.fans", @json(["fan" => "$fan->id"]))'>
                                DETAILS
                            </button>
                        </div>
                        <div class="flex">
                            <div class=" w-4/12">
                                <p class="font-light text-sm">MANUFACTURER</p>
                                <p>{{ $fan->manufacturer->name }}</p>
                            </div>
                            <div class="w-4/12 ">
                                <p class="font-light text-sm">SPEED</p>
                                <p>{{ $fan->speed }} </p>
                            </div>
                            <div class="w-4/12">
                                <p class="font-light text-sm">NOISE</p>
                                <p>{{ $fan->noise  }}  db</p>
                            </div>
                        </div>
                        <div class="flex my-2">
                            <div class="w-4/12">
                                <p class="font-light text-sm">AIR FLOW</p>
                                <p>{{ $fan->air_flow }} CFM</p>
                            </div>
                        </div>
                    </div>
                @endforeach


                

            </div>
            
            {{ $fans->links('pagination::tailwind-jag') }}

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
