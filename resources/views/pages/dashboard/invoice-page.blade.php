@extends('layout.sideNav-layout')

@section('title', 'Product Page')

@section('content')
    <div class="container text-light text-dark">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body px-5">
                    <div class="d-flex justify-content-between pt-4">
                        <div class="h5 text-muted">Invoice</div>
                        <hr>
                        <div class="">
                            <a href="{{ url('/salePage') }}" class="text-uppercase btn btn-sm create_btn text-light px-4">Create Sale</a>
                        </div>
                    </div>
                    <hr>
                    @include('components.invoice.invoice-table')
                </div>
            </div>
        </div>
    </div>
    @include('components.invoice.invoice-delete')
    @include('components.invoice.invoice-view')
@endsection


