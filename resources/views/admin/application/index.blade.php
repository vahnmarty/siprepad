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
	

@php
$notification='';
$registeration='';
$studentTransfer='';
@endphp	

<div class="notification_action">
    
    </div>
    <x-admin.table>
    @if($notification == App\Models\Global_Notifiable::NOTIFICATION_ON)
    <a href="{{ url('/admin/user/notify/')}}/{{App\Models\Profile::NOTIFICATION_ON}}/{{$notification}}" style="color: white; background: linear-gradient(180deg, #19a74d 0%, #002664 100%) !important;" class="btn btn-on mb-3">Notification On</a>
    @else
    <a href="{{ url('/admin/user/notify/')}}/{{App\Models\Profile::NOTIFICATION_OFF}}/{{$notification}}" style="color:white" class="btn btn-off mb-3">Notification Off</a>
    @endif
    @if($registeration == App\Models\GlobalRegisterable::REGISTRATION_ON)
    <a href="{{ url('admin/user/registerable')}}/{{App\Models\Profile::REGISTERTATION_OFF}}/{{$registeration}}" style="color: white; background: linear-gradient(180deg, #19a74d 0%, #002664 100%) !important;" class="btn btn-on mb-3">Registration On</a>
    @else
    <a href="{{  url('admin/user/registerable')}}/{{App\Models\Profile::REGISTERTATION_ON}}/{{$registeration}}" style="color:white" class="btn btn-off mb-3">Registration Off</a>
    @endif

    @if($studentTransfer == App\Models\GlobalStudentTransfer::STUDENTTRANSFER_ON )
    <a href="{{ url('admin/user/studentTransfer')}}/{{App\Models\Profile::STUDENTTRANSFER_OFF}}/{{$studentTransfer}}" style="color: white; background: linear-gradient(180deg, #19a74d 0%, #002664 100%) !important;" class="btn btn-on mb-3">Student Transfer On</a>
    @else
    <a href="{{  url('admin/user/studentTransfer')}}/{{App\Models\Profile::STUDENTTRANSFER_ON}}/{{$studentTransfer}}" style="color:white" class="btn btn-off mb-3">Student Transfer Off</a>
    @endif
        <x-slot name="search">
            <x-slot name="thead">
                <tr role="row">
                    <th class="text-center" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 15%;" aria-sort="ascending" aria-label="Agent: activate to sort column descending">Student First Name
                    </th>

                    <th class="text-center" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 15%;" aria-label="Company Email: activate to sort column ascending">Student Last Name</th>


                    <th class="text-center" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 20%;" aria-label="Company Agent: activate to sort column ascending">Student Email
                    </th>

                    <th class="text-center" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 20%;" aria-label="Company Agent: activate to sort column ascending">Student Phone
                    </th>
                    <th class="text-center" tabindex="0" aria-controls="kt_table_1" style="width: 10%;" aria-label="Company Agent: activate to sort column ascending">Status
                    </th>
                    <th class="text-center" tabindex="0" aria-controls="kt_table_1" style="width: 10%;" aria-label="Company Agent: activate to sort column ascending">Decision
                    </th>

                    <th class="text-center" class="align-center" rowspan="1" colspan="1" style="width: 30%;" aria-label="Actions">Actions</th>
                </tr>
                <tr>
                    <th class="text-center">
                        <input type="text" id="searchFirstName">

                    </th>
                    <th class="text-center">
                        <input type="text" id="searchLastName">

                    </th>
                    <th class="text-center">
                        <input type="text" id="searchEmail">


                    </th>
                    <th class="text-center">
                        <input type="text" id="searchPhone">

                    </th>
                    <th>

                    </th>
                    <th>

                    </th>
                    <th>
                        <div class="row text-center">
                            <div class="col-md-6"><a class="btn btn-primery text-light" id="serachData">Search</a></div>
                            <div class="col-md-6"><a class="btn btn-primery text-light" id="resetData">Reset</a></div>
                        </div>


                    </th>
                </tr>

            </x-slot>


            @php
            $lastId = null;
            $rowClass = 'grey';
            @endphp
            <x-slot name="tbody">
               
            </x-slot>

    </x-admin.table>


			
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



    

	
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}css/datatables.min.css" />
<script src="{{ asset('/') }}js/jquery.dataTables.min.js" defer></script>

<script>
    $(function() {

        var datatable = $('#kt_table_1Arsh').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{url('/admin/getApplication')}}',
                serverSide: true,
                processing: true,
                   columns: [
                { data: 'First_Name' },
                { data: 'Last_Name' },
                { data: 'Personal_Email' },
                 { data: 'Mobile_Phone' }, 
                 { data: 'status' },
                  { data: 'student_type' },
             
                  {
                data: 'student_type,
                mRender: function (data, type, row) {
                    return "<a href='Admin/Categories/Edit/" + data + "'>EDIT</a>";
                }
                
                ]
            
           
        });
        
        $('#serachData').click(function() {
            datatable.column(0).search($("#searchFirstName").val().trim()).draw();
            datatable.column(2).search($("#searchEmail").val().trim()).draw();
            datatable.column(1).search($("#searchLastName").val().trim()).draw();
            datatable.column(3).search($("#searchPhone").val().trim()).draw();
        });
        $('#resetData').click(function() {
//             console.log("i")
            $("#searchFirstName").val('');
            $("#searchEmail").val('')
            $("#searchLastName").val('')
            $("#searchPhone").val('')
            datatable.search('').columns().search('').draw();
            
        });
    });
</script>






