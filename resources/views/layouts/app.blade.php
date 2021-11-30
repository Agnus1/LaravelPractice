<!doctype html>
<html class="antialiased" lang="ru">
<head>
    <x-panels.meta/>
    <x-panels.styles/>
    <script src="{{mix('/js/app.js')}}"></script>
</head>
<body class="bg-white text-gray-600 font-sans leading-normal text-base tracking-normal flex min-h-screen flex-col">
    <div class="wrapper flex flex-1 flex-col">
        <title>Рога и Сила - @yield('title')</title>
        <link href="assets/favicon.ico" rel="shortcut icon" type="image/x-icon">
        <x-panels.header/>
        @yield('path')
        <main class="flex-1 container mx-auto bg-white">
            @yield('content')
        </main>
        <x-panels.footer/>
    </div>
</body>
</html>
