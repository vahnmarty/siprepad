<div>
    <form class="kt-form" id="kt_form" wire:submit.prevent="saveOrUpdate">
        <div class="kt-heading kt-heading--md heading1">Edit Parent Information</div>
        {{-- dd($parentInfo) --}}
        @forelse ($parentInfo as $key => $parent)
            <div class="kt-form__section kt-form__section--first">
                <div class="student__count">
                    <span class=""># Parent/Guardian {{ $key + 1 }}</span>
                </div>
                <div class="kt-wizard-v2__form">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>Relationship:</label>
                                <select
                                    class="form-control {{ $errors->has('parentInfo.' . $key . '.salutation_id') ? 'is-invalid' : '' }}"
                                    id="exampleSelect1" name="salutation_id"
                                    wire:model='parentInfo.{{ $key }}.salutation_id'>
                                    <option value="">-- Please Choose --</option>
                                    @foreach ($salutationList as $salutation)
                                        <option value="{{ $salutation['id'] }}">
                                            {{ $salutation['salutation_name'] }}</option>
                                    @endforeach
                                </select>
                                @error('parentInfo.*.salutation_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>Mobile Phone:</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('parentInfo.' . $key . '.mobile_number') ? 'is-invalid' : '' }}"
                                    name="mobile_number" placeholder="Mobile Phone"
                                    wire:model.defer='parentInfo.{{ $key }}.mobile_number'>
                                @error('parentInfo.*.mobile_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>Salutation:</label>
                                <select
                                    class="form-control {{ $errors->has('parentInfo.' . $key . '.relationship_id') ? 'is-invalid' : '' }}"
                                    id="exampleSelect1" name="relationship_id"
                                    wire:model='parentInfo.{{ $key }}.relationship_id'>
                                    <option value="">-- Please Choose --</option>
                                    @foreach ($relationshipList as $relationship)
                                        <option value="{{ $relationship['id'] }}">
                                            {{ $relationship['relationship_name'] }}</option>
                                    @endforeach
                                </select>
                                @error('parentInfo.*.relationship_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label> Personal Email:</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('parentInfo.' . $key . '.email') ? 'is-invalid' : '' }}"
                                    name="email" placeholder="Personal Email"
                                    wire:model.defer='parentInfo.{{ $key }}.email'>
                                @error('parentInfo.*.email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label>Legal First Name</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('parentInfo.' . $key . '.first_name') ? 'is-invalid' : '' }}"
                                    name="first_name" placeholder="First Name"
                                    wire:model.defer='parentInfo.{{ $key }}.first_name'>
                                @error('parentInfo.*.first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label>Legal Middle Name</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('parentInfo.' . $key . '.middle_name') ? 'is-invalid' : '' }}"
                                    name="middle_name" placeholder="Middle Name"
                                    wire:model.defer='parentInfo.{{ $key }}.middle_name'>
                                @error('parentInfo.*.middle_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                {{-- <span class="form-text text-muted">Please enter your middle name.</span> --}}
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label>Legal Last Name</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('parentInfo.' . $key . '.last_name') ? 'is-invalid' : '' }}"
                                    name="last_name" placeholder="Last Name"
                                    wire:model.defer='parentInfo.{{ $key }}.last_name'>
                                @error('parentInfo.*.last_name')
                                    {{-- <div class="invalid-feedback">Please enter your last name.</div> --}}
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>Legal Suffix:</label>
                                <select
                                    class="form-control {{ $errors->has('parentInfo.' . $key . '.suffix_id') ? 'is-invalid' : '' }}"
                                    id="exampleSelect1" name="suffix_id"
                                    wire:model='parentInfo.{{ $key }}.suffix_id'>
                                    <option value="">-- Please Choose --</option>
                                    @foreach ($suffixList as $suffix)
                                        <option value="{{ $suffix['id'] }}">
                                            {{ $suffix['suffix_name'] }}</option>
                                    @endforeach
                                </select>

                                @error('parentInfo.*.name_suffix')
                                    {{-- <div class="invalid-feedback">Please enter legal suffix.</div> --}}
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>Address:</label>
                                <select
                                    class="form-control {{ $errors->has('parentInfo.' . $key . '.address_id') ? 'is-invalid' : '' }}"
                                    id="exampleSelect1" name="address_id"
                                    wire:model='parentInfo.{{ $key }}.address_id'>
                                    <option value="">-- Please Choose --</option>
                                    @foreach ($addressList as $addKey => $address)
                                        <option value="{{ $address['id'] }}">
                                            @if ($addKey + 1 == 1)
                                                Primary Address
                                            @elseif ($addKey + 1 == 2)
                                                Secondary Address
                                            @else
                                                Other Address {{ $addKey - 1 }}
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                                @error('parentInfo.*.address_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>Employer:</label>
                                <input type="tel"
                                    class="form-control {{ $errors->has('parentInfo.' . $key . '.employer') ? 'is-invalid' : '' }}"
                                    name="employer" placeholder="Employer" value=""
                                    wire:model.defer='parentInfo.{{ $key }}.employer'>
                                <span class="form-text text-muted"></span>
                                @error('parentInfo.*.employer')
                                    {{-- <div class="invalid-feedback">Please enter your mobile phone.</div> --}}
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label> Title:</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('parentInfo.' . $key . '.title') ? 'is-invalid' : '' }}"
                                    name="title" placeholder="title" value=""
                                    wire:model.defer='parentInfo.{{ $key }}.title'>

                                @error('parentInfo.*.title')
                                    {{-- <div class="invalid-feedback">Please enter your personal email.</div> --}}
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label> Work Phone:</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('parentInfo.' . $key . '.work_phone') ? 'is-invalid' : '' }}"
                                    name="work_phone" placeholder="phone" value=""
                                    wire:model.defer='parentInfo.{{ $key }}.work_phone'>
                                @error('parentInfo.*.work_phone')
                                    {{-- <div class="invalid-feedback">Please enter your preferred first name.</div> --}}
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label> Work Email</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('parentInfo.' . $key . '.work_email') ? 'is-invalid' : '' }}"
                                    name="lname" placeholder="Last Name" value=""
                                    wire:model.defer='parentInfo.{{ $key }}.work_email'>
                                @error('parentInfo.*.work_email')
                                    {{-- <div class="invalid-feedback">Please enter ethnicity.</div> --}}
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label>List all high schools, colleges, or graduate schools you have attended:</label>
                                <textarea class="form-control {{ $errors->has('parentInfo.' . $key . '.schoole_collage_list') ? 'is-invalid' : '' }}"
                                    name="first_name" wire:model.defer='parentInfo.{{ $key }}.schoole_collage_list'></textarea>
                                @error('parentInfo.*.schoole_collage_list')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr><br>
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label>
                                    Marital Status Between Biological Parents:
                                </label>
                                <div class="kt-radio-inline">
                                    @foreach ($maritalStatusList as $item)
                                        <label class="kt-radio">
                                            <input type="radio" value="{{ $item['id'] }}"
                                                wire:model="parentInfo.{{ $key }}.marital_status_id">
                                            {{ $item['name'] }}
                                            <span></span>
                                        </label>
                                    @endforeach
                                </div>
                                @error('parentInfo.*.first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label>Living Situation:</label>
                                <div class="kt-radio-list">
                                    @foreach ($livingSituationList as $item)
                                        <label class="kt-radio">
                                            <input type="radio" value="{{ $item['id'] }}"
                                                wire:model="parentInfo.{{ $key }}.living_situation_id">
                                            {{ $item['name'] }}
                                            <span></span>
                                        </label>
                                    @endforeach
                                </div>
                                @error('parentInfo.*.middle_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label>Status:</label><br>
                                <label class="kt-checkbox">
                                    <input type="checkbox" value="1"
                                        wire:model="parentInfo.{{ $key }}.deceased_status">
                                    Deceased
                                    <span></span>
                                </label>
                                @error('parentInfo.*.deceased_status')
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
        @if (!empty($parentInfo))
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
