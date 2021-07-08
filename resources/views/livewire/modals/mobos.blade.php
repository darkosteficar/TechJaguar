<div>
    <div class="bg-green-600 shadow-2xl p-2">
        <div class="flex items-center justify-between text-shadow">
            <p class="text-2xl text-gray-200 font-semibold ml-2">{{ $mobo->name }}</p>
            <p class="text-xl text-gray-300 font-semibold mr-2">{{ $mobo->type }}</p>
            
        </div>
       
    </div>
    
    <div class="bg-gray-900 text-shadow">
        <p class="ml-2 py-1 font-semibold text-green-400 text-xl">SPECS:</p>
        <div class="grid grid-cols-3 space-x-8 space-y-4 items-center text-green-400 text-lg p-2">
            <div class="ml-8 mt-4">
                <p class="font-normal">MSRP</p>
                <p class="font-semibold">{{ $mobo->price }} kn</p>
            </div>
            <div>
                <p class="font-normal">MANUFACTURER</p>
                <p class="font-semibold">{{ $mobo->manufacturer->name }} </p>
            </div>
            <div>
                <p class="font-normal">SOCKET</p>
                <p class="font-semibold">{{ $mobo->socket }}  </p>
            </div>
            <div>
                <p class="font-normal">CHIPSET</p>
                <p class="font-semibold">{{ $mobo->chipset->name }}  </p>
            </div>
            <div>
                <p class="font-normal">FORM FACTOR</p>
                <p class="font-semibold">{{ $mobo->form_factor }}  </p>
            </div>
            <div>
                <p class="font-normal">MEMORY SLOTS</p>
                <p class="font-semibold">{{ $mobo->memory_slots }}  </p>
            </div>
            <div>
                <p class="font-normal">MAX MEMORY</p>
                <p class="font-semibold">{{ $mobo->max_memory }} GB </p>
            </div>
            <div>
                <p class="font-normal">M.2 SLOTS</p>
                <p class="font-semibold">{{ $mobo->m_2_slots }}  </p>
            </div>
            <div>
                <p class="font-normal">SATA PORTS</p>
                <p class="font-semibold">{{ $mobo->sata_ports }}  </p>
            </div>
            <div>
                <p class="font-normal">USB 2.0 HEADERS</p>
                <p class="font-semibold">{{ $mobo->usb_2_0_headers }}  </p>
            </div>
            <div>
                <p class="font-normal">USB 3.2 GEN 1 HEADERS</p>
                <p class="font-semibold">{{ $mobo->usb_3_2_gen1_headers }}  </p>
            </div>
            <div>
                <p class="font-normal">USB 3.2 GEN 2 HEADERS</p>
                <p class="font-semibold">{{ $mobo->usb_3_2_gen2_headers }}  </p>
            </div>
            <div>
                <p class="font-normal">PCI E X16 SLOTS</p>
                <p class="font-semibold">{{ $mobo->pci_e_x16_slots }}  </p>
            </div>
            <div>
                <p class="font-normal">PCI E X8 SLOTS</p>
                <p class="font-semibold">{{ $mobo->pci_e_x8_slots }}  </p>
            </div>
            <div>
                <p class="font-normal">PCI E X4 SLOTS</p>
                <p class="font-semibold">{{ $mobo->pci_e_x4_slots }}  </p>
            </div>
            <div>
                <p class="font-normal">PCI E X1 SLOTS</p>
                <p class="font-semibold">{{ $mobo->pci_e_x1_slots }}  </p>
            </div>
            
            <div>
                <p class="font-normal">WI-FI</p>
                @if ($mobo->wireless_support == 0)
                    <p class="font-semibold">No </p>
                @else
                    <p class="font-semibold">Yes</p>
                @endif
            </div>
            
        </div>
        <hr class="border border-green-400">
        <p class="ml-2 pt-1 font-semibold text-green-400 text-xl">IMAGES:</p>
        <div class="flex flex-wrap items-center justify-center p-2 space-x-2 space-y-2">
            @foreach ($images as $key => $image)
                <div class="w-5/12 ">
                    <img src="../images/{{ $image['path'] }}" alt="" class="border border-green-400 shadow-lg">
                </div>
            @endforeach
        </div>    
    </div>
    
    
</div>
