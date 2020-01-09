@extends('layouts.app')

@section('title', 'Add New Product')

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
                <h2 class="h6 mb-0 text-uppercase font-weight-bolder">Products Management</h2>
            </div>
        </div>
        <div class="col-6">
            <div class="text-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}">Back</a>
            </div>
        </div>
    </div>


    <div class="row justify-content-start mt-4">
        <div class="col col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <strong>Detail:</strong>
                            <textarea class="form-control @error('detail') is-invalid @enderror" rows="5" name="detail" placeholder="Detail"></textarea>
                            @error('detail')
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
