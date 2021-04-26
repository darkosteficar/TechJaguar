@props(['cooler'=>$cooler])

    <form action="{{ route('coolers.delete', ['id'=>$cooler->id]) }}" method="post">
        @csrf
        @method('DELETE')
        <input type="hidden" name="name" value="{{ $cooler->name }}">
        <div class="modal fade modal-black" tabindex="-1" role="dialog" id="deleteModal{{ $cooler->id }}">
            <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Potvrda brisanja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="tim-icons icon-simple-remove"></i>
                </button>
                </div>
                <div class="modal-body ">
                <p>Jeste li sigurni da želite obrisati ovaj hladnjak?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Obriši</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Odustani</button>
                </div>
            </div>
            </div>
        </div>
    </form>
    