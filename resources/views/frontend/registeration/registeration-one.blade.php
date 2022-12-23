@extends('layouts.frontend-layout') @push('css') @endpush
@section('content')
<form action="{{route('registration.update',$studentinfo->id)}}" method="POST">
	@csrf 
	@method('PUT')
	<div class="home-wrap hme-wrp2">


		<div class="form-outr">

			<div class="form-outr">
				<div class="cmn-hdr">
					<h4>Student Info</h4>

				</div>
				<div class="school-wrap step__one">
					<div class="form-wrap">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label> Legal First Name </label> <input type="text"

										class="form-control" name='S1_first_name' value="{{$studentinfo->S1_First_Name}}" />

								

								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="blck">Legal Middle Name </label> <input
										type="text" class="form-control" name='S1_middle_name'
										value="{{$studentinfo->S1_Middle_Name}}" /> @error('middle_name')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Legal Last Name </label> <input type="text"
										class="form-control" name='S1_last_name'
										value="{{$studentinfo->S1_Last_Name }}" /> @error('last_name')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="blck">Preffered First Name </label> <input
										type="text" class="form-control" name='S1_preffered_first_name'
										value="{{$studentinfo->S1_Preferred_First_Name}}" />
									@error('preffered_first_name')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Date of Birth </label> <input type="date"
										class="form-control" name='S1_date_of_birth'
										value="{{$studentinfo->S1_Birthdate}}" name="date_of_birth" />
									@error('date_of_birth')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Gender </label> <select class="form-control"
										name='S1_gender'>
										<option value="male" {{ $studentinfo->S1_Gender == 'male' ? 'selected' : '' }}>Male</option>
										<option value="female" {{$studentinfo->S1_Gender == 'female' ? 'selected' : '' }}>Female</option>

									</select> @error('gender')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Student's Mobile Phone Number </label> <input type="tel"
										class="form-control" name='S1_student_phone_number'
										value="{{$studentinfo->S1_Mobile_Phone }}" />
									@error('student_phone_number')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>T-Shirt Size(Adult/Unisex) </label> 
									<select class="form-control" name='S1_tshirt_size'>
										<option value="small" {{ $studentinfo->s1_tshirt_size == 'small' ? 'selected' : '' }}>Small</option>
										<option value="medium" {{ $studentinfo->s1_tshirt_size == 'medium' ? 'selected' : '' }}>Medium</option>
										<option value="large" {{ $studentinfo->s1_tshirt_size == 'large' ? 'selected' : '' }}>Large</option>
									</select> @error('tshirt_size')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>

						</div>

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="blck">Religion </label><select
										class="form-control" name='S1_religion'
										value="">
										<option value="hindu"{{$studentinfo->s1_religion == 'hindu' ? 'selected' : '' }}>Hindu</option>
										<option value="christian"{{$studentinfo->s1_religion == 'christian' ? 'selected' : '' }}>Christian</option>
										<option value="none"{{$studentinfo->s1_religion == 'none' ? 'selected' : '' }}>None</option>

									</select> @error('religion')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>


						</div>
						<div class="multiracial mb-3">
							<span>How do you identify racially? if you identify by more than
								one race , Select all that apply to you and also select the<br>
								"multiracial" checkbox.
							</span>
						</div>
						
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<input type="text" class="form-control" name='S1_racial'
										value="{{$studentinfo->S1_Race }}" /> @error('ethnicity')
									<p class="text-danger">{{$message}}</p>
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
							<span>What is your ethinicity ?if more than one separate
								ethnicities with a comma. Example: Filipino , Hawaiian , Irish ,
								Italian , Middle Eastern , Salvadorian" </span>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<input type="text" class="form-control" name='S1_ethnicity'
										value="{{$studentinfo->S1_Ethnicity }}" /> @error('ethnicity')
									<p class="text-danger">{{$message}}</p>
									@enderror

								</div>

							</div>

						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="blck">Current School </label><select
										class="form-control" name='S1_current_school'
										value="{{$studentinfo->S1_Current_School }}">
										<option value="test_school">Test School</option>

									</select> @error('current_school')
									<p class="text-danger">{{$message}}</p>
									@enderror

								</div>
							</div>
						</div>
				@if(!empty($studentinfo->S2_First_Name))
					<div class = student-2>

					<div class ="row">
					<div class ="col-md-4">
					<h4>Student 3</h4>
					</div>
					</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label> Legal First Name </label> <input type="text"
										class="form-control" name='S2_first_name' value="{{$studentinfo->S2_First_Name}}" />
									@error('first_name')
									<p class="text-danger">{{$message}}</p>
									@enderror

								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="blck">Legal Middle Name </label> <input
										type="text" class="form-control" name='S2_middle_name'
										value="{{$studentinfo->S2_Middle_Name}}" /> @error('middle_name')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Legal Last Name </label> <input type="text"
										class="form-control" name='S2_last_name'
										value="{{$studentinfo->S2_Last_Name }}" /> @error('last_name')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="blck">Preffered First Name </label> <input
										type="text" class="form-control" name='S2_preffered_first_name'
										value="{{$studentinfo->S2_Preferred_First_Name}}" />
									@error('preffered_first_name')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Date of Birth </label> <input type="date"
										class="form-control" name='date_of_birth'
										value="{{$studentinfo->S2_Birthdate}}" name="S2_date_of_birth" />
									@error('date_of_birth')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Gender </label> <select class="form-control"
										name='S2_gender'>
										<option value="male" {{ $studentinfo->S2_Gender == 'male' ? 'selected' : '' }}>Male</option>
										<option value="female" {{$studentinfo->S2_Gender == 'female' ? 'selected' : '' }}>Female</option>

									</select> @error('gender')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Student's Mobile Phone Number </label> <input type="tel"
										class="form-control" name='S2_student_phone_number'
										value="{{$studentinfo->S2_Mobile_Phone }}" />
									@error('student_phone_number')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>T-Shirt Size(Adult/Unisex) </label> <select
										class="form-control" name='S2_tshirt_size'
										value=" ">
										<option value="">-- Please Choose --</option>
										<option value="small">Small</option>
										<option value="medium">Medium</option>
										<option value="large">Large</option>
									</select> @error('tshirt_size')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>

						</div>

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="blck">Religion </label><select
										class="form-control" name='S2_religion'
										value="">
										<option value="">-- Please Choose --</option>

										<option value="christian">Christian</option>

									</select> @error('religion')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>


						</div>
						<div class="multiracial mb-3">
							<span>How do you identify racially? if you identify by more than
								one race , Select all that apply to you and also select the<br>
								"multiracial" checkbox.
							</span>
						</div>
						
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<input type="text" class="form-control" name='S2_racial'
										value="{{$studentinfo->S2_Race }}" /> @error('ethnicity')
									<p class="text-danger">{{$message}}</p>
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
							<span>What is your ethinicity ?if more than one separate
								ethnicities with a comma. Example: Filipino , Hawaiian , Irish ,
								Italian , Middle Eastern , Salvadorian" </span>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<input type="text" class="form-control" name='S2_ethnicity'
										value="{{$studentinfo->S2_Ethnicity }}" /> @error('ethnicity')
									<p class="text-danger">{{$message}}</p>
									@enderror

								</div>

							</div>

						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="blck">Current School </label><select
										class="form-control" name='S2_current_school'
										value="{{$studentinfo->S2_Current_School }}">
										<option value="test_school">Test School</option>

									</select> @error('current_school')
									<p class="text-danger">{{$message}}</p>
									@enderror

								</div>
							</div>
						</div>
					</div>
				@endif
				@if(!empty($studentinfo->S3_First_Name))
							<div class = student-3>
					<div class ="row">
					<div class ="col-md-4">
					<h4>Student 3</h4>
					</div>
					</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label> Legal First Name </label> <input type="text"
										class="form-control" name='S3_first_name' value="{{$studentinfo->S3_First_Name}}" />
									@error('first_name')
									<p class="text-danger">{{$message}}</p>
									@enderror

								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="blck">Legal Middle Name </label> <input
										type="text" class="form-control" name='S3_middle_name'
										value="{{$studentinfo->S3_Middle_Name}}" /> @error('middle_name')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Legal Last Name </label> <input type="text"
										class="form-control" name='S3_last_name'
										value="{{$studentinfo->S3_Last_Name }}" /> @error('last_name')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="blck">Preffered First Name </label> <input
										type="text" class="form-control" name='S3_preffered_first_name'
										value="{{$studentinfo->S3_Preferred_First_Name}}" />
									@error('preffered_first_name')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Date of Birth </label> <input type="date"
										class="form-control" name='S3_date_of_birth'
										value="{{$studentinfo->S3_Birthdate}}" name="date_of_birth" />
									@error('date_of_birth')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Gender </label> <select class="form-control"
										name='S3_gender'>
										<option value="male" {{ $studentinfo->S3_Gender == 'male' ? 'selected' : '' }}>Male</option>
										<option value="female" {{$studentinfo->S3_Gender == 'female' ? 'selected' : '' }}>Female</option>

									</select> @error('gender')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Student's Mobile Phone Number </label> <input type="tel"
										class="form-control" name='S3_student_phone_number'
										value="{{$studentinfo->S3_Mobile_Phone }}" />
									@error('student_phone_number')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>T-Shirt Size(Adult/Unisex) </label> <select
										class="form-control" name='S3_tshirt_size'
										value=" ">
										<option value="">-- Please Choose --</option>
										<option value="small">Small</option>
										<option value="medium">Medium</option>
										<option value="large">Large</option>
									</select> @error('tshirt_size')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>

						</div>

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="blck">Religion </label><select
										class="form-control" name='S3_religion'
										value="">
										<option value="">-- Please Choose --</option>

										<option value="christian">Christian</option>

									</select> @error('religion')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>


						</div>
						<div class="multiracial mb-3">
							<span>How do you identify racially? if you identify by more than
								one race , Select all that apply to you and also select the<br>
								"multiracial" checkbox.
							</span>
						</div>
						
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<input type="text" class="form-control" name='S3_racial'
										value="{{$studentinfo->S3_Race }}" /> @error('ethnicity')
									<p class="text-danger">{{$message}}</p>
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
							<span>What is your ethinicity ?if more than one separate
								ethnicities with a comma. Example: Filipino , Hawaiian , Irish ,
								Italian , Middle Eastern , Salvadorian" </span>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<input type="text" class="form-control" name='S3_ethnicity'
										value="{{$studentinfo->S3_Ethnicity }}" /> @error('ethnicity')
									<p class="text-danger">{{$message}}</p>
									@enderror

								</div>

							</div>

						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="blck">Current School </label><select
										class="form-control" name='S3_current_school'
										value="{{$studentinfo->S3_Current_School }}">
										<option value="test_school">Test School</option>

									</select> @error('current_school')
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

		</div>
		<div class="form-btn text-end mt">
			<button type="submit" value="Next" class="sub-btn" >Next/Save</button>
		</div>

	</div>
</form>
@endsection @push('js') @endpush
