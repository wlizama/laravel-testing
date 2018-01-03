<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeria;

class GaleriaController extends Controller
{
    public function getGaleria(){
      $imageItems = Galeria::all();

      // dd($imageItems);
      return view('galeria.index', ['imgItems' => $imageItems]);
    }

    public function showImageById($imgID){
      $image = Galeria::find($imgID);

      return view('galeria.image', ['image' => $image] );
    }
}
