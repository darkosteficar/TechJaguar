<div>
    <div class="bg-green-600 shadow-2xl p-2">
        <div class="flex items-center justify-between text-shadow">
            <p class="text-2xl text-gray-200 font-semibold ml-2">{{ $psu->name }}</p>
            <p class="text-xl text-gray-300 font-semibold mr-2">{{ $psu->type }}</p>
            
        </div>
       
    </div>
    
    <div class="bg-gray-900 text-shadow">
        <p class="ml-2 py-1 font-semibold text-green-400 text-xl">SPECS:</p>
        <div class="grid grid-cols-3 space-x-8 space-y-4 items-center text-green-400 text-lg p-2">
            <div class="ml-8 mt-4">
                <p class="font-normal">MSRP</p>
                <p class="font-semibold">{{ $psu->price }} kn</p>
            </div>
            <div>
                <p class="font-normal">MANUFACTURER</p>
                <p class="font-semibold">{{ $psu->manufacturer->name }} </p>
            </div>
            <div>
                <p class="font-normal">EFFICIENCY RATING</p>
                <p class="font-semibold">{{ $psu->efficiency_rating }}  </p>
            </div>
            <div>
                <p class="font-normal">MOLEX 4-PIN CONNECTORS</p>
                <p class="font-semibold">{{ $psu->molex_4pin_connectors }}  </p>
            </div>
            <div>
                <p class="font-normal">SATA CONNECTORS</p>
                <p class="font-semibold">{{ $psu->sata_connectors }}  </p>
            </div>
            <div>
                <p class="font-normal">LENGTH</p>
                <p class="font-semibold">{{ $psu->length }} mm </p>
            </div>

            <div>
                <p class="font-normal">TYPE</p>
                <p class="font-semibold">{{ $psu->type }}  </p>
            </div>
            <div>
                <p class="font-normal">MODULAR</p>
                @if ($psu->modular == 0)
                    <p class="font-semibold">No </p>
                @else
                    <p class="font-semibold">Yes</p>
                @endif
            </div>
            <div class="">
                <p class="font-normal">WATTAGE</p>
                <p class="font-semibold">{{ $psu->wattage }} W </p>
            </div>
            <div class="my-3">
                <p class="font-normal">PCIE 6+2 CONNECTORS</p>
                <p class="font-semibold">{{ $psu->pcie_6_2_pin_connectors }}  </p>
            </div>
            
        </div>
        <hr class="border border-green-400">
        <p class="ml-2 pt-1 font-semibold text-green-400 text-xl">IMAGES:</p>
        <div class="flex flex-wrap items-center justify-center p-2 space-x-2 space-y-2">
            @foreach ($images as $key => $image)
                <div class="w-5/12 ">
                    <img src="../images/{{ $image['path'] }}" alt="" class="border border-green-400 shadow-lg">
                </div>
            @endforeach
        </div>    
    </div>
    
    
</div>
