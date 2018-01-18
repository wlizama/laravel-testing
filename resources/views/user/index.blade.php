@extends('layouts.app')

@section('title')
Usuario
@endsection

@section('content')

<a href="/{{ $user->username }}/follows" class="btn btn-link">
  Sigue a <span class="badge badge-default">{{ $user->follows->count() }}</span>
</a>

<a href="/{{ $user->username }}/followers" class="btn btn-link">
  Seguidores <span class="badge badge-default">{{ $user->followers->count() }}</span>
</a>


  @if(Auth::check())

    @if(Gate::allows('dms', $user))
      <form action="/{{$user->username}}/dms" method="post">
        <input type="text" name="message" class="form-control">

        <button class="btn btn-success">Enviar Mensaje</button>
      </form>
    @endif

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