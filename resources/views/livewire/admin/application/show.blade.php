<div>
    <style>
        .text_black {
            font-size: 15px;
            font-weight: 700;
            color: black;
        }
    </style>
    <section class="user_details student_wrapper">
        <div class="student_detail_wrapper">
            <div class="form_student_details">
                <div class="main_heading">
                    <h2>User Details</h2>
                </div>
                <div class="studentWise_details">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="student_box">
                                <label>Name:</label>
                                <div class="student_box_text">
                                    <p>{{ $user->full_name ?? '-' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="student_box">
                                <label>Email:</label>
                                <div class="student_box_text">

                                    <p>{{ $user->email ?? '-' }}</p>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-4">
                            <div class="student_box">
                                <label>Phone:</label>
                                <div class="student_box_text">

                                    <p>{{ $user->Pro_Mobile ?? '-' }}</p>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-4">
                            <div class="student_box">
                                <label>Status:</label>
                                <div class="student_box_text">

                                    <p>Active</p>

                                </div>
                            </div>
                        </div>                      

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="form_one student_wrapper">
        <div class="student_detail_wrapper">
            <div class="form_student_details">
                <div class="main_heading">
                    <h2>Student Info</h2>
                </div>
                @forelse ($studentInfo as $studentKey=>$student)
                    <div class="studentWise_details">
                        <h4 class="sub_heading">Student {{ $studentKey + 1 }}</h4>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="student_box studentProfile">
                                    @if ($student['Photo'])
                                        <img src="{{ asset($student['Photo']) }}" alt="" />
                                    @else
                                        <img src="{{ asset($student['Photo']) }}" alt="" />
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="student_box">
                                    <label>Legal First Name:</label>
                                    <div class="student_box_text">
                                        @if ($student['First_Name'])
                                            <p>{{ $student['First_Name'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="student_box">
                                    <label>Legal Middle Name:</label>
                                    <div class="student_box_text">
                                        @if ($student['Middle_Name'])
                                            <p>{{ $student['Middle_Name'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="student_box">
                                    <label>Legal Last Name:</label>
                                    <div class="student_box_text">
                                        @if ($student['Last_Name'])
                                            <p>{{ $student['Last_Name'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="student_box">
                                    <label>Legal Suffix:</label>
                                    <div class="student_box_text">
                                        @if ($student['Suffix'])
                                            <p>{{ $student['Suffix'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="student_box">
                                    <label>Preferred First Name:</label>
                                    <div class="student_box_text">
                                        @if ($student['Preferred_First_Name'])
                                            <p>{{ $student['Preferred_First_Name'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="student_box">
                                    <label>Date of Birth:</label>
                                    <div class="student_box_text">
                                        @if ($student['Birthdate'])
                                            <p>{{ $student['Birthdate'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="student_box">
                                    <label>Gender:</label>
                                    <div class="student_box_text">
                                        @if ($student['Gender'])
                                            <p>{{ $student['Gender'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="student_box">
                                    <label>Personal Email:</label>
                                    <div class="student_box_text">
                                        @if ($student['Personal_Email'])
                                            <p>{{ $student['Personal_Email'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="student_box">
                                    <label>Mobile Phone:</label>
                                    <div class="student_box_text">
                                        @if ($student['Mobile_Phone'])
                                            <p>{{ $student['Mobile_Phone'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{-- <p><span>NOTE:</span> Text messages may be sent directly to applicant.</P> --}}

                            <div class="col-lg-12 col-md-12">
                                <div class="student_box">
                                    <label>How do you identify racially?</label>
                                    <p><b>If you identify with more than one race, select all that apply to you.</b></p>

                                    <div class="student_box_text">
                                        <ul>
                                            @if ($student['Race'])
                                                @forelse ($student['Race'] as $key => $value)
                                                    @php
                                                        //$item = App\Models\IdentifyRacially::find($key);
                                                    @endphp
                                                    <li>{{ $value }}</li>
                                                @empty
                                                    <li>---</li>
                                                @endforelse
                                            @else
                                                <p>---</p>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="student_box">
                                    <label>What is your ethnicity?</label>
                                    <p><b>If more than one, separate ethnicities with a comma.</b></p>
                                    <div class="student_box_text">
                                        @if ($student['Ethnicity'])
                                            <p>{{ $student['Ethnicity'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="student_box">
                                    <label>Current School:</label>
                                    <div class="student_box_text">
                                        <p>{{ $student['Current_School'] }}</p>
                                    </div>
                                </div>
                            </div>
                            @if ($student['Current_School'] == 'Not Listed')
                                <div class="col-lg-12 col-md-12">
                                    <div class="student_box">
                                        <label>If not listed, add it here:</label>
                                        <div class="student_box_text">
                                            <p>{{ $student['Current_School_Not_Listed'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="col-lg-6 col-md-6">
                                <div class="student_box">
                                    <label>Other High School # 1: <span>(where you plan to apply)</span></label>
                                    <div class="student_box_text">
                                        @if ($student['Other_High_School_1'])
                                            <p>{{ $student['Other_High_School_1'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="student_box">
                                    <label>Other High School # 2: <span>(where you plan to apply)</span></label>
                                    <div class="student_box_text">
                                        @if ($student['Other_High_School_2'])
                                            <p>{{ $student['Other_High_School_2'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="student_box">
                                    <label>Other High School # 3: <span>(where you plan to apply)</span></label>
                                    <div class="student_box_text">
                                        @if ($student['Other_High_School_3'])
                                            <p>{{ $student['Other_High_School_3'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="student_box">
                                    <label>Other High School # 4: <span>(where you plan to apply)</span></label>
                                    <div class="student_box_text">
                                        @if ($student['Other_High_School_4'])
                                            <p>{{ $student['Other_High_School_4'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <h1>No Data Found</h1>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="form_two student_wrapper">
        <div class="student_detail_wrapper">
            <div class="form_student_details">
                <div class="main_heading">
                    <h2>Address Info</h2>
                </div>
                @forelse ($addressInfo as $addressKey=>$address)
                    <div class="studentWise_details">
                        <h4 class="sub_heading">{{ $address['Address_Type'] }}</h4>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="student_box">
                                    <label>Address:</label>
                                    <div class="student_box_text">
                                        @if ($address['Address'])
                                            <p>{!! $address['Address'] !!}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="student_box">
                                    <label>City:</label>
                                    <div class="student_box_text">
                                        @if ($address['City'])
                                            <p>{{ $address['City'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="student_box">
                                    <label>State:</label>
                                    <div class="student_box_text">
                                        @if ($address['State'])
                                            <p>{{ $address['State'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="student_box">
                                    <label>Zipcode:</label>
                                    <div class="student_box_text">
                                        @if ($address['Zipcode'])
                                            <p>{{ $address['Zipcode'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="student_box">
                                    <label>Phone Number:</label>
                                    <div class="student_box_text">
                                        @if ($address['Address_Phone'])
                                            <p>{{ $address['Address_Phone'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <h1>No Data Found</h1>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="form_three student_wrapper">
        <div class="student_detail_wrapper">
            <div class="form_student_details">
                <div class="main_heading">
                    <h2>Parent Info</h2>
                </div>
                @forelse ($parentInfo as $parentKey=>$parent)
                    <div class="studentWise_details">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="student_box">
                                    <label>Relationship:</label>
                                    <div class="student_box_text">
                                        @if ($parent['Relationship'])
                                            <p>{{ $parent['Relationship'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2">
                                <div class="student_box">
                                    <label>Salutation:</label>
                                    <div class="student_box_text">
                                        @if ($parent['Salutation'])
                                            <p>{{ $parent['Salutation'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="student_box">
                                    <label>First Name:</label>
                                    <div class="student_box_text">
                                        @if ($parent['First_Name'])
                                            <p>{{ $parent['First_Name'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2">
                                <div class="student_box">
                                    <label>Middle Name:</label>
                                    <div class="student_box_text">
                                        @if ($parent['Middle_Name'])
                                            <p>{{ $parent['Middle_Name'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="student_box">
                                    <label>Last Name:</label>
                                    <div class="student_box_text">
                                        @if ($parent['Last_Name'])
                                            <p>{{ $parent['Last_Name'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2">
                                <div class="student_box">
                                    <label>Suffix:</label>
                                    <div class="student_box_text">
                                        @if ($parent['Suffix'])
                                            <p>{{ $parent['Suffix'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="student_box">
                                    <label>Address Type:</label>
                                    <div class="student_box_text">
                                        @if ($parent['Address_Type'])
                                            <p>{{ $parent['Address_Type'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="student_box">
                                    <label>Mobile Phone:</label>
                                    <div class="student_box_text">
                                        @if ($parent['Mobile_Phone'])
                                            <p>{{ $parent['Mobile_Phone'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="student_box">
                                    <label>Personal Email:</label>
                                    <div class="student_box_text">
                                        @if ($parent['Personal_Email'])
                                            <p>{{ $parent['Personal_Email'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="student_box">
                                    <label>Employer:</label>
                                    <div class="student_box_text">
                                        @if ($parent['Employer'])
                                            <p>{{ $parent['Employer'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="student_box">
                                    <label>Title:</label>
                                    <div class="student_box_text">
                                        @if ($parent['Title'])
                                            <p>{{ $parent['Title'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="student_box">
                                    <label>Work Email:</label>
                                    <div class="student_box_text">
                                        @if ($parent['Work_Email'])
                                            <p>{{ $parent['Work_Email'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="student_box">
                                    <label>Work Phone:</label>
                                    <div class="student_box_text">
                                        @if ($parent['Work_Phone'])
                                            <p>{{ $parent['Work_Phone'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="student_box">
                                    <label>Work Phone Ext:</label>
                                    <div class="student_box_text">
                                        @if ($parent['Work_Phone_Ext'])
                                            <p>{{ $parent['Work_Phone_Ext'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-4">
                                <div class="student_box">
                                    <label>Schools:</label>
                                    <div class="student_box_text">
                                        @if ($parent['Schools'])
                                            <p>{{ $parent['Schools'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8 col-md-12">
                                <div class="student_box">
                                    <label>Living Situation:</label>
                                    @php
                                        $item = App\Models\LivingSituation::find($parent['Living_Situation']);
                                    @endphp
                                    <div class="student_box_text">
                                        <ul>
                                            @if ($item)
                                                <li>{{ $item->name }}</li>
                                            @else
                                                <li>---</li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="student_box">
                                    <label>Status:</label>
                                    <div class="student_box_text">
                                        @if ($parent['Status'])
                                            <p>Deceased : {{ $parent['Status'] == 1 ? 'Yes' : 'No' }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <h1>No Data Found</h1>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="form_four student_wrapper">
        <div class="student_detail_wrapper">
            <div class="form_student_details">
                <div class="main_heading">
                    <h2>Sibling Info</h2>
                </div>
                <div class="student_box_label">
                    <label>Do you have other children? <span
                            class="children_sec">{{ count($siblingInfo) > 0 ? 'Yes' : 'No' }}</span></label>
                </div>

                @if (count($siblingInfo) > 0)
                    @foreach ($siblingInfo as $siblingKey => $sibling)
                        {{-- {{ dd($sibling) }} --}}
                        <div class="studentWise_details">
                            <h4 class="sub_heading">Child {{ $siblingKey + 1 }}</h4>
                            <div class="row">
                                <div class="col-lg-3 col-md-3">
                                    <div class="student_box">
                                        <label>First Name:</label>
                                        <div class="student_box_text">
                                            @if ($sibling['First_Name'])
                                                <p>{{ $sibling['First_Name'] }}</p>
                                            @else
                                                <p>---</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3">
                                    <div class="student_box">
                                        <label>Middle Name:</label>
                                        <div class="student_box_text">
                                            @if ($sibling['Middle_Name'])
                                                <p>{{ $sibling['Middle_Name'] }}</p>
                                            @else
                                                <p>---</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3">
                                    <div class="student_box">
                                        <label>Last Name:</label>
                                        <div class="student_box_text">
                                            @if ($sibling['Last_Name'])
                                                <p>{{ $sibling['Last_Name'] }}</p>
                                            @else
                                                <p>---</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3">
                                    <div class="student_box">
                                        <label>Suffix:</label>
                                        <div class="student_box_text">
                                            @if ($sibling['Suffix'])
                                                <p>{{ $sibling['Suffix'] }}</p>
                                            @else
                                                <p>---</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-8 col-md-8">
                                    <div class="student_box">
                                        <label>Current School:</label>
                                        <div class="student_box_text">
                                            @if ($sibling['Current_School'])
                                                <p>{{ $sibling['Current_School'] }}</p>
                                            @else
                                                <p>---</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @if ($sibling['Current_School'] == 'Not Listed')
                                    <div class="col-lg-4 col-md-4">
                                        <div class="student_box">
                                            <label>If not listed, add it here:</label>
                                            <div class="student_box_text">
                                                <p>{{ $sibling['Current_School_Not_Listed'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif


                                <div class="col-lg-5 col-md-5">
                                    <div class="student_box">
                                        <label>Relationship:</label>
                                        <div class="student_box_text">
                                            @if ($sibling['Relationship'])
                                                <p>{{ $sibling['Relationship'] }}</p>
                                            @else
                                                <p>---</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <div class="student_box">
                                        <label>Current Grade:</label>
                                        <div class="student_box_text">
                                            @if ($sibling['Current_Grade'])
                                                <p>{{ $sibling['Current_Grade'] }}</p>
                                            @else
                                                <p>---</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-3 col-md-3">
                                    <div class="student_box">
                                        <label>HS Graduation Year:</label>
                                        <div class="student_box_text">
                                            @if ($sibling['HS_Graduation_Year'])
                                                <p>{{ $sibling['HS_Graduation_Year'] }}</p>
                                            @else
                                                <p>---</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <section class="form_five student_wrapper">
        <div class="student_detail_wrapper">
            <div class="form_student_details">
                <div class="main_heading">
                    <h2>Legacy Info</h2>
                </div>
                <div class="student_box_label">
                    <label>Do you have family members who have attended SI? <span
                            class="children_sec">{{ count($legacyInfo) > 0 ? 'Yes' : 'No' }}</span></label>
                </div>

                @if (count($legacyInfo) > 0)
                    @foreach ($legacyInfo as $legacyKey => $legacy)
                        <div class="studentWise_details">
                            <h4 class="sub_heading">Legacy Relative {{ $legacyKey + 1 }}</h4>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="student_box">
                                        <label>First Name:</label>
                                        <div class="student_box_text">
                                            @if ($legacy['First_Name'])
                                                <p>{{ $legacy['First_Name'] }}</p>
                                            @else
                                                <p>---</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="student_box">
                                        <label>Last Name:</label>
                                        <div class="student_box_text">
                                            @if ($legacy['Last_Name'])
                                                <p>{{ $legacy['Last_Name'] }}</p>
                                            @else
                                                <p>---</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="student_box">
                                        <label>Relationship:</label>
                                        <div class="student_box_text">
                                            @if ($legacy['Relationship'])
                                                <p>{{ $legacy['Relationship'] }}</p>
                                            @else
                                                <p>---</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="student_box">
                                        <label>Graduation Year:</label>
                                        <div class="student_box_text">
                                            @if ($legacy['Graduation_Year'])
                                                <p>{{ $legacy['Graduation_Year'] }}</p>
                                            @else
                                                <p>---</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <section class="form_six student_wrapper">
        <div class="student_detail_wrapper">
            <div class="form_student_details">
                <div class="main_heading">
                    <h2>Parent Statement</h2>
                </div>
                @if (count($parentStatement) > 0)
                    <div class="">
                        <div class="student_box_label student_box">
                            <label>Why do you desire St. Ignatius as a high school option for your child(ren)?</label>
                            <div class="student_box_text">
                                @if ($parentStatement['Why_SI_for_Child'])
                                    <p>{{ $parentStatement['Why_SI_for_Child'] }}</p>
                                @else
                                    <p>---</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form_six_parent">
                        @foreach ($parentStatement['Students'] as $psKey => $studentPS)
                            <div class="studentWise_details">
                                <h4 class="sub_heading">{{ $studentPS['Student_name'] }}</h4>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="student_box">
                                            <label>Explain your child's most endearing quality and an area of
                                                growth:</label>
                                            <div class="student_box_text">
                                                @if ($studentPS['Endearing_Quality_and_Growth'])
                                                    <p>{{ $studentPS['Endearing_Quality_and_Growth'] }}</p>
                                                @else
                                                    <p>---</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="student_box">
                                            <label>Please tell us something about your child, but does not appear in the
                                                application:</label>
                                            <div class="student_box_text">
                                                @if ($studentPS['About_Child_Not_on_App'])
                                                    <p>{{ $studentPS['About_Child_Not_on_App'] }}</p>
                                                @else
                                                    <p>---</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="student_box_label student_box">
                                <label>Parent Statement Submitted By:</label>
                                <div class="student_box_text">
                                    @if ($parentStatement['Parent_Statement_Submitted_By'])
                                        <p>{{ $parentStatement['Parent_Statement_Submitted_By'] }}</p>
                                    @else
                                        <p>---</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="student_box_label student_box">
                                <label>Relationship to Student(s):</label>
                                <div class="student_box_text">
                                    @if ($parentStatement['Parent_Statement_Relationship'])
                                        <p>{{ $parentStatement['Parent_Statement_Relationship'] }}</p>
                                    @else
                                        <p>---</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <h1>No Data Found</h1>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section class="form_seven student_wrapper">
        <div class="student_detail_wrapper">
            <div class="form_student_details">
                <div class="main_heading">
                    <h2>Spiritual & Community Info</h2>
                </div>
                @if (count($spiritualCommunityInfo) > 0)
                    <div class="form_seven_box">
                        <div class="studentWise_details">
                            <h4 class="sub_heading">Religious Background</h4>
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="student_box">
                                        <label>Applicant's Religion:</label>
                                        <div class="student_box_text">
                                            @if ($spiritualCommunityInfo['Applicant_Religion'])
                                                <p>{{ $spiritualCommunityInfo['Applicant_Religion'] }}</p>
                                            @else
                                                <p>---</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="student_box">
                                        <label>Church/Faith Community:</label>
                                        <div class="student_box_text">
                                            @if ($spiritualCommunityInfo['Church_Faith_Community'])
                                                <p>{{ $spiritualCommunityInfo['Church_Faith_Community'] }}</p>
                                            @else
                                                <p>---</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="student_box">
                                        <label>Church/Faith Community Location:</label>
                                        <div class="student_box_text">
                                            @if ($spiritualCommunityInfo['Church_Faith_Community_Location'])
                                                <p>{{ $spiritualCommunityInfo['Church_Faith_Community_Location'] }}</p>
                                            @else
                                                <p>---</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form_seven_parent">
                                @foreach ($spiritualCommunityInfo['Students'] as $scKey => $studentSc)
                                    <div class="studentWise_details">
                                        <h4 class="sub_heading">{{ $studentSc['Student_name'] }}</h4>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="student_box">
                                                    <label>Baptism Year:</label>
                                                    <div class="student_box_text">
                                                        @if ($studentSc['Baptism_Year'])
                                                            <p>{{ $studentSc['Baptism_Year'] }}</p>
                                                        @else
                                                            <p>---</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="student_box">
                                                    <label>Confirmation Year:</label>
                                                    <div class="student_box_text">
                                                        @if ($studentSc['Confirmation_Year'])
                                                            <p>{{ $studentSc['Confirmation_Year'] }}</p>
                                                        @else
                                                            <p>---</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="form_seven_box">
                        <div class="studentWise_details">
                            <h4 class="sub_heading">Family Spirituality and Community:</h4>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="student_box">
                                        <label>What impact does community have in your life and how do you best support
                                            your
                                            child's school community?</label>
                                        <div class="student_box_text">
                                            @if ($spiritualCommunityInfo['Impact_to_Community'])
                                                <p>{{ $spiritualCommunityInfo['Impact_to_Community'] }}</p>
                                            @else
                                                <p>---</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="student_box">
                                        <label>How would you describe your family's spirituality?</label>
                                        <div class="student_box_text">
                                            <ul>
                                                @if ($spiritualCommunityInfo['Describe_Family_Spirituality'])
                                                    @forelse ($spiritualCommunityInfo['Describe_Family_Spirituality'] as $dfsKey => $value)
                                                        @php
                                                            //$item = App\Models\Spirituality::find($dfsKey);
                                                        @endphp
                                                        <li>{{ $value }}</li>
                                                    @empty
                                                        <li>---</li>
                                                    @endforelse
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="student_box">
                                        <label>Describe in more detail the practice(s) checked above:</label>
                                        <div class="student_box_text">
                                            @if ($spiritualCommunityInfo['Describe_Practice_in_Detail'])
                                                <p>{{ $spiritualCommunityInfo['Describe_Practice_in_Detail'] }}</p>
                                            @else
                                                <p>---</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <div class="student_box">
                                        <label>Religious Studies Classes:</label>
                                        <div class="student_box_text">
                                            @if ($spiritualCommunityInfo['Religious_Studies_Classes'])
                                                <p>{{ $spiritualCommunityInfo['Religious_Studies_Classes'] }}</p>
                                            @else
                                                <p>---</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- @if ($spiritualCommunityInfo['Religious_Studies_Classes'] == 'No' || $spiritualCommunityInfo['Religious_Studies_Classes'] == 'Unsure') --}}
                                <div class="col-lg-8 col-md-8">
                                    <div class="student_box">
                                        <label>Religious Studies Classes Explanation (If No/Unsure):</label>
                                        <div class="student_box_text">
                                            @if ($spiritualCommunityInfo['Religious_Studies_Classes_Explanation'])
                                                <p>{{ $spiritualCommunityInfo['Religious_Studies_Classes_Explanation'] }}
                                                </p>
                                            @else
                                                <p>---</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- @endif --}}

                                <div class="col-lg-4 col-md-4">
                                    <div class="student_box">
                                        <label>School Liturgies:</label>
                                        <div class="student_box_text">
                                            @if ($spiritualCommunityInfo['School_Liturgies'])
                                                <p>{{ $spiritualCommunityInfo['School_Liturgies'] }}</p>
                                            @else
                                                <p>---</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- @if ($spiritualCommunityInfo['School_Liturgies'] == 'No' || $spiritualCommunityInfo['School_Liturgies'] == 'Unsure') --}}
                                <div class="col-lg-8 col-md-8">
                                    <div class="student_box">
                                        <label>School Liturgies Explanation (If No/Unsure):</label>
                                        <div class="student_box_text">
                                            @if ($spiritualCommunityInfo['School_Liturgies_Explanation'])
                                                <p>{{ $spiritualCommunityInfo['School_Liturgies_Explanation'] }}
                                                </p>
                                            @else
                                                <p>---</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- @endif --}}

                                <div class="col-lg-4 col-md-4">
                                    <div class="student_box">
                                        <label>Retreats:</label>
                                        <div class="student_box_text">
                                            @if ($spiritualCommunityInfo['Retreats'])
                                                <p>{{ $spiritualCommunityInfo['Retreats'] }}</p>
                                            @else
                                                <p>---</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- @if ($spiritualCommunityInfo['Retreats'] == 'No' || $spiritualCommunityInfo['Retreats'] == 'Unsure') --}}
                                <div class="col-lg-8 col-md-8">
                                    <div class="student_box">
                                        <label>Retreats Explanation (If No/Unsure):</label>
                                        <div class="student_box_text">
                                            @if ($spiritualCommunityInfo['Retreats_Explanation'])
                                                <p>{{ $spiritualCommunityInfo['Retreats_Explanation'] }}</p>
                                            @else
                                                <p>---</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- @endif --}}

                                <div class="col-lg-4 col-md-4">
                                    <div class="student_box">
                                        <label>Community Service:</label>
                                        <div class="student_box_text">
                                            @if ($spiritualCommunityInfo['Community_Service'])
                                                <p>{{ $spiritualCommunityInfo['Community_Service'] }}</p>
                                            @else
                                                <p>---</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- @if ($spiritualCommunityInfo['Community_Service'] == 'No' || $spiritualCommunityInfo['Community_Service'] == 'Unsure') --}}
                                <div class="col-lg-8 col-md-8">
                                    <div class="student_box">
                                        <label>Community Service Explanation (If No/Unsure):</label>
                                        <div class="student_box_text">
                                            @if ($spiritualCommunityInfo['Community_Service_Explanation'])
                                                <p>{{ $spiritualCommunityInfo['Community_Service_Explanation'] }}
                                                </p>
                                            @else
                                                <p>---</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- @endif --}}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="student_box_label student_box">
                                <label>Religious Form Submitted By:</label>
                                <div class="student_box_text">
                                    @if ($spiritualCommunityInfo['Religious_Form_Submitted_By'])
                                        <p>{{ $spiritualCommunityInfo['Religious_Form_Submitted_By'] }}</p>
                                    @else
                                        <p>---</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="student_box_label student_box">
                                <label>Relationship to Student(s):</label>
                                <div class="student_box_text">
                                    @if ($spiritualCommunityInfo['Religious_Form_Relationship'])
                                        <p>{{ $spiritualCommunityInfo['Religious_Form_Relationship'] }}</p>
                                    @else
                                        <p>---</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <h1>No Data Found</h1>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section class="form_eight student_wrapper">
        <div class="student_detail_wrapper">
            <div class="form_student_details">
                <div class="main_heading">
                    <h2>Student Statement</h2>
                </div>
                @if (count($writingSample) > 0)
                    <div class="form_eight_box">
                        <div class="studentWise_details">
                            <h4 class="sub_heading">Student Statement</h4>
                            <div class="form_eight_box-wrapper">
                                @foreach ($studentStatementInfo['Students_Statement'] as $ssKey => $studentSS)
                                    <div class="row form_eight_box-wrapper-row">
                                        <h4 class="sub_heading">{{ $studentSS['Student_name'] }}</h4>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="student_box">
                                                <label>Why did you decide to apply to St. Ignatius College
                                                    Preparatory?</label>
                                                <div class="student_box_text">
                                                    @if ($studentSS['Why_did_you_decide_to_apply_to_SI'])
                                                        <p>{{ $studentSS['Why_did_you_decide_to_apply_to_SI'] }}</p>
                                                    @else
                                                        <p>---</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="student_box">
                                                <label>What do you think will be your greatest challenge at SI and how
                                                    do
                                                    you
                                                    plan to meet that challenge?</label>
                                                <div class="student_box_text">
                                                    @if ($studentSS['Greatest_Challenge'])
                                                        <p>{{ $studentSS['Greatest_Challenge'] }}</p>
                                                    @else
                                                        <p>---</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="student_box">
                                                <label>What religious activity(-ies) do you plan on participating in at
                                                    SI
                                                    as
                                                    part of your spiritual growth and why?</label>
                                                <div class="student_box_text">
                                                    @if ($studentSS['Religious_Activities_for_Growth'])
                                                        <p>{{ $studentSS['Religious_Activities_for_Growth'] }}</p>
                                                    @else
                                                        <p>---</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="student_box">
                                                <label>What is your favorite subject in school and why? What subject do
                                                    you
                                                    find
                                                    the most difficult and why?</label>
                                                <div class="student_box_text">
                                                    @if ($studentSS['Favorite_and_most_difficult_subjects'])
                                                        <p>{{ $studentSS['Favorite_and_most_difficult_subjects'] }}</p>
                                                    @else
                                                        <p>---</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="form_eight_box">
                        <div class="studentWise_details">
                            <h4 class="sub_heading">Extracurricular Activities</h4>
                            <div class="">
                                @foreach ($studentStatementInfo['Extracurricular_Activities'] as $eaKey => $eActivities)
                                    {{-- {{ dd($eActivities) }} --}}
                                    <div class="form_eight_box-wrapper">
                                        <h4 class="sub_heading">{{ $eActivities['Student_name'] }}</h4>

                                        @foreach ($eActivities['Activity'] as $aKey => $item)
                                            <div class="form_eignt_activity">
                                                <h4 class="sub_heading">Activity {{ $aKey + 1 }}</h4>
                                                <div class="row form_eight_box-wrapper-row">
                                                    <div class="col-lg-4 col-md-4">
                                                        <div class="student_box">
                                                            <label>Activity Name:</label>
                                                            <div class="student_box_text">
                                                                @if ($item['Activity_Name'])
                                                                    <p>{{ $item['Activity_Name'] }}</p>
                                                                @else
                                                                    <p>---</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4">
                                                        <div class="student_box">
                                                            <label>Number of Years:</label>
                                                            <div class="student_box_text">
                                                                @if ($item['Number_of_Years'])
                                                                    <p>{{ $item['Number_of_Years'] }}</p>
                                                                @else
                                                                    <p>---</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-4">
                                                        <div class="student_box">
                                                            <label>Hours per Week:</label>
                                                            <div class="student_box_text">
                                                                @if ($item['Hours_Per_Week'])
                                                                    <p>{{ $item['Hours_Per_Week'] }}</p>
                                                                @else
                                                                    <p>---</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="student_box">
                                                            <label>Share a little information about this
                                                                activity:</label>
                                                            <div class="student_box_text">
                                                                @if ($item['Info_about_activity'])
                                                                    <p>{!! $item['Info_about_activity'] !!}</p>
                                                                @else
                                                                    <p>---</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="form_eight_box">
                        <div class="studentWise_details">
                            <h4 class="sub_heading">Future Activities at SI</h4>
                            <div class="form_eight_box-wrapper">
                                @foreach ($studentStatementInfo['Future_Activities'] as $faKey => $fActivitie)
                                    <div class="row form_eignt_activity">
                                        <h4 class="sub_heading">{{ $fActivitie['Student_name'] }}</h4>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="student_box">
                                                <label>From your activities listed above, select the activity you are
                                                    most
                                                    passionate about continuing at SI and describe what you feel you
                                                    would
                                                    contribute to this activity.</label>
                                                <div class="student_box_text">
                                                    @if ($fActivitie['Most_Passionate_Activity'])
                                                        <p>{{ $fActivitie['Most_Passionate_Activity'] }}</p>
                                                    @else
                                                        <p>---</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="student_box">
                                                <label>Select two more extra-curricular activities that you might like
                                                    to be
                                                    involved in at SI.</label>
                                                <p>Explain why these activities appeal to you. Please make sure at least
                                                    one
                                                    of
                                                    these activities is new to you.</p>
                                                <div class="student_box_text">
                                                    @if ($fActivitie['Extracurricular_Activity_at_SI'])
                                                        <p>{{ $fActivitie['Extracurricular_Activity_at_SI'] }}</p>
                                                    @else
                                                        <p>---</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <h1>No Data Found</h1>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section class="form_nine student_wrapper">
        <div class="student_detail_wrapper">
            <div class="form_student_details">
                <div class="main_heading">
                    <h2>Applicant Writing Sample</h2>
                </div>
                @forelse ($writingSample as $wsKey=>$writing)
                    <div class="studentWise_details">
                        <h4 class="sub_heading">{{ $writing['Student_name'] }}</h4>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="student_box">
                                    <label>What matters to you? How does that motivate you, impact your life, your outlook, and/or your identity?</label>
                                    <p>What matters to you might be an activity, an idea, a goal, a place, and/or a thing.</p>
                                    <center><p><b>&#8212; OR &#8212;</b></p></center>
                                    <label>An obstacle you have overcome.</label>
                                    <p>Explain how the obstacle impacted you and how you handled the situation (i.e.,
                                        positive and/or negative attempts along the way or maybe how you're still
                                        working on it) .</p>
                                    <p>Include what you have learned from the experience and how you have applied (or
                                        might apply) this to another situation in your life.</p>
                                    <div class="student_box_text">
                                        @if ($writing['Writing_Sample'])
                                            <p>{!! $writing['Writing_Sample'] !!}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="student_box">
                                    <label>Writing Sample Acknowledgment:</label>
                                    <div class="student_box_text">
                                        @if ($writing['Writing_Sample_Acknowledgment'])
                                            <p>Yes</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="student_box">
                                    <label>Submitted By:</label>
                                    <div class="student_box_text">
                                        @if ($writing['Writing_Sample_Submitted_By'])
                                            <p>{{ $writing['Writing_Sample_Submitted_By'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <h1>No Data Found</h1>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="form_ten student_wrapper">
        <div class="student_detail_wrapper">
            <div class="form_student_details">
                <div class="main_heading">
                    <h2>Final Step</h2>
                </div>
                @if (count($releaseAuthorization) > 0)
                    <div class="studentWise_details">
                        <h4 class="sub_heading">Entrance Exam Information</h4>
                        @foreach ($releaseAuthorization['EntranceExamInfo'] as $raKey => $authorization)
                            <div class="final_step_wrapper">
                                <h4 class="sub_heading">{{ $authorization['Student_name'] }}</h4>
                                <p>Indicate the date and the high school where your child(ren) will take the entrance
                                    exam.
                                </p>
                                @if ($authorization['Entrance_Exam_Reservation'] == '0')
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="student_box">
                                                <label>At Other Catholic High School</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="student_box">
                                                <label>Other Catholic School Name:</label>
                                                <div class="student_box_text">
                                                    @if ($authorization['Other_Catholic_School_Name'])
                                                        <p>{{ $authorization['Other_Catholic_School_Name'] }}</p>
                                                    @else
                                                        <p>---</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="student_box">
                                                <label>Other Catholic School Location:</label>
                                                <div class="student_box_text">
                                                    @if ($authorization['Other_Catholic_School_Location'])
                                                        <p>{{ $authorization['Other_Catholic_School_Location'] }}</p>
                                                    @else
                                                        <p>---</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="student_box">
                                                <label>Other Catholic School Date:</label>
                                                <div class="student_box_text">
                                                    @if ($authorization['Other_Catholic_School_Date'])
                                                        <p>{{ $authorization['Other_Catholic_School_Date'] }}</p>
                                                    @else
                                                        <p>---</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="student_box">
                                                <label>At SI on December 3, 2022</label>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>

                    <div class="studentWise_details">
                        <h4 class="sub_heading">Release Authorization</h4>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="student_box">
                                    <label>Agree to release record ?</label>
                                    <div class="student_box_text">
                                        @if ($releaseAuthorization['Agree_to_release_record'])
                                            <p>Agree</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="student_box">
                                    <label>Agree to record is true ?</label>
                                    <div class="student_box_text">
                                        @if ($releaseAuthorization['Agree_to_record_is_true'])
                                            <p>Agree</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="student_box">
                                    <label>Transaction Amount:</label>
                                    <div class="student_box_text">
                                        @if ($releaseAuthorization['Amount'])
                                            <p>${{ $releaseAuthorization['Amount'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="student_box">
                                    <label>Transaction ID:</label>
                                    <div class="student_box_text">
                                        @if ($releaseAuthorization['Transaction_ID'])
                                            <p>{{ $releaseAuthorization['Transaction_ID'] }}</p>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <h1>No Data Found</h1>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section class="student_wrapper">
        <div class="student_detail_wrapper">
            <div class="form_student_details">
                <div class="main_heading">
                    <h2>Payment Details</h2>
                </div>
                <div class="studentWise_details">
                    <div class="student_box">
                        <label>Original Application Fee:</label>
                        <span class="ml-5 text_black">{{ '$' . count($studentInfo) * 100 }}</span>
                    </div>
                    @if ($paymentLog)
                        @if ($paymentLog->transaction_id)
                            <div class="student_box">
                                <label>Promo Applied:</label>
                                <span class="ml-5 text_black">
                                    {{ $paymentLog->promo_code ? '$' . $paymentLog->promo_code : '---' }}
                                </span>
                            </div>
                            <div class="student_box">
                                <label>New Application Fee:</label>
                                <span class="ml-5 text_black">
                                    {{ $paymentLog->final_amount ? '$' . $paymentLog->final_amount : '$' . count($studentInfo) * 100 }}
                                </span>
                            </div>
                        @else
                            <div class="student_box">
                                <label>Promo Applied:</label>
                                <span class="ml-5 text_black">{{ $paymentLog->promo_code }}</span>
                                <button class="btn btn-info ml-5" data-bs-toggle="modal"
                                    data-bs-target="#changeCouponBtn">Change Coupon</button>
                            </div>
                            <div class="student_box">
                                <label>New Application Fee:</label>
                                <span class="ml-5 text_black">{{ '$' . $paymentLog->final_amount ?? '---' }}</span>
                            </div>
                        @endif
                    @else
                        <div class="student_box">
                            <label>Promo Applied: </label>
                            <button class="btn btn-info ml-5" data-bs-toggle="modal"
                                data-bs-target="#applyCouponBtn">Apply Coupon</button>
                        </div>
                        <div class="student_box">
                            <label>New Application Fee:</label>
                            <span class="ml-5 text_black">---</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!--Apply Coupon Modal -->
    <div class="modal fade" id="applyCouponBtn" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header header-new">
                    <h1>Apply Promo Code</h1>
                    <button class="btn modal__btn" wire:click='hideModal()'>Close</button>
                </div>
                <div class="modal-body">
                    <div class="payment-sec">
                        <div class="form-wrap">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Promo Codes : </label>
                                        <select class="form-control new-controll" wire:model.defer="promo_code">
                                            <option value="">Choose promo code</option>
                                            @foreach ($promoCodes as $k => $promo)
                                                <option value="{{ $promo->promo_code }}"
                                                    {{ old('promo_code') == $promo->promo_code ? 'selected' : '' }}>
                                                    {{ $promo->promo_code }}</option>
                                            @endforeach
                                        </select>
                                        @error('promo_code')
                                            <span class="error error_text">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn modal__btn" type="button" wire:click='applyPromoCode'>Apply</button>
                </div>
            </div>
        </div>
    </div>
    <!--Apply Coupon Modal -->
    <div class="modal fade" id="changeCouponBtn" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header header-new">
                    <h1>Change Promo Code</h1>
                    <button class="btn modal__btn" wire:click='hideModal()'>Close</button>
                </div>
                <div class="modal-body">
                    <div class="payment-sec">
                        <div class="form-wrap">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Promo Codes : </label>
                                        <select class="form-control new-controll" wire:model.defer="promo_code">
                                            <option value="">Choose promo code</option>
                                            @foreach ($promoCodes as $k => $promo)
                                                <option value="{{ $promo->promo_code }}"
                                                    {{ old('promo_code') == $promo->promo_code ? 'selected' : '' }}>
                                                    {{ $promo->promo_code }}</option>
                                            @endforeach
                                        </select>
                                        @error('promo_code')
                                            <span class="error error_text">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn modal__btn" type="button" wire:click='applyPromoCode'>Apply</button>
                </div>
            </div>
        </div>
    </div>
</div>
