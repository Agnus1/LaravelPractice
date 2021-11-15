@extends('layouts.app')

@section('title','Главная страница')

@section('content')
    <x-panels.carousel/>
    <section class="pb-4 px-6">
        @if($cars->first())
            <p class="inline-block text-3xl text-black font-bold mb-4">Модели недели</p>
            <x-panels.models :cars="$cars"/>
        @endif
    </section>
    <x-panels.ribbon :articles="$articles"/>
@endsection
