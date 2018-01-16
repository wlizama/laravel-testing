<img class="img-thumbnail" src="{{ $imgItem->image }}">
<p class="card-text">
  <div class="text-muted">Escrito por <a href="/{{ $imgItem->user->username }}">{{ $imgItem->user->name }}</a>
  </div>
  {{ $imgItem->content }}
  <a href="/imgItems/{{ $imgItem->id }}">Leer más</a>
</p>
<div class="card-text text-muted float-right">
  {{ $imgItem->created_at }}
</div>