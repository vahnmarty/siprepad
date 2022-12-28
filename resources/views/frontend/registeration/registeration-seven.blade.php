@extends('layouts.frontend-layout')
@push('css')
@endpush
@section('content')
<form action="" method="POST">
@csrf
@method('POST')
	<div class="home-wrap hme-wrp2">
		<div class="progress-outr"></div>
		<div class="form-outr">

			<div class="form-outr">
				<div class="cmn-hdr"></div>

				<div class="school-wrap step__two">
					<div class="form-wrap">
						<div class="row">
							<div class="col-lg-4">
								<h4>English Placement</h4>
							</div>
							<div class="col-lg-10">
								<div class="form-group">
									You have been placed in:<br><label class="blck">
									<input type="checkbox"
										name="english_placement" value="{{App\Models\CoursePlacementInformation::IS_SELECTED}}" {{$idCheck->english_placement == App\Models\CoursePlacementInformation::IS_SELECTED ? 'checked' : ''}}>English 100 (College Prep Freshman
										English)</label> 
									
									
									 <br> NOTE: Any interested freshman students
									will have an opportunity to apply for Honors English in the
									spring semester of their freshman year for the following school
									year (sophomore year).
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-md-4">
								<h4>Math Placement</h4>
							</div>
							<div class="col-lg-10">
								<div class="form-group">
									You have been placed in:<br> 
									<input type="checkbox"
										name="math_placement" value="{{App\Models\CoursePlacementInformation::IS_SELECTED}}" {{$idCheck->math_placement == App\Models\CoursePlacementInformation::IS_SELECTED ? 'checked' : ''}}>
										
										<span class="blck"
										style="margin: 4px">Algebra 1 Accelerated (College Prep
										Accelerated Algebra) </span><br> If you want to challenge your
									math placement, you are required to take the Challenge Test on
									April 30, 2022.<br> <label>Do you want to make a reservation to
										take the Math Challenge Test on April 30,2023" </label><br>



									<div class="col-md-3">
										<div class="form-group">

											<select class="form-control" name='math_challenge_test'>
												<option value="" selected disabled>Please Choose</option>

												<option
													value="{{App\Models\CoursePlacementInformation::IS_SELECTED}}" {{$idCheck->math_challenge_test == App\Models\CoursePlacementInformation::IS_SELECTED ? 'selected' : ''}}>Yes</option>
												<option
													value="{{App\Models\CoursePlacementInformation::NOT_SELECTED}}" {{$idCheck->math_challenge_test == App\Models\CoursePlacementInformation::NOT_SELECTED ? 'selected' : ''}}>No</option>

											</select> @error('math_challenge_test')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>

									</div>

									<!-- 										<label class="blck"><input -->
<!-- 										type="radio" name="math_challenge_reservation" id="yes" value="yes" -->
<!-- 										>Yes</label> -->
<!-- 										<label class="blck"> <input type="radio" -->
<!-- 										name="math_challenge_reservation" id="no" -->
<!-- 										value="No"><span class="blck">No</label> -->
										
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-lg-4">
								<h4>Language Selection</h4>
							</div>
							<div class="col-lg-10">
								<div class="form-group">
								
								<label class ="blck">Please indicate your language choice: </label><br> 
								
								<div class="col-md-3">
								<div class="form-group">
				
								<select
										class="form-control" name='language_selection'>
										<option value="" selected disabled>Please Choose</option>    

										<option value="French" {{$idCheck->language_selection == 'French' ? 'selected' : ''}}>French</option>
										<option value="Latin" {{$idCheck->language_selection == 'Latin' ? 'selected' : ''}}>Latin</option>	
										<option value="Mandarin" {{$idCheck->language_selection == 'Mandarin' ? 'selected' : ''}}>Mandarin</option>
										<option value="Spanish" {{$idCheck->language_selection == 'Spanish' ? 'selected' : ''}}>Spanish</option>	

									</select>
									@error('language_selection')
									<p class="text-danger">{{$message}}</p>
									@enderror		
								</div>

							</div>
								
