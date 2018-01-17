@extends('layouts.app')

@section('title')
Usuario - Seguidores
@endsection

@section('content')
  @foreach($user->follows as $follow)
    <li>{{ $follow->username }}</li>
  @endforeach
@endsection