<meta name="csrf-token" content="{{ csrf_token() }}" />
 

<x-admin-layout title="User Management">               
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="User List">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('users.index') }}" value="User List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					{{-- <a href="{{route('users.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						Add New User
					</a> --}}
				</x-slot>
			</x-admin.sub-header>
    </x-slot>

@livewire('admin.user-list',['notificationButton' => $notifications]);


</x-admin-layout>


<script>
	   $.ajaxSetup({  

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

	$('document').ready(function(){
              
		$("#page-list").change(function() {
          
          var PerPage = $(this).val();
		  $.ajax({

           type:'POST',

       url:"{{route('perpage')}}",

       data:{PerPage:PerPage},
      success:function(data){
		$('#kt_table_1 tbody').empty();
		var dataItems = data;

		console.log(dataItems);

		$(dataItems).each(function(index){
			// get the phone number of the user
			var phone =  this.phone;
			if(phone) {
				phone = phone;
			} else {
				phone = '';
			}

			// get the button of the view application
			var applicationStatus = this.application_status;

			if(applicationStatus) {
				var button = '<div class="action__btn"><a class="btn" href="http://localhost/admission-portal-web-1854/admin/application/'+this.id+'"><i class="la la-eye"></i>View Submitted Application.</a></div>';
			} else {
				var button = 'No application Found';
			}

			var row = "<tr><td>"+this.first_name+"</td><td>"+this.last_name+"</td><td>"+this.email+"</td><td>"+phone+"</td><td>"+button+"</td></tr>";
			$('#kt_table_1 tbody').append(row);
		});
	}

      success:function(data){
		
		console.log(data);

	var dataArray = data;
	$(dataArray).each(function(index){
		$('dataU').empty()
		
	});
		

}

});

});


		});	
 
        </script>
  
