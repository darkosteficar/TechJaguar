<div>
    <div class="font-medium border @if (in_array('fans',$erors))
    border-red-400 my-1 bg-red-500 bg-opacity-10
    @else
        border-green-400
    @endif">
        <div class="lg:flex items-center">
            <div class="lg:w-2/12  lg:text-lg text-sm ">
                <p class=" border p-2 lg:ml-3 lg:inline border-gray-800 lg:text-left text-center">FAN</p>
            </div>
            <div class="lg:w-11/12 ">
                @foreach ($fans as $fan)
                <div class="lg:flex items-center  ">
                    <div class="lg:w-6/12 mr-2">
                        <div class="flex lg:justify-start justify-center items-center p-3 space-x-3">
                            <img src="images/{{ $fan->images()->first()->path }}" alt="" width="100" class="border border-green-400">
                            <button wire:click='$emit("openModal", "modals.fans", @json(["fan" => "$fan->id"]))' class="btn-invisible"> {{ $fan->name  }} </button>
                        </div>
                    </div>
                    <div class="lg:w-3/12 mr-2">
                        <p class=" border p-2 lg:inline lg:text-left text-center border-gray-800 ">{{ $fan->manufacturer->name }}</p>
                    </div>
                    <p class="lg:w-2/12 mr-2 lg:my-0 my-2 lg:text-left text-center">{{ number_format($fan->price,2) }} kn</p>
                    <div class="lg:w-1/12 mr-2">
                        <form action="{{ route('build.fan.remove', ['id'=>$fan->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <div class="flex items-center justify-center">
                                <p class="lg:hidden mr-6">BRISANJE</p>
                                <button class="btn-green-remove"  type="submit">
                                    X
                                </button>
                            </div>
                        
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="flex lg:justify-start justify-center">
            <a href="{{ route('build.fan', []) }}">
                <button class="btn-green-select lg:ml-64">
                    Select FAN
                </button>
            </a>
        </div>
      
               
    </div>
</div>
