@extends('layouts.frontend-layout')
@section('title', __('page_title.home_page_title'))
@section('content')
	
	<div class="home-wrap">
        <div class="hme-inr">
        	<h3>Notifications, <span>{{ Auth::guard('customer')->user()->full_name }}</span></h3>
        	<ul class="ntf-ul">
        		@foreach($notifications as $notification)
        			<li class='ntf-li'><a href='/notification/show/{{ $notification->id }}'>{{ $notification->message }}</a></li>
        		@endforeach()
        	</ul>
        </div>
    </div>
	
@endsection