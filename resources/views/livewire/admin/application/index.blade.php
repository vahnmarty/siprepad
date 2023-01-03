
<div class="notification_action"> 
 @if($notification == '1') 
  <a href="{{ url('/admin/user/notify/')}}/{{App\Models\Profile::NOTIFICATION_ON}}/{{$notification}}"style="color: white; background: linear-gradient(180deg, #19a74d 0%, #002664 100%) !important;"class="btn btn-on mb-3">Notification On</a> 
 @else 
 <a href="{{ url('/admin/user/notify/')}}/{{App\Models\Profile::NOTIFICATION_OFF}}/{{$notification}}" style="color:white" class="btn btn-off mb-3">Notification Off</a> 
 @endif 
 @if($registeration == '1') 
  <a href="{{ url('admin/user/registerable')}}/{{App\Models\Profile::Registeration_OFF}}/{{$registeration}}"style="color: white; background: linear-gradient(180deg, #19a74d 0%, #002664 100%) !important;"class="btn btn-on mb-3">Registeration On</a> 
 @else 
 <a href="{{  url('admin/user/registerable')}}/{{App\Models\Profile::Registeration_ON}}/{{$registeration}}" style="color:white" class="btn btn-off mb-3">Registeration Off</a> 
 @endif 
<x-admin.table>
    <x-slot name="search">
    </x-slot>
    
    <x-slot name="perPage">
        <label>Show
            <x-admin.dropdown wire:model="perPage" class="custom-select custom-select-sm form-control form-control-sm">
                @foreach ($perPageList as $page)
                    <x-admin.dropdown-item :value="$page['value']" :text="$page['text']" />
                @endforeach
            </x-admin.dropdown> entries
        </label>
    </x-slot>
    <x-slot name="thead">
        <tr role="row">
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 15%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Student First Name<i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;"
                    wire:click="sortByName('first_name')"></i>
            </th>

            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 15%;"
                aria-label="Company Email: activate to sort column ascending">Student Last Name<i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;"
                    wire:click="sortByName('last_name')"></i></th>


            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 20%;"
                aria-label="Company Agent: activate to sort column ascending">Student Email
            </th>

            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 20%;"
                aria-label="Company Agent: activate to sort column ascending">Student Phone
            </th>
              <th tabindex="0" aria-controls="kt_table_1" style="width: 10%;"
                aria-label="Company Agent: activate to sort column ascending">Status
            </th>
            <th tabindex="0" aria-controls="kt_table_1" style="width: 10%;"
                aria-label="Company Agent: activate to sort column ascending">Decision
            </th>

            <th class="align-center" rowspan="1" colspan="1" style="width: 30%;" aria-label="Actions">Actions</th>
        </tr>

        <tr class="filter">
            <th>
                <x-admin.input type="search" wire:model.defer="searchFirstName" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>
                <x-admin.input type="search" wire:model.defer="searchLastName" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>
                <x-admin.input type="search" wire:model.defer="searchEmail" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>
                <x-admin.input type="search" wire:model.defer="searchPhone " placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th></th>
            <th></th>
            <th>
              
                <div class="row">
                    <div class="col-5">
                           <button class="btn btn-brand kt-btn btn-sm kt-btn--icon" wire:click="search">
                          Search
                        </button>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-secondary kt-btn btn-sm kt-btn--icon" wire:click="resetSearch">Reset</button>
                    </div>
                </div>
            </th>
        </tr>
    </x-slot>

             
    @php
        $lastId = null;
        $rowClass = 'grey';
    @endphp
    <x-slot name="tbody">
        @forelse($students as $student)
            @php
                //if userid changed from last iteration, store new userid and change color
                if ($lastId !== $student['Application_ID']) {
                    $lastId = $student['Application_ID'];
                    if ($rowClass == 'grey') {
                        $rowClass = 'white';
                    } else {
                        $rowClass = 'grey';
                    }
                }
            @endphp
   @php
                    $getApplication = App\Models\Application::where('Application_ID', $student['Application_ID'])
                    ->get()->first();
                    
                    $getStudent = App\Models\StudentInformation::where('Application_ID', $getApplication->Application_ID)
                    ->where('Profile_ID', $getApplication->Profile_ID)->first();
                    
                    $getApplicationStatus = App\Models\StudentApplicationStatus::where('application_id', $getApplication->Application_ID)
                    ->where('profile_id', $getApplication->Profile_ID)->first();
                    
                   
                @endphp
                
                
                
            <tr role="row" class="odd {{ $rowClass }}">
                <td>{{ ucfirst($student['First_Name']) ?? '---' }}</td>
                <td>{{ ucfirst($student['Last_Name']) ?? '---' }}</td>
                <td>{{ $student['Personal_Email'] ?? '---' }}</td>
                <td>{{ $student['Mobile_Phone'] ?? '---' }}</td>
                <td>
                    <input type='hidden' class='profile_id' name='profile_id' value="{{ $getApplication->Profile_ID}}">
              		<input type='hidden' class='app_id'  name='app_id' value='{{ $getApplication->Application_ID }}'>
					<input type='hidden' class='first_name'  name='first_name' value="{{ $student['First_Name'] }}">
					<input type='hidden' class='last_name' name='first_name' value="{{ $student['Last_Name'] }}">
					<input type='hidden' class='dob' name='dob' value="{{ $student['Birthday'] }}">
					<input type='hidden' class='email' name='email' value="{{ $student['Personal_Email'] }}">
					   
					@if($getApplicationStatus)
						@if($getStudent->S1_Personal_Email == $student['Personal_Email'] &&  $getStudent->S1_First_Name == $student['First_Name']
						&& $getStudent->S1_Last_Name == $student['Last_Name'] && $getStudent->S1_Birthdate == $student['Birthday'])
							<?php $studentProfile = 'student_one'; ?>
						@elseif($getStudent->S2_Personal_Email == $student['Personal_Email'] &&  $getStudent->S2_First_Name == $student['First_Name']
						&& $getStudent->S2_Last_Name == $student['Last_Name'] && $getStudent->S2_Birthdate == $student['Birthday'])
							<?php $studentProfile = 'student_two'; ?>
						@elseif($getStudent->S3_Personal_Email == $student['Personal_Email'] &&  $getStudent->S3_First_Name == $student['First_Name']
						&& $getStudent->S3_Last_Name == $student['Last_Name'] && $getStudent->S3_Birthdate == $student['Birthday'])
							<?php $studentProfile = 'student_three'; ?>
						@endif
						@if($studentProfile == 'student_one')
							@switch($getApplicationStatus->s1_application_status)
                                @case(1)
                                <select name='candidate-status' required class='state_select-box'>
                                    <option value='' disabled>Select</option>
                                    <option value='{{App\Models\Application::TYPE_ACCEPTED}}' selected>Accepted</option>
                                    <option value='{{App\Models\Application::TYPE_WAIT_LISTED}}'>Wait Listed</option>
                                    <option value='{{App\Models\Application::TYPE_NOT_ACCEPTED}}'>Not Accepted</option>
                                </select>
                                @break
                                @case(2)
                                <select name='candidate-status' required class='state_select-box'>
                                    <option value=''disabled>Select</option>
                                    <option value='{{App\Models\Application::TYPE_ACCEPTED}}'>Accepted</option>
                                    <option value='{{App\Models\Application::TYPE_WAIT_LISTED}}' selected>Wait Listed</option>
                                    <option value='{{App\Models\Application::TYPE_NOT_ACCEPTED}}'>Not Accepted</option>
                                </select>
                                @break
                                @case(3)
                                <select name='candidate-status' required class='state_select-box'>
                                    <option value=''disabled>Select</option>
                                    <option value='{{App\Models\Application::TYPE_ACCEPTED}}'>Accepted</option>
                                    <option value='{{App\Models\Application::TYPE_WAIT_LISTED}}'>Wait Listed</option>
                                    <option value='{{App\Models\Application::TYPE_NOT_ACCEPTED}}' selected>Not Accepted</option>
            					@break 
            					@default
        						<select name='candidate-status' required class='state_select-box'>
                                    <option value='' selected disabled>Select</option>
                                    <option value='{{App\Models\Application::TYPE_ACCEPTED}}'>Accepted</option>
                                    <option value='{{App\Models\Application::TYPE_WAIT_LISTED}}'>Wait Listed</option>
                                    <option value='{{App\Models\Application::TYPE_NOT_ACCEPTED}}'>Not Accepted</option>
                                </select>
                            @endswitch
						@endif 
						@if($studentProfile == 'student_two')
							@switch($getApplicationStatus->s2_application_status)
                                @case(1)
                                <select name='candidate-status' required class='state_select-box'>
                                    <option value='' disabled>Select</option>
                                    <option value='{{App\Models\Application::TYPE_ACCEPTED}}' selected>Accepted</option>
                                    <option value='{{App\Models\Application::TYPE_WAIT_LISTED}}'>Wait Listed</option>
                                    <option value='{{App\Models\Application::TYPE_NOT_ACCEPTED}}'>Not Accepted</option>
                                </select>
                                @break
                                @case(2)
                                <select name='candidate-status' required class='state_select-box'>
                                    <option value=''disabled>Select</option>
                                    <option value='{{App\Models\Application::TYPE_ACCEPTED}}'>Accepted</option>
                                    <option value='{{App\Models\Application::TYPE_WAIT_LISTED}}' selected>Wait Listed</option>
                                    <option value='{{App\Models\Application::TYPE_NOT_ACCEPTED}}'>Not Accepted</option>
                                </select>
                                @break
                                @case(3)
                                <select name='candidate-status' required class='state_select-box'>
                                    <option value=''disabled>Select</option>
                                    <option value='{{App\Models\Application::TYPE_ACCEPTED}}'>Accepted</option>
                                    <option value='{{App\Models\Application::TYPE_WAIT_LISTED}}'>Wait Listed</option>
                                    <option value='{{App\Models\Application::TYPE_NOT_ACCEPTED}}' selected>Not Accepted</option>
            					@break 
            					@default
        						<select name='candidate-status' required class='state_select-box'>
                                    <option value='' selected disabled>Select</option>
                                    <option value='{{App\Models\Application::TYPE_ACCEPTED}}'>Accepted</option>
                                    <option value='{{App\Models\Application::TYPE_WAIT_LISTED}}'>Wait Listed</option>
                                    <option value='{{App\Models\Application::TYPE_NOT_ACCEPTED}}'>Not Accepted</option>
                                </select>
                            @endswitch
						@endif 
						@if($studentProfile == 'student_three')
							@switch($getApplicationStatus->s3_application_status)
                                @case(1)
                                <select name='candidate-status' required class='state_select-box'>
                                    <option value='' disabled>Select</option>
                                    <option value='{{App\Models\Application::TYPE_ACCEPTED}}' selected>Accepted</option>
                                    <option value='{{App\Models\Application::TYPE_WAIT_LISTED}}'>Wait Listed</option>
                                    <option value='{{App\Models\Application::TYPE_NOT_ACCEPTED}}'>Not Accepted</option>
                                </select>
                                @break
                                @case(2)
                                <select name='candidate-status' required class='state_select-box'>
                                    <option value=''disabled>Select</option>
                                    <option value='{{App\Models\Application::TYPE_ACCEPTED}}'>Accepted</option>
                                    <option value='{{App\Models\Application::TYPE_WAIT_LISTED}}' selected>Wait Listed</option>
                                    <option value='{{App\Models\Application::TYPE_NOT_ACCEPTED}}'>Not Accepted</option>
                                </select>
                                @break
                                @case(3)
                                <select name='candidate-status' required class='state_select-box'>
                                    <option value=''disabled>Select</option>
                                    <option value='{{App\Models\Application::TYPE_ACCEPTED}}'>Accepted</option>
                                    <option value='{{App\Models\Application::TYPE_WAIT_LISTED}}'>Wait Listed</option>
                                    <option value='{{App\Models\Application::TYPE_NOT_ACCEPTED}}' selected>Not Accepted</option>
            					@break 
            					@default
        						<select name='candidate-status' required class='state_select-box'>
                                    <option value='' selected disabled>Select</option>
                                    <option value='{{App\Models\Application::TYPE_ACCEPTED}}'>Accepted</option>
                                    <option value='{{App\Models\Application::TYPE_WAIT_LISTED}}'>Wait Listed</option>
                                    <option value='{{App\Models\Application::TYPE_NOT_ACCEPTED}}'>Not Accepted</option>
                                </select>
                            @endswitch
						@endif 
					@else
					<select name='candidate-status' required class='state_select-box'>
                        <option value='' selected >Select</option>
                        <option value='{{App\Models\Application::TYPE_ACCEPTED}}'>Accepted</option>
                        <option value='{{App\Models\Application::TYPE_WAIT_LISTED}}'>Wait Listed</option>
                        <option value='{{App\Models\Application::TYPE_NOT_ACCEPTED}}'>Not Accepted</option>
                    </select>
				@endif
                 </td>
                 <td>
                @if($getApplicationStatus)
						@if($getStudent->S1_Personal_Email == $student['Personal_Email'] &&  $getStudent->S1_First_Name == $student['First_Name']
						&& $getStudent->S1_Last_Name == $student['Last_Name'] && $getStudent->S1_Birthdate == $student['Birthday'])
							<?php $studentProfile = 'student_one'; ?>
						@elseif($getStudent->S2_Personal_Email == $student['Personal_Email'] &&  $getStudent->S2_First_Name == $student['First_Name']
						&& $getStudent->S2_Last_Name == $student['Last_Name'] && $getStudent->S2_Birthdate == $student['Birthday'])
							<?php $studentProfile = 'student_two'; ?>
						@elseif($getStudent->S3_Personal_Email == $student['Personal_Email'] &&  $getStudent->S3_First_Name == $student['First_Name']
						&& $getStudent->S3_Last_Name == $student['Last_Name'] && $getStudent->S3_Birthdate == $student['Birthday'])
							<?php $studentProfile = 'student_three'; ?>
						@endif
						
                @if($studentProfile == 'student_one')
				@switch($getApplicationStatus->s1_candidate_status)
				@case(0)
                        {{"No Response"}}
                        @break
                          @case(1)
                          {{"Accepted"}}
                           @break
                        @case(2)
                        {{"Rejected"}}
                         @break
                        @case(3)
                        {{"Notification Read"}}
                          @endswitch
                           @endif
                           
				@if($studentProfile == 'student_two')
							@switch($getApplicationStatus->s2_candidate_status)
							@case(0)
                        {{"No Response"}}
                        @break
                          @case(1)

                          {{"Accepted"}}
                           @break
                        @case(2)
                        {{"Rejected"}}
                         @break
                        @case(3)
                        {{"Notification Read"}}
                        @break
                        @default
                        {{"Notification not Read"}}

                          @endswitch
                           @endif
      
          	              
				@if($studentProfile == 'student_three')
							@switch($getApplicationStatus->s3_candidate_status)
							@case(0)
                        {{"No Response"}}
                        @break
                          @case(1)

                          {{"Accepted"}}
                           @break
                        @case(2)
                        {{"Rejected"}}
                         @break
                        @case(3)
                        {{"Notification Read"}}
                        @break
                        @default
                        {{"Notification not Read"}}

                          @endswitch
                           @endif
			       	      @endif
                 </td>
              
                <td>
                    <div class="action__btn">
                        <a class="btn"
                            href="{{ route('application.show', ['application' => $student['Application_ID']]) }}">
                            <i class="la la-eye"></i>
                            @if ($student['status'] == 1)
                                View Submitted Application.
                            @else
                                View Incomplete Application.
                            @endif
                        </a>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="align-center">No records available</td>
            </tr>
        @endforelse
    </x-slot>

    <x-slot name="pagination">
        {{ $students->links() }}
    </x-slot>

    <x-slot name="showingEntries">
        Showing {{ $students->firstitem() ?? 0 }} to {{ $students->lastitem() ?? 0 }} of
        {{ $students->total() }}
        entries
    </x-slot>

</x-admin.table>
