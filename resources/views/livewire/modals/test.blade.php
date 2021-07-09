<div>
    <p class="bg-green-500 text-gray-900 p-4 font-semibold  " style="text-shadow: none">ADDING CONFIRMATION</p>
    <div class="flex bg-gray-900 justify-between pr-4">
        <div>
            <p class=" text-green-400 p-4 font-semibold text-2xl text-shadow-green">{{ $foundComponent->name }}</p>
            <img src="../images/{{ $images['path'] }}" width="160" alt="" class="border border-green-400 shadow-lg mx-4 mb-4">
        </div>
        <div class="flex flex-col-reverse">
            <div>
                @if ($name != 'pccase')
                    <form action="{{ route('build.'.$name.'.add', []) }}" method="POST">
                @else
                    <form action="{{ route('build.pc_case.add', []) }}" method="POST">
                @endif
                        @csrf
                        <input type="hidden" name="id" value="{{ $foundComponent->id }}">
                        
                        <button class="inline-block px-6 py-2  font-semibold leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripplehover:shadow-lg hover:bg-green-600 focus:outline-none my-2 self-center hover:text-white" type="submit">
                            ADD
                        </button>
                    </form>
            </div>
        </div>
    </div>
   
</div>
