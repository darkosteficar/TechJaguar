<div>
    <div class="bg-green-600 shadow-2xl p-2">
        <div class="flex space-x-12 items-center justify-between text-shadow">
            <p class="text-2xl text-gray-200 font-semibold ml-2 ">{{ $gpu->name }}</p>
            <p class="text-xl text-gray-300 font-semibold mr-4">{{ $gpu->manufacturer->name }}</p>
        </div>
       
    </div>
    
    <div class="bg-gray-900 ">
        <p class="ml-2 py-1 font-semibold text-green-400 text-xl text-shadow">SPECS:</p>
        <div class="grid grid-cols-3 space-x-8 space-y-4  items-center text-green-400 text-lg p-2">
            <div class="ml-8 ">
                <p class="font-normal">MSRP</p>
                <p class="font-semibold">{{ $gpu->price }} kn</p>
            </div>
            <div>
                <p class="font-normal">MANUFACTURER</p>
                <p class="font-semibold">{{ $gpu->manufacturer->name }} </p>
            </div>
            <div>
                <p class="font-normal">CHIPSET</p>
                <p class="font-semibold">{{ $gpu->chipset->name }}  </p>
            </div>
            <div>
                <p class="font-normal">SERIES</p>
                <p class="font-semibold">{{ $gpu->series }}  </p>
            </div>
            <div>
                <p class="font-normal">BUS</p>
                <p class="font-semibold">{{ $gpu->gpu_bus }}  </p>
            </div>
            <div>
                <p class="font-normal">VRAM TYPE</p>
                <p class="font-semibold">{{ $gpu->vram_type }}  </p>
            </div>
            <div>
                <p class="font-normal">VRAM</p>
                <p class="font-semibold">{{ $gpu->vram }} GB </p>
            </div>
            <div>
                <p class="font-normal">LENGTH</p>
                <p class="font-semibold">{{ $gpu->length }} mm </p>
            </div>
            <div>
                <p class="font-normal">INTERFACE</p>
                <p class="font-semibold">{{ $gpu->interface }}  </p>
            </div>
            <div>
                <p class="font-normal">POWER CONNECTOR</p>
                <p class="font-semibold">{{ $gpu->power_connector }}  </p>
            </div>
            <div>
                <p class="font-normal">POWER REQUIREMENTS</p>
                <p class="font-semibold">{{ $gpu->power_req }} W </p>
            </div>
            
            <div class="">
                <p class="font-normal">CROSSFIRE/SLI</p>
                @if ($gpu->crossfire == 1)
                    <p class="font-normal">Yes</p>
                @else
                    <p class="font-normal">No</p>
                @endif
            </div>
        </div>
        <hr class="border border-green-400">
        <p class="ml-2 pt-1 font-semibold text-green-400 text-xl text-shadow">IMAGES:</p>
        <div class="flex flex-wrap items-center justify-center p-2 space-x-2 space-y-2">
            @foreach ($images as $key => $image)
                <div class="w-5/12 ">
                    <img src="../images/{{ $image['path'] }}" alt="" class="border border-green-400 shadow-lg">
                </div>
            @endforeach
        </div>    
    </div>
    
    
</div>
