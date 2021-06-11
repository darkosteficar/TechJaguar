<div>
    
    <div class="pl- border @if (in_array('gpus',$erors))
    border-red-400 my-1 bg-red-500 bg-opacity-10
    @else
        border-green-400
    @endif font-medium">
        <div class="flex items-center">
            <div class="w-2/12  text-lg ">
                <p class=" border p-2 ml-3 inline border-gray-800 ">GPUS</p>
            </div>
            <div class="w-11/12 ">
                @foreach ($gpus as $gpu)
                
                <div class="flex items-center  ">
                    <div class="w-6/12">
                        <div class="flex items-center py-3 px-2 space-x-3">
                            <img src="images/{{ $gpu->images()->first()->path }}" alt="" width="100" class="border border-green-400">
                            
                            <button wire:click='$emit("openModal", "modals.gpus", @json(["gpu" => "$gpu->id"]))' class="btn-invisible"> {{ $gpu->name  }} </button>
                        </div>
                    </div>
                    <div class="w-3/12">
                        <p class=" border p-2 inline border-gray-800 ">{{ $gpu->manufacturer->name }}</p>
                    </div>
                    <p class="w-2/12">{{ number_format($gpu->price,2) }} kn</p>
                    <div class="w-1/12 ">
                        <form action="{{ route('build.gpu.remove', ['id'=>$gpu->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn-green-remove"  type="submit">
                                X
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @if ($gpus[0]->crossfire == 1)
            <form action="{{ route('build.gpu.add', ['id'=>$gpu_id]) }}" method="POST">
                @csrf
                <button class="btn-green-select mb-4 text-sm ml-64">
                    Add another GPU
                </button>  
            </form>
        @endif
       
               
    </div>
</div>
