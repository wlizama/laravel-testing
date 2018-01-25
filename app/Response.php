<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $guarded = [];

    public function User()
    {
      return $this->belongsTo(User::class);
    }

    public function galeria()
    {
      $this->belongsTo(Galeria::class);
    }
}
