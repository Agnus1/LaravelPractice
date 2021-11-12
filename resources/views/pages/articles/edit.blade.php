@extends('layouts.app')

@section('title', 'Редактирование статьи')

@section('content')
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Редактирование статьи</h1>

        <x-panels.form.errors/>
        <x-panels.form.success text="Статья успешно отредактирована"/>

        <form method="POST" action="{{route('articles.show', $article->slug)}}">
            @csrf
            @method('PATCH')
            <div class="mt-8 max-w-md">
                <div class="grid grid-cols-1 gap-6">
                    <x-panels.form.createEdit :article="$article"/>
                    <div class="block">
                        <x-panels.form.buttonOrange text="Сохранить" type="submit"/>
                        <x-panels.form.buttonGrey text="Отменить" type="reset"/>
                    </div>
                </div>
            </div>
        </form>

        <form method="POST" action="{{route('articles.show', $article->slug)}}">
            @csrf
            @method('DELETE')
            <div class="block mt-3">
                <x-panels.form.buttonOrange text="Удалить" type="submit"/>
            </div>
        </form>
    </div>
@endsection
