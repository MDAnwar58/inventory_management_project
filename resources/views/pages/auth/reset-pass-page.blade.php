@extends('layout.app')

@section('title', 'Reset Password')

@section('content')
    <div class="row justify-content-center" style="padding: 5rem 0 0 0;">
        <div class="col-lg-4 col-md-6">
            <div class="card animate__animated animate__delay-1s animate__fadeIn">
                <div class="card-body p-4">
                    @include('components.auth.reset-pass-form')
                </div>
            </div>
        </div>
    </div>
@endsection
