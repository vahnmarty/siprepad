<div>
    <form class="kt-form" id="kt_form" wire:submit.prevent="saveOrUpdate">
        <div class="kt-heading kt-heading--md heading1">Edit Family Spirituality and Community
            Information
        </div>
        @if ($getReligious)
            <div class="kt-heading kt-heading--md">
                <h5 class="headline2">Religious Background</h5>
                <p class="content-text"><small><b>DIRECTIONS:</b> This section is to be completed by a parent/guardian. Please prepare and save
                    your answers in a word document first. Then, copy and paste your answers on this page. This will
                    ensure you will always have a back up of your work.</small></p>
            </div>
            <div class="kt-form__section kt-form__section--first">
                <div class="kt-wizard-v2__form">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>Applicant(s)'s Religion:</label>
                                <select
                                    class="form-control {{ $errors->has('getReligious.religion_id') ? 'is-invalid' : '' }}"
                                    id="exampleSelect1" name="religion_id" wire:model='getReligious.religion_id'>
                                    <option value="">-- Please Choose --</option>
                                    @foreach ($religionList as $religion)
                                        <option value="{{ $religion['id'] }}">
                                            {{ $religion['religion_name'] }}</option>
                                    @endforeach
                                </select>
                                @error('getReligious.religion_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @if ($getReligious['religion_id'] == 9)
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label>If "Other," add it here:</label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('getReligious.other_religion') ? 'is-invalid' : '' }}"
                                        name="other_religion" placeholder="graduation year"
                                        wire:model.defer='getReligious.other_religion'>
                                    @error('getReligious.other_religion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="row">

                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>Church/Faith Community:</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('getReligious.church_faith_community') ? 'is-invalid' : '' }}"
                                    name="church_faith_community" placeholder="graduation year"
                                    wire:model.defer='getReligious.church_faith_community'>
                                @error('getReligious.church_faith_community')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>Church/Faith Community Location: </label>
                                <input type="text"
                                    class="form-control {{ $errors->has('getReligious.church_faith_location') ? 'is-invalid' : '' }}"
                                    name="church_faith_location" placeholder="graduation year"
                                    wire:model.defer='getReligious.church_faith_location'>
                                @error('getReligious.church_faith_location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    @foreach ($religiousInformation as $key => $info)
                        <div class="row student__count">
                            <div class="col-xl-12 student-count__child">
                                <span class=""># Student {{ $key + 1 }}</span>
                            </div>

                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label>Student {{ $key + 1 }}'s Baptism Year:</label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('religiousInformation.' . $key . '.student_baptism_year') ? 'is-invalid' : '' }}"
                                        name="student_baptism_year" placeholder="graduation year"
                                        wire:model.defer='religiousInformation.{{ $key }}.student_baptism_year'>
                                    @error('religiousInformation.*.student_baptism_year')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label>Student {{ $key + 1 }}'s Confirmation Year: </label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('religiousInformation.' . $key . '.student_confirmation_year') ? 'is-invalid' : '' }}"
                                        name="student_confirmation_year" placeholder="graduation year"
                                        wire:model.defer='religiousInformation.{{ $key }}.student_confirmation_year'>
                                    @error('religiousInformation.*.student_confirmation_year')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="kt-heading kt-heading--md">
                <h5 class="headline2">Family Spirituality and Community</h5>
            </div>
            <div class="kt-form__section kt-form__section--first">
                <div class="kt-wizard-v2__form">

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label>What impact does community have in your life and how do you best support your
                                    child's school community?</label>
                                <small class="sub-lable">(500 characters maximum, approximately 75 words)</small>
                                <textarea class="form-control {{ $errors->has('getReligious.family_spirituality_statement') ? 'is-invalid' : '' }}"
                                    name="family_spirituality_statement" wire:model.defer='getReligious.family_spirituality_statement'></textarea>
                                @error('getReligious.family_spirituality_statement')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label>How would you describe your family's spirituality?</label>
                                <small class="sub-lable">Check all that apply.</small>
                                <div class="kt-checkbox-inline">
                                    @foreach ($spiritualityList as $item)
                                        <label class="kt-checkbox">
                                            <input type="checkbox" value="{{ $item['id'] }}"
                                                wire:model="getReligious.family_spirituality.{{ $item['id'] }}">
                                            {{ $item['name'] }}
                                            <span></span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label>Describe in more detail the practice(s) checked above.</label>
                                <small class="sub-lable">(500 characters maximum, approximately 75 words)</small>
                                <textarea class="form-control {{ $errors->has('getReligious.describe_family_spirituality') ? 'is-invalid' : '' }}"
                                    name="describe_family_spirituality" wire:model.defer='getReligious.describe_family_spirituality'></textarea>
                                @error('getReligious.describe_family_spirituality')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <h5 class="headline2">Will you encourage your child to proactively participate in the following activities?</h5><br>

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>Religious Studies Classes:</label>
                                <select
                                    class="form-control {{ $errors->has('getReligious.religious_studies_classes') ? 'is-invalid' : '' }}"
                                    id="exampleSelect1" name="religious_studies_classes"
                                    wire:model.defer='getReligious.religious_studies_classes'>
                                    <option value="">-- Please Choose --</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    <option value="Unsure">Unsure</option>
                                </select>
                                @error('getReligious.religious_studies_classes')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>If No/Unsure, please explain:</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('getReligious.religious_studies_explain') ? 'is-invalid' : '' }}"
                                    name="getReligious.religious_studies_explain" placeholder="First Name"
                                    wire:model.defer='getReligious.religious_studies_explain'>
                                @error('getReligious.religious_studies_explain')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>School Liturgies:</label>
                                <select
                                    class="form-control {{ $errors->has('getReligious.school_liturgies') ? 'is-invalid' : '' }}"
                                    id="exampleSelect1" name="school_liturgies"
                                    wire:model.defer='getReligious.school_liturgies'>
                                    <option value="">-- Please Choose --</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    <option value="Unsure">Unsure</option>
                                </select>
                                @error('getReligious.school_liturgies')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>If No/Unsure, please explain:</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('getReligious.school_liturgies_explain') ? 'is-invalid' : '' }}"
                                    name="getReligious.school_liturgies_explain" placeholder="First Name"
                                    wire:model.defer='getReligious.school_liturgies_explain'>
                                @error('getReligious.school_liturgies_explain')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>Retreats:</label>
                                <select
                                    class="form-control {{ $errors->has('getReligious.retreats') ? 'is-invalid' : '' }}"
                                    id="exampleSelect1" name="retreats" wire:model.defer='getReligious.retreats'>
                                    <option value="">-- Please Choose --</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    <option value="Unsure">Unsure</option>
                                </select>
                                @error('getReligious.retreats')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>If No/Unsure, please explain:</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('getReligious.retreats_explain') ? 'is-invalid' : '' }}"
                                    name="getReligious.retreats_explain" placeholder="First Name"
                                    wire:model.defer='getReligious.retreats_explain'>
                                @error('getReligious.retreats_explain')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>Community Service:</label>
                                <select
                                    class="form-control {{ $errors->has('getReligious.community_service') ? 'is-invalid' : '' }}"
                                    id="exampleSelect1" name="community_service"
                                    wire:model.defer='getReligious.community_service'>
                                    <option value="">-- Please Choose --</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    <option value="Unsure">Unsure</option>
                                </select>
                                @error('getReligious.community_service')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>If No/Unsure, please explain:</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('getReligious.community_service_explain') ? 'is-invalid' : '' }}"
                                    name="getReligious.community_service_explain" placeholder="First Name"
                                    wire:model.defer='getReligious.community_service_explain'>
                                @error('getReligious.community_service_explain')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>Religious Form Submitted By:</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('getReligious.religious_form_submitted_by') ? 'is-invalid' : '' }}"
                                    name="getReligious.religious_form_submitted_by" placeholder="First Name"
                                    wire:model.defer='getReligious.religious_form_submitted_by'>
                                @error('getReligious.religious_form_submitted_by')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>Relationship to Student(s):</label>
                                <select
                                    class="form-control {{ $errors->has('getReligious.relationship_id') ? 'is-invalid' : '' }}"
                                    id="exampleSelect1" name="relationship_id"
                                    wire:model.defer='getReligious.relationship_id'>
                                    <option value="">-- Please Choose --</option>
                                    @foreach ($relationshipList as $relationship)
                                        <option value="{{ $relationship['id'] }}">
                                            {{ $relationship['relationship_name'] }}</option>
                                    @endforeach
                                </select>
                                @error('getReligious.relationship_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
