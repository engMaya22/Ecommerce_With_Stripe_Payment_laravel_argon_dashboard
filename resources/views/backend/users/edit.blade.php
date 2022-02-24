@extends('backend.layouts.app')

@section('content')
    {{-- @include('backend.layouts.headers.cards') --}}
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
            </div>
        </div>
    </div>
    <div class="container-fluid mt--7">
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Page visits</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>

              


<h3 class="text-center">Your Information</h3>

                   <form action="{{route('users.update',$user->id)}}" method="post">
                   @method('PUT')
                   @csrf
                   <div class="row">
    <div class="col-md-12">
      <div class="form-group">
                     
                       
          <input type="text" name="name" class="form-control" placeholder="your name"  value="{{$user->name}}" >
          </div>
    </div>
          @error('name')
   <div class="alert-danger">{{ $message }}<div>
 @enderror

 
    <div class="col-md-12">
      <div class="form-group">
                     
                       
          <input type="email" name="email" class="form-control" placeholder="your email" value="{{$user->email}}">
          </div>
    </div>
          @error('email')
   <div class="alert-danger">{{ $message }}<div>
 @enderror
 
    <div class="col-md-12">
      <div class="form-group">
                     
                       
          <input type="password" name="password" class="form-control" placeholder="your password" value="{{$user->password}}">
          </div>
    </div>
          @error('password')
   <div class="alert-danger">{{ $message }}<div>
 @enderror

 <div class="col-md-12">
      <div class="form-group">
                     
                       
          <input type="password" name="password_confirmation" class="form-control" placeholder="confirm your password" value="{{$user->password}}">
          </div>
    </div>

 @error('password_confirmation')
 <div class="alert-danger">{{ $message }}<div>
 @enderror
   
     
 
    <div class="col-md-12">
      <div class="form-group">
                     
                       
          <!-- <input type="text" name="role" class="form-control" placeholder="your role"  value="{{$user->role}}"> -->
          <h3>Select Your Role</h3>
          <select name="role" id="">
              
              <option value=""></option>
              <option value="admin">Admin</option>
              <option value="user">User</option>
          </select>
        </div>
</div>
           @error('role')
   <div class="alert-danger">{{ $message }}<div>
 @enderror

 
 
 <div class="col-md-12">
      <!-- <div class="form-group">
        

            <input type="submit" value="save" class="btn btn-success">
</div> -->
</div>
</div>

                   </form>
                </div>
            </div>
        </div>
        <!-- <div >
        <form action="{{route('userInfo.store',$user->id)}}" method="post">
        @csrf
        <input type="text" name="id" value="{{$user->id}}" hidden>
       <input type="text" name="phone" placeholder="phone" class="form-control">
        <input type="text" name="country" placeholder="country" class="form-control">

        <input type="text" name="city" placeholder="city" class="form-control">
        <input type="text" name="address" placeholder="address" class="form-control">
        
<input type="submit" value="save Info" class="btn btn-danger ">
       </form> -->
       <!-- </div> -->




<div class="container">
             <form action="{{route('userInfo.store',$user->id)}}"    method="post">
             @csrf
                 <input type="text" name="id" value="{{$user->id}}" hidden>
          <div class="form-row">
               <div class="form-group col-md-6">
                 <label for="country">Country</label><span style="color: red !important; display: inline; float: none;">*</span>      
        
            <input type="text" name="country" value="{{$user->info->country}}">
      </div>
        <div class="form-group col-md-6">
      <label for="inputState">City</label>
   <input type="text" name="city" class="form-control" value="{{$user->info->city}}">
    </div>
    <div class="form-group col-md-12">
            <label for="inputAddress">Address</label>
           <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St" value="{{$user->info->address}}" >

                </div>
  
     
         <div class="form-group col-md-6">
              <label >Phone</label>
     
            <input id="phone" name="phone" type="tel" value="{{$user->info->phone}}" class="form-control form" >
            <button type="submit">Validate</button>

           <p id="result"></p>
             </div>
    
    <div class="form-group col-md-4">
    <button type="submit" class="btn btn-danger form-control">Sign in</button>
    </div>
  
 
        
 </div>
  


  
</form>


</div>



        <!-- @include('backend.layouts.footers.auth') -->
    </div>
@endsection

@push('js')

    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    

    <!-- Use as a jQuery plugin -->
<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<script src="{{asset('assets/build/js/intlTelInput-jquery.min.js')}}"></script> 
<!-- Use as a Vanilla JS plugin -->
<script src="{{asset('assets/build/js/intlTelInput.min.js')}}"></script> 



<!-- 
<script>

var input = document.querySelector("#phone"),
    form = document.querySelector("form"),
    result = document.querySelector("#result");

var iti = intlTelInput(input, {
  initialCountry: "tw"
});

form.addEventListener("submit", function(e) {
  e.preventDefault();
  var num = iti.getNumber(),
      valid = iti.isValidNumber();
  result.textContent = "Number: " + num + ", valid: " + valid;
}, false);

input.addEventListener("focus", function() {
  result.textContent = "";
}, false);
  </script> -->
@endpush
