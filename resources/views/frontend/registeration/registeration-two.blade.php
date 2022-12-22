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
				<div class="cmn-hdr">
					<h4>Student Information</h4>
				</div>

				<div class="school-wrap step__one">
					<div class="form-wrap">
						<div class="form-wrap">
							<div class="row">
								<div class="col-md-4"></div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Student Lives with </label><br> <label class="blck"><input
											type="radio" name="live_with" value="Father"
											id="Father"> Father</label><br> <label class="blck"><input
											type="radio" id="Mother" name="live_with"
											value="Mother">Mother</label><br> <label class="blck"><input
											type="radio" name="live_with" id="StepFather"
											value="StepFather">StepFather</label><br> <label class="blck"><input
											type="radio" name="live_with" value="StepMother"
											id="StepMother"> StepMother</label> <br> <label class="blck"><input
											type="radio" name="live_with" value="Guradians"
											id="Guradians"> Guardians</label> @error('live_with')
										<div class="text-danger">{{ $message }}</div>
										@enderror
									</div>
								</div>

							</div>

							<div class="cmn-hdr">
								<h4 class="text-center" style="font-size: 25px">Household
									Information</h4>
							</div>
							<div class="row">
								<div class="col-lg-3"></div>
								<div class="col-lg-9">
									<div class="form-group">
										<label>Street</label> <input type="text" class="form-control"
											name='street' /> @error('street')
										<p class="text-danger">{{$message}}</p>
										@enderror
									</div>
								</div>
							</div>
							<div class="row">

								<div class="col-lg-3"></div>
								<div class="col-lg-9">
									<div class="form-group">
										<label>City</label> <input type="text" class="form-control"
											name='city' /> @error('city')
										<p class="text-danger">{{$message}}</p>
										@enderror
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-3"></div>
								<div class="col-lg-9">
									<div class="form-group">
										<label>State</label> <input type="text" class="form-control"
											name='state' /> @error('state')
										<p class="text-danger">{{$message}}</p>
										@enderror
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-3"></div>
								<div class="col-lg-9">
									<div class="form-group">
										<label>Zip Code</label> <input type="number"
											class="form-control" name='zip_code' />
										@error('zip_code')
										<p class="text-danger">{{$message}}</p>
										@enderror
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-3"></div>
								<div class="col-lg-9">
									<div class="form-group">
										<label>Home Phone</label> <input type="tel"
											class="form-control" name='home_phone' />
										@error('home_phone')
										<p class="text-danger">{{$message}}</p>
										@enderror
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-3"></div>
								<div class="col-lg-9">
									<div class="form-group">
										<label>Primary Parent (for SI to contact first regarding
											school matters)</label> <select class="form-control"
											name='primary_parent'>
											<option value="">-- Please Choose --</option>

											<option value="father">Father</option>
											<option value="mother">Mother</option>
											<option value="stepmother">Stepmother</option>
											<option value="stepfather">Stepfather</option>
											<option value="guardians">Guardians</option>
										</select> @error('primary_parent')
										<p class="text-danger">{{$message}}</p>
										@enderror
									</div>
								</div>
							</div>

							<div class="cmn-hdr">
								<h4 class="text-center" style="font-size: 22px">Household 1 -
									Parent/Guardian 1</h4>
							</div>
							<div class="form-wrap">
								<div class="row">
									<div class="col-lg-3"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Relationship to Applicant</label> <select
												class="form-control" name='relation_to_applicant'>
												<option value="">-- Please Choose --</option>

												<option value="father">Father</option>
												<option value="mother">Mother</option>
												<option value="stepmother">Stepmother</option>
												<option value="stepfather">Stepfather</option>
												<option value="guardians">Guardians</option>
											</select> @error('relation_to_applicant')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-3"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">First Name</label> <input type="text"
												class="form-control" name='parent_first_name' />
											@error('parent_first_name')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-3"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Middle Name</label> <input type="text"
												class="form-control" name='parent_middle_name' />
											@error('parent_middle_name')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-3"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Last Name</label> <input type="text"
												class="form-control" name='parent_last_name' />
											@error('parent_last_name')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-3"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Cell Phone</label> <input type="tel"
												class="form-control" name='parent_cell_phone' />
											@error('cell_phone')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-3"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Email Address</label> <input type="email"
												class="form-control" name='parent_email' />
											@error('parent_email')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-3"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Employer</label> <input type="employer"
												class="form-control" name='parent_employer' />
											@error('parent_employer')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-3"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Position/Title</label> <input
												type="parent_position" class="form-control"
												name="parent_position" /> @error('parent_position')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-3"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Work Phone</label> <input type="tel"
												class="form-control" name='parent_work_phone' />
											@error('parent_work_phone')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-3"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">School/Colleges Attended</label>
											<textarea rows="25" cols="10" name="parent_school"></textarea>
											@error('parent_school')
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
                <a href="{{ route('registeration-application', ['step' => 'one']) }}" class="sub-btn">Previous</a>
            </div>
				<div class="form-btn text-end mt">
					<button type="submit" value="Next" class="sub-btn">Next/Save</button>
				</div>
</div>
</div>
			</div>

</form>

@endsection
@push('js')
@endpush

