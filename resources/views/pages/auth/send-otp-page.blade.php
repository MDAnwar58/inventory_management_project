@extends('layout.app')

@section('title', 'Send OTP')

@section('content')
    <div class="row justify-content-center" style="padding: 5rem 0 0 0;">
        <div class="col-lg-4 col-md-6">
            <div class="card animate__animated animate__delay-1s animate__fadeIn">
                <div class="card-body p-4">
                    @include('components.auth.send-otp-form')
                </div>
            </div>
        </div>
    </div>
@endsection
