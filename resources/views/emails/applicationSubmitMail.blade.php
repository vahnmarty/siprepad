<div class="email-template-main-sec" style="margin-top: 100px; margin-bottom: 50px;">
    <div class="email-template"
        style="max-width: 75%;
    margin: 0 auto;
    box-shadow: 0 0 20px #adadad;
    padding: 30px;
    border-radius: 10px;
    text-align: center;">
        <IMG SRC = "{{ asset('frontend_assets/images/lg2.png') }}" alt="" /><BR>
            
        <div class="heading" style="padding-bottom: 20px;">
                
            <h2
                style="font-size:20px;font-style:normal;font-weight: 600;letter-spacing: 0.9px;margin:0;line-height: 25px;">
                Hi {{ $data['user_first_name'] }},</h2>
        </div>
        <div class="all-txt">
            <p style="font-size: 18px;letter-spacing: 0.2px;"><span style="font-weight: 700;">Applicant Name: </span>
                {{ implode(', ', $data['applicant_name']) }}</p>
            <p
                style="font-size:16px;font-style:normal;font-weight: 400;letter-spacing: 0.2px;;margin:0;line-height: 22px;margin-bottom: 25px;">
                Thank you for submitting your application to St. Ignatius College Preparatory.
            </p>

            <p
                style="font-size:16px;font-style:normal;font-weight: 400;letter-spacing: 0.2px;;margin:0;line-height: 22px;margin-bottom: 25px;">
                If you have any questions regarding the Admissions process, please visit our website at <a
                    href="https://www.siprep.org/admissions"
                    style="padding-left: 5px;color: blue;">https://www.siprep.org/admissions</a> or email us at <a
                    href="mailto:admissions@siprep.org" style="padding-left: 5px;color: blue;">admissions@siprep.org.</a>

            <h4
                style="font-size:17px;font-style:normal;font-weight: 600;letter-spacing: 0.6px;margin:0;line-height: 25px;margin-bottom: 10px;">
                Regards,</h4>
            <h6
                style="font-size:17px;font-style:normal;font-weight: 600;letter-spacing: 0.6px;margin:0;line-height: 25px;">
                SI Admissions</h6><BR><BR><BR>

            <p style="font-size:12px;font-style:normal;font-weight: 400;letter-spacing: 0.2px;;margin:0;line-height: 20px;margin-bottom:10px;">
        		Admissions Office<BR>
	        	St. Ignatius College Preparatory<BR>
		        2001 37th Avenue<BR>
		        San Francisco, CA 94116<BR>
		        (415) 731-7500 ext. 5274<BR>
		    </p>
        </div>
    </div>
</div>
