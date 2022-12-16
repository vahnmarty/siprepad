
<form wire:submit.prevent="SaveEmergencyContact">
	<div class="home-wrap hme-wrp2">
		<div class="progress-outr"></div>
		<div class="form-outr">

			<div class="form-outr">
				<div class="cmn-hdr">

					<h4>Emergency Contact</h4>
				</div>

				<div class="school-wrap step__two">
					<div class="form-wrap">
						<div class="row">
							<div style="text-align: right" class="col-lg-4">
								<label>Emergency Contact Name (if pareints/guardians are
									unavailable):</label>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<input type="text" class="form-control"
										wire:model='emergency_contact_name' />
									@error('emergency_contact_name')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>

						</div>
						<div class="row">
							<div style="text-align: right" class="col-lg-4">
								<label>Emergency Contact Relationship to Student:</label>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<select class="form-control" wire:model='relation_to_student'>
										<option value="">-- Please Choose --</option>
										<option value="stepmother">Stepmother</option>
										<option value="stepfather">Stepfather</option>
										<option value="siblings">Siblings</option>
										<option value="friends">Friends</option>

									</select> @error('relation_to_student')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>

						</div>
						<div class="row">
							<div style="text-align: right" class="col-lg-4">
								<label>Emergency Contact Home Phone:</label>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<input type="tel" class="form-control" wire:model='home_phone' />
									@error('home_phone')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>

						</div>
						<div class="row">
							<div style="text-align: right" class="col-lg-4">
								<label>Emergency Contact Mobile Phone:</label>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<input type="tel" class="form-control"
										wire:model='mobile_phone' /> @error('mobile_phone')
									<p class="text-danger">{{$message}}</p>
									@enderror
								</div>
							</div>

						</div>
						<div class="row">
							<div style="text-align: right" class="col-lg-4">
								<label>Emergency Contact Work Phone:</label>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<input type="tel" class="form-control" wire:model='work_phone' />
									@error('work_phone')
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





