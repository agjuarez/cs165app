<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{


    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

      return view('/user/show') -> with ('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

      return view('/user/edit') -> with ('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
          $this-> validate($request,[
          'username' => 'required',
          'lastname' => 'required',
          'firstname' => 'required',
          'contactnumber' => 'required',
          'address' => 'required',
          'email' => 'required',

          ]);
          $user->username = $request->input('username');
          $user->lastname = $request->input('lastname');
          $user->firstname = $request->input('firstname');
          $user->contactnumber= $request->input('contactnumber');
          $user->address= $request->input('address');
          $user->email= $request->input('email');

          $user->save();
          return view('user/show')-> with ('user',$user);
    }

}
