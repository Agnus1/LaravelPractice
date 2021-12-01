<?php

Breadcrumbs::for('home', function ($trail) {
     $trail->push('Главная', route('home'));
});


Breadcrumbs::for('cars', function ($trail, $category) {
    $trail->parent('home');

    foreach ($category->ancestors as $ancestor) {
        $trail->push($ancestor->name, route('catalog.index', $ancestor));
    }

    $trail->push($category->name, route('catalog.index', $category));
});
Breadcrumbs::for('car', function ($trail, $car) {
    $trail->parent('cars', $car->category);
    $trail->push($car->name, route('catalog.show', $car));
});


Breadcrumbs::for('articles', function ($trail) {
    $trail->parent('home');
    $trail->push('Новости', route('articles.index'));
});
Breadcrumbs::for('article', function ($trail, $article) {
    $trail->parent('articles');
    $trail->push($article->title, route('articles.show', $article));
});


Breadcrumbs::for('about', function ($trail, $title) {
    $trail->parent('home');
    $trail->push($title, route('articles.index'));
});