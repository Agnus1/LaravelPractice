<!doctype html>
<html class="antialiased" lang="ru">
<head>
    <x-panels.meta/>
    <x-panels.styles/>
    <x-panels.scripts/>
</head>
<body class="bg-white text-gray-600 font-sans leading-normal text-base tracking-normal flex min-h-screen flex-col">
    <div class="wrapper flex flex-1 flex-col">
        <x-panels.header/>
        @yield('content')
        <x-panels.footer/>
    </div>
</body>
</html>
