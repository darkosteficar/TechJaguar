<div>
    <div class="font-medium border @if (in_array('rams',$erors))
    border-red-400 my-1 bg-red-500 bg-opacity-10
    @else
        border-green-400
    @endif">
        <div class="flex items-center">
            <div class="w-2/12  text-lg ">
                <p class=" border p-2 ml-3 inline border-gray-800 ">RAM</p>
            </div>
            <div class="w-11/12 ">
                @foreach ($rams as $ram)
                
                <div class="flex items-center  ">
                    <div class="w-6/12">
                        <div class="flex items-center p-3 space-x-3">
                            <img src="images/{{ $ram->images()->first()->path }}" alt="" width="100" class="border border-green-400">
                            <button wire:click='$emit("openModal", "modals.rams", @json(["ram" => "$ram->id"]))' class="btn-invisible"> {{ $ram->name  }} </button>
                        </div>
                    </div>
                    <div class="w-3/12">
                        <p class=" border p-2 inline border-gray-800 ">{{ $ram->manufacturer->name }}</p>
                    </div>
                    <p class="w-2/12">{{ number_format($ram->price,2) }} kn</p>
                    <div class="w-1/12 ">
                        <form action="{{ route('build.ram.remove', ['id'=>$ram->id]) }}" method="post">
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
        <a href="{{ route('build.ram', []) }}">
            <button class="btn-green-select ml-64">
                Select RAM
            </button>
        </a>
               
    </div>
</div>
