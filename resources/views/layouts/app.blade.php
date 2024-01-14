<!DOCTYPE html>
<html dir="ltr" lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="author" content="Hypeople">
    <meta name="description" content="Responsive, Highly Customizable Dashboard Template" />

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('') }}app-assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('') }}app-assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('') }}app-assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="{{ asset('') }}app-assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="{{ asset('') }}app-assets/favicon/safari-pinned-tab.svg" color="#0010f7">
    <meta name="msapplication-TileColor" content="#0010f7">
    <meta name="theme-color" content="#ffffff">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />

    <!-- Plugin -->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}app-assets/css/plugin/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}app-assets/icons/iconly/index.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}app-assets/icons/remix-icon/index.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}app-assets/css/colors.css">

    <!-- Base -->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}app-assets/css/base/typography.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}app-assets/css/base/base.css">

    <!-- Theme -->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}app-assets/css/theme/colors-dark.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}app-assets/css/theme/theme-dark.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}app-assets/css/custom-rtl.css">

    <!-- Layouts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}app-assets/css/layouts/sider.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}app-assets/css/layouts/header.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}app-assets/css/layouts/page-content.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}app-assets/css/components.css">

    <!-- Charts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}app-assets/css/plugin/apex-charts.css">

    <!-- Pages -->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}app-assets/css/pages/dashboard-analytics.css">

    <!-- Custom -->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/css/style.css">

    <title>E-Rent : Sistem Peminjaman Online Terpusat - @yield('title', 'Admin')</title>

    {{-- added csses --}}
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.0.0/css/all.css" />
    <script src="https://site-assets.fontawesome.com/releases/v6.0.0/js/all.js" data-auto-add-css="false"
        data-auto-replace-svg="false"></script>
    @stack('post-style')

</head>

<body>
    @yield('modal')

    <main class="hp-bg-color-dark-90 d-flex min-vh-100">
        @include('layouts.sidebar')


        <div class="hp-main-layout">
            @include('layouts.header')

            @include('layouts.mobile-sidebar')

            <div class="hp-main-layout-content">
                @yield('content')
            </div>

            @include('layouts.footer')
        </div>
    </main>

    {{-- scroll to top button --}}
    <div class="scroll-to-top">
        <button type="button" class="btn btn-primary btn-icon-only rounded-circle hp-primary-shadow">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="16px"
                width="16px" xmlns="http://www.w3.org/2000/svg">
                <g>
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path d="M13 7.828V20h-2V7.828l-5.364 5.364-1.414-1.414L12 4l7.778 7.778-1.414 1.414L13 7.828z">
                    </path>
                </g>
            </svg>
        </button>
    </div>

    <form id="form-delete" action="" method="POST">
        @csrf
        @method('DELETE')
    </form>

    <!-- Plugin -->
    <script src="{{ asset('') }}app-assets/js/plugin/jquery.min.js"></script>
    <script src="{{ asset('') }}app-assets/js/plugin/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('') }}app-assets/js/plugin/swiper-bundle.min.js"></script>
    <script src="{{ asset('') }}app-assets/js/plugin/jquery.mask.min.js"></script>
    <script src="{{ asset('') }}app-assets/js/plugin/autocomplete.min.js"></script>
    <script src="{{ asset('') }}app-assets/js/plugin/moment.min.js"></script>

    <!-- Layouts -->
    <script src="{{ asset('') }}app-assets/js/layouts/header-search.js"></script>
    <script src="{{ asset('') }}app-assets/js/layouts/sider.js"></script>
    <script src="{{ asset('') }}app-assets/js/components/input-number.js"></script>

    <!-- Base -->
    <script src="{{ asset('') }}app-assets/js/base/index.js"></script>

    <!-- Charts -->
    <script src="{{ asset('') }}app-assets/js/plugin/apexcharts.min.js"></script>
    <script src="{{ asset('') }}app-assets/js/charts/apex-chart.js"></script>

    <!-- Cards -->
    <script src="{{ asset('') }}app-assets/js/cards/card-analytic.js"></script>
    <script src="{{ asset('') }}app-assets/js/cards/card-advance.js"></script>
    <script src="{{ asset('') }}app-assets/js/cards/card-statistic.js"></script>

    <!-- Custom -->
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.bootstrap5.min.css" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
        integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('') }}assets/js/main.js"></script>

    @stack('post-script')
</body>

</html>
