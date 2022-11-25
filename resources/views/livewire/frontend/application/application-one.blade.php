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
                    <li>
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

            <div class="form-outr">
                <div class="cmn-hdr">
                    <h4>Student Info</h4>
                </div>
                <div class="frm-uppr">
                    <div class="direct">
                        <h5>DIRECTIONS:</h5>
                        <p>
                            <strong>This section is to be completed by a parent/guardian.
                                Please add all necessary information for the student(s).
                                You can add up to 3 students for each application.
                                Required fields are in <i class="red">red.</i><br><br>
                                Please make sure every required field is completed before saving your work. To save your work, you must click the <i class="red">Next/Save</i> button at the bottom of the page.
                            </strong>
                        </p>
                    </div>
                </div>

                @foreach ($inputs as $key => $value)
                    <div class="school-wrap step__one">
                        <div class="form-wrap">
                            <div class="form-group">
                                <label>Upload a recent photo of the student to personalize the
                                    application:</label>
                                <div class="files">
                                    @if (isset($value['New_Photo']) && $value['New_Photo'])
                                        <div class="upload__image-name">
                                            <p>{{ $value['New_Photo']->getClientOriginalName() }}</p>
                                        </div>
                                    @else
                                        <input type="text" class="form-control"
                                            wire:model.defer='inputs.{{ $key }}.Photo' readonly />
                                    @endif

                                    <div class="submit-in">
                                        <div class="sub-btn-in">
                                            <span>
                                                <img src="{{ asset('frontend_assets/images/clip.svg') }}"
                                                    alt="" />
                                            </span>
                                            <p>Browse Files</p>
                                            <input type="file"
                                                class="file-btn form-control {{ $errors->has('inputs.' . $key . '.Photo') ? 'is-invalid' : '' }}"
                                                name="S1_Photo" wire:model='inputs.{{ $key }}.New_Photo'>
                                        </div>
                                    </div>

                                </div>
                                @error('inputs.' . $key . '.Photo')
                                    <div class="error error_text">{{ $message }}</div>
                                @enderror

                                @error('inputs.' . $key . '.New_Photo')
                                    <div class="error error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Legal First Name:</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('inputs.' . $key . '.First_Name') ? 'is-invalid' : '' }}"
                                    wire:model.defer='inputs.{{ $key }}.First_Name' name="First_Name"
                                    value="{{ old('First_Name') }}" />
                                @error('inputs.*.First_Name')
                                    <div class="invalid-feedback  error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="blck">Legal Middle Name:</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('inputs.' . $key . '.Middle_Name') ? 'is-invalid' : '' }}"
                                    wire:model.defer='inputs.{{ $key }}.Middle_Name' />
                                @error('inputs.*.Middle_Name')
                                    <div class="invalid-feedback error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Legal Last Name:</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('inputs.' . $key . '.Last_Name') ? 'is-invalid' : '' }}"
                                    wire:model.defer='inputs.{{ $key }}.Last_Name' />
                                @error('inputs.*.Last_Name')
                                    <div class="invalid-feedback  error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="blck">Legal Suffix:</label>
                                <select
                                    class="form-control {{ $errors->has('inputs.' . $key . '.Suffix') ? 'is-invalid' : '' }}"
                                    wire:model.defer='inputs.{{ $key }}.Suffix'>
                                    <option value="">-- Please Choose --</option>
                                    @foreach ($suffixList as $suffix)
                                        <option value="{{ $suffix['suffix_name'] }}">{{ $suffix['suffix_name'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('inputs.*.Suffix')
                                    <div class="invalid-feedback error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="blck">Preferred First Name:</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('inputs.' . $key . '.Preferred_First_Name') ? 'is-invalid' : '' }}"
                                    wire:model.defer='inputs.{{ $key }}.Preferred_First_Name' />
                                @error('inputs.*.Preferred_First_Name')
                                    <div class="invalid-feedback error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Date of Birth:</label>
                                <input type="date" max="<?php echo date('Y-m-d'); ?>"
                                    class="form-control {{ $errors->has('inputs.' . $key . '.Birthdate') ? 'is-invalid' : '' }}"
                                    wire:model.defer='inputs.{{ $key }}.Birthdate' />
                                @error('inputs.*.Birthdate')
                                    <div class="invalid-feedback error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Gender:</label>
                                <select
                                    class="form-control {{ $errors->has('inputs.' . $key . '.Gender') ? 'is-invalid' : '' }}"
                                    wire:model.defer='inputs.{{ $key }}.Gender'>
                                    <option value="">-- Please Choose --</option>
                                    <option value="Female">Female</option>
                                    <option value="Male">Male</option>
                                </select>
                                @error('inputs.*.Gender')
                                    <div class="invalid-feedback error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Personal Email:</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('inputs.' . $key . '.Personal_Email') ? 'is-invalid' : '' }}"
                                    wire:model.defer='inputs.{{ $key }}.Personal_Email' />
                                @error('inputs.*.Personal_Email')
                                    <div class="invalid-feedback  error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="blck">Mobile Phone:</label>
                                <div class="row fr-row phnnofields">
                                    <div class="col-md-3 fr-col">
                                        <input id="a{{ $key }}" type="text" maxlength="3"
                                            class="form-control"
                                            wire:model.defer='inputs.{{ $key }}.phone_number_one'
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                    </div>
                                    <div class="col-md-3 fr-col">
                                        <input id="b{{ $key }}" type="text" maxlength="3"
                                            class="form-control"
                                            wire:model.defer='inputs.{{ $key }}.phone_number_two'
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                    </div>
                                    <div class="col-md-6 fr-col lastfield">
                                        <input id="c{{ $key }}" type="text" maxlength="4"
                                            class="form-control"
                                            wire:model.defer='inputs.{{ $key }}.phone_number_three'
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                    </div>
                                    @error('inputs.' . $key . '.Mobile_Phone')
                                        <div class="error  error_text">{{ $message }}</div>
                                    @enderror
                                    <script>
                                        var a = document.getElementById("a{{ $key }}"),
                                            b = document.getElementById("b{{ $key }}"),
                                            c = document.getElementById("c{{ $key }}");

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
                            </div>

                            <div class="note">
                                <p>
                                    <span>NOTE:</span> Text messages may be sent directly to
                                    applicant.
                                </p>
                            </div>

                            <div class="form-group">
                                <label class="blck">How do you identify racially?
                                    <span class="lbl-spn">If you identify with more than one race, select all
                                        that apply to you.</span></label>
                                <div class="check-wrap checkbox-group required">
                                    @foreach ($identifyRacially as $item)
                                        <label class="check-inn">
                                            <input type="checkbox" class="open" value="{{ $item['name'] }}"
                                                wire:model="inputs.{{ $key }}.Race.{{ $item['name'] }}">
                                            {{ $item['name'] }}
                                            <span class="checkmark"></span>
                                        </label>
                                    @endforeach
                                    @error('inputs.' . $key . '.Race')
                                        <div class="error error_text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="blck">What is your ethnicity?
                                    <span class="lbl-spn">If more than one, separate ethnicities with a comma.</span>
                                </label>
                                <input type="text"
                                    class="form-control {{ $errors->has('inputs.' . $key . '.Ethnicity') ? 'is-invalid' : '' }}"
                                    wire:model.defer='inputs.{{ $key }}.Ethnicity' />
                                @error('inputs.*.Ethnicity')
                                    <div class="invalid-feedback  error_text">{{ $message }}</div>
                                @enderror
                                <p>
                                    EXAMPLE: "Filipino, Hawaiian, Irish, Italian, Middle
                                    Eastern, Salvadorian"
                                </p>
                            </div>

                            <div class="form-group">
                                <label>Current School:</label>
                                <select
                                    class="form-control {{ $errors->has('inputs.' . $key . '.Current_School') ? 'is-invalid' : '' }}"
                                    wire:model='inputs.{{ $key }}.Current_School'>
                                    <option value="">-- Please Choose --</option>
                                    @foreach ($schoolList as $school)
                                        <option value="{{ $school['school_name'] }}">{{ $school['school_name'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('inputs.*.Current_School')
                                    <div class="invalid-feedback error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            @if ($value['Current_School'] == 'Not Listed')
                                <div class="form-group">
                                    <label>If not listed, add it here:</label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('inputs.' . $key . '.Current_School_Not_Listed') ? 'is-invalid' : '' }}"
                                        wire:model.defer='inputs.{{ $key }}.Current_School_Not_Listed' />
                                    @error('inputs.*.Current_School_Not_Listed')
                                        <div class="invalid-feedback error_text">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif

                            <div class="form-group">
                                <label class="blck">Other High School # 1:
                                    <span class="lbl-spn2">(where you plan to apply)</span>
                                </label>
                                <select
                                    class="form-control {{ $errors->has('inputs.' . $key . '.Other_High_School_1') ? 'is-invalid' : '' }}"
                                    wire:model.defer='inputs.{{ $key }}.Other_High_School_1'>
                                    <option value="">-- Please Choose --</option>
                                    @foreach ($otherSchoolList as $school)
                                        <option value="{{ $school['school_name'] }}">{{ $school['school_name'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('inputs.*.Other_High_School_1')
                                    <div class="invalid-feedback error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="blck">Other High School # 2:
                                    <span class="lbl-spn2">(where you plan to apply)</span>
                                </label>
                                <select
                                    class="form-control {{ $errors->has('inputs.' . $key . '.Other_High_School_2') ? 'is-invalid' : '' }}"
                                    wire:model.defer='inputs.{{ $key }}.Other_High_School_2'>
                                    <option value="">-- Please Choose --</option>
                                    @foreach ($otherSchoolList as $school)
                                        <option value="{{ $school['school_name'] }}">{{ $school['school_name'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('inputs.*.S1_Other_High_School_2')
                                    <div class="invalid-feedback error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="blck">Other High School # 3:
                                    <span class="lbl-spn2">(where you plan to apply)</span>
                                </label>
                                <select
                                    class="form-control {{ $errors->has('inputs.' . $key . '.Other_High_School_3') ? 'is-invalid' : '' }}"
                                    wire:model.defer='inputs.{{ $key }}.Other_High_School_3'>
                                    <option value="">-- Please Choose --</option>
                                    @foreach ($otherSchoolList as $school)
                                        <option value="{{ $school['school_name'] }}">
                                            {{ $school['school_name'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('inputs.*.Other_High_School_3')
                                    <div class="invalid-feedback error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="blck">Other High School # 4:
                                    <span class="lbl-spn2">(where you plan to apply)</span>
                                </label>
                                <select
                                    class="form-control {{ $errors->has('inputs.' . $key . '.Other_High_School_4') ? 'is-invalid' : '' }}"
                                    wire:model.defer='inputs.{{ $key }}.Other_High_School_4'>
                                    <option value="">-- Please Choose --</option>
                                    @foreach ($otherSchoolList as $school)
                                        <option value="{{ $school['school_name'] }}">
                                            {{ $school['school_name'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('inputs.*.Other_High_School_4')
                                    <div class="invalid-feedback error_text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @if (!$is_payment_compleat)
                            <div class="schl-btm">
                                <div class="form_input_radio">
                                    @if ($key < 2 && $i !== 3)
                                        <button class="btn btn-danger btn-sm"
                                            wire:click.prevent="add({{ $i }})">Add another student</button>
                                    @endif
                                    @if ($key != 0)
                                        <button class="btn btn-danger btn-sm"
                                            wire:click.prevent="remove({{ $key }})">Remove student</button>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        <div class="form-btn text-end mt">
            <button type="submit" value="Next" class="sub-btn">Next/Save</button>
        </div>
    </form>
</div>
