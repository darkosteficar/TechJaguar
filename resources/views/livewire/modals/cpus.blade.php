<div>
    <div class="bg-green-600 shadow-2xl p-2">
        <div class="flex items-center justify-between text-shadow">
            <p class="text-2xl text-gray-200 font-semibold ml-2 ">{{ $cpu->name }}</p>
            <p class="text-xl text-gray-100 font-semibold mr-2">{{ $cpu->manufacturer->name }}</p>
          
        </div>
       
    </div>
    
    <div class="bg-gray-900 ">
        <p class="ml-2 py-1 font-semibold text-green-400 text-xl">SPECS:</p>
        <div class="grid lg:grid-cols-3 grid-cols-2 gap-4 text-green-400 lg:text-lg px-2 pl-10 pb-2">
            <div class=" ">
                <p class="font-normal">MSRP</p>
                <p class="font-semibold">{{ $cpu->price }} kn</p>
            </div>
            <div>
                <p class="font-normal">MANUFACTURER</p>
                <p class="font-semibold">{{ $cpu->manufacturer->name }} </p>
            </div>
            <div>
                <p class="font-normal">SOCKET</p>
                <p class="font-semibold">{{ $cpu->socket }}  </p>
            </div>
            <div>
                <p class="font-normal">SERIES</p>
                <p class="font-semibold">{{ $cpu->series }}  </p>
            </div>
            <div>
                <p class="font-normal">BASE CLOCK</p>
                <p class="font-semibold">{{ $cpu->base_clock }} Ghz </p>
            </div>
            <div>
                <p class="font-normal">BOOST CLOCK</p>
                <p class="font-semibold">{{ $cpu->boost_clock }} Ghz </p>
            </div>
            <div>
                <p class="font-normal">TDP</p>
                <p class="font-semibold">{{ $cpu->tdp }} W </p>
            </div>
            <div>
                <p class="font-normal">MICROARHICTECTURE</p>
                <p class="font-semibold">{{ $cpu->microarchitecture }} </p>
            </div>
            <div>
                <p class="font-normal">CORE COUNT</p>
                <p class="font-semibold">{{ $cpu->core_count }}  </p>
            </div>
            <div>
                <p class="font-normal">LITOGRAPHY</p>
                <p class="font-semibold">{{ $cpu->litography }} n  </p>
            </div>
            <div>
                <p class="font-normal">CORE FAMILY</p>
                <p class="font-semibold">{{ $cpu->core_family }}  </p>
            </div>
            
            <div class="">
                <p class="font-normal">IGPU</p>
                @if ($cpu->integrated_graphics == 1)
                    <p class="font-normal">Yes</p>
                @else
                    <p class="font-normal">No</p>
                @endif
            </div>
            <div class="">
                <p class="font-normal">SMT</p>
                @if ($cpu->smt == 1)
                    <p class="font-normal">Yes</p>
                @else
                    <p class="font-normal">No</p>
                @endif
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
