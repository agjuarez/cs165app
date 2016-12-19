@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    <div class="row">
                      <div class="col-md-6">
                        <a href = "{{url('/product')}}">View Products </a>

                      </div>
                    </div>
                    <hr>

                    <div class="row">
                      <div class="col-md-6">
                        <a href = "{{url('admin/product/create')}}">Add Product</a>

                      </div>
                    </div>
                    <hr>

                    <div class="row">
                      <div class="col-md-6">
                        <a href="{{url('admin/orders/')}}"> View Orders</a>

                      </div>

                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
