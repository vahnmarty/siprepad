@extends('layouts.frontend-layout')
@section('title', __('page_title.home_page_title'))
@section('content')
	
	<div class="home-wrap">
        <div class="hme-inr">
        	<h3>Notifications, <span>{{ Auth::guard('customer')->user()->full_name }}</span></h3>
        	<ul class="ntf-ul">
        			<li class='ntf-li'><a href='{{url("/notification/show")}}/{{ $notifications->id }}'>{{ $notifications->message }}</a></li>
        	</ul>
        </div>
    </div>
	
@endsection