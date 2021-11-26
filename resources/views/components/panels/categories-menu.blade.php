<nav class="order-1">
    <ul class="block lg:flex">
        @foreach($categories as $category)
            @if ($category->children->count())
                <li class="group">
                    @if ($currentCategoryName === $category->name || $category->children->pluck('name')->contains($currentCategoryName))
                        <a class="inline-block p-4 text-orange font-bold border-l border-r border-transparent group-hover:border-l group-hover:border-r group-hover:border-gray-200 group-hover:shadow" href="{{route('catalog.index', $category)}}">
                            {{$category->name}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </a>
                    @else 
                         <a class="inline-block p-4 text-black font-bold border-l border-r border-transparent group-hover:text-orange group-hover:bg-gray-100 group-hover:border-l group-hover:border-r group-hover:border-gray-200 group-hover:shadow" href="{{route('catalog.index', $category)}}">
                            {{$category->name}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </a>
                    @endif
                        <ul class="dropdown-navigation-submenu absolute hidden group-hover:block bg-white shadow-lg">
                            @foreach($category->children as $subCategory)
                                    <li><a class="block py-2 px-4 {{$currentCategoryName === $subCategory->name ? 'text-orange' : 'text-black'}} hover:text-orange hover:bg-gray-100" href="{{route('catalog.index', $subCategory)}}">{{$subCategory->name}}</a></li>
                            @endforeach
                        </ul>
                </li>   
            @else
                <li class="group"><a class="inline-block p-4 {{$currentCategoryName === $category->name ? 'text-orange' : 'text-black'}}  font-bold hover:text-orange" href="{{route('catalog.index', $category)}}">{{$category->name}}</a></li>
            @endif
        @endforeach
    </ul>
 </nav>
