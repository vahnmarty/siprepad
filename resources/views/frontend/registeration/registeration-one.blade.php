@extends('layouts.frontend-layout') @push('css') @endpush
@section('content')
<form action="{{route('registration.update',$studentinfo->id)}}" method="POST">
	@csrf
	@method('PUT')
	@if($getApplicationStatus)
	@php
	foreach ($getStudentPayment as $key => $StudentApplicationStatusResult) {
	$StudentApplicationStatusResults[$StudentApplicationStatusResult['student']] = $StudentApplicationStatusResult['student'];
	}
	@endphp
	@if($getApplicationStatus->s1_application_status==App\Models\Application::CANDIDATE_ACCEPTED && $getApplicationStatus->s1_candidate_status==App\Models\Application::CANDIDATE_ACCEPTED)
	@if(array_key_exists(App\Models\Application::STUDENT_S1,$StudentApplicationStatusResults))
	@if($StudentApplicationStatusResults[App\Models\Application::STUDENT_S1]==App\Models\Application::STUDENT_S1)
	<?php $studentProfileOne = App\Models\Application::STUDENT_ONE; ?>
	@else
	<?php $studentProfileOne = ''; ?>
	@endif
	@else
	<?php $studentProfileOne = ''; ?>
	@endif


	@elseif($getApplicationStatus->s1_application_status==App\Models\Application::ACCEPTANCE_FINANCIAL_AID && $getApplicationStatus->s1_candidate_status==App\Models\Application::CANDIDATE_ACCEPTED)
	@if(array_key_exists(App\Models\Application::STUDENT_S1,$StudentApplicationStatusResults))
	@if($StudentApplicationStatusResults[App\Models\Application::STUDENT_S1]==App\Models\Application::STUDENT_S1)
	<?php $studentProfileOne = App\Models\Application::STUDENT_ONE; ?>
	@else
	<?php $studentProfileOne = ''; ?>
	@endif
	@else
	<?php $studentProfileOne = ''; ?>
	@endif
	@else
	<?php $studentProfileOne = ''; ?>
	@endif







	@if($getApplicationStatus->s2_application_status==App\Models\Application::CANDIDATE_ACCEPTED && $getApplicationStatus->s2_candidate_status==App\Models\Application::CANDIDATE_ACCEPTED)
	@if(array_key_exists(App\Models\Application::STUDENT_S2,$StudentApplicationStatusResults))
	@if($StudentApplicationStatusResults[App\Models\Application::STUDENT_S2]==App\Models\Application::STUDENT_S2)
	<?php $studentProfileTwo = App\Models\Application::STUDENT_TWO; ?>
	@else
	<?php $studentProfileTwo = ''; ?>
	@endif
	@else
	<?php $studentProfileTwo = ''; ?>
	@endif
	@elseif($getApplicationStatus->s2_application_status==App\Models\Application::ACCEPTANCE_FINANCIAL_AID && $getApplicationStatus->s2_candidate_status==App\Models\Application::CANDIDATE_ACCEPTED)
	@if(array_key_exists(App\Models\Application::STUDENT_S2,$StudentApplicationStatusResults))
	@if($StudentApplicationStatusResults[App\Models\Application::STUDENT_S2]==App\Models\Application::STUDENT_S2)
	<?php $studentProfileTwo = App\Models\Application::STUDENT_TWO; ?>
	@else
	<?php $studentProfileTwo = ''; ?>
	@endif
	@else
	<?php $studentProfileTwo = ''; ?>
	@endif
	
	
	@else
	<?php $studentProfileTwo = ''; ?>
	@endif
	@if($getApplicationStatus->s3_application_status==App\Models\Application::CANDIDATE_ACCEPTED && $getApplicationStatus->s3_candidate_status==App\Models\Application::CANDIDATE_ACCEPTED)
	
	@if(array_key_exists(App\Models\Application::STUDENT_S3,$StudentApplicationStatusResults))
	@if($StudentApplicationStatusResults[App\Models\Application::STUDENT_S3]==App\Models\Application::STUDENT_S3)
	<?php $studentProfileThree = App\Models\Application::STUDENT_THREE; ?>
	@else
	<?php $studentProfileThree = ''; ?>
	@endif
	@else
	<?php $studentProfileThree = ''; ?>
	@endif
	@elseif($getApplicationStatus->s3_application_status==App\Models\Application::ACCEPTANCE_FINANCIAL_AID && $getApplicationStatus->s3_candidate_status==App\Models\Application::CANDIDATE_ACCEPTED)


	
	@if(array_key_exists(App\Models\Application::STUDENT_S3,$StudentApplicationStatusResults))
	@if($StudentApplicationStatusResults[App\Models\Application::STUDENT_S3]==App\Models\Application::STUDENT_S3)
	<?php $studentProfileThree = App\Models\Application::STUDENT_THREE; ?>
	@else
	<?php $studentProfileThree = ''; ?>
	@endif
	@else
	<?php $studentProfileThree = ''; ?>
	@endif
	@else
	<?php $studentProfileThree = ''; ?>
	@endif
	@endif
	<div class="home-wrap hme-wrp2">
		<div class="form-outr">

			<div class="form-outr">
				<div class="cmn-hdr">
					<h4>Student Info</h4>

				</div>
				<div class="school-wrap step__one">
					<div class="form-wrap">
						@if($studentProfileOne == App\Models\Application::STUDENT_ONE)

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label> Legal First Name </label> <input type="text" class="form-control" name='S1_first_name' value="{{$studentinfo->S1_First_Name}}" />
									@error('S1_first_name')<p class="text-danger">{{'First name is required'}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="blck">Legal Middle Name </label> <input type="text" class="form-control" name='S1_middle_name' value="{{$studentinfo->S1_Middle_Name}}" /> @error('S1_middle_name')
									<p class="text-danger">{{'Enter a valid middle name'}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Legal Last Name </label> <input type="text" class="form-control" name='S1_last_name' value="{{$studentinfo->S1_Last_Name }}" /> @error('S1_last_name')
									<p class="text-danger">{{'Last name is required'}}</p>
									@enderror
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="blck">Preffered First Name </label> <input type="text" class="form-control" name='S1_preffered_first_name' value="{{$studentinfo->S1_Preferred_First_Name}}" />
									@error('preffered_first_name')
									<p class="text-danger">{{'Enter a valid preferred name'}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Date of Birth </label> <input type="date" class="form-control" name='S1_date_of_birth' value="{{$studentinfo->S1_Birthdate}}" name="date_of_birth" />
									@error('S1_date_of_birth')
									<p class="text-danger">{{'A valid D.O.B is required before today'}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Gender </label>
									<select class="form-control" name='S1_gender'>
										<option selected disabled value="">Choose One</option>

										<option value="male" {{ $studentinfo->S1_Gender == 'Male' ? 'selected' : '' }}>Male</option>
										<option value="female" {{$studentinfo->S1_Gender == 'Female' ? 'selected' : '' }}>Female</option>

									</select> @error('S1_gender')
									<p class="text-danger">{{'Gender is required'}}</p>
									@enderror
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Student's Mobile Phone Number </label> <input type="tel" class="form-control" name='S1_student_phone_number' value="{{$studentinfo->S1_Mobile_Phone }}" />
									@error('S1_student_phone_number')
									<p class="text-danger">{{'Enter a valid mobile number'}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>T-Shirt Size(Adult/Unisex) </label>
									<select class="form-control" name='S1_tshirt_size'>
										<option selected disabled value="">Choose One</option>
										<option value="small" {{ $studentinfo->s1_tshirt_size == 'small' ? 'selected' : '' }}>Small</option>
										<option value="medium" {{ $studentinfo->s1_tshirt_size == 'medium' ? 'selected' : '' }}>Medium</option>
										<option value="large" {{ $studentinfo->s1_tshirt_size == 'large' ? 'selected' : '' }}>Large</option>
									</select> @error('S1_tshirt_size')
									<p class="text-danger">{{'Please select a T-shirt size'}}</p>
									@enderror
								</div>
							</div>

						</div>

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="blck">Religion </label>
									<select class="form-control" name='S1_religion' value="">
										<option selected disabled value="">Choose One</option>
										<option value="hindu" {{$studentinfo->s1_religion == 'hindu' ? 'selected' : '' }}>Hindu</option>
										<option value="christian" {{$studentinfo->s1_religion == 'christian' ? 'selected' : '' }}>Christian</option>
										<option value="none" {{$studentinfo->s1_religion == 'none' ? 'selected' : '' }}>None</option>

									</select> @error('S1_religion')
									<p class="text-danger">{{'Please select a valid religion'}}</p>
									@enderror
								</div>
							</div>


						</div>
						<div class="multiracial mb-3">
							<span>How do you identify racially ? If more than one select separate
								races with a comma. Example: White, Black , Race x,
								Race y, Race z"<br>

							</span>
						</div>

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<input type="text" class="form-control" name='S1_racial' value="{{$studentinfo->S1_Race }}" /> @error('S1_racial')
									<p class="text-danger">{{'Please select a valid race'}}</p>
									@enderror

								</div>

							</div>

						</div>

						<!-- 						<div class="form-group"> -->
						<!-- 							<label class="blck"><input type="checkbox" name="racial" -->
						<!-- 								value="Asian"{{ $studentinfo->S1_Race == 'Asian' ? 'checked' : '' }}>Asian</label><br> <label class="blck"><input -->
						<!-- 								type="checkbox" name="racial" value="Black/African American"{{ $studentinfo->S1_Race == 'Black/African American' ? 'checked' : '' }}> -->
						<!-- 								Black/African American</label><br> <label class="blck"><input -->
						<!-- 								type="checkbox" name="racial" value="Native American/Indegenous"{{ $studentinfo->S1_Race == 'Native American/Indegenous' ? 'checked' : '' }}> -->
						<!-- 								Native American/Indegenous</label><br> <label class="blck"><input -->
						<!-- 								type="checkbox" name="racial" value="White"{{ $studentinfo->S1_Race == 'White' ? 'checked' : '' }}> White</label> <br> -->
						<!-- 							<label class="blck"><input type="checkbox" name="racial" -->
						<!-- 								value="Multiracial"{{ $studentinfo->S1_Race == 'Multiracial' ? 'checked' : '' }}> Multiracial</label> @error('racial') -->
						<!-- 							<p class="text-danger">{{$message}}</p> -->
						<!-- 							@enderror -->
						<!-- 						</div> -->

						<div class="ethinicity ">
							<span>What is your ethinicity ? If more than one select separate
								ethnicities with a comma. Example: Filipino , Hawaiian , Irish ,
								Italian , Middle Eastern , Salvadorian" </span>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<input type="text" class="form-control" name='S1_ethnicity' value="{{$studentinfo->S1_Ethnicity }}" /> @error('S1_ethnicity')
									<p class="text-danger">{{'Please select a valid ethnicity'}}</p>
									@enderror

								</div>

							</div>

						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="blck">Current School </label>
									<select class="form-control" name='S1_current_school' value="">
										<option selected disabled value="">Choose One</option>
										<option value="school_one" {{ $studentinfo->S1_Current_School == 'school_one' ? 'selected' : ''}}>School one</option>
										<option value="school_two" {{ $studentinfo->S1_Current_School == 'school_two' ? 'selected' : ''}}>School two</option>
										<option value="school_three" {{ $studentinfo->S1_Current_School == 'school_three' ? 'selected' : ''}}>School three</option>

									</select> @error('S1_current_school')
									<p class="text-danger">{{'Please select a valid school'}}</p>
									@enderror

								</div>
							</div>
						</div>
						@endif
						@if($studentProfileTwo == App\Models\Application::STUDENT_TWO)


						@if(!empty($studentinfo->S2_First_Name))
						<div class=student-2>

							<div class="row">
								<div class="col-md-4">
									<h4>Student 2</h4>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label> Legal First Name </label> <input type="text" class="form-control" name='S2_first_name' value="{{$studentinfo->S2_First_Name}}" />
										@error('S2_first_name')
										<p class="text-danger">{{'First name is required'}}</p>
										@enderror

									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="blck">Legal Middle Name </label> <input type="text" class="form-control" name='S2_middle_name' value="{{$studentinfo->S2_Middle_Name}}" /> @error('S2_middle_name')
										<p class="text-danger">{{'Enter a valid middle name'}}</p>
										@enderror
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Legal Last Name </label> <input type="text" class="form-control" name='S2_last_name' value="{{$studentinfo->S2_Last_Name }}" /> @error('S2_last_name')
										<p class="text-danger">{{'Last name is required'}}</p>
										@enderror
									</div>
								</div>

							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="blck">Preffered First Name </label> <input type="text" class="form-control" name='S2_preffered_first_name' value="{{$studentinfo->S2_Preferred_First_Name}}" />
										@error('S2_preffered_first_name')
										<p class="text-danger">{{'Enter a valid preferred name'}}</p>
										@enderror
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Date of Birth </label> <input type="date" class="form-control" value="{{$studentinfo->S2_Birthdate}}" name="S2_date_of_birth" />
										@error('S2_date_of_birth')
										<p class="text-danger">{{'A valid D.O.B is required before today'}}</p>
										@enderror
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Gender </label>
										<select class="form-control" name='S2_gender'>
											<option selected disabled>Choose One</option>
											<option value="male" {{ $studentinfo->S2_Gender == 'Male' ? 'selected' : '' }}>Male</option>
											<option value="female" {{$studentinfo->S2_Gender == 'Female' ? 'selected' : '' }}>Female</option>

										</select> @error('S2_gender')
										<p class="text-danger">{{'Gender is required'}}</p>
										@enderror
									</div>
								</div>

							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Student's Mobile Phone Number </label>
										<input type="tel" class="form-control" name='S2_student_phone_number' value="{{$studentinfo->S2_Mobile_Phone }}" />
										@error('S2_student_phone_number')
										<p class="text-danger">{{'Enter a valid mobile number'}}</p>
										@enderror
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>T-Shirt Size(Adult/Unisex) </label>
										<select class="form-control" name='S2_tshirt_size'>
											<option selected disabled>Choose One</option>
											<option value="small" {{ $studentinfo->s2_tshirt_size == 'small' ? 'selected' : '' }}>Small</option>
											<option value="medium" {{ $studentinfo->s2_tshirt_size == 'medium' ? 'selected' : '' }}>Medium</option>
											<option value="large" {{ $studentinfo->s2_tshirt_size == 'large' ? 'selected' : '' }}>Large</option>
										</select> @error('S2_tshirt_size')
										<p class="text-danger">{{'Please select a T-shirt size'}}</p>
										@enderror
									</div>
								</div>

							</div>

							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="blck">Religion </label><select class="form-control" name='S2_religion' value="">
											<option selected disabled>Choose One</option>
											<option value="hindu" {{$studentinfo->s2_religion == 'hindu' ? 'selected' : '' }}>Hindu</option>
											<option value="christian" {{$studentinfo->s2_religion == 'christian' ? 'selected' : '' }}>Christian</option>
											<option value="none" {{$studentinfo->s2_religion == 'none' ? 'selected' : '' }}>None</option>

										</select> @error('S2_religion')
										<p class="text-danger">{{'Please select a valid religion'}}</p>
										@enderror
									</div>
								</div>


							</div>
							<div class="multiracial mb-3">
								<span>How do you identify racially ? If more than one select separate
									races with a comma. Example: White, Black , Race x,
									Race y, Race z"<br>

								</span>
							</div>

							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<input type="text" class="form-control" name='S2_racial' value="{{$studentinfo->S2_Race }}" /> @error('S2_racial')
										<p class="text-danger">{{'Please select a valid race'}}</p>
										@enderror

									</div>

								</div>

							</div>

							<!-- 						<div class="form-group"> -->
							<!-- 							<label class="blck"><input type="checkbox" name="racial" -->
							<!-- 								value="Asian"{{ $studentinfo->S2_Race == 'Asian' ? 'checked' : '' }}>Asian</label><br> <label class="blck"><input -->
							<!-- 								type="checkbox" name="racial" value="Black/African American"{{ $studentinfo->S2_Race == 'Black/African American' ? 'checked' : '' }}> -->
							<!-- 								Black/African American</label><br> <label class="blck"><input -->
							<!-- 								type="checkbox" name="racial" value="Native American/Indegenous"{{ $studentinfo->S2_Race == 'Native American/Indegenous' ? 'checked' : '' }}> -->
							<!-- 								Native American/Indegenous</label><br> <label class="blck"><input -->
							<!-- 								type="checkbox" name="racial" value="White"{{ $studentinfo->S2_Race == 'White' ? 'checked' : '' }}> White</label> <br> -->
							<!-- 							<label class="blck"><input type="checkbox" name="racial" -->
							<!-- 								value="Multiracial"{{ $studentinfo->S2_Race == 'Multiracial' ? 'checked' : '' }}> Multiracial</label> @error('racial') -->
							<!-- 							<p class="text-danger">{{$message}}</p> -->
							<!-- 							@enderror -->
							<!-- 						</div> -->

							<div class="ethinicity ">
								<span>What is your ethinicity ? If more than one separate
									ethnicities with a comma. Example: Filipino , Hawaiian , Irish ,
									Italian , Middle Eastern , Salvadorian" </span>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<input type="text" class="form-control" name='S2_ethnicity' value="{{$studentinfo->S2_Ethnicity }}" /> @error('S2_ethnicity')
										<p class="text-danger">{{'Please select a valid ethnicity'}}</p>
										@enderror

									</div>

								</div>

							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="blck">Current School </label><select class="form-control" name='S2_current_school' value="{{$studentinfo->S2_Current_School }}">
											<option value="test_school">Test School</option>

										</select> @error('S2_current_school')
										<p class="text-danger">{{'Please select a valid school'}}</p>
										@enderror

									</div>
								</div>
							</div>
						</div>
						@endif
						@endif
						@if($studentProfileThree == App\Models\Application::STUDENT_THREE)

						@if(!empty($studentinfo->S3_First_Name))
						<div class=student-3>
							<div class="row">
								<div class="col-md-4">
									<h4>Student 3</h4>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label> Legal First Name </label> <input type="text" class="form-control" name='S3_first_name' value="{{$studentinfo->S3_First_Name}}" />
										@error('S3_first_name')
										<p class="text-danger">{{'First name is required'}}</p>
										@enderror

									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="blck">Legal Middle Name </label> <input type="text" class="form-control" name='S3_middle_name' value="{{$studentinfo->S3_Middle_Name}}" /> @error('S3_middle_name')
										<p class="text-danger">{{'Enter a valid middle name'}}</p>
										@enderror
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Legal Last Name </label> <input type="text" class="form-control" name='S3_last_name' value="{{$studentinfo->S3_Last_Name }}" /> @error('S3_last_name')
										<p class="text-danger">{{'Last name is required'}}</p>
										@enderror
									</div>
								</div>

							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="blck">Preffered First Name </label> <input type="text" class="form-control" name='S3_preffered_first_name' value="{{$studentinfo->S3_Preferred_First_Name}}" />
										@error('S3_preffered_first_name')
										<p class="text-danger">{{'Enter a valid preferred name'}}</p>
										@enderror
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Date of Birth </label> <input type="date" class="form-control" name='S3_date_of_birth' value="{{$studentinfo->S3_Birthdate}}" name="date_of_birth" />
										@error('S3_date_of_birth')
										<p class="text-danger">{{'A valid D.O.B is required before today'}}</p>
										@enderror
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Gender </label>
										<select class="form-control" name='S3_gender'>
											<option selected disabled>Choose One</option>
											<option value="male" {{ $studentinfo->S3_Gender == 'Male' ? 'selected' : '' }}>Male</option>
											<option value="female" {{$studentinfo->S3_Gender == 'Female' ? 'selected' : '' }}>Female</option>

										</select> @error('S3_gender')
										<p class="text-danger">{{'Gender is required'}}</p>
										@enderror
									</div>
								</div>

							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Student's Mobile Phone Number </label> <input type="tel" class="form-control" name='S3_student_phone_number' value="{{$studentinfo->S3_Mobile_Phone }}" />
										@error('S3_student_phone_number')
										<p class="text-danger">{{'Enter a valid mobile number'}}</p>
										@enderror
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>T-Shirt Size(Adult/Unisex) </label>
										<select class="form-control" name='S3_tshirt_size'>
											<option selected disabled>Choose One</option>
											<option value="small" {{ $studentinfo->s3_tshirt_size == 'small' ? 'selected' : '' }}>Small</option>
											<option value="medium" {{ $studentinfo->s3_tshirt_size == 'medium' ? 'selected' : '' }}>Medium</option>
											<option value="large" {{ $studentinfo->s3_tshirt_size == 'large' ? 'selected' : '' }}>Large</option>
										</select> @error('S3_tshirt_size')
										<p class="text-danger">{{'Please select a T-shirt size'}}</p>
										@enderror
									</div>
								</div>

							</div>

							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="blck">Religion </label>
										<select class="form-control" name='S3_religion'>
											<option selected disabled>Choose One</option>
											<option value="hindu" {{$studentinfo->s3_religion == 'hindu' ? 'selected' : '' }}>Hindu</option>
											<option value="christian" {{$studentinfo->s3_religion == 'christian' ? 'selected' : '' }}>Christian</option>
											<option value="none" {{$studentinfo->s3_religion == 'none' ? 'selected' : '' }}>None</option>

										</select> @error('S3_religion')
										<p class="text-danger">{{'Please select a valid religion'}}</p>
										@enderror
									</div>
								</div>


							</div>
							<div class="multiracial mb-3">
								<span>How do you identify racially ? If more than one select separate
									races with a comma. Example: White, Black , Race x,
									Race y, Race z"<br>

								</span>
							</div>

							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<input type="text" class="form-control" name='S3_racial' value="{{$studentinfo->S3_Race }}" /> @error('S3_racial')
										<p class="text-danger">{{'Please select a valid race'}}</p>
										@enderror

									</div>

								</div>

							</div>

							<!-- 						<div class="form-group"> -->
							<!-- 							<label class="blck"><input type="checkbox" name="racial" -->
							<!-- 								value="Asian"{{ $studentinfo->S3_Race == 'Asian' ? 'checked' : '' }}>Asian</label><br> <label class="blck"><input -->
							<!-- 								type="checkbox" name="racial" value="Black/African American"{{ $studentinfo->S3_Race == 'Black/African American' ? 'checked' : '' }}> -->
							<!-- 								Black/African American</label><br> <label class="blck"><input -->
							<!-- 								type="checkbox" name="racial" value="Native American/Indegenous"{{ $studentinfo->S3_Race == 'Native American/Indegenous' ? 'checked' : '' }}> -->
							<!-- 								Native American/Indegenous</label><br> <label class="blck"><input -->
							<!-- 								type="checkbox" name="racial" value="White"{{ $studentinfo->S3_Race == 'White' ? 'checked' : '' }}> White</label> <br> -->
							<!-- 							<label class="blck"><input type="checkbox" name="racial" -->
							<!-- 								value="Multiracial"{{ $studentinfo->S3_Race == 'Multiracial' ? 'checked' : '' }}> Multiracial</label> @error('racial') -->
							<!-- 							<p class="text-danger">{{$message}}</p> -->
							<!-- 							@enderror -->
							<!-- 						</div> -->

							<div class="ethinicity ">
								<span>What is your ethinicity ? If more than one separate
									ethnicities with a comma. Example: Filipino , Hawaiian , Irish ,
									Italian , Middle Eastern , Salvadorian" </span>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<input type="text" class="form-control" name='S3_ethnicity' value="{{$studentinfo->S3_Ethnicity }}" /> @error('S3_ethnicity')
										<p class="text-danger">{{'Please select a valid ethnicity'}}</p>
										@enderror

									</div>

								</div>

							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="blck">Current School </label><select class="form-control" name='S3_current_school' value="{{$studentinfo->S3_Current_School }}">
											<option value="test_school">Test School</option>

										</select> @error('S3_current_school')
										<p class="text-danger">{{'Please select a valid school'}}</p>
										@enderror

									</div>
								</div>
							</div>
						</div>

						@endif
						@endif
					</div>
				</div>
			</div>

		</div>
		<div class="form-btn text-end mt">
			<button type="submit" value="Next" class="sub-btn">Next/Save</button>
		</div>

	</div>
</form>
@endsection @push('js') @endpush