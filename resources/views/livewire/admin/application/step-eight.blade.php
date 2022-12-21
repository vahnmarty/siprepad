<div>
    <form class="kt-form" id="kt_form" wire:submit.prevent="saveOrUpdate">
        <div class="kt-heading kt-heading--md heading1">Edit Student Statement</div>
        @if (count($getStudentStatement) > 0)
            <div class="kt-heading kt-heading--md">
                <h4>Applicant Statement</h4>
                <small><b>DIRECTIONS:</b> This section is to be completed by the student. Please prepare and save your
                    answers in a word document first. Then, copy and paste your answers on this page. This will ensure
                    you will always have a back up of your work.</small>
            </div>
            @foreach ($getStudentStatement as $sskey => $studentStatement)
                <div class="kt-form__section kt-form__section--first">
                    <div class="student__count">
                        <span class="">Student {{ $sskey + 1 }}</span>
                    </div>
                    <div class="kt-wizard-v2__form">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label>Why did you decide to apply to St. Ignatius College Preparatory?</label>
                                    <small class="sub-lable">(500 characters maximum, approximately 75 words)</small>
                                    <textarea
                                        class="form-control {{ $errors->has('getStudentStatement.' . $sskey . '.statement_one') ? 'is-invalid' : '' }}"
                                        name="statement_one" wire:model.defer='getStudentStatement.{{ $sskey }}.statement_one' max="75"></textarea>
                                    @error('getStudentStatement.*.statement_one')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label>What do you think will be your greatest challenge at SI and how do you plan
                                        to
                                        meet that challenge?</label>
                                    <small class="sub-lable">(500 characters maximum, approximately 75 words)</small>
                                    <textarea
                                        class="form-control {{ $errors->has('getStudentStatement.' . $sskey . '.statement_two') ? 'is-invalid' : '' }}"
                                        name="statement_two" wire:model.defer='getStudentStatement.{{ $sskey }}.statement_two' max="75"></textarea>
                                    @error('getStudentStatement.*.statement_two')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label>What religious activity(-ies) do you plan on participating in at SI as part
                                        of
                                        your spiritual growth and why?</label>
                                    <small class="sub-lable">(500 characters maximum, approximately 75 words)</small>
                                    <textarea
                                        class="form-control {{ $errors->has('getStudentStatement.' . $sskey . '.statement_three') ? 'is-invalid' : '' }}"
                                        name="statement_three" wire:model.defer='getStudentStatement.{{ $sskey }}.statement_three' max="75"></textarea>
                                    @error('getStudentStatement.*.statement_three')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label>Share your positive experience(s) and/or challenges with Distance
                                        Learning.</label>
                                    <small class="sub-lable">(500 characters maximum, approximately 75 words)</small>
                                    <textarea
                                        class="form-control {{ $errors->has('getStudentStatement.' . $sskey . '.statement_four') ? 'is-invalid' : '' }}"
                                        name="statement_four" wire:model.defer='getStudentStatement.{{ $sskey }}.statement_four'></textarea>
                                    @error('getStudentStatement.*.statement_four')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{--  --}}
            @if (count($getExtraCurricularActivity) > 0)
                <div class="kt-heading kt-heading--md">
                    <h4>Extracurricular Activities</h4>
                    <small><b>DIRECTIONS:</b> List up to four current extracurricular activities that you are most
                        passionate about.</small>
                </div>
                {{-- dd($getExtraCurricularActivity) --}}
                @foreach ($getExtraCurricularActivity as $ecakey => $extraCurricularActivity)
                    @foreach ($extraCurricularActivity['activity'] as $akey => $item)
                        {{-- dd($item) --}}
                        <div class="kt-form__section kt-form__section--first">
                            <div class="student__count">
                                <span class="">Student {{ $ecakey + 1 }} - Activity {{ $akey + 1 }}</span>
                            </div>
                            <div class="kt-wizard-v2__form">
                                <div class="row">
                                    <div class="col-xl-4">
                                        <div class="form-group">
                                            <label>Activity Name:</label>
                                            <input type="text"
                                                class="form-control {{ $errors->has('getExtraCurricularActivity.' . $ecakey . '.activity.' . $akey . '.activity_name') ? 'is-invalid' : '' }}"
                                                name="activity_name" placeholder="First Name"
                                                wire:model.defer='getExtraCurricularActivity.{{ $ecakey }}.activity.{{ $akey }}.activity_name'>
                                            @error('getExtraCurricularActivity.*.activity_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="form-group">
                                            <label>Number of Years:</label>
                                            <select
                                                class="form-control {{ $errors->has('getExtraCurricularActivity.' . $ecakey . '.activity.' . $akey . '.number_of_years') ? 'is-invalid' : '' }}"
                                                id="exampleSelect1" name="number_of_years"
                                                wire:model.defer='getExtraCurricularActivity.{{ $ecakey }}.activity.{{ $akey }}.number_of_years'>
                                                <option value="">-- Please Choose --</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                            </select>
                                            @error('getExtraCurricularActivity.*.number_of_years')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="form-group">
                                            <label>Hours per Week:</label>
                                            <select
                                                class="form-control {{ $errors->has('getExtraCurricularActivity.' . $ecakey . '.activity.' . $akey . '.hours_per_week') ? 'is-invalid' : '' }}"
                                                id="exampleSelect1" name="hours_per_week"
                                                wire:model.defer='getExtraCurricularActivity.{{ $ecakey }}.activity.{{ $akey }}.hours_per_week'>
                                                <option value="">-- Please Choose --</option>
                                                <option value="1-2">1 - 2</option>
                                                <option value="3-5">3 - 5</option>
                                                <option value="6-10">6 - 10</option>
                                                <option value="11-15">11 - 15</option>
                                                <option value="16+">16+</option>
                                            </select>
                                            @error('getExtraCurricularActivity.*.hours_per_week')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="form-group">
                                            <label>Share a little information about this activity.</label>
                                            <p>Complete sentences are not necessary.</p>
                                            <small class="sub-lable">(20 word maximum)</small>
                                            <textarea
                                                class="form-control {{ $errors->has('getExtraCurricularActivity.' . $ecakey . '.activity.' . $akey . '.activity_description') ? 'is-invalid' : '' }}"
                                                name="statement_one"
                                                wire:model.defer='getExtraCurricularActivity.{{ $ecakey }}.activity.{{ $akey }}.activity_description'></textarea>
                                            @error('getExtraCurricularActivity.*.activity_description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            @endif
            {{--  --}}
            @if (count($getFutureActivity) > 0)
                <div class="kt-heading kt-heading--md">
                    <h4>Future Activities at SI</h4>
                </div>
                @foreach ($getFutureActivity as $fakey => $futureActivity)
                    <div class="kt-form__section kt-form__section--first">
                        <div class="student__count">
                            <span class="">Student {{ $fakey + 1 }}</span>
                        </div>
                        <div class="kt-wizard-v2__form">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label>From your activities listed above, select the activity you are most
                                            passionate about continuing at SI and describe what you feel you would
                                            contribute to this activity.</label>
                                        <p>You may select an activity not listed above if you feel it is more
                                            appropriate to your situation.</p>
                                        <small class="sub-lable">(500 characters maximum, approximately 75
                                            words)</small>
                                        <textarea
                                            class="form-control {{ $errors->has('getFutureActivity.' . $fakey . '.statement_one') ? 'is-invalid' : '' }}"
                                            name="statement_one" wire:model.defer='getFutureActivity.{{ $fakey }}.statement_one'></textarea>
                                        @error('getFutureActivity.*.statement_one')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label>Select two more extra-curricular activities that you might like to be
                                            involved in at SI.</label>
                                        <p>Explain why these activities appeal to you. Please make sure at least one of
                                            these activities is new to you.</p>
                                        <small class="sub-lable">(500 characters maximum, approximately 75
                                            words)</small>
                                        <textarea
                                            class="form-control {{ $errors->has('getFutureActivity.' . $fakey . '.statement_two') ? 'is-invalid' : '' }}"
                                            name="statement_two" wire:model.defer='getFutureActivity.{{ $fakey }}.statement_two'></textarea>
                                        @error('getFutureActivity.*.statement_two')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            <!--begin: Form Actions -->
            <div class="kt-form__actions">
                <a href="{{ route('application.index') }}"
                    class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">Back</a>
                <button type="submit"
                    class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">Update</button>
            </div>
            <!--end: Form Actions -->
        @else
            <div class="no_data__found">
                <h3>no data found</h3>
            </div>
        @endif
    </form>
</div>
