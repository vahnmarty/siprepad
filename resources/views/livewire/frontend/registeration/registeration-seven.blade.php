
<form wire:submit.prevent="submit" method="post">
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
									You have been placed in:<br><label class="blck"><input type="checkbox"
										wire.model.defer="english_placement" name="english_placement" id="english_placement" checked>English 100 (College Prep Freshman
										English)</label><br> NOTE: Any interested freshman students
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
									You have been placed in:<br> <input type="radio"
										wire.model.defer="math_placement"><span class="blck"
										style="margin: 4px">Algebra 1 Accelerated (College Prep
										Accelerated Algebra) </span><br> If you want to challenge your
									math placement, you are required to take the Challenge Test on
									April 30, 2022.<br> <label>Do you want to make a reservation to
										take the Math Challenge Test on April 30,2023" </label><br> <label class="blck"><input
										type="radio" name="math_challenge_reservation" id="yes" value="yes"
										wire.model.defer="math_challenge_reservation">Yes</label>
										<label class="blck"> <input type="radio"
										name="math_challenge_reservation" id="no" wire.model.defer="math_challenge_reservation"
										value="No"><span class="blck" style="margin: 4px">No</label>
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-lg-4">
								<h4>Language Selection</h4>
							</div>
							<div class="col-lg-10">
								<div class="form-group">
								<label class ="blck">Please indicate your language choice: </label><br> <label class ="blck"><input
										type="checkbox" wire.model="language" value="french" id="french">French</label><br>
									<label class ="blck"><input type="checkbox" wire.model="language"
										value="latin" id="latin">Latin</label><br> <label class ="blck"><input type="checkbox"
										wire.model="language" value="mandarin"id="mandarin">Mandarin</label><br> 
										
									  <label class ="blck"><input type="checkbox" wire.model.defer="language" id="spanish" value="spanish">Spanish</label><br> To place
									in a more advanced section of your language choice than
									beginning level, you are required to take a Language Placement
									Test on April 30, 2022.<br> <label>Do you want to make a
										reservation to take the Language Placement Test on April
										30,2023 </label><br> <input type="radio"
										name="language_placement_test" id="language"
										wire.model.defer="language_placement_test" value="yes"><span
										class="blck" style="margin: 4px" value="Yes">Yes</span> <input
										type="radio" name="language" id="language"
										wire.model.defer="language_plecement_test" value="No"><span
										class="blck" style="margin: 4px">No</span><br> <label
										class="blck">Check ALL that apply to your language choice: </label><br>
									<input type="checkbox" wire.model.defer="checks_apply_to_language"
										value="speak this language every day"
										><span class="blck"
										style="margin: 4px">I speak this language every day</span><br>
									<input type="checkbox" wire.model.defer="checks_apply_to_language"
										value="understand this language but do not speak this language"
										"><span class="blck"
										style="margin: 4px">I understand this language but do not
										speak this language</span><br> <input type="checkbox"
										wire.model.defer="checks_apply_to_language"
										value="speak this language occasionally with family and/or friends"
										><span class="blck"
										style="margin: 4px">I speak this language occasionally with
										family and/or friends</span><br> <input type="checkbox"
										wire.model.defer="checks_apply_to_language"
										value="My current school is a language immersion program"
									><span class="blck"
										style="margin: 4px">My current school is a language immersion
										program </span><br> <input type="checkbox"
										wire.model.defer="checks_apply_to_language"
										value="currently taking or have taken this language at my current school"
										><span class="blck"
										style="margin: 4px">I am currently taking or have taken this
										language at my current school </span><br> <input
										type="checkbox" wire.model.defer="checks_apply_to_language"
										value=" currently taking a course in this language outside of school"
										><span class="blck"
										style="margin: 4px">I am currently taking a course in this
										language outside of school </span><br> <input type="checkbox"
										wire.model.defer="checks_apply_to_language"
										value="None of the above" ><span
										class="blck" style="margin: 4px">I None of the above </span><br>
									<label>If your language choice is not available due to
										scheduling demands, are you open to choosing another
										language?* </label> <select class="form-control"
										style="width: 25%"
										wire.model.defer.defer='open_to_choosing_another_language'
										value="{{ old('open_to_choosing_another_language') }}">
										<option value="">Please Choose</option>
										<option value="yes">Yes</option>
										<option value="no">No</option>

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
	</div>
</form>
