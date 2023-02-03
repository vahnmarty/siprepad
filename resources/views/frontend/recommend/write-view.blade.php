<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>{{ __('page_title.written_a_recommendation_page_title') }}</title>

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
    <div class="body-wrap">
        <section class="acnt-sec">
            <div class="container">
                <div class="acnt-wrap">
                    <a href="/" class="logo">
                        <img src="{{ asset('frontend_assets/images/lg2.png') }}" alt="" />
                    </a>
                    <div class="form-outr">
                        <div class="cmn-hdr">
                            <h4>Write a Recommendation</h4>
                            <p style="font-weight: 600;">
                                NOTE: St. Ignatius College Preparatory must receive all supplemental recommendations by
                                the end of the day on Thursday, December 15, 2022.
                            </p>
                        </div>
                        <div class="frm-uppr">
                            <ul>
                                <li>
                                    <a href="#">
                                        <span>
                                            <img src="{{ asset('frontend_assets/images/u1.svg') }}" alt="">
                                        </span> {{ ucwords($getRecommendation->Rec_Name) }}
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:{{ $getRecommendation->Rec_Email }}">
                                        <span>
                                            <img src="{{ asset('frontend_assets/images/u2.svg') }}" alt="">
                                        </span>{{ $getRecommendation->Rec_Email }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="form-wrap m-form-wrap">
                            <form action="{{ route('written-recommendation-submit') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $getRecommendation->id }}" name="id"
                                    id="">
                                <div class="form-group">
                                    <label> Relationship to Student:</label>
                                    <input type="text" name="relationStudent" class="form-control"
                                        value="{{ $getRecommendation->Rec_Relationship_to_Student }}" readonly />
                                    @error('relationStudent')
                                        <span class="error error_text">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Years Known Student:</label>
                                    <input type="number" name="yearStudent" class="form-control"
                                        value="{{ $getRecommendation->Rec_Years_Known_Student }}" readonly />
                                    @error('yearStudent')
                                        <span class="error error_text">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-5">
                                    <label>Recommendation:</label>
                                    <div data-maxcount="150">
                                        <textarea name="recommen" class="word_count" id="write_recommendation_textarea" readonly>{{ $getRecommendation->Rec_Recommendation }}</textarea>
                                        <p class="wrds">
                                            (Max <span class="word_left" id="write_recommendation_counter">150 </span>
                                            words)
                                        </p>
                                        @error('recommen')
                                            <span class="error error_text">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="form-btn text-center">
                                    <input type="submit" value="Submit" class="sub-btn" disabled />
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pic">
                <img src="{{ asset('frontend_assets/images/hm-bck.png') }}" alt="" />
            </div>
        </section>
        <footer class="ftr-sec">
            <div class="container">
                <div class="ftr-outr text-center">
                    <a href="#" class="ftr-logo"><img src="{{ asset('frontend_assets/images/ftr-logo.png') }}"
                            alt="" />
                    </a>
                    <p class="copyright">
                        © 2022 <a href="https://www.siprep.org">St. Ignatius College Preparatory</a>.&nbsp;&nbsp;All rights Reserved.
                    </p>
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
        $(document).ready(function() {
            console.log("ready!");
            let countwords = $.trim($('#write_recommendation_textarea').val()).split(' ')
                .filter(
                    function(v) {
                        return v !== ''
                    }
                ).length;
            document.getElementById("write_recommendation_counter").innerHTML = 150 -
                countwords;
        });

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
