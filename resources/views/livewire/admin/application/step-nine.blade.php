<div>
    <form class="kt-form" id="kt_form" wire:submit.prevent="saveOrUpdate">
        <div class="kt-heading kt-heading--md heading1">Edit Applicant Writing Sample</div>
        @if (count($writingSampleInfo) > 0)
            <div class="kt-heading kt-heading--md">
                <p class="content-text"><b>DIRECTIONS:</b> This section is to be completed by the student. Please prepare
                    and save your answers in a
                    word document first. Then, copy and paste your answers on this page. This will ensure you will
                    always
                    have a back up of your work.</p>
                <small>Select and complete one of the topics below. (1500 characters maximum, approximately 250
                    words)</small>
            </div>
            @forelse ($writingSampleInfo as $key => $address)
                <div class="kt-form__section kt-form__section--first students-sec">
                    <div class="student__count student__count1">
                        <span class="">Student {{ $key + 1 }} - Share with the Admissions Committee</span>
                    </div>
                    <div class="kt-heading kt-heading--md">
                        <h4 class="sub-tittle-text">What matters to you? How does that motivate you, impact your life,
                            your outlook, and/or your
                            identity?</h4>
                        <p class="content-text">What matters to you might be an activity, an idea, a goal, a place,
                            and/or a thing.</p>
                        <p><small><b>PLEASE NOTE:</b> This essay should be about you and your thoughts. It should not be
                                about
                                the life of another person you admire.</small></p>
                        <br>
                        <h2 class="or-text">-- OR --</h2>
                    </div>
                    <div class="kt-wizard-v2__form">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <h4 class="sub-tittle-text">An obstacle you have overcome.</h4>
                                    <small class="sub-lable">Explain how the obstacle impacted you and how you handled
                                        the
                                        situation (i.e.,
                                        positive and/or negative attempts along the way or maybe how you're still
                                        working on
                                        it).
                                        Include what you have learned from the experience and how you have applied (or
                                        might
                                        apply) this to another situation in your life.</small>
                                    <textarea
                                        class="form-control textarea-box {{ $errors->has('writingSampleInfo.' . $key . '.obstacle_overcome_description') ? 'is-invalid' : '' }}"
                                        name="first_name" wire:model.defer='writingSampleInfo.{{ $key }}.obstacle_overcome_description'></textarea>
                                    @error('writingSampleInfo.*.obstacle_overcome_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label class="kt-checkbox">
                                        <input type="checkbox" value="1"
                                            wire:model="writingSampleInfo.{{ $key }}.is_aggree_submitted_writing_sample">
                                        By clicking this box, I (applicant) declare that to the best of my knowledge,
                                        the
                                        information provided in the application submitted to St. Ignatius College
                                        Preparatory on this online application is true and complete.
                                        <span></span>
                                    </label>
                                    @error('writingSampleInfo.*.is_aggree_submitted_writing_sample')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group submitted-sec">
                                    <label>Submitted By:</label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('writingSampleInfo.' . $key . '.submitted_by') ? 'is-invalid' : '' }}"
                                        name="submitted_by" placeholder="primary phone number"
                                        wire:model.defer='writingSampleInfo.{{ $key }}.submitted_by'>
                                    @error('writingSampleInfo.*.submitted_by')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="no_data__found">
                    <h3>no data found</h3>
                </div>
            @endforelse
            @if (!empty($writingSampleInfo))
                <!--begin: Form Actions -->
                <div class="kt-form__actions">
                    <a href="{{ route('application.index') }}"
                        class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">Back</a>
                    <button type="submit"
                        class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">Update</button>
                </div>
                <!--end: Form Actions -->
            @endif
        @else
            <div class="no_data__found">
                <h3>no data found</h3>
            </div>
        @endif
    </form>
</div>
