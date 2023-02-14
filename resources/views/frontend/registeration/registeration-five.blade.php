@extends('layouts.frontend-layout')
@push('css')
@endpush
@section('content')
<form action="{{route('accomodationsSave')}}" method="POST">
	@csrf
	@method('POST')
	<div class="home-wrap hme-wrp2">
		<div class="progress-outr"></div>
		<div class="form-outr">

			<div class="form-outr">
				<div class="cmn-hdr">

					<h4>School-Based Accomodations</h4>
				</div>

				<div class="school-wrap step__two">
					<div class="form-wrap">
						<div class="row">
							<div class="col-lg-2"></div>
							<div class="col-lg-10">
								<div class="form-group">
									<label class="blck">Does the student receive formal academic
										accommodations at their current school (Learning Plan, IEP,
										504 Plan, Other)?</label>
										<div class="radio-wrapper">
									<input type="radio" id="yes" name="formal_accomodations_provided" value="{{App\Models\RegisterationSchoolAccomodation::ACCOMODATION_PROVIDED}}">
									<label class="blck" for="yes">Yes</label><br>


									<input type="radio" id="no" name="formal_accomodations_provided" value="{{App\Models\RegisterationSchoolAccomodation::ACCOMODATION_NOT_PROVIDED}}">

									<label class="blck" for="no">No</label>
										</div>
									@error('accomodations_provided')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-lg-2"></div>
							<div class="col-lg-10">
								<div class="form-group">
									<label class="blck">Does the student receive informal academic
										accommodations at their current school (e.g., extended time,
										preferred seating)?</label>
									<div class="radio-wrapper">
										<input type="radio" id="yes" name="informal_accomodations_provided" value="{{App\Models\RegisterationSchoolAccomodation::ACCOMODATION_PROVIDED}}">
										<label class="blck" for="yes">Yes</label><br>
										<input type="radio" id="no" name="informal_accomodations_provided" name="informal_accomodations_provided" value="{{App\Models\RegisterationSchoolAccomodation::ACCOMODATION_NOT_PROVIDED}}">

										<label class="blck" for="no">No</label>
									</div>
									@error('accomodations_provided')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>

						</div>

					</div>
				</div>
			</div>

		</div>
		<div class="flx">
			<div class="form-btn text-end mt">
				<a href="{{route('emergencyContactIndex',$id)}}" class="sub-btn">Previous</a>
			</div>
			<div class="form-btn text-end mt">
				<button type="submit" value="Next" class="sub-btn">Next/Save</button>
			</div>
		</div>
	</div>
</form>

@endsection
@push('js')
@endpush
