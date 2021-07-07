<div>
    <div class="bg-green-600 shadow-2xl p-2 text-shadow">
        <div class="flex items-center justify-between">
            <p class="text-2xl text-gray-200 font-semibold ml-2">{{ $cooler->name }}</p>
            @if ($cooler->water_cooled == 0)
                <p class="text-xl text-gray-300 font-semibold mr-2">AIR COOLING</p>
            @else
                <p class="text-xl text-gray-300 font-semibold mr-2">WATER COOLING</p>
            @endif
        </div>
       
    </div>
    
    <div class="bg-gray-900 ">
        <p class="ml-2 py-1 font-semibold text-green-400 text-xl">SPECIFIKACIJE:</p>
        <div class="grid grid-cols-3 space-x-8 space-y-4 items-center text-green-400 text-lg p-2">
            <div class="ml-8">
                <p class="font-normal">MSRP</p>
                <p class="font-semibold">{{ $cooler->price }} kn</p>
            </div>
            <div>
                <p class="font-normal">MANUFACTURER</p>
                <p class="font-semibold">{{ $cooler->manufacturer->name }} </p>
            </div>
            <div>
                <p class="font-normal">NOISE LEVEL</p>
                <p class="font-semibold">{{ $cooler->noise_level }} db </p>
            </div>
            <div>
                <p class="font-normal">TDP</p>
                <p class="font-semibold">{{ $cooler->max_power }} W </p>
            </div>
            <div>
                <p class="font-normal">DIMENSIONS (LxWxH)</p>
                <p class="font-semibold">{{ $cooler->length }} x {{ $cooler->width }} x {{ $cooler->height }} mm </p>
            </div>
            <div class="">
                <p class="font-normal">FAN SPEED</p>
                <p class="font-semibold">{{ $cooler->fan_rpm }} RPM </p>
            </div>
        </div>
        <hr class="border border-green-400">
        <p class="ml-2 pt-1 font-semibold text-green-400 text-xl">SLIKE:</p>
        <div class="flex flex-wrap items-center justify-center p-2 space-x-2 space-y-2">
            @foreach ($images as $key => $image)
                <div class="w-5/12 ">
                    <img src="../images/{{ $image['path'] }}" alt="" class="border border-green-400 shadow-lg">
                </div>
            @endforeach
        </div>    
    </div>
    
    
</div>
