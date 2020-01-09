@extends('layouts.app')

@section('title', 'Roles Management')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row no-gutters align-items-end pb-3 border-bottom">
        <div class="col-6">
            <div class="text-left">
                <h2 class="h6 mb-0 text-uppercase font-weight-bolder">Roles Management</h2>
            </div>
        </div>
        <div class="col-6">
            <div class="text-right">
                @can('role-create')
                <a class="btn btn-primary text-uppercase" href="{{ route('roles.create') }}">Add New</a>
                @endcan
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered mt-4">
            <thead>
                <tr>
                    <th scope="col" class="text-center" width="60">No</th>
                    <th scope="col">Name</th>
                    <th scope="col" class="text-right" width="130">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                <tr>
                    <th scope="row" class="text-center">{{ ++$i }}</th>
                    <td>{{ $role->name }}</td>
                    <td class="text-right">
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                            <a class="btn btn-sm btn-success" href="{{ route('roles.show', $role->id) }}">
                                <i class="far fa-eye"></i>
                            </a>
                            
                            @can('role-edit')
                                <a class="btn btn-sm btn-warning" href="{{ route('roles.edit', $role->id) }}">
                                    <i class="far fa-edit"></i>
                                </a>
                            @endcan
                            
                            @can('role-delete')
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4 pt-3 border-top">
        <div class="float-right">
            {!! $roles->links() !!}
        </div>
    </div>
@endsection
