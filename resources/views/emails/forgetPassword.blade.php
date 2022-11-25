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
                Hi,</h2>
        </div>
        <div class="all-txt">
            <p
                style="font-size:16px;font-style:normal;font-weight: 400;letter-spacing: 0.2px;;margin:0;line-height: 22px;margin-bottom: 25px;">
                We've received a request to reset your SI Admissions Portal password. To change your password, go to: <a
                    style="text-decoration: none;color: blue;"
                    href="{{ route('reset.password.get', ['token' => $token]) }}">{{ route('reset.password.get', ['token' => $token]) }}</a>
            </p>
            <p
                style="font-size:16px;font-style:normal;font-weight: 400;letter-spacing: 0.2px;;margin:0;line-height: 22px; margin-bottom: 25px;">
                If you did not make this request, please contact <a style="text-decoration: none;color: blue;"
                    href="mailto:admissions@siprep.org" style="padding-left: 5px;">admissions@siprep.org</a>.</p>
            <h4
                style="font-size:17px;font-style:normal;font-weight: 600;letter-spacing: 0.6px;margin:0;line-height: 25px;margin-bottom: 10px;">
                Regards,</h4>
            <h6
                style="font-size:17px;font-style:normal;font-weight: 600;letter-spacing: 0.6px;margin:0;line-height: 25px;">
                SI Admissions</h6>
        </div>
    </div>
</div>
