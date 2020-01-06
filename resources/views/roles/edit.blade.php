@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
@if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Whoops!</strong> There were some problems with your input.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row no-gutters align-items-end pb-3 border-bottom">
        <div class="col-6">
            <div class="text-left">
                <h2 class="h6 mb-0 text-uppercase font-weight-bolder">Edit Role</h2>
            </div>
        </div>
        <div class="col-6">
            <div class="text-right">
                <a class="btn btn-primary" href="{{ route('roles.index') }}">Back</a>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <form action="{{ route('roles.update', $role->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    <input type="text" name="name" value="{{ old('name', $role->name) }}" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12">
                        <strong>Permissions:</strong>
                        <div class="form-group">
                            <div class="row @error('permission') is-invalid @enderror">
                                @foreach($permissions as $permission)
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <label class="form-check-label" for="{{ $permission->id }}">
                                            <input name="permission[]" type="checkbox" id="{{ $permission->id }}" value="{{ $permission->id }}" {{ in_array($permission->id, old('permission', $rolePermissions) ? : []) ? 'checked' : '' }}>
                                            {{ str_replace('-', ' ', Str::title($permission->name)) }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            @error('permission')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 text-right">
                        <button type="submit" class="btn btn-primary text-uppercase">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
