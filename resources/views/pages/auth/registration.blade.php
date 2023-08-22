@extends('layout.app')

@section('title', 'Sign Up')

@section('content')
<div class="row justify-content-center" style="padding: 5rem 0 0 0;">
    <div class="col-lg-10 col-md-6">
        <div class="card animate__animated animate__delay-1s animate__fadeIn">
            <div class="card-body p-4">
                @include('components.auth.registration-form')
            </div>
        </div>
    </div>
</div>
@endsection