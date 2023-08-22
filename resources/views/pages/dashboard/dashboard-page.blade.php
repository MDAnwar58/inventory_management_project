@extends('layout.sideNav-layout')

@section('title', 'Dashboard')

@section('content')
    @include('components.dashboard.summary')
@endsection

@section('script')
    <script>
        let loader = false;

        function dashboardLoder() {
            setTimeout(() => {
                showLoader();
            }, 1000);
            if (loader === false) {
                setTimeout(() => {
                    hideLoader();
                }, 2000);
                return;
            }
        }
        dashboardLoder();
    </script>
@endsection
