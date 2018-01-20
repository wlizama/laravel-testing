<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    protected $guarded = []; // array de columnas protegidas

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function getImageAttribute($image){
      if (!$image || starts_with($image, 'http')) {
        return $image;
      }
      return \Storage::disk('public')->url($image);
    }
}
