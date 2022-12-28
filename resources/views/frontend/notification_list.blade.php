@extends('layouts.frontend-layout')
@section('title', __('page_title.home_page_title'))
@section('content')
	<div class="home-wrap">
        <div class="hme-inr">
       
        	<h3 class ="mb-4">Notifications</h3>
        
        <div class = "row mb-3">
        <div class ="col-md-4">
        </div>
          <div class ="col-md-8">
          @if(!empty($application_status->s1_notification_id))
        	   <a href="{{route('studentNotification',$application_status->s1_notification_id)}}" class ="btn btn-primary btn-danger" style="font-size:33px;width:55%;" >Notification Student One</a>
        	   @endif
        </div>
        </div>
            <div class = "row  mb-3">
        <div class ="col-md-4">
        </div>
          <div class ="col-md-8">
        	@if(!empty($application_status->s2_notification_id)) 
        	  <a href="{{route('studentNotification',$application_status->s2_notification_id)}}" class ="btn btn-primary btn-danger"style="font-size:33px;width:55%;" >Notification Student Two</a>
        	  @endif
        </div>
        </div>
              <div class = "row  mb-3">
        <div class ="col-md-4">
        </div>
          <div class ="col-md-8">
       @if(!empty($application_status->s3_notification_id))
        	   <a href="{{route('studentNotification',$application_status->s3_notification_id)}}" class ="btn btn-primary btn-danger"style="font-size:33px;width:55%;" >Notification Student Three</a>
        	           	   	
        @endif
        </div>
        </div> 
        
      
        </div>
    </div>
@endsection