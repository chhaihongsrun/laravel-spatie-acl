@extends('layouts.app')

@section('title', 'Users Management')

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
                <h2 class="h6 mb-0 text-uppercase font-weight-bolder">Users Management</h2>
            </div>
        </div>
        <div class="col-6">
            <div class="text-right">
                <a class="btn btn-primary text-uppercase" href="{{ route('users.create') }}">Add New</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered mt-4">
            <thead>
                <tr>
                    <th scope="col" class="text-center" width="60">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Roles</th>
                    <th scope="col" class="text-right" width="130">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row" class="text-center">{{ ++$i }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $userRoleNames)
                                <label class="badge badge-success">{{ $userRoleNames }}</label>
                            @endforeach
                        @endif
                    </td>
                    <td class="text-right">
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            <a class="btn btn-sm btn-success" href="{{ route('users.show', $user->id) }}">
                                <i class="far fa-eye"></i>
                            </a>

                            <a class="btn btn-sm btn-warning" href="{{ route('users.edit', $user->id) }}">
                                <i class="far fa-edit"></i>
                            </a>

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4 pt-3 border-top">
        <div class="float-right">
            {!! $users->links() !!}
        </div>
    </div>
@endsection
