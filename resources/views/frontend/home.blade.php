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
            @if(!empty($application_status))
@if($application_status->candidate_status == App\Models\Application::CANDIDATE_ACCEPTED)

            <li>
                        <a href="{{route('registeration-application')}}/one">
                            <em>
                                <img src="{{ asset('frontend_assets/images/j2.svg') }}" alt="" />
                            </em>
                            <p>Online Registeration</p>
                            <span>
                                <img src="{{ asset('frontend_assets/images/rgt-arrw.svg') }}"alt="" />
                            </span>
                        </a>
                    </li>
                    @endif
 @endif
                  
            @if($notifications  == App\Models\Global_Notifiable::NOTIFICATION_ON)

            <li>
                    <a target="_blank" href="{{url('/notification')}}">

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

                <li>
                    <a target="_blank" href="https://www.siprep.org/admissions/visit/wildcat-experience">
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

                @if ($application)
                    <li>
                        @if ($getStudentCount == 0)
                            <a class="disabled_btn_text" style="color: #99adef"
                                href="{{ route('supplemental-recommendation') }}">
                                <em>
                                    <img src="{{ asset('frontend_assets/images/j3.svg') }}" alt="" />
                                </em>
                                <p>Supplemental Recommendation</p>
                                <span>
                                    <img src="{{ asset('frontend_assets/images/rgt-arrw.svg') }}"alt="" />
                                </span>
                            </a>
                        @else
                            <a href="{{ route('supplemental-recommendation') }}">
                                <em>
                                    <img src="{{ asset('frontend_assets/images/j3.svg') }}" alt="" />
                                </em>
                                <p>Supplemental Recommendation</p>
                                <span>
                                    <img src="{{ asset('frontend_assets/images/rgt-arrw.svg') }}"alt="" />
                                </span>
                            </a>
                        @endif

                    </li>
                @else
                    <li>
                        <a href="{{ route('supplemental-recommendation') }}">
                            <em>
                                <img src="{{ asset('frontend_assets/images/j3.svg') }}" alt="" />
                            </em>
                            <p>Supplemental Recommendation</p>
                            <span>
                                <img src="{{ asset('frontend_assets/images/rgt-arrw.svg') }}"alt="" />
                            </span>
                        </a>
                    </li>
                @endif

            </ul>
        </div>
    </div>
@endsection
