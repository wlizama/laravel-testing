<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
      $users = factory(App\User::class, 50)->create();
      
      $users->each(function(App\User $user) use ($users){
        $galerias = factory(App\Galeria::class)
          ->times(20)
          ->create([
            'user_id' => $user->id
          ]);

          $galerias->each(function (App\Galeria $galeria) use ($users) {
            factory(App\Response::class, random_int(1, 10))->create([
              'galeria_id' => $galeria->id,
              'user_id' =>$users->random(1)->first()->id
            ]);
          });

          $user->follows()->sync(
            $users->random(10)
          );
      });

      
    }
}
