<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeria;

class GaleriaController extends Controller
{
    public function getGaleria(){
      $imageItems = Galeria::all();

      // dd($imageItems);
      return view('galeria', ['imgItems' => $imageItems]);
    }
}
