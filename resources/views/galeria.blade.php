@extends('layouts.app')

@section('content')
  <div class="row">
    @forelse( $imgItems as $imgItem )
      <div class="col-6">
        <img class="img-thumbnail" src="{{ $imgItem['imageUrl'] }}">
        <p class="card-text">
          {{ $imgItem['text'] }}
          <a href="/messages/{{ $imgItem['id'] }}">Leer más</a>
        </p>
      </div>
    @empty
      <p>No se Encontraron imagenes</p>
    @endforelse
    
  </div>
@endsection