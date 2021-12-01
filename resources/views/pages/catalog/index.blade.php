@extends('layouts.app')
@section('title', $category->name ?? 'Каталог')

@section('path')
    <x-panels.navigation.paths.cars :category='$category'/>
@endsection

@section('content')
    <div class="p-4">
            <h1 class="text-black text-3xl font-bold mb-4">{{$category->name ?? 'Каталог'}}</h1>
            <x-panels.models :cars="$cars"/>

            <div class="text-center mt-4">
                {{$cars->onEachSide(1)->links()}}
            </div>
    <div/>
@endsection
