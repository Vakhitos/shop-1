<?php

// Подключение Моделей:
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

function indexAction($smarty)
{
    $rsCategories = getAllCategories();
    
    $catId = isset($_GET['id']) ? $_GET['id'] : null;

    
    if ($catId == null) exit();

    $rsProducts = null;
    $rsChildCats = null;

    $rsCategory = getCatById($catId);


    // Если главная категория, то показываем Дочерние категории.
    // Иначе выводим товар:

    if ($rsCategory["parent_id"] == 0) {
        $rsChildCats = getChildrenCategories($catId);
    }
    else{
        $rsProducts = getProductsByCat($catId);
    }

    

    $smarty->assign('pageTitle', 'Товары категории ' . $rsCategory['name']);
    $smarty->assign('rsCategory', $rsCategory);
    $smarty->assign('rsProducts', $rsProducts);
    $smarty->assign('rsChildCats', $rsChildCats);

    $smarty->assign('rsCategories', $rsCategories);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'category');
    loadTemplate($smarty, 'footer');
}
