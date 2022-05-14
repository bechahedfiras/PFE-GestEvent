<?php

namespace App\Console\Commands;
use Cart;

use User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
class CartEmpty extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cart:empty';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artisan Command to empty cart after while';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // $cart_ids = Cart::where('user_id','=',Auth::id())->get();
        // foreach($cart_ids as $cartid){
        //     $cart = Cart::find($cartid);
        //     $cart->each->delete();
        //                }
       
        DB::table('carts')->delete();
    
    }
}
