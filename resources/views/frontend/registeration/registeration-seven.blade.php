@extends('layouts.frontend-layout')
@push('css')
@endpush
@section('content')
<form action="{{route('coursePlacementUpdate',$id )}}" method="POST">
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

										name="english_placement" value="{{App\Models\CoursePlacementInformation::IS_SELECTED}}" 
									@if(!empty($idCheck))
										{{ $idCheck->english_placement == App\Models\CoursePlacementInformation::IS_SELECTED ? 'checked' : ''}}	
									@endif
										>
										English 100 (College Prep Freshman

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

										name="math_placement" value="{{App\Models\CoursePlacementInformation::IS_SELECTED}}"
									@if(!empty($idCheck))
										{{ $idCheck->math_placement == App\Models\CoursePlacementInformation::IS_SELECTED ? 'checked' : ''}}			
									@endif
									>

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

													value="{{App\Models\CoursePlacementInformation::IS_SELECTED}}" 
													@if(!empty($idCheck))
														{{$idCheck->math_challenge_test == App\Models\CoursePlacementInformation::IS_SELECTED ? 'selected' : ''}}>Yes</option>		
													@else
													>Yes</option>
													@endif
												<option
													value="{{App\Models\CoursePlacementInformation::NOT_SELECTED}}" 
												@if(!empty($idCheck))
													{{$idCheck->math_challenge_test == App\Models\CoursePlacementInformation::NOT_SELECTED ? 'selected' : ''}}>No</option>		
												@else
												>No</option>
												@endif

											</select> @error('math_challenge_test')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>

									</div>

										
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

											<select class="form-control" name='language_selection'>
												<option value="" selected disabled>Please Choose</option>

											<option value="{{App\Models\CoursePlacementInformation::FRENCH}}" 
											@if(!empty($idCheck))	
												{{$idCheck->language_selection ==
													App\Models\CoursePlacementInformation::FRENCH ? 'selected' : ''}}>French</option>
											@else
											>French</option>
											@endif	
													
											<option value="{{App\Models\CoursePlacementInformation::LATIN}}" 
											@if(!empty($idCheck))	
												{{$idCheck->language_selection ==
													App\Models\CoursePlacementInformation::LATIN ? 'selected' : ''}}>Latin</option>
											@else
											>Latin</option>
											@endif	
											
											<option value="{{App\Models\CoursePlacementInformation::MANDARIN}}" 
											@if(!empty($idCheck))	
												{{$idCheck->language_selection ==
													App\Models\CoursePlacementInformation::MANDARIN ? 'selected' : ''}}>Mandarin</option>
											@else
											>Mandarin</option>
											@endif	
												
											<option value="{{App\Models\CoursePlacementInformation::SPANISH}}" 
											@if(!empty($idCheck))
												{{$idCheck->language_selection ==
													App\Models\CoursePlacementInformation::SPANISH ? 'selected' : ''}}>Spanish</option>
											@else
											>Spanish</option>
											@endif
											</select> @error('language_selection')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>

									</div>

									  
									To place in a more advanced section of your language choice than
									beginning level, you are required to take a Language Placement
									Test on April 30, 2022.<br> <label>Do you want to make a
										reservation to take the Language Placement Test on April
										30,2023 </label><br>

									<div class="col-md-3">
										<div class="form-group">

											<select class="form-control" name='language_placement_test'>
												<option value="" selected disabled>Please Choose</option>

												<option
													value="{{App\Models\CoursePlacementInformation::IS_SELECTED}}"
												@if(!empty($idCheck))	
													{{$idCheck->language_placement_test ==
													App\Models\CoursePlacementInformation::IS_SELECTED ?
													'selected' : ''}}>Yes</option>
												@else
												>Yes</option>
												@endif	
												<option
													value="{{App\Models\CoursePlacementInformation::NOT_SELECTED}}"
												@if(!empty($idCheck))													
													{{$idCheck->language_placement_test ==
													App\Models\CoursePlacementInformation::NOT_SELECTED ?
													'selected' : ''}}>No</option>
												@else
												>No</option>
												@endif
											</select> @error('language_placement_test')
											<p class="text-danger">{{$message}}</p>
											@enderror
										</div>

									</div>
										
									<label class="blck">Check ALL that apply to your language choice: </label><br>
									
								@if(empty($languageValues))
									
									@foreach($language as $key=>$value)
									
									
									<input type="checkbox" name="checks_apply_to_language[]"
										value="{{$key}}"  >
									<span class="blck" style="margin: 4px">{{$value}}</span><br>
									@endforeach
									
									
									
								@else
									@foreach($language as $key=>$value)
     									<input type="checkbox" name="checks_apply_to_language[]"  value="{{$key }}" {{ (in_array($key, $languageValues)) ? "checked" : " " }}>
     									<span class="blck" style="margin: 4px">	{{ $value}}</span></br>
   									@endforeach
   								@endif	
										
									<label>If your language choice is not available due to
										scheduling demands, are you open to choosing another
										language?* </label> <select class="form-control"
										style="width: 25%"
										name='open_to_choosing_another_language'
										value="">
										<option value="" selected disabled >Please Choose</option>
										<option value="{{App\Models\CoursePlacementInformation::IS_SELECTED}}" 
										@if(!empty($idCheck))
										{{$idCheck->choose_other_language == App\Models\CoursePlacementInformation::IS_SELECTED ? 'selected' : ''}}>Yes</option>		
										@else
										>Yes</option>
										@endif
										<option value="{{App\Models\CoursePlacementInformation::NOT_SELECTED}}" 
										@if(!empty($idCheck))
										{{$idCheck->choose_other_language == App\Models\CoursePlacementInformation::NOT_SELECTED ? 'selected' : ''}}>No</option>		
										@else
										>No</option>
										@endif

									</select>
									@error('open_to_choosing_another_language')
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
				<a href="{{route('accomodationsIndex',$id)}}" class="sub-btn">Previous</a>
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

