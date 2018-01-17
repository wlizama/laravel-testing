@extends('layouts.app')

@section('title')
Usuario
@endsection

@section('content')

  @if(Auth::check())
    @if(Auth::user()->isFollowing($user))
      <form action="/{{ $user->username }}/unfollow" method="post">
        {{ csrf_field() }}
        @if(session('success'))
        <span class="text-success">{{ session('success') }}</span>
        @endif
        <button class="btn btn-danger">Unfollow</button>
      </form>
    @else
      <form action="/{{ $user->username }}/follow" method="post">
        {{ csrf_field() }}
        @if(session('success'))
        <span class="text-success">{{ session('success') }}</span>
        @endif
        <button class="btn btn-primary">follow</button>
      </form>
    @endif
  @endif

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