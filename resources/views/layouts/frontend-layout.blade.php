<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title> @yield('title')</title>
    <!-- fabicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend_assets/images/favi.png') }}" />
    <!-- All CSS -->
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/brands.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/regular.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/solid.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/slick.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/slick-theme.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend_assets/js/parsley/parsley.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/style.css') }}" />   
    <script src="{{ asset('frontend_assets/js/jquery-3.5.1.min.js') }}"></script>
    <!-- custom css-->
    @stack('css')
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @livewireStyles

</head>

<body>

    <div class="home-sec">
        <div class="container">
            @include('layouts.header')
            @yield('content')
        </div>
        <div class="pic">
            <img src="{{ asset('frontend_assets/images/hm-bck.png') }}" alt="" />
        </div>
    </div>
    @include('layouts.footer')

    <!-- Jquery-->
    @livewireScripts
    <script src="{{ asset('frontend_assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/common.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/parsley/parsley.min.js') }}"></script>
    <!-- custom js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    @stack('js')
    <script>
        @if (Session::has('success'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('success') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>
</body>

</html>
