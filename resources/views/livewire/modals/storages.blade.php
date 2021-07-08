<div>
    <div class="bg-green-600 shadow-2xl p-2">
        <div class="flex items-center justify-between text-shadow">
            <p class="text-2xl text-gray-200 font-semibold ml-2">{{ $storage->name }}</p>
            <p class="text-xl text-gray-300 font-semibold mr-2">{{ $storage->manufacturer->name }}</p>
          
        </div>
       
    </div>
    
    <div class="bg-gray-900 text-shadow">
        <p class="ml-2 py-1 font-semibold text-green-400 text-xl">SPECS:</p>
        <div class="grid grid-cols-3 space-x-8 space-y-4  items-center text-green-400 text-lg p-2">
            <div class="ml-8 mt-4">
                <p class="font-normal">MSRP</p>
                <p class="font-semibold">{{ $storage->price }} kn</p>
            </div>
            <div>
                <p class="font-normal">MANUFACTURER</p>
                <p class="font-semibold">{{ $storage->manufacturer->name }} </p>
            </div>
           
            <div>
                <p class="font-normal">SPEED</p>
                <p class="font-semibold">{{ $storage->speed }} Gb/Sec </p>
            </div>
            <div>
                <p class="font-normal">TYPE</p>
                <p class="font-semibold">{{ $storage->type }}  </p>
            </div>
            <div>
                <p class="font-normal">CAPACITY</p>
                <p class="font-semibold">{{ $storage->capacity }} GB </p>
            </div>
            <div>
                <p class="font-normal">NVME</p>
                @if ($storage->nvme == 0)
                <p class="font-semibold">No</p>
                @else
                <p class="font-semibold">Yes</p> 
                @endif
                
            </div>
            <div>
                <p class="font-normal">INTERFACE</p>
                <p class="font-semibold">{{ $storage->interface }} V </p>
            </div>
            <div>
                <p class="font-normal">CACHE</p>
                <p class="font-semibold">{{ $storage->cache }} MB  </p>
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
