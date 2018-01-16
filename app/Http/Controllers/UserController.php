<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getGallleryOfUser($username){
      $user = User::where('username', $username)->first();

      // dd($user);
      return view('user.index', [ 'user' => $user ]);
    }
}