<!-- 								<label class ="blck"> -->
<!-- 								<input type="checkbox" name="language" value="french" id="french">French</label><br> -->
<!-- 									<label class ="blck"> -->
<!-- 								<input type="checkbox" name="language" -->
<!-- 										value="latin" id="latin">Latin</label><br> <label class ="blck"> -->
<!-- 								<input type="checkbox" -->
<!-- 										name="language" value="mandarin"id="mandarin">Mandarin</label><br>  -->
										
<!-- 									  <label class ="blck"><input type="checkbox" name="language" id="spanish" value="spanish">Spanish</label><br> -->
									  
									To place in a more advanced section of your language choice than
									beginning level, you are required to take a Language Placement
									Test on April 30, 2022.<br> <label>Do you want to make a
										reservation to take the Language Placement Test on April
										30,2023 </label><br> 
										
										<div class="col-md-3">
								<div class="form-group">
				
								<select
										class="form-control" name='language_placement_test'>
										<option value="" selected disabled>Please Choose</option>    

										<option value="{{App\Models\CoursePlacementInformation::IS_SELECTED}}" {{$idCheck->language_placement_test == App\Models\CoursePlacementInformation::IS_SELECTED ? 'selected' : ''}}>Yes</option>
										<option value="{{App\Models\CoursePlacementInformation::NOT_SELECTED}}" {{$idCheck->language_placement_test == App\Models\CoursePlacementInformation::NOT_SELECTED ? 'selected' : ''}}>No</option>		

									</select>
									@error('language_placement_test')
									<p class="text-danger">{{$message}}</p>
									@enderror		
								</div>

							</div>
										
<!-- 										<input type="radio" -->
<!-- 										name="language_placement_test" id="language" -->
<!-- 										value="yes"><span -->
<!-- 										class="blck"  value="Yes">Yes</span> <input -->
<!-- 										type="radio" name="language" id="language" -->
<!-- 										name="language_plecement_test" value="No"><span -->
<!-- 										class="blck" >No</span><br>  -->
										
										
										
										<label
										class="blck">Check ALL that apply to your language choice: </label><br>
									<input type="checkbox" name="checks_apply_to_language[]"
										value="every day"
										><span class="blck"
										style="margin: 4px">I speak this language every day</span><br>
										
									<input type="checkbox" name="checks_apply_to_language[]"
										value="understand but do not speak"
										"><span class="blck"
										style="margin: 4px">I understand this language but do not
										speak this language</span><br>
										
									<input type="checkbox"
										name="checks_apply_to_language[]"
										value="speak occasionally"
										><span class="blck"
										style="margin: 4px">I speak this language occasionally with
										family and/or friends</span><br> 
										
									<input type="checkbox"
										name="checks_apply_to_language[]"
										value="school language immersion program"><span class="blck"
										style="margin: 4px">My current school is a language immersion
										program </span><br>
										
									<input type="checkbox"
										name="checks_apply_to_language[]"
										value="currently taking"
										><span class="blck"
										style="margin: 4px">I am currently taking or have taken this
										language at my current school </span><br> 
										
									<input type="checkbox" name="checks_apply_to_language[]"
										value=" currently taking a course in this language outside of school"
										><span class="blck"
										style="margin: 4px">I am currently taking a course in this
										language outside of school </span><br> 
										
									<input type="checkbox"
										name="checks_apply_to_language[]"
										value="none of the above" ><span
										class="blck" style="margin: 4px">I None of the above </span><br>
										
										
										
									<label>If your language choice is not available due to
										scheduling demands, are you open to choosing another
										language?* </label> <select class="form-control"
										style="width: 25%"
										name='open_to_choosing_another_language'
										value="{{ old('open_to_choosing_another_language') }}">
										<option value="">Please Choose</option>
										<option value="{{App\Models\CoursePlacementInformation::IS_SELECTED}}" {{$idCheck->choose_other_language == App\Models\CoursePlacementInformation::IS_SELECTED ? 'selected' : ''}}>Yes</option>
										<option value="{{App\Models\CoursePlacementInformation::NOT_SELECTED}}" {{$idCheck->choose_other_language == App\Models\CoursePlacementInformation::NOT_SELECTED ? 'selected' : ''}}>No</option>

									</select>
								</div>
							</div>

						</div>

</div>
				</div>
			</div>

		</div>
		<div class="flx">
			<div class="form-btn text-end mt">
				<a href="" class="sub-btn">Previous</a>
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

