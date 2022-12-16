@extends('layouts.frontend-layout')
@push('css')
@endpush
@section('content')
<livewire:frontend.registeration.registeration-two :reg_id="$reg_id" />
@endsection
@push('js')
@endpush

