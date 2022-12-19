@extends('layouts.frontend-layout')
@push('css')
@endpush
@section('content')
@livewire('frontend.registeration.registeration-one', ['student_registeration' =>$registeration_student_info, 'studentinfo' =>$student_info]);
@endsection
@push('js')
@endpush
