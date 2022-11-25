@extends('layouts.frontend-layout')
@section('title', __('page_title.admission_application_page_title'))
@push('css')
@endpush
@section('content')
    <livewire:frontend.application.application-six :getParentStatement="$getParentStatement" />
@endsection
@push('js')
@endpush
