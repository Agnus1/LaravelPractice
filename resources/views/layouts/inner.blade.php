@extends('layouts.app')

@section('content')

    @yield('path')
    <div class="flex-1 grid grid-cols-4 lg:grid-cols-5 border-b">
        <x-panels.sidebar/>
        @yield('info')
    <div/>

@endsection
