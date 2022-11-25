<div>
    <form class="kt-form" id="kt_form" wire:submit.prevent="saveOrUpdate">
        <div class="kt-heading kt-heading--md heading1">Edit Siblings Information</div>
        @if ($getSibling)
            <div class="kt-heading kt-heading--md">
                <p>Do you have other children? <span
                        class="other_child">{{ $getSibling->is_other_child == 1 ? 'Yes' : 'No' }}</span></p>
            </div>
            @if ($getSibling->is_other_child == 1)
                @forelse ($childInfo as $key => $child)
                    <div class="kt-form__section kt-form__section--first">
                        <div class="student__count">
                            <span class="">Child {{ $key + 1 }}</span>
                        </div>
                        <div class="kt-wizard-v2__form">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text"
                                            class="form-control {{ $errors->has('childInfo.' . $key . '.first_name') ? 'is-invalid' : '' }}"
                                            name="first_name" placeholder="First Name"
                                            wire:model.defer='childInfo.{{ $key }}.first_name'>
                                        @error('childInfo.*.first_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group">
                                        <label>Middle Name</label>
                                        <input type="text"
                                            class="form-control {{ $errors->has('childInfo.' . $key . '.middle_name') ? 'is-invalid' : '' }}"
                                            name="middle_name" placeholder="Middle Name"
                                            wire:model.defer='childInfo.{{ $key }}.middle_name'>
                                        @error('childInfo.*.middle_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        {{-- <span class="form-text text-muted">Please enter your middle name.</span> --}}
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text"
                                            class="form-control {{ $errors->has('childInfo.' . $key . '.last_name') ? 'is-invalid' : '' }}"
                                            name="last_name" placeholder="Last Name"
                                            wire:model.defer='childInfo.{{ $key }}.last_name'>
                                        @error('childInfo.*.last_name')
                                            {{-- <div class="invalid-feedback">Please enter your last name.</div> --}}
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="form-group">
                                        <label>Suffix:</label>
                                        <select
                                            class="form-control {{ $errors->has('childInfo.' . $key . '.suffix_id') ? 'is-invalid' : '' }}"
                                            id="exampleSelect1" name="suffix_id"
                                            wire:model='childInfo.{{ $key }}.suffix_id'>
                                            <option value="">-- Please Choose --</option>
                                            @foreach ($suffixList as $suffix)
                                                <option value="{{ $suffix['id'] }}">{{ $suffix['suffix_name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('childInfo.*.suffix_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group">
                                        <label>Relationship:</label>
                                        <select
                                            class="form-control {{ $errors->has('childInfo.' . $key . '.relationship_id') ? 'is-invalid' : '' }}"
                                            id="exampleSelect1" name="relationship_id"
                                            wire:model='childInfo.{{ $key }}.relationship_id'>
                                            <option value="">-- Please Choose --</option>
                                            @foreach ($relationshipList as $relationship)
                                                <option value="{{ $relationship['id'] }}">
                                                    {{ $relationship['relationship_name'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('childInfo.*.relationship_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group">
                                        <label>Current Grade:</label>
                                        <select
                                            class="form-control {{ $errors->has('childInfo.' . $key . '.grade_id') ? 'is-invalid' : '' }}"
                                            id="exampleSelect1" name="grade_id"
                                            wire:model='childInfo.{{ $key }}.grade_id'>
                                            <option value="">-- Please Choose --</option>
                                            @foreach ($gradeList as $grade)
                                                <option value="{{ $grade['id'] }}">{{ $grade['grade_name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('childInfo.*.grade_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-7">
                                    <div class="form-group">
                                        <label>Current School:</label>
                                        <select
                                            class="form-control {{ $errors->has('childInfo.' . $key . '.current_school_id') ? 'is-invalid' : '' }}"
                                            id="exampleSelect1" name="current_school_id"
                                            wire:model='childInfo.{{ $key }}.current_school_id'>
                                            <option value="">-- Please Choose --</option>
                                            @foreach ($schoolList as $school)
                                                <option value="{{ $school['id'] }}">{{ $school['school_name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('childInfo.*.current_school_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                @if ($child['current_school_id'] == 125)
                                    <div class="col-xl-5">
                                        <div class="form-group">
                                            <label> If not listed, add it here:</label>
                                            <input type="text"
                                                class="form-control {{ $errors->has('childInfo.' . $key . '.not_listed_school') ? 'is-invalid' : '' }}"
                                                name="not_listed_school" placeholder="" value=""
                                                wire:model.defer='childInfo.{{ $key }}.not_listed_school'>
                                            @error('childInfo.*.not_listed_school')
                                                {{-- <div class="invalid-feedback">Please enter your school name.</div> --}}
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                @endif
                                <div class="col-xl-5">
                                    <div class="form-group">
                                        <label> HS Graduation Year:</label>
                                        <input type="number"
                                            class="form-control {{ $errors->has('childInfo.' . $key . '.hs_graduation_year') ? 'is-invalid' : '' }}"
                                            name="hs_graduation_year" placeholder="hs graduation year"
                                            wire:model.defer='childInfo.{{ $key }}.hs_graduation_year'>
                                        @error('childInfo.*.hs_graduation_year')
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
                <!--begin: Form Actions -->
                @if ($childInfo)
                    <div class="kt-form__actions">
                        <a href="{{ route('application.index') }}"
                            class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">Back</a>
                        <button type="submit"
                            class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">Update</button>
                    </div>
                @endif
                <!--end: Form Actions -->
            @endif
        @else
            <div class="no_data__found">
                <h3>no data found</h3>
            </div>
        @endif
    </form>
</div>
