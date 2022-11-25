<div>
    <form class="kt-form" id="kt_form" wire:submit.prevent="saveOrUpdate">
        <div class="kt-heading kt-heading--md heading1">Edit Alumni/Legacy Family Information</div>
        @if ($getLegacy)
            <div class="kt-heading kt-heading--md">
                <p>Do you have family members who have attended SI?
                    <span
                        class="other_child">&nbsp;{{ $getLegacy->is_family_members_attended_si == 1 ? 'Yes' : 'No' }}</span>
                </p>
                <small><b> NOTE:</b> Sibling alums should be listed in the Sibling Info section.</small>
            </div>
            @if ($getLegacy->is_family_members_attended_si == 1)
                @forelse ($legacyInformation as $key => $legacy)
                    <div class="kt-form__section kt-form__section--first">
                        <div class="student__count">
                            <span class="">
                                Legacy Relative {{ $key + 1 }}</span>
                        </div>
                        <div class="kt-wizard-v2__form">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label>First Name:</label>
                                        <input type="text"
                                            class="form-control {{ $errors->has('legacyInformation.' . $key . '.first_name') ? 'is-invalid' : '' }}"
                                            name="first_name" placeholder="First Name"
                                            wire:model.defer='legacyInformation.{{ $key }}.first_name'>
                                        @error('legacyInformation.*.first_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label>Last Name:</label>
                                        <input type="text"
                                            class="form-control {{ $errors->has('legacyInformation.' . $key . '.last_name') ? 'is-invalid' : '' }}"
                                            name="last_name" placeholder="Last Name"
                                            wire:model.defer='legacyInformation.{{ $key }}.last_name'>
                                        @error('legacyInformation.*.last_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label>Relationship:</label>
                                        <select
                                            class="form-control {{ $errors->has('legacyInformation.' . $key . '.relationship_id') ? 'is-invalid' : '' }}"
                                            id="exampleSelect1" name="relationship_id"
                                            wire:model='legacyInformation.{{ $key }}.relationship_id'>
                                            <option value="">-- Please Choose --</option>
                                            @foreach ($relationshipList as $relationship)
                                                <option value="{{ $relationship['id'] }}">
                                                    {{ $relationship['relationship_name'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('legacyInformation.*.relationship_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label>Graduation Year:</label>
                                        <input type="text"
                                            class="form-control {{ $errors->has('legacyInformation.' . $key . '.graduation_year') ? 'is-invalid' : '' }}"
                                            name="graduation_year" placeholder="graduation year"
                                            wire:model.defer='legacyInformation.{{ $key }}.graduation_year'>
                                        @error('legacyInformation.*.graduation_year')
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
                @if ($legacyInformation)
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
