<div>
    <div class="bg-green-600 shadow-2xl p-2">
        <div class="flex items-center justify-between">
            <p class="text-2xl text-gray-200 font-semibold ml-2">{{ $ram->name }}</p>
            <p class="text-xl text-gray-300 font-semibold mr-2">{{ $ram->manufacturer->name }}</p>
          
        </div>
       
    </div>
    
    <div class="bg-gray-800 ">
        <p class="ml-2 py-1 font-semibold text-green-400 text-xl">SPECIFIKACIJE:</p>
        <div class="flex flex-wrap space-x-8 space-y-4  items-center text-green-400 text-lg p-2">
            <div class="ml-8 mt-4">
                <p class="font-normal">MSRP</p>
                <p class="font-semibold">{{ $ram->price }} kn</p>
            </div>
            <div>
                <p class="font-normal">PROIZVOĐAČ</p>
                <p class="font-semibold">{{ $ram->manufacturer->name }} </p>
            </div>
           
            <div>
                <p class="font-normal">BRZINA</p>
                <p class="font-semibold">{{ $ram->speed }} Mhz </p>
            </div>
            <div>
                <p class="font-normal">TIP</p>
                <p class="font-semibold">{{ $ram->type }}  </p>
            </div>
            <div>
                <p class="font-normal">KAPACITET</p>
                <p class="font-semibold">{{ $ram->size }} GB </p>
            </div>
            <div>
                <p class="font-normal">HLAĐENJE</p>
                @if ($ram->heat_spreader == 0)
                <p class="font-semibold">Ne</p>
                @else
                <p class="font-semibold">Da</p> 
                @endif
                
            </div>
            <div>
                <p class="font-normal">VOLTAŽA</p>
                <p class="font-semibold">{{ $ram->voltage }} V </p>
            </div>
            <div>
                <p class="font-normal">VREMENA</p>
                <p class="font-semibold">{{ $ram->timings }}   </p>
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