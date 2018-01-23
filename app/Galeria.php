<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Galeria extends Model
{
    protected $guarded = []; // array de columnas protegidas

    use Searchable;

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
