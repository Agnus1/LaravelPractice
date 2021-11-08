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
        <main class="flex-1 container mx-auto bg-white">
            @yield('content')
        </main>
        <x-panels.footer/>
    </div>
</body>
</html>
