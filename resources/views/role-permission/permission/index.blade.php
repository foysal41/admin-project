
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="mb-1 d-none">Dashboard</h1>
@stop

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Permissions</h4>
                        <a href="{{ route('permissions.create') }}" class="btn btn-primary float-end">Add Permission</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($permissions as $permission )
                                <tr>
                                    <td>{{ $permission->id }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-success">Edit</a>

                                        <a href="{{ route('permissions.delete', $permission->id) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop

