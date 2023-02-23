@extends('layouts.frontend-layout')
@section('title', __('page_title.home_page_title'))
@section('content')

<style>
	.loading {
		position: fixed;
		z-index: 9999;
		height: 2em;
		width: 2em;
		overflow: show;
		margin: auto;
		top: 0;
		left: 0;
		bottom: 0;
		right: 0;
	}

	.loading:before {
		content: '';
		display: block;
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background: radial-gradient(rgba(20, 20, 20, .8), rgba(0, 0, 0, .8));

		background: -webkit-radial-gradient(rgba(20, 20, 20, .8), rgba(0, 0, 0, .8));
	}

	.loading:not(:required) {
		font: 0/0 a;
		color: transparent;
		text-shadow: none;
		background-color: transparent;
		border: 0;
	}

	.loading:not(:required):after {
		content: '';
		display: block;
		font-size: 10px;
		width: 1em;
		height: 1em;
		margin-top: -0.5em;
		-webkit-animation: spinner 150ms infinite linear;
		-moz-animation: spinner 150ms infinite linear;
		-ms-animation: spinner 150ms infinite linear;
		-o-animation: spinner 150ms infinite linear;
		animation: spinner 150ms infinite linear;
		border-radius: 0.5em;
		-webkit-box-shadow: rgba(255, 255, 255, 0.75) 1.5em 0 0 0, rgba(255, 255, 255, 0.75) 1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) 0 1.5em 0 0, rgba(255, 255, 255, 0.75) -1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) -1.5em 0 0 0, rgba(255, 255, 255, 0.75) -1.1em -1.1em 0 0, rgba(255, 255, 255, 0.75) 0 -1.5em 0 0, rgba(255, 255, 255, 0.75) 1.1em -1.1em 0 0;
		box-shadow: rgba(255, 255, 255, 0.75) 1.5em 0 0 0, rgba(255, 255, 255, 0.75) 1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) 0 1.5em 0 0, rgba(255, 255, 255, 0.75) -1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) -1.5em 0 0 0, rgba(255, 255, 255, 0.75) -1.1em -1.1em 0 0, rgba(255, 255, 255, 0.75) 0 -1.5em 0 0, rgba(255, 255, 255, 0.75) 1.1em -1.1em 0 0;
	}

	@-webkit-keyframes spinner {
		0% {
			-webkit-transform: rotate(0deg);
			-moz-transform: rotate(0deg);
			-ms-transform: rotate(0deg);
			-o-transform: rotate(0deg);
			transform: rotate(0deg);
		}

		100% {
			-webkit-transform: rotate(360deg);
			-moz-transform: rotate(360deg);
			-ms-transform: rotate(360deg);
			-o-transform: rotate(360deg);
			transform: rotate(360deg);
		}
	}

	@-moz-keyframes spinner {
		0% {
			-webkit-transform: rotate(0deg);
			-moz-transform: rotate(0deg);
			-ms-transform: rotate(0deg);
			-o-transform: rotate(0deg);
			transform: rotate(0deg);
		}

		100% {
			-webkit-transform: rotate(360deg);
			-moz-transform: rotate(360deg);
			-ms-transform: rotate(360deg);
			-o-transform: rotate(360deg);
			transform: rotate(360deg);
		}
	}

	@-o-keyframes spinner {
		0% {
			-webkit-transform: rotate(0deg);
			-moz-transform: rotate(0deg);
			-ms-transform: rotate(0deg);
			-o-transform: rotate(0deg);
			transform: rotate(0deg);
		}

		100% {
			-webkit-transform: rotate(360deg);
			-moz-transform: rotate(360deg);
			-ms-transform: rotate(360deg);
			-o-transform: rotate(360deg);
			transform: rotate(360deg);
		}
	}

	@keyframes spinner {
		0% {
			-webkit-transform: rotate(0deg);
			-moz-transform: rotate(0deg);
			-ms-transform: rotate(0deg);
			-o-transform: rotate(0deg);
			transform: rotate(0deg);
		}

		100% {
			-webkit-transform: rotate(360deg);
			-moz-transform: rotate(360deg);
			-ms-transform: rotate(360deg);
			-o-transform: rotate(360deg);
			transform: rotate(360deg);
		}
	}

	.survay-accept {
		max-width: 1100px !important;
		width: 100%;
	}

	input[type="text"] {
		height: 30px;
		border: 0px solid rgba(255, 255, 255, 0.7);
	}

	.modal-dialog.survay-accept input[type="text"] {
		box-shadow: -2px -3px 1px 0px #0000004f !important;
		border: 1px solid #ebebeb !important;
		margin: 5px 0;
	}

	input[type="number"] {
		height: 36px;
		border: 0px solid rgba(255, 255, 255, 0.7);
	}

	input[type="number"] {
		-moz-appearance: textfield;
	}

	input[type="number"]:hover,
	input[type="number"]:focus {
		-moz-appearance: number-input;
	}

	/* input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: inner-spin-button !important;
    margin: 0;
} */

	select#cars {
		width: 116px;
		height: 37px;
		box-shadow: rgb(0 0 0 / 24%) 0px 3px 8px;
		border: 0px;
		border-radius: 7px;

	}

	.text-main textarea {
		border: 1px solid rgb(126 120 120);
	}

	.selector-box select {
		width: 100%;
		padding: 3px 10px;
		outline: none;
		height: 30px;
		margin: 0px;
		background-image: none;
		position: relative;
		border-radius: 5px;
		border: 1px solid #00000015;
		z-index: 999;
		min-width: 120px;
	}

	.selector-box {
		position: relative;
	}

	.selector-box::before {
		position: absolute;
		content: '\f0dc';
		top: 0px;
		right: 0;
		font-family: "Font Awesome 5 Free";
		font-weight: 600;
		color: #fff;
		z-index: 999;
		background: #007bff;
		font-size: 14px;
		line-height: 24px;
		padding: 3px 8px;
		border-radius: 5px;
	}

	a#submit_acceptance_survey,
	.decline-btn,
	.decline-btn1 {
		background: #c0c0c0;
		color: #000;
		box-shadow: 4px 4px 2px -1px #00000096;
		font-weight: 500;
		cursor: pointer;
	}

	.home-wrap ul li {
		list-style: circle;
	}
</style>

<?php


function  getDateFunctions($notification_time)
{

	return $notification_time;
}
function  getStudentInformation($studentType, $studentDetail, $type, $P2_Last_Name = '')
{
	// dd($studentDetail);
	if ($studentType == App\Models\Application::STUDENT_S1) {
		switch ($type) {

			case "Student_First_Name":


				return ucwords($studentDetail->S1_First_Name);
				break;
			case "Student_Last_Name":
				return ucwords($studentDetail->S1_Last_Name);

				break;
			case "P1_Salutation":
				return ucwords($studentDetail->P1_Salutation);

				break;

			case "P2_Salutation":
				if ($studentDetail->P2_Salutation == null) {
				} else {
					return 'and ' . ucwords($studentDetail->P2_Salutation);
				}

				break;
			case "P2_Last_Name":
				if ($studentDetail->P2_Last_Name == null) {
					return ucwords($studentDetail->P2_Last_Name);
				} else {
					if ($P2_Last_Name == 'P2_Last_Name') {
						return '' . ucwords($studentDetail->P2_Last_Name) . '';
					} else {
						if ($studentDetail->P2_Salutation == null) {

							return 'and ' . ucwords($studentDetail->P2_Last_Name) . '';
						} else {
							return ' ' . ucwords($studentDetail->P2_Last_Name) . '';
						}
					}
				}
				break;
			case "P1_First_Name":
				return ucwords($studentDetail->P1_First_Name);
				break;
			case "P1_Last_Name":

				if ($studentDetail->P2_Last_Name == null) {
					return ucwords($studentDetail->P1_Last_Name) . '';
				} else {
					return ucwords($studentDetail->P1_Last_Name);
				}
				break;

			case "P2_First_Name":
				if ($studentDetail->P2_First_Name == null) {

					return ucwords($studentDetail->P2_First_Name);
				} else {

					return 'and ' . ucwords($studentDetail->P2_First_Name);
				}
				break;
			case "Primary_Address_Street":
				return ucwords($studentDetail->Address_1);
				break;
			case "Primary_Address_City":

				return ucwords($studentDetail->City_1);
				break;
			case "Primary_Address_State":
				return ucwords($studentDetail->State_1);
				break;
			case "Primary_Address_Zipcode":
				return ucwords($studentDetail->Zipcode_1);
				break;
			case "Student_Current_School":
				return ucwords($studentDetail->S1_Current_School);
				break;
			case "his/her":
				if ($studentDetail->S1_Gender == "Male") {
					return "his";
				} else {
					return "her";
				}
			case "he/she":
				if ($studentDetail->S1_Gender == "Male") {
					return "he";
				} else {
					return "she";
				}
				break;
			default:
				return "----";
		};
	}

	// Primary_Address_Street") . ' <br>' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_City") . ' , ' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_State") . ' 

	if ($studentType == App\Models\Application::STUDENT_S2) {

		switch ($type) {
			case "Student_First_Name":
				// dd($studentDetail);
				return $studentDetail->S2_First_Name;
				break;
			case "Student_Last_Name":
				return $studentDetail->S2_Last_Name;

				break;
			case "P1_Salutation":
				return ucwords($studentDetail->P1_Salutation);

				break;

			case "P2_Salutation":
				if ($studentDetail->P2_Salutation == null) {
					return ucwords($studentDetail->P2_Salutation);
				} else {
					return 'and ' . ucwords($studentDetail->P2_Salutation);
				}

				break;
			case "P2_Last_Name":
				// dd($P2_Last_Name);

				if ($studentDetail->P2_Last_Name == null) {
					return ucwords($studentDetail->P2_Last_Name);
				} else {
					if ($P2_Last_Name == 'P2_Last_Name') {
						return '' . ucwords($studentDetail->P2_Last_Name) . '';
					} else {
						if ($studentDetail->P2_Salutation == null) {

							return 'and ' . ucwords($studentDetail->P2_Last_Name) . '';
						} else {
							return ' ' . ucwords($studentDetail->P2_Last_Name) . '';
						}
					}
				}
				break;
			case "P1_First_Name":
				return ucwords($studentDetail->P1_First_Name);
				break;
			case "P1_Last_Name":

				if ($studentDetail->P2_Last_Name == null) {
					return ucwords($studentDetail->P1_Last_Name) . '';
				} else {
					return ucwords($studentDetail->P1_Last_Name);
				}
				break;

			case "P2_First_Name":
				// dd($type);
				if ($studentDetail->P2_First_Name == null) {

					return ucwords($studentDetail->P2_First_Name);
				} else {

					return 'and ' . ucwords($studentDetail->P2_First_Name);
				}

				break;
			case "Primary_Address_Street":
				return ucwords($studentDetail->Address_1);
				break;
			case "Primary_Address_City":

				return ucwords($studentDetail->City_1);
				break;
			case "Primary_Address_State":
				return ucwords($studentDetail->State_1);
				break;
			case "Primary_Address_Zipcode":
				return ucwords($studentDetail->Zipcode_1);
				break;
			case "Student_Current_School":
				return ucwords($studentDetail->S1_Current_School);
				break;
			case "his/her":
				if ($studentDetail->S1_Gender == "Male") {
					return "His";
				} else {
					return "Her";
				}
			case "he/she":
				if ($studentDetail->S1_Gender == "Male") {
					return "He";
				} else {
					return "She";
				}
				break;
			default:
				return "----";
		};
	}
	if ($studentType == App\Models\Application::STUDENT_S3) {
		switch ($type) {
			case "Student_First_Name":
				// dd($studentDetail);
				return ucwords($studentDetail->S3_First_Name);
				break;
			case "Student_Last_Name":
				return ucwords($studentDetail->S3_Last_Name);

				break;
			case "P1_Salutation":
				return ucwords($studentDetail->P1_Salutation);

				break;

			case "P2_Salutation":
				if ($studentDetail->P2_Salutation == null) {
					return ucwords($studentDetail->P2_Salutation);
				} else {
					return 'and ' . ucwords($studentDetail->P2_Salutation);
				}

				break;
			case "P2_Last_Name":
				if ($studentDetail->P2_Last_Name == null) {
					return ucwords($studentDetail->P2_Last_Name);
				} else {
					if ($P2_Last_Name == 'P2_Last_Name') {
						return ' ' . ucwords($studentDetail->P2_Last_Name) . '';
					} else {
						if ($studentDetail->P2_Salutation == null) {

							return 'and ' . ucwords($studentDetail->P2_Last_Name) . '';
						} else {
							return ' ' . ucwords($studentDetail->P2_Last_Name) . '';
						}
					}
				}
				break;
			case "P1_First_Name":
				return ucwords($studentDetail->P1_First_Name);
				break;
			case "P1_Last_Name":

				if ($studentDetail->P2_Last_Name == null) {
					return ucwords($studentDetail->P1_Last_Name) . '';
				} else {
					return ucwords($studentDetail->P1_Last_Name);
				}
				break;

			case "P2_First_Name":
				if ($studentDetail->P2_First_Name == null) {

					return ucwords($studentDetail->P2_First_Name);
				} else {

					return 'and ' . ucwords($studentDetail->P2_First_Name);
				}
				break;
			case "Primary_Address_Street":
				return ucwords($studentDetail->Address_1);
				break;
			case "Primary_Address_City":

				return ucwords($studentDetail->City_1);
				break;
			case "Primary_Address_State":
				return ucwords($studentDetail->State_1);
				break;
			case "Primary_Address_Zipcode":
				return ucwords($studentDetail->Zipcode_1);
				break;
			case "Student_Current_School":
				return ucwords($studentDetail->S1_Current_School);
				break;
			case "his/her":
				if ($studentDetail->S1_Gender == "Male") {
					return "His";
				} else {
					return "Her";
				}
			case "he/she":
				if ($studentDetail->S1_Gender == "Male") {
					return "He";
				} else {
					return "She";
				}
				break;
			default:
				return "----";
		};
	}
}

function getTuitionAmount()
{
	return "$31,225";
}
?>
<div class="loading" style="display: none;">Loading</div>
@switch($ntfDetail->notification_type)
@case(1)
<div class="home-wrap">
	<div class="row">
		<div class="col-md-4" style="max-width: 133px;">
			<div class='ntf_image_logo'>
				<img src="{{ asset('frontend_assets/images/lg2.png') }}" alt="" />
			</div>
		</div>
		<div class="col-md-8" style="max-width: 266px;">
			<p> St. Ignatius College Preparatory<br>
				2001 37th Avenue<br>
				San Francisco, CA 94116<br>
				(415) 731-7500
			</p>
			<p>Office of Admissions</p>
		</div>
		<p style="text-align:right;"><?php echo getDateFunctions($notification_time); ?></p>
	</div>
	<div class="row mt-3">
		<div class="col-md-12">
			<p> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_First_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_Last_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_First_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_Last_Name", 'P2_Last_Name'); ?><br>
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_Street"); ?><br>
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_City"); ?>, <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_State"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_Zipcode"); ?><br>
			</p>
		</div>
	</div>
	<div class="hme-inr" id='ntf-detail'>
		<div class='ntf_candidate_detail mt-2'>
			<p class='ntf_student_name' style="margin-top: 14px;">Dear <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_Salutation"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_Last_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_Salutation"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_Last_Name"); ?>:</p>
			<p class='ntf_app_status'>
			<p>Congratulations! <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_Last_Name"); ?> has been Accepted to St. Ignatius College
				Preparatory. Welcome to our school community! We congratulate <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?> for the academic
				diligence that has made this success possible. The entire SI community pledges itself to your child’s
				intellectual, spiritual, and social development over the next four years. We look forward to your
				participation and cooperation in this endeavor.
			<p><?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?>’s <b>Acceptance</b> is based on <?php echo getStudentInformation($candidate, $studentJoinsDetail, "his/her"); ?> academic achievements and the gifts
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "he/she"); ?> will be to the SI community. Placement in Honors level courses for math and foreign language
				will be determined by placement exams to be administered on April 22, 2023. Your online registration
				packet will include more information on these exams. The online registration packet will be available on
				March 27, 2023, with additional information and important dates. To access the online registration
				packet, visit <a href="http://www.siprepadmissions.org/" style="color: #0086e7;">www.siprepadmissions.org</a> on March 27, 2023 using the
				username and password you used to apply. The registration system will be due on April 3, 2023.</p>
			<p><b>To reserve a place in the Class of 2027</b>, please click on the <b> Enroll at SI</b> button below and make a <b>deposit</b> of {deposit amount}.
				As a courtesy to those students on our waitlist, we ask that those who do not intend to register at SI indicate their intention by
				clicking on the <b>Decline</b> button below.<b style="color:#dc3545;"> The registration deadline is 8:00 am on March 24, 2023, or the acceptance
					will be forfeited.</b>
			</p>
			<p>Tuition for the 2023-2024 academic year is <b><?php echo getTuitionAmount() ?></b>. The Business Office will have
				information on tuition payment plans and schedules in the online registration packet. For families who
				applied for financial assistance, the Business Office has posted the Financial Assistance Committee’s
				decision on this website for your reference.</p>
			<p>We had over <b> 1,290</b> applicants apply to St. Ignatius College Preparatory for the Class of 2027. The Admissions Committee was
				fortunate to have so many qualified applicants to select from in this highly competitive applicant pool. We are excited to have <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?>as a member of our talented Freshman class.<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?>’s acceptance is contingent upon <?php echo getStudentInformation($candidate, $studentJoinsDetail, "his/her"); ?>acceptance is contingent upon
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "his/her"); ?> continued academic performance, good citizenship, and successful completion of eighth grade at
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_Current_School"); ?>.It is our intention to see that your student has the academic challenge and individual attention that
				have been a hallmark of Jesuit education. To this end, we are looking forward to working closely with you and <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?> over the next four years. Once again,
				<b>congratulations!</b>
			</p>
			</p>
		</div>
		<div style="margin-top:15px;">
			<p class="mb-0">Sincerely,</p>
			<p style="border:0;display:inline-block;">
				<img style="max-width:205px;" src="{{ asset('admin_assets/logo/signature.png') }}" />
			</p>
			<p>Ms. Kristy Cahill Jacobson ‘98<br /> Director of Admissions</p>
			<div class="row">
				<div class="col-md-6">
					<div class='application_download' style="float: left !important;">
						<a href='{{url("/notification/pdfgenerator")}}/{{ $ntfDetail->id }}/{{ $studentDetail->Profile_ID }}/{{ $studentDetail->Application_ID }}' class="btn text-dark btn-primary mt-3">Download</a>
					</div>
				</div>
				<div class="col-md-6">
					@if($student_status == App\Models\Application::TYPE_ACCEPTED && $ntfDetail->notification_type == App\Models\Notification::NOTIFY_ACCEPTED)
					@if($candidate == App\Models\Application::STUDENT_S1)
					@if($appStatus->s1_candidate_status == App\Models\Application::CANDIDATE_NOT_DEFINED || $appStatus->s1_candidate_status == App\Models\Application::CANDIDATE_READ)
					<div class='student_btns' style=" float: right !important;">
						<a data-bs-toggle="modal" data-bs-target="#acceptModel" class='btn btn_accept btn-success mt-3 btn-sm text-dark'>Enroll at SI</a>
						<a data-bs-toggle="modal" data-bs-target="#rejectModel" class='btn btn-sm btn-danger mt-3 text-dark'>Decline Acceptance at SI</a>
					</div>
					@else
					@endif
					@if($appStatus->s1_candidate_status == App\Models\Application::TYPE_ACCEPTED)
					<div class="col-md-12 text-center" style="text-align: right!important"></div>
					<div class="col-md-12 text-center" style="text-align: right!important"><a data-bs-toggle="modal" id="AcceptFirstSurvyModal" data-bs-target="#Survey" class='btn btn_accept btn-success  mt-3 btn-sm'>Acceptance Survey</a></div>
					<!-- <div class="col-md-12 text-center" style="text-align: right!important">Congratulations on enrolling as a student in the SI Class of 2027! Please check back here on Monday, March 27th for next steps and registration information.</div> -->
					@php
					getAcceptanceModal();
					@endphp
					@endif
					@if($appStatus->s1_candidate_status == App\Models\Application::CANDIDATE_REJECTED)
					@php
					getDeclineSurvayModal();
					@endphp
					<div class="col-md-12 text-center" style="text-align: right!important"></div>
					<div class="col-md-12 text-center" style="text-align: right!important"><a data-bs-toggle="modal" id="AcceptFirstSurvyModal" data-bs-target="#SurveyDecline" class='btn btn_accept btn-success  mt-3 btn-sm'>Decline Survey</a></div>
					@endif
					@endif
					@if($candidate == App\Models\Application::STUDENT_S2)
					@if($appStatus->s2_candidate_status == App\Models\Application::CANDIDATE_NOT_DEFINED || $appStatus->s2_candidate_status == App\Models\Application::CANDIDATE_READ)

					<div class='student_btns' style=" float: right !important;">
						<a data-bs-toggle="modal" data-bs-target="#acceptModel" class='btn btn_accept btn-success mt-3 btn-sm text-dark'>Enroll at SI</a>
						<a data-bs-toggle="modal" data-bs-target="#rejectModel" class='btn btn-sm btn-danger mt-3 text-dark'>Decline Acceptance at SI</a>
					</div>
					@else
					@endif

					@if($appStatus->s2_candidate_status == App\Models\Application::TYPE_ACCEPTED)
					<div class="col-md-12 text-center" style="text-align: right!important"><a data-bs-toggle="modal" id="AcceptFirstSurvyModal" data-bs-target="#Survey" class='btn btn_accept btn-success  mt-3 btn-sm'>Acceptance Survey</a></div>
					@php
					getAcceptanceModal();
					@endphp
					@endif
					@if($appStatus->s2_candidate_status == App\Models\Application::CANDIDATE_REJECTED)
					@php
					getDeclineSurvayModal();
					@endphp
					<div class="col-md-12 text-center" style="text-align: right!important"><a data-bs-toggle="modal" id="AcceptFirstSurvyModal" data-bs-target="#SurveyDecline" class='btn btn_accept btn-success  mt-3 btn-sm'>Decline Survey</a></div>

					@endif
					@endif
					@if($candidate == App\Models\Application::STUDENT_S3)
					@if($appStatus->s3_candidate_status == App\Models\Application::CANDIDATE_NOT_DEFINED || $appStatus->s3_candidate_status == App\Models\Application::CANDIDATE_READ)
					<div class='student_btns' style="float: right !important;">
						<a data-bs-toggle="modal" data-bs-target="#acceptModel" class='btn btn_accept btn-success mt-3 btn-sm text-dark'>Enroll at SI</a>
						<a data-bs-toggle="modal" data-bs-target="#rejectModel" class='btn btn-sm btn-danger mt-3 text-dark'>Decline Acceptance at SI</a>
					</div>
					@else
					@endif
					@if($appStatus->s3_candidate_status == App\Models\Application::TYPE_ACCEPTED)
					<div class="col-md-12 text-center" style="text-align: right!important"><a data-bs-toggle="modal" id="AcceptFirstSurvyModal" data-bs-target="#Survey" class='btn btn_accept btn-success  mt-3 btn-sm'>Acceptance Survey</a></div>
					@php
					getAcceptanceModal();
					@endphp
					@endif
					@if($appStatus->s3_candidate_status == App\Models\Application::CANDIDATE_REJECTED)
					@php
					getDeclineSurvayModal();
					@endphp
					<div class="col-md-12 text-center" style="text-align: right!important"><a data-bs-toggle="modal" id="AcceptFirstSurvyModal" data-bs-target="#SurveyDecline" class='btn btn_accept btn-success  mt-3 btn-sm'>Decline Survey</a></div>

					@endif
					@endif
					@endif
				</div>
				@if($candidate == App\Models\Application::STUDENT_S1)

				@if($appStatus->s1_candidate_status == App\Models\Application::TYPE_ACCEPTED)
				<div class="col-md-12 text-left mt-4">Congratulations on enrolling as a student in the SI Class of 2027! Please check back here on Monday, March 27th for next steps and registration information.</div>
				@endif
				@if($appStatus->s1_candidate_status == App\Models\Application::CANDIDATE_REJECTED)
				<div class="col-md-12 text-left mt-4">We're sorry to hear about your decision not to accept our offer.</div>
				@endif
				@endif

				@if($candidate == App\Models\Application::STUDENT_S3)

				@if($appStatus->s3_candidate_status == App\Models\Application::TYPE_ACCEPTED)
				<div class="col-md-12 text-left mt-4">Congratulations on enrolling as a student in the SI Class of 2027! Please check back here on Monday, March 27th for next steps and registration information.</div>
				@endif
				@if($appStatus->s3_candidate_status == App\Models\Application::CANDIDATE_REJECTED)
				<div class="col-md-12 text-left mt-4">We're sorry to hear about your decision not to accept our offer.</div>
				@endif
				@endif


				@if($candidate == App\Models\Application::STUDENT_S2)

				@if($appStatus->s2_candidate_status == App\Models\Application::TYPE_ACCEPTED)
				<div class="col-md-12 text-left mt-4">Congratulations on enrolling as a student in the SI Class of 2027! Please check back here on Monday, March 27th for next steps and registration information.</div>
				@endif
				@if($appStatus->s2_candidate_status == App\Models\Application::CANDIDATE_REJECTED)
				<div class="col-md-12 text-left mt-4">We're sorry to hear about your decision not to accept our offer.</div>
				@endif
				@endif

			</div>



			@if($student_accept_status =="payment_successful" && $ntfDetail->student_profile == App\Models\Application::STUDENT_ONE && $appStatus->s1_application_status == App\Models\Application::TYPE_ACCEPTED)
			<!-- <div class="col-md-12 text-center" style="text-align: right!important"><a data-bs-toggle="modal" id="AcceptFirstSurvyModal" data-bs-target="#Survey" class='btn btn_accept btn-success  mt-3 btn-sm'>Acceptance Survey</a></div> -->
			<script>
				$(document).ready(function() {
					$('#staticBackdrop').modal('hide');
				});
			</script>
			@endif

			@if($student_accept_status =="payment_successful" && $ntfDetail->student_profile == App\Models\Application::STUDENT_TWO && $appStatus->s2_application_status == App\Models\Application::TYPE_ACCEPTED)
			<!-- <div class="col-md-12 text-center" style="text-align: right!important"><a data-bs-toggle="modal" id="AcceptFirstSurvyModal" data-bs-target="#Survey" class='btn btn_accept btn-success  mt-3 btn-sm'>Acceptance Survey</a></div> -->
			<script>
				$(document).ready(function() {
					$('#staticBackdrop').modal('hide');
				});
			</script>
			@endif

			@if($student_accept_status =="payment_successful" && $ntfDetail->student_profile == App\Models\Application::STUDENT_THREE && $appStatus->s3_application_status == App\Models\Application::TYPE_ACCEPTED)
			<!-- <div class="col-md-12 text-center" style="text-align: right!important"><a data-bs-toggle="modal" id="AcceptFirstSurvyModal" data-bs-target="#Survey" class='btn btn_accept btn-success mt-3 btn-sm'>Acceptance Survey</a></div> -->
			<script>
				$(document).ready(function() {
					$('#staticBackdrop').modal('hide');
				});
			</script>
			@endif

			@if($student_accept_status =="payment_successful" && $ntfDetail->student_profile == App\Models\Application::STUDENT_TWO && $appStatus->s2_application_status == App\Models\Application::ACCEPTANCE_FINANCIAL_AID_YES)

			<!-- <div class="col-md-12 text-center"><a data-bs-toggle="modal" id="AcceptFirstSurvyModal" data-bs-target="#Survey" class='btn btn_accept btn-success mt-3 btn-sm'>Acceptance Survey</a></div> -->
			<script>
				$(document).ready(function() {
					$('#staticBackdrop').modal('hide');

				});
			</script>
			@endif

			@if($student_accept_status =="payment_successful" && $ntfDetail->student_profile == App\Models\Application::STUDENT_ONE && $appStatus->s1_application_status == App\Models\Application::ACCEPTANCE_FINANCIAL_AID_YES)

			<!-- <div class="col-md-12 text-center"><a data-bs-toggle="modal" id="AcceptFirstSurvyModal" data-bs-target="#Survey" class='btn btn_accept btn-success mt-3 btn-sm'>Acceptance Survey</a></div> -->
			<script>
				$(document).ready(function() {
					$('#staticBackdrop').modal('hide');

				});
			</script>
			@endif

			@if($student_accept_status =="payment_successful" && $ntfDetail->student_profile == App\Models\Application::STUDENT_THREE && $appStatus->s3_application_status == App\Models\Application::ACCEPTANCE_FINANCIAL_AID_YES)

			<!-- <div class="col-md-12 text-center"><a data-bs-toggle="modal" id="AcceptFirstSurvyModal" data-bs-target="#Survey" class='btn btn_accept btn-success mt-3 btn-sm'>Acceptance Survey</a></div> -->
			<script>
				$(document).ready(function() {
					$('#staticBackdrop').modal('hide');

				});
			</script>
			@endif

		</div>
	</div>
