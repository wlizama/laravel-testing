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
      return view('galeria.index',[
        'imgItems' => $imageItems,
        'paginate' => true
      ]);
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
      $image = $request->file('imagen');

      $image = Galeria::create([
        'user_id' => $user->id,
        'title' => $request->input('title'),
        'content' => $request->input('descripcion'),
        'image' => $image->store('galeria', 'public')
      ]);

      return redirect('/galeria/'.$image->id);
    }

    public function search(Request $request)
    {
      $query = $request->input('query');

      $imagenes = Galeria::search($query)->get();
      $imagenes->load('user');

      return view('galeria.index', [
        'imgItems' => $imagenes,
        'paginate' => false
      ]);
    }

    public function responses(Galeria $message)
    {
      return $message;
    }
}
