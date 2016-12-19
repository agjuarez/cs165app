@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Order History</h4></div>

                <div class="panel-body">
                    <div class="row">
                      <div class="col-md-4">
                        <strong>Order ID</strong>
                      </div>
                      <div class="col-md-4">
                        <strong>Order Status</strong>
                      </div>
                      <div class="col-md-4">
                        <strong>Action</strong>
                      </div>
                    </div>
                    <hr>
                    @foreach($orders as $order)

                    <div class="row">
                      <div class=" col-md-4">
                        {{$order->id}}
                      </div>
                      <div class="col-md-4">
                        @if($order->status == 1)
                        <p style="color:green;">Ordered</p>

                          @elseif ($order->status == 2)
                          <p style="color:blue;">Received</p>

                        @endif
                      </div>
                      <div class=" col-md-4">
                        <a href="{{route('cart.viewsummary',['id'=>$order->id])}}" role="button" class="btn btn-primary"> View Order Summary</a>
                      </div>
                    </div>

                    <hr>
                    @endforeach
                    </div>
                    <div class="text-center">
                      <a href="{{url('/cart')}}" role ="button" class =" btn btn-default"> Back to my Cart</a>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
