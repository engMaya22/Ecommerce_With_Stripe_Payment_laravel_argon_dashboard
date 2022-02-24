@extends('backend.layouts.app')

@section('content')
    {{-- @include('backend.layouts.headers.cards') --}}


   

    <div class="header bg-dark pb-8 pt-5 pt-md-8">
        <div class="container-fluid">


        <h3 class="p-3 text-white ">ORDER INFORMATION</h3>
     

     <div class="row">
     
    
     <!-- <div class="col-6">{{$order->user->email}}</div> -->
     <div class="col-6 bg-white p-3" style="border:1px solid black">  Order Id : </div>
     <div class="col-6 bg-success p-3" style="border:1px solid black" >{{$order->id }}</div> 
     <div class="col-6 bg-white p-3" style="border:1px solid black">  Currency is:</div>    <div class="col-6 bg-success p-3" style="border:1px solid black"> {{$order->curency }}</div>
     <div class="col-6 bg-white p-3" style="border:1px solid black"> Total is:</div>      <div class="col-6 bg-success p-3" style="border:1px solid black">{{$order->total}}</div> 
     <div class="col-6 bg-white p-3" style="border:1px solid black"> Date is: </div>   <div class="col-6 bg-success p-3" style="border:1px solid black">{{$order->created_at}}</div>
     <div class="col-6 bg-white p-3" style="border:1px solid black">  Status is: </div>   <div class="col-6 bg-success p-3" style="border:1px solid black">{{$order->status}}</div>
      </div>
    

      <h3 class="p-3 text-white ">Products INFORMATION</h3>
    <table class="table table-striped bg-danger align-items-center table-flush">

  <thead>
    <tr>
      <th scope="col">Order Id</th>
      <th scope="col">Product Id</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Image</th>
      <th scope="col">Product Detail</th>
      <th scope="col">Product Price</th>
     
      <th scope="col">Product Quantity</th>
    </tr>
  </thead>
  <tbody>
    <!-- {{$order->user}}
    {{$order}} -->
      @foreach( $order->order_product as $item)
  
   <tr>
       <td>{{$item->id}}</td>
       <td>{{$item->order_id}}</td>
       <td>{{$item->name}}</td>
       <td>{{$item->image}}</td>
       <td>{{$item->detail}}</td>
       <td>{{$item->price}}</td>
       <td>{{$item->quantity}}</td>
   </tr>

   
   

      @endforeach
      </tbody>
</table>

      <h3 class="p-3 text-white ">USER INFORMATION</h3>
     

      <div class="row">
      
     
      <!-- <div class="col-6">{{$order->user->email}}</div> -->
      <div class="col-6 bg-white p-3" style="border:1px solid black">  city is : </div>
      <div class="col-6 bg-success p-3" style="border:1px solid black" >{{$order->city }}</div> 
      <div class="col-6 bg-white p-3" style="border:1px solid black">  country is:</div>    <div class="col-6 bg-success p-3" style="border:1px solid black"> {{$order->country }}</div>
      <div class="col-6 bg-white p-3" style="border:1px solid black"> Adress is:</div>      <div class="col-6 bg-success p-3" style="border:1px solid black">{{$order->address}}</div> 
      <div class="col-6 bg-white p-3" style="border:1px solid black"> Phone is: </div>   <div class="col-6 bg-success p-3" style="border:1px solid black">{{$order->phone}}</div>
   
       </div>
     
    
 





</div>
</div>

















        @include('backend.layouts.footers.auth')
        </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush

           