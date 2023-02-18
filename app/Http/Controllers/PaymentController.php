<?php

namespace App\Http\Controllers;

use App\Models\Notification;

use App\Models\Payment;
use Illuminate\Http\Request;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Application;
use App\Models\StudentInformation;


class PaymentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth'); // later enable it when needed user login while payment
    }

    // start page form after start
    public function pay()
    {
        return view('pay');
    }

    public function handleonlinepay(Request $request)
    {
        $input = $request->input();

        //dd($input);

        /* Create a merchantAuthenticationType object with authentication details
          retrieved from the constants file */
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(env('MERCHANT_LOGIN_ID'));
        $merchantAuthentication->setTransactionKey(env('MERCHANT_TRANSACTION_KEY'));

        // Set the transaction's refId
        $refId = 'ref' . time();
        $cardNumber = preg_replace('/\s+/', '', $input['cardNumber']);

        // Create the payment data for a credit card
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($cardNumber);
        $creditCard->setExpirationDate($input['expiration-year'] . "-" . $input['expiration-month']);
        $creditCard->setCardCode($input['cvv']);

        // Add the payment data to a paymentType object
        $paymentOne = new AnetAPI\PaymentType();
        $paymentOne->setCreditCard($creditCard);

        // Create a TransactionRequestType object and add the previous objects to it
        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("authCaptureTransaction");
        $transactionRequestType->setAmount($input['amount']);
        $transactionRequestType->setPayment($paymentOne);

        // Assemble the complete transaction request
        $requests = new AnetAPI\CreateTransactionRequest();
        $requests->setMerchantAuthentication($merchantAuthentication);
        $requests->setRefId($refId);
        $requests->setTransactionRequest($transactionRequestType);

        // Create the controller and get the response
        $controller = new AnetController\CreateTransactionController($requests);
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);

        //dd($response);

        if ($response != null) {
            // Check to see if the API request was successfully received and acted upon
            if ($response->getMessages()->getResultCode() == "Ok") {
                // Since the API request was successful, look for a transaction response
                // and parse it to display the results of authorizing the card
                $tresponse = $response->getTransactionResponse();

                if ($tresponse != null && $tresponse->getMessages() != null) {
                    //                    echo " Successfully created transaction with Transaction ID: " . $tresponse->getTransId() . "\n";
                    //                    echo " Transaction Response Code: " . $tresponse->getResponseCode() . "\n";
                    //                    echo " Message Code: " . $tresponse->getMessages()[0]->getCode() . "\n";
                    //                    echo " Auth Code: " . $tresponse->getAuthCode() . "\n";
                    //                    echo " Description: " . $tresponse->getMessages()[0]->getDescription() . "\n";
                    $message_text = $tresponse->getMessages()[0]->getDescription() . ", Transaction ID: " . $tresponse->getTransId();
                    $msg_type = "success";

                    Payment::create([
                        'amount' => $input['amount'],
                        'response_code' => $tresponse->getResponseCode(),
                        'transaction_id' => $tresponse->getTransId(),
                        'auth_id' => $tresponse->getAuthCode(),
                        'message_code' => $tresponse->getMessages()[0]->getCode(),
                        'name_on_card' => trim($input['owner']),
                        'quantity' => 1
                    ]);
                } else {
                    $message_text = 'There were some issues with the payment.  Please try again later.';
                    $msg_type = "error";

                    if ($tresponse->getErrors() != null) {
                        $message_text = $tresponse->getErrors()[0]->getErrorText();
                        $msg_type = "error";
                    }
                }
                // Or, print errors if the API request wasn't successful
            } else {
                $message_text = 'There were some issues with the payment.  Please try again later.';
                $msg_type = "error";

                $tresponse = $response->getTransactionResponse();

                if ($tresponse != null && $tresponse->getErrors() != null) {
                    $message_text = $tresponse->getErrors()[0]->getErrorText();
                    $msg_type = "error";
                } else {
                    $message_text = $response->getMessages()->getMessage()[0]->getText();
                    $msg_type = "error";
                }
            }
        } else {
            $message_text = "No response returned";
            $msg_type = "error";
        }
        return back()->with($msg_type, $message_text);
    }

    public function acceptPayment(Request $request)
    {

        $id = $request->post('studendId');
        $validator      =   Validator::make($request->all(), [
            "first_name"  =>      "required",
            "last_name"   =>      "required",
            "email"  =>      "required|email",
            "card_number"   =>      "required|max:16|min:14",
            "card_cvv"  =>      "required|max:3|min:3",
            "card_exp_mm"   =>      "required|integer|max:12|min:1",
            "card_exp_yy"  =>      "required|integer",
            "billing_address"   =>      "required",
            "billing_city"  =>      "required",
            "billing_state"   =>      "required",
            "billing_zip_code"   =>      "required|integer",
        ]);
        if ($validator->fails()) {
            $imploded = array();
            foreach (json_decode($validator->errors(), true) as $array) {
                $imploded[] = implode('~', $array);
            }
            $validatorError = implode(" & ", $imploded);
            $data['message'] = $validatorError;
            $data['status'] = "error";
            return $data;
        } else {
            $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
            $merchantAuthentication->setName(Payment::CARDAPIUSERNAME);
            $merchantAuthentication->setTransactionKey(Payment::CARDAPITRANSACTION);
            // Set the transaction's refId
            $refId = 'ref' . time();
            $cardNumber = preg_replace('/\s+/', '', $request->card_number);

            // Create the payment data for a credit card
            $creditCard = new AnetAPI\CreditCardType();
            $creditCard->setCardNumber($cardNumber);
            $creditCard->setExpirationDate($request['card_exp_yy'] . "-" . $request['card_exp_mm']);
            $creditCard->setCardCode($request['card_cvv']);

            // Add the payment data to a paymentType object
            $paymentOne = new AnetAPI\PaymentType();
            $paymentOne->setCreditCard($creditCard);

            // Create order information
            $invoice_number = "AppFee_" . Auth::guard('customer')->user()->id;
            $order = new AnetAPI\OrderType();
            $order->setInvoiceNumber($invoice_number);
            $order->setDescription("Payment For Admission Application Submit");

            // Set the customer's Bill To address
            $customerAddress = new AnetAPI\CustomerAddressType();
            $customerAddress->setFirstName($request['first_name']);
            $customerAddress->setLastName($request['last_name']);
            //$customerAddress->setEmail($input['email']);
            //$customerAddress->setCompany("Souveniropolis");
            $customerAddress->setAddress($request['billing_address']);
            $customerAddress->setCity($request['billing_city']);
            $customerAddress->setState($request['billing_state']);
            $customerAddress->setZip($request['billing_zip_code']);
            $customerAddress->setCountry("USA");

            // Create a TransactionRequestType object and add the previous objects to it
            $transactionRequestType = new AnetAPI\TransactionRequestType();
            $transactionRequestType->setTransactionType("authCaptureTransaction");
            $pay_amount = Payment::PAYAMOUNT;
            $transactionRequestType->setAmount($pay_amount);
            $transactionRequestType->setOrder($order);
            $transactionRequestType->setPayment($paymentOne);
            $transactionRequestType->setBillTo($customerAddress);

            // Assemble the complete transaction request
            $requests = new AnetAPI\CreateTransactionRequest();
            $requests->setMerchantAuthentication($merchantAuthentication);
            $requests->setRefId($refId);
            $requests->setTransactionRequest($transactionRequestType);
            // Create the controller and get the response

            $controller = new AnetController\CreateTransactionController($requests);
            $server = config('app.env');


            if ($server == 'production') {
                $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
            } else {
                $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
            }

            $results = $this->createOrUpdate($response, $request, $id, $pay_amount);

            return $results;
        }
    }
    private function createOrUpdate($response, $request, $id, $pay_amount)
    {

        $profile_id = Auth::guard('customer')->user()->id;
        $getApplication = Application::where('Profile_ID', $profile_id)->first();
        $application_id = $getApplication->Application_ID;
        $student = StudentInformation::where('Application_ID', $application_id)->first();
        $ntfDetail = Notification::where('id', $id)->first();

        if ($ntfDetail->student_profile == 'student_one') {
            $studentname = StudentInformation::where('Application_ID', $ntfDetail->application_id)->select('S1_First_Name', 'S1_Last_name', 'S1_Personal_Email', 'S1_Birthdate')->first();
            $name = ucfirst($studentname->S1_First_Name) . ' ' . ucfirst($studentname->S1_Last_name);
            $email = $studentname->S1_Personal_Email;
            $DOB = $studentname->S1_Birthdate;
            $student_type = 's1';
        }
        if ($ntfDetail->student_profile == 'student_two') {
            $studentname = StudentInformation::where('Application_ID', $ntfDetail->application_id)->select('S2_First_Name', 'S2_Last_name', 'S2_Personal_Email', 'S2_Birthdate')->first();
            $name = ucfirst($studentname->S2_First_Name) . ' ' . ucfirst($studentname->S2_Last_name);
            $email = $studentname->S2_Personal_Email;
            $DOB = $studentname->S2_Birthdate;
            $student_type = 's2';
        }
        if ($ntfDetail->student_profile == 'student_three') {
            $studentname = StudentInformation::where('Application_ID', $ntfDetail->application_id)->select('S3_First_Name', 'S3_Last_name', 'S3_Personal_Email', 'S3_Birthdate')->first();
            $name = ucfirst($studentname->S3_First_Name) . ' ' . ucfirst($studentname->S3_Last_name);
            $email = $studentname->S3_Personal_Email;
            $DOB = $studentname->S3_Birthdate;
            $student_type = 's3';
        }
        if ($response != null) {
            if ($response->getMessages()->getResultCode() == "Ok") {
                $tresponse = $response->getTransactionResponse();
                if ($tresponse != null && $tresponse->getMessages() != null) {
                    $data['message'] = "Your payment is successfull";
                    $data['status'] = "success";

                    Payment::create([
                        'user_id' => Auth::guard('customer')->user()->id,
                        'application_id' => $application_id,
                        'amount' => $pay_amount,
                        'response_code' => $tresponse->getResponseCode(),
                        'transaction_id' => $tresponse->getTransId(),
                        'auth_id' => $tresponse->getAuthCode(),
                        'message_code' => $tresponse->getMessages()[0]->getCode(),
                        'name_on_card' => trim($request['first_name'] . $request['last_name']),
                        'quantity' => 1,
                        'student_name' => $name,
                        'student_email' => $email,
                        'student_dob' => $DOB,
                        'student' => $student_type

                    ]);

                    Application::where('Application_ID', $application_id)->where('Profile_ID', Auth::guard('customer')->user()->id)->update(['last_step_complete' => 'ten']);
                    $transaction_id = $tresponse->getTransId();
                    $is_patment_compleate = true;
                    $is_button_clicked = false;
                } else {
                    $is_button_clicked = false;
                    $data['message'] = 'There were some issue with the payment. Please try again later.';
                    $data['status'] = "error";

                    if ($tresponse->getErrors() != null) {
                        $data['message'] = $tresponse->getErrors()[0]->getErrorText();
                        $data['status'] = "error";
                    }
                }
            } else {
                $is_button_clicked = false;
                $data['message'] = 'There were some issue with the payment. Please try again later.';
                $data['status'] = "error";
                $tresponse = $response->getTransactionResponse();
                if ($tresponse != null && $tresponse->getErrors() != null) {
                    $data['message'] = $tresponse->getErrors()[0]->getErrorText();
                    $data['status'] = "error";
                } else {
                    $data['message'] = $response->getMessages()->getMessage()[0]->getText();
                    $data['status'] = "error";
                }
            }
        } else {
            $is_button_clicked = false;
            $data['message'] = "No response returned";
            $data['status'] = "error";
        }
        return $data;
    }
}
