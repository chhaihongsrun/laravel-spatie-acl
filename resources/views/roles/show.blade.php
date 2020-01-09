@extends('layouts.app')

@section('title', $role->name)

@section('content')
    <div class="row no-gutters align-items-end pb-3 border-bottom">
        <div class="col-6">
            <div class="text-left">
                <h2 class="h6 mb-0 text-uppercase font-weight-bolder">Role:&nbsp; <span class="text-capitalize">{{ $role->name }}</span></h2>
            </div>
        </div>
        <div class="col-6">
            <div class="text-right">
                <a class="btn btn-primary" href="{{ route('roles.index') }}">Back</a>
            </div>
        </div>
    </div>


    <div class="row justify-content-start mt-4">
        <div class="col-12 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <dl class="mb-0">
                        <div class="d-block d-md-flex">
                            <dt>Name:&nbsp;</dt>
                            <dd>{{ $role->name }}</dd>
                        </div>
                        <div class="d-block d-md-flex mb-2">
                            <dt>Permissions:&nbsp;</dt>
                            <dd>
                                @if(!empty($rolePermissions))
                                    @foreach($rolePermissions as $rolePermission)
                                        <label class="badge badge-success">{{ str_replace('-', ' ', Str::title($rolePermission->name)) }}</label>
                                    @endforeach
                                @endif
                            </dd>
                        </div>
                        <div class="d-block d-md-flex">
                            <dt>Created At:&nbsp;</dt>
                            <dd>{{ $role->created_at }}</dd>
                        </div>
                        <div class="d-block d-md-flex">
                            <dt>Updarted At:&nbsp;</dt>
                            <dd>{{ $role->updated_at }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection

