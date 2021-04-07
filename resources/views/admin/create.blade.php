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
                        <textarea name="post_content" id="" cols="30" rows="10" class="form-control"></textarea>
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
        
        

    @endsection
