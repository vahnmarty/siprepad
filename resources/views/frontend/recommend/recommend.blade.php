@extends('layouts.frontend-layout')
@section('title', __('page_title.request_recommendation_page_title'))
@section('content')
    <div class="home-wrap">
        <div class="form-outr">
            <div class="cmn-hdr">
                <h4>Request Recommendation</h4>
                <p style="font-weight: 600;">
                    <B>DUE DATE:</B> St. Ignatius College Preparatory must receive all supplemental recommendations by the end of the
                    day on Thursday, December 15, 2022.<BR><BR>
                    <B>PLEASE NOTE:</B> Once you submit your Supplemental Recommendation request, we cannot cancel it. Please make sure you are entering the correct information for your recommender.
                </p>
            </div>
            <div class="form-wrap">
                <form action="{{ route('supplemental-recommendation-submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Recommender's Name:</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" />
                        @error('name')
                            <span class="error error_text">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Recommender's Email:</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}" />
                        @error('email')
                            <span class="error error_text">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Select Student:</label>
                        <select name="student" class="form-control {{ $errors->has('student') ? 'is-invalid' : '' }}">
                            <option value="">-- Please Choose --</option>
                            @foreach ($getAllStudent as $student)
                                @if (in_array($student, $recommendationStudent))
                                    <option value="{{ $student['Rec_Student'] }}" disabled>
                                        {{ ucwords($student['Rec_Student']) }}</option>
                                @else
                                    <option value="{{ $student['Rec_Student'] }}">{{ ucwords($student['Rec_Student']) }}
                                    </option>
                                @endif
                                {{-- <option value="{{ $student['Rec_Student'] }}">{{ ucwords($student['Rec_Student']) }}
                                </option> --}}
                            @endforeach
                        </select>
                        @error('student')
                            <span class="error error_text">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <label>Message to Recommender:</label>
                        <div data-maxcount="75">
                            <textarea name="message" id="recommendation_textarea" class="word_count">{{ old('message') }}</textarea>
                            @error('message')
                                <span class="error error_text">{{ $message }}</span>
                            @enderror
                            <p class="wrds">
                                (Max <span class="word_left" id="recommendation_counter">75 </span> words)
                            </p>

                        </div>
                    </div>

                    <div class="form-btn text-center">
                        <input type="submit" value="Send" class="sub-btn" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            console.log("ready!");
            let countwords = $.trim($('#recommendation_textarea').val()).split(' ')
                .filter(
                    function(v) {
                        return v !== ''
                    }
                ).length;
            document.getElementById("recommendation_counter").innerHTML = 75 -
                countwords;
        });
    </script>
@endpush
