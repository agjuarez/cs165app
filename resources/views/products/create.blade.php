@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Product</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/product') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                              <label for="name" class=" control-label">Product Name</label>

                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"   required>

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

                                <textarea id="description" class="form-control" style = "resize: vertical;"name="description" value="{{ old('description') }}"  required>
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

                                      <input id="stock" type="number" class="form-control" name="stock" value="{{ old('stock') }}" min = '0'   required>

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


                                      <input id="price" type="number" class="form-control" name="price" value="{{ old('price') }}" min = '0'   required>
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
                                <button type="submit" class="btn btn-primary">
                                    Add Product
                                </button>
                                <a href="{{url('/product')}}" role ="button" class =" btn btn-default"> Back</a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
