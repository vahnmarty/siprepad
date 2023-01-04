@extends('layouts.frontend-layout')
@section('title', __('page_title.home_page_title'))
@section('content')

<div class="home-wrap">
	<div class="hme-inr" id='ntf-detail'>
		<div class='ntf_image_logo'>
			<img src="{{ asset('frontend_assets/images/lg2.png') }}" alt="" />
		</div>

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
			<p>Thankyou for your response. We have recieved your response.</p>
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
			<p>Thankyou for your response. We have recieved your response.</p>
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
			<p>Thankyou for your response. We have recieved your response.</p>
		</div>
		@endif
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
									<input type="text" class="form-control new-controll" wire:model.defer="first_name" />
									@error('first_name')
									<span class="error error_text">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Last Name</label>
									<input type="text" class="form-control new-controll" wire:model.defer="last_name" />
									@error('last_name')
									<span class="error error_text">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Email</label>
									<input type="text" class="form-control new-controll" wire:model.defer="email" />
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
                                            onkeyup="return numberValidation(event)" wire:model.defer="card_number" /> --}}

									<input type="text" class="form-control new-controll" onKeyPress="if(this.value.length==16) return false;" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" wire:model.defer="card_number" />
									@error('card_number')
									<span class="error error_text">{{ $message }}</span>
									@enderror
								</div>

							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>CVV</label>
									<input type="password" class="form-control new-controll" onKeyPress="if(this.value.length==4) return false;" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" wire:model.defer="card_cvv" />
									@error('card_cvv')
									<span class="error error_text">{{ $message }}</span>
									@enderror
								</div>
							</div>
							{{-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Card Holder Name</label>
                                        <input type="text" class="form-control new-controll"
                                            wire:model.defer="card_holder_name" />
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
							<select class="form-control new-controll" wire:model.defer="card_exp_mm">
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
							<select class="form-control new-controll" wire:model.defer="card_exp_yy">
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
							<input type="text" class="form-control new-controll" wire:model.defer="billing_address" />
							@error('billing_address')
							<span class="error error_text">{{ $message }}</span>
							@enderror
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Billing City</label>
							<input type="text" class="form-control new-controll" wire:model.defer="billing_city" />
							@error('billing_city')
							<span class="error error_text">{{ $message }}</span>
							@enderror
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Billing State</label>
							<input type="text" class="form-control new-controll" wire:model.defer="billing_state" />
							@error('billing_state')
							<span class="error error_text">{{ $message }}</span>
							@enderror
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Billing Zip Code</label>
							<input type="text" class="form-control new-controll" wire:model.defer="billing_zip_code" />
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
		<button class="payment" type="submit" wire:click='payApplicationFees()'>PAY (Total
			${{ $pay_amount ?? 0}})</button>
		@endif

	</div>
 </div>
</div>
</div>
<script>
	$(document).ready(function() {
		$('#staticBackdrop').modal('show');

	});
</script>

@endif

@endsection