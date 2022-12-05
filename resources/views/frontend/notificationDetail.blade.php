@extends('layouts.frontend-layout')
@section('title', __('page_title.home_page_title'))
@section('content')
	
	<div class="home-wrap">
        <div class="hme-inr" id='ntf-detail'>
        	<div class='ntf_image_logo'>
        		<img src="{{ asset('frontend_assets/images/lg2.png') }}" alt="" />
        	</div>
        	<div class='ntf_candidate_detail'>
        		<p class='ntf_student_name'>Candidate Name: {{ $studentDetail->S1_First_Name }} {{ $studentDetail->S1_Last_Name }}</p>
        		@switch($appDetail->application_type_id)
        			@case(1)
        				@php ($appStatus = 'Accepted')
        			@break
        			@case(2)
        				@php ($appStatus = 'Waiting List')
        			@break
        			@case(3)
        				@php ($appStatus = 'Not Accepted')
        			@break
        			@default
        				@php ($appStatus = 'No Status Yet')
        		@endswitch
        		<p class='ntf_application_status'>Application Status: {{ $appStatus }} </p>
        	</div>
        	<div class='application_message'>
        		<p class='short_message'>{{ $ntfDetail->message; }}</p>
        	</div>
        	<div class='application_download'>
        		<a href='{{url("/notification/pdfgenerator")}}/{{ $ntfDetail->id }}/{{ $studentDetail->Profile_ID }}'>Download</a>
        	</div>
        	
        	@if($appDetail->application_type_id == App\Models\Application::TYPE_ACCEPTED && $appDetail->candidate_status == App\Models\Application::CANDIDATE_NOT_DEFINED)
        		<div class='student_btns'>
        			<a href="{{ url('/candidate/response') }}/{{ $appDetail->Application_ID }}/{{App\Models\Application::CANDIDATE_ACCEPTED}}" class='btn btn_accept'>Accept</a>
        			<a href="{{ url('/candidate/response') }}/{{ $appDetail->Application_ID }}/{{App\Models\Application::CANDIDATE_REJECTED}}" class='btn btn_reject'>Reject</a>
        		</div>
        	@else 
        		<div class='get_response'>
        			<p>Thankyou for your response. We have recieved your response.</p>
        		</div>
        	@endif
        </div>
    </div>
	
@endsection