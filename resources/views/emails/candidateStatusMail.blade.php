<div class="email-template-main-sec" style="margin-top: 100px; margin-bottom: 50px;">
    <div class="email-template"
        style="max-width: 75%;
    margin: 0 auto;
    box-shadow: 0 0 20px #adadad;
    padding: 30px;
    border-radius: 10px;">
        <div class="heading" style="padding-bottom: 20px;">
            <h2
                style="font-size:20px;font-style:normal;font-weight: 600;letter-spacing: 0.9px;margin:0;line-height: 25px;">
                Hi, {{ $parent->P1_First_Name }} {{ $parent->P1_Last_Name }},</h2>
        </div>
        <div class="all-txt">
            @if($status == 1)
            	<p
                    style="font-size:16px;font-style:normal;font-weight: 400;letter-spacing: 0.2px;;margin:0;line-height: 22px;margin-bottom: 25px;">
                    Congratulations, Your child {{ $student->S1_First_Name }} {{ $student->S1_Last_Name }} has accepted the proposal of joining our university. 
                    So, Kindly Click on the button given below to do payment.
                </p>
            @else
            	<p
                    style="font-size:16px;font-style:normal;font-weight: 400;letter-spacing: 0.2px;;margin:0;line-height: 22px;margin-bottom: 25px;">
                    Sorry, Your child {{ $student->S1_First_Name }} {{ $student->S1_Last_Name }} has rejected the proposal of joining our university. 
                    Thankyou for your precious time.
                </p> 
            @endif
        </div>
    </div>
</div>