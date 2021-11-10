@extends('layouts.inner')

@section('title', 'Новости')

@section('path')
    <x-panels.navigation.paths.allArticles/>
@endsection

@section('info')
        <div class="space-y-4">
            <div class="w-full flex">
                <div class="h-48 lg:h-auto w-32 sm:w-60 lg:w-32 xl:w-48 flex-none text-center overflow-hidden">
                    <a class="block w-full h-full hover:opacity-75" href="article.html"><img src="assets/pictures/car_rio_new.png" class="bg-white bg-opacity-25 w-full h-full object-contain" alt=""></a>
                </div>
                <div class="px-4 leading-normal">
                    <div class="mb-8 space-y-2">
                        <div class="text-black font-bold text-xl">
                            <a class="hover:text-orange" href="article.html">Парадигма просветляет архетип</a>
                        </div>
                        <p class="text-gray-600 text-base">
                            <a class="hover:text-orange" href="article.html">Парадигма просветляет архетип, таким образом, стратегия поведения, выгодная отдельному человеку</a>
                        </p>
                        <div>
                            <span class="text-sm text-white italic rounded bg-orange px-2">Это</span>
                            <span class="text-sm text-white italic rounded bg-orange px-2">Теги</span>
                        </div>
                        <div class="flex items-center">
                            <p class="text-sm text-gray-400 italic">01 Янв 2013</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full flex">
                <div class="h-48 lg:h-auto w-32 sm:w-60 lg:w-32 xl:w-48 flex-none text-center overflow-hidden">
                    <a class="block w-full h-full hover:opacity-75" href="article.html"><img src="assets/pictures/car_mohave_new.png" class="bg-white bg-opacity-25 w-full h-full object-contain" alt=""></a>
                </div>
                <div class="px-4 leading-normal">
                    <div class="mb-8 space-y-2">
                        <div class="text-black font-bold text-xl">
                            <a class="hover:text-orange" href="article.html">Парадигма просветляет архетип</a>
                        </div>
                        <p class="text-gray-600 text-base">
                            <a class="hover:text-orange" href="article.html">Парадигма просветляет архетип, таким образом, стратегия поведения, выгодная отдельному человеку</a>
                        </p>
                        <div>
                            <span class="text-sm text-white italic rounded bg-orange px-2">Парадигма</span>
                            <span class="text-sm text-white italic rounded bg-orange px-2">Архетип</span>
                            <span class="text-sm text-white italic rounded bg-orange px-2">Киа Seed</span>
                        </div>
                        <div class="flex items-center">
                            <p class="text-sm text-gray-400 italic">01 Янв 2013</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full flex">
                <div class="h-48 lg:h-auto w-32 sm:w-60 lg:w-32 xl:w-48 flex-none text-center overflow-hidden">
                    <a class="block w-full h-full hover:opacity-75" href="article.html"><img src="assets/pictures/car_K5-half.png" class="bg-white bg-opacity-25 w-full h-full object-contain" alt=""></a>
                </div>
                <div class="px-4 leading-normal">
                    <div class="mb-8 space-y-2">
                        <div class="text-black font-bold text-xl">
                            <a class="hover:text-orange" href="article.html">Парадигма просветляет архетип</a>
                        </div>
                        <p class="text-gray-600 text-base">
                            <a class="hover:text-orange" href="article.html">Парадигма просветляет архетип, таким образом, стратегия поведения, выгодная отдельному человеку</a>
                        </p>
                        <div>
                            <span class="text-sm text-white italic rounded bg-orange px-2">Парадигма</span>
                            <span class="text-sm text-white italic rounded bg-orange px-2">Архетип</span>
                            <span class="text-sm text-white italic rounded bg-orange px-2">Киа Seed</span>
                        </div>
                        <div class="flex items-center">
                            <p class="text-sm text-gray-400 italic">01 Янв 2013</p>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px text-lg" aria-label="Pagination">
                    <a href="#" class="inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-gray-200 cursor-not-allowed">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <span class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white bg-gray-800 text-gray-300">1</span>
                    <a href="#" class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-gray-700 hover:bg-gray-800 hover:text-white">2</a>
                    <a href="#" class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-gray-700 hover:bg-gray-800 hover:text-white">3</a>
                    <a href="#" class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-gray-700 hover:bg-gray-800 hover:text-white">...</a>
                    <a href="#" class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-gray-700 hover:bg-gray-800 hover:text-white">10</a>
                    <a href="#" class="inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-800 hover:text-white">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </nav>
            </div>
        </div>
@endsection
