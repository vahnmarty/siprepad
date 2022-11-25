@extends('layouts.frontend-layout')
@section('title', __('page_title.view_application_page_title'))
@push('css')
@endpush
@section('content')
    @livewire('frontend.application.view-application', ['application_id' => $application_id])
@endsection
@push('js')
    <script>
        //code..
    </script>
@endpush
