@extends('layouts.frontend-layout')
@section('title', __('page_title.home_page_title'))
@section('content')
<style>
	.loading {
		position: fixed;
		z-index: 999;
		height: 2em;
		width: 2em;
		overflow: show;
		margin: auto;
		top: 0;
		left: 0;
		bottom: 0;
		right: 0;
	}

	.loading:before {
		content: '';
		display: block;
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background: radial-gradient(rgba(20, 20, 20, .8), rgba(0, 0, 0, .8));

		background: -webkit-radial-gradient(rgba(20, 20, 20, .8), rgba(0, 0, 0, .8));
	}

	.loading:not(:required) {
		font: 0/0 a;
		color: transparent;
		text-shadow: none;
		background-color: transparent;
		border: 0;
	}

	.loading:not(:required):after {
		content: '';
		display: block;
		font-size: 10px;
		width: 1em;
		height: 1em;
		margin-top: -0.5em;
		-webkit-animation: spinner 150ms infinite linear;
		-moz-animation: spinner 150ms infinite linear;
		-ms-animation: spinner 150ms infinite linear;
		-o-animation: spinner 150ms infinite linear;
		animation: spinner 150ms infinite linear;
		border-radius: 0.5em;
		-webkit-box-shadow: rgba(255, 255, 255, 0.75) 1.5em 0 0 0, rgba(255, 255, 255, 0.75) 1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) 0 1.5em 0 0, rgba(255, 255, 255, 0.75) -1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) -1.5em 0 0 0, rgba(255, 255, 255, 0.75) -1.1em -1.1em 0 0, rgba(255, 255, 255, 0.75) 0 -1.5em 0 0, rgba(255, 255, 255, 0.75) 1.1em -1.1em 0 0;
		box-shadow: rgba(255, 255, 255, 0.75) 1.5em 0 0 0, rgba(255, 255, 255, 0.75) 1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) 0 1.5em 0 0, rgba(255, 255, 255, 0.75) -1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) -1.5em 0 0 0, rgba(255, 255, 255, 0.75) -1.1em -1.1em 0 0, rgba(255, 255, 255, 0.75) 0 -1.5em 0 0, rgba(255, 255, 255, 0.75) 1.1em -1.1em 0 0;
	}


	@-webkit-keyframes spinner {
		0% {
			-webkit-transform: rotate(0deg);
			-moz-transform: rotate(0deg);
			-ms-transform: rotate(0deg);
			-o-transform: rotate(0deg);
			transform: rotate(0deg);
		}

		100% {
			-webkit-transform: rotate(360deg);
			-moz-transform: rotate(360deg);
			-ms-transform: rotate(360deg);
			-o-transform: rotate(360deg);
			transform: rotate(360deg);
		}
	}

	@-moz-keyframes spinner {
		0% {
			-webkit-transform: rotate(0deg);
			-moz-transform: rotate(0deg);
			-ms-transform: rotate(0deg);
			-o-transform: rotate(0deg);
			transform: rotate(0deg);
		}

		100% {
			-webkit-transform: rotate(360deg);
			-moz-transform: rotate(360deg);
			-ms-transform: rotate(360deg);
			-o-transform: rotate(360deg);
			transform: rotate(360deg);
		}
	}

	@-o-keyframes spinner {
		0% {
			-webkit-transform: rotate(0deg);
			-moz-transform: rotate(0deg);
			-ms-transform: rotate(0deg);
			-o-transform: rotate(0deg);
			transform: rotate(0deg);
		}

		100% {
			-webkit-transform: rotate(360deg);
			-moz-transform: rotate(360deg);
			-ms-transform: rotate(360deg);
			-o-transform: rotate(360deg);
			transform: rotate(360deg);
		}
	}

	@keyframes spinner {
		0% {
			-webkit-transform: rotate(0deg);
			-moz-transform: rotate(0deg);
			-ms-transform: rotate(0deg);
			-o-transform: rotate(0deg);
			transform: rotate(0deg);
		}

		100% {
			-webkit-transform: rotate(360deg);
			-moz-transform: rotate(360deg);
			-ms-transform: rotate(360deg);
			-o-transform: rotate(360deg);
			transform: rotate(360deg);
		}
	}