</div>
@break
@case(2)
<div class="home-wrap">
	<div class="row">
		<div class="col-md-4" style="max-width: 133px;">
			<div class='ntf_image_logo'>
				<img src="{{ asset('frontend_assets/images/lg2.png') }}" alt="" />
			</div>
		</div>
		<div class="col-md-8" style="max-width: 266px;">
			<p> St. Ignatius College Preparatory<br>
				2001 37th Avenue<br>
				San Francisco, CA 94116<br>
				(415) 731-7500
			</p>
			<p>Office of Admissions</p>

		</div>
		<p style="text-align:right;"><?php echo getDateFunctions($notification_time); ?></p>
	</div>
	<div class="row mt-3">
		<div class="col-md-12">
			<p> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_First_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_Last_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_First_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_Last_Name", 'P2_Last_Name'); ?><br>
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_Street"); ?><br>
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_City"); ?>, <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_State"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_Zipcode"); ?><br>
			</p>

		</div>
	</div>

	<div class="hme-inr" id='ntf-detail'>
		<div class='ntf_candidate_detail mt-2'>
			<p class='ntf_student_name'>Dear <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_Salutation"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_Last_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_Salutation"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_Last_Name"); ?>:</p>
			<p class='ntf_app_status'>
			<p>The Admissions Committee wants to thank you and <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?> for submitting a very thoughtful application. The Committee was very impressed with <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?>’s many fine qualities.</p>
			<p>After careful review, the Admissions Committee has placed <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?> on the <b>Wait List</b> for the Class of 2027. The <b>Wait Listed</b> applicants were extremely competitive candidates in the applicant pool. We are aware that <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?> likely has other admission offers from which to choose. Being placed on the St. Ignatius College Preparatory <b>Wait List</b> is evidence of the strong positive impression <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?> made throughout our review process. <b>Wait Listed</b> applicants were carefully selected by the Admissions Committee as students who they would like as members of the upcoming Freshman class. We recognize that <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?> would be an asset to the class and sincerely hope that there will be a place available should <?php echo getStudentInformation($candidate, $studentJoinsDetail, "he/she"); ?> desire to attend St. Ignatius College Preparatory.</p>
			<p>Click below for important <b>Wait List</b> Information from the Admissions Staff. Please read it carefully as it answers the most frequently asked questions and details all pertinent information available.</p>
			<p>For your information, we had over <b>1,290</b> applicants apply to St. Ignatius College Preparatory for <b>375</b> places in the Class of 2027. There were many qualified applicants in this large and talented applicant pool that we were unable to accept. In fact, we could fill two more schools the size of St. Ignatius that would be just as strong academically as the students we have accepted for next year's Freshman class.</p>
			<p>We appreciate your patience and understanding while awaiting our final decision. Please be assured that the Admissions Committee will continue to give strong consideration to all legacies. Thank you for your interest in St. Ignatius College Preparatory and for entrusting us with <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?>’s application this year.</p>
			</p>
		</div>
		<div style="margin-top:15px;">
			<p class="mb-0">Respectfully,</p>
			<p style="border:0;display:inline-block;margin-bottom: 0;">
				<img style="max-width:205px;" src="{{ asset('admin_assets/logo/signature.png') }}" />
			</p>
			<p>Kristy Jacobson<br /> Director of Admissions</p>
		</div>
	</div>
</div>
@break
@case(3)
<div class="home-wrap">
	<div class="row">
		<div class="col-md-4" style="max-width: 133px;">
			<div class='ntf_image_logo'>
				<img src="{{ asset('frontend_assets/images/lg2.png') }}" alt="" />
			</div>
		</div>
		<div class="col-md-8" style="max-width: 266px;">
			<p> St. Ignatius College Preparatory<br>
				2001 37th Avenue<br>
				San Francisco, CA 94116<br>
				(415) 731-7500
			</p>
			<p>Office of Admissions</p>

		</div>
		<p style="text-align:right;"><?php echo getDateFunctions($notification_time); ?></p>
	</div>
	<div class="row mt-3">

		<div class="col-md-12">
			<p> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_First_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_Last_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_First_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_Last_Name", 'P2_Last_Name'); ?><br>
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_Street"); ?><br>
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_City"); ?>, <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_State"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_Zipcode"); ?><br>
			</p>

		</div>
	</div>

	<div class="hme-inr" id='ntf-detail'>
		<div class='ntf_candidate_detail mt-2'>
			<p class='ntf_student_name'>Dear <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_Salutation"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_Last_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_Salutation"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_Last_Name"); ?>:</p>
			<p class='ntf_app_status'>
			<p>The Admissions Committee wants to thank you and <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?> for submitting a very thoughtful application. We were fortunate to have so many qualified applicants to select from in this highly competitive applicant pool. The Committee was very impressed with <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?>'s many fine qualities.
			<p>We had over <b>1,290</b> applicants apply to St. Ignatius College Preparatory for the Class of 2027. We regret that we will not be able to offer <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?> a place in SI's Freshman class. There were many qualified applicants in this large and talented pool that we were unable to accept. In fact, we could fill two more schools the size of SI that would be just as strong academically as the students we have accepted for next year's Freshman class. <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?> is to be congratulated for all <?php echo getStudentInformation($candidate, $studentJoinsDetail, "he/she"); ?> has accomplished in <?php echo getStudentInformation($candidate, $studentJoinsDetail, "his/her"); ?> first eight years of school.</p>
			<p>We sincerely wish <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?> continued success in high school. The high school <?php echo getStudentInformation($candidate, $studentJoinsDetail, "he/she"); ?> attends will be fortunate to have {him/her} as a student. Thank you for entrusting us with <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?>'s application. We appreciate your interest in St. Ignatius College Preparatory and your understanding of how difficult our selection process was this year with so many qualified applicants.</p>
			</p>
		</div>
		<div style="margin-top:15px;">
			<p class="mb-0">Respectfully,</p>
			<p style="border:0;display:inline-block;">
				<img style="max-width:205px;" src="{{ asset('admin_assets/logo/signature.png') }}" />
			</p>
			<p>Kristy Jacobson<br /> Director of Admissions</p>
		</div>
	</div>
</div>
@break
@case(5)
<!-- <div class="home-wrap">
	<div class="row">
		<div class="col-md-4" style="max-width: 133px;">
			<div class='ntf_image_logo'>
				<img src="{{ asset('frontend_assets/images/lg2.png') }}" alt="" />
			</div>
		</div>
		<div class="col-md-8" style="max-width: 266px;">
			<p> St. Ignatius College Preparatory<br>
				2001 37th Avenue<br>
				San Francisco, CA 94116<br>
				(415) 731-7500
			</p>
			<p>Office of Admissions</p>

		</div>
		<p style="text-align:right;"><?php echo getDateFunctions($notification_time); ?></p>
	</div>
	<div class="row mt-3">

		<div class="col-md-12">
			<p><?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_First_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_Last_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_First_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_Last_Name", 'P2_Last_Name'); ?><br>
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_Street"); ?><br>
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_City"); ?>, <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_State"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_Zipcode"); ?><br>
			</p>

		</div>
	</div>

	<div class="hme-inr" id='ntf-detail'>


		<div class='ntf_candidate_detail mt-2'>
			<p class='ntf_student_name'>Dear <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_Salutation"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_Last_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_Salutation"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_Last_Name"); ?>:</p>
			<p class='ntf_app_status'>
			<p>Congratulations! <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_Last_Name"); ?> has been Accepted to St. Ignatius College
				Preparatory. Welcome to our school community! We congratulate <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?> for the academic
				diligence that has made this success possible. The entire SI community pledges itself to your child’s
				intellectual, spiritual, and social development over the next four years. We look forward to your
				participation and cooperation in this endeavor.
			<p><?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?>’s <b>Acceptance</b> is based on <?php echo getStudentInformation($candidate, $studentJoinsDetail, "his/her"); ?> academic achievements and the gifts
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "he/she"); ?> will be to the SI community. Placement in Honors level courses for math and foreign language
				will be determined by placement exams to be administered on April 22, 2023. Your online registration
				packet will include more information on these exams. The online registration packet will be available on
				March 27, 2023, with additional information and important dates. To access the online registration
				packet, visit <a href="http://www.siprepadmissions.org/" style="color: #0086e7;">www.siprepadmissions.org</a> on March 27, 2023 using the
				username and password you used to apply.</p>
			<p>To reserve a place in the Class of 2027, please click on the <b>Accept</b> button below and make a
				<b>deposit</b> of <b>$1,500</b>. As a courtesy to those students on our waitlist, we ask that those who
				do not intend to register at SI indicate their intention by clicking on the <b>Decline</b> button below.
				<b style="color:#dc3545;"> The registration deadline is 8:00 am on March 24, 2023, or the acceptance
					will be forfeited.</b>
			</p>
			<p>Tuition for the 2023-2024 academic year is <b><?php echo getTuitionAmount() ?></b>. The Business Office will have
				information on tuition payment plans and schedules in the online registration packet. For families who
				applied for financial assistance, the Business Office has posted the Financial Assistance Committee’s
				decision on this website for your reference.</p>
			<p>For your information, we had over <b>1,290</b> applicants apply to St. Ignatius College Preparatory for
				the Class of 2027. The Admissions Committee was fortunate to have so many qualified applicants to select
				from in this highly competitive applicant pool. We are excited to have <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?> as a member
				of our talented Freshman class. <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?>’s acceptance is contingent upon <?php echo getStudentInformation($candidate, $studentJoinsDetail, "his/her"); ?> continued
				academic performance, good citizenship, and successful completion of eight grade at
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_Current_School"); ?>. It is our intention to see that your child has the academic challenge and
				individual attention that have been a hallmark of Jesuit education. To this end, we are looking forward
				to working closely with you and <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?> over the next four years. Once again,
				<b>congratulations!</b>
			</p>
			</p>
		</div>

		<div style="margin-top:15px;">
			<p>Sincerely,</p>
			<p style="border:0;display:inline-block;">
				<img style="max-width:205px;" src="{{ asset('admin_assets/logo/signature.png') }}" />
			</p>
			<p>Kristy Jacobson<br /> Director of Admissions</p>
			<p><b style="color: #0086e7;">Financial Assistance Details for <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_Last_Name"); ?></b>
			</p>
			<div class='application_download'>
				<a href='{{url("/notification/pdfgenerator")}}/{{ $ntfDetail->id }}/{{ $studentDetail->Profile_ID }}/{{ $studentDetail->Application_ID }}' class="btn text-dark btn-primary mt-3">Download</a>
			</div>
		</div>
	</div>
</div> -->



