@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Order Summary</h4></div>

                <div class="panel-body">
                    <div class="row">
                      <div class="col-md-4">
                        <strong>Product Name</strong>
                      </div>
                      <div class="col-md-4">
                        <strong>
                        Quantity
                        </strong>

                      </div>
                      <div class="col-md-4">
                        <strong>
                        SacriPrice
                        </strong>

                      </div>
                    </div>
                    <hr>
                    @foreach ($items as $item)
                    <div class="row">
                      <div class="col-md-4">
                          {{$item->product->name}}
                      </div>
                      <div class="col-md-4">
                          {{$item -> quantity}}
                      </div>
                      <div class="col-md-4">
                          {{$item ->  total}}
                      </div>
                    </div>
                    <hr>

                    @endforeach
                    <div class="row">
                      <div class="col-md-6">
                        <h4><strong>Total SacriPrice</strong></h4>

                      </div>
                      <div class="col-md-6">
                        <h4><em>{{$total}} hours</em></h4>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <h4><strong>Status</strong></h4>

                      </div>
                      <div class="col-md-6" >
                        @if($order->status == 1)
                        <p ><h4 style="color:green;">Ordered</h4></p>

                        @elseif ($order->status == 2)
                        <p ><h4 style="color:blue;">Received</h4></p>
                        @endif
                      </div>
                    </div>
                    <div class="text-center">
                      @if(Auth::user()->role == 1 && $order->status <> 2)

                      @if(isset($flag) && $flag) <p style = "color:red;"> <em>Cannot Deliver Item Because there are not enough stocks.</em></p>@endif


                      <a href="{{route('orders.deliver',['id'=>$order->id])}}" role="button" class="btn btn-primary  @if(isset($flag) && $flag) disabled @endif ">Deliver Item</a>
                      @endif
                      <a href="@if (Auth::user()->role == 0){{url('/orders/history') }} @else{{url('admin/orders') }} @endif" role ="button" class =" btn btn-default"> Back</a>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>
@endsection
