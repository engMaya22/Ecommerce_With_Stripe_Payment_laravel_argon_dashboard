@extends('backend.layouts.app')

@section('content')
    {{-- @include('backend.layouts.headers.cards') --}}
    <div class="header bg-dark pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
            </div>
        </div>
    </div>
    <div class="container-fluid mt--1  bg-danger">
        <div class="row ">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow  ">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                        </div>
                    <div class="table-responsive  ">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush ">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Order Id</th>
                                    <th scope="col">Total Mount</th>
                                   
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                             
                               @foreach($allOrders as $order)
                               <tr>
                                   <td>{{$order->id}}</td>
                                   <td>{{$order->total}}</td>

                                   
                                   <td> <div class="row">
                                       <a class="btn btn-warning p-2" href="{{route('orderProduct.show',$order->id)}}">View Details</a>
                                
                                
                                
                                </td>
                               
                                </tr>
                               @endforeach
                    

                            </tbody>
                        </table>
                        
                    </div>
                   
                </div>

               
            </div>
        </div>

        <!-- @include('backend.layouts.footers.auth') -->
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
