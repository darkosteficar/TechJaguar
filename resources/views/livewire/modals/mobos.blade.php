<div>
    <div class="bg-green-600 shadow-2xl p-2">
        <div class="flex items-center justify-between">
            <p class="text-2xl text-gray-200 font-semibold ml-2">{{ $mobo->name }}</p>
            <p class="text-xl text-gray-300 font-semibold mr-2">{{ $mobo->type }}</p>
            
        </div>
       
    </div>
    
    <div class="bg-gray-800 ">
        <p class="ml-2 py-1 font-semibold text-green-400 text-xl">SPECIFIKACIJE:</p>
        <div class="flex flex-wrap space-x-8 space-y-4 items-center text-green-400 text-lg p-2">
            <div class="ml-8 mt-4">
                <p class="font-normal">MSRP</p>
                <p class="font-semibold">{{ $mobo->price }} kn</p>
            </div>
            <div>
                <p class="font-normal">PROIZVOĐAČ</p>
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
                <p class="font-normal">VELIČINA</p>
                <p class="font-semibold">{{ $mobo->form_factor }}  </p>
            </div>
            <div>
                <p class="font-normal">BROJ UTORA MEMORIJE</p>
                <p class="font-semibold">{{ $mobo->memory_slots }}  </p>
            </div>
            <div>
                <p class="font-normal">KAPACITET MEMORIJE</p>
                <p class="font-semibold">{{ $mobo->max_memory }} GB </p>
            </div>
            <div>
                <p class="font-normal">BROJ M.2 SLOTOVA</p>
                <p class="font-semibold">{{ $mobo->m_2_slots }}  </p>
            </div>
            <div>
                <p class="font-normal">SATA PRIKLJUČCI</p>
                <p class="font-semibold">{{ $mobo->sata_ports }}  </p>
            </div>
            <div>
                <p class="font-normal">USB 2.0 PRIKLJUČCI</p>
                <p class="font-semibold">{{ $mobo->usb_2_0_headers }}  </p>
            </div>
            <div>
                <p class="font-normal">USB 3.2 GEN 1 PRIKLJUČCI</p>
                <p class="font-semibold">{{ $mobo->usb_3_2_gen1_headers }}  </p>
            </div>
            <div>
                <p class="font-normal">USB 3.2 GEN 2 PRIKLJUČCI</p>
                <p class="font-semibold">{{ $mobo->usb_3_2_gen2_headers }}  </p>
            </div>
            <div>
                <p class="font-normal">PCI E X16 UTORI</p>
                <p class="font-semibold">{{ $mobo->pci_e_x16_slots }}  </p>
            </div>
            <div>
                <p class="font-normal">PCI E X8 UTORI</p>
                <p class="font-semibold">{{ $mobo->pci_e_x8_slots }}  </p>
            </div>
            <div>
                <p class="font-normal">PCI E X4 UTORI</p>
                <p class="font-semibold">{{ $mobo->pci_e_x4_slots }}  </p>
            </div>
            <div>
                <p class="font-normal">PCI E X1 UTORI</p>
                <p class="font-semibold">{{ $mobo->pci_e_x1_slots }}  </p>
            </div>
            
            <div>
                <p class="font-normal">WI-FI</p>
                @if ($mobo->wireless_support == 0)
                    <p class="font-semibold">Ne </p>
                @else
                    <p class="font-semibold">Da</p>
                @endif
            </div>
            
        </div>
        <hr class="border border-green-400">
        <p class="ml-2 pt-1 font-semibold text-green-400 text-xl">SLIKE:</p>
        <div class="flex flex-wrap items-center justify-center p-2 space-x-2 space-y-2">
            @foreach ($images as $key => $image)
                <div class="w-5/12 ">
                    <img src="../images/{{ $image['path'] }}" alt="" class="border border-green-400 shadow-lg">
                </div>
            @endforeach
        </div>    
    </div>
    
    
</div>
