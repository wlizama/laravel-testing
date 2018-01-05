<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateGaleriaRequest;
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

    public function formImage(){
      return view('galeria.image-form');
    }

    public function addImage(CreateGaleriaRequest $request){

      $image = Galeria::create([
        'title' => $request->input('title'),
        'content' => $request->input('descripcion'),
        'image' => 'http://lorempixel.com/600/338?'.mt_rand(0, 1000)
      ]);

      return redirect('/galeria/'.$image->id);
    }
}
