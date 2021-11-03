<?php

// Ключ - назавние раздела, значение - именованый маршрут на раздел
function getFooterMenu()
{
    $menu = [
        'О компании' => 'about',
        'Контактная информация' => 'contactinfo',
        'Условия продаж' => 'conditions',
        'Финансовый отдел' => 'financial',
        'Для клиентов' => 'forclients'
    ];
    return $menu;
}
