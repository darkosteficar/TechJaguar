<div>
    <div class="lg:flex items-center border @if (in_array('case',$erors))
    border-red-400 my-1 bg-red-500 bg-opacity-10
    @else
        border-green-400
    @endif font-medium">
        <div class="lg:w-2/12 lg:ml-3 lg:text-lg text-sm mr-2">
            <p class=" border p-2 lg:inline border-gray-800 lg:text-left text-center">CASE</p>
        </div>
        
        <div class="lg:w-6/12 mr-2">
            <div class="flex lg:justify-start justify-center items-center p-3 space-x-3">
                <img src="images/{{ $pcCase->images()->first()->path }}" alt="" width="100" class="border border-green-400">
                <button wire:click='$emit("openModal", "modals.pc-cases", @json(["pcCase" => "$pcCase->id"]))' class="btn-invisible"> {{ $pcCase->name  }} </button>
            </div>
        </div>
        <div class="lg:w-3/12 mr-2">
            <p class=" border p-2 lg:inline lg:text-left text-center border-gray-800 ">{{ $pcCase->manufacturer->name }}</p>
        </div>
        <p class="lg:w-2/12 mr-2 lg:text-left text-center lg:my-0 my-2">{{ number_format($pcCase->price,2) }} kn</p>
        <div class="lg:w-1/12 mr-2 ">
            <form action="{{ route('build.pc_case.remove', ['id'=>$pcCase->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <div class="flex items-center lg:justify-start justify-center">
                    <p class="lg:hidden mr-6">BRISANJE</p>
                    <button class="btn-green-remove"  type="submit">
                        X
                    </button>
                </div>
                
            </form>
        </div>
    </div>
</div>
