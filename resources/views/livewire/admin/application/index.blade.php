<div class="notification_action">
    @if($notification == App\Models\Global_Notifiable::NOTIFICATION_ON)
    <a href="{{ url('/admin/user/notify/')}}/{{App\Models\Profile::NOTIFICATION_ON}}/{{$notification}}" style="color: white; background: linear-gradient(180deg, #19a74d 0%, #002664 100%) !important;" class="btn btn-on mb-3">Notification On</a>
    @else
    <a href="{{ url('/admin/user/notify/')}}/{{App\Models\Profile::NOTIFICATION_OFF}}/{{$notification}}" style="color:white" class="btn btn-off mb-3">Notification Off</a>
    @endif
    @if($registeration == App\Models\GlobalRegisterable::REGISTRATION_ON )

    <a href="{{ url('admin/user/registerable')}}/{{App\Models\Profile::REGISTERTATION_OFF}}/{{$registeration}}" style="color: white; background: linear-gradient(180deg, #19a74d 0%, #002664 100%) !important;" class="btn btn-on mb-3">Registeration On</a>
    @else
    <a href="{{  url('admin/user/registerable')}}/{{App\Models\Profile::REGISTERTATION_ON}}/{{$registeration}}" style="color:white" class="btn btn-off mb-3">Registration Off</a>
    @endif

    <x-admin.table>
        <x-slot name="search">

        <x-slot name="thead">
            <tr role="row">
                <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 15%;" aria-sort="ascending" aria-label="Agent: activate to sort column descending">Student First Name<i class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortByName('first_name')"></i>
                </th>

                <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 15%;" aria-label="Company Email: activate to sort column ascending">Student Last Name<i class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortByName('last_name')"></i></th>


                <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 20%;" aria-label="Company Agent: activate to sort column ascending">Student Email
                </th>

                <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 20%;" aria-label="Company Agent: activate to sort column ascending">Student Phone
                </th>
                <th tabindex="0" aria-controls="kt_table_1" style="width: 10%;" aria-label="Company Agent: activate to sort column ascending">Status
                </th>
                <th tabindex="0" aria-controls="kt_table_1" style="width: 10%;" aria-label="Company Agent: activate to sort column ascending">Decision
                </th>

                <th class="align-center" rowspan="1" colspan="1" style="width: 30%;" aria-label="Actions">Actions</th>
            </tr>

            <tr class="filter">
                <th>
                    <x-admin.input type="search" wire:model.defer="searchFirstName" placeholder="" autocomplete="off" class="form-control-sm form-filter" />
                </th>
                <th>
                    <x-admin.input type="search" wire:model.defer="searchLastName" placeholder="" autocomplete="off" class="form-control-sm form-filter" />
                </th>
                <th>
                    <x-admin.input type="search" wire:model.defer="searchEmail" placeholder="" autocomplete="off" class="form-control-sm form-filter" />
                </th>
                <th>
                    <x-admin.input type="search" wire:model.defer="searchPhone " placeholder="" autocomplete="off" class="form-control-sm form-filter" />
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
                    <input type='hidden' class='app_id' name='app_id' value='{{ $getApplication->Application_ID }}'>
                    <input type='hidden' class='first_name' name='first_name' value="{{ $student['First_Name'] }}">
                    <input type='hidden' class='last_name' name='first_name' value="{{ $student['Last_Name'] }}">
                    <input type='hidden' class='dob' name='dob' value="{{ $student['Birthday'] }}">
                    <input type='hidden' class='email' name='email' value="{{ $student['Personal_Email'] }}">

                    <?php $studentProfile = ''; ?>
                    @if($getApplicationStatus)
                    @if($student['student_type']==App\Models\Application::STUDENT_ONE)
                    <?php $studentProfile = App\Models\Application::STUDENT_ONE; ?>
                    @elseif($student['student_type']==App\Models\Application::STUDENT_TWO)
                    <?php $studentProfile = App\Models\Application::STUDENT_TWO; ?>
                    @elseif($student['student_type']==App\Models\Application::STUDENT_THREE)
                    <?php $studentProfile = App\Models\Application::STUDENT_THREE; ?>
                    @endif
                    @endif
                    @if($studentProfile == App\Models\Application::STUDENT_ONE)




                    @switch($getApplicationStatus->s1_application_status)
                    @case(1)
                    <select name='candidate-status' required class='state_select-box'>
                        <option value='' disabled>Select</option>
                        <option value='{{App\Models\Application::TYPE_ACCEPTED}}' selected>Accepted</option>
                        <option value='{{App\Models\Application::TYPE_WAIT_LISTED}}'>Wait Listed</option>
                        <option value='{{App\Models\Application::TYPE_NOT_ACCEPTED}}'>Not Accepted</option>
                        <option value='{{App\Models\Application::No_RESPONSE}}'>No Response</option>

                    </select>
                    @break
                    @case(2)
                    <select name='candidate-status' required class='state_select-box'>
                        <option value='' disabled>Select</option>
                        <option value='{{App\Models\Application::TYPE_ACCEPTED}}'>Accepted</option>
                        <option value='{{App\Models\Application::TYPE_WAIT_LISTED}}' selected>Wait Listed</option>
                        <option value='{{App\Models\Application::TYPE_NOT_ACCEPTED}}'>Not Accepted</option>
                        <option value='{{App\Models\Application::No_RESPONSE}}'>No Response</option>

                    </select>
                    @break
                    @case(3)
                    <select name='candidate-status' required class='state_select-box'>
                        <option value='' disabled>Select</option>
                        <option value='{{App\Models\Application::TYPE_ACCEPTED}}'>Accepted</option>
                        <option value='{{App\Models\Application::TYPE_WAIT_LISTED}}'>Wait Listed</option>
                        <option value='{{App\Models\Application::TYPE_NOT_ACCEPTED}}' selected>Not Accepted</option>
                        <option value='{{App\Models\Application::No_RESPONSE}}'>No Response</option>

                        @break
                        @case(4)
                        <select name='candidate-status' required class='state_select-box'>
                            <option value='' disabled>Select</option>
                            <option value='{{App\Models\Application::TYPE_ACCEPTED}}'>Accepted</option>
                            <option value='{{App\Models\Application::TYPE_WAIT_LISTED}}'>Wait Listed</option>
                            <option value='{{App\Models\Application::TYPE_NOT_ACCEPTED}}'>Not Accepted</option>
                            <option value='{{App\Models\Application::No_RESPONSE}}' selected>No Response</option>

                            @break
                            @default
                            <select name='candidate-status' required class='state_select-box'>
                                <option value='' selected disabled>Select</option>
                                <option value='{{App\Models\Application::TYPE_ACCEPTED}}'>Accepted</option>
                                <option value='{{App\Models\Application::TYPE_WAIT_LISTED}}'>Wait Listed</option>
                                <option value='{{App\Models\Application::TYPE_NOT_ACCEPTED}}'>Not Accepted</option>
                                <option value='{{App\Models\Application::No_RESPONSE}}'>No Response</option>

                            </select>
                            @endswitch
                            @else
                            @if(empty($studentProfile))
                            <select name='candidate-status' required class='state_select-box'>
                                <option value='' selected disabled>Select</option>
                                <option value='{{App\Models\Application::TYPE_ACCEPTED}}'>Accepted</option>
                                <option value='{{App\Models\Application::TYPE_WAIT_LISTED}}'>Wait Listed</option>
                                <option value='{{App\Models\Application::TYPE_NOT_ACCEPTED}}'>Not Accepted</option>
                                <option value='{{App\Models\Application::No_RESPONSE}}'>No Response</option>

                            </select>
                            @endif
                            @endif
                            @if($studentProfile == App\Models\Application::STUDENT_TWO)
                            @switch($getApplicationStatus->s2_application_status)
                            @case(1)
                            <select name='candidate-status' required class='state_select-box'>
                                <option value='' disabled>Select</option>
                                <option value='{{App\Models\Application::TYPE_ACCEPTED}}' selected>Accepted</option>
                                <option value='{{App\Models\Application::TYPE_WAIT_LISTED}}'>Wait Listed</option>
                                <option value='{{App\Models\Application::TYPE_NOT_ACCEPTED}}'>Not Accepted</option>
                                <option value='{{App\Models\Application::No_RESPONSE}}'>No Response</option>

                            </select>
                            @break
                            @case(2)
                            <select name='candidate-status' required class='state_select-box'>
                                <option value='' disabled>Select</option>
                                <option value='{{App\Models\Application::TYPE_ACCEPTED}}'>Accepted</option>
                                <option value='{{App\Models\Application::TYPE_WAIT_LISTED}}' selected>Wait Listed</option>
                                <option value='{{App\Models\Application::TYPE_NOT_ACCEPTED}}'>Not Accepted</option>
                                <option value='{{App\Models\Application::No_RESPONSE}}'>No Response</option>

                            </select>
                            @break
                            @case(3)
                            <select name='candidate-status' required class='state_select-box'>
                                <option value='' disabled>Select</option>
                                <option value='{{App\Models\Application::TYPE_ACCEPTED}}'>Accepted</option>
                                <option value='{{App\Models\Application::TYPE_WAIT_LISTED}}'>Wait Listed</option>
                                <option value='{{App\Models\Application::TYPE_NOT_ACCEPTED}}' selected>Not Accepted</option>
                                <option value='{{App\Models\Application::No_RESPONSE}}'>No Response</option>

                                @break
                                @case(4)
                                <select name='candidate-status' required class='state_select-box'>
                                    <option value='' disabled>Select</option>
                                    <option value='{{App\Models\Application::TYPE_ACCEPTED}}'>Accepted</option>
                                    <option value='{{App\Models\Application::TYPE_WAIT_LISTED}}'>Wait Listed</option>
                                    <option value='{{App\Models\Application::TYPE_NOT_ACCEPTED}}'>Not Accepted</option>
                                    <option value='{{App\Models\Application::No_RESPONSE}}' selected>No Response</option>

                                    @break
                                    @default
                                    <select name='candidate-status' required class='state_select-box'>
                                        <option value='' selected disabled>Select</option>
                                        <option value='{{App\Models\Application::TYPE_ACCEPTED}}'>Accepted</option>
                                        <option value='{{App\Models\Application::TYPE_WAIT_LISTED}}'>Wait Listed</option>
                                        <option value='{{App\Models\Application::TYPE_NOT_ACCEPTED}}'>Not Accepted</option>
                                        <option value='{{App\Models\Application::No_RESPONSE}}'>No Response</option>

                                    </select>
                                    @endswitch
                                    @endif
                                    @if($studentProfile == App\Models\Application::STUDENT_THREE)
                                    @switch($getApplicationStatus->s3_application_status)
                                    @case(1)
                                    <select name='candidate-status' required class='state_select-box'>
                                        <option value='' disabled>Select</option>
                                        <option value='{{App\Models\Application::TYPE_ACCEPTED}}' selected>Accepted</option>
                                        <option value='{{App\Models\Application::TYPE_WAIT_LISTED}}'>Wait Listed</option>
                                        <option value='{{App\Models\Application::TYPE_NOT_ACCEPTED}}'>Not Accepted</option>
                                        <option value='{{App\Models\Application::No_RESPONSE}}'>No Response</option>

                                    </select>
                                    @break
                                    @case(2)
                                    <select name='candidate-status' required class='state_select-box'>
                                        <option value='' disabled>Select</option>
                                        <option value='{{App\Models\Application::TYPE_ACCEPTED}}'>Accepted</option>
                                        <option value='{{App\Models\Application::TYPE_WAIT_LISTED}}' selected>Wait Listed</option>
                                        <option value='{{App\Models\Application::TYPE_NOT_ACCEPTED}}'>Not Accepted</option>
                                        <option value='{{App\Models\Application::No_RESPONSE}}'>No Response</option>

                                    </select>
                                    @break
                                    @case(3)
                                    <select name='candidate-status' required class='state_select-box'>
                                        <option value='' disabled>Select</option>
                                        <option value='{{App\Models\Application::TYPE_ACCEPTED}}'>Accepted</option>
                                        <option value='{{App\Models\Application::TYPE_WAIT_LISTED}}'>Wait Listed</option>
                                        <option value='{{App\Models\Application::TYPE_NOT_ACCEPTED}}' selected>Not Accepted</option>
                                        <option value='{{App\Models\Application::No_RESPONSE}}'>No Response</option>

                                        @break
                                        @case(4)
                                        <select name='candidate-status' required class='state_select-box'>
                                            <option value='' disabled>Select</option>
                                            <option value='{{App\Models\Application::TYPE_ACCEPTED}}'>Accepted</option>
                                            <option value='{{App\Models\Application::TYPE_WAIT_LISTED}}'>Wait Listed</option>
                                            <option value='{{App\Models\Application::TYPE_NOT_ACCEPTED}}'>Not Accepted</option>
                                            <option value='{{App\Models\Application::No_RESPONSE}}' selected>No Response</option>

                                            @break
                                            @default
                                            <select name='candidate-status' required class='state_select-box'>
                                                <option value='' selected disabled>Select</option>
                                                <option value='{{App\Models\Application::TYPE_ACCEPTED}}'>Accepted</option>
                                                <option value='{{App\Models\Application::TYPE_WAIT_LISTED}}'>Wait Listed</option>
                                                <option value='{{App\Models\Application::TYPE_NOT_ACCEPTED}}'>Not Accepted</option>
                                                <option value='{{App\Models\Application::No_RESPONSE}}'>No Response</option>
                                            </select>
                                            @endswitch

                                            @endif

                </td>
                <td>
                    <?php $studentProfile = "" ?>


                    @if($getApplicationStatus)

                    @if($student['student_type']==App\Models\Application::STUDENT_ONE)
                    <?php $studentProfile = App\Models\Application::STUDENT_ONE; ?>
                    @elseif($student['student_type']==App\Models\Application::STUDENT_TWO)
                    <?php $studentProfile = App\Models\Application::STUDENT_TWO; ?>
                    @elseif($student['student_type']==App\Models\Application::STUDENT_THREE)
                    <?php $studentProfile = App\Models\Application::STUDENT_THREE; ?>
                    @endif


                    @if($studentProfile ==App\Models\Application::STUDENT_ONE)
                    @if($getApplicationStatus->s1_notification_id)
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
                    @break
                    @endswitch
                    @endif
                    @endif





                    @if($studentProfile == App\Models\Application::STUDENT_TWO)
                    @if($getApplicationStatus->s2_notification_id)
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
                    @endswitch
                    @endif
                    @endif

                    @if($studentProfile == App\Models\Application::STUDENT_THREE)
                    @if($getApplicationStatus->s3_notification_id)
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
                    @endif
                </td>

                <td>
                    <div class="action__btn">
                        <a class="btn" href="{{ route('application.show', ['application' => $student['Application_ID']]) }}">
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
            {{ $students->withQueryString()->links() }}
        </x-slot>

        <x-slot name="showingEntries">
            Showing {{ $students->firstitem() ?? 0 }} to {{ $students->lastitem() ?? 0 }} of
            {{ $students->total() }}
            entries
        </x-slot>
    </x-admin.table>