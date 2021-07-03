<div>
    <div class="lg:flex items-center border  @if (in_array('mobo',$erors))
    border-red-400 my-1 bg-red-500 bg-opacity-10
    @else
    border-green-400
    @endif font-medium">
        <div class="lg:w-2/12 mr-2 ml-3 lg:text-lg text-sm">
            <p class=" border p-2 lg:inline lg:text-left text-center border-gray-800 ">MOBO</p>
        </div>
        
        <div class="lg:w-6/12 mr-2">
            <div class="flex items-center lg:justify-start justify-center p-3 space-x-3">
                <img src="images/{{ $mobo->images()->first()->path }}" alt="" width="100" class="border border-green-400">
                <button wire:click='$emit("openModal", "modals.mobos", @json(["mobo" => "$mobo->id"]))' class="btn-invisible"> {{ $mobo->name  }} </button>
            </div>
        </div>
        <div class="lg:w-3/12 mr-2">
            <p class=" border p-2 lg:inline lg:text-left text-center border-gray-800 ">{{ $mobo->manufacturer->name }}</p>
        </div>
        <p class="lg:w-2/12 mr-2  text-center lg:text-left lg:my-0 my-2">{{ number_format($mobo->price,2) }} kn</p>
        <div class="lg:w-1/12 mr-2 ">
            <form action="{{ route('build.mobo.remove', ['id'=>$mobo->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <div class="flex items-center  justify-center">
                    <p class="mr-6 lg:hidden">BRISANJE</p>
                    <button class="btn-green-remove"  type="submit">
                        X
                    </button>

                </div>
                
            </form>
        </div>
    </div>
</div>
