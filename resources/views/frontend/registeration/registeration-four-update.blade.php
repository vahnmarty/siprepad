@extends('layouts.frontend-layout')
@push('css')
@endpush
@section('content')
<form action="{{route('emergencyContactUpdate',['id' => $emergencyContact->profile_id])}}" method="POST">
@csrf
@method('POST')
	<div class="home-wrap hme-wrp2">
		<div class="progress-outr"></div>
		<div class="form-outr">

			<div class="form-outr">
				<div class="cmn-hdr">

					<h4>Emergency Contact</h4>
				</div>

				<div class="school-wrap step__two">
					<div class="form-wrap">
						<div class="row">
							<div style="text-align: right" class="col-lg-4">
								<label>Emergency Contact Name (if pareints/guardians are
									unavailable):</label>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<input type="text" class="form-control"
										name='emergency_contact_name' value="{{$emergencyContact->emergency_contact_name}}"/>
									@error('emergency_contact_name')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>

						</div>
						<div class="row">
							<div style="text-align: right" class="col-lg-4">
								<label>Emergency Contact Relationship to Student:</label>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<select class="form-control" name='relation_to_student'>
										<option value="" selected disabled>-- Please Choose --</option>
										<option value="stepmother" {{ $emergencyContact->relation_to_student == 'stepmother' ? 'selected' : '' }}>Stepmother</option>
										<option value="stepfather"{{$emergencyContact->relation_to_student == 'stepfather' ? 'selected' : ''}}>Stepfather</option>
										<option value="siblings" {{$emergencyContact->relation_to_student == 'siblings' ? 'selected' : ''}}>Siblings</option>
										<option value="friends" {{$emergencyContact->relation_to_student == 'friends' ? 'selected' : ''}}>Friends</option>

									</select> @error('relation_to_student')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>

						</div>
						<div class="row">
							<div style="text-align: right" class="col-lg-4">
								<label>Emergency Contact Home Phone:</label>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<input type="number" class="form-control" name='home_phone' value="{{$emergencyContact->home_phone}}" />
									@error('home_phone')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>

						</div>
						<div class="row">
							<div style="text-align: right" class="col-lg-4">
								<label>Emergency Contact Mobile Phone:</label>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<input type="number" class="form-control"
										name='mobile_phone' value="{{$emergencyContact->mobile_phone}}" /> @error('mobile_phone')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>

						</div>
						<div class="row">
							<div style="text-align: right" class="col-lg-4">
								<label>Emergency Contact Work Phone:</label>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<input type="number" class="form-control" name='work_phone' value="{{$emergencyContact->work_phone}}" />
									@error('work_phone')
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
				<a href="{{route('healthInfoIndex',['id' => $emergencyContact->profile_id])}}" class="sub-btn">Previous</a>
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

