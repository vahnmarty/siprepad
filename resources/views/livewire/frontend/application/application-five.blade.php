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
                    <li class="step-complete">
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
                    <li class="step-complete">
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
                    <li class="step-complete">
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
            <div class="school-wrap">
                <div class="form-outr">
                    <div class="cmn-hdr">
                        <h4>Legacy Info</h4>
                    </div>

                    <div class="frm-uppr">
                        <div class="direct">
                            <h5>DIRECTIONS:</h5>
                            <p>
                                <strong>This section is to be completed by a parent/guardian.
                                    Please add all relatives that went to SI associated with
                                    the student(s). Required fields are in
                                    <i class="red">red.</i><br><br>
                                Please make sure every required field is completed before saving your work. To save your work, you must click the <i class="red">Next/Save</i> button at the bottom of the page.
                                </strong>
                            </p>
                        </div>
                    </div>

                    <div class="schl-btm mb-1">
                        <h6 class="red">
                            Do you have family members who have attended SI?
                        </h6>
                        <div class="schl-rdo ml-n">
                            <div class="form_input_radio">
                                <label class="radio-pro">Yes
                                    <input type="radio" name="radio" wire:click="showHideDiv('yes')"
                                        wire:model="is_any_attended_si" value="1" />
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-pro">No
                                    <input type="radio" name="radio" wire:click="showHideDiv('no')"
                                        wire:model="is_any_attended_si" value="0" />
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="note">
                        <p>
                            <strong>
                                <span>NOTE:</span> Sibling alums should be listed in
                                the Sibling Info section.</strong>
                        </p>
                    </div>


                    @if ($is_any_attended_si)
                        @foreach ($legacyInfo as $key => $legacy)
                            <div class="form-wrap">
                                <div>
                                    <h4>Legacy Relative {{ $key + 1 }}</h4>

                                    <div class="form-group">
                                        <label class="blck">First Name:</label>
                                        <input type="text"
                                            class="form-control {{ $errors->has('legacyInfo.' . $key . 'First_Name') ? 'is-invalid' : '' }}"
                                            wire:model.defer='legacyInfo.{{ $key }}.First_Name'>
                                        @error('legacyInfo.*First_Name')
                                            <div class="invalid-feedback error_text">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="blck">Last Name:</label>
                                        <input type="text"
                                            class="form-control {{ $errors->has('legacyInfo.' . $key . 'Last_Name') ? 'is-invalid' : '' }}"
                                            wire:model.defer='legacyInfo.{{ $key }}.Last_Name'>
                                        @error('legacyInfo.*Last_Name')
                                            <div class="invalid-feedback error_text">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="blck">Relationship:</label>
                                        <select
                                            class="form-control {{ $errors->has('legacyInfo.' . $key . 'Relationship') ? 'is-invalid' : '' }}"
                                            wire:model.defer='legacyInfo.{{ $key }}.Relationship'>
                                            <option value="">-- Please Choose --</option>
                                            @foreach ($relationshipList as $relationship)
                                                <option value="{{ $relationship['relationship_name'] }}">
                                                    {{ $relationship['relationship_name'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('legacyInfo.*Relationship')
                                            <div class="invalid-feedback error_text">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="blck"> Graduation year:</label>
                                        <input type="text" maxlength="4"
                                            class="form-control {{ $errors->has('legacyInfo.' . $key . 'Graduation_Year') ? 'is-invalid' : '' }}"
                                            wire:model.defer='legacyInfo.{{ $key }}.Graduation_Year'
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                        {{-- <input type="number"
                                            class="form-control {{ $errors->has('legacyInfo.' . $key . 'Graduation_Year') ? 'is-invalid' : '' }}"
                                            wire:model.defer='legacyInfo.{{ $key }}.Graduation_Year'
                                            onKeyPress="if(this.value.length==4) return false;" /> --}}
                                        @error('legacyInfo.*Graduation_Year')
                                            <div class="invalid-feedback error_text">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-outr">
                                    <div class="schl-btm mt">
                                        {{-- <h6>Add another relative?</h6> --}}
                                        <div class="form_input_radio">
                                            @if ($key < 4 && $i !== 5)
                                                <button class="btn btn-danger btn-sm"
                                                    wire:click.prevent="add({{ $i }})">Add another
                                                    legacy
                                                </button>
                                            @endif
                                            @if ($key != 0)
                                                <button class="btn btn-danger btn-sm"
                                                    wire:click.prevent="remove({{ $key }})">Remove legacy
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="flx">
            <div class="form-btn">
                <a href="{{ route('admission-application', ['step' => 'four']) }}" class="sub-btn">Previous</a>
            </div>
            <div class="form-btn">
                <button type="submit" value="Next" class="sub-btn">Next/Save</button>
            </div>
        </div>
    </form>
</div>
