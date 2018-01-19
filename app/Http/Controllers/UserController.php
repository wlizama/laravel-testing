<?php

namespace App\Http\Controllers;

use App\User;
use App\Conversation;
use App\PrivateMessage;
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
        'follows' => $user->follows
      ]);
    }

    public function followers($username){
      $user = $this->findByUserName($username);
      return view('user.follows', [
        'user' => $user,
        'follows' => $user->followers
      ]);
    }

    public function sendPrivateMessage($username, Request $request){
      $user = $this->findByUserName($username);

      $me = $request->user();

      $message = $request->input('message');

      $conversation = Conversation::between($me, $user);


      // $conversation = Conversation::create();
      // $conversation->users()->attach($me);
      // $conversation->users()->attach($user);

      $privateMessage = PrivateMessage::create([
        'conversation_id' => $conversation->id,
        'user_id' => $me->id,
        'message' => $message
      ]);

      return redirect('/conversations/'.$conversation->id);
    }

    public function showConversation(Conversation $conversation){

      $conversation->load('users', 'privateMessages');

      return view('user.conversation', [
        'conversation' => $conversation,
        'user' => auth()->user()
      ]);

    }

    private function findByUserName($username){
      return User::where('username', $username)->first();
    }
}
