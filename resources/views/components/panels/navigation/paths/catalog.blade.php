@props(['category'])
<nav class="container mx-auto bg-gray-100 py-1 px-4 text-sm flex items-center space-x-2">
    <a class="hover:text-orange" href="{{route('home')}}">Главная</a>
    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-3 w-3 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
    </svg>
    <a class="hover:text-orange" href="#">Каталог</a>
    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-3 w-3 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
    </svg>
    @if ($category->ancestors->count())
        <a class="hover:text-orange" href="{{route('catalog.index', $category->ancestors->first())}}">{{$category->ancestors->first()->name}}</a>
        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-3 w-3 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
        </svg>
    @endif
    <span>{{$category->name}}</span>

</nav>
