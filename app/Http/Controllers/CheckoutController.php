<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Order;
use Auth;

class CheckoutController extends Controller
{
    // public function step1(){
    //     if(Auth::check()){
    //         return redirect()->route('checkout.shipping');
    //     }

    //     return redirect('login');
    // }

    public function shipping(){
        return view('front.shippinginfo');
    }

    public function payment(){
        return view('front.payment');
    }

    public function storepayment(Request $request){

        $intent = $request->stripeToken;
                // Set your secret key. Remember to switch to your live secret key in production!
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey('sk_test_DodRffEcNLUp7pDYuGEOfCQg00H4Qm55O0');

        $intent = \Stripe\PaymentIntent::create([
        'amount' => Cart::total()*100,
        'currency' => 'usd',
        'description' => 'example charge',
        'payment_method_types' => ['card'],
        // Verify your integration in this guide by including this parameter
        'metadata' => ['integration_check' => 'accept_a_payment'],
        ]);

      //Create the order
      Order::createOrder();

     //redirect user to some page
    return "Order completed";
    }
}
