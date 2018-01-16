@extends('layouts.app')

@section('title')
Usuario
@endsection

@section('content')
  <div class="row">
    @forelse( $user->imgItems as $imgItem )
      <div class="col-md-6 col-sm-12">
        <div class="mt-2 mx-auto">
          @include('image.index')
        </div>
      </div>
    @empty
      <p>No se Encontraron imagenes</p>
    @endforelse
  </div>
@endsection