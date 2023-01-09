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
                    <li class="step-complete">
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

            <div class="school-wrap application_step__ten">
                <div class="form-outr">
                    <div class="cmn-hdr">	
                            <h4>Instructions</h4>	
                            <p class = "str">	
                                Read through and click all required prompts.&nbsp;&nbsp;Click on the Pay Application Fee button to make a payment.&nbsp;&nbsp;	
                                Once payment has been made, click on the Submit Application button.&nbsp;&nbsp;To prevent issues with your application, you 	
                                must make a payment and submit the application in the same session.<BR><BR>	
                            </p>	
                    </div>
               
                                        <div class="form-outr">
                    @if($studentTransfer === App\Models\GlobalStudentTransfer::STUDENTTRANSFER_ON)

                    <div class="cmn-hdr">
                        <h4>Entrance Exam Information</h4>
                    </div>
                    @foreach ($releaseAuthorization['EntranceExamInfo'] as $key => $item)
                        <div class="form-wrap">
                            <div>
                                <h4>{{ $item['Student_name'] }}</h4>
                                <h4>Indicate the date and the high school where your child(ren) will take the entrance
                                    exam. <BR><BR>
                                    <B>Please note:</B> If you submit your application after the November 15th (by midnight) deadline, we may not be able to accommodate you for the HSPT at SI on December 3rd.</h4>

                                <div class="schl-btm mt-3 mb-4 new-sch">
                                    <div class="schl-rdo ml-0">
                                        <div class="form_input_radio">
                                            <label class="radio-pro">
                                                At SI on December 3, 2022
                                                <input type="radio" name="radio{{ $key }}"
                                                    class="form-control {{ $errors->has('releaseAuthorization.EntranceExamInfo.' . $key . '.S' . ($key + 1) . '_Entrance_Exam_Reservation') ? 'is-invalid' : '' }}"
                                                    wire:model="releaseAuthorization.EntranceExamInfo.{{ $key }}.S{{ $key + 1 }}_Entrance_Exam_Reservation"
                                                    value="1" />
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="radio-pro">At Other Catholic High School
                                                <input type="radio" name="radio{{ $key }}"
                                                    wire:model="releaseAuthorization.EntranceExamInfo.{{ $key }}.S{{ $key + 1 }}_Entrance_Exam_Reservation"
                                                    value="0" />
                                                <span class="checkmark"></span>
                                            </label>
                                            @error('releaseAuthorization.EntranceExamInfo.' . $key . '.S' . ($key + 1) .
                                                '_Entrance_Exam_Reservation')
                                                <div class="error error_text">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                @if ($item['S' . ($key + 1) . '_Entrance_Exam_Reservation'] == '0')
                                    <div class="form-group">
                                        <label>Other Catholic School Name:</label>
                                        <input type="text"
                                            class="form-control {{ $errors->has('releaseAuthorization.EntranceExamInfo.' . $key . '.S' . ($key + 1) . '_Other_Catholic_School_Name') ? 'is-invalid' : '' }}"
                                            wire:model.defer='releaseAuthorization.EntranceExamInfo.{{ $key }}.S{{ $key + 1 }}_Other_Catholic_School_Name'>
                                        @error('releaseAuthorization.EntranceExamInfo.' . $key . '.S' . ($key + 1) .
                                            '_Other_Catholic_School_Name')
                                            <div class="invalid-feedback error_text">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Other Catholic School Location:</label>
                                        <input type="text"
                                            class="form-control {{ $errors->has('releaseAuthorization.EntranceExamInfo.' . $key . '.S' . ($key + 1) . '_Other_Catholic_School_Location') ? 'is-invalid' : '' }}"
                                            wire:model.defer='releaseAuthorization.EntranceExamInfo.{{ $key }}.S{{ $key + 1 }}_Other_Catholic_School_Location'>
                                        @error('releaseAuthorization.EntranceExamInfo.' . $key . '.S' . ($key + 1) .
                                            '_Other_Catholic_School_Location')
                                            <div class="invalid-feedback error_text">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Other Catholic School Date:</label>
                                        <input type="date" min="<?php echo date('Y-m-d'); ?>"
                                            class="form-control {{ $errors->has('releaseAuthorization.EntranceExamInfo.' . $key . '.S' . ($key + 1) . '_Other_Catholic_School_Date') ? 'is-invalid' : '' }}"
                                            wire:model.defer='releaseAuthorization.EntranceExamInfo.{{ $key }}.S{{ $key + 1 }}_Other_Catholic_School_Date'>
                                        @error('releaseAuthorization.EntranceExamInfo.' . $key . '.S' . ($key + 1) .
                                            '_Other_Catholic_School_Date')
                                            <div class="invalid-feedback error_text">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif

                            </div>
                        </div>
                    @endforeach
                    @endif

                </div>
            </div>

            <div class="school-wrap application_step__ten">
                <div class="form-outr">
                    <div class="cmn-hdr">
			<BR>
                        <h4>Release Authorization</h4>
                        <p class="blck-clr">I hereby consent to the release of my child's academic records and test
                            scores to St. Ignatius College Preparatory for the purpose of evaluating his or her
                            application for admission. In authorizing this release, I acknowledge that I waive my
                            right to read the Confidential School/Clergy Recommendations and my child's application
                            file. I further consent to St. Ignatius College Preparatory issuing academic progress
                            reports to my child's current school listed on this application during my child's four
                            years at St. Ignatius College Preparatory.</p>
                    </div>
                    <div class="form-wrap">
                        <div>
                            <label class="check-inn bld red mb-5">By clicking this box, you acknowledge that you
                                have read, understand and agree to the above.
                                <input type="checkbox"
                                    class="open {{ $errors->has('releaseAuthorization.Agree_to_release_record') ? 'is-invalid' : '' }}"
                                    wire:model="releaseAuthorization.Agree_to_release_record">
                                <span class="checkmark"></span>
                                @error('releaseAuthorization.Agree_to_release_record')
                                    <div class="invalid-feedback error_text">{{ $message }}</div>
                                @enderror
                            </label>
                            <label class="check-inn bld red ">By clicking the box, I (parent(s)/guardian(s))
                                declare that to the best of my knowledge, the information provided in the
                                application submitted to St. Ignatius College Preparatory on this online application
                                is true and complete.
                                <input type="checkbox"
                                    class="open {{ $errors->has('releaseAuthorization.Agree_to_record_is_true') ? 'is-invalid' : '' }}"
                                    wire:model="releaseAuthorization.Agree_to_record_is_true">
                                <span class="checkmark"></span>
                                @error('releaseAuthorization.Agree_to_record_is_true')
                                    <div class="invalid-feedback error_text">{{ $message }}</div>
                                @enderror
                            </label>
                            @if (!$is_patment_compleate && !$pay_amount == 0) 
                                <div class="form-btn text-center mt-5">
                                    {{-- <input type="button" value="Pay Application Fee" class="sub-btn"
                                        data-bs-toggle="modal" data-bs-target="#staticBackdrop" /> --}}
