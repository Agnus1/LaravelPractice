<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ForClientsController extends Controller
{
    public function forClients()
    {
        $cars = \App\Models\Car::get();

//        средня цена моделей
        $average = $cars->average->price;

//        средня цена моделей, только тех, на которые действует скидка
        $avrOld = $cars->average->old_price;

//        самая дорогая модель
        $expen = $cars->max->price;

//        коллекция содержащая все виды салонов моделей
        $salons = $cars->pluck('salon')->unique();

//        коллекцая состоящая из названий двигателей, отсортированных по алфавиту
        $engines = $cars->whereNotNull('car_engine_id')->map(function ($item) {
            return $item->carEngine->name;
        })->unique()->sort();

//        коллекция состоящая из названий классов моделей,
//        отсортированных по алфавиту, ключ - slug по названию класса
        $classes = $cars->whereNotNull('car_class_id')->mapWithKeys(function ($item) {
            return  [Str::slug($item->carClass->name) => $item->carClass->name];
        })->sort();

//        коллекция моделей со скидкой, а также в названии этих моделей,
//        или в названии их двигателей, или КПП, должна содержится цифра 5 или 6.
        $models = $cars->whereNotNull('old_price')->filter(function ($item) {
            return (
                Str::contains($item->name, ['5', '6']) ||
                Str::contains(optional($item->carEngine)->name, ['5', '6']) ||
                Str::contains($item->kpp, ['5', '6'])
            );
        });

//        коллекция всех видов кузовов отсортированных по возрастанию средней цены (для моделей, без учета скидок),
//        где ключом является название вида кузова, а значением средняя цена на модели с этим видом кузова.
       $bodies = $cars->whereNotNull('car_body_id')->mapWithKeys(function ($item) use ($cars) {
            return [$item->carBody->name => $cars->where('car_body_id', $item->car_body_id)->average('price')];
        })->sort();

        return view('pages.forclients', [
            'average' => $average,
            'avrOld'=>$avrOld,
            'expen' => $expen,
            'salons' => $salons,
            'engines' => $engines,
            'classes' => $classes,
            'models' => $models,
            'bodies' => $bodies
            ]);
    }
}
