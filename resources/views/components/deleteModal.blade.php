@props(['post'=>$post])

<form action="{{ route('post.delete', ['id'=>$post->id]) }}" method="post">
    @csrf
    <input type="hidden" name="post_title" value="{{ $post->post_title }}">
    <div class="modal fade modal-black" tabindex="-1" role="dialog" id="deleteModal{{ $post->id }}">
        <div class="modal-dialog " role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Potvrda brisanja</h5>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
            <div class="modal-body ">
              <p>Jeste li sigurni da želite obrisati ovu objavu?</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Obriši</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Odustani</button>
            </div>
          </div>
        </div>
    </div>
</form>