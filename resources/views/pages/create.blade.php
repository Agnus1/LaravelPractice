@extends('layouts.app')

@section('title', 'Создание статьи')

@section('content')
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Создание статьи</h1>

        <x-panels.form.errors/>

        @if (!empty($_POST) && !$errors->count())
            <x-panels.form.success text="Статья успешно создана"/>
        @endif
        <form method="post">
            @csrf
            <div class="mt-8 max-w-md">
                <div class="grid grid-cols-1 gap-6">

                    <x-panels.form.group for="title_field" label="Назавние статьи" error="{{$errors->first('title')}}">
                        <x-panels.form.text id="title_field" name="title"/>
                    </x-panels.form.group>

                    <x-panels.form.group for="description_field" label="Краткое описание статьи" error="{{$errors->first('description')}}">
                        <x-panels.form.text id="description_field" name="description"/>
                    </x-panels.form.group>

                    <x-panels.form.group for="email_field" label="Электронная почта" error="{{$errors->first('email')}}">
                        <x-panels.form.email id="email_field" name="email"/>
                    </x-panels.form.group>

                    <x-panels.form.group for="published_at_field" label="Выбор даты" error="{{$errors->first('published_at]')}}">
                        <x-panels.form.datePicker id="published_at_field" name="published_at"/>
                    </x-panels.form.group>

                    <x-panels.form.group for="section_field" label="Раздел" error="{{$errors->first('section')}}">
                        <x-panels.form.select id="section_field" name="section"/>
                    </x-panels.form.group>

                    <x-panels.form.group for="body_field" label="Детальное описание " error="{{$errors->first('body')}}">
                        <x-panels.form.textarea id="body_field" name="body"/>
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
