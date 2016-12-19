@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>{{$product -> name}}</h4></div>

                <div class="panel-body">
                  <dl class="">
                    <dt>Stock: @if ($product->stock>0){{$product->stock}} @else Not Available @endif</dt>
                    <dt>SacriPrice:  {{$product->price}} @if ($product->price >1 )hours @else hour @endif</dt>
                    <dt>Description:</dt>
                    <dd>{!! nl2br(e($product->description)) !!}</dd>
                  </dl>

                </div>
            </div>
            <div class="text-center">
              <a href="{{route('cart.add',['id' => $product->id])}}" class="btn btn-primary @if ($product->stock==0) disabled @endif " role="button">Add to Cart</a>

              @if (Auth::user()->role == 1)
              <a href="{{route('product.edit',['id' => $product->id])}}" role ="button" class =" btn btn-warning"> Edit</a>
              @endif
              <a href="{{url('/product')}}" role ="button" class =" btn btn-default"> Back</a>
            </div>

        </div>
    </div>


</div>
@endsection
