<div>
    <div class="font-medium border @if (in_array('rams',$erors))
    border-red-400 my-1 bg-red-500 bg-opacity-10
    @else
        border-green-400
    @endif">
        <div class="lg:flex items-center">
            <div class="lg:w-2/12  lg:text-lg text-sm">
                <p class=" border p-2 ml-3 lg:inline border-gray-800 text-center">RAM</p>
            </div>
            <div class="lg:w-11/12 ">
                @foreach ($rams as $ram)
                
                <div class="lg:flex items-center  ">
                    <div class="lg:w-6/12 mr-2">
                        <div class="flex items-center justify-center lg:justify-start p-3 space-x-3">
                            <img src="images/{{ $ram->images()->first()->path }}" alt="" width="100" class="border border-green-400">
                            <button wire:click='$emit("openModal", "modals.rams", @json(["ram" => "$ram->id"]))' class="btn-invisible"> {{ $ram->name  }} </button>
                        </div>
                    </div>
                    <div class="lg:w-3/12 mr-2">
                        <p class=" border p-2 lg:inline border-gray-800 lg:text-left text-center">{{ $ram->manufacturer->name }}</p>
                    </div>
                    <p class="lg:w-2/12 mr-2 lg:text-left text-center lg:my-0 my-2">{{ number_format($ram->price,2) }} kn</p>
                    <div class="lg:w-1/12 mr-2">
                        
                        <button class="btn-green-remove lg:mx-auto mr-4 ml-6"  type="submit" wire:click='$emit("openModal", "modals.conf-delete", @json(["component_id" => "$ram->id", "component" => "Ram"]))'>
                            X
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
      
        <a href="{{ route('build.ram', []) }}">
            <div class="flex justify-center lg:justify-start">
                <button class="btn-green-select lg:ml-64 ">
                    Select RAM
                </button>
            </div>
        </a>
               
    </div>
</div>