<div class="home-wrap">
	<div class="row">
		<div class="col-md-4" style="max-width: 133px;">
			<div class='ntf_image_logo'>
				<img src="{{ asset('frontend_assets/images/lg2.png') }}" alt="" />
			</div>
		</div>
		<div class="col-md-8" style="max-width: 266px;">
			<p> St. Ignatius College Preparatory<br>
				2001 37th Avenue<br>
				San Francisco, CA 94116<br>
				(415) 731-7500
			</p>
			<p>Office of Admissions</p>

		</div>
		<p style="text-align:right;"><?php echo getDateFunctions($notification_time); ?></p>
	</div>
	<div class="row mt-3">

		<div class="col-md-12">
			<p><?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_First_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_Last_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_First_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_Last_Name", 'P2_Last_Name'); ?><br>
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_Street"); ?><br>
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_City"); ?>, <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_State"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_Zipcode"); ?><br>
			</p>

		</div>
	</div>

	<div class="hme-inr" id='ntf-detail'>


		<div class='ntf_candidate_detail mt-2'>
			<p class='ntf_student_name'>Dear <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_Salutation"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_Last_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_Salutation"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_Last_Name"); ?>:</p>
			<p class='ntf_app_status'>
			<p>My sincere congratulations to <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?> upon
				acceptance to the Class of 2027 of St. Ignatius College Preparatory!
			</p>
			<p>Your financial aid has been approved. You will receive
				{Financial Aid Amount} a year for the next four years, for a total of
				{Total Financial Aid Amount}. Your registration fee for Freshman year will be {Registration Fee}.
			</p>
			<p>We look forward to partnering with you as we provide an
				exceptional Jesuit education in the next four years.

			</p>

			</p>
		</div>

		<div style="margin-top:15px;">
			<p>Sincerely,</p>
			<p style="border:0;display:inline-block;">
				<img style="max-width:205px;" src="{{ asset('admin_assets/logo/signature2.png') }}" />
			</p>
			<p>Ken Stupi<br /> VP of Finance & Administration</p>

			<div class='application_download'>
				<a href='{{url("/notification/pdfgenerator")}}/{{ $ntfDetail->id }}/{{ $studentDetail->Profile_ID }}/{{ $studentDetail->Application_ID }}' class="btn btn-success text-dark mt-3">
					Acknowledge</a>
			</div>
		</div>
	</div>
</div>


@break

@case(6)

<div class="home-wrap">
	<div class="row">
		<div class="col-md-4" style="max-width: 133px;">
			<div class='ntf_image_logo'>
				<img src="{{ asset('frontend_assets/images/lg2.png') }}" alt="" />
			</div>
		</div>
		<div class="col-md-8" style="max-width: 266px;">
			<p> St. Ignatius College Preparatory<br>
				2001 37th Avenue<br>
				San Francisco, CA 94116<br>
				(415) 731-7500
			</p>
			<p>Office of Admissions</p>

		</div>
		<p style="text-align:right;"><?php echo getDateFunctions($notification_time); ?></p>
	</div>
	<div class="row mt-3">

		<div class="col-md-12">
			<p><?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_First_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_Last_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_First_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_Last_Name", 'P2_Last_Name'); ?><br>
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_Street"); ?><br>
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_City"); ?>, <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_State"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_Zipcode"); ?><br>
			</p>

		</div>
	</div>

	<div class="hme-inr" id='ntf-detail'>


		<div class='ntf_candidate_detail mt-2'>
			<p class='ntf_student_name'>Dear <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_Salutation"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_Last_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_Salutation"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_Last_Name"); ?>:</p>
			<p class='ntf_app_status'>
			<p>
				My sincere congratulations to <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?> upon acceptance to the Class of 2027 of St. Ignatius College Preparatory!
			</p>
			<p>I am writing to convey the decision of the Financial
				Assistance Committee. We regret to inform you that we are unable to
				provide financial assistance for the 2023-2024 school year.
			</p>
			<p>
				Our financial assistance funds are limited, and we have made
				every effort to evaluate your family’s demonstrated need. We
				cannot support any appeals unless there have been significant changes in your financial
				circumstances that occurred after
				your application for aid was filed. Examples of significant changes include:
			</p>

			<p>
			<ul class="ps-3">
				<li>Loss of income (wages, benefits, etc.) due to unemployment</li>
				<li>New major medical issue or family death</li>
			</ul>
			</p>
			<p>If you are moving forward with an appeal, please detail and document these changes by noon on
				Friday, March 25. All
				required documents, including your 2022 taxes, must be on file in your TADS application to be
				considered for an appeal.
				Submit your appeal here: <a class="text-dark" href=" https://www.siprep.org/appeal."> https://www.siprep.org/appeal.</a>
				<br><br>
				Tuition payments are collected through FACTS, and you will be notified by e-mail to sign up for this
				payment process.
				<br><br>
				It is our intention to make a Saint Ignatius education possible for all families and you are most
				welcome to apply for financial
				assistance in future years. Information about next year's assistance process will be available on
				the SI website in October
				2023.
				<br><br>
				Once again, the Financial Assistance Committee regrets that we were not able to meet your request.
				We look forward to
				partnering with you as we provide an exceptional Jesuit education in these next four years.
			</p>

			</p>
		</div>

		<div style="margin-top:15px;">
			<p>Sincerely,</p>
			<p style="border:0;display:inline-block;">
				<img style="max-width:205px;" src="{{ asset('admin_assets/logo/signature2.png') }}" />
			</p>
			<p>Ken Stupi<br /> VP of Finance & Administration</p>

			<div class='application_download'>
				<a href='{{url("/notification/pdfgenerator")}}/{{ $ntfDetail->id }}/{{ $studentDetail->Profile_ID }}/{{ $studentDetail->Application_ID }}' class="btn btn-success text-dark mt-3">Acknowledge</a>
			</div>
		</div>
	</div>
</div>



@break


@case(7)
<div class="home-wrap">
	<div class="row">
		<div class="col-md-4" style="max-width: 133px;">
			<div class='ntf_image_logo'>
				<img src="{{ asset('frontend_assets/images/lg2.png') }}" alt="" />
			</div>
		</div>
		<div class="col-md-8" style="max-width: 266px;">
			<p> St. Ignatius College Preparatory<br>
				2001 37th Avenue<br>
				San Francisco, CA 94116<br>
				(415) 731-7500
			</p>
			<p>Office of Admissions</p>

		</div>
		<p style="text-align:right;"><?php echo getDateFunctions($notification_time); ?></p>
	</div>
	<div class="row mt-3">

		<div class="col-md-12">
			<p><?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_First_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_Last_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_First_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_Last_Name", 'P2_Last_Name'); ?><br>
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_Street"); ?><br>
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_City"); ?>, <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_State"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_Zipcode"); ?><br>
			</p>

		</div>
	</div>

	<div class="hme-inr" id='ntf-detail'>


		<div class='ntf_candidate_detail mt-2'>
			<p class='ntf_student_name'>Dear <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_Salutation"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_Last_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_Salutation"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_Last_Name"); ?>:</p>
			<p class='ntf_app_status'>
			<p>Congratulations! <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_Last_Name"); ?> has
				been <b>Accepted with Honors</b> to St. Ignatius College
				Preparatory. Welcome to our school community! We congratulate <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?> for the academic
				diligence that has
				made this success possible. The entire SI community pledges itself to your child’s intellectual,
				spiritual, and social
				development over the next four years. We look forward to your participation and cooperation in this
				endeavor.
			</p>


			<p>
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?>'s <b>Acceptance with Honors</b>
				is a distinction reserved for the top 10% of applicants. This honor is
				based on<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?>'s superior academic records and test scores and because of <?php echo getStudentInformation($candidate, $studentJoinsDetail, "his/her"); ?>
				academic
				achievements <?php echo getStudentInformation($candidate, $studentJoinsDetail, "he/she"); ?> will automatically be placed in the following Honors course(s):
				<br>
				<b>• {Class_Information}
			</p>


			</p>
			</b>
			<p>The online registration system will be available beginning on March 27, 2023, with additional information, important
				dates and course information. To access the online registration system, visit <a class="text-primary" href="http://www.siprepadmissions.org/">www.siprepadmissions.org</a> on March 27,
				2023 using the username and password you used to apply. The registration system will be due on April 3, 2023.
			</p>
			<b>
				<p>
					To reserve a place in the Class of 2027
			</b>, please click on the <b>Enroll at
				SI</b> button below and make a <b>deposit</b> of <b>{deposit
				amount}</b>.
			As a courtesy to those students on our waitlist, we ask that those who do not intend to register at
			SI indicate their intention by
			clicking on the <b>Decline</b> button below. <span style="color:red;">The registration
				deadline is 6:00 am on March 24, 2023, or the acceptance will be
				forfeited.
				</p>
				<p>Tuition for the 2023-2024 academic year is <b>$31,225</b>. The Business Office will have
					information on tuition payment plans and
					schedules in the online registration system. For families who applied for financial assistance, the
					Business Office has posted
					the Financial Assistance Committee’s decision in this portal for your reference.
				</p>
				<p> We had over <b>1,290</b> applicants apply to St. Ignatius College Preparatory for the
					Class of 2027. The Admissions Committee was
					fortunate to have so many qualified applicants to select from in this highly competitive applicant
					pool. We are excited to have
					<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?> as a member of our talented Freshman class.<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?>’s acceptance
					is contingent upon
					<?php echo getStudentInformation($candidate, $studentJoinsDetail, "his/her"); ?> continued academic performance, good citizenship, and successful completion of eighth
					grade at
					<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_Current_School"); ?>. It is our intention to see that your student has the academic challenge
					and individual attention that
					have been a hallmark of Jesuit education. To this end, we are looking forward to working closely
					with you and
					<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?> over the next four years. Once again, <b>congratulations!</b></p>
				</p>
		</div>

		<div style="margin-top:15px;">
			<p>Sincerely,</p>
			<p style="border:0;display:inline-block;">
				<img style="max-width:205px;" src="{{ asset('admin_assets/logo/signature.png') }}" />
			</p>
			<p>Ms. Kristy Cahill Jacobson ‘98<br /> Director of Admissions</p>


			<div class="col-md-12">
				@if($student_status == App\Models\Application::ACCEPTANCE_HONORS && $ntfDetail->notification_type == App\Models\Notification::ACCEPTANCE_HONORS)


				@if($candidate == App\Models\Application::STUDENT_S1)
				@if($appStatus->s1_candidate_status == App\Models\Application::CANDIDATE_NOT_DEFINED || $appStatus->s1_candidate_status == App\Models\Application::CANDIDATE_READ)
				<div class="d-flex align-items-center justify-content-between">
					<div class='application_download'>
						<a href='{{url("/notification/pdfgenerator")}}/{{ $ntfDetail->id }}/{{ $studentDetail->Profile_ID }}/{{ $studentDetail->Application_ID }}' class="btn text-dark btn-primary mt-3">Download</a>
					</div>
					<div class='student_btns' style=" float: right !important;">
						<a data-bs-toggle="modal" data-bs-target="#acceptModel" class='btn btn_accept btn-success mt-3 btn-sm text-dark'>Enroll at SI</a>
						<a data-bs-toggle="modal" data-bs-target="#rejectModel" class='btn btn-sm btn-danger mt-3 text-dark'>Decline Acceptance at SI</a>
					</div>
				</div>
				@else
				@endif


				@endif
				@if($candidate == App\Models\Application::STUDENT_S2)
				@if($appStatus->s2_candidate_status == App\Models\Application::CANDIDATE_NOT_DEFINED || $appStatus->s2_candidate_status == App\Models\Application::CANDIDATE_READ)

				<div class="d-flex align-items-center justify-content-between">
					<div class='application_download'>
						<a href='{{url("/notification/pdfgenerator")}}/{{ $ntfDetail->id }}/{{ $studentDetail->Profile_ID }}/{{ $studentDetail->Application_ID }}' class="btn text-dark btn-primary mt-3">Download</a>
					</div>
					<div class='student_btns' style=" float: right !important;">
						<a data-bs-toggle="modal" data-bs-target="#acceptModel" class='btn btn_accept btn-success mt-3 btn-sm text-dark'>Enroll at SI</a>
						<a data-bs-toggle="modal" data-bs-target="#rejectModel" class='btn btn-sm btn-danger mt-3 text-dark'>Decline Acceptance at SI</a>
					</div>
				</div>
				@else
				@endif



				@endif
				@if($candidate == App\Models\Application::STUDENT_S3)
				@if($appStatus->s3_candidate_status == App\Models\Application::CANDIDATE_NOT_DEFINED || $appStatus->s3_candidate_status == App\Models\Application::CANDIDATE_READ)
				<div class="d-flex align-items-center justify-content-between">
					<div class='application_download'>
						<a href='{{url("/notification/pdfgenerator")}}/{{ $ntfDetail->id }}/{{ $studentDetail->Profile_ID }}/{{ $studentDetail->Application_ID }}' class="btn text-dark btn-primary mt-3">Download</a>
					</div>
					<div class='student_btns' style=" float: right !important;">
						<a data-bs-toggle="modal" data-bs-target="#acceptModel" class='btn btn_accept btn-success mt-3 btn-sm text-dark'>Enroll at SI</a>
						<a data-bs-toggle="modal" data-bs-target="#rejectModel" class='btn btn-sm btn-danger mt-3 text-dark'>Decline Acceptance at SI</a>
					</div>
				</div>
				@else
				@endif


				@endif
				@endif
			</div>


			@if($candidate == App\Models\Application::STUDENT_S1)

			@if($appStatus->s1_candidate_status == App\Models\Application::TYPE_ACCEPTED)
			<div class="col-md-12 text-left mt-4">Congratulations on enrolling as a student in the SI Class of 2027! Please check back here on Monday, March 27th for next steps and registration information.</div>
			@endif
			@if($appStatus->s1_candidate_status == App\Models\Application::CANDIDATE_REJECTED)
			<div class="col-md-12 text-left mt-4">We're sorry to hear about your decision not to accept our offer.</div>
			@endif
			@endif

			@if($candidate == App\Models\Application::STUDENT_S3)

			@if($appStatus->s3_candidate_status == App\Models\Application::TYPE_ACCEPTED)
			<div class="col-md-12 text-left mt-4">Congratulations on enrolling as a student in the SI Class of 2027! Please check back here on Monday, March 27th for next steps and registration information.</div>
			@endif
			@if($appStatus->s3_candidate_status == App\Models\Application::CANDIDATE_REJECTED)
			<div class="col-md-12 text-left mt-4">We're sorry to hear about your decision not to accept our offer.</div>
			@endif
			@endif


			@if($candidate == App\Models\Application::STUDENT_S3)

			@if($appStatus->s2_candidate_status == App\Models\Application::TYPE_ACCEPTED)
			<div class="col-md-12 text-left mt-4">Congratulations on enrolling as a student in the SI Class of 2027! Please check back here on Monday, March 27th for next steps and registration information.</div>
			@endif
			@if($appStatus->s2_candidate_status == App\Models\Application::CANDIDATE_REJECTED)
			<div class="col-md-12 text-left mt-4">We're sorry to hear about your decision not to accept our offer.</div>
			@endif
			@endif

		</div>
	</div>
