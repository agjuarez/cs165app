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
                    <dt>Price:  {{$product->price}} @if ($product->price >1 )hours @else hour @endif</dt>
                    <dt>Description:</dt>
                    <dd>{!! nl2br(e($product->description)) !!}</dd>
                    <dd>
                      <form class="form-horizontal" role="form" method="POST" action="{{route('cart.add',['id' => $product->id])}}">
                        {{ csrf_field() }}
                        @if (Auth::user()->role ==1)
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} ">
                            <div class="col-md-4">
                              <label for="username" class=" control-label">username</label>

                              <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" min = "1" max ="{{$product->stock}}"   required>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @endif
                      <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }} ">
                          <div class="col-md-4">
                            <label for="quantity" class=" control-label">quantity</label>

                            <input id="quantity" type="number" class="form-control" name="quantity" value="{{ old('quantity') }}" min = "1" max ="{{$product->stock}}"   required>

                              @if ($errors->has('quantity'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('quantity') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary">
                                  Add to Cart
                              </button>
                          </div>
                      </div>
                    </form>

                    </dd>
                  </dl>


            </div>
            <div class="text-center">
              @if (Auth::user()->role == 1)
              <a href="{{route('product.edit',['id' => $product->id])}}" role ="button" class =" btn btn-warning"> Edit</a>
              @endif
              <a href="{{url('/product')}}" role ="button" class =" btn btn-default"> Back</a>
            </div>

        </div>
    </div>


  </div>
</div>
@endsection
