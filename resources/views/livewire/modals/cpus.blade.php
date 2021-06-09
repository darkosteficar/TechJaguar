<div>
    <div class="bg-green-600 shadow-2xl p-2">
        <div class="flex items-center justify-between">
            <p class="text-2xl text-gray-200 font-semibold ml-2">{{ $cpu->name }}</p>
            <p class="text-xl text-gray-300 font-semibold mr-2">{{ $cpu->manufacturer->name }}</p>
          
        </div>
       
    </div>
    
    <div class="bg-gray-800 ">
        <p class="ml-2 py-1 font-semibold text-green-400 text-xl">SPECIFIKACIJE:</p>
        <div class="flex flex-wrap space-x-8 space-y-4  items-center text-green-400 text-lg p-2">
            <div class="ml-8 mt-4">
                <p class="font-normal">MSRP</p>
                <p class="font-semibold">{{ $cpu->price }} kn</p>
            </div>
            <div>
                <p class="font-normal">PROIZVOĐAČ</p>
                <p class="font-semibold">{{ $cpu->manufacturer->name }} </p>
            </div>
            <div>
                <p class="font-normal">SOCKET</p>
                <p class="font-semibold">{{ $cpu->socket }}  </p>
            </div>
            <div>
                <p class="font-normal">SERIJA</p>
                <p class="font-semibold">{{ $cpu->series }}  </p>
            </div>
            <div>
                <p class="font-normal">RADNI TAKT</p>
                <p class="font-semibold">{{ $cpu->base_clock }} Ghz </p>
            </div>
            <div>
                <p class="font-normal">TURBO TAKT</p>
                <p class="font-semibold">{{ $cpu->boost_clock }} Ghz </p>
            </div>
            <div>
                <p class="font-normal">TDP</p>
                <p class="font-semibold">{{ $cpu->tdp }} W </p>
            </div>
            <div>
                <p class="font-normal">MIKROARHITEKTURA</p>
                <p class="font-semibold">{{ $cpu->microarchitecture }} </p>
            </div>
            <div>
                <p class="font-normal">BROJ JEZGRI</p>
                <p class="font-semibold">{{ $cpu->core_count }}  </p>
            </div>
            <div>
                <p class="font-normal">LITOGRAFIJA</p>
                <p class="font-semibold">{{ $cpu->litography }} n  </p>
            </div>
            <div>
                <p class="font-normal">KODNO IME</p>
                <p class="font-semibold">{{ $cpu->core_family }}  </p>
            </div>
            
            <div class="">
                <p class="font-normal">INTEGRIRANA GRAFIKA</p>
                @if ($cpu->integrated_graphics == 1)
                    <p class="font-normal">Da</p>
                @else
                    <p class="font-normal">Ne</p>
                @endif
            </div>
            <div class="">
                <p class="font-normal">SMT</p>
                @if ($cpu->smt == 1)
                    <p class="font-normal">Da</p>
                @else
                    <p class="font-normal">Ne</p>
                @endif
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
