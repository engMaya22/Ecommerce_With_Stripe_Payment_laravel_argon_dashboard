@extends('frontend.layouts.app')

@section('content')

<h3  class="text-center p-4  bg-danger">My Informaions is </h3>
<div class="container px-6 mx-auto">
<form action="{{route('profile.edit',Auth::user()->id)}}" >
<div  class="row">

<div class="col-6 bg-success p-3 border" style="borderd 1px solid">the city is :</div><div class="col-6 bg-secondary p-3 border">{{$user->info->city}}</div>
<div class="col-6 bg-success p-3 border"> the country is :</div><div class="col-6 bg-secondary p-3 border">{{$user->info->country}}</div>
<div class="col-6 bg-success p-3 border">the address is: </div><div class="col-6 bg-secondary p-3 border">{{$user->info->address}}</div>
<div class="col-6 bg-success p-3 border">the phone is : </div><div class="col-6 bg-secondary p-3 border">{{$user->info->phone}}</div>

</div>
<div class="text-center m-3">
<input type="submit" value="Edit These Informations" class="btn btn-primary">
</div>



</form>
</div>
@endsection