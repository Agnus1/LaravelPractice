<ul class="space-y-2">
    <li><a class="{{request()->routeIs('about') ? 'text-orange cursor-default' : 'hover:text-orange' }}" href="{{route('about')}}">О компании</a></li>
    <li><a class="{{request()->routeIs('contactinfo') ? 'text-orange cursor-default' : 'hover:text-orange' }}" href="{{route('contactinfo')}}">Контактная информация</a></li>
    <li><a class="{{request()->routeIs('conditions') ? 'text-orange cursor-default' : 'hover:text-orange' }}" href="{{route('conditions')}}">Условия продаж</a></li>
    <li><a class="{{request()->routeIs('financial') ? 'text-orange cursor-default' : 'hover:text-orange' }}" href="{{route('financial')}}">Финансовый отдел</a></li>
    <li><a class="{{request()->routeIs('forclients') ? 'text-orange cursor-default' : 'hover:text-orange' }}" href="{{route('forclients')}}">Для клиентов</a></li>
</ul>
