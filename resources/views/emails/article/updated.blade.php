@component('mail::message')
# Обновлена статья: "{{$article->title}}"

{{$article->body}}

@component('mail::button', ['url' => route('articles.show', $article)])
Перейти к статье
@endcomponent


@endcomponent
