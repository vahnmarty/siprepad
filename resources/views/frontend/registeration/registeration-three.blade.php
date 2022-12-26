@extends('layouts.frontend-layout')
@push('css')
@endpush
@section('content')
<form action="#" method="POST">
@csrf
@method('PUT')
	<div class="home-wrap hme-wrp2">
		<div class="progress-outr"></div>
		<div class="form-outr">

			<div class="form-outr">
				<div class="cmn-hdr">

					<h4>Health Information</h4>
				</div>

				<div class="school-wrap step__two">
					<div class="form-wrap">
						<div class="row">
							<div style="text-align: right" class="col-lg-4">
								<label>Medical Insurance Company</label>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<input type="text" class="form-control"
										name='medical_insurance_company' />
									@error('medical_insurance_company')
									<p class="text-danger">{{$message}}</p>
									@enderror @error('live_with')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>

						</div>
						<div class="row">
							<div style="text-align: right" class="col-lg-4">
								<label>Medical Policy Number</label>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<input type="number" class="form-control"
										name='medical_policy_number' />
									@error('medical_policy_number')
									<p class="text-danger">{{$message}}</p>
									@enderror @error('live_with')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>

						</div>

						<div class="row">
							<div style="text-align: right" class="col-lg-4">
								<label>Physician's Name</label>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<input type="text" class="form-control"
										name='physician_name' /> @error('physician_name')
									<p class="text-danger">{{$message}}</p>
									@enderror @error('live_with')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>

						</div>
						<div class="row">
							<div style="text-align: right" class="col-lg-4">
								<label>Physician's Phone</label>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<input type="text" class="form-control"
										name='physician_phone' /> @error('physician_phone')
									<p class="text-danger">{{$message}}</p>
									@enderror @error('live_with')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>
							

						</div>
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-lg-6">
								<label>Prescribed Medications, Time and Dosages (If not
									applicable , type "none"):</label>
								<div class="form-group">
									<textarea rows="8" cols="10" maxlength="1000"
										name='prescribed_medication'>
                                      </textarea>
									@error('prescribed_medication')
									<p class="text-danger">{{$message}}</p>
									@enderror @error('live_with')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-lg-6">
								<label>Allergies (Drug ,Food , etc.) and other Dietry
									Restrictions (If not applicable , type "none"): </label>
								<div class="form-group">
									<textarea rows="8" cols="10" maxlength="1000"
										name='allergies'>
                                      </textarea>
									@error('allergies')
									<p class="text-danger">{{$message}}</p>
									@enderror @error('live_with')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-lg-6">
								<label>Please list anything that you would like to share with us
									regarding your child's physical or mental health that we should
									know about in order to best support your child. (If not
									applicable, type "none"):</label>
								<div class="form-group">
									<textarea rows="8" cols="10" maxlength="1000"
										name='child_condition'>
                                      </textarea>
									@error('child_condition')
									<p class="text-danger">{{$message}}</p>
									@enderror @error('live_with')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="form-btn text-end mt">
			<button type="submit" value="Next" class="sub-btn">Next/Save</button>
		</div>
	</div>
</form>

@endsection
@push('js')
@endpush

