<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal\Api\PaymentExecution;

class PaypalController extends Controller
{
    public function index(Request $request){
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(

                'AcHllRTn_B6CzSF_GfYEzIHxkJFwXwSPcvzDs9UG7Jms4w8X3YT3gfHPkUMZDTwZLpj8Dqaj307fYeu4',     // ClientID
                'EFvAykLIrJZ-4rz_3SH6sYEBbxKC3Kug7QJYdLGwBvTvA7o07J-Zqt4Igg8Ro_bhcHxgmftZCmNzxuYQ'      // ClientSecret
            )
        );
    // dd($apiContext);

     // After Step 2
     $payer = new \PayPal\Api\Payer();
     //paypal method
     $payer->setPaymentMethod('paypal');

     $amount = new \PayPal\Api\Amount();
     //lehna inti inti wel compte ta3ek kan bil usd tkhalih usd sinn tbadlo
     $amount->setTotal('150.00');
     $amount->setCurrency('USD');

     $transaction = new \PayPal\Api\Transaction();
     $transaction->setAmount($amount);

     $redirectUrls = new \PayPal\Api\RedirectUrls();
          //payement success thizo l view success
     $redirectUrls->setReturnUrl(route('paypal_return'))
        // sinon thizo l view cancel payement cancel
         ->setCancelUrl(route('paypal_cancel'));

     $payment = new \PayPal\Api\Payment();
     //nawe3 l mo3amla 3 type fama inti takhtar
     $payment->setIntent('sale')
         ->setPayer($payer)
         ->setTransactions(array($transaction))
         ->setRedirectUrls($redirectUrls);

     // After Step 3 create ll payment
        try {
            $payment->create($apiContext);
            echo $payment;
            echo "\n\nRedirect user to approval_url: " . $payment->getApprovalLink() . "\n";
            return redirect($payment->getApprovalLink());
        }
        catch (\PayPal\Exception\PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            echo $ex->getData();
        }
    }


    public function paypalReturn(){
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(

                'AcHllRTn_B6CzSF_GfYEzIHxkJFwXwSPcvzDs9UG7Jms4w8X3YT3gfHPkUMZDTwZLpj8Dqaj307fYeu4',     // ClientID
                'EFvAykLIrJZ-4rz_3SH6sYEBbxKC3Kug7QJYdLGwBvTvA7o07J-Zqt4Igg8Ro_bhcHxgmftZCmNzxuYQ'     // ClientSecret
            )
        );
    //    dd($request()->all());
    // Get payment object by passing paymentId
    $paymentId = $_GET['paymentId'];
    $payment = \PayPal\Api\Payment::get($paymentId, $apiContext);
    $payerId = $_GET['PayerID'];

// Execute payment with payer ID
    $execution = new PaymentExecution();
    $execution->setPayerId($payerId);

            try {
                // Execute payment
                $result = $payment->execute($execution, $apiContext);
                dd($result);
            } catch (\PayPal\Exception\PayPalConnectionException $ex) {
                echo $ex->getCode();
                echo $ex->getData();
                die($ex);
            }
    }

    public function paypalCancel(){

    return "order canceled";
    }
    
         
}


  