</div>
@break



@case(8)
<div class="home-wrap">
	<div class="row">
		<div class="col-md-4" style="max-width: 133px;">
			<div class='ntf_image_logo'>
				<img src="{{ asset('frontend_assets/images/lg2.png') }}" alt="" />
			</div>
		</div>
		<div class="col-md-8" style="max-width: 266px;">
			<p> St. Ignatius College Preparatory<br>
				2001 37th Avenue<br>
				San Francisco, CA 94116<br>
				(415) 731-7500
			</p>
			<p>Office of Admissions</p>

		</div>
		<p style="text-align:right;"><?php echo getDateFunctions($notification_time); ?></p>
	</div>
	<div class="row mt-3">

		<div class="col-md-12">
			<p><?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_First_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_Last_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_First_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_Last_Name", 'P2_Last_Name'); ?><br>
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_Street"); ?><br>
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_City"); ?>, <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_State"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_Zipcode"); ?><br>
			</p>

		</div>
	</div>

	<div class="hme-inr" id='ntf-detail'>


		<div class='ntf_candidate_detail mt-2'>
			<p class='ntf_student_name'>Dear <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_Salutation"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_Last_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_Salutation"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_Last_Name"); ?>:</p>
			<p class='ntf_app_status'>
			<p>Congratulations! <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_Last_Name"); ?> has been <b>Accepted with Honors</b> to St. Ignatius College
				Preparatory. Welcome to our school community! We congratulate <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?> for the academic diligence that has
				made this success possible. The entire SI community pledges itself to your child’s intellectual, spiritual, and social
				development over the next four years. We look forward to your participation and cooperation in this endeavor.
			</p>
			<p>
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?>'s <b>Acceptance with Honors</b> is a distinction reserved for the top 10% of applicants. This honor is
				based on<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?>'s superior academic records and test scores and because of <?php echo getStudentInformation($candidate, $studentJoinsDetail, "his/her"); ?> academic
				achievements <?php echo getStudentInformation($candidate, $studentJoinsDetail, "he/she"); ?> will automatically be placed in the following Honors course(s):
				<br>
				<b>• {Class_Information}</b>
			</p>

			<p>
				The online registration system will be available beginning on March 27, 2023, with additional information, important
				dates and course information. To access the online registration system, visit <a class="text-primary" href="http://www.siprepadmissions.org/">www.siprepadmissions.org</a> on March 27,
				2023 using the username and password you used to apply. The registration system will be due on April 3, 2023.
			</p>
			<p> <b> To reserve a place in the Class of 2027</b>, please click on the <b>Enroll at SI</b> button below and make a <b>deposit</b> of <b>{deposit amount}.</b>
				As a courtesy to those students on our waitlist, we ask that those who do not intend to register at SI indicate their intention by
				clicking on the <b>Decline</b> button below. <span style="color:red;">The registration deadline is 6:00 am on March 24, 2023, or the acceptance will be
					forfeited.</span>
			</p>
			<p> Tuition for the 2023-2024 academic year is <b>$31,225</b>. The Business Office will have information on tuition payment plans and
				schedules in the online registration system. For families who applied for financial assistance, the Business Office has posted
				the Financial Assistance Committee’s decision in this portal for your reference.
			</p>
			<p>
				We had over <b>1,290 </b> applicants apply to St. Ignatius College Preparatory for the Class of 2027. The Admissions Committee was
				fortunate to have so many qualified applicants to select from in this highly competitive applicant pool. We are excited to have
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?> as a member of our talented Freshman class.<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?>’s acceptance is contingent upon
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "his/her"); ?> continued academic performance, good citizenship, and successful completion of eighth grade at
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_Current_School"); ?>. It is our intention to see that your student has the academic challenge and individual attention that
				have been a hallmark of Jesuit education. To this end, we are looking forward to working closely with you and
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?> over the next four years. Once again, <b>congratulations!</b>
			</p>
		</div>

		<div style="margin-top:15px;">
			<p>Sincerely,</p>
			<p style="border:0;display:inline-block;">
				<img style="max-width:205px;" src="{{ asset('admin_assets/logo/signature.png') }}" />
			</p>
			<p>Ms. Kristy Cahill Jacobson ‘98<br /> Director of Admissions</p>


			<div class="col-md-12">
				@if($student_status == App\Models\Application::ACCEPTANCE_Hon_W_FA_YES && $ntfDetail->notification_type == App\Models\Notification::ACCEPTANCE_Hon_W_FA_YES)

				@if($candidate == App\Models\Application::STUDENT_S1)
				@if($appStatus->s1_candidate_status == App\Models\Application::CANDIDATE_NOT_DEFINED || $appStatus->s1_candidate_status == App\Models\Application::CANDIDATE_READ)
				<!-- <div class='student_btns' style=" float: right !important;">
					<a data-bs-toggle="modal" data-bs-target="#acceptModel" class='btn btn_accept btn-success mt-3 btn-sm text-dark'>Enroll at SI</a>
					<a data-bs-toggle="modal" data-bs-target="#rejectModel" class='btn btn-sm btn-danger mt-3 text-dark'>Decline Acceptance at SI</a>
				</div> -->
				<div class="d-flex align-items-center justify-content-between">
					<div class='application_download'>
						<a href='{{url("/notification/pdfgenerator")}}/{{ $ntfDetail->id }}/{{ $studentDetail->Profile_ID }}/{{ $studentDetail->Application_ID }}' class="btn text-dark btn-primary mt-3">Download</a>
					</div>
					<div class='student_btns' style=" float: right !important;">
						<a data-bs-toggle="modal" data-bs-target="#acceptModel" class='btn btn_accept btn-success mt-3 btn-sm text-dark'>Enroll at SI</a>
						<a data-bs-toggle="modal" data-bs-target="#rejectModel" class='btn btn-sm btn-danger mt-3 text-dark'>Decline Acceptance at SI</a>
					</div>
				</div>
				@else
				@endif


				@endif
				@if($candidate == App\Models\Application::STUDENT_S2)
				@if($appStatus->s2_candidate_status == App\Models\Application::CANDIDATE_NOT_DEFINED || $appStatus->s2_candidate_status == App\Models\Application::CANDIDATE_READ)
				<div class="d-flex align-items-center justify-content-between">
					<div class='application_download'>
						<a href='{{url("/notification/pdfgenerator")}}/{{ $ntfDetail->id }}/{{ $studentDetail->Profile_ID }}/{{ $studentDetail->Application_ID }}' class="btn text-dark btn-primary mt-3">Download</a>
					</div>
					<div class='student_btns' style=" float: right !important;">
						<a data-bs-toggle="modal" data-bs-target="#acceptModel" class='btn btn_accept btn-success mt-3 btn-sm text-dark'>Enroll at SI</a>
						<a data-bs-toggle="modal" data-bs-target="#rejectModel" class='btn btn-sm btn-danger mt-3 text-dark'>Decline Acceptance at SI</a>
					</div>
				</div>
				@else
				@endif



				@endif
				@if($candidate == App\Models\Application::STUDENT_S3)
				@if($appStatus->s3_candidate_status == App\Models\Application::CANDIDATE_NOT_DEFINED || $appStatus->s3_candidate_status == App\Models\Application::CANDIDATE_READ)
				<div class="d-flex align-items-center justify-content-between">
					<div class='application_download'>
						<a href='{{url("/notification/pdfgenerator")}}/{{ $ntfDetail->id }}/{{ $studentDetail->Profile_ID }}/{{ $studentDetail->Application_ID }}' class="btn text-dark btn-primary mt-3">Download</a>
					</div>
					<div class='student_btns' style=" float: right !important;">
						<a data-bs-toggle="modal" data-bs-target="#acceptModel" class='btn btn_accept btn-success mt-3 btn-sm text-dark'>Enroll at SI</a>
						<a data-bs-toggle="modal" data-bs-target="#rejectModel" class='btn btn-sm btn-danger mt-3 text-dark'>Decline Acceptance at SI</a>
					</div>
				</div>
				@else
				@endif


				@endif
				@endif
			</div>


			@if($candidate == App\Models\Application::STUDENT_S1)

			@if($appStatus->s1_candidate_status == App\Models\Application::TYPE_ACCEPTED)
			<div class="col-md-12 text-left mt-4">Congratulations on enrolling as a student in the SI Class of 2027! Please check back here on Monday, March 27th for next steps and registration information.</div>
			@endif
			@if($appStatus->s1_candidate_status == App\Models\Application::CANDIDATE_REJECTED)
			<div class="col-md-12 text-left mt-4">We're sorry to hear about your decision not to accept our offer.</div>
			@endif
			@endif

			@if($candidate == App\Models\Application::STUDENT_S3)

			@if($appStatus->s3_candidate_status == App\Models\Application::TYPE_ACCEPTED)
			<div class="col-md-12 text-left mt-4">Congratulations on enrolling as a student in the SI Class of 2027! Please check back here on Monday, March 27th for next steps and registration information.</div>
			@endif
			@if($appStatus->s3_candidate_status == App\Models\Application::CANDIDATE_REJECTED)
			<div class="col-md-12 text-left mt-4">We're sorry to hear about your decision not to accept our offer.</div>
			@endif
			@endif


			@if($candidate == App\Models\Application::STUDENT_S2)

			@if($appStatus->s2_candidate_status == App\Models\Application::TYPE_ACCEPTED)
			<div class="col-md-12 text-left mt-4">Congratulations on enrolling as a student in the SI Class of 2027! Please check back here on Monday, March 27th for next steps and registration information.</div>
			@endif
			@if($appStatus->s2_candidate_status == App\Models\Application::CANDIDATE_REJECTED)
			<div class="col-md-12 text-left mt-4">We're sorry to hear about your decision not to accept our offer.</div>
			@endif
			@endif
		</div>
	</div>
</div>
@break


@case(9)
<div class="home-wrap">
	<div class="row">
		<div class="col-md-4" style="max-width: 133px;">
			<div class='ntf_image_logo'>
				<img src="{{ asset('frontend_assets/images/lg2.png') }}" alt="" />
			</div>
		</div>
		<div class="col-md-8" style="max-width: 266px;">
			<p> St. Ignatius College Preparatory<br>
				2001 37th Avenue<br>
				San Francisco, CA 94116<br>
				(415) 731-7500
			</p>
			<p>Office of Admissions</p>

		</div>
		<p style="text-align:right;"><?php echo getDateFunctions($notification_time); ?></p>
	</div>
	<div class="row mt-3">

		<div class="col-md-12">
			<p><?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_First_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_Last_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_First_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_Last_Name", 'P2_Last_Name'); ?><br>
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_Street"); ?><br>
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_City"); ?>, <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_State"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Primary_Address_Zipcode"); ?><br>
			</p>

		</div>
	</div>

	<div class="hme-inr" id='ntf-detail'>


		<div class='ntf_candidate_detail mt-2'>
			<p class='ntf_student_name'>Dear <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_Salutation"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P1_Last_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_Salutation"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "P2_Last_Name"); ?>:</p>
			<p class='ntf_app_status'>
			<p>Congratulations! <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_Last_Name"); ?> has
				been <b>Accepted with Honors</b> to St. Ignatius College
				Preparatory. Welcome to our school community! We congratulate <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?> for the academic
				diligence that has
				made this success possible. The entire SI community pledges itself to your child’s intellectual,
				spiritual, and social
				development over the next four years. We look forward to your participation and cooperation in this
				endeavor.
			</p>
			<p>
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?>'s <b>Acceptance with Honors</b>
				is a distinction reserved for the top 10% of applicants. This honor is
				based on<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?>'s superior academic records and test scores and because of <?php echo getStudentInformation($candidate, $studentJoinsDetail, "his/her"); ?>
				academic
				achievements <?php echo getStudentInformation($candidate, $studentJoinsDetail, "he/she"); ?> will automatically be placed in the following Honors course(s):
				<br>
				<b>• {Class_Information}</b>
			</p>

			<p>The online registration system will be available beginning on March 27, 2023, with additional information, important
				dates and course information. To access the online registration system, visit <a class="text-primary" href="http://www.siprepadmissions.org/"> https://www.siprepadmissions.org.</a> on March 27,
				2023 using the username and password you used to apply. The registration system will be due on April 3, 2023.</p>
			<p>
				<b> To reserve a place in the Class of 2027</b>, please click on the <b>Enroll at
					SI</b> button below and make a <b>deposit</b> of <b>{deposit
					amount}</b>.
				As a courtesy to those students on our waitlist, we ask that those who do not intend to register at
				SI indicate their intention by
				clicking on the <b>Decline</b> button below. <span style="color:red;">The registration
					deadline is 6:00 am on March 24, 2023, or the acceptance will be
					forfeited.</span>
			</p>

			<p> Tuition for the 2023-2024 academic year is <b>$31,225</b>. The Business Office will have
				information on tuition payment plans and
				schedules in the online registration system. For families who applied for financial assistance, the
				Business Office has posted
				the Financial Assistance Committee’s decision in this portal for your reference.
			</p>
			<p>
				We had over <b>1,290</b> applicants apply to St. Ignatius College Preparatory for the
				Class of 2027. The Admissions Committee was
				fortunate to have so many qualified applicants to select from in this highly competitive applicant
				pool. We are excited to have
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?> as a member of our talented Freshman class.<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?>’s acceptance
				is contingent upon
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "his/her"); ?> continued academic performance, good citizenship, and successful completion of eighth
				grade at
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_Current_School"); ?>. It is our intention to see that your student has the academic challenge
				and individual attention that
				have been a hallmark of Jesuit education. To this end, we are looking forward to working closely
				with you and
				<?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?> over the next four years. Once again, <b>congratulations!</b>
			</p>
		</div>

		<div style="margin-top:15px;">
			<p>Sincerely,</p>
			<p style="border:0;display:inline-block;">
				<img style="max-width:205px;" src="{{ asset('admin_assets/logo/signature.png') }}" />
			</p>
			<p>Kristy Jacobson<br /> Director of Admissions</p>
			<p><b style="color: #0086e7;">Financial Assistance Details for <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_First_Name"); ?> <?php echo getStudentInformation($candidate, $studentJoinsDetail, "Student_Last_Name"); ?></b>
			</p>
			<div class='application_download'>
				<a href='{{url("/notification/pdfgenerator")}}/{{ $ntfDetail->id }}/{{ $studentDetail->Profile_ID }}/{{ $studentDetail->Application_ID }}' class="btn text-dark btn-primary mt-3">Download</a>
			</div>

		</div>
	</div>
