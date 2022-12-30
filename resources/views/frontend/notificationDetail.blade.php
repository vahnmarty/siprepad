@extends('layouts.frontend-layout')
@section('title', __('page_title.home_page_title'))
@section('content')
	
	<div class="home-wrap">
        <div class="hme-inr" id='ntf-detail'>
        	<div class='ntf_image_logo'>
        		<img src="{{ asset('frontend_assets/images/lg2.png') }}" alt="" />
        	</div>
        	
        	<div class='ntf_candidate_detail'>
        		<p class='ntf_student_name'>Candidate Name: {{$name}}</p>
        		<p class='ntf_app_status'>Application Status:
        			@switch($ntfDetail->notification_type)
        				@case(1)
        					Accepted
        				@break
        				@case(2)
        					In Waiting List
        				@break
        				@case(3)
        					Rejected
        				@break
        				@default
        					No Status yet
        			@endswitch 
        		</p>
        	</div>
        	<div class='application_message'>
        		<p class='short_message'>{{ $ntfDetail->message; }}</p>
        	</div>
        	<div class='application_download'>
        		<a href='{{url("/notification/pdfgenerator")}}/{{ $ntfDetail->id }}/{{ $studentDetail->Profile_ID }}' class="btn btn-sm btn-danger">Download</a>
        	</div>
        	@if($student_status == App\Models\Application::TYPE_ACCEPTED && $ntfDetail->notification_type == App\Models\Notification::NOTIFY_ACCEPTED)
       
        		@if($candidate == 's1')
        
        		@if($appStatus->s1_candidate_status == App\Models\Application::CANDIDATE_NOT_DEFINED || $appStatus->s1_candidate_status == App\Models\Application::CANDIDATE_READ)
            		<div class='student_btns'>
            			<a href="{{ url('/candidate/response') }}/{{ $appStatus->application_id }}/{{$candidate}}/{{App\Models\Application::CANDIDATE_ACCEPTED}}" class='btn btn_accept'>Accept</a>
            			<a href="{{ url('/candidate/response') }}/{{ $appStatus->application_id  }}/{{$candidate}}/{{App\Models\Application::CANDIDATE_REJECTED}}" class='btn btn_reject'>Reject</a>
            		</div>
            	@else 
            		<div class='get_response'>
            			<p>Thankyou for your response. We have recieved your response.</p>
            		</div>
        		@endif
        		@endif
        		@if($candidate == 's2')
        
        		@if($appStatus->s2_candidate_status == App\Models\Application::CANDIDATE_NOT_DEFINED || $appStatus->s2_candidate_status == App\Models\Application::CANDIDATE_READ)
            		<div class='student_btns'>
            			<a href="{{ url('/candidate/response') }}/{{ $appStatus->application_id }}/{{$candidate}}/{{App\Models\Application::CANDIDATE_ACCEPTED}}" class='btn btn_accept'>Accept</a>
            			<a href="{{ url('/candidate/response') }}/{{ $appStatus->application_id  }}/{{$candidate}}/{{App\Models\Application::CANDIDATE_REJECTED}}" class='btn btn_reject'>Reject</a>
            		</div>
            	@else 
            		<div class='get_response'>
            			<p>Thankyou for your response. We have recieved your response.</p>
            		</div>
        		@endif
        		@endif
        		@if($candidate == 's3')
        
        		@if($appStatus->s3_candidate_status == App\Models\Application::CANDIDATE_NOT_DEFINED || $appStatus->s3_candidate_status == App\Models\Application::CANDIDATE_READ)
            		<div class='student_btns'>
            			<a href="{{ url('/candidate/response') }}/{{ $appStatus->application_id }}/{{$candidate}}/{{App\Models\Application::CANDIDATE_ACCEPTED}}" class='btn btn-sm btn-success mt-3'>Accept</a>
            			<a href="{{ url('/candidate/response') }}/{{ $appStatus->application_id  }}/{{$candidate}}/{{App\Models\Application::CANDIDATE_REJECTED}}" class='btn btn-sm btn-danger mt-3'>Reject</a>
            		</div>
            	@else 
            		<div class='get_response'>
            			<p>Thankyou for your response. We have recieved your response.</p>
            		</div>
        		@endif
        		@endif
        	@endif
        </div>
    </div>
	
@endsection