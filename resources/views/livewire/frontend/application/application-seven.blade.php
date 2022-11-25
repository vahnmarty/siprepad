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
                    <li class="step-complete">
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
                    <li class="step-complete">
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

            <div class="school-wrap application_step__seven">
                <div class="form-outr">
                    <div class="cmn-hdr">
                        <h4>Religious Background</h4>
                    </div>
                    <div class="frm-uppr">
                        <div class="direct">
                            <h5>DIRECTIONS:</h5>
                            <p>
                                <strong>This section is to be completed by a parent/guardian.
                                    Please prepare and save your answers in a word document
                                    first. Then, copy and paste your answers on this page.
                                    This will ensure you will always have a back up of your
                                    work. Required fields are in <i class="red">red.</i><br><br>
                                Please make sure every required field is completed before saving your work. To save your work, you must click the <i class="red">Next/Save</i> button at the bottom of the page.
                                </strong>
                            </p>
                        </div>
                    </div>

                    <div class="form-wrap">
                        <div class="student_parent_statement">
                            <div class="form-group">
                                <label>Applicant(s)'s Religion:</label>
                                <select
                                    class="form-control {{ $errors->has('spiritualCommunityInfo.Applicant_Religion') ? 'is-invalid' : '' }}"
                                    wire:model=spiritualCommunityInfo.Applicant_Religion>
                                    <option value="">-- Please Choose --</option>
                                    @foreach ($religionList as $religion)
                                        <option value="{{ $religion['religion_name'] }}">
                                            {{ $religion['religion_name'] }}</option>
                                    @endforeach
                                </select>
                                @error('spiritualCommunityInfo.Applicant_Religion')
                                    <div class="invalid-feedback error_text">{{ $message }}</div>
                                @enderror
                            </div>
                            @if ($spiritualCommunityInfo['Applicant_Religion'] == 'Other')
                                <div class="form-group">
                                    <label class="blck">If "Other," add it here:</label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('spiritualCommunityInfo.Applicant_Religion_Other') ? 'is-invalid' : '' }}"
                                        wire:model.defer='spiritualCommunityInfo.Applicant_Religion_Other'>
                                    @error('spiritualCommunityInfo.Applicant_Religion_Other')
                                        <div class="invalid-feedback error_text">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif
                            <div class="form-group">
                                <label class="blck">Church/Faith Community:</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('spiritualCommunityInfo.Church_Faith_Community') ? 'is-invalid' : '' }}"
                                    wire:model.defer='spiritualCommunityInfo.Church_Faith_Community'>
                                @error('spiritualCommunityInfo.Church_Faith_Community')
                                    <div class="invalid-feedback error_text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="blck">Church/Faith Community Location:</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('spiritualCommunityInfo.Church_Faith_Community_Location') ? 'is-invalid' : '' }}"
                                    wire:model.defer='spiritualCommunityInfo.Church_Faith_Community_Location'>
                                @error('spiritualCommunityInfo.Church_Faith_Community_Location')
                                    <div class="invalid-feedback error_text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @foreach ($spiritualCommunityInfo['Students'] as $key => $student)
                            <div class="student_parent_statement">
                                <h4>{{ $student['Student_name'] }}</h4>

                                <div class="form-group">
                                    <label class="blck">Baptism Year:</label>
                                    <input type="text" maxlength="4"
                                        class="form-control {{ $errors->has('spiritualCommunityInfo.students.' . $key . '.S' . ($key + 1) . '_Baptism_Year') ? 'is-invalid' : '' }}"
                                        wire:model.defer='spiritualCommunityInfo.Students.{{ $key }}.S{{ $key + 1 }}_Baptism_Year'
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                    {{-- <input type="number"
                                        class="form-control {{ $errors->has('spiritualCommunityInfo.students.' . $key . '.S' . ($key + 1) . '_Baptism_Year') ? 'is-invalid' : '' }}"
                                        wire:model.defer='spiritualCommunityInfo.Students.{{ $key }}.S{{ $key + 1 }}_Baptism_Year'
                                        onKeyPress="if(this.value.length==4) return false;" /> --}}
                                    @error('spiritualCommunityInfo.students.*.S' . ($key + 1) . '_Baptism_Year')
                                        <div class="invalid-feedback error_text">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="blck">Confirmation Year:</label>
                                    <input type="text" maxlength="4"
                                        class="form-control {{ $errors->has('spiritualCommunityInfo.students.' . $key . '.S' . ($key + 1) . '_Confirmation_Year') ? 'is-invalid' : '' }}"
                                        wire:model.defer='spiritualCommunityInfo.Students.{{ $key }}.S{{ $key + 1 }}_Confirmation_Year'
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                    {{-- <input type="number"
                                        class="form-control {{ $errors->has('spiritualCommunityInfo.students.' . $key . '.S' . ($key + 1) . '_Confirmation_Year') ? 'is-invalid' : '' }}"
                                        wire:model.defer='spiritualCommunityInfo.Students.{{ $key }}.S{{ $key + 1 }}_Confirmation_Year'
                                        onKeyPress="if(this.value.length==4) return false;" /> --}}
                                    @error('spiritualCommunityInfo.students.*.S' . ($key + 1) . '_Confirmation_Year')
                                        <div class="invalid-feedback error_text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="school-wrap application_step__seven">
                <div class="form-outr">
                    <div class="cmn-hdr">
                        <h4>Family Spirituality and Community:</h4>
                    </div>

                    <div class="form-wrap">
                        <div class="student_parent_statement">
                            <div class="form-group">
                                <label>What impact does community have in your life and how do
                                    you best support your child's school community?</label>
                                <div data-maxcount="125" wire:ignore>
                                    <textarea id="stepSevenTextAreaOne"
                                        class="word_count form-control {{ $errors->has('spiritualCommunityInfo.Impact_to_Community') ? 'is-invalid' : '' }}"
                                        name="first_name" wire:model.defer='spiritualCommunityInfo.Impact_to_Community'></textarea>
                                    {{-- @error('spiritualCommunityInfo.Impact_to_Community')
                                        <div class="invalid-feedback error_text">{{ $message }}</div>
                                    @enderror --}}
                                    <p class="wrds">
                                     <!--   (Max <span class="word_left" id="wordCountOne">75 </span> words) -->
                                     (Please limit answer to 75 words.)
                                    </p>
                                    <script>
                                        $(document).ready(function() {
                                            console.log("ready!");
                                            let countwords = $.trim($('#stepSevenTextAreaOne').val()).split(' ').filter(function(
                                                v) {
                                                return v !== ''
                                            }).length;
                                            console.log(countwords);
                                            document.getElementById("wordCountOne").innerHTML = 125 - countwords;
                                        });

                                        $("[data-maxcount]").each(function() {
                                            let _this = $(this);
                                            let _this_count = parseInt(_this.attr("data-maxcount"));
                                            _this.find("#stepSevenTextAreaOne").on("keyup", function() {
                                                let words =0;
                                                if (this.value.match(/\S+/g) != null) {
                                                    words = this.value.match(/\S+/g).length;
                                                }
                                                if (words > _this_count) {
                                                    let trimmed = $(this).val().split(/\s+/, _this_count).join(" ");
                                                    $(this).val(trimmed + " ");
                                                } else {
                                                    _this.find("#wordCountOne").text(_this_count - words);
                                                }
                                            }); 
                                        });  
                                    </script>
                                </div>
                                @error('spiritualCommunityInfo.Impact_to_Community')
                                    <div class="error error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>How would you describe your family's spirituality?
                                    <span class="lbl-spn">Check all that apply.</span></label>
                                <div class="check-wrap">
                                    @foreach ($spiritualitiesList as $spkey => $item)
                                        <label class="check-inn">{{ ucwords($item['name']) }}
                                            <input type="checkbox" class="open"
                                                wire:model="spiritualCommunityInfo.Describe_Family_Spirituality.{{ $item['id'] }}">
                                            <span class="checkmark"></span>
                                        </label>
                                    @endforeach
                                    @error('spiritualCommunityInfo.Describe_Family_Spirituality')
                                        <p class="error error_text">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Describe in more detail the practice(s) checked
                                    above:</label>
                                <div data-maxcount="125" wire:ignore>
                                    <textarea id="stepSevenTextAreaTwo"
                                        class="word_count form-control {{ $errors->has('spiritualCommunityInfo.Describe_Practice_in_Detail') ? 'is-invalid' : '' }}"
                                        name="first_name" wire:model.defer='spiritualCommunityInfo.Describe_Practice_in_Detail'></textarea>
                                    {{-- @error('spiritualCommunityInfo.Describe_Practice_in_Detail')
                                        <div class="invalid-feedback error_text">{{ $message }}</div>
                                    @enderror --}}
                                    <p class="wrds">
                                    <!--    (Max <span class="word_left" id="wordCountTwo">75 </span> words) -->
                                     (Please limit answer to 75 words.)                                        
                                    </p> 
                                    <script>
                                        $(document).ready(function() {
                                            console.log("ready!");
                                            let countwords = $.trim($('#stepSevenTextAreaTwo').val()).split(' ').filter(function(
                                                v) {
                                                return v !== ''
                                            }).length;
                                            console.log(countwords);
                                            document.getElementById("wordCountTwo").innerHTML = 125 - countwords;
                                        });
                                        $("[data-maxcount]").each(function() {
                                            let _this = $(this);
                                            let _this_count = parseInt(_this.attr("data-maxcount"));
                                            _this.find("#stepSevenTextAreaTwo").on("keyup", function() {
                                                let words = 0;
                                                if (this.value.match(/\S+/g) != null) {
                                                    words = this.value.match(/\S+/g).length;
                                                }
                                                if (words > _this_count) {
                                                    let trimmed = $(this).val().split(/\s+/, _this_count).join(" ");
                                                    $(this).val(trimmed + " ");
                                                } else {
                                                    _this.find("#wordCountTwo").text(_this_count - words);
                                                }
                                            }); 
                                        }); 
                                    </script>
                                </div>
                                @error('spiritualCommunityInfo.Describe_Practice_in_Detail')
                                    <div class="error error_text">{{ $message }}</div>
                                @enderror 
                            </div>

                            <div class="form-group">
                                <label>Will you encourage your child to proactively participate
                                    in the following activities?</label>
                            </div>

                            <div class="form-group">
                                <label>Religious Studies Classes:</label>
                                <select
                                    class="form-control {{ $errors->has('spiritualCommunityInfo.Religious_Studies_Classes') ? 'is-invalid' : '' }}"
                                    wire:model='spiritualCommunityInfo.Religious_Studies_Classes'>
                                    <option value="">-- Please Choose --</option>
                                    @foreach ($religionsStudiesList as $religions)
                                        <option value="{{ $religions['religions_name'] }}">
                                            {{ $religions['religions_name'] }}</option>
                                    @endforeach
                                </select>
                                @error('spiritualCommunityInfo.Religious_Studies_Classes')
                                    <div class="invalid-feedback error_text">{{ $message }}</div>
                                @enderror
                            </div>
                            @if ($spiritualCommunityInfo['Religious_Studies_Classes'] == 'Unsure' ||
                                $spiritualCommunityInfo['Religious_Studies_Classes'] == 'No')
                                <div class="form-group">
                                    <label class="blck">If No/Unsure, please explain:</label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('spiritualCommunityInfo.Religious_Studies_Classes_Explanation') ? 'is-invalid' : '' }}"
                                        wire:model.defer='spiritualCommunityInfo.Religious_Studies_Classes_Explanation'>
                                    @error('spiritualCommunityInfo.Religious_Studies_Classes_Explanation')
                                        <div class="invalid-feedback error_text">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif

                            <div class="form-group">
                                <label> School Liturgies:</label>
                                <select
                                    class="form-control {{ $errors->has('spiritualCommunityInfo.School_Liturgies') ? 'is-invalid' : '' }}"
                                    wire:model='spiritualCommunityInfo.School_Liturgies'>
                                    <option value="">-- Please Choose --</option>
                                    @foreach ($liturgiesList as $liturgies)
                                        <option value="{{ $liturgies['liturgies_name'] }}">
                                            {{ $liturgies['liturgies_name'] }}</option>
                                    @endforeach
                                </select>
                                @error('spiritualCommunityInfo.School_Liturgies')
                                    <div class="invalid-feedback error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            @if ($spiritualCommunityInfo['School_Liturgies'] == 'Unsure' ||
                                $spiritualCommunityInfo['School_Liturgies'] == 'No')
                                <div class="form-group">
                                    <label class="blck">If No/Unsure, please explain:</label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('spiritualCommunityInfo.School_Liturgies_Explanation') ? 'is-invalid' : '' }}"
                                        wire:model.defer='spiritualCommunityInfo.School_Liturgies_Explanation'>
                                    @error('spiritualCommunityInfo.School_Liturgies_Explanation')
                                        <div class="invalid-feedback error_text">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif

                            <div class="form-group">
                                <label> Retreats:</label>
                                <select
                                    class="form-control {{ $errors->has('spiritualCommunityInfo.Retreats') ? 'is-invalid' : '' }}"
                                    wire:model='spiritualCommunityInfo.Retreats'>
                                    <option value="">-- Please Choose --</option>
                                    @foreach ($retreatsList as $retreats)
                                        <option value="{{ $retreats['retreats_name'] }}">
                                            {{ $retreats['retreats_name'] }}</option>
                                    @endforeach
                                </select>
                                @error('spiritualCommunityInfo.Retreats')
                                    <div class="invalid-feedback error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            @if ($spiritualCommunityInfo['Retreats'] == 'Unsure' || $spiritualCommunityInfo['Retreats'] == 'No')
                                <div class="form-group">
                                    <label class="blck">If No/Unsure, please explain:</label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('spiritualCommunityInfo.Retreats_Explanation') ? 'is-invalid' : '' }}"
                                        wire:model.defer='spiritualCommunityInfo.Retreats_Explanation'>
                                    @error('spiritualCommunityInfo.Retreats_Explanation')
                                        <div class="invalid-feedback error_text">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif

                            <div class="form-group">
                                <label> Community Service:</label>
                                <select
                                    class="form-control {{ $errors->has('spiritualCommunityInfo.Community_Service') ? 'is-invalid' : '' }}"
                                    wire:model='spiritualCommunityInfo.Community_Service'>
                                    <option value="">-- Please Choose --</option>
                                    @foreach ($communityServiceList as $communityService)
                                        <option value="{{ $communityService['communityService_name'] }}">
                                            {{ $communityService['communityService_name'] }}</option>
                                    @endforeach
                                </select>
                                @error('spiritualCommunityInfo.Community_Service')
                                    <div class="invalid-feedback error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            @if ($spiritualCommunityInfo['Community_Service'] == 'Unsure' ||
                                $spiritualCommunityInfo['Community_Service'] == 'No')
                                <div class="form-group">
                                    <label class="blck">If No/Unsure, please explain:</label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('spiritualCommunityInfo.Community_Service_Explanation') ? 'is-invalid' : '' }}"
                                        wire:model.defer='spiritualCommunityInfo.Community_Service_Explanation'>
                                    @error('spiritualCommunityInfo.Community_Service_Explanation')
                                        <div class="invalid-feedback error_text">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="school-wrap pt application_step__seven">
                <div class="form-outr">
                    <div class="form-wrap">
                        <div class="form-group">
                            <label>Religious Form Submitted By:</label>
                            <input type="text"
                                class="form-control {{ $errors->has('spiritualCommunityInfo.Religious_Form_Submitted_By') ? 'is-invalid' : '' }}"
                                wire:model.defer='spiritualCommunityInfo.Religious_Form_Submitted_By'>
                            @error('spiritualCommunityInfo.Religious_Form_Submitted_By')
                                <div class="invalid-feedback error_text">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label> Relationship to Student(s):</label>
                            <select
                                class="form-control {{ $errors->has('spiritualCommunityInfo.Religious_Form_Relationship') ? 'is-invalid' : '' }}"
                                wire:model='spiritualCommunityInfo.Religious_Form_Relationship'>
                                <option value="">-- Please Choose --</option>
                                @foreach ($relationshipList as $relationship)
                                    <option value="{{ $relationship['relationship_name'] }}">
                                        {{ $relationship['relationship_name'] }}</option>
                                @endforeach
                            </select>
                            @error('spiritualCommunityInfo.Religious_Form_Relationship')
                                <div class="invalid-feedback error_text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flx">
            <div class="form-btn">
                <a href="{{ route('admission-application', ['step' => 'six']) }}" class="sub-btn">Previous</a>
            </div>
            <div class="form-btn">
                <button type="submit" value="Next" class="sub-btn">Next/Save</button>
            </div>
        </div>

    </form>
</div>