</div>
@break


@default
No Status yet
@endswitch

@if(!empty($student_accept_status))
@if($student_accept_status == App\Models\Application::TYPE_ACCEPTED && $ntfDetail->student_profile == App\Models\Application::STUDENT_ONE && $appStatus->s1_application_status == App\Models\Application::TYPE_ACCEPTED)
<!-- <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class='btn btn-sm btn-danger mt-3'>Pay Registration Fee</a> -->
<script>
	$(document).ready(function() {
		$('#staticBackdrop').modal('show');

	});
</script>
@endif

@if($student_accept_status == App\Models\Application::TYPE_ACCEPTED && $ntfDetail->student_profile == App\Models\Application::STUDENT_TWO && $appStatus->s2_application_status == App\Models\Application::TYPE_ACCEPTED)
<!-- <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class='btn btn-sm btn-danger mt-3'>Pay Registration Fee</a> -->
<script>
	$(document).ready(function() {
		$('#staticBackdrop').modal('show');

	});
</script>
@endif

@if($student_accept_status == App\Models\Application::TYPE_ACCEPTED && $ntfDetail->student_profile == App\Models\Application::STUDENT_THREE && $appStatus->s3_application_status == App\Models\Application::TYPE_ACCEPTED)
<!-- <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class='btn btn-sm btn-danger mt-3'>Pay Registration Fee</a> -->
<script>
	$(document).ready(function() {
		$('#staticBackdrop').modal('show');
	});
</script>
@endif
@endif

<div class="modal fade" id="Survey" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Please take our survey</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Acceptance at SI
			</div>
			<div class="modal-footer">
				<a id="AcceptanceAtSI" class='btn btn_accept acceptanceAtSI'>Acceptance survey</a>
			</div>
		</div>
	</div>
</div>



<div class="modal fade" id="SurveyDecline" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Please take our survey</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Decline Acceptance at SI
			</div>
			<div class="modal-footer">
				<a id="declineAcceptanceAtSI" class='btn btn_accept'>Decline survey</a>
			</div>
		</div>
	</div>
</div>

<!-- Accept Modal -->
<div class="modal fade" id="acceptModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Save Your response</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Are you sure you want to accept this offer?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
				<a href="{{ url('/candidate/response') }}/{{ $appStatus->application_id }}/{{$candidate}}/{{App\Models\Application::CANDIDATE_ACCEPTED}}" class='btn btn_accept'>Yes</a>
			</div>
		</div>
	</div>
</div>

<!-- Reject Modal -->
<div class="modal fade" id="rejectModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Save Your response</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Are you sure you want to decline this offer?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
				<a href="{{ url('/candidate/response') }}/{{ $appStatus->application_id  }}/{{$candidate}}/{{App\Models\Application::CANDIDATE_REJECTED}}" class='btn btn_accept'>Yes</a>
			</div>
		</div>
	</div>
</div>

<!-- Accept survey modal -->

<!-- Decline survey modal -->

@if($student_accept_status == App\Models\Application::TYPE_ACCEPTED)
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header header-new">
				<h1>Payment Application Fee</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="payment-sec">
					<div class="form-wrap">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>First Name</label>
									<input type="text" class="form-control new-controll" name="first_name" />
									@error('first_name')
									<span class="error error_text">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Last Name</label>
									<input type="text" class="form-control new-controll" name="last_name" />
									@error('last_name')
									<span class="error error_text">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Email</label>
									<input type="text" class="form-control new-controll" name="email" />
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
                                            onkeyup="return numberValidation(event)" name="card_number" /> --}}

									<input type="text" class="form-control new-controll" onKeyPress="if(this.value.length==16) return false;" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" name="card_number" />
									@error('card_number')
									<span class="error error_text">{{ $message }}</span>
									@enderror
								</div>

							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>CVV</label>
									<input type="password" class="form-control new-controll" onKeyPress="if(this.value.length==4) return false;" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" name="card_cvv" />
									@error('card_cvv')
									<span class="error error_text">{{ $message }}</span>
									@enderror
								</div>
							</div>
							{{-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Card Holder Name</label>
                                        <input type="text" class="form-control new-controll"
                                            name="card_holder_name" />
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
							<select class="form-control new-controll" name="card_exp_mm">
								<option value="">Choose Month</option>
								@foreach ($months as $k => $v)
								<option value="{{ $k }}" {{ old('card_exp_mm') == $k ? 'selected' : '' }}>
									{{ $v }}
								</option>
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
							<select class="form-control new-controll" name="card_exp_yy">
								<option value="">Choose Year</option>
								@for ($i = date('Y'); $i <= date('Y') + 15; $i++) <option value="{{ $i }}">{{ $i }}</option>
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
							<input type="text" class="form-control new-controll" name="billing_address" />
							@error('billing_address')
							<span class="error error_text">{{ $message }}</span>
							@enderror
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Billing City</label>
							<input type="text" class="form-control new-controll" name="billing_city" />
							@error('billing_city')
							<span class="error error_text">{{ $message }}</span>
							@enderror
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Billing State</label>
							<input type="text" class="form-control new-controll" name="billing_state" />
							@error('billing_state')
							<span class="error error_text">{{ $message }}</span>
							@enderror
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Billing Zip Code</label>
							<input type="text" class="form-control new-controll" name="billing_zip_code" />
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
		@if ($is_button_clicked??0)
		<div class="la-ball-elastic-dots payment">
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
		</div>
		@else
		<button class="payment" id="submitPayment" type="submit">PAY (Total

			${{ App\Models\Payment::PAYAMOUNT ?? 0}})</button>

		@endif

	</div>
</div>
</div>
</div>

<script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': '<?= csrf_token() ?>'
		}
	});
	$(document).ready(function() {
		var host = "{{URL::to('/')}}";
		$('#submitPayment').on('click', function(e) {

			$('.loading').show();
			var first_name = $('input[name=first_name]').val();
			var last_name = $('input[name=last_name]').val();
			var email = $('input[name=email]').val();
			var card_number = $('input[name=card_number]').val();
			var card_cvv = $('input[name=card_cvv]').val();
			var card_exp_mm = $('select[name=card_exp_mm]').val();
			var card_exp_yy = $('select[name=card_exp_yy]').val();
			var billing_address = $('input[name=billing_address]').val();
			var billing_city = $('input[name=billing_city]').val();
			var billing_state = $('input[name=billing_state]').val();
			var billing_zip_code = $('input[name=billing_zip_code]').val();
			var studendId = '{{ $ntfDetail->id }}';

			if (first_name == "" || first_name == null) {
				alert("First name must be filled out");
				$('.loading').hide();
				return false;
			}
			if (last_name == "" || last_name == null) {
				alert("Last name must be filled out");
				$('.loading').hide();
				return false;
			}
			if (email == "" || email == null) {
				alert("Email must be filled out");
				$('.loading').hide();
				return false;
			}
			if (card_number == "" || card_number == null) {
				alert("Card number must be filled out");
				$('.loading').hide();
				return false;
			}
			if (card_cvv == "" || card_cvv == null) {
				alert("Card cvv must be filled out");
				$('.loading').hide();

				return false;
			}
			if (card_exp_mm == "" || card_exp_mm == null) {
				alert("Card exp mm must be filled out");
				$('.loading').hide();
				return false;
			}
			if (card_exp_yy == "" || card_exp_yy == null) {
				alert("Card exp yy must be filled out");
				$('.loading').hide();
				return false;
			}
			if (billing_address == "" || billing_address == null) {
				alert("Billing address must be filled out");
				$('.loading').hide();
				return false;
			}
			if (billing_address.length > 75) {
				alert("The length of the Billing address is not long");
				$('.loading').hide();
				return false;
			}
			if (billing_city == "" || billing_city == null) {
				alert("Billing city must be filled out");
				$('.loading').hide();
				return false;
			}
			if (billing_state == "" || billing_state == null) {
				alert("Billing state must be filled out");
				$('.loading').hide();
				return false;
			}
			if (billing_zip_code == "" || billing_zip_code == null) {
				alert("Billing zip code must be filled out");
				$('.loading').hide();
				return false;
			}

			$.ajax({
				type: "POST",
				url: "{{ route('dopay') }}",
				data: {
					first_name: first_name,
					last_name: last_name,
					email: email,
					card_number: card_number,
					card_cvv: card_cvv,
					card_exp_mm: card_exp_mm,
					card_exp_yy: card_exp_yy,
					billing_address: billing_address,
					billing_city: billing_city,
					billing_state: billing_state,
					billing_zip_code: billing_zip_code,
					studendId: studendId,
					_token: '{{csrf_token()}}'


				},
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},

				success: function(response) {
					$('.loading').hide();
					if (response.status == "success") {
						toastr.success(response.message);
						$(".paymentButton").hide();
						$('#staticBackdrop').modal('hide');
						setTimeout(function() {
							location.reload();
						}, 2000);

					} else {
						$(".paymentButton").show();

						$('#staticBackdrop').modal('show');
						toastr.error(response.message


						);
					}

				}


			})
		});
	});
