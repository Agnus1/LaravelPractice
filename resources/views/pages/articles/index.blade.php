@extends('layouts.inner')

@section('title', 'Новости')

@section('path')
    <x-panels.navigation.paths.allArticles/>
@endsection

@section('info')
    <div class="space-y-4">
        <a class="inline-flex items-center text-orange hover:opacity-75" href="{{route('articles.create')}}">
            Создать статью
        </a>

        @each('components.panels.articlesItem',$articles, 'article')

        <div>
            <x-panels.navigation.pagination/>
        </div>
    </div>
@endsection
