<aside class="hidden sm:block col-span-1 border-r p-4">
    <nav>
        <ul class="text-sm">
            <li>
                <p class="text-xl text-black font-bold mb-4">Информация</p>
                <ul class="space-y-2">
                    @foreach (getFooterMenu() as $key => $value)
                    <li><a class="{{request()->routeIs($value) ? 'text-orange cursor-default' : 'hover:text-orange' }}" href="{{route($value)}}">{{$key}}</a></li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </nav>
</aside>
