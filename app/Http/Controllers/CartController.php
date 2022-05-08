<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Event;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.cart.index');
    }
    /**
     *   addEventToCart
     *
     *
     */
    // $cart = session()->get('cart');

    //     if (!$cart) {
    //         $cart = [$event->id => $this->sessionData($event)];

    //       session()->put('cart',$cart);

    //     }
    //     if (isset($cart[$event->id])) {
    //         $cart[$event->id]['quantity']++;
    //         session()->put('cart',$cart);
    //         return redirect()->view('users.cart.index')->with('alert_scc', 'Event Added to Cart');
    //                                   }
    //     $cart = [$event->id => $this->sessionData($event)];

    //     session()->put('cart',$cart);
    //     return redirect('/cart')->with('alert_scc', 'Event Added to Cart');

    public function addSubEventToCart(Request $request)
    {
        $checkEvent = Cart::where([['type', "sub-event"], ['event_id', $request->event_id], ['user_id', Auth::user()->id]])->count();

        if($checkEvent==0){
            $cart = new Cart();
            $cart->user_id = auth()->user()->id;
            $cart->event_id = $request->event_id;
            $cart->type = "sub-event";
            $cart->save();
            session()->flash('alert_scc', 'Sub Event Added To Your Cart');
        }else{
            session()->flash('alert_err', 'Already added');
        }
        return redirect('cart-List');
    }

    public function addEventToCart(Request $request)
    {
        $checkEvent = Cart::where([['type', "event"], ['event_id', $request->event_id], ['user_id', Auth::user()->id]])->count();

        if($checkEvent==0){
            $cart = new Cart();
            $cart->user_id = auth()->user()->id;
            $cart->event_id = $request->event_id;
            $cart->type = "event";
            $cart->save();
            session()->flash('alert_scc', 'Event Added To Your Cart');
        }else{
            session()->flash('alert_err', 'Already added');
        }
        return redirect('cart-List');
    }

    static function cartitem()
    {
        if (Auth::check()) {
            $user_id = auth()->user()->id;
            return Cart::WHERE('user_id', $user_id)->count();
        }
    }

    public function ShowCartList()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        //    //selkect all event where id auth user = user id in the carts
        //    $events =DB::table('carts')
        //    ->join('events','carts.event_id',"=",'events.id')
        //    ->where('carts.user_id',$user_id)
        //    //hajti bil cart id bich nremovi bih mill cart
        //    ->select('events.*','carts.id as cart_id')
        //    ->get();
        //  //dd($events);
        return view('users.cart.index', compact('carts'));

        // $events = Cart::where('user_id',auth()->user()->id)->pluck('event_id');
        // dd($events);
        // return view ('users.cart.index',['events' => $events])
    }

    /**
     *  removeEventFromCart
     *
     *
     */

    public function removeEventFromCart($id)
    {
        Cart::destroy($id);
        return redirect('/cart-List')->with('alert_err', 'Event Removed From Cart');
    }

    /**
     *  ChangeQTY   to edelete later
     *
     *
     */

    // public function changeQty(Request $request, Event $event)
    // {
    //     $cart = session()->get('cart');
    //     if ($event->change_to === 'down') {
    //         if (isset($cart[$event->id])) {
    //             if ($cart[$event->id]['quantity'] > 1) {
    //                 $cart[$event->id]['quantity']--;

    //                 session()->put('cart',$cart);
    //                 return redirect('/cart')->with('alert_scc', 'Event Added to Cart');
    //             } else {
    //                 return $this->removeEventFromCart($event->id);
    //             }
    //         }
    //     } else {
    //         if (isset($cart[$event->id])) {
    //             $cart[$event->id]['quantity']++ ;

    //             session()->put('cart',$cart);
    //             return redirect('/cart')->with('alert_scc', 'Event Added to Cart');
    //         }
    //     }

    //     return back();
    // }

    //    to delete later

    // protected function sessionData(Event $event)
    // {
    //     return [
    //                 'label'       => $event->label,
    //                 'quantity'    => 1,
    //                 'price'       => $event->price,
    //                 'description' => $event->description,
    //                 'lieux'       => $event->lieux,
    //                 'photo'       => $event->photo,
    //     ];
    // }
    // protected function setSessionAndReturnResponseSucces($cart)
    // {
    //     session()->put('cart',$cart);
    //               return redirect('/cart')->with('alert_scc', 'Event Added to Cart');
    // }
    // protected function setSessionAndReturnResponseFailed($cart)
    // {
    //     session()->put('cart', $cart);

    //     return redirect()->back()->with('alert_err', "Removed from Cart");
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
