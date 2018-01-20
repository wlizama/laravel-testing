@extends('layouts.app')

@section('content')
  <div class="row mt-2">
    <div class="col-12">
      <form action="/galeria/create" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-12 form-group @if($errors->any()) has-danger @endif">
            <label for="txtTitle">Título de la imagen</label>
            <input id="txtTitle" name="title" type="text" class="form-control @if($errors->has('title')) form-control-danger @endif">
          </div>

          <div class="col-12">
            <label for="txtDescription">Descripción</label>
            <input id="txtDescription" name="descripcion" type="text" class="form-control">
          </div>

          <div class="@if($errors->any()) has-danger @endif"">
            @if($errors->any())
               @foreach ($errors->all() as $error)
                  <div class="col-12 form-control-feedback">{{ $error }}</div>
              @endforeach
            @endif
          </div>
  
          <div class="col-12">
            <label for="txtImagen">Imagen</label>
            <input id="txtImagen" name="imagen" type="file" class="form-control">
          </div>
          
          <div class="col-sm-12 col-xl-3 mt-2">
            <button type="submit" class="btn btn-primary btn-block">Guardar Nueva Imagen</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection