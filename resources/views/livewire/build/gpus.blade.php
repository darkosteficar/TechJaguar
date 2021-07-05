<div>
    
    <div class="pl- border @if (in_array('gpus',$erors))
    border-red-400 my-1 bg-red-500 bg-opacity-10
    @else
        border-green-400
    @endif font-medium">
        <div class="lg:flex items-center">
            <div class="lg:w-2/12 w-full  lg:text-lg text-sm  mr-2">
                <p class=" border p-2 lg:ml-3 lg:inline block border-gray-800 text-center">GPUS</p>
            </div>
            <div class="lg:w-11/12 ">
                @foreach ($gpus as $gpu)
                
                <div class="lg:flex items-center  ">
                    <div class="lg:w-6/12 w-full lg:text-base text-sm mr-2">
                        <div class="flex lg:justify-start justify-center items-center py-3 px-2 space-x-3">
                            <img src="images/{{ $gpu->images()->first()->path }}" alt="" width="100" class="border border-green-400">
                            
                            <button wire:click='$emit("openModal", "modals.gpus", @json(["gpu" => "$gpu->id"]))' class="btn-invisible"> {{ $gpu->name  }} </button>
                        </div>
                    </div>
                    <div class="lg:w-3/12 mr-2">
                        <p class=" border p-2 lg:inline border-gray-800 text-center">{{ $gpu->manufacturer->name }}</p>
                    </div>
                    <p class="lg:w-2/12 lg:text-left text-center lg:my-0 my-2 mr-2">{{ number_format($gpu->price,2) }} kn</p>
                    <div class="lg:w-1/12 mr-2">
                        <button class="btn-green-remove lg:mx-auto mr-4 ml-6"  type="submit" wire:click='$emit("openModal", "modals.conf-delete", @json(["component_id" => "$gpu->id", "component" => "Gpu"]))'>
                            X
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @if ($gpus[0]->crossfire == 0)
            <form action="{{ route('build.gpu.add', ['id'=>$gpus[0]->gpu_id]) }}" method="POST">
                @csrf
                <div class="flex lg:justify-start justify-center ">
                    <button class="btn-green-select mb-4 text-sm lg:ml-4">
                        Add another GPU
                    </button>  
                </div>
                
            </form>
        @endif
       
               
    </div>
</div>
