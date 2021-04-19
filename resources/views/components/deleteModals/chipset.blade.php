@props(['chipset'=>$chipset])

    <form action="{{ route('chipsets.delete', ['id'=>$chipset->id]) }}" method="post">
        @csrf
        @method('DELETE')
        <input type="hidden" name="chipset_name" value="{{ $chipset->name }}">
        <div class="modal fade modal-black" tabindex="-1" role="dialog" id="deleteModal{{ $chipset->id }}">
            <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Potvrda brisanja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="tim-icons icon-simple-remove"></i>
                </button>
                </div>
                <div class="modal-body ">
                <p>Jeste li sigurni da želite obrisati ovaj chipset?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Obriši</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Odustani</button>
                </div>
            </div>
            </div>
        </div>
    </form>
    

