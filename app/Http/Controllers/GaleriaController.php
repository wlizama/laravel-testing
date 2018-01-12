<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateGaleriaRequest;
use App\Galeria;

class GaleriaController extends Controller
{
    public function getGaleria(){
      $imageItems = Galeria::paginate(30);

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

      $user = $request->user();

      $image = Galeria::create([
        'user_id' => $user->id,
        'title' => $request->input('title'),
        'content' => $request->input('descripcion'),
        'image' => 'http://lorempixel.com/600/338?'.mt_rand(0, 1000)
      ]);

      return redirect('/galeria/'.$image->id);
    }
}
