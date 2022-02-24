@extends('frontend.layouts.app')

@section('content')
<form role="form" action="{{ route('profile.update',$user->id)}}" method="post"  >
                            
                            @csrf
                            <input type="text" name="id" value="{{$user->id}}" hidden>
          
                            <div class="form-row">
               <div class="form-group col-md-6">
                 <label for="country">Country</label><span style="color: red !important; display: inline; float: none;">*</span>      
        <input type="text" name="country"  class="form-control"  placeholder="your country"  value={{ $user->info ? $user->info->country : " "}}>
             
      </div>
        <div class="form-group col-md-6">
      <label for="inputState">City</label>
      <input type="text" name="city"  class="form-control"  placeholder="your city"  value={{ $user->info ? $user->info->city : " "}}>
    </div>
    <div class="form-group col-md-12">
            <label for="inputAddress">Address</label>
           <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St" value={{ $user->info? $user->info->address : " "}}>

                </div>
  
     
         <div class="form-group col-md-6">
              <label >Phone</label>
     
            <input id="phone" name="phone" type="tel" class="form-control form" value={{$user->info? $user->info->phone : " "}}>
                       


                    </div>
                    <input type="submit" value="save">
                    
</form>

@endsection