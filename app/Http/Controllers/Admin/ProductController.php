<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
$allProducts=Product::paginate(15);

return view('backend.products.index',compact('allProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.products.create');
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


        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'price' => 'required',
            'image' => 'required',
            

           
        ]);
          
           
        $product=new Product();
        
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $imageuploaded = "/" . $destinationPath . $profileImage;
            $product->image = $imageuploaded;
        }
        $product->name=$request->name;
        $product->detail= $request->detail;
        $product->price= $request->price;
        $product->timestamps= $request->created_at;
       
        $product->save();

                //
              

                return redirect()->back()->with('success', 'the user created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product=Product::find($id);
        
        return view('backend.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'price' => 'required',
           
            

           
        ]);
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $imageuploaded = "/" . $destinationPath . $profileImage;
            $product->image = $imageuploaded;
            File::delete(public_path($product->image));//to delete old image from public folder
        }


        $product=Product::find($id);
        $product->name=$request->name;
        $product->detail=$request->detail;
        $product->price=$request->price;
        $product->timestamps=$request->created_at;
       
        $product->save();

                //
              

                return redirect()->back()->with('success', 'the user created!');
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       


        $product = Product::findOrFail($id);

        $product->delete();
        File::delete(public_path($product->image));


        
        return redirect()->back();
    }
}
