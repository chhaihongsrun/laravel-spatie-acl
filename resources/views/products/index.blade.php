@extends('layouts.app')

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
                <h2 class="h4 mb-0 text-uppercase font-weight-bolder">Products</h2>
            </div>
        </div>
        <div class="col-6">
            <div class="text-right">
                @can('product-create')
                <a class="btn btn-primary text-uppercase rounded-pill" href="{{ route('products.create') }}">Add New</a>
                @endcan
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th scope="col" class="text-center" width="60">No</th>
                    <th scope="col" width="200">Name</th>
                    <th scope="col">Details</th>
                    <th scope="col" class="text-right" width="200">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <th scope="row" class="text-center">{{ ++$i }}</th>
                    <td>{{ Str::limit($product->name, 22) }}</td>
                    <td>{{ Str::limit($product->detail, 75) }}</td>
                    <td>
                        <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                            <a class="btn btn-sm btn-outline-info rounded-pill text-uppercase font-weight-light" href="{{ route('products.show',$product->id) }}">Show</a>
                            @can('product-edit')
                                <a class="btn btn-sm btn-outline-primary rounded-pill text-uppercase font-weight-light" href="{{ route('products.edit',$product->id) }}">Edit</a>
                            @endcan

                            @csrf
                            @method('DELETE')
                            @can('product-delete')
                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill text-uppercase font-weight-light">Delete</button>
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
