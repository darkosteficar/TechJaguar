<div>
    <div class="flex items-center border @if (in_array('case',$erors))
    border-red-400 my-1 bg-red-500 bg-opacity-10
    @else
        border-green-400
    @endif font-medium">
        <div class="w-2/12 ml-3 text-lg ">
            <p class=" border p-2 inline border-gray-800 ">CASE</p>
        </div>
        
        <div class="w-6/12">
            <div class="flex items-center p-3 space-x-3">
                <img src="images/{{ $pcCase->images()->first()->path }}" alt="" width="100" class="border border-green-400">
                <button wire:click='$emit("openModal", "modals.pc-cases", @json(["pcCase" => "$pcCase->id"]))' class="btn-invisible"> {{ $pcCase->name  }} </button>
            </div>
        </div>
        <div class="w-3/12">
            <p class=" border p-2 inline border-gray-800 ">{{ $pcCase->manufacturer->name }}</p>
        </div>
        <p class="w-2/12">{{ number_format($pcCase->price,2) }} kn</p>
        <div class="w-1/12 ">
            <form action="{{ route('build.pc_case.remove', ['id'=>$pcCase->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn-green-remove"  type="submit">
                    X
                </button>
            </form>
        </div>
    </div>
</div>
