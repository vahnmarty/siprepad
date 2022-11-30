@extends('layouts.frontend-layout')
@section('title', __('page_title.home_page_title'))
@section('content')
	
	<div class="home-wrap">
        <div class="hme-inr" id='ntf-detail'>
        	<div class='ntf_image_logo'>
        		<img src="{{ asset('frontend_assets/images/lg2.png') }}" alt="" />
        	</div>
        	<div class='ntf_candidate_detail'>
        		<p class='ntf_student_name'>Student Name: {{ $studentDetail->S1_Preferred_First_Name }}</p>
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
        </div>
    </div>
	
@endsection