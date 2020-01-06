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
                <h2 class="h6 mb-0 text-uppercase font-weight-bolder">Edit User</h2>
            </div>
        </div>
        <div class="col-6">
            <div class="text-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}">Back</a>
            </div>
        </div>
    </div>

    <div class="row justify-content-start mt-4">
        <div class="col col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <strong>Email:</strong>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <strong>Password:</strong>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <strong>Confirm Password:</strong>
                            <input type="password" name="confirm-password" class="form-control" placeholder="Confirm Password">
                        </div>

                        <div class="form-group">
                            <strong>Role:</strong>
                            <select name="roles[]" class="form-control @error('roles') is-invalid @enderror" multiple>
                                @foreach($roles as $role)
                                    <option value="{{ $role }}" {{ in_array($role, old('roles', $userRole) ? : []) ? 'selected' : '' }}>{{ $role }}</option>
                                @endforeach
                            </select>
                            @error('roles')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary text-uppercase">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection