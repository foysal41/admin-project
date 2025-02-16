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
                    <h3>Users Edit
                        <a href="{{ route('users.index') }}" class="btn btn-danger float-end">Back</a>
                    </h3>
                </div>


                <div class="card-body">
                    <form action="{{ route('users.update' , $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for=""> Name</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for=""> Email </label>
                            <input type="text" name="email" readonly value="{{ $user->email }}" class="form-control">

                        </div>

                        <div class="mb-3">
                            <label for=""> Password</label>
                            <input type="text" name="password" class="form-control">
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for=""> Role</label>
                            <select name="roles[]" class="form-control" multiple>
                                @foreach($roles as $role )
                                <option value="{{ $role }}" {{ in_array($role,$userRoles) ? 'selected' : '' }}>{{ $role }}</option>
                                @endforeach
                            </select>
                            @error('roles') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>




                        <div class="mb3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
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