</script>
@endif
<script>
	$(document).ready(function() {

		$('.modal').on('hidden.bs.modal', function() {
			if ($('.modal').hasClass('show')) {
				$('body').addClass('modal-open');
			}
		});
		$('#AcceptanceAtSI').on('click', function(e) {
			$('#acceptanceServModal').modal('show');
			$('#Survey').modal('hide');
		})
		$('#declineAcceptanceAtSI').on('click', function(e) {
			$('#declineanceServModal').modal('show');

			$('#SurveyDecline').modal('hide');
		})
		$('#submit_acceptance_survey').on('click', function(e) {
			acceptanceDeclineServ();
		});
		$('#decline_Acceptance_to_SI').on('click', function(e) {
			acceptanceDeclineServ();
		});

		function acceptanceDeclineServ() {
			$('.loading').show();

			var name_of_School_1 = $('input[name=name_of_School_1]').val();
			var modal_type = $('input[name=modal_type]').val();
			var school_planning_attend = $('input[name=school_planning_attend]').val();

			var name_of_School_2 = $('input[name=name_of_School_2]').val();
			var name_of_School_3 = $('input[name=name_of_School_3]').val();
			var name_of_School_4 = $('input[name=name_of_School_4]').val();
			var student_type = '{{$candidate}}';
			var school_s_Decision_1 = $('#school_s_Decision_1').val();
			var school_s_Decision_2 = $('#school_s_Decision_2').val();
			var school_s_Decision_3 = $('#school_s_Decision_3').val();
			var school_s_Decision_4 = $('#school_s_Decision_4').val();
			var applied_for_Aid_1 = $('#applied_for_Aid_1').val();
			var applied_for_Aid_2 = $('#applied_for_Aid_2').val();
			var applied_for_Aid_3 = $('#applied_for_Aid_3').val();
			var applied_for_Aid_4 = $('#applied_for_Aid_4').val();
			var amount_of_Aid_or_scholarship_Offered_1 = $('input[name=amount_of_Aid_or_scholarship_Offered_1]').val();
			var amount_of_Aid_or_scholarship_Offered_2 = $('input[name=amount_of_Aid_or_scholarship_Offered_2]').val();
			var amount_of_Aid_or_scholarship_Offered_3 = $('input[name=amount_of_Aid_or_scholarship_Offered_3]').val();
			var amount_of_Aid_or_scholarship_Offered_4 = $('input[name=amount_of_Aid_or_scholarship_Offered_4]').val();
			var comment_1 = $('input[name=comment_1]').val();
			var comment_2 = $('input[name=comment_2]').val();
			var comment_3 = $('input[name=comment_3]').val();
			var comment_4 = $('input[name=comment_4]').val();
			var most_Important_Reason = $('#most_Important_Reason').val();
			var second_Most_Important_Reason = $('#second_Most_Important_Reason').val();
			var third_Most_Important_Reason = $('#third_Most_Important_Reason').val();
			var rank_Comment_1 = $('input[name=rank_Comment_1]').val();
			var rank_Comment_2 = $('input[name=rank_Comment_2]').val();
			var rank_Comment_3 = $('input[name=rank_Comment_3]').val();
			var student_Visit_Program = $('#student_Visit_Program').val();
			var admissions_process = $('#admissions_process').val();
			var studendId = '{{ $ntfDetail->id }}';
			if (name_of_School_1 == "" || name_of_School_1 == null) {
				alert("Name of School 1 must be filled out");
				$('.loading').hide();
				return false;
			}
			if (name_of_School_2 == "" || name_of_School_2 == null) {
				alert("Name of School 2 must be filled out");
				$('.loading').hide();
				return false;
			}
			if (name_of_School_3 == "" || name_of_School_3 == null) {
				alert("Name of School 3 must be filled out");
				$('.loading').hide();
				return false;
			}
			if (name_of_School_4 == "" || name_of_School_4 == null) {
				alert("Name of School 4 must be filled out");
				$('.loading').hide();
				return false;
			}
			if (modal_type == "" || modal_type == null) {
				alert("Something wrong try again");
				$('.loading').hide();
				return false;
			}


			if (school_s_Decision_1 == "" || school_s_Decision_1 == null) {
				alert("School s Decision 1 must be filled out");
				$('.loading').hide();
				return false;
			}
			if (school_s_Decision_2 == "" || school_s_Decision_2 == null) {
				alert("School s Decision 2 must be filled out");
				$('.loading').hide();
				return false;
			}
			if (school_s_Decision_3 == "" || school_s_Decision_3 == null) {
				alert("School s Decision 3 must be filled out");
				$('.loading').hide();
				return false;
			}
			if (school_s_Decision_4 == "" || school_s_Decision_4 == null) {
				alert("School s Decision 4 must be filled out");
				$('.loading').hide();
				return false;
			}

			if (applied_for_Aid_1 == "" || applied_for_Aid_1 == null) {
				alert("Applied for Aid 1 must be filled out");
				$('.loading').hide();
				return false;
			}
			if (applied_for_Aid_2 == "" || applied_for_Aid_2 == null) {
				alert("Applied for Aid 2 must be filled out");
				$('.loading').hide();
				return false;
			}
			if (applied_for_Aid_3 == "" || applied_for_Aid_3 == null) {
				alert("Applied for Aid 3 must be filled out");
				$('.loading').hide();
				return false;
			}
			if (applied_for_Aid_4 == "" || applied_for_Aid_4 == null) {
				alert("Applied for Aid 4 must be filled out");
				$('.loading').hide();
				return false;
			}

			if (amount_of_Aid_or_scholarship_Offered_1 == "" || amount_of_Aid_or_scholarship_Offered_1 == null) {
				alert("Amount of Aid or scholarship Offered 1 must be filled out");
				$('.loading').hide();
				return false;
			}
			if (amount_of_Aid_or_scholarship_Offered_2 == "" || amount_of_Aid_or_scholarship_Offered_2 == null) {
				alert("Amount of Aid or scholarship Offered 2 must be filled out");
				$('.loading').hide();
				return false;
			}
			if (amount_of_Aid_or_scholarship_Offered_3 == "" || amount_of_Aid_or_scholarship_Offered_3 == null) {
				alert("Amount of Aid or scholarship Offered 3 must be filled out");
				$('.loading').hide();
				return false;
				table
			}
			if (amount_of_Aid_or_scholarship_Offered_4 == "" || amount_of_Aid_or_scholarship_Offered_4 == null) {
				alert("Amount of Aid or scholarship Offered 4 must be filled out");
				$('.loading').hide();
				return false;
			}
			if (comment_1 == "" || comment_1 == null) {
				alert("comment 1 must be filled out");
				$('.loading').hide();
				return false;
			}
			if (comment_2 == "" || comment_2 == null) {
				alert("comment 2 must be filled out");
				$('.loading').hide();
				return false;
			}
			if (comment_3 == "" || comment_3 == null) {
				alert("comment 3 must be filled out");
				$('.loading').hide();
				return false;
			}
			if (comment_4 == "" || comment_4 == null) {
				alert("comment 4 must be filled out");
				$('.loading').hide();
				return false;
			}
			if (most_Important_Reason == "" || most_Important_Reason == null) {
				alert("Most Important Reason must be filled out");
				$('.loading').hide();
				return false;
			}

			if (second_Most_Important_Reason == "" || second_Most_Important_Reason == null) {
				alert("Second Most Important Reason must be filled out");
				$('.loading').hide();
				return false;
			}

			if (third_Most_Important_Reason == "" || third_Most_Important_Reason == null) {
				alert("Third Most Important Reason must be filled out");
				$('.loading').hide();
				return false;
			}

			if (rank_Comment_1 == "" || rank_Comment_1 == null) {
				alert("Rank Comment 1 must be filled out");
				$('.loading').hide();
				return false;
			}
			if (rank_Comment_2 == "" || rank_Comment_3 == null) {
				alert("Rank Comment 2 must be filled out");
				$('.loading').hide();
				return false;
			}
			if (rank_Comment_3 == "" || rank_Comment_3 == null) {
				alert("Rank Comment 3 must be filled out");
				$('.loading').hide();
				return false;
			}
			if (student_Visit_Program == "" || student_Visit_Program == null) {
				alert("Student Visit Program must be filled out");
				$('.loading').hide();
				return false;
			}
			if (admissions_process == "" || admissions_process == null) {
				alert("Admissions process must be filled out");
				$('.loading').hide();
				return false;
			}
			$('#acceptanceServModal').modal('hide');

			$.ajax({
				type: "POST",
				url: "{{ route('acceptanceSurvey') }}",
				data: {
					name_of_School_1: name_of_School_1,
					name_of_School_2: name_of_School_2,
					name_of_School_3: name_of_School_3,
					name_of_School_4: name_of_School_4,
					school_s_Decision_1: school_s_Decision_1,
					school_s_Decision_2: school_s_Decision_2,
					school_s_Decision_3: school_s_Decision_3,
					school_s_Decision_4: school_s_Decision_4,
					applied_for_Aid_1: applied_for_Aid_1,
					applied_for_Aid_2: applied_for_Aid_2,
					applied_for_Aid_3: applied_for_Aid_3,
					applied_for_Aid_4: applied_for_Aid_4,
					amount_of_Aid_or_scholarship_Offered_1: amount_of_Aid_or_scholarship_Offered_1,
					amount_of_Aid_or_scholarship_Offered_2: amount_of_Aid_or_scholarship_Offered_2,
					amount_of_Aid_or_scholarship_Offered_3: amount_of_Aid_or_scholarship_Offered_3,
					amount_of_Aid_or_scholarship_Offered_4: amount_of_Aid_or_scholarship_Offered_4,
					comment_1: comment_1,
					comment_2: comment_2,
					comment_3: comment_3,
					comment_4: comment_4,
					most_Important_Reason: most_Important_Reason,
					second_Most_Important_Reason: second_Most_Important_Reason,
					third_Most_Important_Reason: third_Most_Important_Reason,
					rank_Comment_1: rank_Comment_1,
					rank_Comment_2: rank_Comment_2,
					rank_Comment_3: rank_Comment_3,
					student_Visit_Program: student_Visit_Program,
					admissions_process: admissions_process,
					student_type: student_type,
					school_planning_attend: school_planning_attend,
					modal_type: modal_type,


					_token: '{{csrf_token()}}'
				},
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},

				success: function(response) {
					$('.loading').hide();
					if (response.status == "success") {
						toastr.success(response.message);
						$('#acceptanceServModal').modal('hide');
						$('#declineanceServModal').modal('hide');

						setTimeout(function() {
							location.reload();
						}, 2000);

					} else {
						$('#declineanceServModal').modal('show');
						$('#acceptanceServModal').modal('show');
						toastr.error(response.message


						);
					}

				}


			})
		}




	});
