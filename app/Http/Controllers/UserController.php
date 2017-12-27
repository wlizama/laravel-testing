<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userNickname($nickname)
    {
      return view('user', ['nickname' => $nickname]);
    }
}
