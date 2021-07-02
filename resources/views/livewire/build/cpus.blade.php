<div>
    <div class="lg:flex items-center border @if (in_array('cpu',$erors))
    border-red-400 my-1 bg-red-500 bg-opacity-10
        @else
        border-green-400
        @endif font-medium">
        <div class="lg:w-2/12 w-full lg:ml-3 lg:text-lg text-sm  mr-2">
            <p class=" border p-2 lg:inline block border-gray-800 text-center">CPU</p>
        </div>
        
        <div class="lg:w-6/12 w-full  mr-2">
            <div class="flex items-center p-3 space-x-3 lg:text-base text-sm lg:justify-start justify-between">
                <img src="images/{{ $cpu->images()->first()->path }}" alt="" width="100" class="border border-green-400">
                <button wire:click='$emit("openModal", "modals.cpus", @json(["cpu" => "$cpu->id"]))' class="btn-invisible"> {{ $cpu->name  }} </button>
            </div>
        </div>
        <div class="lg:w-3/12 w-full mr-2">
            <p class=" border p-2 lg:inline block border-gray-800 text-center">{{ $cpu->manufacturer->name }}</p>
        </div>
      
        <p class="lg:w-2/12 w-full lg:text-left text-center lg:my-0 my-2 mr-2">{{ number_format($cpu->price,2) }} kn</p>
        <div class="lg:w-1/12 w-full  mr-2">
            <form action="{{ route('build.cpu.remove', ['id'=>$cpu->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <div class="lg:ml-0 ml-6 flex items-center justify-center">
                    <p class="lg:hidden">BRISANJE</p>
                    <button class="btn-green-remove lg:mx-auto mr-4 ml-6"  type="submit">
                        X
                    </button>
                </div>
                
            </form>
        </div>
      
        
    </div>
</div>
