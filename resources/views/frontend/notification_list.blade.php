@extends('layouts.frontend-layout')
@section('title', __('page_title.home_page_title'))
@section('content')
	
	<div class="home-wrap">
        <div class="hme-inr">
        	<h3>Notifications, <span>Hello , {{ Auth::guard('customer')->user()->full_name }}</span></h3>
        	<ul class="ntf-ul">
        

        	</ul>
        </div>
    </div>
	
@endsection