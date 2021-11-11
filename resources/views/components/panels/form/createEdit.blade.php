@props(['article'])

<x-panels.form.group for="title_field" label="Назавние статьи" error="{{$errors->first('title')}}">
    <x-panels.form.text id="title_field"
                        name="title"
                        value="{!! old('title', optional($article)->title) !!}"
                        placeholder="Введите назавание"/>
</x-panels.form.group>

<x-panels.form.group for="description_field" label="Краткое описание статьи" error="{{$errors->first('description')}}">
    <x-panels.form.text id="description_field"
                        name="description"
                        value="{!! old('description', optional($article)->description) !!}"
                        placeholder="Введите краткое описание"/>
</x-panels.form.group>

<x-panels.form.group for="body_field" label="Детальное описание " error="{{$errors->first('body')}}">
    <x-panels.form.textarea id="body_field"
                            name="body"
                            value="{!! old('body', optional($article)->body) !!}"
                            placeholder="Введите детальное описание"/>
</x-panels.form.group>

<div class="block">
    <div class="mt-2">
        <x-panels.form.checkbox name='is_published' text='Опубликовать'/>
    </div>
</div>
