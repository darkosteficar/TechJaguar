<div>
    <div class="flex mt-10 mx-6">
        <div class="w-1/6 mt-24">
            <a href="{{ route('build', []) }}">
                <button class="inline-block px-6 py-2 text-sm font-medium leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none my-2 self-center">
                    Back to the build
                </button>
            </a>
            <div class="border border-green-400 h-52 mr-2 ">
            
                <p class="font-semibold text-green-400 text-xl pl-3 pt-1">Filters</p>
                <div class="ml-4">
                    <p class="font-medium text-green-400 text-md mt-3">Manufacturer</p>
                    <div class="w-1/2 mb-1">
                        <hr class="border border-green-400">
                    </div>
                    <div>
                        <label class="inline-flex items-center mt-1  ">
                            <input type="checkbox"
                                class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                checked><span class="ml-2 text-gray-300 font-semibold ">AMD</span>
                        </label>
                    </div>
    
                    <div>
                        <label class="inline-flex items-center mt-1  ">
                            <input type="checkbox"
                                class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                checked><span class="ml-2 text-gray-300 font-semibold ">Intel</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center mt-1  ">
                            <input type="checkbox"
                                class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                checked><span class="ml-2 text-gray-300 font-semibold ">Nvidia</span>
                        </label>
                    </div>
                </div>
    
            </div>
        </div>
        <div>
            Po stranici: &nbsp;
            <select wire:model="perPage">
                <option>10</option>
                <option>20</option>
                <option>40</option>
                <option>100</option>
            </select>
        </div>

        <div class="pt-2 relative mx-auto text-white">
            <input type="text"
                class=" bg-gray-800 border-green-400 border-2 w-full h-10 rounded-xl focus:border-gray-600 focus:bg-gray-700 pl-4 text-white  font-semibold focus:outline-none focus:ring-0"
                placeholder="Pretraga..." wire:model.debounce.300ms="search">
            <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
                <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                    viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                    xml:space="preserve" width="512px" height="512px">
                    <path
                        d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                </svg>
            </button>

          
        </div>
        <div class="w-5/6 mx-auto my-5 font-semibold text-green-400 ">
            <p class="mb-1 font-semibold text-3xl text-gray-200">HLADNJACI</p>
            <hr class="mb-6 border border-green-400">
            <div class="mb-4" >
                <div class="flex justify-left pl-3 text-lg items-center font-semibold text-gray-200  bg-green-600 py-2 rounded-t-md border-b border-b-white select-none">
                    <p class="w-1/12 "></p>
                    <div class="cursor-pointer w-3/12 flex items-center " wire:click="sortBy('name') ">
                        @include('partials._sort-icon',['field'=>'name'])
                         <p>IME</p>
                    </div>
                    <div class="cursor-pointer w-2/12 flex items-center" wire:click="sortBy('manufacturer_id')">
                        @include('partials._sort-icon',['field'=>'manufacturer_id'])
                        <p>PROIZVOĐAČ</p>
                    </div>
                    <div class="cursor-pointer w-2/12 flex items-center" wire:click="sortBy('noise_level')">
                        @include('partials._sort-icon',['field'=>'noise_level'])
                        <p>RAZINA BUKE</p>
                    </div>
                    <div class="cursor-pointer w-1/12 flex items-center" wire:click="sortBy('height')">
                        @include('partials._sort-icon',['field'=>'height'])
                        <p>VISINA</p>
                    </div>
                    <div class="cursor-pointer w-1/12 flex items-center" wire:click="sortBy('max_power')">
                        @include('partials._sort-icon',['field'=>'max_power'])
                        <p>SNAGA</p>
                    </div>
                    <p class="w-2/12" "></p>
                </div>

                @foreach ($coolers as $cooler)
                    <div class="flex items-center pl-3 bg-gray-700 border border-green-400 text-lg ">

                        <div class="w-1/12">
                            <div class="flex items-center py-2 ">
                                <img src="../images/{{ $cooler->images()->first()->path }}" alt="" width="60" class="border-green-500 border">
                            </div>
                        </div>
                        <div class="flex w-3/12" >
                            <p class="">{{ $cooler->name }}</p>
                            
                        </div>
                        <div class="flex w-2/12">
                            <p>{{ $cooler->manufacturer->name }}</p>
                        </div>
                        <div class="w-2/12 ">
                            <p>{{ $cooler->noise_level }} db</p>
                        </div>
                        <div class="w-1/12">
                            <p>{{ $cooler->height }}  mm</p>
                        </div>
                        <div class="w-1/12">
                            <p>{{ $cooler->max_power }} W</p>
                        </div>
                        
                        <div class="w-1/12 flex justify-center">
                            
                            
                            <form action="{{ route('build.cooler.add', []) }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $cooler->id }}">
                                
                                <button class="inline-block px-6 py-2 text-sm font-semibold leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripplehover:shadow-lg hover:bg-green-600 focus:outline-none my-2 self-center">
                                    DODAJ
                                </button>
                            </form>
    
                        </div>
                        <div class="w-1/12 flex justify-center">
                            <a href="">
                                <button
                                    class="inline-block px-6 py-2 text-sm font-semibold leading-6 text-center text-gray-700 uppercase transition bg-white rounded shadow ripple hover:shadow-lg hover:bg-green-300 focus:outline-none my-2 self-center">
                                    DETALJI
                                </button>
                            </a>
                        </div>


                    </div>
                @endforeach

            </div>
            
            {{ $coolers->links('pagination::tailwind-jag') }}

        </div>



    </div>
</div>
