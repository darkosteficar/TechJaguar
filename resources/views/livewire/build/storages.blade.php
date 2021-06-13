<div>
    <div class="font-medium border @if (in_array('storages',$erors))
    border-red-400 my-1 bg-red-500 bg-opacity-10
    @else
        border-green-400
    @endif">
        <div class="flex items-center">
            <div class="w-2/12  text-lg ">
                <p class=" border p-2 ml-3 inline border-gray-800 ">HDD/SSD</p>
            </div>
            <div class="w-11/12 ">
                @foreach ($storages as $storage)
               
                <div class="flex items-center  ">
                    <div class="w-6/12">
                        <div class="flex items-center p-3 space-x-3">
                            <img src="images/{{ $storage->images()->first()->path }}" alt="" width="100" class="border border-green-400">
                            <button wire:click='$emit("openModal", "modals.storages", @json(["storage" => "$storage->id"]))' class="btn-invisible"> {{ $storage->name  }} </button>
                        </div>
                    </div>
                    <div class="w-3/12">
                        <p class=" border p-2 inline border-gray-800 ">{{ $storage->manufacturer->name }}</p>
                    </div>
                    <p class="w-2/12">{{ number_format($storage->price,2) }} kn</p>
                    <div class="w-1/12 ">
                        <form action="{{ route('build.storage.remove', ['id'=>$storage->id]) }}" method="post">
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
        <a href="{{ route('build.storage', []) }}">
            <button class="btn-green-select ml-64">
                Select HDD/SSD
            </button>
        </a>
               
    </div>
</div>
