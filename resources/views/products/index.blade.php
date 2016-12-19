@extends('layouts.app')

@section('content')
<div class="container">

  <div class="row">
    @foreach($products as $product )
    <div class="col-sm-6 col-md-4">
      <div class="thumbnail" style ="height:50vh;">
        <div class="caption">
          <h3>{{$product->name}}</h3>
          <div class="" style =" height:10vh; overflow:hidden;">


          <p style="white-space:no-wrap;overflow:hidden;text-overflow: ellipsis;">{!! nl2br(e($product->description)) !!}</p>
          </div>
          <br>
          <p><strong>Stock:</strong> @if ($product->stock>0){{$product->stock}} @else Not Available @endif
          <strong>SacriPrice:</strong>  {{$product->price}} @if ($product->price >1 )hours @else hour @endif</p>
          <p> <div class="text-center">


            <a href="{{route('cart.add',['id' => $product->id])}}" class="btn btn-primary @if ($product->stock==0) disabled @endif " role="button">Add to Cart</a>
             <a href="{{route('product.show',['id' => $product->id])}}" class="btn btn-default" role="button">Show Details</a>
             </div>
          </p>
          @if (Auth::user()->role == 1)


          <form method = "POST" action="{{route('product.destroy',['id' => $product->id])}}">
            {{ csrf_field()}}
            <input type="hidden" name="_method" value="DELETE">
            <div class="form-group">
              <div class="text-center">
                <a href="{{route('product.edit',['id' => $product->id])}}" role ="button" class =" btn btn-success"> Edit</a>
                <button type="submit" value = "delete" class="btn btn-danger">
                Delete
                </button>

              </div>
            </div>
          </form>

        @endif
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@endsection
