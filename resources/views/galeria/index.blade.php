@extends('layouts.app')

@section('content')

  @auth
    <div class="row mt-2">
      <div class="col">
        <a class="btn btn-outline-primary btn-sm" href="/galeria/create">+ Agregar Nueva Imagen</a>
      </div>
    </div>
  @endauth

  <div class="row">
    @forelse( $imgItems as $imgItem )
      <div class="col-6">
        <div class="mt-2 mx-auto">
          <img class="img-thumbnail" src="{{ $imgItem->image }}">
          <p class="card-text">
            {{ $imgItem->content }}
            <a href="/galeria/{{ $imgItem->id }}">Leer más</a>
          </p>
        </div>
      </div>
    @empty
      <p>No se Encontraron imagenes</p>
    @endforelse
  
    @if (count($imgItems))
      <div class="mt-4 mx-auto">
        {{ $imgItems->links('pagination::bootstrap-4') }} {{-- ->links() metodo solo disponible con paginate --}}
      </div>
    @endif
  </div>
@endsection