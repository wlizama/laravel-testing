@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-12">
      <form action="/galeria/create" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="txtTitle">Título de la imagen</label>
          <input id="txtTitle" name="title" type="text" class="form-control">
        </div>

        <div class="form-group">
          <label for="txtDescription">Descripción</label>
          <input id="txtDescription" name="descripcion" type="text" class="form-control">
        </div>

        {{-- <div class="form-group">
          <label for="txtImageURL">Image URL</label>
          <input id="txtImageURL" name="url" type="url" class="form-control">
        </div> --}}

        <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
    </div>
  </div>
@endsection