@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Product</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{route('product.update',['id' => $product->id])}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                              <label for="name" class=" control-label">Product Name</label>

                                <input id="name" type="text" class="form-control" name="name" value="{{ $product-> name}}" placeholder = "Do MP"  required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                              <label for="description" class=" control-label">Product Description</label>

                                <textarea id="description" class="form-control" style = "resize: vertical;"name="description"   required>
                                  {{ $product->description}}
                                </textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">


                          <div class="form-inline col-md-12">
                                <div class="form-group{{ $errors->has('stock') ? ' has-error' : '' }} ">

                                    <div class="col-md-4">
                                      <label for="stock" class=" control-label">Stock</label>

                                      <input id="stock" type="number" class="form-control" name="stock" value="{{ $product-> stock}}"   required>

                                        @if ($errors->has('stock'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('stock') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">

                                    <div class="col-md-6">
                                      <label for="price" class=" control-label">SacriPrice</label>
                                      <div class="input-group">


                                      <input id="price" type="number" class="form-control" name="price" value="{{ $product-> price}}"   required>
                                      <div class="input-group-addon">
                                        hours
                                      </div>
                                        @if ($errors->has('price'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('price') }}</strong>
                                            </span>
                                        @endif
                                      </div>
                                    </div>
                                </div>
                          </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Edit Product
                                </button>
                                <a href="{{url('/product')}}" role ="button" class =" btn btn-primary"> Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
