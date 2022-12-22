@extends('layouts.frontend-layout') @push('css') @endpush
@section('content')
<form action="#" method="POST">
	@csrf 
	@method('PUT')
	<div class="home-wrap hme-wrp2">


		<div class="form-outr">
@foreach($studentinfo as $student)
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
										class="form-control" name='first_name' value="{{$student->S1_First_Name}}" />
								

								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="blck">Legal Middle Name </label> <input
										type="text" class="form-control" name='middle_name'
										value="{{$student->S1_Middle_Name}}" /> @error('middle_name')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Legal Last Name </label> <input type="text"
										class="form-control" name='last_name'
										value="{{$student->S1_Last_Name }}" /> @error('last_name')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="blck">Preffered First Name </label> <input
										type="text" class="form-control" name='preffered_first_name'
										value="{{$student->S1_Preferred_First_Name}}" />
									@error('preffered_first_name')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Date of Birth </label> <input type="date"
										class="form-control" name='date_of_birth'
										value="{{$student->S1_Birthdate}}" name="date_of_birth" />
									@error('date_of_birth')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Gender </label> <select class="form-control"
										name='gender'>
										<option value="male" {{ $student->S1_Gender == 'male' ? 'selected' : '' }}>Male</option>
										<option value="female" {{$student->S1_Gender == 'female' ? 'selected' : '' }}>Female</option>

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
										class="form-control" name='student_phone_number'
										value="{{$student->S1_Mobile_Phone }}" />
									@error('student_phone_number')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>T-Shirt Size(Adult/Unisex) </label> <select
										class="form-control" name='tshirt_size'
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
										class="form-control" name='religion'
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
						<div class="form-group">
							<label class="blck"><input type="checkbox" name="racial"
								value="Asian"{{ $student->S1_Race == 'Asian' ? 'checked' : '' }}>Asian</label><br> <label class="blck"><input
								type="checkbox" name="racial" value="Black/African American"{{ $student->S1_Race == 'Black/African American' ? 'checked' : '' }}>
								Black/African American</label><br> <label class="blck"><input
								type="checkbox" name="racial" value="Native American/Indegenous"{{ $student->S1_Race == 'Native American/Indegenous' ? 'checked' : '' }}>
								Native American/Indegenous</label><br> <label class="blck"><input
								type="checkbox" name="racial" value="White"{{ $student->S1_Race == 'White' ? 'checked' : '' }}> White</label> <br>
							<label class="blck"><input type="checkbox" name="racial"
								value="Multiracial"{{ $student->S1_Race == 'Multiracial' ? 'checked' : '' }}> Multiracial</label> @error('racial')
							<p class="text-danger">{{$message}}</p>
							@enderror
						</div>

						<div class="ethinicity ">
							<span>What is your ethinicity ?if more than one separate
								ethnicities with a comma. Example: Filipino , Hawaiian , Irish ,
								Italian , Middle Eastern , Salvadorian" </span>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<input type="text" class="form-control" name='ethnicity'
										value="{{$student->S1_Ethnicity }}" /> @error('ethnicity')
									<p class="text-danger">{{$message}}</p>
									@enderror

								</div>

							</div>

						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="blck">Current School </label><select
										class="form-control" name='current_school'
										value="{{$student->S1_Current_School }}">
										<option value="test_school">Test School</option>

									</select> @error('current_school')
									<p class="text-danger">{{$message}}</p>
									@enderror

								</div>
							</div>
						</div>
					<div class = student-2>
					<div class ="row">
					<div class ="col-md-4">
					<h4>Student 2</h4>
					</div>
					</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label> Legal First Name </label> <input type="text"
										class="form-control" name='first_name' value="{{$student->S1_First_Name}}" />
									@error('first_name')
									<p class="text-danger">{{$message}}</p>
									@enderror

								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="blck">Legal Middle Name </label> <input
										type="text" class="form-control" name='middle_name'
										value="{{$student->S1_Middle_Name}}" /> @error('middle_name')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Legal Last Name </label> <input type="text"
										class="form-control" name='last_name'
										value="{{$student->S1_Last_Name }}" /> @error('last_name')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="blck">Preffered First Name </label> <input
										type="text" class="form-control" name='preffered_first_name'
										value="{{$student->S1_Preferred_First_Name}}" />
									@error('preffered_first_name')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Date of Birth </label> <input type="date"
										class="form-control" name='date_of_birth'
										value="{{$student->S1_Birthdate}}" name="date_of_birth" />
									@error('date_of_birth')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Gender </label> <select class="form-control"
										name='gender'>
										<option value="male" {{ $student->S1_Gender == 'male' ? 'selected' : '' }}>Male</option>
										<option value="female" {{$student->S1_Gender == 'female' ? 'selected' : '' }}>Female</option>

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
										class="form-control" name='student_phone_number'
										value="{{$student->S1_Mobile_Phone }}" />
									@error('student_phone_number')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>T-Shirt Size(Adult/Unisex) </label> <select
										class="form-control" name='tshirt_size'
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
										class="form-control" name='religion'
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
						<div class="form-group">
							<label class="blck"><input type="checkbox" name="racial"
								value="Asian"{{ $student->S1_Race == 'Asian' ? 'checked' : '' }}>Asian</label><br> <label class="blck"><input
								type="checkbox" name="racial" value="Black/African American"{{ $student->S1_Race == 'Black/African American' ? 'checked' : '' }}>
								Black/African American</label><br> <label class="blck"><input
								type="checkbox" name="racial" value="Native American/Indegenous"{{ $student->S1_Race == 'Native American/Indegenous' ? 'checked' : '' }}>
								Native American/Indegenous</label><br> <label class="blck"><input
								type="checkbox" name="racial" value="White"{{ $student->S1_Race == 'White' ? 'checked' : '' }}> White</label> <br>
							<label class="blck"><input type="checkbox" name="racial"
								value="Multiracial"{{ $student->S1_Race == 'Multiracial' ? 'checked' : '' }}> Multiracial</label> @error('racial')
							<p class="text-danger">{{$message}}</p>
							@enderror
						</div>

						<div class="ethinicity ">
							<span>What is your ethinicity ?if more than one separate
								ethnicities with a comma. Example: Filipino , Hawaiian , Irish ,
								Italian , Middle Eastern , Salvadorian" </span>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<input type="text" class="form-control" name='ethnicity'
										value="{{$student->S1_Ethnicity }}" /> @error('ethnicity')
									<p class="text-danger">{{$message}}</p>
									@enderror

								</div>

							</div>

						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="blck">Current School </label><select
										class="form-control" name='current_school'
										value="{{$student->S1_Current_School }}">
										<option value="test_school">Test School</option>

									</select> @error('current_school')
									<p class="text-danger">{{$message}}</p>
									@enderror

								</div>
							</div>
						</div>
					</div>
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
										class="form-control" name='first_name' value="{{$student->S1_First_Name}}" />
									@error('first_name')
									<p class="text-danger">{{$message}}</p>
									@enderror

								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="blck">Legal Middle Name </label> <input
										type="text" class="form-control" name='middle_name'
										value="{{$student->S1_Middle_Name}}" /> @error('middle_name')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Legal Last Name </label> <input type="text"
										class="form-control" name='last_name'
										value="{{$student->S1_Last_Name }}" /> @error('last_name')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="blck">Preffered First Name </label> <input
										type="text" class="form-control" name='preffered_first_name'
										value="{{$student->S1_Preferred_First_Name}}" />
									@error('preffered_first_name')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Date of Birth </label> <input type="date"
										class="form-control" name='date_of_birth'
										value="{{$student->S1_Birthdate}}" name="date_of_birth" />
									@error('date_of_birth')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Gender </label> <select class="form-control"
										name='gender'>
										<option value="male" {{ $student->S1_Gender == 'male' ? 'selected' : '' }}>Male</option>
										<option value="female" {{$student->S1_Gender == 'female' ? 'selected' : '' }}>Female</option>

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
										class="form-control" name='student_phone_number'
										value="{{$student->S1_Mobile_Phone }}" />
									@error('student_phone_number')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>T-Shirt Size(Adult/Unisex) </label> <select
										class="form-control" name='tshirt_size'
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
										class="form-control" name='religion'
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
						<div class="form-group">
							<label class="blck"><input type="checkbox" name="racial"
								value="Asian"{{ $student->S1_Race == 'Asian' ? 'checked' : '' }}>Asian</label><br> <label class="blck"><input
								type="checkbox" name="racial" value="Black/African American"{{ $student->S1_Race == 'Black/African American' ? 'checked' : '' }}>
								Black/African American</label><br> <label class="blck"><input
								type="checkbox" name="racial" value="Native American/Indegenous"{{ $student->S1_Race == 'Native American/Indegenous' ? 'checked' : '' }}>
								Native American/Indegenous</label><br> <label class="blck"><input
								type="checkbox" name="racial" value="White"{{ $student->S1_Race == 'White' ? 'checked' : '' }}> White</label> <br>
							<label class="blck"><input type="checkbox" name="racial"
								value="Multiracial"{{ $student->S1_Race == 'Multiracial' ? 'checked' : '' }}> Multiracial</label> @error('racial')
							<p class="text-danger">{{$message}}</p>
							@enderror
						</div>

						<div class="ethinicity ">
							<span>What is your ethinicity ?if more than one separate
								ethnicities with a comma. Example: Filipino , Hawaiian , Irish ,
								Italian , Middle Eastern , Salvadorian" </span>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<input type="text" class="form-control" name='ethnicity'
										value="{{$student->S1_Ethnicity }}" /> @error('ethnicity')
									<p class="text-danger">{{$message}}</p>
									@enderror

								</div>

							</div>

						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="blck">Current School </label><select
										class="form-control" name='current_school'
										value="{{$student->S1_Current_School }}">
										<option value="test_school">Test School</option>

									</select> @error('current_school')
									<p class="text-danger">{{$message}}</p>
									@enderror

								</div>
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

@endforeach
	</div>
</form>
@endsection @push('js') @endpush
