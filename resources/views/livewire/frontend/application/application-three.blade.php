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

            <div class="school-wrap npb application_step__three">
                <div class="form-outr">
                    <div class="cmn-hdr">
                        <h4>Parent Info</h4>
                    </div>
                    <div class="frm-uppr">
                        <div class="direct">
                            <h5>DIRECTIONS:</h5>
                            <p>
                                <strong>This section is to be completed by a parent/guardian.
                                    Please add all parents/guardians associated with the
                                    student(s). Required fields are in <i class="red">red.</i><br><br>
                                Please make sure every required field is completed before saving your work. To save your work, you must click the <i class="red">Next/Save</i> button at the bottom of the page.
                                </strong>
                            </p>
                        </div>
                    </div>

                    @foreach ($parentInfo as $key => $parent)
                        <div class="form-wrap">
                            <div class="form-group">
                                <label>Relationship:</label>
                                <select
                                    class="form-control {{ $errors->has('parentInfo.' . $key . '.Relationship') ? 'is-invalid' : '' }}"
                                    wire:model='parentInfo.{{ $key }}.Relationship'>
                                    <option value="">-- Please Choose --</option>
                                    @foreach ($relationshipList as $relationship)
                                        <option value="{{ $relationship['relationship_name'] }}">
                                            {{ $relationship['relationship_name'] }}</option>
                                    @endforeach
                                </select>
                                @error('parentInfo.*.Relationship')
                                    <div class="invalid-feedback error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="blck">Salutation:</label>
                                <select
                                    class="form-control {{ $errors->has('parentInfo.' . $key . '.Salutation') ? 'is-invalid' : '' }}"
                                    wire:model='parentInfo.{{ $key }}.Salutation'>
                                    <option value="">-- Please Choose --</option>
                                    @foreach ($salutationList as $salutation)
                                        <option value="{{ $salutation['salutation_name'] }}">
                                            {{ $salutation['salutation_name'] }}</option>
                                    @endforeach
                                </select>
                                @error('parentInfo.*.Salutation')
                                    <div class="invalid-feedback error_text">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label>First Name:</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('parentInfo.' . $key . '.First_Name') ? 'is-invalid' : '' }}"
                                    wire:model.defer='parentInfo.{{ $key }}.First_Name'>
                                @error('parentInfo.*.First_Name')
                                    <div class="invalid-feedback error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="blck">Middle Name:</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('parentInfo.' . $key . '.Middle_Name') ? 'is-invalid' : '' }}"
                                    wire:model.defer='parentInfo.{{ $key }}.Middle_Name'>
                                @error('parentInfo.*.Middle_Name')
                                    <div class="invalid-feedback error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Last Name:</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('parentInfo.' . $key . '.Last_Name') ? 'is-invalid' : '' }}"
                                    wire:model.defer='parentInfo.{{ $key }}.Last_Name'>
                                @error('parentInfo.*.Last_Name')
                                    <div class="invalid-feedback error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="blck">Suffix:</label>
                                <select
                                    class="form-control {{ $errors->has('parentInfo.' . $key . '.Suffix') ? 'is-invalid' : '' }}"
                                    wire:model='parentInfo.{{ $key }}.Suffix'>
                                    <option value="">-- Please Choose --</option>
                                    @foreach ($suffixList as $suffix)
                                        <option value="{{ $suffix['suffix_name'] }}">
                                            {{ $suffix['suffix_name'] }}</option>
                                    @endforeach
                                </select>
                                @error('parentInfo.*.Suffix')
                                    <div class="invalid-feedback error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Address Location:</label>
                                <select
                                    class="form-control {{ $errors->has('parentInfo.' . $key . '.Address_Type') ? 'is-invalid' : '' }}"
                                    wire:model='parentInfo.{{ $key }}.Address_Type'>
                                    <option value="">-- Please Choose --</option>
                                    @foreach ($addressList as $addKey => $address)
                                        <option value="{{ $address['name'] }}">{{ ucwords($address['name']) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('parentInfo.*.Address_Type')
                                    <div class="invalid-feedback error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Mobile Phone:</label>
                                <div class="row fr-row for-dash-new">
                                    <div class="col-md-3 fr-col">
                                        <input id="ap{{ $key }}" type="text" maxlength="3"
                                            class="form-control "
                                            wire:model.defer='parentInfo.{{ $key }}.mobile_phone_number_one'
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                    </div>
                                    <div class="col-md-3 fr-col">
                                        <input id="bq{{ $key }}" type="text" maxlength="3"
                                            class="form-control "
                                            wire:model.defer='parentInfo.{{ $key }}.mobile_phone_number_two'
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                    </div>
                                    <div class="col-md-6 fr-col mobile_no_display">
                                        <input id="cr{{ $key }}" type="text" maxlength="4"
                                            class="form-control "
                                            wire:model.defer='parentInfo.{{ $key }}.mobile_phone_number_three'
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                    </div>
                                    @error('parentInfo.' . $key . '.Mobile_Phone')
                                        <div class="error error_text">{{ $message }}</div>
                                    @enderror
                                    <script>
                                        let ap = document.getElementById("ap{{ $key }}"),
                                            bq = document.getElementById("bq{{ $key }}"),
                                            cr = document.getElementById("cr{{ $key }}");
                                        ap.onkeyup = function() {
                                            if (this.value.length === parseInt(this.attributes["maxlength"].value)) {
                                                bq.focus();
                                            }
                                        }
                                        bq.onkeyup = function() {
                                            if (this.value.length === parseInt(this.attributes["maxlength"].value)) {
                                                cr.focus();
                                            }
                                        }
                                    </script>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Personal Email:</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('parentInfo.' . $key . '.Personal_Email') ? 'is-invalid' : '' }}"
                                    wire:model.defer='parentInfo.{{ $key }}.Personal_Email'>
                                @error('parentInfo.*.Personal_Email')
                                    <div class="invalid-feedback error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="blck">Employer:</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('parentInfo.' . $key . '.Employer') ? 'is-invalid' : '' }}"
                                    wire:model.defer='parentInfo.{{ $key }}.Employer'>
                                @error('parentInfo.*.Employer')
                                    <div class="invalid-feedback error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="blck">Title:</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('parentInfo.' . $key . '.Title') ? 'is-invalid' : '' }}"
                                    wire:model.defer='parentInfo.{{ $key }}.Title'>
                                @error('parentInfo.*.Title')
                                    <div class="invalid-feedback error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="blck">Work Email:</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('parentInfo.' . $key . '.Work_Email') ? 'is-invalid' : '' }}"
                                    wire:model.defer='parentInfo.{{ $key }}.Work_Email'>
                                @error('parentInfo.*.Work_Email')
                                    <div class="invalid-feedback error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="blck">Work Phone:</label>
                                <div class="row fr-row phnnofields">
                                    <div class="col-md-3 fr-col">
                                        <input id="ax{{ $key + 1 }}" type="text" maxlength="3"
                                            class="form-control "
                                            wire:model.defer='parentInfo.{{ $key }}.work_phone_number_one'
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                    </div>
                                    <div class="col-md-3 fr-col">
                                        <input id="by{{ $key + 1 }}" type="text" maxlength="3"
                                            class="form-control "
                                            wire:model.defer='parentInfo.{{ $key }}.work_phone_number_two'
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                    </div>
                                    <div class="col-md-6 fr-col lastfield">
                                        <input id="cz{{ $key + 1 }}" type="text" maxlength="4"
                                            class="form-control "
                                            wire:model.defer='parentInfo.{{ $key }}.work_phone_number_three'
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                    </div>
                                    @error('parentInfo.' . $key . '.Work_Phone')
                                        <div class="error error_text">{{ $message }}</div>
                                    @enderror
                                    <script>
                                        let aa = document.getElementById("ax{{ $key + 1 }}"),
                                            bb = document.getElementById("by{{ $key + 1 }}"),
                                            cc = document.getElementById("cz{{ $key + 1 }}");
                                        aa.onkeyup = function() {
                                            if (this.value.length === parseInt(this.attributes["maxlength"].value)) {
                                                bb.focus();
                                            }
                                        }
                                        bb.onkeyup = function() {
                                            if (this.value.length === parseInt(this.attributes["maxlength"].value)) {
                                                cc.focus();
                                            }
                                        }
                                    </script>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="blck">Work Phone Extension:</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('parentInfo.' . $key . '.Work_Phone_Ext') ? 'is-invalid' : '' }}"
                                    wire:model.defer='parentInfo.{{ $key }}.Work_Phone_Ext'>
                                @error('parentInfo.*.Work_Phone_Ext')
                                    <div class="invalid-feedback error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>List all high schools, colleges, or graduate schools you
                                    have attended:</label>
                                <div data-maxcount="125" wire:ignore>
                                    <textarea id="stepThreeTextArea{{ $key }}"
                                        class="word_count form-control {{ $errors->has('parentInfo.' . $key . '.Schools') ? 'is-invalid' : '' }}"
                                        name="stepThreeTextArea" wire:model.defer='parentInfo.{{ $key }}.Schools'></textarea>
                                    <p class="wrds">
                                    <!--    (Max <span class="word_left" id="wordCount{{ $key }}">75 </span>words) -->
                                    (Please limit answer to 75 words.)
                                    </p>
                                    <script>
                                        $(document).ready(function() {
                                            console.log("ready!");
                                            let countwords = $.trim($('#stepThreeTextArea{{ $key }}').val()).split(' ').filter(function(
                                                v) {
                                                return v !== ''
                                            }).length;
                                            console.log(countwords);
                                            document.getElementById("wordCount{{ $key }}").innerHTML = 125 - countwords;
                                        });

                                        $("[data-maxcount]").each(function() {
                                            let _this = $(this);
                                            let _this_count = parseInt(_this.attr("data-maxcount"));
                                            _this.find("#stepThreeTextArea{{ $key }}").on("keyup", function() {
                                                let words = 0;
                                                if (this.value.match(/\S+/g) != null) {
                                                    words = this.value.match(/\S+/g).length;
                                                }
                                                if (words > _this_count) {
                                                    let trimmed = $(this).val().split(/\s+/, _this_count).join(" ");
                                                    $(this).val(trimmed + " ");
                                                } else {
                                                    _this.find("#wordCount{{ $key }}").text(_this_count - words);
                                                }
                                            });
                                        });
                                    </script>
                                </div>
                                @error('parentInfo.' . $key . '.Schools')
                                    <div class="error error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Living Situation </label>
                                <div class="schl-rdo ml-0">
                                    <div class="form_input_radio">
                                        @foreach ($livingSituationList as $lsKey => $item)
                                            <label class="radio-pro">
                                                <input type="radio" name="radio{{ $key }}" value="{{ $item['id'] }}"
                                                    wire:model.defer="parentInfo.{{ $key }}.Living_Situation"/>
                                                {{ ucwords($item['name']) }}
                                                <span class="checkmark"></span>
                                            </label>
                                        @endforeach
                                        @error('parentInfo.' . $key . '.Living_Situation')
                                            <div class="error error_text">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="blck">Status </label>
                                <div class="check-wrap">
                                    <label class="check-inn">
                                        <input type="checkbox" class="open" value="1"
                                            wire:model="parentInfo.{{ $key }}.Status">
                                        Deceased
                                        <span class="checkmark"></span>
                                    </label>
                                    @error('parentInfo.*.Status')
                                        <div class="invalid-feedback error_text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-outr">
                                <div class="schl-btm mt">
                                    <div class="form_input_radio">
                                        @if ($key < 3 && $i !== 4)
                                            <button class="btn btn-danger btn-sm"
                                                wire:click.prevent="add({{ $i }})">Add another
                                                parent</button>
                                        @endif
                                        @if ($key != 0)
                                            <button class="btn btn-danger btn-sm"
                                                wire:click.prevent="remove({{ $key }})">Remove
                                                parent</button>
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
                <a href="{{ route('admission-application', ['step' => 'two']) }}" class="sub-btn">Previous</a>
            </div>
            <div class="form-btn">
                <button type="submit" value="Next" class="sub-btn">Next/Save</button>
            </div>
        </div>
    </form>
</div>
