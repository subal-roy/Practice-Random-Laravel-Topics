<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductController extends Controller
{
    public function index(Request $request) 
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function checkout()
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $products = Product::all();
        $lineItems = [];
        $totalPrice = 0;
        foreach ($products as $product) {
            $totalPrice += $product->price;
            $lineItems[]=[
                # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $product->name,
                    ],
                    'unit_amount' => $product->price*100,
                ],
                'quantity' => 1,
            ];
        }
        
        $customer = \Stripe\Customer::create([
            'email' => 'test@gmail.com',
            'name' => 'Subal Roy'
        ]);
        
        $session = \Stripe\Checkout\Session::create([
            'line_items' =>  $lineItems,
            'mode' => 'payment',
            'customer' => $customer->id,
            'success_url' => route('checkout.success', [], true)."?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('checkout.cancel', [], true),
          ]);

        $order = new Order();
        $order->status = "unpaid";
        $order->total_price = $totalPrice;
        $order->session_id = $session->id;
        $order->save();

        return redirect($session->url);
          
    }

    public function success(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $sessionId = $request->get('session_id');

        $session = \Stripe\Checkout\Session::retrieve($sessionId);

        if(!$session){
            throw new NotFoundHttpException;
        }
        if (empty($session->customer)) {
            throw new NotFoundHttpException;
        }

        // Retrieve the customer
        $customer = \Stripe\Customer::retrieve($session->customer);

        $order =Order::where('session_id', $session->id)->where('status', 'unpaid')->first();

        if(!$order) {
            throw new NotFoundHttpException;
        }
        
        $order->status = 'paid';
        $order->save();

        return view('product.checkout-success', compact('customer'));
    }

    public function cancel()
    {

    }
}
