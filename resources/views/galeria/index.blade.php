@extends('layouts.app')

@section('content')
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