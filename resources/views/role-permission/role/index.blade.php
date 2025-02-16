
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="mb-1 d-none">Dashboard</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-header">
                        <h3>Roles
                            <a href="{{ route('roles.create') }}" class="btn btn-info float-end">Create</a>
                        </h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                          <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                          </thead>

                          <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{$role->name }}</td>
                                <td>
                                    <a href="{{ route('roles.edit' , $role->id) }}" class="btn btn-success">Edit</a>
                                    <a href="{{ route('roles.delete' , $role->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?');">Delete</a>


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
class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this?');"
