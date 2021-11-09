@extends('layouts.app')

@section('title', 'Создание статьи')

@section('content')
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Создание статьи</h1>

        <x-panels.form.errors :errors="$errors"/>

        @if (!empty($_POST) && !$errors->count())
            <x-panels.form.success text="Статья успешно создана"/>
        @endif

        <form method="post">
            @csrf
            <div class="mt-8 max-w-md">
                <div class="grid grid-cols-1 gap-6">

                    <x-panels.form.group for="title" label="Назавние статьи" error="">
                        <x-panels.form.text name="title"/>
                    </x-panels.form.group>

                    <x-panels.form.group for="description" label="Краткое описание статьи" error="">
                        <x-panels.form.text name="description"/>
                    </x-panels.form.group>

                    <x-panels.form.group for="email" label="Электронная почта" error="">
                        <x-panels.form.email name="email"/>
                    </x-panels.form.group>

                    <x-panels.form.group for="published_at" label="Выбор даты" error="">
                        <x-panels.form.datePicker name="published_at"/>
                    </x-panels.form.group>

                    <x-panels.form.group for="section" label="Раздел" error="">
                        <x-panels.form.select name="section"/>
                    </x-panels.form.group>

                    <x-panels.form.group for="body" label="Детальное описание " error="">
                        <x-panels.form.textarea name="body"/>
                    </x-panels.form.group>

                    <div class="block">
                        <div class="mt-2">
                                <x-panels.form.checkbox name='is_published' text='Опубликовать'/>
                        </div>
                    </div>

                    <div class="block">
                        <x-panels.form.buttonOrange text="Сохранить"/>
                        <x-panels.form.buttonGrey text="Отменить"/>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
