@extends('layouts.frontend-layout')
@push('css')
@endpush
@section('content')
<form action="{{route('magisProgramUpdate')}}" method="POST">
@csrf

	<div class="home-wrap hme-wrp2">
		<div class="progress-outr"></div>
		<div class="form-outr">

			<div class="form-outr">
				<div class="cmn-hdr">

					<h4>St. Ignatius Magis Program save</h4>
				</div>

				<div class="school-wrap step__two">
					<div class="form-wrap">
						<div class="row">
							<div class="col-lg-2"></div>
							<div class="col-lg-10">
								<div class="form-group">The Magis High School Program is an
									academic, social, and cultural support program for students
									historically underrepresented at St. Ignatius and institutions
									of higher education. The Magis Program exists to aid students
									and families, offering support in navigating the college
									preparatory system.</div>
							</div>

						</div>
						<div class="row">
							<div class="col-lg-2"></div>
							<div class="col-lg-10">
								<div class="form-group">The Magis Program supports St. Ignatius
									students who identify with at least one of the following
									criteria:</div>
							</div>

						</div>
						<div class="row">
							<div class="col-lg-2"></div>
							<div class="col-lg-10">
								<div class="form-group">
									<ul>
										<li>Students who are first-generation college-bound (neither
											parent holds a bachelor's degree from a US college or
											university)</li>
										<li>Student receiving financial assistance</li>
										<li>Students of color historically underrepresented in higher
											education</li>
									</ul>

								</div>
							</div>

						</div>

						<div class="row">
							<div class="col-lg-2"></div>
							<div class="col-lg-10">
								<div class="form-group">
									<label>Are you a first-generation college-bound
										student?</label> <label class="blck">(neither parent holds a
										bachelor's degree from a US college or university) </label>
										
								</div>

							</div>

						</div>
						<div class="row">
							<div class="col-md-2" style="text-align:right;">
							
							</div>
							<div class="col-md-3">
								<div class="form-group">
				
								<select
										class="form-control" name='first_generation_college_bound_student'>
										<option value="" selected disabled>Please Choose</option>    

										<option value="{{App\Models\StudentInformation::IS_FIRST_GENERATION}}" >Yes</option>
										<option value="{{App\Models\StudentInformation::NOT_FIRST_GENERATION}}" >No</option>		

									</select>
									@error('first_generation_college_bound_student')
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

