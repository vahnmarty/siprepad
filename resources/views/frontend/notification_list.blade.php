@extends('layouts.frontend-layout')
@section('title', __('page_title.home_page_title'))
@section('content')
	<div class="home-wrap">
        <div class="hme-inr">
       @if($notification_list > App\Models\Notification::NOTIFY_LENGTH)
        	<h3 class ="mb-4">Notifications</h3>
          @else
          <h3 class ="mb-4">Notification</h3>
        @endif
        <div class = "row mb-3">
        
          <div class ="col-md-8 mx-auto text-center">

          
          @if(!empty($application_status->s1_notification_id))
        	   <a href="{{route('studentNotification',$application_status->s1_notification_id)}}" class ="btn btn-sm  btn-danger" style="font-size:33px;width:55%;" >{{ucfirst($studentinfo->S1_First_Name) .' '. ucfirst($studentinfo->S1_Last_Name)}}  </a>

        	   @endif
        </div>
        </div>
            <div class = "row  mb-3">
        
          <div class ="col-md-8 mx-auto text-center">
        	@if(!empty($application_status->s2_notification_id)) 

        	  <a href="{{route('studentNotification',$application_status->s2_notification_id)}}" class ="btn btn-sm  btn-danger"style="font-size:33px;width:55%;" >{{ucfirst($studentinfo->S2_First_Name) .' '.ucfirst($studentinfo->S2_Last_Name)}} </a>

        	  @endif
        </div>
        </div>
              <div class = "row  mb-3">
        
          <div class ="col-md-8 mx-auto text-center">
       @if(!empty($application_status->s3_notification_id))

        	   <a href="{{route('studentNotification',$application_status->s3_notification_id)}}" class ="btn btn-sm btn-danger"style="font-size:33px;width:55%;" >{{ucfirst($studentinfo->S3_First_Name) .' '. ucfirst($studentinfo->S3_Last_Name)}} </a>

        @endif
        </div>
        </div> 
        
      
        </div>
    </div>
@endsection