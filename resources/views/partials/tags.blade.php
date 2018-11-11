@foreach ($article->tags->take(3) as $tag)
<span>
    {{$tag->name}}
</span>
@if (!$loop->last) , @endif
@if ($loop->last) 
  @if (count($article->tags) > 3)
  , ...
  @endif
@endif
@endforeach