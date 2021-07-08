<div>
    <div class="bg-green-600 shadow-2xl p-2">
        <div class="flex items-center justify-between text-shadow">
            <p class="text-2xl text-gray-200 font-semibold ml-2">{{ $pcCase->name }}</p>
            <p class="text-xl text-gray-300 font-semibold mr-2">{{ $pcCase->type }}</p>
        </div>
       
    </div>
    
    <div class="bg-gray-900 text-shadow">
        <p class="ml-2 py-1 font-semibold text-green-400 text-xl">SPECIFIKACIJE:</p>
        <div class="grid grid-cols-3 space-x-8 space-y-4 items-center text-green-400 text-lg p-2">
            <div class="ml-8 ">
                <p class="font-normal">MSRP</p>
                <p class="font-semibold">{{ $pcCase->price }} kn</p>
            </div>
            <div>
                <p class="font-normal">MANUFACTURER</p>
                <p class="font-semibold">{{ $pcCase->manufacturer->name }} </p>
            </div>
            <div>
                <p class="font-normal">2,5" BAYS</p>
                <p class="font-semibold">{{ $pcCase->num_2_5_bays }} mm </p>
            </div>
            <div>
                <p class="font-normal">3,5" BAYS</p>
                <p class="font-semibold">{{ $pcCase->num_3_5_bays }} mm </p>
            </div>
            <div>
                <p class="font-normal">MAX GPU LENGTH</p>
                <p class="font-semibold">{{ $pcCase->max_gpu_length }} mm </p>
            </div>
            <div>
                <p class="font-normal">EXPANSION SLOTS</p>
                <p class="font-semibold">{{ $pcCase->expansion_slots }} mm </p>
            </div>
            <div>
                <p class="font-normal">MAX MOBO SIZE</p>
                <p class="font-semibold">{{ $pcCase->motherboard_form_factor }} mm </p>
            </div>
            <div>
                <p class="font-normal">GLASS SIDE PANEL</p>
                @if ($pcCase->side_panel_glass == 0)
                    <p class="font-semibold">No </p>
                @else
                    <p class="font-semibold">Yes</p>
                @endif
            </div>
            <div>
                <p class="font-normal">PSU SHROUD</p>
                @if ($pcCase->power_supply_shroud == 0)
                    <p class="font-semibold">No </p>
                @else
                    <p class="font-semibold">Yes</p>
                @endif
               
            </div>
            <div>
                <p class="font-normal">DIMENSIONS (LxWxH)</p>
                <p class="font-semibold">{{ $pcCase->length }} x {{ $pcCase->width }} x {{ $pcCase->height }} mm </p>
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
