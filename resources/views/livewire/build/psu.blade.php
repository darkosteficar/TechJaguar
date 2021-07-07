<div>
    <div class="lg:flex items-center border @if (in_array('psu',$erors))
    border-red-400 my-1 bg-red-500 bg-opacity-10
    @else
        border-green-400
    @endif font-medium">
        <div class="lg:w-2/12 mr-2 lg:ml-3 lg:text-lg text-sm">
            <p class=" border p-2 lg:inline border-gray-800 text-center lg:text-left">PSU</p>
        </div>
        
        <div class="lg:w-6/12 mr-2">
            <div class="flex lg:justify-start justify-center items-center p-3 space-x-3">
                <img src="images/{{ $psu->images()->first()->path }}" alt="" width="100" class="border border-green-400">
                <button wire:click='$emit("openModal", "modals.psus", @json(["psu" => "$psu->id"]))' class="btn-invisible"> {{ $psu->name  }} </button>
            </div>
        </div>
        <div class="lg:w-3/12 mr-2">
            <p class=" border p-2 lg:inline border-gray-800 lg:text-left text-center ">{{ $psu->manufacturer->name }}</p>
        </div>
        <p class="lg:w-2/12  mr-2 text-center lg:text-left lg:my-0 my-2">{{ number_format($psu->price,2) }} kn</p>
        <div class="lg:w-1/12  mr-2">
            <button class="btn-green-remove lg:mx-auto mr-4 ml-6"  type="submit" wire:click='$emit("openModal", "modals.conf-delete", @json(["component_id" => "$psu->id", "component" => "Psu"]))'>
                X
            </button>
        </div>
    </div>
</div>
