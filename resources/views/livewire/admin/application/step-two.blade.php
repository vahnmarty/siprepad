<div>
    <form class="kt-form" id="kt_form" wire:submit.prevent="saveOrUpdate">
        <div class="kt-heading kt-heading--md heading1">Edit Address Information</div>
        @forelse ($addressInfo as $key => $address)
            <div class="kt-form__section kt-form__section--first">
                <div class="student__count">
                    <span>
                        @if ($key + 1 == 1)
                            Primary Address
                        @elseif ($key + 1 == 2)
                            Secondary Address
                        @else
                            Other Address {{ $key - 1 }}
                        @endif
                    </span>
                </div>
                <div class="kt-wizard-v2__form">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label>Address:</label>
                                <textarea class="form-control {{ $errors->has('addressInfo.' . $key . '.address') ? 'is-invalid' : '' }}"
                                    name="first_name" wire:model.defer='addressInfo.{{ $key }}.address'></textarea>
                                @error('addressInfo.*.address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label>Country:</label>
                                <select
                                    class="form-control {{ $errors->has('addressInfo.' . $key . '.country_id') ? 'is-invalid' : '' }}"
                                    id="exampleSelect1" name="country_id"
                                    wire:model='addressInfo.{{ $key }}.country_id'>
                                    <option value="">-- Please Choose --</option>
                                    @foreach ($countryList as $country)
                                        <option value="{{ $country['id'] }}">{{ $country['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('addressInfo.*.country_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @php
                            $getState = App\Models\State::where('country_id', $address['country_id'])
                                ->get()
                                ->toArray();
                        @endphp
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label>State/Province:</label>
                                <select
                                    class="form-control {{ $errors->has('addressInfo.' . $key . '.state_id') ? 'is-invalid' : '' }}"
                                    id="exampleSelect1" name="state_id"
                                    wire:model='addressInfo.{{ $key }}.state_id'>
                                    <option value="">-- Please Choose --</option>
                                    @foreach ($getState as $state)
                                        <option value="{{ $state['id'] }}">{{ $state['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('addressInfo.*.state_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @php
                            $getCity = App\Models\City::where('state_id', $address['state_id'])
                                ->get()
                                ->toArray();
                        @endphp
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label>City:</label>
                                <select
                                    class="form-control {{ $errors->has('addressInfo.' . $key . '.city_id') ? 'is-invalid' : '' }}"
                                    id="exampleSelect1" name="city_id"
                                    wire:model='addressInfo.{{ $key }}.city_id'>
                                    <option value="">-- Please Choose --</option>
                                    @foreach ($getCity as $city)
                                        <option value="{{ $city['id'] }}">{{ $city['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('addressInfo.*.city_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label>Zipcode:</label>
                                <input type="number"
                                    class="form-control {{ $errors->has('addressInfo.' . $key . '.zipcode') ? 'is-invalid' : '' }}"
                                    name="zipcode" placeholder="zip code"
                                    wire:model.defer='addressInfo.{{ $key }}.zipcode'>
                                @error('addressInfo.*.zipcode')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="form-group">
                                <label>Primary Phone Number at Location: :</label>
                                <input type="number"
                                    class="form-control {{ $errors->has('addressInfo.' . $key . '.primary_phone_number') ? 'is-invalid' : '' }}"
                                    name="primary_phone_number" placeholder="primary phone number"
                                    wire:model.defer='addressInfo.{{ $key }}.primary_phone_number'>
                                @error('addressInfo.*.primary_phone_number')
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
        @if ($addressInfo)
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