</script>
@php
function getDeclineSurvayModal() {

echo $modal= '<div class="modal fade" id="declineanceServModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog survay-accept">
		<input type="hidden" name="modal_type" value="decline_survay">

		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><span style="color: #a7172f; font-size:22px;">Decline Acceptance at St. Ignatius College Preparatory</span></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">

				<table width="100%" cellpadding="0" cellspacing="0" class="table-responsive">
					<tr>
						<td style="padding: 10px 0;">
							<p style="font-size: 18px;">We truly appreciated your application to St. Ignatius College Preparatory this year. Please answer the following questions to assist us in evaluating our admissions process and to decline your acceptance at St. Ignatius College Preparatory.</p>
						</td>
					</tr>
					<tr>
						<td style="font-size: 18px; padding: 10px 0;">
							<b>School that you are planning on attending:</b>
							<input type="text" name="school_planning_attend" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 400px;">
						</td>
					</tr>
					<tr>
						<td style="font-size: 18px; padding: 10px 0;">
							<b>Please list, in order of preference, the schools to which you applied,
								the admission decision (accepted/wait listed/not accepted), and Financial
								Aid or scholarship information, if applicable:</b>
						</td>
					</tr>
					<tr>
						<td style="padding: 10px 0;  width:100%;">
							<table style="width: 100%;" cellpadding="1">
								<tr align="left">
									<th></th>
									<th style="font-weight: 400; font-size: 14px; padding: 0 5px;">Name of School</th>
									<th style="font-weight: 400; font-size: 14px; padding: 0 5px;">School`s Decision</th>
									<th style="font-weight: 400; font-size: 14px; padding: 0 5px;">Applied for Aid</th>
									<th style="font-weight: 400; font-size: 14px; padding: 0px 5px 0 30px;"></th>
									<th style="font-weight: 400; font-size: 14px; padding: 0 5px;" colspan="1">Amount of Aid or scholarship Offered</th>
									<th style="font-weight: 400; font-size: 14px; padding: 0 5px;">Comment</th>
								</tr>

								<tr>
									<td>
										1.
									</td>
									<td>
										<input type="text" name="name_of_School_1" style=" box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 150px;">
									</td>
									<td>
										<div class="selector-box">
											<select id="school_s_Decision_1" name="school_s_Decision_1">
												<option value="saab">Saab</option>
												<option value="fiat">Fiat</option>
												<option value="audi">Audi</option>
											</select>
										</div>
									</td>
									<td>
										<div class="selector-box">
											<select id="applied_for_Aid_1" name="applied_for_Aid_1">
												<option value="volvo">Volvo</option>
												<option value="saab">Saab</option>
												<option value="fiat">Fiat</option>
												<option value="audi">Audi</option>
											</select>
										</div>
									</td>
									<td style="text-align: center;">
										<b>$</b>
									</td>
									<td>
										<input type="text" name="amount_of_Aid_or_scholarship_Offered_1" style=" box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px;  width: 100%;  max-width: 265px;">
									</td>
									<td>
										<input type="text" name="comment_1" style=" box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 200px;">
									</td>
								</tr>
								<tr>
									<td>
										2.
									</td>
									<td>
										<input type="text" name="name_of_School_2" style=" box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 150px;">
									</td>
									<td>
										<div class="selector-box">
											<select id="school_s_Decision_2" name="school_s_Decision_2">
												<option value="volvo">Volvo</option>
												<option value="saab">Saab</option>
												<option value="fiat">Fiat</option>
												<option value="audi">Audi</option>
											</select>
										</div>
									</td>
									<td>
										<div class="selector-box">
											<select id="applied_for_Aid_2" name="applied_for_Aid_2">
												<option value="volvo">Volvo</option>
												<option value="saab">Saab</option>
												<option value="fiat">Fiat</option>
												<option value="audi">Audi</option>
											</select>
										</div>
									</td>
									<td style="text-align: center;">
										<b>$</b>
									</td>
									<td><input type="text" name="amount_of_Aid_or_scholarship_Offered_2" style=" box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 100%;  max-width: 265px;">
									</td>
									<td>
										<input type="text" name="comment_2" style=" box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 200px;">
									</td>
								</tr>
								<tr>
									<td>
										3.
									</td>
									<td>
										<input type="text" name="name_of_School_3" style=" box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 150px;">
									</td>
									<td>
										<div class="selector-box">
											<select id="school_s_Decision_3" name="school_s_Decision_3">
												<option value="volvo">Volvo</option>
												<option value="saab">Saab</option>
												<option value="fiat">Fiat</option>
												<option value="audi">Audi</option>
											</select>
										</div>
									</td>
									<td>
										<div class="selector-box">
											<select id="applied_for_Aid_3" name="applied_for_Aid_3">
												<option value="volvo">Volvo</option>
												<option value="saab">Saab</option>
												<option value="fiat">Fiat</option>
												<option value="audi">Audi</option>
											</select>
										</div>
									</td>
									<td style="text-align: center;">
										<b>$</b>
									</td>
									<td><input type="text" name="amount_of_Aid_or_scholarship_Offered_3" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px;  width: 100%;  max-width: 265px;">
									</td>
									<td>
										<input type="text" name="comment_3" style=" box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 200px;">
									</td>
								</tr>
								<tr>
									<td>
										4.
									</td>
									<td>
										<input type="text" name="name_of_School_4" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 150px;">
									</td>
									<td>
										<div class="selector-box">
											<select id="school_s_Decision_4" name="school_s_Decision_4">
												<option value="volvo">Volvo</option>
												<option value="saab">Saab</option>
												<option value="fiat">Fiat</option>
												<option value="audi">Audi</option>
											</select>
										</div>
									</td>
									<td>
										<div class="selector-box">
											<select id="applied_for_Aid_4" name="applied_for_Aid_4">
												<option value="volvo">Volvo</option>
												<option value="saab">Saab</option>
												<option value="fiat">Fiat</option>
												<option value="audi">Audi</option>
											</select>
										</div>
									</td>

									<td style="text-align: center;">
										<b>$</b>
									</td>
									<td><input type="text" name="amount_of_Aid_or_scholarship_Offered_4" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px;  width: 100%;  max-width: 265px;">
									</td>
									<td>
										<input type="text" name="comment_4" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 200px;">
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td style="font-size: 18px; padding: 10px 0;">
							<b>Rank the three most important reasons for not choosing SI:</b>
						</td>
					</tr>
					<tr>
						<td>
							<table style="width: 870px;" cellpadding="1">
								<tr>
									<td style="font-size: 18px; padding: 8px 0; width:35%;">
										Most Important Reason:
									</td>
									<td>
										<div class="selector-box">
											<select id="most_Important_Reason" name="most_Important_Reason">
												<option value="volvo">Volvo</option>
												<option value="saab">Saab</option>
												<option value="fiat">Fiat</option>
												<option value="audi">Audi</option>
											</select>
										</div>
									</td>
									<td style="font-size: 18px; padding: 8px 0;">
										Comment:
									</td>
									<td>
										<input type="text" name="rank_Comment_1" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 270px;">
									</td>
								</tr>
								<tr>
									<td style="font-size: 18px; padding: 8px 0; width:35%;">
										Second Most Important Reason:
									</td>
									<td>
										<div class="selector-box">
											<select id="second_Most_Important_Reason" name="second_Most_Important_Reason">
												<option value="volvo">Volvo</option>
												<option value="saab">Saab</option>
												<option value="fiat">Fiat</option>
												<option value="audi">Audi</option>
											</select>
										</div>
									</td>
									<td style="font-size: 18px; padding: 8px 0;">
										Comment:
									</td>
									<td>
										<input type="text" name="rank_Comment_2" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 270px;">
									</td>
								</tr>
								<tr>
									<td style="font-size: 18px; padding: 8px 0; width:35%;">
										Third Most Important Reason:
									</td>
									<td>
										<div class="selector-box">
											<select id="third_Most_Important_Reason" name="third_Most_Important_Reason">
												<option value="volvo">Volvo</option>
												<option value="saab">Saab</option>
												<option value="fiat">Fiat</option>
												<option value="audi">Audi</option>
											</select>
										</div>
									</td>
									<td style="font-size: 18px; padding: 8px 0;">
										Comment:
									</td>
									<td>
										<input type="text" name="rank_Comment_3" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 270px;">
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td style="font-size: 18px; padding: 10px 0;">
							<b>If you attended the SI Open House, Student Visit Program, or any other Admissions event, we would appreciate any comments regarding your experience:</b>
						</td>
					</tr>
					<tr>
						<td class="text-main">
							<textarea name="visit" id="student_Visit_Program" cols="53" rows="4"></textarea>
						</td>
					</tr>
					<tr>
						<td style="font-size: 18px; padding: 10px 0;">

							<b>Please let us know your thoughts regarding the SI admissions process this year:</b>
						</td>
					</tr>
					<tr>
						<td class="text-main">
							<textarea name="admissions_process" id="admissions_process" cols="53" rows="4"></textarea>
						</td>
					</tr>
					<tr style="height: 20px;"></tr>
					<tr>
						<td style="padding: 10px;" width="50%" align="center">
							<a style="background-color: darkgrey; border: none; padding: 6px 8px; border-radius: 5px; width: 180px;" id="decline_Acceptance_to_SI" class="decline-btn">Decline Acceptance to SI</a>

							<a style="background-color: darkgrey; border: none; padding: 6px 8px; border-radius: 5px; width: 100px;" data-dismiss="modal" class="decline-btn1">Decide Later</a>
						</td>
						<td></td>
					</tr>
					<tr style="height: 20px;"></tr>

				</table>




			</div>

		</div>
	</div>
</div>';
}
function getAcceptanceModal(){
echo $modal ='<div class="modal fade" id="acceptanceServModal" tabindex="	<b>$</b>-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog survay-accept">
		<input type="hidden" name="modal_type" value="acceptance_survay">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><span style="color: #a7172f; font-size:22px;">Reserve TestFirst`s place in the Class of 2027 at SI!</span></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">

				<table width="100%" cellpadding="0" cellspacing="0" class="table-responsive">

					<tr>
						<td style="padding: 10px 0;">
							<p style="font-size: 18px;">Please answer the following questions to assist us in evaluating our admissions process and to complete your registration at St. Ignatius College Preparatory.</p>
						</td>
					</tr>
					<tr>
						<td style="font-size: 16px; padding: 10px 0;">
							<b>Please list, in order of preference, the schools to which you applied, the admission decision (accepted/wait listed/not accepted), and Financial Aid or scholarship information, if applicable:</b>

						</td>
					</tr>
					<tr>
						<td style="padding: 10px 0;">
							<table style="width: 100%;" cellpadding="1">
								<tr align="left">
									<th></th>
									<th style="font-weight: 400; font-size: 14px; padding: 0 5px;">Name of School</th>
									<th style="font-weight: 400; font-size: 14px; padding: 0 5px;">School`s Decision</th>
									<th style="font-weight: 400; font-size: 14px; padding: 0 5px;">Applied for Aid</th>
									<th style="font-weight: 400; font-size: 14px; padding: 0px 5px 0 30px;"></th>
									<th style="font-weight: 400; font-size: 14px; padding: 0 5px;" colspan="1">Amount of Aid or scholarship Offered</th>
									<th style="font-weight: 400; font-size: 14px; padding: 0 5px;">Comment</th>
								</tr>

								<tr>
									<td>
										1.
									</td>
									<td>
										<input type="text" name="name_of_School_1" style=" box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 150px;">
									</td>
									<td>
										<div class="selector-box">
											<select id="school_s_Decision_1" name="school_s_Decision_1">
												<option value="saab">Saab</option>
												<option value="fiat">Fiat</option>
												<option value="audi">Audi</option>
											</select>
										</div>
										<!-- <input type="number" style="border-radius: 5px; padding: 5px 10px; width: 120px;  box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;"> -->
									</td>
									<td>
										<div class="selector-box">
											<select id="applied_for_Aid_1" name="applied_for_Aid_1">
												<option value="volvo">Volvo</option>
												<option value="saab">Saab</option>
												<option value="fiat">Fiat</option>
												<option value="audi">Audi</option>
											</select>
										</div>
										<!-- <input type="number" style=" box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 100px;"> -->
									</td>
									<td style="text-align: center;">
										<b>$</b>
									</td>
									<td>
										<input type="text" name="amount_of_Aid_or_scholarship_Offered_1" style=" box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 100%;  max-width: 265px;">
									</td>
									<td>
										<input type="text" name="comment_1" style=" box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 200px;">
									</td>
								</tr>
								<tr>
									<td>
										2.
									</td>
									<td>
										<input type="text" name="name_of_School_2" style=" box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 150px;">
									</td>
									<td>
										<div class="selector-box">
											<select id="school_s_Decision_2" name="school_s_Decision_2">
												<option value="volvo">Volvo</option>
												<option value="saab">Saab</option>
												<option value="fiat">Fiat</option>
												<option value="audi">Audi</option>
											</select>
										</div>
										<!-- <input type="number" style="border-radius: 5px; padding: 5px 10px; width: 120px;  box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;"> -->
									</td>
									<td>
										<div class="selector-box">
											<select id="applied_for_Aid_2" name="applied_for_Aid_2">
												<option value="volvo">Volvo</option>
												<option value="saab">Saab</option>
												<option value="fiat">Fiat</option>
												<option value="audi">Audi</option>
											</select>
										</div>
										<!-- <input type="number" style=" box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 100px;"> -->
									</td>
									<td style="text-align: center;">
										<b>$</b>
									</td>
									<td><input type="text" name="amount_of_Aid_or_scholarship_Offered_2" style=" box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 100%;  max-width: 265px;">
									</td>
									<td>
										<input type="text" name="comment_2" style=" box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 200px;">
									</td>
								</tr>
								<tr>
									<td>
										3.
									</td>
									<td>
										<input type="text" name="name_of_School_3" style=" box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 150px;">
									</td>
									<td>
										<div class="selector-box">
											<select id="school_s_Decision_3" name="school_s_Decision_3">
												<option value="volvo">Volvo</option>
												<option value="saab">Saab</option>
												<option value="fiat">Fiat</option>
												<option value="audi">Audi</option>
											</select>
										</div>
										<!-- <input type="number" style="border-radius: 5px; padding: 5px 10px; width: 120px;  box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;"> -->
									</td>
									<td>
										<div class="selector-box">
											<select id="applied_for_Aid_3" name="applied_for_Aid_3">
												<option value="volvo">Volvo</option>
												<option value="saab">Saab</option>
												<option value="fiat">Fiat</option>
												<option value="audi">Audi</option>
											</select>
										</div>
										<!-- <input type="number" style=" box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 100px;"> -->
									</td>
									<td style="text-align: center;">
										<b>$</b>
									</td>
									<td><input type="text" name="amount_of_Aid_or_scholarship_Offered_3" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px;  width: 100%;  max-width: 265px;">
									</td>
									<td>
										<input type="text" name="comment_3" style=" box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 200px;">
									</td>
								</tr>
								<tr>
									<td>
										4.
									</td>
									<td>
										<input type="text" name="name_of_School_4" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 150px;">
									</td>
									<td>
										<div class="selector-box">
											<select id="school_s_Decision_4" name="school_s_Decision_4">
												<option value="volvo">Volvo</option>
												<option value="saab">Saab</option>
												<option value="fiat">Fiat</option>
												<option value="audi">Audi</option>
											</select>
										</div>
										<!-- <input type="number" style="border-radius: 5px; padding: 5px 10px; width: 120px;  box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;"> -->
									</td>
									<td>
										<div class="selector-box">
											<select id="applied_for_Aid_4" name="applied_for_Aid_4">
												<option value="volvo">Volvo</option>
												<option value="saab">Saab</option>
												<option value="fiat">Fiat</option>
												<option value="audi">Audi</option>
											</select>
										</div>
										<!-- <input type="number" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 100px;"> -->
									</td>

									<td style="text-align: center;">
										<b>$</b>
									</td>
									<td><input type="text" name="amount_of_Aid_or_scholarship_Offered_4" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 100%;  max-width: 265px;">
									</td>
									<td>
										<input type="text" name="comment_4" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 200px;">
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td style="font-size: 18px; padding: 10px 0;">
							<b>Rank the three most important reasons for not choosing SI:</b>
						</td>
					</tr>
					<tr>
						<td>
							<table style="width: 100%;" cellpadding="1">
								<tr>
									<td style="font-size: 18px; padding: 8px 0; width:30%;">
										Most Important Reason:
									</td>
									<td>
										<div class="selector-box">
											<select id="most_Important_Reason" name="most_Important_Reason">
												<option value="volvo">Volvo</option>
												<option value="saab">Saab</option>
												<option value="fiat">Fiat</option>
												<option value="audi">Audi</option>
											</select>
										</div>
										<!-- <input type="number" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 270px;"> -->
									</td>
									<td style="font-size: 18px; padding: 8px  10px 8px 0; text-align:right;">
										Comment:
									</td>
									<td>
										<input type="text" name="rank_Comment_1" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 270px;">
									</td>
								</tr>
								<tr>
									<td style="font-size: 18px; padding: 8px 0; width:30%;">
										Second Most Important Reason:
									</td>
									<td>
										<div class="selector-box">
											<select id="second_Most_Important_Reason" name="second_Most_Important_Reason">
												<option value="volvo">Volvo</option>
												<option value="saab">Saab</option>
												<option value="fiat">Fiat</option>
												<option value="audi">Audi</option>
											</select>
										</div>
										<!-- <input type="number" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 270px;"> -->
									</td>
									<td style="font-size: 18px; padding: 8px  10px 8px 0; text-align:right;">
										Comment:
									</td>
									<td>
										<input type="text" name="rank_Comment_2" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 270px;">
									</td>
								</tr>
								<tr>
									<td style="font-size: 18px; padding: 8px 0; width:30%;">
										Third Most Important Reason:
									</td>
									<td>
										<div class="selector-box">
											<select id="third_Most_Important_Reason" name="third_Most_Important_Reason">
												<option value="volvo">Volvo</option>
												<option value="saab">Saab</option>
												<option value="fiat">Fiat</option>
												<option value="audi">Audi</option>
											</select>
										</div>
										<!-- <input type="number" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 270px;"> -->
									</td>
									<td style="font-size: 18px; padding: 8px  10px 8px 0; text-align:right;">
										Comment:
									</td>
									<td>
										<input type="text" name="rank_Comment_3" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; padding: 5px 10px; width: 270px;">
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td style="font-size: 18px; padding: 10px 0;">
							<b>If you attended the SI Open House, Student Visit Program, or any other Admissions event, we would appreciate any comments regarding your experience:</b>
						</td>
					</tr>
					<tr>
						<td class="text-main">
							<textarea name="student_Visit_Program" id="student_Visit_Program" cols="53" rows="4"></textarea>
						</td>
					</tr>
					<tr>
						<td style="font-size: 18px; padding: 10px 0;">
							<b>Please let us know your thoughts regarding the SI admissions process this year:</b>
						</td>
					</tr>
					<tr>
						<td class="text-main">
							<textarea name="admissions_process" id="admissions_process" cols="53" rows="4"></textarea>
						</td>
					</tr>
					<tr>
						<td style="padding: 20px 0;" align="center" width="50%">
							<a class="btn btn-secondary" id="submit_acceptance_survey">Continue</a>
						</td>

					</tr>

				</table>




			</div>

		</div>
	</div>
</div>';
}
@endphp


@endsection