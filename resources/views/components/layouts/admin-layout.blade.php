<!DOCTYPE html>
<html lang="en">
<!-- begin::Head -->

<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name', 'Laravel') }} | {{ $title }}</title>
    <meta name="description" content="Page with empty content">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
    <!--begin::Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <style>
        .form-control.is-invalid {
            background-image: none !important;
        }

        .is-invalid {
            border-color: #fd397a !important;
        }

        .logo_text_custom {
            text-decoration: none;
            color: #fff;
            font-size: 20px;
        }

        .label-required:after {
            content: "*";
            color: red;
        }

        .align-center {
            text-align: center;
        }

        .odd td {
            text-align: center;
        }
    </style>
    <style>
        .student_wrapper {
            margin-bottom: 15px;
        }

        .form_student_details {
            background: #fff;
            padding: 20px 20px;
            border-radius: 5px;
            border: 1px solid #ececec;
        }

        .main_heading {
            text-align: center;
        }

        .main_heading h2 {
            font-family: "Montserrat";
            font-style: normal;
            font-weight: 600;
            font-size: 25px;
            text-align: center;
            color: #192960;
            line-height: 1.2;
            padding: 0 0 15px;
            border-bottom: 1px solid #192a60;
            display: inline-block;
        }

        .studentWise_details {
            padding: 40px 40px;
            border-bottom: 2px solid #192a61;
        }

        .sub_heading {
            font-family: "Montserrat";
            font-style: normal;
            font-weight: 700;
            font-size: 25px;
            text-align: left;
            color: #2e2e2e;
            line-height: 1.2;
            padding: 0 0 15px;
            border-bottom: 1px solid #e9e9e9;
            position: relative;
        }

        .sub_heading:after {
            position: absolute;
            z-index: 9;
            background: #a71930;
            width: 50px;
            height: 6px;
            content: "";
            bottom: -4px;
            left: 0px;
        }

        .student_box img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            padding: 5px;
            border: 1px solid #e3e3e3;
        }

        .student_box p {
            font-size: 14px;
            color: black;
            margin: 10px 0 12px;
            font-family: "Open Sans";
            font-weight: 500;
        }

        .student_box label {
            font-weight: 600;
            font-size: 17px;
            line-height: 1.3;
            margin-bottom: 8px;
            color: #a71930;
        }

        .student_box_text {
            padding: 5px 13px;
            box-shadow: 0 2px 8px 2px #ededed;
            margin: 5px 0;
        }

        .student_box {
            margin: 15px 0 15px;
        }

        .student_box_label {
            margin: 15px 0 15px;
            padding: 0 0 0 40px;
        }

        .student_box_label label {
            font-weight: 600;
            font-size: 20px;
            line-height: 1.3;
            margin-bottom: 8px;
            color: #a71930;
        }

        .studentProfile {
            box-shadow: none;
        }

        /* .student_box ul {
                                                                    display: block;
                                                                } */
        .student_box ul li {
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 5px 10px;
            margin: 5px 5px 5px 0;
            font-size: 15px;
            color: #5f5f5f;
        }

        span.children_sec {
            color: #000;
            margin: 0 0 0 10px;
        }

        .form_six .studentWise_details {
            padding: 40px 40px;
            border-bottom: 1px solid #e3e3e3;
        }

        .form_six_parent .sub_heading {
            font-size: 20px;
        }

        .form_six .form_six_parent {
            padding: 0px 20px;
            border: 1px solid #ededed;
            margin: 0 40px;
        }

        .form_six .student_box_text {
            padding: 5px 13px;
            box-shadow: 0 2px 8px 2px #ededed;
            margin: 5px 40px 5px 0px;
        }

        .form_six_parent .studentWise_details:last-child {
            border: none;
        }

        .form_seven_parent {
            border: 1px solid #ccc;
        }

        .form_seven_parent .studentWise_details {
            padding: 20px 40px;
            border-bottom: 1px solid #dfdfdf;
        }

        .form_seven_parent .studentWise_details:last-child {
            border: none;
        }

        .form_eight_box .form_eight_box-wrapper {
            border: 1px solid #e5e5e5;
            padding: 10px 40px;
            margin: 15px 0;
        }

        .form_eight_box-wrapper .form_eight_box-wrapper-row {
            padding: 15px 0;
            margin: 15px 0px;
            border-bottom: 1px solid #dfdfdf;
        }

        .form_eight_box-wrapper .form_eight_box-wrapper-row:last-child {
            border: none;
        }

        .form_eignt_activity {
            border-bottom: 1px solid #192960;
            margin: 10px 0;
            padding: 10px 0;
        }

        .form_eignt_activity .sub_heading {
            font-size: 18px;
        }

        .final_step_wrapper {
            padding: 10px 0;
            margin: 10px 0;
            border-bottom: 1px solid #192960;
        }

        .final_step_wrapper:last-child {
            border: none;
        }

        .studentWise_details:last-child {
            border: none;
        }
    </style>
   
    <!--end::Fonts -->

    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="{{ Asset('admin_assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.min.rtl.css') }}"
        rel="stylesheet" type="text/css" />
    <!--end:: Global Mandatory Vendors -->

    <!--begin:: Global Optional Vendors -->
    <link href="{{ asset('admin_assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_assets/vendors/general/select2/dist/css/select2.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="{{ asset('admin_assets/vendors/general/animate.css/animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_assets/vendors/general/toastr/build/toastr.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin_assets/vendors/general/socicon/css/socicon.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_assets/vendors/custom/vendors/line-awesome/css/line-awesome.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin_assets/vendors/custom/vendors/flaticon/flaticon.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin_assets/vendors/custom/vendors/flaticon2/flaticon.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin_assets/vendors/custom/vendors/fontawesome5/css/all.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css" />
    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{ asset('admin_assets/demo/default/base/style.bundle.min.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="{{ asset('admin_assets/demo/default/skins/header/base/light.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin_assets/demo/default/skins/header/menu/light.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin_assets/demo/default/skins/brand/dark.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_assets/demo/default/skins/aside/dark.css') }}" rel="stylesheet" type="text/css" />
   
    
     @livewireStyles
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="{{ asset('admin_assets/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('/') }}css/app.css"> -->

    <link rel="stylesheet" href="{{ asset('admin_assets/css/custom.css') }}">
    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="{{ asset('admin_assets/media/logos/favicon.png') }}" />
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <!--begin::Page Custom Styles(used by this page) -->
    <!-- <link href="{{ asset('admin_assets/app/custom/wizard/wizard-v2.default.css') }}" rel="stylesheet" -->
        type="text/css" />
    @stack('style')
</head>
<!-- end::Head -->

<!-- begin::Body -->

<body
    class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

    <!-- begin:: Page -->
    <x-admin-mobile-header />
    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
            <x-admin-left-bar />
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
                <x-admin-header :title="$title" />
                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
                    {{ $subHeader }}
                    <!-- begin:: Content -->
                    <div class="kt-content  kt-grid__item kt-grid__item--fluid">
                        {{ $slot }}
                    </div>
                    <!-- end:: Content -->
                </div>
                <x-admin-footer />
            </div>
        </div>
    </div>
    <!-- end:: Page -->

    <!-- begin::Scrolltop -->
    <div id="kt_scrolltop" class="kt-scrolltop">
        <i class="fa fa-arrow-up"></i>
    </div>
    <!-- end::Scrolltop -->

    <!--begin::Modal-->
    <div class="modal fade" id="delete_confirm_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    You will not be able to recover this record!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="deleteConfirm()"
                        data-dismiss="modal">Confirm</button>
                </div>
            </div>
        </div>
    </div>
    <!--end::Modal-->

    <!-- begin::Global Config(global config for global JS sciprts) -->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    @livewireScripts

    <script>
        var KTAppOptions = {
            "colors": {
                "state": {
                    "brand": "#5d78ff",
                    "dark": "#282a3c",
                    "light": "#ffffff",
                    "primary": "#5867dd",
                    "success": "#34bfa3",
                    "info": "#36a3f7",
                    "warning": "#ffb822",
                    "danger": "#fd3995"
                },
                "base": {
                    "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                    "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
                }
            }
        };
    </script>
    <!-- end::Global Config -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script>
        FilePond.registerPlugin(FilePondPluginFileValidateType);
        FilePond.registerPlugin(FilePondPluginFileValidateSize);
        FilePond.registerPlugin(FilePondPluginImagePreview);
    </script>

    <!--begin:: Global Mandatory Vendors -->
    <script src="{{ asset('admin_assets/vendors/general/jquery/dist/jquery.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/general/popper.js/dist/umd/popper.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/general/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin_assets/vendors/general/js-cookie/src/js.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/general/moment/min/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin_assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/general/sticky-js/dist/sticky.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/general/wnumb/wNumb.js') }}" type="text/javascript"></script>

    <!--end:: Global Mandatory Vendors -->

    <!--begin:: Global Optional Vendors -->
    <script src="{{ asset('admin_assets/vendors/general/jquery-form/dist/jquery.form.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin_assets/vendors/general/block-ui/jquery.blockUI.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/custom/components/vendors/bootstrap-datepicker/init.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/custom/components/vendors/bootstrap-timepicker/init.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js') }}"
        type="text/javascript"></script>
    <script
        src="{{ asset('admin_assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/custom/components/vendors/bootstrap-switch/init.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/general/select2/dist/js/select2.full.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin_assets/vendors/general/ion-rangeslider/js/ion.rangeSlider.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin_assets/vendors/general/typeahead.js/dist/typeahead.bundle.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin_assets/vendors/general/handlebars/dist/handlebars.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin_assets/vendors/general/inputmask/dist/jquery.inputmask.bundle.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/general/nouislider/distribute/nouislider.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin_assets/vendors/general/owl.carousel/dist/owl.carousel.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin_assets/vendors/general/autosize/dist/autosize.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/general/clipboard/dist/clipboard.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin_assets/vendors/general/dropzone/dist/dropzone.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/general/summernote/dist/summernote.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin_assets/vendors/general/markdown/lib/markdown.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/custom/components/vendors/bootstrap-markdown/init.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/general/bootstrap-notify/bootstrap-notify.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/custom/components/vendors/bootstrap-notify/init.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/general/jquery-validation/dist/jquery.validate.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/general/jquery-validation/dist/additional-methods.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/custom/components/vendors/jquery-validation/init.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/general/toastr/build/toastr.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/general/raphael/raphael.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/general/morris.js/morris.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/general/chart.js/dist/Chart.bundle.js') }}" type="text/javascript">
    </script>
    <script
        src="{{ asset('admin_assets/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/general/waypoints/lib/jquery.waypoints.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin_assets/vendors/general/counterup/jquery.counterup.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin_assets/vendors/general/es6-promise-polyfill/promise.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin_assets/vendors/general/sweetalert2/dist/sweetalert2.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin_assets/vendors/custom/components/vendors/sweetalert2/init.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin_assets/vendors/general/jquery.repeater/src/lib.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_assets/vendors/general/jquery.repeater/src/jquery.input.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin_assets/vendors/general/jquery.repeater/src/repeater.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin_assets/vendors/general/dompurify/dist/purify.js') }}" type="text/javascript"></script>

    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Bundle(used by all pages) -->
    <script src="{{ asset('admin_assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>

    <!--end::Global Theme Bundle -->

    <!--begin::Page Scripts(used by this page) -->
    <!-- <script src="{{ asset('admin_assets/app/custom/wizard/wizard-v2.js') }}" type="text/javascript"></script> -->

    <!--end::Page Scripts -->

    <!--begin::Global App Bundle(used by all pages) -->
    <script src="{{ asset('admin_assets/app/bundle/app.bundle.js') }}" type="text/javascript"></script>

    <!-- Custom Scripts -->
    <script src="{{ asset('admin_assets/js/custom.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript">
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            //   "positionClass": "toast-bottom-center",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "9000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>

    <script type="text/javascript">
        function deleteConfirm() {
            window.livewire.emit('deleteConfirm')
        }
    </script>
    <script type="text/javascript">
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif


        @if (Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
        @endif


        @if (Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}");
        @endif


        @if (Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif

        window.addEventListener('modal-open', event => {
            $('#delete_confirm_modal').modal('show');
        });


        window.addEventListener('toastr', event => {
            alertMsg(event.detail.msg, event.detail.type);
        });

        function alertMsg($msg, $type) {
            switch ($type) {
                case 'success':
                    toastr.success($msg);
                    break;
                case 'info':
                    toastr.info($msg);
                    break;
                case 'warning':
                    toastr.warning($msg);
                    break;
                case 'error':
                    toastr.error($msg);
                    break;
            }
        }
    </script>
    <script>
        const SwalModal = (icon, title, html) => {
            Swal.fire({
                icon,
                title,
                html
            })
        }

        const SwalConfirm = (icon, title, html, confirmButtonText, method, params, callback) => {
            Swal.fire({
                icon,
                title,
                html,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText,
                reverseButtons: true,
            }).then(result => {
                if (result.value) {
                    return livewire.emit(method, params)
                }

                if (callback) {
                    return livewire.emit(callback)
                }
            })
        }

        document.addEventListener('DOMContentLoaded', () => {
            this.livewire.on('swal:modal', data => {
                SwalModal(data.type, data.title, data.text)
            })

            this.livewire.on('swal:confirm', data => {
                SwalConfirm(data.type, data.title, data.text, data.confirmText, data.method, data.params,
                    data.callback)
            })

        })

        window.livewire.on('hidePromoCodeModal', (data) => {

            if (data.status === "error") {
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.error(data.message);
                $('#applyCouponBtn').modal('hide');
                $('#changeCouponBtn').modal('hide');
            } else {
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.success(data.message);
                $('#applyCouponBtn').modal('hide');
                $('#changeCouponBtn').modal('hide');
                setTimeout(window.location.reload.bind(window.location), 3000);
            }

        })

        window.livewire.on('hidePromoModal', () => {
            $('#applyCouponBtn').modal('hide');
            $('#changeCouponBtn').modal('hide');
        })

    </script>
    @stack('scripts')
    <!--end::Global App Bundle -->
</body>
<!-- end::Body -->
</html>
