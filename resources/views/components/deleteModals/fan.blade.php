@props(['fan'=>$fan])

    <form action="{{ route('fans.delete', ['id'=>$fan->id]) }}" method="post">
        @csrf
        @method('DELETE')
        <input type="hidden" name="name" value="{{ $fan->name }}">
        <div class="modal fade modal-black" tabindex="-1" role="dialog" id="deleteModal{{ $fan->id }}">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="tim-icons icon-simple-remove"></i>
                    </button>
                    </div>
                    <div class="modal-body ">
                    <p>Are you sure you want to delete this Fan?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Delete</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
        </div>
    </form>
    