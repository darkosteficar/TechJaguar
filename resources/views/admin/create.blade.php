@extends('admin.layouts.app')

@section('content')
    <h1>Nova objava</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div><br />
        @endif
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('post.store', []) }}" enctype="multipart/form-data">
        
                    @csrf
                    <div class="form-group">
                        <label for="post_title">Naslov</label>
                        <input class="form-control" type="text" name="post_title" data="green">
                    </div>
                    <div class="form-group">
                        <label for="post_content">Sadržaj</label>
                        <textarea name="post_content" id="post_content" cols="30" rows="10" class="form-control my-editor"></textarea>
                    </div>

                    <div class="form-group mt-3">
                        <div class="row">
                            <div class="col-3">
                                <label for="">GPU</label>
                                <select name="" id="select-gpu">
                                    <option value=""></option>
                                    <option value="22">Basdasd</option>
                                   
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="">CPU</label>
                                <select name="" id="select-cpu">
                                    <option value=""></option>
                                    <option value="22">Basdasd</option>
                                   
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="">Matična ploča</label>
                                <select name="" id="select-mobo">
                                    <option value=""></option>
                                    <option value="22">Basdadfgdfgdfgdfgdfgdfgdfgdfgdfgdfgsd dfgdfgdfgdfg sdfsdf sdf sdfsdf</option>
                                   
                                </select>
                            </div>
                        </div>
                       
                    </div>
                  
                   <button type="submit" class="btn btn-success">Objavi</button>
                </form>
            </div>
        </div>
        
       
        <script>
            $('#select-gpu').selectize();
            $('#select-cpu').selectize();
            $('#select-mobo').selectize();
        </script>
        <script>
            var editor_config = {
              path_absolute : "/",
              selector: '#post_content',
              relative_urls: false,
              plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table directionality",
                "emoticons template paste textpattern"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
              file_picker_callback : function(callback, value, meta) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
          
                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
                if (meta.filetype == 'image') {
                  cmsURL = cmsURL + "&type=Images";
                } else {
                  cmsURL = cmsURL + "&type=Files";
                }
          
                tinyMCE.activeEditor.windowManager.openUrl({
                  url : cmsURL,
                  title : 'Filemanager',
                  width : x * 0.8,
                  height : y * 0.8,
                  resizable : "yes",
                  close_previous : "no",
                  onMessage: (api, message) => {
                    callback(message.content);
                  }
                });
              }
            };
          
            tinymce.init(editor_config);
          </script>
        

    @endsection
