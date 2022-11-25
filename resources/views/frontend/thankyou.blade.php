@extends('layouts.frontend-layout')
@section('title', __('page_title.thankyou_page_title'))
@section('content')
    <div class="home-wrap">
        <div class="hme-inr">
            <figure class="hm-fig">
                <img src="{{ asset('frontend_assets/images/mail.svg') }}" alt="" />
            </figure>
            <div class="thank-wrap">
                <h1>Thank <span>You</span></h1>
                <p>
                    Thank you for submitting your application to St. Ignatius
                    College Preparatory. If you have any questions regarding the
                    Admissions process, please visit our website at
                    <a target="_blank" href="https://www.siprep.org/admissions">https://www.siprep.org/admissions</a> or email us at
                    <a href="mailto:admissions@siprep.org">admissions@siprep.org.</a>
                </p>
                <div class="text-center">
                    <a href="/" class="back-to">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
@endsection
