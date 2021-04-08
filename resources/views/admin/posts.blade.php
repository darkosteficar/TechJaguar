@extends('admin.layouts.app')

@section('content')
        <h1>Sve objave</h1>

        @if (Session::has('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
        
            
        @elseif(session('post-created-message'))
        <div class="alert alert-success">
            {{ session('post-created-message') }}
        </div>
        
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Name</th>
                    <th>Job Position</th>
                    <th>Since</th>
                    <th class="text-right">Salary</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">3</td>
                    <td>Alex Mike</td>
                    <td>Design</td>
                    <td>2010</td>
                    <td class="text-right">&euro; 92,144</td>
                    <td class="td-actions text-right">
                        <button type="button" rel="tooltip" class="btn btn-info btn-link btn-icon btn-sm">
                            <i class="tim-icons icon-single-02"></i>
                        </button>
                        <button type="button" rel="tooltip" class="btn btn-success btn-link btn-icon btn-sm">
                            <i class="tim-icons icon-settings"></i>
                        </button>
                        <button type="button" rel="tooltip" class="btn btn-danger btn-link btn-icon btn-sm">
                            <i class="tim-icons icon-simple-remove"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
           {{ $posts->links() }}
    @endsection