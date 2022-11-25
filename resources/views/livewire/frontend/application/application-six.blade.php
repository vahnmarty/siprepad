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

            <div class="school-wrap application_step__six">
                <div class="form-outr">
                    <div class="cmn-hdr">
                        <h4>Parent Statement</h4>
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
                                <label>Why do you desire St. Ignatius as a high school option
                                    for your child(ren)?</label>
                                <div data-maxcount="125" wire:ignore>
                                    <textarea id="stepSixTextArea"
                                        class="word_count form-control {{ $errors->has('Why_SI_for_Child') ? 'is-invalid' : '' }}"
                                        wire:model.defer='Why_SI_for_Child'></textarea>
                                    {{-- @error('Why_SI_for_Child')
                                    <div class="invalid-feedback error_text">{{ $message }}</div>
                                @enderror --}}
                                    <p class="wrds">
                                     <!--   (Max <span class="word_left" id="wordCount">75 </span> words) -->
                                     (Please limit answer to 75 words.)
                                    </p>
                                    <script>
                                        $(document).ready(function() {
                                            console.log("ready!");
                                            let countwords = $.trim($('#stepSixTextArea').val()).split(' ').filter(function(
                                                v) {
                                                return v !== ''
                                            }).length;
                                            console.log(countwords);
                                            document.getElementById("wordCount").innerHTML = 125 - countwords;
                                        });

                                        $("[data-maxcount]").each(function() {
                                            let _this = $(this);
                                            let _this_count = parseInt(_this.attr("data-maxcount"));
                                            _this.find("#stepSixTextArea").on("keyup", function() {
                                                let words = 0;
                                                if (this.value.match(/\S+/g) != null) {
                                                    words = this.value.match(/\S+/g).length;
                                                }
                                                if (words > _this_count) {
                                                    let trimmed = $(this).val().split(/\s+/, _this_count).join(" ");
                                                    $(this).val(trimmed + " ");
                                                } else {
                                                    _this.find("#wordCount").text(_this_count - words);
                                                }
                                            });
                                        });
                                    </script>
                                </div>
                                @error('Why_SI_for_Child')
                                    <div class="error error_text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        @foreach ($parentStatement as $key => $item)
                            <div class="student_parent_statement">
                                <h4>{{ $item['Student_name'] }}</h4>
                                <div class="form-group">
                                    <label>Explain your child's most endearing quality and an area
                                        of growth.</label>
                                    <div data-maxcount="125" wire:ignore>
                                        <textarea id="{{ $key }}S{{ $key + 1 }}_Endearing_Quality_and_Growth"
                                            class="word_count form-control {{ $errors->has('parentStatement.' . $key . '.S' . ($key + 1) . '_Endearing_Quality_and_Growth') ? 'is-invalid' : '' }}"
                                            wire:model.defer='parentStatement.{{ $key }}.S{{ $key + 1 }}_Endearing_Quality_and_Growth'></textarea>
                                        {{-- @error('parentStatement.*.S' . ($key + 1) . '_Endearing_Quality_and_Growth')
                                            <div class="invalid-feedback error_text">{{ $message }}</div>
                                        @enderror --}}
                                        <p class="wrds">
                                         <!--   (Max <span class="word_left" id="{{ $key }}S{{ $key + 1 }}_Endearing_Quality_and_Growth_a">75 </span> words) -->
                                         (Please limit answer to 75 words.)
                                        </p>
                                        <script>
                                            $(document).ready(function() {
                                                console.log("ready!");
                                                let countwords = $.trim($('#{{ $key }}S{{ $key + 1 }}_Endearing_Quality_and_Growth')
                                                    .val()).split(' ').filter(function(
                                                    v) {
                                                    return v !== ''
                                                }).length;
                                                console.log(countwords);
                                                document.getElementById("{{ $key }}S{{ $key + 1 }}_Endearing_Quality_and_Growth_a")
                                                    .innerHTML = 75 - countwords;
                                            });

                                            $("[data-maxcount]").each(function() {
                                                let _this = $(this);
                                                let _this_count = parseInt(_this.attr("data-maxcount"));
                                                _this.find("#{{ $key }}S{{ $key + 1 }}_Endearing_Quality_and_Growth").on("keyup",
                                                    function() {
                                                        let words = 0;
                                                        if (this.value.match(/\S+/g) != null) {
                                                            words = this.value.match(/\S+/g).length;
                                                        }
                                                        if (words > _this_count) {
                                                            let trimmed = $(this).val().split(/\s+/, _this_count).join(" ");
                                                            $(this).val(trimmed + " ");
                                                        } else {
                                                            _this.find("#{{ $key }}S{{ $key + 1 }}_Endearing_Quality_and_Growth_a")
                                                                .text(_this_count - words);
                                                        }
                                                    });
                                            });
                                        </script>
                                    </div>
                                    @error('parentStatement.*.S' . ($key + 1) . '_Endearing_Quality_and_Growth')
                                        <div class="error error_text">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Please tell us something that you want us to know about
                                        your child, but does not appear on this
                                        application.</label>
                                    <div data-maxcount="125" wire:ignore>
                                        <textarea id="{{ $key }}S{{ $key + 1 }}_About_Child_Not_on_App"
                                            class="word_count form-control {{ $errors->has('parentStatement.' . $key . '.S' . ($key + 1) . '_About_Child_Not_on_App') ? 'is-invalid' : '' }}"
                                            wire:model.defer='parentStatement.{{ $key }}.S{{ $key + 1 }}_About_Child_Not_on_App'></textarea>
                                        {{-- @error('parentStatement.*.S' . ($key + 1) . '_About_Child_Not_on_App')
                                            <div class="invalid-feedback error_text">{{ $message }}</div>
                                        @enderror --}}
                                        <p class="wrds">
                                        <!--    (Max <span class="word_left" id="{{ $key }}S{{ $key + 1 }}_About_Child_Not_on_App_b">75 </span>words) -->
                                        (Please limit answer to 75 words.)
                                        </p>
                                        <script>
                                            $(document).ready(function() {
                                                console.log("ready!");
                                                let countwords = $.trim($('#{{ $key }}S{{ $key + 1 }}_About_Child_Not_on_App').val())
                                                    .split(' ').filter(function(
                                                        v) {
                                                        return v !== ''
                                                    }).length;
                                                console.log(countwords);
                                                document.getElementById("{{ $key }}S{{ $key + 1 }}_About_Child_Not_on_App_b")
                                                    .innerHTML = 125 - countwords;
                                            });

                                            $("[data-maxcount]").each(function() {
                                                let _this = $(this);
                                                let _this_count = parseInt(_this.attr("data-maxcount"));
                                                _this.find("#{{ $key }}S{{ $key + 1 }}_About_Child_Not_on_App").on("keyup", function() {
                                                    let words = 0;
                                                    if (this.value.match(/\S+/g) != null) {
                                                        words = this.value.match(/\S+/g).length;
                                                    }
                                                    if (words > _this_count) {
                                                        let trimmed = $(this).val().split(/\s+/, _this_count).join(" ");
                                                        $(this).val(trimmed + " ");
                                                    } else {
                                                        _this.find("#{{ $key }}S{{ $key + 1 }}_About_Child_Not_on_App_b").text(
                                                            _this_count - words);
                                                    }
                                                });
                                            });
                                        </script>
                                    </div>
                                    @error('parentStatement.*.S' . ($key + 1) . '_About_Child_Not_on_App')
                                        <div class="error error_text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="school-wrap application_step__six">
                <div class="form-outr">
                    <div class="form-wrap">
                        <div class="form-group">
                            <label>Parent Statement Submitted By:</label>
                            <input type="text"
                                class="form-control {{ $errors->has('Parent_Statement_Submitted_By') ? 'is-invalid' : '' }}"
                                wire:model.defer='Parent_Statement_Submitted_By' />
                            @error('Parent_Statement_Submitted_By')
                                <div class="invalid-feedback error_text">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label>Relationship to Student(s):</label>
                            <select
                                class="form-control {{ $errors->has('Parent_Statement_Relationship') ? 'is-invalid' : '' }}"
                                wire:model='Parent_Statement_Relationship'>
                                <option value="">-- Please Choose --</option>
                                @foreach ($relationshipList as $relationship)
                                    <option value="{{ $relationship['relationship_name'] }}">
                                        {{ $relationship['relationship_name'] }}</option>
                                @endforeach
                            </select>
                            @error('Parent_Statement_Relationship')
                                <div class="invalid-feedback error_text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flx">
            <div class="form-btn">
                <a href="{{ route('admission-application', ['step' => 'five']) }}" class="sub-btn">Previous</a>
            </div>
            <div class="form-btn">
                <button type="submit" value="Next" class="sub-btn">Next/Save</button>
            </div>
        </div>
    </form>
</div>
