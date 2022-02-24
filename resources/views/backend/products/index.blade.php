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
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">name</th>
                                    <th scope="col">detail</th>
                                    <th scope="col">image</th>
                                    <th scope="col">price</th>
                                    <th scope="col">timestamps</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                             
                               @foreach($allProducts as $product)
                               <tr>
                                   <td>{{$product->id}}</td>
                                   <td>{{$product->name}}</td>
                                   <td>{{$product->detail}}</td>
                                   <td><img src="{{$product->image}}"  class="w-25"   /></td>
                                   <td>{{$product->price}}</td>
                                   <td>{{$product->timestamps}}</td>
                                   <td> <div class="row">
                                       <a class="btn btn-danger p-2" href="{{route('products.edit',$product->id)}}">Edit  Product</a>
                                
                                
                                   <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-danger ">Delete Product</button>
                        </div>
                      


                        </form>
                                </td>
                               
                                </tr>
                               @endforeach
                    

                            </tbody>
                        </table>
                        
                    </div>
                    <div class="d-flex justify-content-center">
                    <style>span  svg{
                        width:20px;
                    }</style>
                        {{ $allProducts->links()}}
                        </div>
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
