<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //

    public function productList()
    {
        $products = Product::all();

        return view('frontend.home', compact('products'));
    }
}
