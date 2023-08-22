<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory POS - @yield('title')</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/progress.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/toastify.min.css') }}">
    <script type="text/javascript" src="{{ asset('js/toastify.js') }}"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>

</head>

<body>
    {{-- preloader start --}}
    <div id="loaderLoadingOverlay" class="LoadingOverlay d-none"></div>
    <div id="linePreloader" class="linePreloader mt-0 d-none"></div>
    {{-- preloader end --}}
    <!-- navbar start -->
    <nav id="navbar" class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <div class="logoAndManuBtn">
                <button class="border-0 bg-transparent" type="button" id="manu_btn">
                    <img src="{{ url('images/icons8-menu-50.png') }}" style="width: 25px; height: 25px;" alt="manu">
                </button>
                <a class="navbar-brand" href="{{ url('/dashboard') }}">
                    <img src="{{ url('images/logo.png') }}" class="ms-3" style="width: 80px; height: 30px;"
                        alt="">
                </a>
            </div>
            <div class="">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="{{ url('images/user.png') }}" style="width: 36px; height: 36px;" alt="">
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end">
                            <li class="text-center py-3 border-bottom">
                                <img src="{{ url('images/user.png') }}" style="width: 36px; height: 36px;"
                                    alt="user"><br>
                                <a class="text-decoration-none text-muted" href="#">User Name</a>
                            </li>
                            <li><a class="dropdown-item py-2 dropdownManus" href="{{ url('userProfile') }}">Profile</a>
                            </li>
                            <li><a class="dropdown-item py-2 dropdownManus" href="{{ url('logout') }}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar end -->

    <div class="main-content">
        <div class="row p-0 m-0 content-row">
            <!-- sidebar start -->
            <div class="col-md-2 sidebar pt-3" id="sidebar">
                @php
                    function activeMenu($uri = '')
                    {
                        $active = '';
                        if (Request::is(Request::segment(1) . '/' . $uri . '/*') || Request::is(Request::segment(1) . '/' . $uri) || Request::is($uri)) {
                            $active = 'active';
                        }
                        return $active;
                    }
                @endphp
                <ul class="sticky-top navbar-nav">
                    <li class="nav-item">
                        <a href="{{ url('/dashboard') }}"
                            class="nav-link ps-3 {{ activeMenu('dashboard') }}">
                            <i class="fa fa-line-chart" aria-hidden="true"></i>
                            <span class="ps-1 text-capitalize">dashborad</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/customerPage') }}" class="nav-link ps-3 {{ activeMenu('customerPage') }}">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span class="ps-1 text-capitalize">customer</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/categoryPage') }}" class="nav-link ps-3 {{ activeMenu('categoryPage') }}">
                            <i class="fa fa-align-center" aria-hidden="true"></i>
                            <span class="ps-1 text-capitalize">category</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/productPage') }}" class="nav-link ps-3 {{ activeMenu('productPage') }}">
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                            <span class="ps-1 text-capitalize">product</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/salePage') }}" class="nav-link ps-3 {{ activeMenu('salePage') }}">
                            <i class="fa fa-usd" aria-hidden="true"></i>
                            <span class="ps-1 text-capitalize">Create Sale</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/invoicePage') }}" class="nav-link ps-3 {{ activeMenu('invoicePage') }}">
                            <i class="fa fa-credit-card" aria-hidden="true"></i>
                            <span class="ps-1 text-capitalize">invoice</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/reportPage') }}" class="nav-link ps-3 {{ activeMenu('reportPage') }}">
                            <i class="fa fa-signal" aria-hidden="true"></i>
                            <span class="ps-1 text-capitalize">report</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- sidebar end -->

            <!-- main content start -->
            <div class="col-md-10 content pt-4 ps-2" id="content_column">
                <div class="container text-light text-dark">
                    @yield('content')
                </div>
            </div>
            <!-- main content end -->
        </div>
    </div>

    <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/config-copy.js') }}"></script>
    @yield('script')
    <script>
        let menuBtn = document.getElementById("manu_btn"),
        sidebar = document.getElementById("sidebar"),
        contentColumn = document.getElementById("content_column");

        let manu = true;
        function manuToggle()
        {
            sidebar.classList.toggle("d-none");
            if(manu === true)
            {
                contentColumn.classList.remove("col-md-10");
                contentColumn.classList.add("col-md-12");
                manu = false;
            }else{
                contentColumn.classList.add("col-md-10");
                contentColumn.classList.remove("col-md-12");
                manu = true;
            }
        }

        menuBtn.addEventListener("click", manuToggle)
    </script>
</body>

</html>