</style>
<div class="home-wrap">
	<div class="hme-inr" id='ntf-detail'>
		<div class='ntf_image_logo'>
			<img src="{{ asset('frontend_assets/images/lg2.png') }}" alt="" />
		</div>
		<div class="loading" style="display: none;">Loading</div>

		<div class='ntf_candidate_detail'>
			<p class='ntf_student_name'>Candidate Name: {{$name}}</p>
			<p class='ntf_app_status'>Application Status:
				@switch($ntfDetail->notification_type)
				@case(1)
				Accepted
				@break
				@case(2)
				In Waiting List
				@break
				@case(3)
				Rejected
				@break
				@default
				No Status yet
				@endswitch
			</p>
		</div>
		<div class='application_message'>
			<p class='short_message'>{{ $ntfDetail->message; }}</p>
		</div>
		<div class='application_download'>
			<a href='{{url("/notification/pdfgenerator")}}/{{ $ntfDetail->id }}/{{ $studentDetail->Profile_ID }}' class="btn btn-sm btn-danger">Download</a>
		</div>

		@if($student_status == App\Models\Application::TYPE_ACCEPTED && $ntfDetail->notification_type == App\Models\Notification::NOTIFY_ACCEPTED)

		@if($candidate == 's1')

		@if($appStatus->s1_candidate_status == App\Models\Application::CANDIDATE_NOT_DEFINED || $appStatus->s1_candidate_status == App\Models\Application::CANDIDATE_READ)
		<div class='student_btns'>
			<!-- <a href="{{ url('/candidate/response') }}/{{ $appStatus->application_id }}/{{$candidate}}/{{App\Models\Application::CANDIDATE_ACCEPTED}}" class='btn btn_accept'>Accept</a> -->
			<a data-bs-toggle="modal" data-bs-target="#acceptModel" class='btn btn_accept btn-success mt-3 btn-sm'>Accept</a>
			<!-- <a href="{{ url('/candidate/response') }}/{{ $appStatus->application_id  }}/{{$candidate}}/{{App\Models\Application::CANDIDATE_REJECTED}}" class='btn btn_reject'>Reject</a> -->
			<a data-bs-toggle="modal" data-bs-target="#rejectModel" class='btn btn-sm btn-danger mt-3'>Reject</a>

		</div>
		@else
		<div class='get_response'>
			<p>Thankyou for your response. We have received your response.</p>
		</div>
		@endif
		@endif
		@if($candidate == 's2')

		@if($appStatus->s2_candidate_status == App\Models\Application::CANDIDATE_NOT_DEFINED || $appStatus->s2_candidate_status == App\Models\Application::CANDIDATE_READ)
		<div class='student_btns'>
			<!-- <a href="{{ url('/candidate/response') }}/{{ $appStatus->application_id }}/{{$candidate}}/{{App\Models\Application::CANDIDATE_ACCEPTED}}" class='btn btn_accept'>Accept</a> -->
			<a data-bs-toggle="modal" data-bs-target="#acceptModel" class='btn btn_accept btn-success mt-3 btn-sm'>Accept</a>

			<!-- <a href="{{ url('/candidate/response') }}/{{ $appStatus->application_id  }}/{{$candidate}}/{{App\Models\Application::CANDIDATE_REJECTED}}" class='btn btn_reject'>Reject</a> -->
			<a data-bs-toggle="modal" data-bs-target="#rejectModel" class='btn btn-sm btn-danger mt-3'>Reject</a>

		</div>
		@else
		<div class='get_response'>
			<p>Thankyou for your response. We have received your response.</p>
		</div>
		@endif
		@endif
		@if($candidate == 's3')

		@if($appStatus->s3_candidate_status == App\Models\Application::CANDIDATE_NOT_DEFINED || $appStatus->s3_candidate_status == App\Models\Application::CANDIDATE_READ)
		<div class='student_btns'>
			<!-- <a href="{{ url('/candidate/response') }}/{{ $appStatus->application_id }}/{{$candidate}}/{{App\Models\Application::CANDIDATE_ACCEPTED}}" class='btn btn-sm btn-success mt-3'>Accept</a> -->
			<a data-bs-toggle="modal" data-bs-target="#acceptModel" class='btn btn_accept btn-success mt-3 btn-sm'>Accept</a>
			<!-- <a href="{{ url('/candidate/response') }}/{{ $appStatus->application_id  }}/{{$candidate}}/{{App\Models\Application::CANDIDATE_REJECTED}}" class='btn btn-sm btn-danger mt-3'>Reject</a> -->
			<a data-bs-toggle="modal" data-bs-target="#rejectModel" class='btn btn-sm btn-danger mt-3'>Reject</a>
		</div>
		@else
		<div class='get_response'>
			<p>Thankyou for your response. We have received your response.</p>
		</div>
		@endif
		@endif
		@endif
		@if($student_accept_status == App\Models\Application::TYPE_ACCEPTED && $ntfDetail->student_profile == App\Models\Application::STUDENT_ONE && $appStatus->s1_application_status == App\Models\Application::TYPE_ACCEPTED)
		<a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class='btn btn-sm btn-danger mt-3'>Pay Registration Fee</a>
		@endif
		@if($student_accept_status == App\Models\Application::TYPE_ACCEPTED && $ntfDetail->student_profile == App\Models\Application::STUDENT_TWO && $appStatus->s2_application_status == App\Models\Application::TYPE_ACCEPTED)
		<a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class='btn btn-sm btn-danger mt-3'>Pay Registration Fee</a>
		@endif
		@if($student_accept_status == App\Models\Application::TYPE_ACCEPTED && $ntfDetail->student_profile == App\Models\Application::STUDENT_THREE && $appStatus->s3_application_status == App\Models\Application::TYPE_ACCEPTED)
		<a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class='btn btn-sm btn-danger mt-3'>Pay Registration Fee</a>

		@endif

		@if($student_accept_status =="payment_successful" && $ntfDetail->student_profile == App\Models\Application::STUDENT_ONE && $appStatus->s1_application_status == App\Models\Application::TYPE_ACCEPTED)
		<p class="mt-3">Payment has been received</p>
		@endif
		@if($student_accept_status =="payment_successful" && $ntfDetail->student_profile == App\Models\Application::STUDENT_TWO && $appStatus->s2_application_status == App\Models\Application::TYPE_ACCEPTED)
		<p class="mt-3">Payment has been received</p>
		@endif
		@if($student_accept_status =="payment_successful" && $ntfDetail->student_profile == App\Models\Application::STUDENT_THREE && $appStatus->s3_application_status == App\Models\Application::TYPE_ACCEPTED)
		<p class="mt-3">Payment has been received</p>
		@endif -->
		@if(!empty($student_accept_status))
		@if($student_accept_status == App\Models\Application::TYPE_ACCEPTED && $ntfDetail->student_profile == App\Models\Application::STUDENT_ONE && $appStatus->s1_application_status == App\Models\Application::TYPE_ACCEPTED)
		<a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class='btn btn-sm btn-danger mt-3'>Pay Registration Fee</a>
		@endif
		@if($student_accept_status == App\Models\Application::TYPE_ACCEPTED && $ntfDetail->student_profile == App\Models\Application::STUDENT_TWO && $appStatus->s2_application_status == App\Models\Application::TYPE_ACCEPTED)
		<a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class='btn btn-sm btn-danger mt-3'>Pay Registration Fee</a>
		@endif
		@if($student_accept_status == App\Models\Application::TYPE_ACCEPTED && $ntfDetail->student_profile == App\Models\Application::STUDENT_THREE && $appStatus->s3_application_status == App\Models\Application::TYPE_ACCEPTED)
		<a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class='btn btn-sm btn-danger mt-3'>Pay Registration Fee</a>
		@endif

		@if($student_accept_status =="payment_successful" && $ntfDetail->student_profile == App\Models\Application::STUDENT_ONE && $appStatus->s1_application_status == App\Models\Application::TYPE_ACCEPTED)
		<p class="mt-3">Payment has been received</p>
		@endif
		@if($student_accept_status =="payment_successful" && $ntfDetail->student_profile == App\Models\Application::STUDENT_TWO && $appStatus->s2_application_status == App\Models\Application::TYPE_ACCEPTED)
		<p class="mt-3">Payment has been received</p>
		@endif
		@if($student_accept_status =="payment_successful" && $ntfDetail->student_profile == App\Models\Application::STUDENT_THREE && $appStatus->s3_application_status == App\Models\Application::TYPE_ACCEPTED)
		<p class="mt-3">Payment has been received</p>
		@endif
		@endif
	</div>
