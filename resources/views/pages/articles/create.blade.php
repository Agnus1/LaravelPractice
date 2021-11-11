@extends('layouts.app')

@section('title', 'Создание статьи')

@section('content')
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Создание статьи</h1>

        <x-panels.form.errors/>
        <x-panels.form.success text="Статья успешно создана"/>

        <form method="post" action="{{route('articles.store')}}">
            @csrf
            <div class="mt-8 max-w-md">
                <div class="grid grid-cols-1 gap-6">

                    <x-panels.form.createEdit article="{{new App\Models\Article()}}"/>

                    <div class="block">
                        <x-panels.form.buttonOrange text="Сохранить"/>
                        <x-panels.form.buttonGrey text="Отменить"/>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
