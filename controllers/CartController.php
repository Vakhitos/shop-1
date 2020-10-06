<?php

// Подключение Моделей:
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';

// Добавление продукта в карзину:
function addtocartAction()
{
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
    if (!$itemId) return false;

    $resData = array();

    // Если значение не найдено, добавляем его:

    if (isset($_SESSION['cart']) && array_search($itemId, $_SESSION['cart']) === false) {
        $_SESSION['cart'][] = $itemId;
        $resData['cntItems'] = count($_SESSION['cart']);
        $resData['success'] = 1;
    } else {
        $resData['success'] = 0;
    }

    echo json_encode($resData);
}



// Удаление заказа из Карзины:
function removefromcartAction()
{
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
    if (!$itemId) exit();

    $resData = array();
    $key = array_search($itemId, $_SESSION['cart']);

    if ($key !== false) {
        unset($_SESSION['cart'][$key]);
        $resData['success'] = 1;
        $resData['cntItems'] = count($_SESSION['cart']);
    } else {
        $resData['success'] = 0;
    }

    echo json_encode($resData);
}

// Формирование строницы Корзины:
function indexAction($smarty)
{
    $itemsIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

    $rsCategories = getAllCategories();
    $rsProducts = getProductsFromArray($itemsIds);

    $smarty->assign('pageTitle', 'Корзина');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'cart');
    loadTemplate($smarty, 'footer');
}

// Формирование страницы заказа:

function orderAction($smarty){
    // Получаем массив идентификаторова:
    $itemIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
    // Если карзина пуста Редирект на корзину:
    if(! $itemIds){
        redirect('/cart/');
        return;
    }

    // Получем массив $_POST количества покупаемых товаров:
    $itemsCnt = array();
    foreach($itemIds as $item){
        // Формируем ключ для массива $_POST
        $postVar = 'itemCnt_' . $item;

        $itemsCnt[$item] = isset($_POST[$postVar]) ? $_POST[$postVar] : null;
    } 
    $rsProducts = getProductsFromArray($itemIds);

    $i = 0;
    foreach($rsProducts as &$item){
        $item['cnt'] = isset($itemsCnt[$item['id']]) ? $itemsCnt[$item['id']] : 0;

        if($item['cnt']){
            $item['realPrice'] = $item['cnt'] * $item['price'];
        } else {
            unset($rsProducts[$i]);
        }

        $i++;
    }

    if(! $rsProducts){
        echo "Корзина пуста";
        return;
    }

    $_SESSION['saleCart'] = $rsProducts;

    $rsCategories = getAllCategories();

    if(! isset($_SESSION['user'])){
        $smarty->assign('hideLoginBox', 1);
    }

    $smarty->assign('pageTitle', 'Заказ');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'order');
    loadTemplate($smarty, 'footer');
    
}


// Ajax сохранение заказа >>

function saveorderAction()
{
     $cart = isset($_SESSION['saleCart']) ? $_SESSION['saleCart'] : null;
     
     if(! $cart){
         $resData['success'] = 0;
         $resData['message'] = 'Нет товара для заказа';
         echo json_encode($resData);
         return;
     }

     $name   = $_POST['name'];
     $phone  = $_POST['phone'];
     $adress = $_POST['adress'];

    //  Создание нового заказа >>
    $orderId = makeNewOrder($name, $phone, $adress);

    if(! $orderId){
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка создание заказа';
        echo json_encode($resData);
        return;
    }

    $res = setPurchaseForOrder($orderId, $cart);

    if($res){
        $resData['success'] = 1;
        $resData['message'] = 'Заказ сохранен';
        unset($_SESSION['saleCart']);
        unset($_SESSION['cart']);
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка внесения данных для заказа № ' . $orderId;
    }

    echo json_encode($resData);

    
}