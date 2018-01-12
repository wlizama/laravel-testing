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
      <div class="col-md-6 col-sm-12">
        <div class="mt-2 mx-auto">
          <img class="img-thumbnail" src="{{ $imgItem->image }}">
          <p class="card-text">
            <div><a href="/{{ $imgItem->user->username }}">{{ $imgItem->user->name }}</a></div>
            <div>{{ $imgItem->content }}</div>
            <a href="/galeria/{{ $imgItem->id }}">Leer más</a>
          </p>
        </div>
      </div>
    @empty
      <p>No se Encontraron imagenes</p>
    @endforelse
  
    @if (count($imgItems))
    <div class="col-12">
      <div class="mt-4 mx-auto">
        {{ $imgItems->links('pagination::bootstrap-4') }} {{-- ->links() metodo solo disponible con paginate --}}
      </div>
    </div>
    @endif
  </div>
@endsection