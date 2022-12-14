<div>

	<form wire:submit.prevent="submit"  method="POST">
		<div class="home-wrap hme-wrp2">
			<div class="progress-outr"></div>
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
										<label> Legal First Name *</label> <input type="text"
											class="form-control" wire:model ='first_name'  />
											
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Legal Middle Name </label> <input type="email"
											class="form-control" wire:model ='middle_name'  />

									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Legal Last Name *</label> <input type="email"
											class="form-control" wire:model ='last_name'  />

									</div>
								</div>

							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Preffered First Name </label> <input type="text"
											class="form-control" wire:model ='preffered_first_name'
											 />
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Date of Birth *</label> <input type="date"
											class="form-control" wire:model ='date_of_birth'
											name="date_of_birth" />

									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Gender *</label> <input type="text" class="form-control"
											wire:model ='gender'  />

									</div>
								</div>

							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Student's Mobile Phone Number *</label> <input
											type="number" class="form-control" wire:model ='student_phone_number'
											 />
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>T-Shirt Size(Adult/Unisex) *</label> <select
											class="form-control" wire:model ='tshirt_size' >
											<option value="">-- Please Choose --</option>

											<option value="small">Small</option>
											<option value="medium">Medium</option>
											<option value="large">Large</option>
										</select>

									</div>
								</div>

							</div>

							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Religion *</label><select class="form-control"
											wire:model ='religion'>
											<option value="">-- Please Choose --</option>

											<option value="christian">Christian</option>
											<option value=""></option>
											<option value=""></option>
										</select>
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
								<ul class="" >
									<li> <input type="checkbox" wire:model ="racial" value="Asian">Asian</li>
									<li><input type="checkbox"  wire:model ="racial" value="Black/African American">Black/African American</li>
									<li><input type="checkbox" wire:model ="racial" value="Native American/Indegenous">Native American/Indegenous</li>
									<li><input type="checkbox" wire:model ="racial" value="Latina">Latina</li>
									<li><input type="checkbox" wire:model ="racial" value="Polynesian">Polynesian</li>
									<li><input type="checkbox" wire:model ="racial" value="White">White</li>
									<li><input type="checkbox" wire:model ="racial" value="Multiracial">Multiracial</li>
								</ul>
							</div>
							<div class="ethinicity ">
								<span>What is your ethinicity ?if more than one separate
									ethnicities with a comma. Example: Filipino , Hawaiian , Irish
									, Italian , Middle Eastern , Salvadorian" </span>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<input type="text" class="form-control" wire:model ='ethinicity'
											 />
									</div>

								</div>

							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Current School *</label><select class="form-control"
											wire:model='current_school'>
											<option value="">-- Please Choose --</option>
											<option value="test_school">Test School </option>

										</select>
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
	
	</form>

</div>
