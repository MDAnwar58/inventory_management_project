@extends('layout.sideNav-layout')

@section('title', 'Product Page')

@section('content')
    <div class="container text-light text-dark">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <div class="d-flex justify-content-between pt-4">
                        <div class="h5 text-muted">Product</div>
                        <div class="">
                            <button class="text-uppercase btn btn-sm create_btn text-light px-4" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-product">Create</button>
                        </div>
                    </div>
                    <hr>
                    @include('components.product.product-list')
                </div>
            </div>
        </div>
    </div>
    @include('components.product.product-create')
    @include('components.product.product-delete')
    @include('components.product.product-update')
@endsection


