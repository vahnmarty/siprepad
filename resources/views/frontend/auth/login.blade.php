<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>{{ __('page_title.login_page_title') }}</title>

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
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/style.css') }}" />
    <!-- custom css-->
    @stack('css')
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @livewireStyles

</head>

<body>
    <div class="body-wrap" style="background-image: url({{ asset('frontend_assets/images/body-back.png') }})">
        <section class="acnt-sec">
            <div class="container">
                <div class="acnt-wrap">
                    <a href="{{url('/')}}" class="logo">
                        <img src="{{ asset('frontend_assets/images/lg2.png') }}" alt="" />
                    </a>
                    <div class="form-outr">
                        <div class="cmn-hdr">
                            <h1>Login</h1>
                            <p>Welcome to the St. Ignatius College Preparatory Admissions Portal.&nbsp;&nbsp;Log in or create an account to apply to SI.</p>
                        </div>
                        <div class="form-wrap m-form-wrap">
                            <form method="POST" action="{{ route('login.post') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Username/Email" name="email" autocomplete="username"
                                        value="{{ old('email') }}" />
                                    @error('email')
                                        <span class="error error_text">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-5">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Password" name="password" autocomplete="new-password" />
                                    @error('password')
                                        <span class="error error_text">{{ $message }}</span>
                                    @enderror
                                </div>
                                <ul class="frgot">
                                    <li><a href="{{ route('forgot-username') }}">Forgot username? </a></li>
                                    <li><a href="{{ route('forgot-password') }}">Forgot password? </a></li>
                                </ul>
                                <div class="form-btn text-center">
                                    <input type="submit" value="Log in" class="sub-btn" />
                                </div>
                                <p class="log">Don’t have an account?&nbsp;&nbsp;<a href="{{ route('register.get') }}">Create account</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="ftr-sec">
            <div class="container">
                <div class="ftr-outr text-center">
                    <a href="#" class="ftr-logo"><img src="{{ asset('frontend_assets/images/ftr-logo.png') }}" alt="" /></a>
                    <p class="copyright">©  <?php  echo date('Y').' ' ?> <a href="https://www.siprep.org">St. Ignatius College Preparatory</a>.&nbsp;&nbsp;All rights reserved.</p>
                </div>
            </div>
            <div class="ball">
                <img src="{{ asset('frontend_assets/images/ball.png') }}" alt="">
            </div>
        </footer>
    </div>
    <!-- Jquery-->
    @livewireScripts
    <script src="{{ asset('frontend_assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/common.js') }}"></script>
    <!-- custom js-->
    @stack('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
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
