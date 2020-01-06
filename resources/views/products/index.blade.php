@extends('layouts.app')

@section('title', 'Products')

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
                <h2 class="h6 mb-0 text-uppercase font-weight-bolder">Products Management</h2>
            </div>
        </div>
        <div class="col-6">
            <div class="text-right">
                @can('product-create')
                <a class="btn btn-primary text-uppercase" href="{{ route('products.create') }}">Add New</a>
                @endcan
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered mt-4">
            <thead>
                <tr>
                    <th scope="col" class="text-center" width="60">No</th>
                    <th scope="col" width="200">Name</th>
                    <th scope="col">Details</th>
                    <th scope="col" class="text-right" width="130">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <th scope="row" class="text-center">{{ ++$i }}</th>
                    <td>{{ Str::limit($product->name, 22) }}</td>
                    <td>{{ Str::limit($product->detail, 75) }}</td>
                    <td class="text-right">
                        <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                            <a class="btn btn-sm btn-success" href="{{ route('products.show', $product->id) }}">
                                <i class="far fa-eye"></i>
                            </a>

                            @can('product-edit')
                                <a class="btn btn-sm btn-warning" href="{{ route('products.edit', $product->id) }}">
                                    <i class="far fa-edit"></i>
                                </a>
                            @endcan

                            @can('product-delete')
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
            {!! $products->links() !!}
        </div>
    </div>
@endsection
