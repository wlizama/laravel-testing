<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;

class Users extends TestCase
{

  use DatabaseTransactions;
  use InteractsWithDatabase;

    public function testCanSeeUserPage()
    {
      $user = factory(User::class)->create();

      $response = $this->get($user->username);
      $response->assertSee($user->name);
    }

    public function testCanLogin()
    {
      $user = factory(User::class)->create();

      $response = $this->post('/login', [
        'email' => $user->email,
        'password'  => 'secret'
      ]);

      $this->assertAuthenticatedAs($user);
    }
}
