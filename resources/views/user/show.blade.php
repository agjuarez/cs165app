@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-md-8">
                    <h3>User Profile for <strong>{{$user -> username}}</strong> </h3>
                  </div>

                  </div>


                <div class="panel-body">
                      <div class="row">
                        <div class="col-md-4">
                          <strong>Username</strong>
                        </div>
                        <div class="col-md-8">
                          <em>{{$user -> username}} </em>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-4">
                          <strong>Name</strong>
                        </div>
                        <div class="col-md-8">
                          <em><strong>{{$user -> lastname}}</strong>, {{$user-> firstname}} </em>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <strong>Address</strong>
                        </div>
                        <div class="col-md-8">
                          <em>{{$user -> address}} </em>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <strong>Contact Number</strong>
                        </div>
                        <div class="col-md-8">
                          <em>{{$user -> contactnumber}} </em>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <strong>Email Address</strong>
                        </div>
                        <div class="col-md-8">
                          <em>{{$user -> email}} </em>
                        </div>
                      </div>
                      <div class="text-center">
                        <a href = "{{route('user.edit',['user' => Auth::user()->id])}}" role="button" class="btn btn-success">Edit Profile </a>

                        <a href="{{url('/product')}}" role ="button" class =" btn btn-default"> Back</a>

                      </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
