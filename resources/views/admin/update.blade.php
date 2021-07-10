@extends('admin.layouts.app')

@section('content')
    <h1>Updating Post</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div><br />
        @endif
        @if (session()->has('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('posts.save', []) }}" enctype="multipart/form-data">
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    @csrf
                    <div class="form-group">
                        <label for="post_title">Title</label>
                        <input class="form-control" type="text" name="post_title" data="green" value="{{ $post->post_title }}">
                    </div>
                    <div class="form-group">
                        <label for="post_content">Content</label>
                        <textarea name="post_content" id="post_content" cols="70" rows="10" class="form-control my-editor" value="">{{ $post->body }}</textarea>
                    </div>

                    <div class="form-group mt-3">
                        <div class="row">
                            <div class="col-3">
                                <label for="">GPU</label>
                                <select name="gpu_id" id="select-gpu">
                                    <option value=""></option>
                                    <option value=""></option>
                                    @foreach ($gpus as $gpu)
                                    
                                    <option value="{{ $gpu->id }}"  @if ($post->gpu_id === $gpu->id)
                                        selected
                                    @endif> {{ $gpu->name }}</option>
                                    @endforeach
                                   
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="">CPU</label>
                                <select name="cpu_id" id="select-cpu">
                                    <option value=""></option>
                                    @foreach ($cpus as $cpu)
                                        <option value="{{ $cpu->id }}"  @if ($post->cpu_id === $cpu->id)
                                            selected
                                        @endif> {{ $cpu->name }}</option>
                                    @endforeach
                                   
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="">Motherboard</label>
                                <select name="mobo_id" id="select-mobo">
                                    
                                    @foreach ($mobos as $mobo)
                                        <option value="{{ $mobo->id }}" @if ($post->mobo_id === $mobo->id)
                                            selected
                                        @endif> {{ $mobo->name }}</option>
                                    @endforeach
                                    
                                   
                                </select>
                            </div>
                        </div>
                       
                    </div>

                    <div class="form-group mt-3">
                        <div class="row">
                            <div class="col-4">
                                <label for="exampleFormControlSelect1">Category</label>
                                <select class="form-control" name="category_id" style="background-color: #27293D">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @if ($category->id === $post->category_id)
                                            selected
                                        @endif>{{ $category->name }}</option>    
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-4">
                                <label for="exampleFormControlSelect1">Manufacturer</label>
                                <select class="form-control" style="background-color: #27293D" name="manufacturer_id">
                                    @foreach ($manufacturers as $manufacturer)
                                        <option value="{{ $manufacturer->id }}" @if($post->manufacturer_id === $manufacturer->id)selected @endif>{{ $manufacturer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class=" form-row">
                        <label for="uploadImageFile"> &nbsp; Cover Image: &nbsp; </label>
                        <input class="form-control" type="file" id="uploadImageFileAddPost" name="post_image" onchange="showImageHereFuncAddPost();"  />
                        <label for="showImageHere" class="mr-3">Preview slike -></label>
                        <div class="valid-feedback">
                            Great!
                        </div>
                        <div class="invalid-feedback">
                            Image is required.
                        </div>
                        <div id="showImageHereAddPost"></div>
                    </div>
                  
                   <button type="submit" class="btn btn-success">Save Changes</button>
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
              height: 600,
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
          <script>
              tinyMCE.activeEditor.setContent('<span>some</span> html');
          </script>
            <script>
                 function showImageHereFuncAddPost() {
                    $("#showImageHereAddPost").empty();
                    var total_file = document.getElementById("uploadImageFileAddPost").files
                        .length;
                    for (var i = 0; i < total_file; i++) {
                        $("#showImageHereAddPost").append(

                            "<img src='" +
                            URL.createObjectURL(event.target.files[i]) +
                            "' height='200px' width=' 400px' style='border-style: solid; border-color:#00f2c3;border-width:1px ' class='mr-2 mb-2'>"
                        );
                    }
                }
            </script>

    @endsection
