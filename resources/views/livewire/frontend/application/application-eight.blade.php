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
                    <li class="step-complete">
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

            <div class="school-wrap application_step__eight">
                <div class="form-outr">

                    <div class="cmn-hdr">
                        <h4>Student Statement</h4>
                    </div>

                    <div class="frm-uppr">
                        <div class="direct">
                            <h5>DIRECTIONS:</h5>
                            <p>
                                <strong>This section is to be completed by the student. Please
                                    prepare and save your answers in a word document first.
                                    Then, copy and paste your answers on this page. This will
                                    ensure you will always have a back up of your work.
                                    Required fields are in <i class="red">red.</i><br><br>
                                Please make sure every required field is completed before saving your work. To save your work, you must click the <i class="red">Next/Save</i> button at the bottom of the page.
                                </strong>
                            </p>
                        </div>
                    </div>

                    <div class="form-wrap">
                        @foreach ($studentStatementInfo['Students_Statement'] as $key => $item)
                            <div class="student_parent_statement">
                                <h4>{{ $item['Student_name'] }}</h4>

                                <div class="form-group">
                                    <label>Why did you decide to apply to St. Ignatius College
                                        Preparatory?</label>
                                    <div data-maxcount="125" wire:ignore>

                                        <textarea id="{{ $key }}S{{ $key + 1 }}_Why_did_you_decide_to_apply_to_SI"
                                            class="word_count form-control {{ $errors->has('studentStatementInfo.Students_Statement.' . $key . '.S' . ($key + 1) . '_Why_did_you_decide_to_apply_to_SI') ? 'is-invalid' : '' }}"
                                            wire:model.defer='studentStatementInfo.Students_Statement.{{ $key }}.S{{ $key + 1 }}_Why_did_you_decide_to_apply_to_SI'></textarea>
                                        {{-- @error('studentStatementInfo.Students_Statement.*.S' . ($key + 1) . '_Why_did_you_decide_to_apply_to_SI')
                                            <div class="invalid-feedback error_text">{{ $message }}</div>
                                        @enderror --}}
                                        <p class="wrds">
                                        <!--    (Max <span class="word_left"
                                                id="{{ $key }}S{{ $key + 1 }}_Why_did_you_decide_to_apply_to_SI_A">75
                                            </span>
                                            words) -->
                                        (Please limit answer to 75 words.)
                                        </p>
                                        <script>
                                            $(document).ready(function() {
                                                console.log("ready!");
                                                let countwords = $.trim($(
                                                        '#{{ $key }}S{{ $key + 1 }}_Why_did_you_decide_to_apply_to_SI')
                                                    .val()).split(' ').filter(function(
                                                    v) {
                                                    return v !== ''
                                                }).length;
                                                console.log(countwords);
                                                document.getElementById("{{ $key }}S{{ $key + 1 }}_Why_did_you_decide_to_apply_to_SI_A")
                                                    .innerHTML = 125 - countwords;
                                            });
                                            $("[data-maxcount]").each(function() {
                                                let _this = $(this);
                                                let _this_count = parseInt(_this.attr("data-maxcount"));
                                                _this.find("#{{ $key }}S{{ $key + 1 }}_Why_did_you_decide_to_apply_to_SI").on("keyup",
                                                    function() {
                                                        let words = 0;
                                                        if (this.value.match(/\S+/g) != null) {
                                                            words = this.value.match(/\S+/g).length;
                                                        }
                                                        if (words > _this_count) {
                                                            let trimmed = $(this).val().split(/\s+/, _this_count).join(" ");
                                                            $(this).val(trimmed + " ");
                                                        } else {
                                                            _this.find(
                                                                "#{{ $key }}S{{ $key + 1 }}_Why_did_you_decide_to_apply_to_SI_A"
                                                            ).text(_this_count - words);
                                                        }
                                                    });
                                            });
                                        </script>
                                    </div>
                                    @error('studentStatementInfo.Students_Statement.*.S' . ($key + 1) .
                                        '_Why_did_you_decide_to_apply_to_SI')
                                        <div class="error error_text">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>What do you think will be your greatest challenge at SI
                                        and how do you plan to meet that challenge?</label>
                                    <div data-maxcount="125" wire:ignore>
                                        <textarea id="{{ $key }}S{{ $key + 1 }}_Greatest_Challenge"
                                            class="word_count form-control {{ $errors->has('studentStatementInfo.Students_Statement.' . $key . '.S' . ($key + 1) . '_Greatest_Challenge') ? 'is-invalid' : '' }}"
                                            wire:model.defer='studentStatementInfo.Students_Statement.{{ $key }}.S{{ $key + 1 }}_Greatest_Challenge'></textarea>
                                        {{-- @error('studentStatementInfo.Students_Statement.*.S' . ($key + 1) . '_Greatest_Challenge')
                                            <div class="invalid-feedback error_text">{{ $message }}</div>
                                        @enderror --}}
                                        <p class="wrds">
                                        <!--   (Max <span class="word_left"
                                                id="{{ $key }}S{{ $key + 1 }}_Greatest_Challenge_B">75
                                            </span>
                                            words) -->
                                        (Please limit answer to 75 words.)
                                        </p>
                                        <script>
                                            $(document).ready(function() {
                                                console.log("ready!");
                                                let countwords = $.trim($('#{{ $key }}S{{ $key + 1 }}_Greatest_Challenge').val()).split(
                                                    ' ').filter(function(
                                                    v) {
                                                    return v !== ''
                                                }).length;
                                                console.log(countwords);
                                                document.getElementById("{{ $key }}S{{ $key + 1 }}_Greatest_Challenge_B").innerHTML =
                                                    125 - countwords;
                                            });
                                            $("[data-maxcount]").each(function() {
                                                let _this = $(this);
                                                let _this_count = parseInt(_this.attr("data-maxcount"));
                                                _this.find("#{{ $key }}S{{ $key + 1 }}_Greatest_Challenge").on("keyup", function() {
                                                    let words = 0;
                                                    if (this.value.match(/\S+/g) != null) {
                                                        words = this.value.match(/\S+/g).length;
                                                    }
                                                    if (words > _this_count) {
                                                        let trimmed = $(this).val().split(/\s+/, _this_count).join(" ");
                                                        $(this).val(trimmed + " ");
                                                    } else {
                                                        _this.find("#{{ $key }}S{{ $key + 1 }}_Greatest_Challenge_B").text(
                                                            _this_count - words);
                                                    }
                                                });
                                            });
                                        </script>
                                    </div>
                                    @error('studentStatementInfo.Students_Statement.*.S' . ($key + 1) .
                                        '_Greatest_Challenge')
                                        <div class="error error_text">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>What religious activity(-ies) do you plan on
                                        participating in at SI as part of your spiritual growth
                                        and why?</label>
                                    <div data-maxcount="125" wire:ignore>

                                        <textarea id="{{ $key }}S{{ $key + 1 }}_Religious_Activities_for_Growth"
                                            class="word_count form-control {{ $errors->has('studentStatementInfo.Students_Statement.' . $key . '.S' . ($key + 1) . '_Religious_Activities_for_Growth') ? 'is-invalid' : '' }}"
                                            wire:model.defer='studentStatementInfo.Students_Statement.{{ $key }}.S{{ $key + 1 }}_Religious_Activities_for_Growth'></textarea>
                                        {{-- @error('studentStatementInfo.Students_Statement.*.S' . ($key + 1) . '_Religious_Activities_for_Growth')
                                            <div class="invalid-feedback error_text">{{ $message }}</div>
                                        @enderror --}}
                                        <p class="wrds">
                                         <!--   (Max <span class="word_left"
                                                id="{{ $key }}S{{ $key + 1 }}_Religious_Activities_for_Growth_C">75
                                            </span>
                                            words) -->
                                        (Please limit answer to 75 words.)
                                        </p>
                                        <script>
                                            $(document).ready(function() {
                                                console.log("ready!");
                                                let countwords = $.trim($('#{{ $key }}S{{ $key + 1 }}_Religious_Activities_for_Growth')
                                                    .val()).split(' ').filter(function(
                                                    v) {
                                                    return v !== ''
                                                }).length;
                                                console.log(countwords);
                                                document.getElementById("{{ $key }}S{{ $key + 1 }}_Religious_Activities_for_Growth_C")
                                                    .innerHTML = 125 - countwords;
                                            });
                                            $("[data-maxcount]").each(function() {
                                                let _this = $(this);
                                                let _this_count = parseInt(_this.attr("data-maxcount"));
                                                _this.find("#{{ $key }}S{{ $key + 1 }}_Religious_Activities_for_Growth").on("keyup",
                                                    function() {
                                                        let words = 0;
                                                        if (this.value.match(/\S+/g) != null) {
                                                            words = this.value.match(/\S+/g).length;
                                                        }
                                                        if (words > _this_count) {
                                                            let trimmed = $(this).val().split(/\s+/, _this_count).join(" ");
                                                            $(this).val(trimmed + " ");
                                                        } else {
                                                            _this.find(
                                                                    "#{{ $key }}S{{ $key + 1 }}_Religious_Activities_for_Growth_C")
                                                                .text(_this_count - words);
                                                        }
                                                    });
                                            });
                                        </script>
                                    </div>
                                    @error('studentStatementInfo.Students_Statement.*.S' . ($key + 1) .
                                        '_Religious_Activities_for_Growth')
                                        <div class="error error_text">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>What is your favorite subject in school and why? What
                                        subject do you find the most difficult and why?</label>
                                    <div data-maxcount="125">
                                        <textarea id="{{ $key }}S{{ $key + 1 }}_Favorite_and_most_difficult_subjects"
                                            class="word_count form-control {{ $errors->has('studentStatementInfo.Students_Statement.' . $key . '.S' . ($key + 1) . '_Favorite_and_most_difficult_subjects') ? 'is-invalid' : '' }}"
                                            wire:model.defer='studentStatementInfo.Students_Statement.{{ $key }}.S{{ $key + 1 }}_Favorite_and_most_difficult_subjects'></textarea>
                                        <p class="wrds">
                                         <!--   (Max <span class="word_left"
                                                id="{{ $key }}S{{ $key + 1 }}_Favorite_and_most_difficult_subjects_D">75
                                            </span>
                                            words) -->
                                        (Please limit answer to 75 words.)
                                        </p>
                                        <script>
                                            $(document).ready(function() {
                                                console.log("ready!");
                                                let countwords = $.trim($(
                                                    '#{{ $key }}S{{ $key + 1 }}_Favorite_and_most_difficult_subjects').val()).split(
                                                    ' ').filter(function(
                                                    v) {
                                                    return v !== ''
                                                }).length;
                                                console.log(countwords);
                                                document.getElementById(
                                                        "{{ $key }}S{{ $key + 1 }}_Favorite_and_most_difficult_subjects_D").innerHTML =
                                                    125 - countwords;
                                            });

                                            $("[data-maxcount]").each(function() {
                                                let _this = $(this);
                                                let _this_count = parseInt(_this.attr("data-maxcount"));
                                                _this.find("#{{ $key }}S{{ $key + 1 }}_Favorite_and_most_difficult_subjects").on(
                                                    "keyup",
                                                    function() {
                                                        let words = 0;
                                                        if (this.value.match(/\S+/g) != null) {
                                                            words = this.value.match(/\S+/g).length;
                                                        }
                                                        if (words > _this_count) {
                                                            let trimmed = $(this).val().split(/\s+/, _this_count).join(" ");
                                                            $(this).val(trimmed + " ");
                                                        } else {
                                                            _this.find(
                                                                "#{{ $key }}S{{ $key + 1 }}_Favorite_and_most_difficult_subjects_D"
                                                            ).text(_this_count - words);
                                                        }
                                                    });
                                            });
                                        </script>
                                    </div>
                                    @error('studentStatementInfo.Students_Statement.*.S' . ($key + 1) .
                                        '_Favorite_and_most_difficult_subjects')
                                        <div class="error error_text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="school-wrap application_step__eight">
                <div class="form-outr">
                    <div class="cmn-hdr">
                        <h4>Extracurricular Activities</h4>
                    </div>
                    <div class="frm-uppr">
                        <div class="direct">
                            <h5>DIRECTIONS:</h5>
                            <p>
                                <strong>List up to four current extracurricular activities that
                                    you are most passionate about.
                                </strong>
                            </p>
                        </div>
                    </div>

                    @foreach ($studentStatementInfo['Extracurricular_Activities'] as $skey => $students)
                        @foreach ($students['Activity'] as $akey => $item)
                            <div class="form-wrap">
                                <h4>{{ $students['Student_name'] }} - Activity {{ $akey + 1 }}</h4>
                                <div class="form-group">
                                    <label>Activity Name:</label>
                                    <input type="text" class="form-control" name="activity_name" placeholder=""
                                        wire:model.defer='studentStatementInfo.Extracurricular_Activities.{{ $skey }}.Activity.{{ $akey }}.Activity_Name'>

                                    @if ($errors->has('studentStatementInfo.Extracurricular_Activities.' . $skey . '.Activity.' . $akey . '.*'))
                                        <div class="error error_text">This field is required</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Number of Years:</label>
                                    <select class="form-control"
                                        wire:model.defer='studentStatementInfo.Extracurricular_Activities.{{ $skey }}.Activity.{{ $akey }}.Number_of_Years'>
                                        <option value="">-- Please Choose --</option>
                                        @foreach ($numberOfYears as $year)
                                            <option value="{{ $year['name'] }}">{{ $year['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('studentStatementInfo.Extracurricular_Activities.' . $skey . '.Activity.' . $akey . '.*'))
                                        <div class="error error_text">This field is required</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label> Hours per Week:</label>
                                    <select class="form-control"
                                        wire:model.defer='studentStatementInfo.Extracurricular_Activities.{{ $skey }}.Activity.{{ $akey }}.Hours_Per_Week'>
                                        <option value="">-- Please Choose --</option>
                                        @foreach ($hoursPerWeek as $week)
                                            <option value="{{ $week['name'] }}">{{ $week['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('studentStatementInfo.Extracurricular_Activities.' . $skey . '.Activity.' . $akey . '.*'))
                                        <div class="error error_text">This field is required</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Share a little information about this activity.
                                        <span class="lbl-spn">Complete sentences are not necessary.</span>
                                    </label>
                                    <textarea class="word_count form-control"
                                        wire:model.defer='studentStatementInfo.Extracurricular_Activities.{{ $skey }}.Activity.{{ $akey }}.Info_about_activity'></textarea>

                                    <p class="wrds">
                                        FOR EXAMPLE: Position played on team, Instrument played in
                                        orchestra, Name of your team or program,
                                        Awards/Recognition Received, Current Stats, etc.
                                    </p>
                                    @if ($errors->has('studentStatementInfo.Extracurricular_Activities.' . $skey . '.Activity.' . $akey . '.*'))
                                        <div class="error error_text">This field is required</div>
                                    @endif
                                </div>

                                <div class="form-outr">
                                    <div class="schl-btm mt">
                                        @php
                                            $a = 0;
                                            if ($skey == 0) {
                                                $a = $i;
                                            } elseif ($skey == 1) {
                                                $a = $j;
                                            } elseif ($skey == 2) {
                                                $a = $k;
                                            }
                                        @endphp

                                        <div class="form_input_radio">
                                            @if ($akey < 3 && $a !== 4)
                                                <a class="btn btn-danger btn-sm"
                                                    wire:click="add({{ $skey }},{{ $akey + 1 }})">Add
                                                    another
                                                    activity</a>
                                            @endif
                                            @if ($akey != 0)
                                                <a class="btn btn-danger btn-sm"
                                                    wire:click="remove({{ $skey }},{{ $akey }})">Remove
                                                    activity</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>

                        @endforeach
                    @endforeach
                </div>
            </div>

            <div class="school-wrap application_step__eight">
                <div class="form-outr">
                    <div class="cmn-hdr">
                        <h4>Future Activities at SI</h4>
                    </div>
                    @foreach ($studentStatementInfo['Future_Activities'] as $fkey => $item)
                        <div class="form-wrap">
                            <h4>{{ $item['Student_name'] }}</h4>

                            <div class="form-group">
                                <label>From your activities listed above, select the activity
                                    you are most passionate about continuing at SI and
                                    describe what you feel you would contribute to this
                                    activity.
                                    <span class="lbl-spn">You may select an activity not listed above if you feel
                                        it is more appropriate to your situation.</span></label>
                                <div data-maxcount="125" wire:ignore>
                                    <textarea id="{{ $fkey }}S{{ $fkey + 1 }}_Most_Passionate_Activity"
                                        class="word_count form-control {{ $errors->has('studentStatementInfo.Future_Activities.' . $fkey . '.S' . ($fkey + 1) . '_Most_Passionate_Activity') ? 'is-invalid' : '' }}"
                                        wire:model.defer='studentStatementInfo.Future_Activities.{{ $fkey }}.S{{ $fkey + 1 }}_Most_Passionate_Activity'></textarea>
                                    {{-- @error('studentStatementInfo.Future_Activities.*.S' . ($fkey + 1) . '_Most_Passionate_Activity')
                                        <div class="invalid-feedback error_text">{{ $message }}</div>
                                    @enderror --}}
                                    <p class="wrds">
                                     <!--   (Max <span class="word_left"
                                            id="{{ $fkey }}S{{ $fkey + 1 }}_Most_Passionate_Activity_X">75
                                        </span> words) -->
                                    (Please limit answer to 75 words.)
                                    </p>
                                    <script>
                                        $(document).ready(function() {
                                            console.log("ready!");
                                            let countwords = $.trim($('#{{ $fkey }}S{{ $fkey + 1 }}_Most_Passionate_Activity')
                                                .val())
                                                .split(' ').filter(
                                                    function(
                                                        v) {
                                                        return v !== ''
                                                    }).length;
                                            document.getElementById("{{ $fkey }}S{{ $fkey + 1 }}_Most_Passionate_Activity_X")
                                                .innerHTML = 125 - countwords;
                                        });

                                        $("[data-maxcount]").each(function() {
                                            let _this = $(this);
                                            let _this_count = parseInt(_this.attr("data-maxcount"));
                                            _this.find("#{{ $fkey }}S{{ $fkey + 1 }}_Most_Passionate_Activity").on("keyup",
                                                function() {
                                                    let words = 0;
                                                    if (this.value.match(/\S+/g) != null) {
                                                        words = this.value.match(/\S+/g).length;
                                                    }
                                                    if (words > _this_count) {
                                                        let trimmed = $(this).val().split(/\s+/, _this_count).join(" ");
                                                        $(this).val(trimmed + " ");
                                                    } else {
                                                        _this.find("#{{ $fkey }}S{{ $fkey + 1 }}_Most_Passionate_Activity_X")
                                                            .text(_this_count - words);
                                                    }
                                                });
                                        });
                                    </script>
                                </div>
                                @error('studentStatementInfo.Future_Activities.*.S' . ($fkey + 1) .
                                    '_Most_Passionate_Activity')
                                    <div class="error error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Select two more extra-curricular activities that you
                                    might like to be involved in at SI.
                                    <span class="lbl-spn">Explain why these activities appeal to you. Please make
                                        sure at least one of these activities is new to
                                        you.</span></label>
                                <div data-maxcount="125" wire:ignore>
                                    <textarea id="{{ $fkey }}S{{ $fkey + 1 }}_Extracurricular_Activity_at_SI"
                                        class="word_count form-control {{ $errors->has('studentStatementInfo.Future_Activities.' . $fkey . '.S' . ($fkey + 1) . '_Extracurricular_Activity_at_SI') ? 'is-invalid' : '' }}"
                                        wire:model.defer='studentStatementInfo.Future_Activities.{{ $fkey }}.S{{ $fkey + 1 }}_Extracurricular_Activity_at_SI'></textarea>
                                    {{-- @error('studentStatementInfo.Future_Activities.*.S' . ($fkey + 1) . '_Extracurricular_Activity_at_SI')
                                        <div class="invalid-feedback error_text">{{ $message }}</div>
                                    @enderror --}}
                                    <p class="wrds">
                                     <!--   (Max <span class="word_left"
                                            id="{{ $fkey }}S{{ $fkey + 1 }}_Extracurricular_Activity_at_SI_Y">75
                                        </span> words) -->
                                    (Please limit answer to 75 words.)
                                    </p>
                                    <script>
                                        $(document).ready(function() {
                                            console.log("ready!");
                                            let countwords = $.trim($('#{{ $fkey }}S{{ $fkey + 1 }}_Extracurricular_Activity_at_SI')
                                                .val()).split(' ').filter(
                                                function(
                                                    v) {
                                                    return v !== ''
                                                }).length;
                                            //console.log("Bapi == >",countwords);
                                            document.getElementById("{{ $fkey }}S{{ $fkey + 1 }}_Extracurricular_Activity_at_SI_Y")
                                                .innerHTML = 125 - countwords;
                                        });
                                        $("[data-maxcount]").each(function() {
                                            let _this = $(this);
                                            let _this_count = parseInt(_this.attr("data-maxcount"));
                                            _this.find("#{{ $fkey }}S{{ $fkey + 1 }}_Extracurricular_Activity_at_SI").on("keyup",
                                                function() {
                                                    let words = 0;
                                                    if (this.value.match(/\S+/g) != null) {
                                                        words = this.value.match(/\S+/g).length;
                                                    }
                                                    if (words > _this_count) {
                                                        let trimmed = $(this).val().split(/\s+/, _this_count).join(" ");
                                                        $(this).val(trimmed + " ");
                                                    } else {
                                                        _this.find(
                                                                "#{{ $fkey }}S{{ $fkey + 1 }}_Extracurricular_Activity_at_SI_Y")
                                                            .text(_this_count - words);
                                                    }
                                                });
                                        });
                                    </script>
                                </div>
                                @error('studentStatementInfo.Future_Activities.*.S' . ($fkey + 1) .
                                    '_Extracurricular_Activity_at_SI')
                                    <div class="error error_text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="flx">
            <div class="form-btn">
                <a href="{{ route('admission-application', ['step' => 'seven']) }}" class="sub-btn">Previous</a>
            </div>
            <div class="form-btn">
                <button type="submit" value="Next" class="sub-btn">Next/Save</button>
            </div>
        </div>
    </form>
</div>
