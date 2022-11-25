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
                Hi <span>{{ $data['name'] }},</span></h2>
        </div>
        <div class="all-txt">
            <p
                style="font-size:16px;font-style:normal;font-weight: 400;letter-spacing: 0.2px;;margin:0;line-height: 22px;margin-bottom: 25px;">
                You have been invited by <b>{{ $data['user_full_name'] }}</b> to submit a recommendation for
                <b>{{ $data['student'] }}</b> as part of his application to St. Ignatius College Preparatory. <br><br>
                {{ $data['message'] }}
            </p>
            <p
                style="font-size:16px;font-style:normal;font-weight: 400;letter-spacing: 0.2px;;margin:0;line-height: 22px; margin-bottom: 25px;">
                To write a recommendation, please click on this link <a style="text-decoration: none;color: blue;"
                    href="{{ route('written-recommendation', encrypt($data['recommendation_id'])) }}"
                    style="padding-left: 5px;">{{ route('written-recommendation', encrypt($data['recommendation_id'])) }}</a>.
            </p>
            <p
                style="font-size:16px;font-style:normal;font-weight: 400;letter-spacing: 0.2px;;margin:0;line-height: 22px; margin-bottom: 25px;">
                <b>NOTE:</b> St. Ignatius College Preparatory must receive all supplemental recommendations by the end
                of the
                day on Thursday, December 15, 2022.
            </p>
            <h4
                style="font-size:17px;font-style:normal;font-weight: 600;letter-spacing: 0.6px;margin:0;line-height: 25px;margin-bottom: 10px;">
                Regards,</h4>
            <h6
                style="font-size:17px;font-style:normal;font-weight: 600;letter-spacing: 0.6px;margin:0;line-height: 25px;">
                SI Admissions</h6>
        </div>
    </div>
</div>
