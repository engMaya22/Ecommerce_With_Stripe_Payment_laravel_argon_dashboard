<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Stripe;
use Cart;
use Session;
use Auth;
use App\Models\Order;
use App\Models\OrderProducts;

class StripeController extends Controller
{
    //

//     public function stripePost(Request $request)
//     {$request->validate([
//         'city' => 'required',
//         'country' => 'required',
//         'address' => 'required',
//         'phone' => 'required',
//     ]);



//         $userId = auth()->user()->id;
//         Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));//we use setApiKey in stripe and parameter which is in env
//         Stripe\Charge::create([
//             "amount" => \Cart::session($userId)->getTotal() * 100,//strip deal with cent not dollar 
//             "currency" => "usd",//according doc
//             "source" => $request->stripeToken,//where this is token came from frony when we press pay now
//             "description" => "This payment is tested"//we can write name of product or bills or order number which will store in strip and we will store in our db as a company
//         ]);

// $order=new Order();
// $order->user_id= $userId;
// $order->total=\Cart::session($userId)->getTotal();
// $order->currency='usd';
// $order->description= "This payment is tested";
// $order->status= "1";
// $order->phone=$request->phone;
// $order->country=$request->country;
// $order->city=$request->city;
// $order->address=$request->address;

// $order->save();

// $products_from_cart=\Cart::session($userId)->getContent();

// @foreach($products_from_cart as $item)

// $products_from_cart=\Cart::session($userId)->getContent();
 
// foreach ($products_from_cart as $item) {
//     $orderproducts=new OrderProducts;
//     $orderproducts->order_id=$order->id;

//     $orderproducts->product_id=$item->id;

//     $orderproducts->name=$item->name;
//     $orderproducts->detail='$item->detail';
//     $orderproducts->image=$item->attributes->image;
//     $orderproducts->price=$item->price;
//     $orderproducts->save();
// }

// \Cart::session($userId)->clear();
// Session::flash('success', 'Payment successful!');
// return back();




// @endforeach







//         \Cart::session($userId)->clear();//this is the last step in payment process
//         Session::flash('success', 'Payment successful!');
//         return back();
//     }



public function stripePost(Request $request)
    {//WE NEED VALID DATA OF USERINFO FROM BACK AS VALID FROM FRONT IN CART
        $request->validate([
            'city' => 'required',
            'country' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);
        $userId = auth()->user()->id;
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => \Cart::session($userId)->getTotal() * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "This payment is tested"
        ]);
        
        $order= new Order;
        $order->user_id= $userId;
        $order->total=\Cart::session($userId)->getTotal();
        $order->currency='usd';
        $order->description= "This payment is tested";
        $order->status= "1";
        $order->phone=$request->phone;
        $order->country=$request->country;
        $order->city=$request->city;
        $order->address=$request->address;
        $order->quantity= \Cart::session($userId)->getTotalQuantity();//استفدت من التابع الجاهز بالكارت للكمية الكلية
        $order->save();

      
        $products_from_cart=\Cart::session($userId)->getContent();//for this user and return products of this user

        foreach ($products_from_cart as $item) {
            // dd($item);//to see what are attr item read
            $orderproducts=new OrderProducts;
            $orderproducts->order_id=$order->id;//one for all  theses products

            // $orderproducts->product_id=$item->id;

            $orderproducts->name= $item->name;
        
           
            $orderproducts->image= $item->attributes->image;//where i saved the image in attribute array
            $orderproducts->detail= $item->attributes->detail;
            $orderproducts->price= $item->price;
            $orderproducts->quantity= $item->quantity;// from cartcontroller
            $orderproducts->save();
            //i will add to cart product with its own attr
            //finally i will add payment and userInfo data then i will pay and save the data in db
        }

        \Cart::session($userId)->clear();
        Session::flash('success', 'Payment successful!');
        return back();
    }

    public function checkout(){
        $user=Auth::user();
        return view('frontend.checkout')->with('user',$user);



    }
}
