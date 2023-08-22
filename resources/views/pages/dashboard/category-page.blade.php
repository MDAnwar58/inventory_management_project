@extends('layout.sideNav-layout')

@section('title', 'Category Page')

@section('content')
    <div class="container text-light text-dark">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <div class="d-flex justify-content-between pt-4">
                        <div class="h5 text-muted">Category</div>
                        <div class="">
                            <button class="text-uppercase btn btn-sm create_btn text-light px-4" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCategory">Create</button>
                        </div>
                    </div>
                    <hr>
                    @include('components.category.category-list')
                </div>
            </div>
        </div>
    </div>
    @include('components.category.category-create')
    @include('components.category.category-delete')
    @include('components.category.category-update')
@endsection


