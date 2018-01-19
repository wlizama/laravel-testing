@extends('layouts.app')

@section('content')
<h1>{{ $user->name }}</h1>

<ul class="list-unstyled">
@foreach($follows as $follow)
  <li><a href="/{{ $follow->username }}"><b>{{ $follow->name }}</b> {{ '@'.$follow->username }}</a></li>
@endforeach
</ul>
@endsection