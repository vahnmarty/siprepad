<div>
    <form class="kt-form" id="kt_form" wire:submit.prevent="saveOrUpdate">
        <div class="kt-heading kt-heading--md heading1">Edit Student Information</div>
        @forelse ($studentInfo as $key => $student)
            <div class="kt-form__section kt-form__section--first">
                <div class="student__count">
                    <span># Student {{ $key + 1 }}</span>
                </div>
                <div class="kt-wizard-v2__form">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label>Legal First Name</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('studentInfo.' . $key . '.first_name') ? 'is-invalid' : '' }}"
                                    name="first_name" placeholder="First Name"
                                    wire:model.defer='studentInfo.{{ $key }}.first_name'>
                                @error('studentInfo.*.first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label>Legal Middle Name</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('studentInfo.' . $key . '.middle_name') ? 'is-invalid' : '' }}"
                                    name="middle_name" placeholder="Middle Name"
                                    wire:model.defer='studentInfo.{{ $key }}.middle_name'>
                                @error('studentInfo.*.middle_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label>Legal Last Name</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('studentInfo.' . $key . '.last_name') ? 'is-invalid' : '' }}"
                                    name="last_name" placeholder="Last Name"
                                    wire:model.defer='studentInfo.{{ $key }}.last_name'>
                                @error('studentInfo.*.last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label> Date of Birth:</label>
                                <input type="date"
                                    class="form-control {{ $errors->has('studentInfo.' . $key . '.dob') ? 'is-invalid' : '' }}"
                                    name="fname" wire:model.defer='studentInfo.{{ $key }}.dob'>
                                @error('studentInfo.*.dob')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label>Gender:</label>
                                <select
                                    class="form-control {{ $errors->has('studentInfo.' . $key . '.gender') ? 'is-invalid' : '' }}"
                                    id="exampleSelect1" name="Student_1_Gender"
                                    wire:model.defer='studentInfo.{{ $key }}.gender'>
                                    <option value="">-- Please Choose --</option>
                                    <option value="Female">Female</option>
                                    <option value="Male">Male</option>
                                </select>
                                @error('studentInfo.*.gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label>Legal Suffix:</label>
                                <select
                                    class="form-control {{ $errors->has('studentInfo.' . $key . '.suffix_id') ? 'is-invalid' : '' }}"
                                    id="exampleSelect1" name="Student_1_Suffix"
                                    wire:model.defer='studentInfo.{{ $key }}.suffix_id'>
                                    <option value="">-- Please Choose --</option>
                                    @foreach ($suffixList as $suffix)
                                        <option value="{{ $suffix['id'] }}">{{ $suffix['suffix_name'] }}</option>
                                    @endforeach
                                </select>
                                @error('studentInfo.*.suffix_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>Mobile Phone:</label>
                                <input type="tel"
                                    class="form-control {{ $errors->has('studentInfo.' . $key . '.mobile_number') ? 'is-invalid' : '' }}"
                                    name="phone" placeholder="phone" value=""
                                    wire:model.defer='studentInfo.{{ $key }}.mobile_number'>
                                <span class="form-text text-muted"></span>
                                @error('studentInfo.*.mobile_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label> Personal Email:</label>
                                <input type="email"
                                    class="form-control {{ $errors->has('studentInfo.' . $key . '.email') ? 'is-invalid' : '' }}"
                                    name="email" placeholder="Email" value=""
                                    wire:model.defer='studentInfo.{{ $key }}.email'>
                                @error('studentInfo.*.email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>Preferred First Name:</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('studentInfo.' . $key . '.preferred_first_name') ? 'is-invalid' : '' }}"
                                    name="preferred_first_name" placeholder="phone" value=""
                                    wire:model.defer='studentInfo.{{ $key }}.preferred_first_name'>
                                @error('studentInfo.*.preferred_first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>What is your ethnicity?</label>
                                <small class="sub-lable">If more than one, separate ethnicities with a comma.</small>
                                <input type="text"
                                    class="form-control {{ $errors->has('studentInfo.' . $key . '.ethnicity') ? 'is-invalid' : '' }}"
                                    name="lname" placeholder="Last Name" value=""
                                    wire:model.defer='studentInfo.{{ $key }}.ethnicity'>
                                @error('studentInfo.*.ethnicity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>Upload a recent photo of yourself to personalize your application</label>
                                <input type="file"
                                    class="form-control {{ $errors->has('studentInfo.' . $key . '.application_photo') ? 'is-invalid' : '' }}"
                                    name="application_photo"
                                    wire:model.defer='studentInfo.{{ $key }}.application_photo'>
                                @error('studentInfo.*.application_photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <figure class="main_img">
                                @if ($student['photo'])
                                    @if (isset($student['application_photo']))
                                        <img src="{{ $student['application_photo']->temporaryUrl() }}"
                                            height="70px" width="70px">
                                    @else
                                        <img src="{{ asset($student['photo']) }}" alt="" height="70px"
                                            width="70px">
                                    @endif
                                @else
                                    @if (isset($student['application_photo']))
                                        <img src="{{ $student['application_photo']->temporaryUrl() }}"
                                            height="70px" width="70px">
                                    @else
                                        <img src="{{ asset('admin_assets/media/users/default.jpg') }}"
                                            alt="" height="70px" width="70px">
                                    @endif
                                @endif
                            </figure>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label>How do you identify racially?</label>
                                <small class="sub-lable">If you identify with more than one race, select all that apply to you.</small>
                                <div class="kt-checkbox-inline">
                                    @foreach ($identifyRacially as $item)
                                        <label class="kt-checkbox">
                                            <input type="checkbox" value="{{ $item['id'] }}"
                                                wire:model="studentInfo.{{ $key }}.identify_racially.{{ $item['id'] }}">
                                            {{ $item['name'] }}
                                            <span></span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>Current School:</label>
                                <select
                                    class="form-control {{ $errors->has('studentInfo.' . $key . '.current_school_id') ? 'is-invalid' : '' }}"
                                    id="exampleSelect1" name="current_school_id"
                                    wire:model='studentInfo.{{ $key }}.current_school_id'>
                                    @foreach ($schoolList as $school)
                                        <option value="{{ $school['id'] }}">{{ $school['school_name'] }}</option>
                                    @endforeach
                                </select>
                                @error('studentInfo.*.current_school_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @if ($student['current_school_id'] == 125)
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label> If not listed, add it here:</label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('studentInfo.' . $key . '.not_listed_school') ? 'is-invalid' : '' }}"
                                        name="not_listed_school" placeholder="" value=""
                                        wire:model.defer='studentInfo.{{ $key }}.not_listed_school'>
                                    @error('studentInfo.*.not_listed_school')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        @endif

                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>Other High School # 1:</label>
                                <select
                                    class="form-control {{ $errors->has('studentInfo.' . $key . '.other_high_school_one_id') ? 'is-invalid' : '' }}"
                                    id="exampleSelect1" name="other_high_school_one_id"
                                    wire:model.defer='studentInfo.{{ $key }}.other_high_school_one_id'>
                                    <option value="">-- Please Choose --</option>
                                    @foreach ($schoolList as $school)
                                        <option value="{{ $school['id'] }}">{{ $school['school_name'] }}</option>
                                    @endforeach
                                </select>
                                @error('studentInfo.*.other_high_school_one_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>Other High School # 2:</label>
                                <select
                                    class="form-control {{ $errors->has('studentInfo.' . $key . '.other_high_school_two_id') ? 'is-invalid' : '' }}"
                                    id="exampleSelect1" name="other_high_school_two_id"
                                    wire:model.defer='studentInfo.{{ $key }}.other_high_school_two_id'>
                                    <option value="">-- Please Choose --</option>
                                    @foreach ($schoolList as $school)
                                        <option value="{{ $school['id'] }}">{{ $school['school_name'] }}</option>
                                    @endforeach
                                </select>
                                @error('studentInfo.*.other_high_school_two_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>Other High School # 3:</label>
                                <select
                                    class="form-control {{ $errors->has('studentInfo.' . $key . '.other_high_school_three_id') ? 'is-invalid' : '' }}"
                                    id="exampleSelect1" name="other_high_school_three_id"
                                    wire:model.defer='studentInfo.{{ $key }}.other_high_school_three_id'>
                                    <option value="">-- Please Choose --</option>
                                    @foreach ($schoolList as $school)
                                        <option value="{{ $school['id'] }}">{{ $school['school_name'] }}</option>
                                    @endforeach
                                </select>
                                @error('studentInfo.*.other_high_school_three_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>Other High School # 4:</label>
                                <select
                                    class="form-control {{ $errors->has('studentInfo.' . $key . '.other_high_school_four_id') ? 'is-invalid' : '' }}"
                                    id="exampleSelect1" name="other_high_school_four_id"
                                    wire:model.defer='studentInfo.{{ $key }}.other_high_school_four_id'>
                                    <option value="">-- Please Choose --</option>
                                    @foreach ($schoolList as $school)
                                        <option value="{{ $school['id'] }}">{{ $school['school_name'] }}</option>
                                    @endforeach
                                </select>
                                @error('studentInfo.*.other_high_school_four_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="no_data__found">
                <h3>No data found</h3>
            </div>
        @endforelse
        <!--begin: Form Actions -->
        @if (!empty($studentInfo))
            <div class="kt-form__actions">
                <a href="{{ route('application.index') }}"
                    class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">Back</a>
                <button type="submit"
                    class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">Update</button>
            </div>
        @endif
        <!--end: Form Actions -->
    </form>
</div>
