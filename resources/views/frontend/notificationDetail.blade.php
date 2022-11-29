@extends('layouts.frontend-layout')
@section('title', __('page_title.home_page_title'))
@section('content')
	
	<div class="home-wrap">
        <div class="hme-inr" id='ntf-detail'>
        	<div class='ntf_image_logo'>
        		<img src="{{ asset('frontend_assets/images/lg2.png') }}" alt="" />
        	</div>
        	<div class='ntf_candidate_detail'>
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
        		<p>Application Status: {{ $appStatus }} </p>
        	</div>
        </div>
    </div>
	
@endsection