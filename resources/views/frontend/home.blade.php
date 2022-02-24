@extends('frontend.layouts.app')

@section('content')
    <div class="container  text-center">
        <h3 class="text-2xl font-medium text-gray-700">Product List</h3>
         <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4"> 
            @foreach ($products as $product)
                 <div class="w-full max-w-sm mx-auto overflow-hidden rounded-md shadow-md">  

                    <img src="{{ url($product->image) }}" alt="" class="w-full max-h-60">
                    
                    <div class="px-5 py-3"> 
                        <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                        <h3 class="text-gray-700 uppercase">{{ $product->detail }}</h3>
                        <span class="mt-2 text-gray-500">{{ $product->price }}</span>

                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
<!-- to store as we named in web  url  which is in cartContoller -->
                    
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="id">
                            <input type="hidden" value="{{ $product->name }}" name="name">
                            <input type="hidden" value="{{ $product->price }}" name="price">
                            <input type="hidden" value="{{ $product->image }}" name="image">
                            <input type="hidden" value="{{ $product->detail }}" name="detail">
                            <input type="hidden" value="1" name="quantity">
                             <button class="px-4 py-2 text-white btn-danger rounded">Add To Cart</button> 
                        </form>
                    </div>

                </div>
            @endforeach
        </div> 
    </div>
@endsection