<!--                                     <input type="button" value="Pay Application Fee" class="sub-btn" -->
<!--                                         wire:click='openModal()' disabled /> -->
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flx">
            <div class="form-btn">
                <a href="{{ route('admission-application', ['step' => 'nine']) }}" class="sub-btn">Previous</a>
            </div>
            <div class="form-btn">
                @if ($is_patment_compleate || $pay_amount == 0)
                	<button type="submit" value="Next" class="sub-btn" style="background: #848485;"
                        disabled>Submit Application</button>
                    
                @else
                    <button type="submit" value="Next" class="sub-btn">Submit Application</button>
                @endif
            </div>
        </div>
    </form>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header header-new">
                    <h1>Payment Application Fee</h1>
                    <button class="btn" wire:click='hideModal()'>Close</button>
                </div>
                <div class="modal-body">
                    <div class="payment-sec">
                        <div class="form-wrap">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control new-controll"
                                            wire:model.defer="first_name" />
                                        @error('first_name')
                                            <span class="error error_text">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control new-controll"
                                            wire:model.defer="last_name" />
                                        @error('last_name')
                                            <span class="error error_text">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control new-controll"
                                            wire:model.defer="email" />
                                        @error('email')
                                            <span class="error error_text">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Credit Card Number</label>
                                        {{-- <input type="text" class="form-control new-controll"
                                            onkeypress='return formats(this,event)'
                                            onkeyup="return numberValidation(event)" wire:model.defer="card_number" /> --}}

                                        <input type="text" class="form-control new-controll"
                                            onKeyPress="if(this.value.length==16) return false;"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                            wire:model.defer="card_number" />
                                        @error('card_number')
                                            <span class="error error_text">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>CVV</label>
                                        <input type="password" class="form-control new-controll"
                                            onKeyPress="if(this.value.length==4) return false;"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                            wire:model.defer="card_cvv" />
                                        @error('card_cvv')
                                            <span class="error error_text">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Card Holder Name</label>
                                        <input type="text" class="form-control new-controll"
                                            wire:model.defer="card_holder_name" />
                                        @error('card_holder_name')
                                            <span class="error error_text">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> --}}
                                @php
                                    $months = [1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec'];
                                @endphp
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Expiration Month</label>
                                        <select class="form-control new-controll" wire:model.defer="card_exp_mm">
                                            <option value="">Choose Month</option>
                                            @foreach ($months as $k => $v)
                                                <option value="{{ $k }}"
                                                    {{ old('card_exp_mm') == $k ? 'selected' : '' }}>
                                                    {{ $v }}</option>
                                            @endforeach
                                        </select>
                                        @error('card_exp_mm')
                                            <span class="error error_text">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Expiration Year</label>
                                        <select class="form-control new-controll" wire:model.defer="card_exp_yy">
                                            <option value="">Choose Year</option>
                                            @for ($i = date('Y'); $i <= date('Y') + 15; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                        @error('card_exp_yy')
                                            <span class="error error_text">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Billing Address</label>
                                        <input type="text" class="form-control new-controll"
                                            wire:model.defer="billing_address" />
                                        @error('billing_address')
                                            <span class="error error_text">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Billing City</label>
                                        <input type="text" class="form-control new-controll"
                                            wire:model.defer="billing_city" />
                                        @error('billing_city')
                                            <span class="error error_text">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Billing State</label>
                                        <input type="text" class="form-control new-controll"
                                            wire:model.defer="billing_state" />
                                        @error('billing_state')
                                            <span class="error error_text">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Billing Zip Code</label>
                                        <input type="text" class="form-control new-controll"
                                            wire:model.defer="billing_zip_code" />
                                        @error('billing_zip_code')
                                            <span class="error error_text">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="direct">	
                    <h5>&nbsp;&nbsp;NOTE:&nbsp;&nbsp;</h5>	
                        <p>	
                            Before you click on the Pay button, please make<BR>	
                            sure your information is correct.&nbsp;&nbsp;You will not<BR>	
                            be able to edit payment information after you<BR>	
                            click the Pay button because SI does not store<BR>	
                            your credit information.&nbsp;&nbsp;If you are not ready<BR>	
                            to make a payment, click on the Close button.<BR><BR>	
                        </p>	
                </div>
                <div class="modal-footer">
                    @if ($is_button_clicked)
                        <div class="la-ball-elastic-dots payment">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    @else
                        <button class="payment" type="submit" wire:click='payApplicationFees'>PAY (Total
                            ${{ $pay_amount }})</button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="successPaymentModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="successPaymentModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header header-new">
                    <h1>Payment Successful</h1>
                </div>
                <div class="modal-body">
                    <div class="payment-sec">
                        <div class="email-template-main-sec">
                            <div class="email-template">
                                <div class="heading" style="padding-bottom: 20px;">
                                    <h2
                                        style="font-size:20px;font-style:normal;font-weight: 600;letter-spacing: 0.9px;margin:0;line-height: 25px;text-transform: none;">
                                        Hi <span>{{ Auth::guard('customer')->user()->Pro_First_Name }}</span>,</h2>
                                </div>
                                <div class="all-txt">
                                    <p>
                                        Thank you for your payment of ${{ $pay_amount }}. Your transaction
                                        confirmation code is: {{ $transaction_id }}.
                                        Please keep this information for your records.<BR><BR>	
                                        	
                                        <B>NOTE:&nbsp;&nbsp;</B><FONT COLOR = "#A71930">Don’t forget to click on the Submit Application button after you close this window.</FONT>
                                    </p>
                                    <h4>Regards,</h4>
                                    <h6>SI Admissions</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
</div>
