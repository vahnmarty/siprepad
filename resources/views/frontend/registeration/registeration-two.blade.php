@extends('layouts.frontend-layout')
@push('css')
@endpush
@section('content')
<form action="{{route('householdUpdate',['id' => $parentinfo->Profile_ID])}}" method="POST">
@csrf
	<div class="home-wrap hme-wrp2">
		<div class="progress-outr"></div>
		
			<div class="form-outr">


				<div class="school-wrap step__one">
					<div class="form-wrap">
						<div class="form-wrap">

							<div class="cmn-hdr">
								<h4 class="text-center" style="font-size: 25px">Household
									Information</h4>
							</div>
							<div class="row">
								<div class="col-lg-2"></div>
								<div class="col-lg-9">
									<div class="form-group">
										<label>Street</label> <input type="text" value="{{$addressinfo->Address_1}}" class="form-control"
											name='A1_street' /> @error('A1_street')
										<p class="text-danger">{{'The street field is required.'}}</p>
										@enderror
									</div>
								</div>
							</div>
							<div class="row">

								<div class="col-lg-2"></div>
								<div class="col-lg-9">
									<div class="form-group">
										<label>City</label> <input type="text" value="{{$addressinfo->City_1}}" class="form-control"
											name='A1_city' /> @error('A1_city')
										<p class="text-danger">{{'The city field is required.'}}</p>
										@enderror
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-2"></div>
								<div class="col-lg-9">
									<div class="form-group">
										<label>State</label> <input type="text" value="{{$addressinfo->State_1}}" class="form-control"
											name='A1_state' /> @error('A1_state')
										<p class="text-danger">{{'The state field is required.'}}</p>
										@enderror
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-2"></div>
								<div class="col-lg-9">
									<div class="form-group">
										<label>Zip Code</label> <input type="number"  value="{{$addressinfo->Zipcode_1}}"
											class="form-control" name='A1_zip_code' />
										@error('A1_zip_code')
										<p class="text-danger">{{'The zip code field is required.'}}</p>
										@enderror
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-2"></div>
								<div class="col-lg-9">
									<div class="form-group">
										<label>Home Phone</label> <input type="number"
											class="form-control" name='A1_home_phone'  value="{{$addressinfo->Address_Phone_1}}" />
										@error('A1_home_phone')
										<p class="text-danger">{{'The home phone should not be greater than 10 digits'}}</p>
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
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Relationship to Applicant</label> <select
												class="form-control" name='P1_relation_to_applicant'>
												<option selected disabled>-- Please Choose --</option>

												<option value="Father" {{$parentinfo->P1_Relationship == 'Father' ? 'selected' : '' }}>Father</option>
												<option value="Mother" {{$parentinfo->P1_Relationship == 'Mother' ? 'selected' : '' }}>Mother</option>
												<option value="Stepmother" {{$parentinfo->P1_Relationship == 'Stepmother' ? 'selected' : '' }}>Stepmother</option>
												<option value="Stepfather" {{$parentinfo->P1_Relationship == 'Stepfather' ? 'selected' : '' }}>Stepfather</option>
												<option value="Guardians" {{$parentinfo->P1_Relationship == 'Guardians' ? 'selected' : '' }}>Guardians</option>
											</select> @error('P1_relation_to_applicant')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Prefix</label> <select
												class="form-control" name='P1_prefix'>
												<option selected disabled>-- Please Choose --</option>

												<option value="Jr." {{$parentinfo->P1_Salutation == 'Jr.' ? 'selected' : '' }}>Jr.</option>
												<option value="Sr." {{$parentinfo->P1_Salutation == 'Sr.' ? 'selected' : '' }}>Sr.</option>
												<option value="Hon." {{$parentinfo->P1_Salutation == 'Hon.' ? 'selected' : '' }}>Hon.</option>
											</select> @error('P1_prefix')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">First Name</label> <input type="text"
												class="form-control" name='P1_parent_first_name' value="{{$parentinfo->P1_First_Name}}"/>
											@error('P1_parent_first_name')
											<p class="text-danger">{{'The first name field is required.'}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Middle Name</label> <input type="text"
												class="form-control" name='P1_parent_middle_name' value="{{$parentinfo->P1_Middle_Name}}"/>
											@error('P1_parent_middle_name')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Last Name</label> <input type="text" value="{{$parentinfo->P1_Last_Name}}"
												class="form-control" name='P1_parent_last_name' />
											@error('P1_parent_last_name')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Cell Phone</label> <input type="tel"
												class="form-control" name='P1_parent_cell_phone' value="{{$parentinfo->P1_Mobile_Phone}}" />
											@error('P1_parent_cell_phone')
											<p class="text-danger">{{'A valid cell phone number of 10 digits is required.'}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Email Address</label> <input type="email"
												class="form-control" name='P1_parent_email' value="{{$parentinfo->P1_Personal_Email}}" />
											@error('P1_parent_email')
											<p class="text-danger">{{'A valid email is required.'}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Employer</label> <input type="employer"
												class="form-control" name='P1_parent_employer' value="{{$parentinfo->P1_Employer}}" />
											@error('P1_parent_employer')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Position/Title</label> <input
												type="parent_position" class="form-control"
												name="P1_parent_position" value="{{$parentinfo->P1_Title}}" /> @error('P1_parent_position')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Work Phone</label> <input type="tel"
												class="form-control" name='p1_parent_work_phone' value="{{$parentinfo->P1_Work_Phone}}" />
											@error('p1_parent_work_phone')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">School/Colleges Attended</label>
											<textarea rows="25" cols="10" name="P1_parent_school">{{$parentinfo->P1_Schools}}</textarea>
											@error('P1_parent_schools')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
							</div>
							
							@if($parentinfo->P2_First_Name)
							
							<div class="cmn-hdr">
								<h4 class="text-center" style="font-size: 22px">Household 1 -
									Parent/Guardian 2</h4>
							</div>
							
							<div class="form-wrap">
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Relationship to Applicant</label> <select
												class="form-control" name='P2_relation_to_applicant'>
												<option selected disabled>-- Please Choose --</option>

												<option value="Father" {{$parentinfo->P2_Relationship == 'Father' ? 'selected' : '' }}>Father</option>
												<option value="Mother" {{$parentinfo->P2_Relationship == 'Mother' ? 'selected' : '' }}>Mother</option>
												<option value="Stepmother" {{$parentinfo->P2_Relationship == 'Stepmother' ? 'selected' : '' }}>Stepmother</option>
												<option value=Stepfather" {{$parentinfo->P2_Relationship == 'Stepfather' ? 'selected' : '' }}>Stepfather</option>
												<option value="Guardians" {{$parentinfo->P2_Relationship == 'Guardians' ? 'selected' : '' }}>Guardians</option>
											</select> @error('P2_relation_to_applicant')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Prefix</label> <select
												class="form-control" name='P2_prefix'>
												<option selected disabled>-- Please Choose --</option>

												<option value="Jr." {{$parentinfo->P2_Salutation == 'Jr.' ? 'selected' : '' }}>Jr.</option>
												<option value="Sr." {{$parentinfo->P2_Salutation == 'Sr.' ? 'selected' : '' }}>Sr.</option>
												<option value="Hon." {{$parentinfo->P2_Salutation == 'Hon.' ? 'selected' : '' }}>Hon.</option>
											</select> @error('P2_prefix')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">First Name</label> <input type="text"
												class="form-control" name='P2_parent_first_name' value="{{$parentinfo->P2_First_Name}}"/>
											@error('P2_parent_first_name')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Middle Name</label> <input type="text"
												class="form-control" name='P2_parent_middle_name' value="{{$parentinfo->P2_Middle_Name}}"/>
											@error('P2_parent_middle_name')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Last Name</label> <input type="text" value="{{$parentinfo->P2_Last_Name}}"
												class="form-control" name='P2_parent_last_name' />
											@error('P2_parent_last_name')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Cell Phone</label> <input type="tel"
												class="form-control" name='P2_parent_cell_phone' value="{{$parentinfo->P2_Mobile_Phone}}" />
											@error('P2_parent_cell_phone')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Email Address</label> <input type="email"
												class="form-control" name='P2_parent_email' value="{{$parentinfo->P2_Personal_Email}}" />
											@error('P2_parent_email')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Employer</label> <input type="employer"
												class="form-control" name='P2_parent_employer' value="{{$parentinfo->P2_Employer}}" />
											@error('P1_parent_employer')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Position/Title</label> <input
												type="parent_position" class="form-control"
												name="P2_parent_position" value="{{$parentinfo->P2_Title}}" /> @error('P2_parent_position')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Work Phone</label> <input type="tel"
												class="form-control" name='p2_parent_work_phone' value="{{$parentinfo->P2_Work_Phone}}" />
											@error('p2_parent_work_phone')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">School/Colleges Attended</label>
											<textarea rows="25" cols="10" name="P2_parent_school">{{$parentinfo->P2_Schools}}</textarea>
											@error('P2_parent_schools')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
							</div>
						@endif
						
						
							@if($parentinfo->P3_First_Name)
							
							<div class="cmn-hdr">
								<h4 class="text-center" style="font-size: 22px">Household 1 -
									Parent/Guardian 3</h4>
							</div>
							
							<div class="form-wrap">
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Relationship to Applicant</label> <select
												class="form-control" name='P3_relation_to_applicant'>
												<option selected disabled>-- Please Choose --</option>

												<option value="Father" {{$parentinfo->P3_Relationship == 'Father' ? 'selected' : '' }}>Father</option>
												<option value="Mother" {{$parentinfo->P3_Relationship == 'Mother' ? 'selected' : '' }}>Mother</option>
												<option value="Stepmother" {{$parentinfo->P3_Relationship == 'Stepmother' ? 'selected' : '' }}>Stepmother</option>
												<option value=Stepfather" {{$parentinfo->P3_Relationship == 'Stepfather' ? 'selected' : '' }}>Stepfather</option>
												<option value="Guardians" {{$parentinfo->P3_Relationship == 'Guardians' ? 'selected' : '' }}>Guardians</option>
											</select> @error('P3_relation_to_applicant')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Prefix</label> <select
												class="form-control" name='P3_prefix'>
												<option selected disabled>-- Please Choose --</option>

												<option value="Jr." {{$parentinfo->P3_Salutation == 'Jr.' ? 'selected' : '' }}>Jr.</option>
												<option value="Sr." {{$parentinfo->P3_Salutation == 'Sr.' ? 'selected' : '' }}>Sr.</option>
												<option value="Hon." {{$parentinfo->P3_Salutation == 'Hon.' ? 'selected' : '' }}>Hon.</option>
											</select> @error('P3_prefix')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">First Name</label> <input type="text"
												class="form-control" name='P3_parent_first_name' value="{{$parentinfo->P3_First_Name}}"/>
											@error('P3_parent_first_name')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Middle Name</label> <input type="text"
												class="form-control" name='P3_parent_middle_name' value="{{$parentinfo->P3_Middle_Name}}"/>
											@error('P3_parent_middle_name')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Last Name</label> <input type="text" value="{{$parentinfo->P3_Last_Name}}"
												class="form-control" name='P3_parent_last_name' />
											@error('P3_parent_last_name')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Cell Phone</label> <input type="tel"
												class="form-control" name='P3_parent_cell_phone' value="{{$parentinfo->P3_Mobile_Phone}}" />
											@error('P3_parent_cell_phone')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Email Address</label> <input type="email"
												class="form-control" name='P3_parent_email' value="{{$parentinfo->P3_Personal_Email}}" />
											@error('P3_parent_email')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Employer</label> <input type="employer"
												class="form-control" name='P3_parent_employer' value="{{$parentinfo->P3_Employer}}" />
											@error('P3_parent_employer')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Position/Title</label> <input
												type="parent_position" class="form-control"
												name="P3_parent_position" value="{{$parentinfo->P3_Title}}" /> @error('P3_parent_position')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">Work Phone</label> <input type="tel"
												class="form-control" name='p3_parent_work_phone' value="{{$parentinfo->P3_Work_Phone}}" />
											@error('p3_parent_work_phone')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-9">
										<div class="form-group">
											<label class="blck">School/Colleges Attended</label>
											<textarea rows="25" cols="10" name="P3_parent_school">{{$parentinfo->P3_Schools}}</textarea>
											@error('P3_parent_schools')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
							</div>
						@endif
						
						
						</div>
					</div>

				</div>
				  <div class="flx">
				<div class="form-btn text-end mt">
                <a href="{{route('registration.create')}}" class="sub-btn">Previous</a>
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

