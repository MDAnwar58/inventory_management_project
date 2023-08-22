@extends('layout.sideNav-layout')

@section('title', 'Sale Page')

@section('content')
    @include('components.sale.sale-list')
@endsection

@include('components.sale.add-product-form')


