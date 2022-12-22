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

    @livewire('admin.application.index', ['applications' =>$app, 'notificationButton' =>$notifications,'register' =>$registerable]);
    
</x-admin-layout>
<script>
	   $.ajaxSetup({  

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
	$('document').ready(function(){

	  $(".state_select-box").change(function() {
     var app_type_id = $(this).val();
     var app_id =$(this).prev().val();
     $.ajax({

           type:'POST',

           url:"{{ route('statusSubmit') }}",

           data:{app_type_id:app_type_id, app_id:app_id},
           
           success:function(data){

              window.alert(data);

           }


        });

  

    });





  });


</script>