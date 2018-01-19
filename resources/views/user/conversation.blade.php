@extends('layouts.app')


@section('content')
<h1>Conversacion con {{$conversation->users->except($user->id)->implode('name', ', ')}}</h1>

    @foreach ($conversation->privateMessages as $message)
      <div class="card">
        <div class="card-header">
          <p>{{$message->user->name}} dijo ... </p>
        </div>
        <div class="card-block">
          {{$message->message}}
        </div>
        <div class="card-footer">
          {{$message->created_at}}
        </div>
      </div>
    @endforeach
    
@endsection