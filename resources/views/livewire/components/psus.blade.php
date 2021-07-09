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
                        <svg class="fill-current h-12 mr-4 mb-1 text-green-400" id="Capa_1" enable-background="new 0 0 512 512"  viewBox="0 0 512 512"  xmlns="http://www.w3.org/2000/svg"><g><path d="m62.138 277.131 29.389-6.029c-9.51-46.351 26.967-90.102 74.473-90.102v-30c-66.401 0-117.208 61.072-103.862 126.131z"/><path d="m158.301 330.647c-22.648-2.168-42.872-14.11-55.484-32.763l-24.852 16.804c17.645 26.097 45.885 42.798 77.478 45.823 31.116 2.978 62.161-7.679 84.775-30.293l-21.213-21.213c-15.923 15.922-38.046 23.809-60.704 21.642z"/><path d="m206.852 159.272-11.703 27.623c38.14 16.158 56.063 60.234 39.957 98.253l27.623 11.703c22.56-53.25-2.506-114.968-55.877-137.579z"/><path d="m160.323 269.841c-2.186-.906-9.323-4.582-9.323-13.841h-30c0 18.239 10.929 34.552 27.844 41.557 17.038 7.058 35.824 3.415 48.976-9.738l-21.213-21.213c-6.547 6.546-14.119 4.131-16.284 3.235z"/><path d="m183.195 214.472c-17.146-7.102-35.927-3.381-49.015 9.708l21.213 21.213c6.539-6.539 14.146-4.106 16.322-3.205 2.179.903 9.285 4.565 9.285 13.812h30c0-18.512-10.654-34.424-27.805-41.528z"/><path d="m306.729 121-22.5 45 22.5 45h78.541l22.5-45-22.5-45zm60 60h-41.459l-7.5-15 7.5-15h41.459l7.5 15z"/><path d="m301 391h90v-150h-90zm30-30v-30h30v30zm30-90v30h-30v-30z"/><path d="m0 451h512v-390h-512zm30-360h452v330h-452z"/><path d="m60 121h30v30h-30z"/><path d="m60 361h30v30h-30z"/><path d="m421 361h30v30h-30z"/><path d="m421 121h30v30h-30z"/></g></svg>
                    </div>
                    <p class="mb-1 font-semibold lg:text-3xl text-xl text-gray-200 w-1/3 text-green-400 text-shadow-green">POWER SUPPLIES</p>
                    
                  
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
                                    @include('partials._sort-icon',['field'=>'length'])
                                    <p>LENGTH</p>
                                </div>
                            </div>
                            <div class="cursor-pointer border-b-2 border-transparent hover:border-gray-800 hover:text-gray-800 w-1/2 flex items-center" wire:click="sortBy('efficiency_rating')">
                                @include('partials._sort-icon',['field'=>'efficiency_rating'])
                                <p>EFFICIENCY RATING</p>
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
                             wire:model.debounce.300ms="search" placeholder="Motherboards">
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
                    <div class="sorting-components w-1/12 py-1" wire:click="sortBy('length')">
                        <div class="hover:text-green-400 ">
                            @include('partials._sort-icon',['field'=>'length'])
                        </div>
                        <p class="leading-tight py-3">LENGTH</p>
                    </div>
                    <div class="sorting-components w-1/12 leading-tight py-1" wire:click="sortBy('efficiency_rating')">
                        @include('partials._sort-icon',['field'=>'efficiency_rating'])
                        <p class="">EFFICIENCY RATING</p>
                    </div>
                    <p class="w-2/12" ></p>
                </div>

                @foreach ($psus as $psu)
                    <div class="flex items-center pl-3 bg-gray-900 bg-opacity-70 border border-green-400 2xl:text-lg text-shadow">

                        <div class="w-1/12">
                            <div class="flex items-center py-2 ">
                                <img src="../images/{{ $psu->images()->first()->path }}" alt="" width="60" class="border-green-500 border">
                            </div>
                        </div>
                        <div class="flex w-3/12" >
                            <p class="">{{ $psu->name }}</p>
                            
                        </div>
                        <div class="flex w-2/12">
                            <p>{{ $psu->manufacturer->name }}</p>
                        </div>
                        <div class="w-2/12 ">
                            <p class="ml-4">{{ $psu->type }} </p>
                        </div>
                        <div class="w-1/12">
                            <p class="ml-4">{{  $psu->length }} mm </p>
                        </div>
                        <div class="w-1/12">
                            <p class="ml-4">{{ $psu->efficiency_rating }} </p>
                        </div>
                        
                        <div class="w-1/12 flex justify-center">
                            <input type="hidden" name="id" value="{{ $psu->id }}">
                            <button class="inline-block px-6 py-2 text-sm font-semibold leading-6 text-center text-gray-900 uppercase transition bg-green-400 rounded shadow ripplehover:shadow-lg hover:bg-green-600 focus:outline-none my-2 self-center hover:text-white "  wire:click='$emit("openModal", "modals.test", @json(["component_id" => "$psu->id", "component" => "Psu"]))'>
                                ADD
                            </button>
                        </div>
                        <div class="w-1/12 flex justify-center mr-2">
                                <button
                                    class="inline-block px-6 py-2 text-sm font-semibold leading-6 text-center text-gray-700 uppercase transition bg-white rounded shadow ripple hover:shadow-lg hover:bg-gray-400 focus:outline-none my-2 self-center hover:text-white " wire:click='$emit("openModal", "modals.psus", @json(["psu" => "$psu->id"]))'">
                                    DETAILS
                                </button>
                        </div>


                    </div>
                @endforeach


                

            </div>

            <div class="mb-2 lg:hidden"  >
                
                @foreach ($psus as $psu)
                    <div class=" items-center pl-3 bg-gray-900 bg-opacity-70 border border-green-400  text-shadow">
                        <div class="flex items-center justify-between space-x-3 pr-2">
                            <div class="w-2/12">
                                <div class="flex items-center py-2 ">
                                    <img src="../images/{{ $psu->images()->first()->path }}" alt="" width="60" class="border-green-500 border">
                                </div>
                            </div>
                            <div class=" w-3/12" >
                                <p class="">{{ $psu->name }}</p>
                                
                            </div>
                            
                            <input type="hidden" name="id" value="{{ $psu->id }}">
                            <button class="inline-block px-6 py-2 text-xs font-semibold leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripplehover:shadow-lg hover:bg-green-600 focus:outline-none my-2 self-center hover:text-white" wire:click='$emit("openModal", "modals.test", @json(["component_id" => "$psu->id", "component" => "Psu"]))'>
                                ADD
                            </button>
                            
                            <button
                                class="inline-block px-6 py-2 text-xs font-semibold leading-6 text-center text-gray-700 uppercase transition bg-white rounded shadow ripple hover:shadow-lg hover:bg-gray-400 focus:outline-none my-2 self-center hover:text-white" wire:click='$emit("openModal", "modals.psus", @json(["psu" => "$psu->id"]))'>
                                DETAILS
                            </button>
                        </div>
                        <div class="flex">
                            <div class=" w-4/12">
                                <p class="font-light text-sm">MANUFACTURER</p>
                                <p>{{ $psu->manufacturer->name }}</p>
                            </div>
                            <div class="w-4/12 ">
                                <p class="font-light text-sm">TYPE</p>
                                <p>{{ $psu->type }} </p>
                            </div>
                            <div class="w-4/12">
                                <p class="font-light text-sm">LENGTH</p>
                                <p>{{ $psu->length  }} mm </p>
                            </div>
                        </div>
                        <div class="flex ">
                            <div class="w-4/12">
                                <p class="font-light text-sm">EFFICIENCY RATING</p>
                                <p>{{ $psu->efficiency_rating }} </p>
                            </div>
                        </div>
                    </div>
                @endforeach


                

            </div>
            
            {{ $psus->links('pagination::tailwind-jag') }}

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
