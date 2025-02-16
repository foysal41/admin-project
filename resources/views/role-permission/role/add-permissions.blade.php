@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="mb-1 d-none">Dashboard</h1>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Role: {{ $role->name }}
                        <a href="{{ route('roles.store') }}" class="btn btn-danger float-end">Back</a>
                    </h3>
                </div>


                <div class="card-body">
                    <form action="{{ url('roles/'.$role->id.'/give-permissions')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            @error('permission')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <label for="">Permissions</label>
                            <div class="row">
                                @foreach($permissions as $permission )
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input type="checkbox" name="permission[]"
                                        value="{{ $permission->name }}"
                                        {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}

                                        class="form-check-input">
                                        <label class="form-check-label">
                                            {{ $permission->name }}
                                        </label>
                                    </div>

                                </div>
                                @endforeach
                            </div>
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

