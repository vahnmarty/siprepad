@extends('layouts.frontend-layout')
@push('css')
@endpush
@section('content')
    @livewire('frontend.registeration.registeration-two')
@endsection
@push('js')
@endpush

<livewire:frontend.registeration.registeration-two :reg_id="$reg_id" />
