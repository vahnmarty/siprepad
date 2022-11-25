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
            <div class="school-wrap">
                <div class="form-outr">
                    <div class="cmn-hdr">
                        <h4>Sibling Info</h4>
                    </div>
                    <div class="frm-uppr">
                        <div class="direct">
                            <h5>DIRECTIONS:</h5>
                            <p>
                                <strong>This section is to be completed by a parent/guardian.
                                    Please add all siblings associated with the student(s).
                                    Required fields are in <i class="red">red.</i><br><br>
                                Please make sure every required field is completed before saving your work. To save your work, you must click the <i class="red">Next/Save</i> button at the bottom of the page.
                                </strong>
                            </p>
                        </div>
                    </div>
                    <div class="schl-btm mb-4">
                        <h6 class="red">Do you have other children?</h6>
                        <div class="schl-rdo">
                            <div class="form_input_radio">
                                <label class="radio-pro">Yes
                                    <input type="radio" checked="checked" name="radio"
                                        wire:click="showHideDiv('yes')" wire:model="is_any_other_child"
                                        value="1" />
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-pro">No
                                    <input type="radio" name="radio" wire:click="showHideDiv('no')"
                                        wire:model="is_any_other_child" value="0" />
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    @if ($is_any_other_child)
                        @foreach ($siblingInfo as $key => $sibling)
                            <div class="form-wrap">
                                <div>
                                    <h4>Child {{ $key + 1 }}</h4>

                                    <div class="form-group">
                                        <label class="blck">First Name:</label>
                                        <input type="text"
                                            class="form-control {{ $errors->has('siblingInfo.' . $key . '.First_Name') ? 'is-invalid' : '' }}"
                                            wire:model.defer='siblingInfo.{{ $key }}.First_Name'>
                                        @error('siblingInfo.*.First_Name')
                                            <div class="invalid-feedback error_text">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="blck">Middle Name:</label>
                                        <input type="text"
                                            class="form-control {{ $errors->has('siblingInfo.' . $key . '.Middle_Name') ? 'is-invalid' : '' }}"
                                            wire:model.defer='siblingInfo.{{ $key }}.Middle_Name'>
                                        @error('siblingInfo.*.Middle_Name')
                                            <div class="invalid-feedback error_text">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="blck">Last Name:</label>
                                        <input type="text"
                                            class="form-control {{ $errors->has('siblingInfo.' . $key . '.Last_Name') ? 'is-invalid' : '' }}"
                                            wire:model.defer='siblingInfo.{{ $key }}.Last_Name'>
                                        @error('siblingInfo.*.Last_Name')
                                            <div class="invalid-feedback error_text">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="blck">Suffix:</label>
                                        <select
                                            class="form-control {{ $errors->has('siblingInfo.' . $key . '.Suffix') ? 'is-invalid' : '' }}"
                                            wire:model.defer='siblingInfo.{{ $key }}.Suffix'>
                                            <option value="">-- Please Choose --</option>
                                            @foreach ($suffixList as $suffix)
                                                <option value="{{ $suffix['suffix_name'] }}">
                                                    {{ $suffix['suffix_name'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('siblingInfo.*.Suffix')
                                            <div class="invalid-feedback error_text">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="blck">Relationship:</label>
                                        <select
                                            class="form-control {{ $errors->has('siblingInfo.' . $key . '.Relationship') ? 'is-invalid' : '' }}"
                                            wire:model.defer='siblingInfo.{{ $key }}.Relationship'>
                                            <option value="">-- Please Choose --</option>
                                            @foreach ($relationshipList as $relationship)
                                                <option value="{{ $relationship['relationship_name'] }}">
                                                    {{ $relationship['relationship_name'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('siblingInfo.*.Relationship')
                                            <div class="invalid-feedback error_text">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="blck">Current Grade:</label>
                                        <select
                                            class="form-control {{ $errors->has('siblingInfo.' . $key . '.Current_Grade') ? 'is-invalid' : '' }}"
                                            wire:model.defer='siblingInfo.{{ $key }}.Current_Grade'>
                                            <option value="">-- Please Choose --</option>
                                            @foreach ($gradeList as $grade)
                                                <option value="{{ $grade['grade_name'] }}">{{ $grade['grade_name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('siblingInfo.*.Current_Grade')
                                            <div class="invalid-feedback error_text">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="blck">Current School:</label>
                                        <select
                                            class="form-control {{ $errors->has('siblingInfo.' . $key . '.Current_School') ? 'is-invalid' : '' }}"
                                            wire:model='siblingInfo.{{ $key }}.Current_School'>
                                            <option value="">-- Please Choose --</option>
                                            @foreach ($schoolList as $school)
                                                <option value="{{ $school['school_name'] }}">
                                                    {{ $school['school_name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('siblingInfo.*.Current_School')
                                            <div class="invalid-feedback error_text">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    @if ($sibling['Current_School'] == 'Not Listed')
                                        <div class="form-group">
                                            <label class="blck">If not listed, add it here:</label>
                                            <input type="text"
                                                class="form-control {{ $errors->has('siblingInfo.' . $key . '.Current_School_Not_Listed') ? 'is-invalid' : '' }}"
                                                wire:model.defer='siblingInfo.{{ $key }}.Current_School_Not_Listed'>
                                            @error('siblingInfo.*.Current_School_Not_Listed')
                                                <div class="invalid-feedback error_text">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label class="blck">High School Graduation Year:</label>
                                        <input type="text" maxlength="4"
                                            class="form-control {{ $errors->has('siblingInfo.' . $key . '.HS_Graduation_Year') ? 'is-invalid' : '' }}"
                                            wire:model.defer='siblingInfo.{{ $key }}.HS_Graduation_Year'
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        @error('siblingInfo.*.HS_Graduation_Year')
                                            <div class="invalid-feedback error_text">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-outr">
                                    <div class="schl-btm mt">
                                        {{-- <h6>Add another child</h6> --}}
                                        <div class="form_input_radio">
                                            @if ($key < 9 && $i !== 10)
                                                <button class="btn btn-danger btn-sm"
                                                    wire:click.prevent="add({{ $i }})">Add another
                                                    child</button>
                                            @endif
                                            @if ($key != 0)
                                                <button class="btn btn-danger btn-sm"
                                                    wire:click.prevent="remove({{ $key }})">Remove
                                                    child</button>
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
                <a href="{{ route('admission-application', ['step' => 'three']) }}" class="sub-btn">Previous</a>
            </div>
            <div class="form-btn">
                <button type="submit" value="Next" class="sub-btn">Next/Save</button>
            </div>
        </div>
    </form>
</div>
