@props(['article'])
@foreach($article->tags as $tag)
<span class="text-sm text-white italic rounded bg-orange px-2">{{$tag->name}}</span>
@endforeach
