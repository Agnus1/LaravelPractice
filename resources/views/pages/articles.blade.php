@extends('layouts.inner')

@section('title', 'Новости')

@section('path')
    <x-panels.navigation.paths.article/>
@endsection

@section('info')
    <div class="space-y-4">
        @foreach($articles as $article)
            <x-panels.articlesItem :article="$article"/>
        @endforeach
        <div>
            <x-panels.navigation.pagination/>
        </div>
    </div>
@endsection
