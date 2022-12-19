

<form wire:submit.prevent="submit" method="POST">
	<div class="home-wrap hme-wrp2">


            <div class="progress-outr">
                <ul class="progress-ul">
                    <li class="step-complete">
                        @if ($registeration_student_info)
                            <a href="{{ route('admission-application', ['step' => 'one']) }}">
                                <span>1</span>
                                <h6>Student Info</h6>
                            </a>
                        @else
                            <a href="javascript::void(0)">
                                <span>1</span>
                                <h6>Student Info</h6>
                            </a>
                        @endif

                    </li>
                    <li class="step-complete">
                        @if ($registeration_student_info)
                            <a href="{{ route('admission-application', ['step' => 'two']) }}">
                                <span>2</span>
                                <h6>Address Info</h6>
                            </a>
                        @else
                            <a href="javascript::void(0)">
                                <span>2</span>
                                <h6>Address Info</h6>
                            </a>
                        @endif
                    </li>
                    <li class="step-complete">
                        @if ($registeration_student_info)
                            <a href="{{ route('admission-application', ['step' => 'three']) }}">
                                <span>3</span>
                                <h6>Parent Info</h6>
                            </a>
                        @else
                            <a href="javascript::void(0)">
                                <span>3</span>
                                <h6>Parent Info</h6>
                            </a>
                        @endif
                    </li>
                    <li class="step-complete">
                        @if ($registeration_student_info)
                            <a href="{{ route('admission-application', ['step' => 'four']) }}">
                                <span>4</span>
                                <h6>Sibling Info</h6>
                            </a>
                        @else
                            <a href="javascript::void(0)">
                                <span>4</span>
                                <h6>Sibling Info</h6>
                            </a>
                        @endif
                    </li>
                    <li class="step-complete">
                        @if ($registeration_student_info)
                            <a href="{{ route('admission-application', ['step' => 'five']) }}">
                                <span>5</span>
                                <h6>Legacy Info</h6>
                            </a>
                        @else
                            <a href="javascript::void(0)">
                                <span>5</span>
                                <h6>Legacy Info</h6>
                            </a>
                        @endif
                    </li>
                    <li class="step-complete">
                        @if ($registeration_student_info)
                            <a href="{{ route('admission-application', ['step' => 'six']) }}">
                                <span>6</span>
                                <h6>Parent Statement</h6>
                            </a>
                        @else
                            <a href="javascript::void(0)">
                                <span>6</span>
                                <h6>Parent Statement</h6>
                            </a>
                        @endif
                    </li>
                    <li class="step-complete">
                        @if ($registeration_student_info)
                            <a href="{{ route('admission-application', ['step' => 'seven']) }}">
                                <span>7</span>
                                <h6>Spiritual & Community Info</h6>
                            </a>
                        @else
                            <a href="javascript::void(0)">
                                <span>7</span>
                                <h6>Spiritual & Community Info</h6>
                            </a>
                        @endif
                    </li>
                    <li class="step-complete">
                        @if ($registeration_student_info)
                            <a href="{{ route('admission-application', ['step' => 'eight']) }}">
                                <span>8</span>
                                <h6>Student Statement</h6>
                            </a>
                        @else
                            <a href="javascript::void(0)">
                                <span>8</span>
                                <h6>Student Statement</h6>
                            </a>
                        @endif
                    </li>
                    <li>
                        @if ($registeration_student_info)
                            <a href="{{ route('admission-application', ['step' => 'nine']) }}">
                                <span>9</span>
                                <h6>Writing Sample</h6>
                            </a>
                        @else
                            <a href="javascript::void(0)">
                                <span>9</span>
                                <h6>Writing Sample</h6>
                            </a>
                        @endif
                    </li>
                    <li>
                        @if ($registeration_student_info)
                            <a href="{{ route('admission-application', ['step' => 'ten']) }}">
                                <span>10</span>
                                <h6>Final Steps</h6>
                            </a>
                        @else
                            <a href="javascript::void(0)">
                                <span>10</span>
                                <h6>Final Steps</h6>
                            </a>
                        @endif
                    </li>
                </ul>
            </div>		<div class="form-outr">

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
										class="form-control" wire:model.defer='first_name' value="{{$studentinfo->S1_First_Name}}"
										 /> @error('first_name')
									<p class="text-danger">{{$message}}</p>
									@enderror

								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="blck">Legal Middle Name </label> <input
										type="text" class="form-control"
										wire:model.defer='middle_name'
										value="{{ old('middle_name') }}" /> @error('middle_name')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Legal Last Name </label> <input type="text"
										class="form-control" wire:model.defer='last_name'
										value="{{ old('last_name') }}" /> @error('last_name')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="blck">Preffered First Name </label> <input
										type="text" class="form-control"
										wire:model.defer='preffered_first_name'
										value="{{ old('preffered_first_name') }}" />
									@error('preffered_first_name')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Date of Birth </label> <input type="date"
										class="form-control" wire:model.defer='date_of_birth'
										value="{{ old('date_of_birth') }}" name="date_of_birth" />
									@error('date_of_birth')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Gender </label> <select
										class="form-control" wire:model.defer='gender'
										value="{{ old('gender') }}">
										<option value="" selected></option>
										<option value="male">Male</option>
										<option value="female">Female</option>

									</select>
									@error('gender')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Student's Mobile Phone Number </label> <input type="tel"
										class="form-control" wire:model.defer='student_phone_number'
										value="{{ old('student_phone_number') }}" />
									@error('student_phone_number')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>T-Shirt Size(Adult/Unisex) </label> <select
										class="form-control" wire:model.defer='tshirt_size'
										value="{{ old('tshirt_size') }}">
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
										class="form-control" wire:model.defer='religion'
										value="{{ old('religion') }}">
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
							<label class="blck"><input type="checkbox"
								wire:model.defer="racial" value="Asian">Asian</label><br> <label
								class="blck"><input type="checkbox" wire:model.defer="racial"
								value="Black/African American"> Black/African American</label><br>
							<label class="blck"><input type="checkbox"
								wire:model.defer="racial" value="Native American/Indegenous">
								Native American/Indegenous</label><br> <label class="blck"><input
								type="checkbox" wire:model.defer="racial" value="White"> White</label>
							<br>
							<label class="blck"><input type="checkbox"
								wire:model.defer="racial" value="Multiracial"> Multiracial</label>
							@error('racial')
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
									<input type="text" class="form-control"
										wire:model.defer='ethnicity' value="{{ old('ethnicity') }}" />
									@error('ethnicity')
									<p class="text-danger">{{$message}}</p>
									@enderror

								</div>

							</div>

						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="blck">Current School </label><select
										class="form-control" wire:model.defer='current_school'
										value="{{ old('current_school') }}">
										<option value="">-- Please Choose --</option>
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
		<div class="form-btn text-end mt">
			<button type="submit" value="Next" class="sub-btn">Next/Save</button>
		</div>


	</div>
</form>