<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>{{ __('page_title.register_page_title') }}</title>

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
                        <img src="{{ asset('frontend_assets/images/lg2.png') }}" alt="" /></a>
                    <div class="form-outr">
                        <div class="cmn-hdr">
                            <h1>Create Account</h1>
                            {{-- <p>
                                Enter your information below and click “Register.” You will
                                receive an email to confirm your information. If you do not
                                receive a confirmation email, contact the
                                <a href="mailto:admissions@siprep.org">SI Admissions Office</a> for assistance.
                            </p> --}}
                            {{-- <p style="font-weight: 600;">
                                NOTE: You can only use 1 username/email for one family
                                account. In other words, you do not need to create separate
                                accounts for each child that is applying to SI.
                            </p> --}}
                            <p class = "str">
                                NOTE:&nbsp;&nbsp;Please use one username/email for one family account.&nbsp;&nbsp;For example, if you have
                                twins, triplets or a blended family with step-siblings, you may create one family
                                account and submit all applications within that one family account.
                            </p>
                            <div class="cmn-hdr">
                                <p class="str">
                                    Your password must have:
                                </p>
                                <ul>
                                    <li>At least 1 uppercase letter </li>
                                    <li>At least 1 lowercase letter </li>
                                    <li>At least 1 number </li>
                                    <li>At least 1 special character (only use the following characters: ! @ # $ or %) </li>
                                    <li>Must be between 8 – 16 characters long </li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-wrap m-form-wrap">
                            <form method="POST" action="{{ route('register.post') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Parent/Guardian First Name" name="first_name"
                                        value="{{ old('first_name') }}" />
                                    @error('first_name')
                                        <span class="error error_text">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                        placeholder="Parent/Guardian Last Name" name="last_name"
                                        value="{{ old('last_name') }}" />
                                    @error('last_name')
                                        <span class="error error_text">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Parent/Guardian Email" name="email"
                                        value="{{ old('email') }}" />
                                    @error('email')
                                        <span class="error error_text">{!! $message !!}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Password" name="password" />
                                    @error('password')
                                        <span class="error error_text">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-5">
                                    <input type="password"
                                        class="form-control @error('confirm_password') is-invalid @enderror"
                                        placeholder="Confirm Password" name="confirm_password" />
                                    @error('confirm_password')
                                        <span class="error error_text">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-btn text-center">
                                    <input type="submit" value="Register" class="sub-btn" />
                                </div>
                                <p class="log">Have an account?&nbsp;&nbsp;<a href="{{ route('login.get') }}">Log in</a></p>
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
                    <p class="copyright">©  <?php echo date('Y').' ' ?><a href="https://www.siprep.org">St. Ignatius College Preparatory</a>.&nbsp;&nbsp;All rights Reserved.</p>


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
