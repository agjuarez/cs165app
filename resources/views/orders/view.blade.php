@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>{{$order->user->username}}'s  Cart</h4></div>

                <div class="panel-body">
                    <div class="row">
                      <div class="col-md-4">
                        <strong>Product Name</strong>
                      </div>
                      <div class="col-md-2">
                        <strong>
                        Quantity
                        </strong>

                      </div>
                      <div class="col-md-2">
                        <strong>
                        SacriPrice
                        </strong>

                      </div>
                      <div class="col-md-4">
                        <strong>Action</strong>
                      </div>
                    </div>
                    <hr>
                    @foreach ($items as $item)
                    <div class="row">
                      <div class="col-md-4">
                          {{$item->product->name}}
                      </div>
                      <div class="col-md-2">
                          {{$item -> quantity}}
                      </div>
                      <div class="col-md-2">
                          {{$item ->  total}}
                      </div>
                      <div class="col-md-4">
                        <a href="{{route('cart.remove',['id' => $item->id])}}" role="button" class="btn btn-danger">Delete</a>
                        <a href="{{route('cart.edit',['id' => $item->id])}}" role="button" class="btn btn-success">Edit</a>

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
                    <div class="text-center">
                      @if (Auth::user()->role == 0)
                      <a href="{{route('cart.submit',['id'=>$order->id])}}" role="button" class="btn btn-primary"> Order Now</a>
                      @endif

                      <a href="{{url('/product')}}" role ="button" class =" btn btn-default"> Back</a>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
