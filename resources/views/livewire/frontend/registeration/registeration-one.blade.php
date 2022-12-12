<div>
    <form wire:submit.prevent="saveOrUpdate">
        <div class="home-wrap hme-wrp2">
            <div class="progress-outr">
                <ul class="progress-ul">
                    <li class="step-complete">
<!--                         @if ($studentInfo) -->
<!--                             <a href="{{ route('admission-application', ['step' => 'one']) }}"> -->
<!--                                 <span>1</span> -->
<!--                                 <h6>Student Info</h6> -->
<!--                             </a> -->
<!--                         @else -->
                            <a href="javascript::void(0)">
                                <span>1</span>
                                <h6>Verification of student information </h6>
                            </a>
                        @endif

                    </li>
                    <li>
<!--                         @if ($studentInfo) -->
<!--                             <a href="{{ route('admission-application', ['step' => 'two']) }}"> -->
<!--                                 <span>2</span> -->
<!--                                 <h6>Address Info</h6> -->
<!--                             </a> -->
<!--                         @else -->
                            <a href="javascript::void(0)">
                                <span>2</span>
                                <h6>Verification of household information</h6>
                            </a>
                        @endif
                    </li>
                    <li>
                        @if ($studentInfo)
                            <a href="{{ route('admission-application', ['step' => 'three']) }}">
                                <span>3</span>
                                <h6 class="mt-4">Health Information</h6>
                            </a>
                        @else
                            <a href="javascript::void(0)">
                                <span>3</span>
                                <h6 class="mt-4">Health Information </h6>
                            </a>
                        @endif
                    </li>
                    <li>
                        @if ($studentInfo)
                            <a href="{{ route('admission-application', ['step' => 'four']) }}">
                                <span>4</span>
                                <h6>Emergency Contact Information </h6>
                            </a>
                        @else
                            <a href="javascript::void(0)">
                                <span>4</span>
                                <h6>Emergency Contact Information </h6>
                            </a>
                        @endif
                    </li>
                    <li>
                        @if ($studentInfo)
                            <a href="{{ route('admission-application', ['step' => 'five']) }}">
                                <span>5</span>
                                <h6>School-Based Accommodations Information</h6>
                            </a>
                        @else
                            <a href="javascript::void(0)">
                                <span>5</span>
                                <h6>School-Based Accommodations Information</h6>
                            </a>
                        @endif
                    </li>
                    <li>
                        @if ($studentInfo)
                            <a href="{{ route('admission-application', ['step' => 'six']) }}">
                                <span>6</span>
                                <h6 class="mt-4">Magis HS Support Program</h6>
                            </a>
                        @else
                            <a href="javascript::void(0)">
                                <span>6</span>
                                <h6 class="mt-4">Magis HS Support Program</h6>
                            </a>
                        @endif
                    </li>
                    <li>
                        @if ($studentInfo)
                            <a href="{{ route('admission-application', ['step' => 'seven']) }}">
                                <span>7</span>
                                <h6 class="mt-2">Course Placement Information </h6>
                            </a>
                        @else
                            <a href="javascript::void(0)">
                                <span>7</span>
                                <h6 class="mt-2">Course Placement Information </h6>
                            </a>
                        @endif
                    </li>
                  
                </ul>
            </div>

            <div class="form-outr">
                <div class="cmn-hdr">
                    <h4>Student Info</h4>
                </div>
               

        
                    <div class="school-wrap step__one">
                        <div class="form-wrap">
                            <div class="form-group">
                                <label>Student Name</label>
                                        <input type="text" class="form-control"
                                            wire:model.defer='#'  />

                                  
        </div>
           <div class="form-group">
                                <label>Student Email</label>
                                        <input type="email" class="form-control"
                                            wire:model.defer='#'  />

                                  
        </div>
        <div class="form-btn text-end mt">
            <button type="submit" value="Next" class="sub-btn">Next/Save</button>
        </div>
    </form>
</div>
