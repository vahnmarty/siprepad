@extends('layouts.frontend-layout')
@section('title', __('page_title.change_password_page_title'))
@section('content')
    <div class="home-wrap">
        <div class="form-outr">
            <div class="cmn-hdr">
                <h4>Change Password</h4>
                <p class="str">
                    Your new password must meet the following requirements:
                </p>
                <ul>
                    <li>At least 1 uppercase letter </li>
                    <li>At least 1 lowercase letter </li>
                    <li>At least 1 number </li>
                    <li>At least 1 special character (only use special characters that are on keys 1 to 0) </li>
                    <li>Must be between 8 – 16 characters long </li>
                    <li>Cannot be the same as the last 4 passwords </li>
                </ul>
            </div>
            <div class="form-wrap m-form-wrap">
                <form action="{{ route('change-password.post') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="password" name="old_password" class="form-control" placeholder="Old Password">
                        @error('old_password')
                            <span class="error error_text">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" name="new_password" class="form-control" placeholder="New Password">
                        @error('new_password')
                            <span class="error error_text">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                        @error('confirm_password')
                            <span class="error error_text">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-btn text-center">
                        <input type="submit" value="Update" class="sub-btn">
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
