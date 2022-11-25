@extends('layouts.frontend-layout')
@section('title', __('page_title.admission_application_page_title'))
@push('css')
@endpush
@section('content')
    @livewire('frontend.application.application-three', ['getParentInfo' => $getParentInfo])
@endsection
@push('js')
@endpush
