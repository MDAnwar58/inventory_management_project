<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory POS - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/progress.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .btn {
            background: #c7099f;
            border: none;
            font-size: 14px;
            font-weight: 500;
        }

        .btn:hover {
            background: #a1099f;
            color: black;
        }
    </style>
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>
</head>

<body>

    <div id="loaderLoadingOverlay" class="LoadingOverlay d-none"></div>
    <div id="linePreloader" class="linePreloader mt-0 d-none"></div>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/config.js') }}"></script>
    <script>
        let loader = false;

        function loaderAuthPages() {
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
        loaderAuthPages();
    </script>
</body>

</html>
