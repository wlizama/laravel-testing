<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getGallleryOfUser($username){
      $user = $this->findByUserName($username);
      return view('user.index', [ 'user' => $user ]);
    }

    public function follow($username, Request $request){
      $user = $this->findByUserName($username);
      $me = $request->user();
      $me->follows()->attach($user);

      return redirect("/$username")->withSuccess('Usuario seguido!');
    }

    public function unfollow($username, Request $request){
      $user = $this->findByUserName($username);
      $me = $request->user();
      $me->follows()->detach($user);

      return redirect("/$username")->withSuccess('Usuario NO SEGUIDO!');
    }

    public function follows($username){
      $user = $this->findByUserName($username);
      return view('user.follows', [
        'user' => $user,
        'follows' => $user->followers
      ]);
    }

    public function followers($username){
      $user = $this->findByUserName($username);
      return view('user.follows', [
        'user' => $user,
        'follows' => $user->followers
      ]);
    }

    private function findByUserName($username){
      return User::where('username', $username)->first();
    }
}
