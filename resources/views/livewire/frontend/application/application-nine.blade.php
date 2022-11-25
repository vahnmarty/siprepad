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
                    <li class="step-complete">
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

            <div class="school-wrap no-brdr">
                <div class="form-outr">
                    <div class="cmn-hdr">
                        <h4>Applicant Writing Sample</h4>
                    </div>
                    <div class="frm-uppr">
                        <div class="direct">
                            <h5>DIRECTIONS:</h5>
                            <p>
                                <strong>This section is to be completed by the student. Please prepare and save your
                                    answers in a word document first. Then, copy and paste your answers on this
                                    page. This will ensure you will always have a back up of your work. Required
                                    fields are in <i class="red">red.</i>
                                </strong>
                                <strong class="str2">Select and complete one of the topics below. (1500 characters
                                    maximum, approximately 250 words)<br><br>
                                Please make sure every required field is completed before saving your work. To save your work, you must click the <i class="red">Next/Save</i> button at the bottom of the page.</strong>
                            </p>

                        </div>
                    </div>
                    @foreach ($writingSample as $key => $item)
                        <div class="form-wrap">
                            <h4>{{ $item['Student_name'] }}</h4>
                            <div>
                                <h4 class="red new-h4">What matters to you? How does that motivate you, impact your
                                    life, your outlook, and/or your identity?</h4>
                                <p>
                                    <strong>What matters to you might be an activity, an idea, a goal, a place, and/or a
                                        thing.</strong>
                                </p>
                                <p>
                                    <strong> <em class="nte2">PLEASE NOTE: </em> This essay should be about you and
                                        your thoughts. It should not be about the life of another person you admire.
                                    </strong>
                                </p>
                                <div class="or text-center">
                                    <p><strong>OR</strong></p>
                                </div>
                                <h4 class="red new-h4">An obstacle you have overcome.</h4>

                                <p>
                                    <strong> Explain how the obstacle impacted you and how you handled the situation
                                        (i.e., positive and/or negative attempts along the way or maybe how you're still
                                        working on it)
                                        .
                                    </strong>
                                </p>
                                <p>
                                    <strong>Include what you have learned from the experience and how you have applied
                                        (or might apply) this to another situation in your life.</strong>
                                </p>
                                <div class="form-group">
                                    <div data-maxcount="325" wire:ignore>
                                        <textarea id="{{ $key }}S{{ $key + 1 }}_Writing_Sample"
                                            class="word_count form-control {{ $errors->has('writingSample.' . $key . '.S' . ($key + 1) . '_Writing_Sample') ? 'is-invalid' : '' }}"
                                            name="first_name" wire:model.defer='writingSample.{{ $key }}.S{{ $key + 1 }}_Writing_Sample'></textarea>
                                        {{-- @error('writingSample.' . $key . '.S' . ($key + 1) . '_Writing_Sample')
                                            <div class="invalid-feedback error_text">{{ $message }}</div>
                                        @enderror --}}
                                        <p class="wrds">
                                        <!--    (Max <span class="word_left" id="{{ $key }}S{{ $key + 1 }}_Writing_Sample_A">250 </span> words) -->
                                        (Please limit answer to 250 words.)
                                        </p>
                                        <script>
                                            $(document).ready(function() {
                                                console.log("ready!");
                                                let countwords = $.trim($('#{{ $key }}S{{ $key + 1 }}_Writing_Sample').val()).split(' ')
                                                    .filter(
                                                        function(
                                                            v) {
                                                            return v !== ''
                                                        }).length;
                                                document.getElementById("{{ $key }}S{{ $key + 1 }}_Writing_Sample_A").innerHTML = 325 -
                                                    countwords;
                                            });

                                            $("[data-maxcount]").each(function() {
                                                let _this = $(this);
                                                let _this_count = parseInt(_this.attr("data-maxcount"));
                                                _this.find("#{{ $key }}S{{ $key + 1 }}_Writing_Sample").on("keyup", function() {
                                                    let words = 0;
                                                    if (this.value.match(/\S+/g) != null) {
                                                        words = this.value.match(/\S+/g).length;
                                                    }
                                                    if (words > _this_count) {
                                                        let trimmed = $(this).val().split(/\s+/, _this_count).join(" ");
                                                        $(this).val(trimmed + " ");
                                                    } else {
                                                        _this.find("#{{ $key }}S{{ $key + 1 }}_Writing_Sample_A").text(
                                                            _this_count - words);
                                                    }
                                                });
                                            });
                                        </script>
                                    </div>
                                    @error('writingSample.' . $key . '.S' . ($key + 1) . '_Writing_Sample')
                                        <div class="error error_text">{{ $message }}</div>
                                    @enderror
                                </div>
                                <label class="check-inn red mb-5">By clicking this box, I (applicant) declare that to
                                    the best of my knowledge, the information provided in the application submitted to
                                    St. Ignatius College Preparatory on this online application is true and complete.
                                    <input type="checkbox" wire:model.defer='writingSample.{{ $key }}.S{{ $key + 1 }}_Writing_Sample_Acknowledgment' />
                                    <span class="checkmark"></span>

                                    @error('writingSample.' . $key . '.S' . ($key + 1) .
                                        '_Writing_Sample_Acknowledgment')
                                        <div class="error error_text">{{ $message }}</div>
                                    @enderror
                                </label>
                                <div class="form-group">
                                    <label>Submitted By:</label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('writingSample.' . $key . '.S' . ($key + 1) . '_Writing_Sample_Submitted_By') ? 'is-invalid' : '' }}"
                                        wire:model.defer='writingSample.{{ $key }}.S{{ $key + 1 }}_Writing_Sample_Submitted_By'>
                                    @error('writingSample.' . $key . '.S' . ($key + 1) . '_Writing_Sample_Submitted_By')
                                        <div class="invalid-feedback error_text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="flx">
            <div class="form-btn">
                <a href="{{ route('admission-application', ['step' => 'eight']) }}" class="sub-btn">Previous</a>
            </div>
            <div class="form-btn">
                <button type="submit" value="Next" class="sub-btn">Next/Save</button>
            </div>
        </div>
    </form>
</div>
