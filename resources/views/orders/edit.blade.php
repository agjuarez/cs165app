@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>{{$item->product-> name}}</h4></div>

                <div class="panel-body">
                  <dl class="">
                    <dt>Stock: @if ($item->product->stock>0){{$item->product->stock}} @else Not Available @endif</dt>
                    <dt>SacriPrice:  {{$item->product->price}} @if ($item->product->price >1 )hours @else hour @endif</dt>
                    <dt>Description:</dt>
                    <dd>{!! nl2br(e($item->product->description)) !!}</dd>
                    <dd>
                      <form class="form-horizontal" role="form" method="POST" action="{{route('cart.edit',['id' => $item->id])}}">
                        <input type="hidden" name="_method" value="PUT">
                      <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }} ">
                        {{ csrf_field() }}

                          <div class="col-md-4">
                            <label for="quantity" class=" control-label">Quantity Ordered</label>

                            <input id="quantity" type="number" class="form-control" name="quantity" value="{{$item->quantity}}" min = "1" max ="{{$item->product->stock}}"   required>

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
                                  Edit Item
                              </button>
                          </div>
                      </div>
                    </form>

                    </dd>
                  </dl>

                </div>
            </div>
            <div class="text-center">

              <a href="{{url('/cart')}}" role ="button" class =" btn btn-default"> Back</a>
            </div>

        </div>
    </div>


</div>
@endsection
