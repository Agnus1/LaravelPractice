@props(['$articles'])
<section class="news-block-inverse px-6 py-4">
    <div>
        <p class="inline-block text-3xl text-white font-bold mb-4">Новости</p>
        <span class="inline-block text-gray-200 pl-1"> / <a href="{{route('news')}}" class="inline-block pl-1 text-gray-200 hover:text-orange"><b>Все</b></a></span>
    </div>
    <div class="grid md:grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="w-full flex">
            <div class="h-48 lg:h-auto w-32 sm:w-60 lg:w-32 xl:w-48 flex-none text-center overflow-hidden">
                <a class="block w-full h-full hover:opacity-75" href="{{route('article')}}"><img src="assets/pictures/car_ceed.png" class="bg-white bg-opacity-25 w-full h-full object-contain" alt=""></a>
            </div>
            <div class="px-4 flex flex-col justify-between leading-normal">
                <div class="mb-8">
                    <div class="text-white font-bold text-xl mb-2">
                        <a class="hover:text-orange" href="{{route('article')}}">{{$articles[0]->title}}</a>
                    </div>
                    <p class="text-gray-300 text-base">
                        <a class="hover:text-orange" href="{{route('article')}}">{{$articles[0]->description}}</a>
                    </p>
                </div>
                <div>
                    <span class="text-sm text-white italic rounded bg-orange px-2">Киа Seed</span>
                </div>
                <div class="flex items-center">
                    <p class="text-sm text-gray-400 italic">{{(Jenssegers\Date\Date::parse($articles[0]->published_at))->format('d F Y')}}</p>
                </div>
            </div>
        </div>
        <div class="w-full flex">
            <div class="h-48 lg:h-auto w-32 sm:w-60 lg:w-32 xl:w-48 flex-none text-center overflow-hidden">
                <a class="block w-full h-full hover:opacity-75" href="{{route('article')}}"><img src="assets/pictures/car_k900.png" class="bg-white bg-opacity-25 w-full h-full  object-contain" alt=""></a>
            </div>
            <div class="px-4 flex flex-col justify-between leading-normal">
                <div class="mb-8">
                    <div class="text-white font-bold text-xl mb-2">
                        <a class="hover:text-orange" href="{{route('article')}}">{{$articles[1]->title}}</a>
                    </div>
                    <p class="text-gray-300 text-base">
                        <a class="hover:text-orange" href="{{route('article')}}">{{$articles[1]->description}}</a>
                    </p>
                </div>
                <div>
                    <span class="text-sm text-white italic rounded bg-orange px-2">Парадигма</span>
                    <span class="text-sm text-white italic rounded bg-orange px-2">Архетип</span>
                    <span class="text-sm text-white italic rounded bg-orange px-2">Киа Seed</span>
                </div>
                <div class="flex items-center">
                    <p class="text-sm text-gray-400 italic">{{(Jenssegers\Date\Date::parse($articles[1]->published_at))->format('d F Y')}}</p>
                </div>
            </div>
        </div>
        <div class="w-full flex">
            <div class="h-48 lg:h-auto w-32 sm:w-60 lg:w-32 xl:w-48 flex-none text-center overflow-hidden">
                <a class="block w-full h-full hover:opacity-75" href="{{route('article')}}"><img src="assets/pictures/car_soul.png" class="bg-white bg-opacity-25 w-full h-full  object-contain" alt=""></a>
            </div>
            <div class="px-4 flex flex-col justify-between leading-normal">
                <div class="mb-8">
                    <div class="text-white font-bold text-xl mb-2">
                        <a class="hover:text-orange" href="{{route('article')}}">{{$articles[2]->title}}</a>
                    </div>
                    <p class="text-gray-300 text-base">
                        <a class="hover:text-orange" href="{{route('article')}}">{{$articles[2]->description}}</a>
                    </p>
                </div>
                <div>
                    <span class="text-sm text-white italic rounded bg-orange px-2">Это</span>
                    <span class="text-sm text-white italic rounded bg-orange px-2">Теги</span>
                </div>
                <div class="flex items-center">
                    <p class="text-sm text-gray-400 italic">{{(Jenssegers\Date\Date::parse($articles[2]->published_at))->format('d F Y')}}</p>
                </div>
            </div>
        </div>
    </div>
</section>
