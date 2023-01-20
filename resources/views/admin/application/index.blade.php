    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <x-admin-layout title="Application Management">
        <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="">
                <x-admin.breadcrumbs>
                    <x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
                    <x-admin.breadcrumbs-separator />
                    <x-admin.breadcrumbs-item href="{{ route('application.index') }}" value="Applications" />
                </x-admin.breadcrumbs>

                <x-slot name="toolbar">
                    {{-- <a href="{{ route('application.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                    <i class="la la-plus"></i>Add New Application
                    </a> --}}
                </x-slot>
            </x-admin.sub-header>
        </x-slot>
        @livewire('admin.application.index', ['applications' => $app, 'notificationButton' => $notifications, 'register' =>$registerable,'studentTransfer'=>$studentTransfer]);

    </x-admin-layout>
    <script>
        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });
        $('document').ready(function() {

            $(".state_select-box").change(function() {
                var student_type = $(this).find(':selected').attr('student_type');
                if (!student_type) {
                    alert('Something went wrong');
                    return false;
                }
                var app_type_id = $(this).val();
                var email = $(this).prev().val();
                var dob = $(this).prev().prev().val();
                var last_name = $(this).prev().prev().prev().val();
                var first_name = $(this).prev().prev().prev().prev().val();
                var app_id = $(this).prev().prev().prev().prev().prev().val();
                var profile_id = $(this).prev().prev().prev().prev().prev().prev().val();


                $.ajax({

                    type: 'POST',

                    url: "{{ route('statusSubmit') }}",

                    data: {
                        app_type_id: app_type_id,
                        app_id: app_id,
                        first_name: first_name,
                        last_name: last_name,
                        dob: dob,
                        email: email,
                        profile_id: profile_id,
                        student_type: student_type
                    },

                    success: function(data) {

                        window.alert(data);

                    }


                });

            });
        });
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/b-1.5.4/b-html5-1.5.4/datatables.min.css" />
    <script src="{{ asset('/') }}js/jquery.dataTables.min.js" defer></script>

    <script>
        $(function() {

            $('#kt_table_1Arsh').DataTable({
                paging: true,
                lengthChange: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: true,
                responsive: true,
                dom: 'lBfrtip',
                pageLength: 4,
                lengthMenu: [ 4, 10, 20, 50, 100, 200, 500],
            });
        });
    </script>