<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.homepage');
    }

    public function about()
    {
        return view('pages.about', ['title'=>'О нас']);
    }

    public function contactinfo()
    {
        return view('pages.about', ['title'=>'Контактная информация']);
    }

    public function conditions()
    {
        return view('pages.about', ['title'=>'Условия продаж']);
    }

    public function financial()
    {
        return view('pages.about', ['title'=>'Финансовый отдел']);
    }

    public function forclients()
    {
        return view('pages.about', ['title'=>'Для клиентов']);
    }

    public function salons()
    {
        return view('pages.salons', ['title'=>'Салоны']);
    }

    public function article()
    {
        return view('pages.article', ['title'=>'Статья']);
    }

    public function news()
    {
        return view('pages.news', ['title'=>'Новости']);
    }
}
