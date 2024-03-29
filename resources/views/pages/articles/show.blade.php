@extends('layouts.inner')

@section('title', $article->title)

@section('path')
    <x-panels.navigation.breadcrumbs name='article' :params='$article'/>
@endsection

@section('info')
    <div class="space-y-4">
        <img src="{{Storage::url($article->image->path)}}" alt="" title="">
        <div>
            <x-panels.tags :article="$article"/>
        </div>
        <p>{{$article->body}}</p>
    </div>
    <div class="mt-4">
        <a class="inline-flex items-center text-orange hover:opacity-75" href="{{route('articles.index')}}">
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
            </svg>
            К списку новостей
        </a>
    </div>
    @admin
    <a class="inline-flex items-center text-orange hover:opacity-75" href="{{route('articles.edit', $article)}}">
        Редактировать статью
    </a>
    @endadmin
@endsection
