@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <div class="row no-gutters align-items-end pb-3 border-bottom">
        <div class="col-6">
            <div class="text-left">
                <h2 class="h6 mb-0 text-uppercase font-weight-bolder">Product:&nbsp; <span class="text-capitalize">{{ $product->name }}</span></h2>
            </div>
        </div>
        <div class="col-6">
            <div class="text-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}">Back</a>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <div class="row justify-content-start">
                <div class="col">
                    <dl class="mb-0">
                        <div class="d-block d-md-flex">
                            <dt>Name:&nbsp;</dt>
                            <dd>{{ $product->name }}</dd>
                        </div>
                        <div class="d-block d-md-flex mb-2">
                            <dt>Details:&nbsp;</dt>
                            <dd>{{ $product->detail }}</dd>
                        </div>
                        <div class="d-block d-md-flex">
                            <dt>Created At:&nbsp;</dt>
                            <dd>{{ $product->created_at }}</dd>
                        </div>
                        <div class="d-block d-md-flex">
                            <dt>Updarted At:&nbsp;</dt>
                            <dd>{{ $product->updated_at }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection
