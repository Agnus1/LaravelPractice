@extends('layouts.inner')

@section('title', 'Новости')

@section('path')
    <x-panels.navigation.paths.allArticles/>
@endsection

@section('info')
    <div class="col-span-4 sm:col-span-3 lg:col-span-4 p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Новости</h1>
        <div class="space-y-4">
            @foreach($articles as $article)
                <x-panels.articlesItem :article="$article"/>
            @endforeach
            <div>
            <x-panels.navigation.pagination/>
            </div>
        </div>
    </div>
    </div>
@endsection
