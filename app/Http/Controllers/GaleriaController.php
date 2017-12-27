<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GaleriaController extends Controller
{
    public function getGaleria(){
      $imageItems = [
        [
          'id' => 1,
          'text' => 'Lorem ipsum dolor sit amet',
          'imageUrl' => 'http://lorempixel.com/400/200/?1'
        ],
        [
          'id' => 2,
          'text' => 'Lorem ipsum dolor sit amet',
          'imageUrl' => 'http://lorempixel.com/400/200/?2'
        ],
        [
          'id' => 3,
          'text' => 'Lorem ipsum dolor sit amet',
          'imageUrl' => 'http://lorempixel.com/400/200/?3'
        ],
        [
          'id' => 4,
          'text' => 'Lorem ipsum dolor sit amet',
          'imageUrl' => 'http://lorempixel.com/400/200/?4'
        ],
        [
          'id' => 5,
          'text' => 'Lorem ipsum dolor sit amet',
          'imageUrl' => 'http://lorempixel.com/400/200/?5'
        ],
        [
          'id' => 6,
          'text' => 'Lorem ipsum dolor sit amet',
          'imageUrl' => 'http://lorempixel.com/400/200/?6'
        ]
      ];

      return view('galeria', ['imgItems' => $imageItems]);
    }
}
