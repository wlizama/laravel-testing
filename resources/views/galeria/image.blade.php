@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-12">
      <h2>{{ $image->id }}: {{ $image->title}}</h2>
    </div>
    <div class="col-12">
      <div class="row">
        <div class="col"></div>
        <div class="col-8">
          <img class="img-thumbnail" src="{{ $image->image }}" alt="{{$image->title}}">
        </div>
        <div class="col"></div>
      </div>
      <div class="row">
        <div class="col">{{ $image->content }}</div>
      </div>
    </div>
  </div>
@endsection