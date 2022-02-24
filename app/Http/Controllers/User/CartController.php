<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //


    public function cartList()
    {
        $userId = auth()->user()->id;
        $cartItems = \Cart::session($userId)->getContent();//we use cart which i install in composer and define it as public in config app.php provider
        // getContent return list of items which are selected by user which id is $userId in its session we save it in db with its id 

        // dd($cartItems);
        return view('frontend.cart', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {
        //if user add product to this cart 
        $userId = auth()->user()->id;
        \Cart::session($userId)->add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            
            'attributes' => array(
                'image' => $request->image,
                'detail'=>$request->detail,
                //  we put image in attr array to add feature to card as    to add color as user requirment
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        $userId = auth()->user()->id;
        \Cart::session($userId)->update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity//according quantity which coming from cart blade
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        $userId = auth()->user()->id;
        \Cart::session($userId)->remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        $userId = auth()->user()->id;
        \Cart::session($userId)->clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }
}
