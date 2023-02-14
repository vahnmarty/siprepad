@extends('layouts.frontend-layout')
@section('title', __('page_title.home_page_title'))
@section('content')
<div class="home-wrap">
    <div class="hme-inr">
        <h3>Welcome, <span>{{ Auth::guard('customer')->user()->full_name }}</span></h3>
        <ul class="hme-ul">
            @php
            $uid=Auth::guard('customer')->user()->id;
            $getProfile = App\Models\Profile::find($uid)->first();

            @endphp


           @if(!empty($registerable))
@if($registerable == App\Models\GlobalRegisterable::REGISTRATION_ON)
@if(!empty($application_status))
@if($application_status->s1_candidate_status == App\Models\Application::CANDIDATE_ACCEPTED||$application_status->s2_candidate_status == App\Models\Application::CANDIDATE_ACCEPTED
||$application_status->s3_candidate_status == App\Models\Application::CANDIDATE_ACCEPTED)


@if(count($paymentStudentCount)==1)
<li>

    <a href="{{route('registration.create')}}">

        <em>
            <img src="{{ asset('frontend_assets/images/j2.svg') }}" alt="" />
        </em>
        <p>Online Registration</p>
        <span>
            <img src="{{ asset('frontend_assets/images/rgt-arrw.svg') }}" alt="" />
        </span>
    </a>
</li>
@elseif(count($paymentStudentCount)>1)
<li>

    <a href="{{route('registration.create')}}">

        <em>
            <img src="{{ asset('frontend_assets/images/j2.svg') }}" alt="" />
        </em>
        <p>Online Registrations</p>
        <span>
            <img src="{{ asset('frontend_assets/images/rgt-arrw.svg') }}" alt="" />
        </span>
    </a>
