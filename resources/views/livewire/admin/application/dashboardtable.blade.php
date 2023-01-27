<div class="notification_action">

    <x-admin.table>
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
                @forelse($students as $key => $student)
                @php
                //if userid changed from last iteration, store new userid and change color
                if ($lastId !== $student['Application_ID']) {
                $lastId = $student['Application_ID'];
                }
                @endphp
                @php
                
                $getApplication = App\Models\Application::where('Application_ID','=' ,$student['Application_ID'])
                ->get()->first();
                if($getApplication){
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
                @php
                }
                else{
                }
                @endphp

                @empty

                <tr>
                    <td colspan="6" class="align-center">No records available</td>
                </tr>
                @endforelse
            </x-slot>

    </x-admin.table>