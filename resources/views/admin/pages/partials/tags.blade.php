@foreach ($article->tags->take(3) as $tag)
<form class="d-inline" action="/admin/search" method="post">
  @csrf
  <input type="hidden" name="search" value="{{$tag->name}}">
  <span onclick="event.target.parentElement.submit()" style="cursor: pointer">
    {{$tag->name}}
  </span>
  @if (!$loop->last) , @endif
  @if ($loop->last) 
  @if (count($article->tags) > 3)
  , ...
  @endif
  @endif
</form>
@endforeach