</li>
@endif
@endif
@endif
@endif
@endif

            @if($notifications == App\Models\Global_Notifiable::NOTIFICATION_ON)
            @if(!empty($application_status))

            @if($notification_list >= App\Models\Notification::NOTIFY_LENGTH)
            @if(count($studentCount)==1)
         
            @if($studentCount[App\Models\Application::TYPE_PENDING]['student_type']==App\Models\Application::STUDENT_ONE)

            <li>
                <a href="{{route('studentNotification',$application_status->s1_notification_id)}}">

                    <em>
                        <img src="{{ asset('frontend_assets/images/j1.svg') }}" alt="" />
                    </em>
                    <p>Notification</p>
                    <span>
                        <img src="{{ asset('frontend_assets/images/rgt-arrw.svg') }}" alt="" />
                    </span>
                </a>
            </li>

            @endif
            @if($studentCount[App\Models\Application::TYPE_PENDING]['student_type']==App\Models\Application::STUDENT_TWO)

            <li>
                <a href="{{route('studentNotification',$application_status->s2_notification_id)}}">

                    <em>
                        <img src="{{ asset('frontend_assets/images/j1.svg') }}" alt="" />
                    </em>
                    <p>Notification</p>
                    <span>
                        <img src="{{ asset('frontend_assets/images/rgt-arrw.svg') }}" alt="" />
                    </span>
                </a>
            </li>

            @endif
            @if($studentCount[App\Models\Application::TYPE_PENDING]['student_type']==App\Models\Application::STUDENT_THREE)

            <li>
                <a href="{{route('studentNotification',$application_status->s3_notification_id)}}">

                    <em>
                        <img src="{{ asset('frontend_assets/images/j1.svg') }}" alt="" />
                    </em>
                    <p>Notification</p>
                    <span>
                        <img src="{{ asset('frontend_assets/images/rgt-arrw.svg') }}" alt="" />
                    </span>
                </a>
            </li>

            @endif
            @else
            <li>
                <a href="{{url('/notification')}}">

                    <em>
                        <img src="{{ asset('frontend_assets/images/j1.svg') }}" alt="" />
                    </em>
                    <p>Notifications</p>
                    <span>
                        <img src="{{ asset('frontend_assets/images/rgt-arrw.svg') }}" alt="" />
                    </span>
                </a>
            </li>
            @endif
            @endif
            @endif
            @endif
            <li>
                <a href="https://www.siprep.org/admissions/visit/wildcat-experience">
                    <em>
                        <img src="{{ asset('frontend_assets/images/j1.svg') }}" alt="" />
                    </em>
                    <p>Book a Wildcat Experience</p>
                    <span>
                        <img src="{{ asset('frontend_assets/images/rgt-arrw.svg') }}" alt="" />
                    </span>
                </a>
            </li>
            @if ($application)
            @if ($application->status ==App\Models\Application::CANDIDATE_ACCEPTED)
            @if(!empty($application_status))
           
            @if(count($paymentStudentCount)==1)
            @if($studentCount[App\Models\Application::TYPE_PENDING]['student_type']==App\Models\Application::STUDENT_ONE)
            <li>
                <a href="{{ route('view-application', ['application_id' => $application->Application_ID]) }}">
                    <em>
                        <img src="{{ asset('frontend_assets/images/j2.svg') }}" alt="" />
                    </em>
                    <p>View Application</p>
                    <span>
                        <img src="{{ asset('frontend_assets/images/rgt-arrw.svg') }}" alt="" />
                    </span>
                </a>
            </li>
            @endif

            @elseif(count($paymentStudentCount)>1)
            <li>
                <a href="{{ route('view-application', ['application_id' => $application->Application_ID]) }}">
                    <em>
                        <img src="{{ asset('frontend_assets/images/j2.svg') }}" alt="" />
                    </em>
                    <p>View Applications</p>
                    <span>
                        <img src="{{ asset('frontend_assets/images/rgt-arrw.svg') }}" alt="" />
                    </span>
                </a>
            </li>
            @endif

            @endif

            @else
            @php
            if ($application->last_step_complete) {
            $step = $application->last_step_complete;
            } else {
            $step = 'one';
            }

            @endphp
            <li>
                <a href="{{ route('admission-application', ['step' => $step]) }}">
                    <em>
                        <img src="{{ asset('frontend_assets/images/j2.svg') }}" alt="" />
                    </em>
                    <p>Admissions Application</p>
                    <span>
                        <img src="{{ asset('frontend_assets/images/rgt-arrw.svg') }}" alt="" />
                    </span>
                </a>
            </li>
            @endif
            @else
            <li>
                <a href="{{ route('admission-application') }}">
                    <em>
                        <img src="{{ asset('frontend_assets/images/j2.svg') }}" alt="" />
                    </em>
                    <p>Admissions Application</p>
                    <span>
                        <img src="{{ asset('frontend_assets/images/rgt-arrw.svg') }}" alt="" />
                    </span>
                </a>
            </li>
            @endif

            <li>
                <a target="_blank" href="https://www.siprep.org/admissions/apply/admissions-video">
                    <em>
                        <img src="{{ asset('frontend_assets/images/videoplayer.svg') }}" alt="" />
                    </em>
                    <p>Admissions Video</p>
                    <span>
                        <img src="{{ asset('frontend_assets/images/rgt-arrw.svg') }}" alt="" />
                    </span>
                </a>
            </li>
            @if(App\Helpers\Helper::getGlobalStudentTransfer() == App\Models\Global_Notifiable::NOTIFICATION_ON)


            @if ($application)
            <li>
                @if ($getStudentCount == 0)
                <a class="disabled_btn_text" style="color: #99adef" href="{{ route('supplemental-recommendation') }}">
                    <em>
                        <img src="{{ asset('frontend_assets/images/j3.svg') }}" alt="" />
                    </em>
                    <p>Supplemental Recommendation</p>
                    <span>
                        <img src="{{ asset('frontend_assets/images/rgt-arrw.svg') }}" alt="" />
                    </span>
                </a>
                @else
                <a href="{{ route('supplemental-recommendation') }}">
                    <em>
                        <img src="{{ asset('frontend_assets/images/j3.svg') }}" alt="" />
                    </em>
                    <p>Supplemental Recommendation</p>
                    <span>
                        <img src="{{ asset('frontend_assets/images/rgt-arrw.svg') }}" alt="" />
                    </span>
                </a>
                @endif

            </li>
            @else
            @if($studentTransfer == App\Models\GlobalStudentTransfer::STUDENTTRANSFER_ON)
            <li>
                <a href="{{ route('supplemental-recommendation') }}">
                    <em>
                        <img src="{{ asset('frontend_assets/images/j3.svg') }}" alt="" />
                    </em>
                    <p>Supplemental Recommendation</p>
                    <span>
                        <img src="{{ asset('frontend_assets/images/rgt-arrw.svg') }}" alt="" />
                    </span>
                </a>
            </li>
            @endif
            @endif
            @endif

        </ul>

    </div>
</div>
@endsection