</div>
<!-- Accept Modal -->
<div class="modal fade" id="acceptModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Accept Notification</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Are you sure?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
				<a href="{{ url('/candidate/response') }}/{{ $appStatus->application_id }}/{{$candidate}}/{{App\Models\Application::CANDIDATE_ACCEPTED}}" class='btn btn_accept'>Yes</a>
			</div>
		</div>
	</div>
</div>
<!-- Reject Modal -->

<div class="modal fade" id="rejectModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Reject Notification</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Are you sure?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
				<a href="{{ url('/candidate/response') }}/{{ $appStatus->application_id  }}/{{$candidate}}/{{App\Models\Application::CANDIDATE_REJECTED}}" class='btn btn_accept'>Yes</a>
			</div>
		</div>
	</div>
</div>
@if($student_accept_status == App\Models\Application::TYPE_ACCEPTED)

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header header-new">
				<h1>Payment Application Fee</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="payment-sec">
					<div class="form-wrap">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>First Name</label>
									<input type="text" class="form-control new-controll" name="first_name" />
									@error('first_name')
									<span class="error error_text">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Last Name</label>
									<input type="text" class="form-control new-controll" name="last_name" />
									@error('last_name')
									<span class="error error_text">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Email</label>
									<input type="text" class="form-control new-controll" name="email" />
									@error('email')
									<span class="error error_text">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="col-md-8">
								<div class="form-group">
									<label>Credit Card Number</label>
									{{-- <input type="text" class="form-control new-controll"
                                            onkeypress='return formats(this,event)'
                                            onkeyup="return numberValidation(event)" name="card_number" /> --}}

									<input type="text" class="form-control new-controll" onKeyPress="if(this.value.length==16) return false;" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" name="card_number" />
									@error('card_number')
									<span class="error error_text">{{ $message }}</span>
									@enderror
								</div>

							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>CVV</label>
									<input type="password" class="form-control new-controll" onKeyPress="if(this.value.length==4) return false;" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" name="card_cvv" />
									@error('card_cvv')
									<span class="error error_text">{{ $message }}</span>
									@enderror
								</div>
							</div>
							{{-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Card Holder Name</label>
                                        <input type="text" class="form-control new-controll"
                                            name="card_holder_name" />
                                        @error('card_holder_name')
                                            <span class="error error_text">{{ $message }}</span>
							@enderror
						</div>
					</div> --}}
					@php
					$months = [1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec'];
					@endphp
					<div class="col-md-6">
						<div class="form-group">
							<label>Expiration Month</label>
							<select class="form-control new-controll" name="card_exp_mm">
								<option value="">Choose Month</option>
								@foreach ($months as $k => $v)
								<option value="{{ $k }}" {{ old('card_exp_mm') == $k ? 'selected' : '' }}>
									{{ $v }}
								</option>
								@endforeach
							</select>
							@error('card_exp_mm')
							<span class="error error_text">{{ $message }}</span>
							@enderror

						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Expiration Year</label>
							<select class="form-control new-controll" name="card_exp_yy">
								<option value="">Choose Year</option>
								@for ($i = date('Y'); $i <= date('Y') + 15; $i++) <option value="{{ $i }}">{{ $i }}</option>
									@endfor
							</select>
							@error('card_exp_yy')
							<span class="error error_text">{{ $message }}</span>
							@enderror
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Billing Address</label>
							<input type="text" class="form-control new-controll" name="billing_address" />
							@error('billing_address')
							<span class="error error_text">{{ $message }}</span>
							@enderror
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Billing City</label>
							<input type="text" class="form-control new-controll" name="billing_city" />
							@error('billing_city')
							<span class="error error_text">{{ $message }}</span>
							@enderror
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Billing State</label>
							<input type="text" class="form-control new-controll" name="billing_state" />
							@error('billing_state')
							<span class="error error_text">{{ $message }}</span>
							@enderror
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Billing Zip Code</label>
							<input type="text" class="form-control new-controll" name="billing_zip_code" />
							@error('billing_zip_code')
							<span class="error error_text">{{ $message }}</span>
							@enderror
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="direct">
		<h5>&nbsp;&nbsp;NOTE:&nbsp;&nbsp;</h5>
		<p>
			Before you click on the Pay button, please make<BR>
			sure your information is correct.&nbsp;&nbsp;You will not<BR>
			be able to edit payment information after you<BR>
			click the Pay button because SI does not store<BR>
			your credit information.&nbsp;&nbsp;If you are not ready<BR>
			to make a payment, click on the Close button.<BR><BR>
		</p>
	</div>
	<div class="modal-footer">
		@if ($is_button_clicked??0)
		<div class="la-ball-elastic-dots payment">
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
		</div>
		@else
		<button class="payment" id="submitPayment" type="submit">PAY (Total

			${{ App\Models\Payment::PAYAMOUNT ?? 0}})</button>

		@endif

	</div>
</div>
</div>
</div>
<script>
	$(document).ready(function() {
		var host = "{{URL::to('/')}}";
		$('#submitPayment').on('click', function(e) {
			$('#staticBackdrop').modal('hide');
			$('.loading').show();
			var first_name = $('input[name=first_name]').val();
			var last_name = $('input[name=last_name]').val();
			var email = $('input[name=email]').val();
			var card_number = $('input[name=card_number]').val();
			var card_cvv = $('input[name=card_cvv]').val();
			var card_exp_mm = $('select[name=card_exp_mm]').val();
			var card_exp_yy = $('select[name=card_exp_yy]').val();
			var billing_address = $('input[name=billing_address]').val();
			var billing_city = $('input[name=billing_city]').val();
			var billing_state = $('input[name=billing_state]').val();
			var billing_zip_code = $('input[name=billing_zip_code]').val();

			if (first_name == "" || first_name == null) {
				alert("First name must be filled out");
				$('.loading').hide();
				return false;
			}
			if (last_name == "" || last_name == null) {
				alert("Last name must be filled out");
				$('.loading').hide();
				return false;
			}
			if (email == "" || email == null) {
				alert("Email must be filled out");
				$('.loading').hide();
				return false;
			}
			if (card_number == "" || card_number == null) {
				alert("Card number must be filled out");
				$('.loading').hide();
				return false;
			}
			if (card_cvv == "" || card_cvv == null) {
				alert("Card cvv must be filled out");
				$('.loading').hide();

				return false;
			}
			if (card_exp_mm == "" || card_exp_mm == null) {
				alert("Card exp mm must be filled out");
				$('.loading').hide();
				return false;
			}
			if (card_exp_yy == "" || card_exp_yy == null) {
				alert("Card exp yy must be filled out");
				$('.loading').hide();
				return false;
			}
			if (billing_address == "" || billing_address == null) {
				alert("Billing address must be filled out");
				$('.loading').hide();
				return false;
			}
			if (billing_city == "" || billing_city == null) {
				alert("Billing city must be filled out");
				$('.loading').hide();
				return false;
			}
			if (billing_state == "" || billing_state == null) {
				alert("Billing state must be filled out");
				$('.loading').hide();
				return false;
			}
			if (billing_zip_code == "" || billing_zip_code == null) {
				alert("Billing zip code must be filled out");
				$('.loading').hide();
				return false;
			}
			$.ajax({
				type: "POST",
				url: host + '/dopay/{{ $ntfDetail->id }}',
				data: {
					first_name: first_name,
					last_name: last_name,
					email: email,
					card_number: card_number,
					card_cvv: card_cvv,
					card_exp_mm: card_exp_mm,
					card_exp_yy: card_exp_yy,
					billing_address: billing_address,
					billing_city: billing_city,
					billing_state: billing_state,
					billing_zip_code: billing_zip_code,
					_token: '{{csrf_token()}}'
				},
				success: function(response) {
					$('.loading').hide();
					for (var i = 0; i < response.length; i++) {
						document.write(response[i]);
					}

				}

			})
		});

	});
</script>

@endif

@endsection