@extends('admin.layouts.app')

@section('content')
<div class="d-flex">
    <h1>New App</h1>
    <a href="{{ route('apps.index', []) }}">
        <button class="btn btn-success ml-5">Apps</button>
    </a>
</div>
   
        @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
            <br/>
        @endif
        @if (session()->has('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('apps.store', []) }}" enctype="multipart/form-data">
        
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3"> <label for="chipset_name">Name</label>
                                <input class="form-control" type="text" name="name" data="green">
                            </div>
                            <div class="col-3"> <label for="chipset_name">Tag</label>
                                <input class="form-control" type="text" name="tag" data="green">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                                <div class="col-4">
                                    <label for="smt">Resolution</label>
                                    <select class="form-control"  style="background-color: #27293D" name="resolution">
                                            <option value="1080p">1920x1080p</option>
                                            <option value="1440p">2560x1440p</option>
                                            <option value="4K">3840x2160p</option>
                                   </select>
                                </div>
                                <div class="col-4">
                                    <label for="smt">Type</label>
                                    <select class="form-control"  style="background-color: #27293D" name="type">
                                            <option value="benchmark">Benchmark</option>
                                            <option value="game">Game</option>
                                            <option value="productivity">Productivity</option>
                                   </select>
                                </div>
                           
                        </div>
                    </div>
                    
                  
                   <button type="submit" class="btn btn-success">Create</button>
                </form>
            </div>
        </div>
        
       
    
@endsection