<div>
    <form wire:submit.prevent="saveOrUpdate">
        <div class="home-wrap hme-wrp2">
            <div class="progress-outr">
                <ul class="progress-ul">
                    <li class="step-complete">
                        @if ($studentInfo)
                            <a href="{{ route('admission-application', ['step' => 'one']) }}">
                                <span>1</span>
                                <h6>Student Info</h6>
                            </a>
                        @else
                            <a href="javascript::void(0)">
                                <span>1</span>
                                <h6>Student Info</h6>
                            </a>
                        @endif
                    </li>
                    <li class="step-complete">
                        @if ($studentInfo)
                            <a href="{{ route('admission-application', ['step' => 'two']) }}">
                                <span>2</span>
                                <h6>Address Info</h6>
                            </a>
                        @else
                            <a href="javascript::void(0)">
                                <span>2</span>
                                <h6>Address Info</h6>
                            </a>
                        @endif
                    </li>
                    <li>
                        @if ($studentInfo)
                            <a href="{{ route('admission-application', ['step' => 'three']) }}">
                                <span>3</span>
                                <h6>Parent Info</h6>
                            </a>
                        @else
                            <a href="javascript::void(0)">
                                <span>3</span>
                                <h6>Parent Info</h6>
                            </a>
                        @endif
                    </li>
                    <li>
                        @if ($studentInfo)
                            <a href="{{ route('admission-application', ['step' => 'four']) }}">
                                <span>4</span>
                                <h6>Sibling Info</h6>
                            </a>
                        @else
                            <a href="javascript::void(0)">
                                <span>4</span>
                                <h6>Sibling Info</h6>
                            </a>
                        @endif
                    </li>
                    <li>
                        @if ($studentInfo)
                            <a href="{{ route('admission-application', ['step' => 'five']) }}">
                                <span>5</span>
                                <h6>Legacy Info</h6>
                            </a>
                        @else
                            <a href="javascript::void(0)">
                                <span>5</span>
                                <h6>Legacy Info</h6>
                            </a>
                        @endif
                    </li>
                    <li>
                        @if ($studentInfo)
                            <a href="{{ route('admission-application', ['step' => 'six']) }}">
                                <span>6</span>
                                <h6>Parent Statement</h6>
                            </a>
                        @else
                            <a href="javascript::void(0)">
                                <span>6</span>
                                <h6>Parent Statement</h6>
                            </a>
                        @endif
                    </li>
                    <li>
                        @if ($studentInfo)
                            <a href="{{ route('admission-application', ['step' => 'seven']) }}">
                                <span>7</span>
                                <h6>Spiritual & Community Info</h6>
                            </a>
                        @else
                            <a href="javascript::void(0)">
                                <span>7</span>
                                <h6>Spiritual & Community Info</h6>
                            </a>
                        @endif
                    </li>
                    <li>
                        @if ($studentInfo)
                            <a href="{{ route('admission-application', ['step' => 'eight']) }}">
                                <span>8</span>
                                <h6>Student Statement</h6>
                            </a>
                        @else
                            <a href="javascript::void(0)">
                                <span>8</span>
                                <h6>Student Statement</h6>
                            </a>
                        @endif
                    </li>
                    <li>
                        @if ($studentInfo)
                            <a href="{{ route('admission-application', ['step' => 'nine']) }}">
                                <span>9</span>
                                <h6>Writing Sample</h6>
                            </a>
                        @else
                            <a href="javascript::void(0)">
                                <span>9</span>
                                <h6>Writing Sample</h6>
                            </a>
                        @endif
                    </li>
                    <li>
                        @if ($studentInfo)
                            <a href="{{ route('admission-application', ['step' => 'ten']) }}">
                                <span>10</span>
                                <h6>Final Steps</h6>
                            </a>
                        @else
                            <a href="javascript::void(0)">
                                <span>10</span>
                                <h6>Final Steps</h6>
                            </a>
                        @endif
                    </li>
                </ul>
            </div>
            <div class="school-wrap application_step__two">
                <div class="form-outr">
                    <div class="cmn-hdr">
                        <h4>Address Info</h4>
                    </div>
                    <div class="frm-uppr">
                        <div class="direct">
                            <h5>DIRECTIONS:</h5>
                            <p>
                                <strong>This section is to be completed by a parent/guardian.
                                    Please add (up to 4) addresses associated with the
                                    student(s). Required fields are in <i class="red">red.</i><br><br>
                                Please make sure every required field is completed before saving your work. To save your work, you must click the <i class="red">Next/Save</i> button at the bottom of the page.
                                </strong>
                            </p>
                        </div>
                    </div>

                    @foreach ($addressInfo as $key => $address)
                        <div class="form-wrap">
                            <div class="custom-step-two">
                                <h4>
                                    @if ($key + 1 == 1)
                                        Primary Address
                                    @elseif ($key + 1 == 2)
                                        Secondary Address
                                    @else
                                        Other Address {{ $key - 1 }}
                                    @endif
                                </h4>

                                {{-- <div class="form-group">
                                    <label class="{{ $key + 1 > 1 ? 'blck' : 'red' }}">Country:</label>
                                    <select
                                        class="form-control {{ $errors->has('addressInfo.' . $key . '.Country') ? 'is-invalid' : '' }}"
                                        id="exampleSelect1" name="Country"
                                        wire:model='addressInfo.{{ $key }}.Country'>
                                        <option value="">-- Please Choose --</option>
                                        @foreach ($countryList as $country)
                                            <option value="{{ $country['id'] }}">{{ $country['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('addressInfo.' . $key . '.Country')
                                        <div class="invalid-feedback error_text">{{ $message }}</div>
                                    @enderror
                                </div> --}}

                                <div class="form-group">
                                    <label class="{{ $key + 1 > 1 ? 'blck' : 'red' }}">Address:</label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('addressInfo.' . $key . '.Address') ? 'is-invalid' : '' }}"
                                        wire:model.defer='addressInfo.{{ $key }}.Address' />
                                    @error('addressInfo.' . $key . '.Address')
                                        <div class="invalid-feedback error_text">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="{{ $key + 1 > 1 ? 'blck' : 'red' }}">City:</label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('addressInfo.' . $key . '.City') ? 'is-invalid' : '' }}"
                                        wire:model.defer='addressInfo.{{ $key }}.City' />
                                    @error('addressInfo.' . $key . '.City')
                                        <div class="invalid-feedback error_text">{{ $message }}</div>
                                    @enderror
                                </div>

                                @php
                                    //$getState = App\Models\State::where('country_id', $address['Country'])
                                    $getState = App\Models\State::where('country_id', 1)
                                        ->get()
                                        ->toArray();
                                @endphp

                                @if ($getState)
                                    <div class="form-group">
                                        <label class="{{ $key + 1 > 1 ? 'blck' : 'red' }}">State:</label>
                                        <select
                                            class="form-control {{ $errors->has('addressInfo.' . $key . '.State') ? 'is-invalid' : '' }}"
                                            wire:model='addressInfo.{{ $key }}.State'>
                                            <option value="">-- Please Choose --</option>
                                            @foreach ($getState as $state)
                                                <option value="{{ $state['name'] }}">{{ $state['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('addressInfo.' . $key . '.State')
                                            <div class="invalid-feedback error_text">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label class="{{ $key + 1 > 1 ? 'blck' : 'red' }}">Zipcode:</label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('addressInfo.' . $key . '.Zipcode') ? 'is-invalid' : '' }}"
                                        wire:model.defer='addressInfo.{{ $key }}.Zipcode'
                                        onKeyPress="if(this.value.length==11) return false;" />
                                    @error('addressInfo.' . $key . '.Zipcode')
                                        <div class="invalid-feedback error_text">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="{{ $key + 1 > 1 ? 'blck' : 'red' }}">Primary Phone Number at
                                        Location:</label>
                                    <div class="row fr-row">
                                        <div class="col-md-3 fr-col">
                                            <input id="a{{ $key }}" type="text" maxlength="3"
                                                class="form-control "
                                                wire:model.defer='addressInfo.{{ $key }}.phone_number_one'
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                        </div>
                                        <div class="col-md-3 fr-col">
                                            <input id="b{{ $key }}" type="text" maxlength="3"
                                                class="form-control "
                                                wire:model.defer='addressInfo.{{ $key }}.phone_number_two'
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                        </div>
                                        <div class="col-md-6 fr-col">
                                            <input id="c{{ $key }}" type="text" maxlength="4"
                                                class="form-control "
                                                wire:model.defer='addressInfo.{{ $key }}.phone_number_three'
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                        </div>
                                    </div>
                                    @error('addressInfo.' . $key . '.Address_Phone')
                                        <div class="error error_text">{{ $message }}</div>
                                    @enderror
                                    <script>

                                        var a = document.getElementById("a{{ $key }}"),
                                            b = document.getElementById("b{{ $key }}"),
                                            c = document.getElementById("c{{ $key }}");
                                            console.log(a,b,c);

                                        a.onkeyup = function() {
                                            if (this.value.length === parseInt(this.attributes["maxlength"].value)) {
                                                b.focus();
                                            }
                                        }
                                        b.onkeyup = function() {
                                            if (this.value.length === parseInt(this.attributes["maxlength"].value)) {
                                                c.focus();
                                            }
                                        }
                                    </script>
                                </div>
                                <div class="schl-btm">
                                    <div class="form_input_radio">
                                        @if ($key < 3 && $i !== 4)
                                            <button class="btn btn-danger btn-sm"
                                                wire:click.prevent="add({{ $i }})">Add another
                                                address</button>
                                        @endif
                                        @if ($key != 0)
                                            <button class="btn btn-danger btn-sm"
                                                wire:click.prevent="remove({{ $key }})">Remove
                                                address</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="flx">
            <div class="form-btn">
                <a href="{{ route('admission-application', ['step' => 'one']) }}" class="sub-btn">Previous</a>
            </div>
            <div class="form-btn">
                <button type="submit" value="Next" class="sub-btn">Next/Save</button>
            </div>
        </div>
    </form>
</div>
