<div>
    <div class="bg-green-600 shadow-2xl p-2">
        <div class="flex items-center justify-between text-shadow">
            <p class="text-2xl text-gray-200 font-semibold ml-2">{{ $fan->name }}</p>
            <p class="text-xl text-gray-300 font-semibold mr-2">{{ $fan->manufacturer->name }}</p>
          
        </div>
       
    </div>
    
    <div class="bg-gray-900 text-shadow">
        <p class="ml-2 py-1 font-semibold text-green-400 text-xl">SPECIFIKACIJE:</p>
        <div class="grid grid-cols-3 space-x-8 space-y-4  items-center text-green-400 text-lg p-2">
            <div class="ml-8 mt-4">
                <p class="font-normal">MSRP</p>
                <p class="font-semibold">{{ $fan->price }} kn</p>
            </div>
            <div>
                <p class="font-normal">PROIZVOĐAČ</p>
                <p class="font-semibold">{{ $fan->manufacturer->name }} </p>
            </div>
           
            <div>
                <p class="font-normal">BRZINA</p>
                <p class="font-semibold">{{ $fan->speed }} RPM </p>
            </div>
            <div>
                <p class="font-normal">LED</p>
                <p class="font-semibold">{{ $fan->led }}  </p>
            </div>
            <div>
                <p class="font-normal">LEŽAJEVI</p>
                <p class="font-semibold">{{ $fan->bearings }}  </p>
            </div>
            <div>
                <p class="font-normal">VELIČINA</p>
                <p class="font-semibold">{{ $fan->diameter }} cm </p>
            </div>
            <div>
                <p class="font-normal">BUKA</p>
                <p class="font-semibold">{{ $fan->noise }} db</p>
            </div>
            <div>
                <p class="font-normal">PRIKLJUČAK NAPAJANJA</p>
                <p class="font-semibold">{{ $fan->power_connector }}  </p>
            </div>
            <div>
                <p class="font-normal">POTROŠNJA ENERGIJE</p>
                <p class="font-semibold">{{ $fan->power_consumption }}  </p>
            </div>
            <div>
                <p class="font-normal">PROTOK ZRAKA</p>
                <p class="font-semibold">{{ $fan->air_flow }} CFM </p>
            </div>
            <div>
                <p class="font-normal">ŽIVOTNI VIJEK</p>
                <p class="font-semibold">{{ $fan->life }} sati </p>
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
