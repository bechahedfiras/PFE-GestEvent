<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use Omnipay\Omnipay;
use Illuminate\Support\Facades\Auth;
use App\Payment;
use App\User;
use App\Cart;
use App\Event;
   
class PaymentController extends Controller
{
   
    private $gateway;
   
    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true ); //set it to 'false' when go live ki tabda true test b
    }
   
    /**
     * Call a view.
     */
    public function index()
    {
        return view('users.cart.index');
    }
   
    /**
     * Initiate a payment on PayPal.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function charge(Request $request)
    {
        if($request->input('submit'))
        {
            try {
                $response = $this->gateway->purchase(array(
                    'amount' => $request->input('amount'),
                    'currency' => env('PAYPAL_CURRENCY'),
                    'returnUrl' => url('success'),
                    'cancelUrl' => url('error'),
                ))->send();
            
                if ($response->isRedirect()) {
                    $response->redirect(); // this will automatically forward the customer
                } else {
                    // not successful
               
                     //basic message from api

                    //  return $response->getMessage();

                     //custom message error credantials
                
                   return  back()->with('alert_err', "Server not Availble try again later please check your credantials key ");
                  
                
                  

                }
            } catch(Exception $e) {
                return $e->getMessage();
            }
        }
    }
   
    /**
     * Charge a payment and store the transaction.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function success(Request $request)
    {
        // Once the transaction has been approved, we need to complete it.
        if ($request->input('paymentId') && $request->input('PayerID'))
        {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id'             => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ));
            $response = $transaction->send();
           
            if ($response->isSuccessful())
            {
                // The customer has successfully paid.
                $arr_body = $response->getData();
           //take all info about cart to inser it in payement to retrieve alll history from it
           $cart_ids = Cart::where('user_id','=',Auth::id())->get();
           //loop for all items cart 
           foreach($cart_ids as $cartid){
            
                      
                // Insert transaction data into the database
                $payment = new Payment;
                $payment->payment_id = $arr_body['id'];
                $payment->payer_id = $arr_body['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr_body['payer']['payer_info']['email'];
                $payment->amount = $arr_body['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr_body['state'];
                //shopping payment cart  store details need it for historique
               
                $payment ->event_id = $cartid->event_id;
                $payment ->user_id = auth()->user()->id;
                $payment ->type = $cartid->type;
                
                $payment->save();
            }
                session()->flash('alert_scc', "Payment is successful. Your transaction id is: ". $arr_body['id']);
             
                //after payments is suces done we w aamalna move ll panier details fil table payments - 2 - find cart ids and delete it all bech tfaragh l panier
                
                // dd($cart_ids);
                //delete cart 
                foreach($cart_ids as $cartid){
                    $cart = Cart::find($cartid);
                    $cart->each->delete();
                               }
               
                return redirect('/cart-List');
            } else {
                return $response->getMessage();
            }
        } else {
            return 'Transaction is declined';
        }
    }
   
    /**
     * Error Handling.
     */
    public function error()
    {
        return redirect('/cart-List')->with('alert_err', 'User cancelled the payment.'); 
    }


    public function historyEventUser()
    {   
        // $HistoOfUser = Payment::where('user_id','=',Auth::id())->get();
         $HistoOfUsers = Payment::where('user_id','=',Auth::id())->get()->sortByDesc('payment_id');
        // dd($HistoOfUser);
        return view('users.history')->with('HistoOfUsers', $HistoOfUsers); 
    }

}