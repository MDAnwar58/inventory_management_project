@extends('layout.sideNav-layout')
@section('title', 'Profile')

@section('content')
    <div class="row profile_row">
        <div class="col-md-12">
            <div class="card animate__animated animate__fadeIn">
                <div class="card-body p-4">
                    @include('components.dashboard.profile-form')
                </div>
            </div>
        </div>
    </div>
@endsection
