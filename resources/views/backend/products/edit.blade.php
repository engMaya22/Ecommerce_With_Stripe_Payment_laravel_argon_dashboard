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

              


<h3 class="text-center">edit Information</h3>

                   <form action="{{route('products.update',$product->id)}}" method="post" enctype="multipart/form-data">
                   @method('PUT')
                   @csrf
                   <div class="row">
    <div class="col-md-12">
      <div class="form-group">
                     
                       
          <input type="text" name="name" class="form-control" placeholder="your name"  value="{{$product->name}}" >
          </div>
    </div>
          @error('name')
   <div class="alert-danger">{{ $message }}<div>
 @enderror

 
    <div class="col-md-12">
      <div class="form-group">
                     
                       
          <input type="text" name="detail" class="form-control" placeholder="detail" value="{{$product->detail}}">
          </div>
    </div>
          @error('detail')
   <div class="alert-danger">{{ $message }}<div>
 @enderror
 
    <div class="col-md-12">
      <div class="form-group">
                     
                       
          <input type="file" name="image" class="form-control" placeholder="image" value="{{$product->image}}">
          </div>
    </div>
          @error('image')
   <div class="alert-danger">{{ $message }}<div>
 @enderror

 <div class="col-md-12">
      <div class="form-group">
                     
                       
          <input type="text" name="price" class="form-control" placeholder="price" >
          </div>
    </div>

 @error('price')
 <div class="alert-danger">{{ $message }}<div>
 @enderror
   
     
 
 
 <div class="col-md-12">
      <div class="form-group">
        

            <input type="submit" value="save" class="btn btn-success">
</div>
</div>
</div>

                   </form>
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
