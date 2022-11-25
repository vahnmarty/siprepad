@extends('layouts.frontend-layout')
@section('content')
    <div class="home-wrap">
        <div class="form-outr">
            <div class="cmn-hdr">
                <h4>Write a Recommendation</h4>
            </div>
            <div class="frm-uppr">
                <ul>
                    <li>
                        <a href="#">
                            <span>
                                <img src="{{ asset('frontend_assets/images/u1.svg') }}" alt="">
                            </span> {{ ucwords($getRecommendation->Rec_Name) }}
                        </a>
                    </li>
                    <li>
                        <a href="mailto:{{ $getRecommendation->Rec_Email }}">
                            <span>
                                <img src="{{ asset('frontend_assets/images/u2.svg') }}" alt="">
                            </span>{{ $getRecommendation->Rec_Email }}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="form-wrap m-form-wrap">
                <form action="{{ route('written-recommendation-submit') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $getRecommendation->id }}" name="id" id="">
                    <div class="form-group">
                        <label> Relationship to Student:</label>
                        <input type="text" name="relationStudent" class="form-control" />
                        @error('relationStudent')
                            <span class="error error_text">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Years Known Student:</label>
                        <input type="number" name="yearStudent" class="form-control" />
                        @error('yearStudent')
                            <span class="error error_text">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-5">
                        <label>Recommendation:</label>
                        <div data-maxcount="150">
                            <textarea name="recommen" class="word_count"></textarea>
                            <p class="wrds">
                                (Max <span class="word_left">150 </span> words)
                            </p>
                            @error('recommen')
                                <span class="error error_text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-btn text-center">
                        <input type="submit" value="Submit" class="sub-btn" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
