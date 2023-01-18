<?php

use App\Rules\MaxWordsRule;

$base_url =  config('app.url');

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute must be accepted.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute may only contain letters.',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute may only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The new :attribute and confirm password do not match',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'The :attribute must be a valid email address.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file' => 'The :attribute may not be greater than :max kilobytes.',
        'string' => 'The :attribute may not be greater than :max characters.',
        'array' => 'The :attribute may not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min characters.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'multiple_of' => 'The :attribute must be a multiple of :value',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'password' => 'The password is incorrect.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute format is invalid.',
    'uuid' => 'The :attribute must be a valid UUID.',

    //
    'password_match' => "Old and new passwords should not be the same.",
    'password_used' => "You've already used this password. Please use another password.",

    'credit_card' => [
        'card_invalid' => 'Invalid card',
        'card_pattern_invalid' => 'Invalid card number',
        'card_length_invalid' => 'Invalid card number',
        'card_checksum_invalid' => 'Invalid card number',
        'card_expiration_year_invalid' => 'Invalid expiration year',
        'card_expiration_month_invalid' => 'Invalid expiration month',
        'card_cvc_invalid' => 'Invalid CVV'
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        // 'attribute-name' => [
        //     'rule-name' => 'custom-message',
        // ],

        //Application Step One
        'inputs.*.Photo.required' => 'Photo is required',
        'inputs.*.New_Photo.required' => 'Photo is required',
        'inputs.*.First_Name.required' => 'First name is required',
        'inputs.*.Last_Name.required' => 'Last name is required',
        'inputs.*.Birthdate.required' => 'Date of birth is required',
        'inputs.*.Gender.required' =>    'Gender is required',
        'inputs.*.Personal_Email.required' => 'Email is required',
        'inputs.*.Personal_Email.email' => 'Please enter a valid email address',
        'inputs.*.Mobile_Phone.min' => 'Mobile phone number must be 10 digits',
        'inputs.*.Race.required' =>      'Race is required',
        'inputs.*.Ethnicity.required' => 'Ethnicity is required',
        'inputs.*.Current_School.required' =>    'Current school is required',
        'inputs.*.Current_School_Not_Listed.required_if' => 'Current school is required',

        //Application Step Two
        'addressInfo.*.Country.required' => 'Country is required',
        'addressInfo.*.Address.required' => 'Address is required',
        'addressInfo.*.City.required' => 'City is required',
        'addressInfo.*.State.required' => 'State is required',
        'addressInfo.*.Zipcode.required' => 'Zipcode is required',
        'addressInfo.*.Address_Phone.required' => 'Phone number is required',
        'addressInfo.*.Address_Phone.min' => 'Phone number must be 10 digits',

        //Application Step Three
        'parentInfo.*.Relationship.required' => 'Relationship is required',
        'parentInfo.*.First_Name.required' => 'First name is required',
        'parentInfo.*.Last_Name.required' => 'Last name is required',
        'parentInfo.*.Address_Type.required' => 'Address location is required ',
        'parentInfo.*.Mobile_Phone.required' => 'Mobile phone is required',
        'parentInfo.*.Mobile_Phone.min' => 'Moblie phone number must be 10 digits',
        'parentInfo.*.Personal_Email.required' => 'Email is required',
        'parentInfo.*.Personal_Email.email' => 'Please enter a valid email address',
        'parentInfo.*.Schools.required' => 'This field is required',
        'parentInfo.*.Living_Situation.required' => 'Living situation is required',
        'parentInfo.*.Work_Phone.min' => 'Work phone number must be 10 digits',

        //Application Step Six
        'Why_SI_for_Child.required' => 'This field is required',
        'Why_SI_for_Child.max' => 'Your answer cannot be longer than 75 characters',

        'Parent_Statement_Submitted_By.required' => 'This field is required',
        'Parent_Statement_Submitted_By.max' => 'Your answer cannot be longer than 40 characters',

        'Parent_Statement_Relationship.required' => 'This field is required',
        'Parent_Statement_Relationship.max' => 'Your answer cannot be longer than 40 characters',

        'parentStatement.0.S1_Endearing_Quality_and_Growth.required' => 'This field is required',
        'parentStatement.0.S1_Endearing_Quality_and_Growth.max' => 'Your answer cannot be longer than 75 characters',
        'parentStatement.0.S1_About_Child_Not_on_App.required' => 'This field is required',
        'parentStatement.0.S1_About_Child_Not_on_App.max' => 'Your answer cannot be longer than 75 characters',

        'parentStatement.1.S2_Endearing_Quality_and_Growth.required' => 'This field is required',
        'parentStatement.1.S2_Endearing_Quality_and_Growth.max' => 'Your answer cannot be longer than 75 characters',
        'parentStatement.1.S2_About_Child_Not_on_App.required' => 'This field is required',
        'parentStatement.1.S2_About_Child_Not_on_App.max' => 'Your answer cannot be longer than 75 characters',

        'parentStatement.2.S3_Endearing_Quality_and_Growth.required' => 'This field is required',
        'parentStatement.2.S3_Endearing_Quality_and_Growth.max' => 'Your answer cannot be longer than 75 characters',
        'parentStatement.2.S3_About_Child_Not_on_App.required' => 'This field is required',
        'parentStatement.2.S3_About_Child_Not_on_App.max' => 'Your answer cannot be longer than 75 characters',

        //Application Step Seven
        'spiritualCommunityInfo.Applicant_Religion.required' => 'This field is required',
        'spiritualCommunityInfo.Impact_to_Community.required' => 'This field is required',
       // 'spiritualCommunityInfo.Impact_to_Community.max' => 'Your answer cannot be longer than 75 characters',
        'spiritualCommunityInfo.Describe_Family_Spirituality.required' => 'This field is required',
        'spiritualCommunityInfo.Describe_Practice_in_Detail.required' => 'This field is required',
       // 'spiritualCommunityInfo.Describe_Practice_in_Detail.max' => 'Your answer cannot be longer than 75 characters',
        'spiritualCommunityInfo.Religious_Studies_Classes.required' => 'This field is required',
        'spiritualCommunityInfo.School_Liturgies.required' => 'This field is required',
        'spiritualCommunityInfo.Retreats.required' => 'This field is required',
        'spiritualCommunityInfo.Community_Service.required' => 'This field is required',
        'spiritualCommunityInfo.Religious_Form_Submitted_By.required' => 'This field is required',
        'spiritualCommunityInfo.Religious_Form_Relationship.required' => 'This field is required',

        'spiritualCommunityInfo.Students.0.S1_Baptism_Year.required' => 'This field is required',
        'spiritualCommunityInfo.Students.0.S1_Confirmation_Year.required' => 'This field is required',
        'spiritualCommunityInfo.Students.1.S2_Baptism_Year.required' => 'This field is required',
        'spiritualCommunityInfo.Students.1.S2_Confirmation_Year.required' => 'This field is required',
        'spiritualCommunityInfo.Students.2.S3_Baptism_Year.required' => 'This field is required',
        'spiritualCommunityInfo.Students.2.S3_Confirmation_Year.required' => 'This field is required',

        //Application Step Eight
        'studentStatementInfo.Students_Statement.0.S1_Why_did_you_decide_to_apply_to_SI.required' => 'This field is required',
        'studentStatementInfo.Students_Statement.0.S1_Why_did_you_decide_to_apply_to_SI.max' => 'Your answer cannot be longer than 75 characters',
        'studentStatementInfo.Students_Statement.0.S1_Greatest_Challenge.required' => 'This field is required',
        'studentStatementInfo.Students_Statement.0.S1_Greatest_Challenge.max' => 'Your answer cannot be longer than 75 characters',
        'studentStatementInfo.Students_Statement.0.S1_Religious_Activities_for_Growth.required' => 'This field is required',
        'studentStatementInfo.Students_Statement.0.S1_Religious_Activities_for_Growth.max' => 'Your answer cannot be longer than 75 characters',
        'studentStatementInfo.Students_Statement.0.S1_Favorite_and_most_difficult_subjects.required' => 'This field is required',
        'studentStatementInfo.Students_Statement.0.S1_Favorite_and_most_difficult_subjects.max' => 'Your answer cannot be longer than 75 characters',

        'studentStatementInfo.Students_Statement.1.S2_Why_did_you_decide_to_apply_to_SI.required' => 'This field is required',
        'studentStatementInfo.Students_Statement.1.S2_Why_did_you_decide_to_apply_to_SI.max' => 'Your answer cannot be longer than 75 characters',
        'studentStatementInfo.Students_Statement.1.S2_Greatest_Challenge.required' => 'This field is required',
        'studentStatementInfo.Students_Statement.1.S2_Greatest_Challenge.max' => 'Your answer cannot be longer than 75 characters',
        'studentStatementInfo.Students_Statement.1.S2_Religious_Activities_for_Growth.required' => 'This field is required',
        'studentStatementInfo.Students_Statement.1.S2_Religious_Activities_for_Growth.max' => 'Your answer cannot be longer than 75 characters',
        'studentStatementInfo.Students_Statement.1.S2_Favorite_and_most_difficult_subjects.required' => 'This field is required',
        'studentStatementInfo.Students_Statement.1.S2_Favorite_and_most_difficult_subjects.max' => 'Your answer cannot be longer than 75 characters',

        'studentStatementInfo.Students_Statement.2.S3_Why_did_you_decide_to_apply_to_SI.required' => 'This field is required',
        'studentStatementInfo.Students_Statement.2.S3_Why_did_you_decide_to_apply_to_SI.max' => 'Your answer cannot be longer than 75 characters',
        'studentStatementInfo.Students_Statement.2.S3_Greatest_Challenge.required' => 'This field is required',
        'studentStatementInfo.Students_Statement.2.S3_Greatest_Challenge.max' => 'Your answer cannot be longer than 75 characters',
        'studentStatementInfo.Students_Statement.2.S3_Religious_Activities_for_Growth.required' => 'This field is required',
        'studentStatementInfo.Students_Statement.2.S3_Religious_Activities_for_Growth.max' => 'Your answer cannot be longer than 75 characters',
        'studentStatementInfo.Students_Statement.2.S3_Favorite_and_most_difficult_subjects.required' => 'This field is required',
        'studentStatementInfo.Students_Statement.2.S3_Favorite_and_most_difficult_subjects.max' => 'Your answer cannot be longer than 75 characters',

        'studentStatementInfo.Future_Activities.0.S1_Most_Passionate_Activity.required' => 'This field is required',
        'studentStatementInfo.Future_Activities.0.S1_Most_Passionate_Activity.max' => 'Your answer cannot be longer than 75 characters',
        'studentStatementInfo.Future_Activities.0.S1_Extracurricular_Activity_at_SI.required' => 'This field is required',
        'studentStatementInfo.Future_Activities.0.S1_Extracurricular_Activity_at_SI.max' => 'Your answer cannot be longer than 75 characters',
        'studentStatementInfo.Future_Activities.1.S2_Most_Passionate_Activity.required' => 'This field is required',
        'studentStatementInfo.Future_Activities.1.S2_Most_Passionate_Activity.max' => 'Your answer cannot be longer than 75 characters',
        'studentStatementInfo.Future_Activities.1.S2_Extracurricular_Activity_at_SI.required' => 'This field is required',
        'studentStatementInfo.Future_Activities.1.S2_Extracurricular_Activity_at_SI.max' => 'Your answer cannot be longer than 75 characters',
        'studentStatementInfo.Future_Activities.2.S3_Most_Passionate_Activity.required' => 'This field is required',
        'studentStatementInfo.Future_Activities.2.S3_Most_Passionate_Activity.max' => 'Your answer cannot be longer than 75 characters',
        'studentStatementInfo.Future_Activities.2.S3_Extracurricular_Activity_at_SI.required' => 'This field is required',
        'studentStatementInfo.Future_Activities.2.S3_Extracurricular_Activity_at_SI.max' => 'Your answer cannot be longer than 75 characters',

        //Application Step Nine
        'writingSample.0.S1_Writing_Sample.required' => "This field is required",
        'writingSample.0.S1_Writing_Sample_Submitted_By.required' => "This field is required",
        'writingSample.0.S1_Writing_Sample_Acknowledgment.accepted' => "This checkbox is required",

        'writingSample.1.S2_Writing_Sample.required' => "This field is required",
        'writingSample.1.S2_Writing_Sample_Submitted_By.required' => "This field is required",
        'writingSample.1.S2_Writing_Sample_Acknowledgment.accepted' => "This checkbox is required",

        'writingSample.2.S3_Writing_Sample.required' => "This field is required",
        'writingSample.2.S3_Writing_Sample_Submitted_By.required' => "This field is required",
        'writingSample.2.S3_Writing_Sample_Acknowledgment.accepted' => "This checkbox is required",

        //Application Step Ten
        'releaseAuthorization.EntranceExamInfo.0.S1_Entrance_Exam_Reservation.required' => 'This field is required',
        'releaseAuthorization.EntranceExamInfo.0.S1_Other_Catholic_School_Name.required' => 'This field is required',
        'releaseAuthorization.EntranceExamInfo.0.S1_Other_Catholic_School_Location.required' => 'This field is required',
        'releaseAuthorization.EntranceExamInfo.0.S1_Other_Catholic_School_Date.required' => 'This field is required',

        'releaseAuthorization.EntranceExamInfo.1.S2_Entrance_Exam_Reservation.required' => 'This field is required',
        'releaseAuthorization.EntranceExamInfo.1.S2_Other_Catholic_School_Name.required' => 'This field is required',
        'releaseAuthorization.EntranceExamInfo.1.S2_Other_Catholic_School_Location.required' => 'This field is required',
        'releaseAuthorization.EntranceExamInfo.1.S2_Other_Catholic_School_Date.required' => 'This field is required',

        'releaseAuthorization.EntranceExamInfo.2.S3_Entrance_Exam_Reservation.required' => 'This field is required',
        'releaseAuthorization.EntranceExamInfo.2.S3_Other_Catholic_School_Name.required' => 'This field is required',
        'releaseAuthorization.EntranceExamInfo.2.S3_Other_Catholic_School_Location.required' => 'This field is required',
        'releaseAuthorization.EntranceExamInfo.2.S3_Other_Catholic_School_Date.required' => 'This field is required',

        'releaseAuthorization.Agree_to_release_record.accepted' => 'This checkbox is required',
        'releaseAuthorization.Agree_to_record_is_true.accepted' => 'This checkbox is required',

        'card_number.required' => 'Card number is required',
        'card_number.min' => 'Card number must be of at least 15 digits',
        'card_number.max' => 'Card number cannot be greater than 16 digits',
        'card_holder_name.required' => 'Holder name is required',
        'card_cvv.required' => 'CVV is required',
        'card_cvv.min' => 'CVV must be of at least 3 digits',
        'card_cvv.max' => 'CVV cannot be greater than 4 digits',
        'card_exp_mm.required' => 'Exp month is required',
        'card_exp_yy.required' => 'Exp year is required',
        'first_name.required' => 'First name is required',
        'last_name.required' => 'Last name is required',
        'billing_address.required' => 'Billing address is required',
        'billing_city.required' => 'Billing city is required',
        'billing_state.required' => 'Billing state is required',
        'billing_zip_code.required' => 'Billing zip code is required',

        //Email
        'email.required' => 'Email is required',
        'email.email' => 'Please enter a valid email address',
        'email.unique' => "This email already exists.&nbsp;&nbsp;<a style='color:blue' href='$base_url/forgot-password'>Forgot password?</a>",
        'email.exists' => "Email is not in the system.&nbsp;&nbsp;<a href='$base_url/register'>Create account?</a>",

        //Password and confirm password
        'password.required' => 'Password is required',
        'password.regex' => 'The password does not meet the criteria stated above',
        'password.min' => 'The password must be at least 8 characters',
        'password.max' => 'The password may not be greater than 16 characters',
        'confirm_password.required' => 'Confirm password is required',
        'confirm_password.same' => 'Password and confirm password do not match. Please re-enter password and confirm.',
        'password_confirmation.required' => 'Confirm password is required',
        'old_password.required' => 'Old password is required',
        'new_password.required' => 'New password is required',
        'new_password.regex' => 'New password does not meet the criteria stated above ',
        //'confirm_password.same' => 'New password and confirm password do not match',
        'new_password.regex' => 'New password does not meet the criteria stated above ',


        //
        'name.required' => 'Name is required',
        'student.required' => 'A student is required',
        'message.required' => 'Message is required',
        //
        'relationStudent.required' => 'The Relationship to Student field is required',
        'yearStudent.required' => 'The Years Known Student field is required',
        'recommen.required' => 'The Recommendation field is required',
        //
        'promo_code.required' => 'Promo code field is required.',
        //
        'Pro_First_Name.required' => 'First name is required',
        'Pro_Last_Name.required' => 'Last name is required',
        'Pro_Mobile.required' => 'Phone is required',
        'Pro_Mobile.numeric' => 'Phone is required',
        'Pro_Mobile.min' => 'Mobile phone number must be at least 10 digits'
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

    'values' => [
        'login_email' => [
            'required' => 'Username/Email is required',
        ],
        'register_email' => [
            'required' => 'Parent/Guardian email is required',
        ],
        'login_email_username' => [
            'exists' => 'The username/email is not in the system.  Click below to create an account or retrieve your username.',
        ],
        'first_name' => [
            'required' => 'Parent/Guardian first name is required',
        ],
        'last_name' => [
            'required' => 'Parent/Guardian last name is required',
        ],
        'edit_profile_email' => [
            'unique' => 'This email already exists',
        ]
    ],

];
