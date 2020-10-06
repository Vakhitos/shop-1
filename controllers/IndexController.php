<?php

// Подключение Моделей:
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';


// Формирование Главной страницы сайта:
function indexAction($smarty)
{
    $rsCategories = getAllCategories(); 
    $rsProducts = getLastProducts(5);


    $smarty->assign('pageTitle', 'Главная страница сайта');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}
