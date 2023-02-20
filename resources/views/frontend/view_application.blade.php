@extends('layouts.frontend-layout')
@section('title', __('page_title.home_page_title'))
@section('content')
	<div class="home-wrap">
    <div class="hme-inr">
    @if(App\Models\Payment::where('application_id', Auth::user()->id)->count() > App\Models\Payment::COUNT)
      <h3 class ="mb-4">Applications</h3>
      @else
      <h3 class ="mb-4">Application</h3>
    @endif
    @foreach($payment as $paymnt)
      <div class = "row mb-3">
          <div class ="col-md-8 mx-auto text-center">
          <a href="{{route('app-form',$application_id)}}" class ="btn btn-sm  btn-danger" style="font-size:33px;width:55%;" >{{$paymnt->student_name}}  </a>
          </div>
      </div>
    @endforeach
    </div>
  </div>
@endsection