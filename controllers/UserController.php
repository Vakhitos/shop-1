<?php

// Подключение Моделей:
include_once '../models/CategoriesModel.php';
include_once '../models/UsersModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';

// AJAX Авторизация пользователя:

function loginAction()
{
    if (count($_POST) > 0) {

        $email  = htmlspecialchars(trim($_POST['email'])) ? $_POST['email'] : null;
        $pwd   = htmlspecialchars(trim($_POST['pwd'])) ? $_POST['pwd2'] : null;

        $userData = loginUser($email, $pwd);

        if ($userData['success']) {
            $userData = $userData[0];

            $_SESSION['user'] = $userData;
            $_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];

            $resData = $_SESSION['user'];
            $resData['success'] = true;
        } else {
            $resData['success'] = false;
            $resData['message'] = 'Неверный логин или пароль';
        }

        echo json_encode($resData);
    }
}

// AJAX Регистрация пользователя:
function registerAction()
{
    $email  = isset($_POST['email']) ? $_POST['email'] : null;
    $pwd1   = isset($_POST['pwd1']) ? $_POST['pwd1'] : null;
    $pwd2   = isset($_POST['pwd2']) ? $_POST['pwd2'] : null;
    $name   = isset($_POST['name']) ? $_POST['name'] : null;
    $phone  = isset($_POST['phone']) ? $_POST['phone'] : null;
    $adress = isset($_POST['adress']) ? $_POST['adress'] : null;

    // Валидация полей >>
    function checkRegisterParams($email, $pwd1, $pwd2)
    {
        $res = null;
        if (strlen($email) == 0) {
            $res['success'] = false;
            $res['message'] = 'Введите email';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $res['success'] = false;
            $res['message'] = 'Введите коректный email';
        } else {
            if (strlen($pwd1) == 0) {
                $res['success'] = false;
                $res['message'] = 'Введите пароль';
            } elseif (strlen($pwd1) < 3) {
                $res['success'] = false;
                $res['message'] = 'Пароль должен содержать больше 3 символов';
            } elseif (trim($pwd1) == '123') {
                $res['success'] = false;
                $res['message'] = 'Пароль должен быть посложнее';
            } else {
                if (strlen($pwd2) == 0) {
                    $res['success'] = false;
                    $res['message'] = 'Повторите пароль';
                } else {
                    if ($pwd1 != $pwd2) {
                        $res['success'] = false;
                        $res['message'] = 'Пороли не совподают';
                    }
                }
            }
        }




        return $res;
    }
    $resData = null;
    $resData = checkRegisterParams($email, $pwd1, $pwd2);
    if (!$resData && checkUserEmail($email)) {
        $resData['success'] = false;
        $resData['message'] = "Пользоаватель с таким email('{$email}') уже зарегистрирован";
    }

    if (!$resData) {
        $pwdMD5 = md5($pwd1);

        $userData = registerNewUser($email, $pwdMD5, $name, $phone, $adress);

        if ($userData['success']) {
            $resData['success'] = 1;
            $resData['message'] = 'Пользователь успешно зарегистрирован';

            $userData = $userData[0];
            $resData['userName'] = $userData['name'] ? $userData['name'] : $userData['email'];
            $resData['userEmail'] = $email;

            $_SESSION['user'] = $userData;
            $_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];
        } else {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка регистрации';
        }
    }


    echo json_encode($resData);
}

// Разлогинивание Пользователя:

function logoutAction()
{

    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
        unset($_SESSION['cart']);
    }
    redirect('/');
}




// Формирование главной страницы Пользователя >>
function indexAction($smarty)
{
    // Если вход на сайт не выполнен, Redirect на главную страницу:

    if (!isset($_SESSION['user'])) {
        redirect('/');
    }

    // Иначе >>
    // Получаем меню Каталога
    $rsCategories = getAllCategories();
    $rsUserOrders = getCurUserOrders();

    $smarty->assign('pageTitle', 'Страница пользователя');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsUserOrders', $rsUserOrders);

    // Подключение Шаблонов:
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'user');
    loadTemplate($smarty, 'footer');
}
// << Формирование главной страницы Пользователя


// Обновление данных пользователя >>
function updateAction()
{
    if (!isset($_SESSION['user'])) {
        redirect('/');
    }
    // Инициализация переменных:
    $resData = array();
    $phone  = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
    $adress = isset($_REQUEST['adress']) ? $_REQUEST['adress'] : null;
    $name   = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
    $pwd1   = isset($_REQUEST['pwd1']) ? $_REQUEST['pwd1'] : null;
    $pwd2   = isset($_REQUEST['pwd2']) ? $_REQUEST['pwd2'] : null;
    $curPwd = isset($_REQUEST['curPwd']) ? $_REQUEST['curPwd'] : null;

    $curPwdMD5 = md5($curPwd);

    if (!$curPwd || ($_SESSION['user']['pwd'] != $curPwdMD5)) {
        $resData['success'] = 0;
        $resData['message'] = 'Текущий пароль не верен!';

        echo json_encode($resData);
        return false;
    }

    $res = updateUserData($name, $phone, $adress, $pwd1, $pwd2, $curPwdMD5);
    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = 'Данные сохранены';
        $resData['userName'] = $name;

        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['phone'] = $phone;
        $_SESSION['user']['adress'] = $adress;
        $_SESSION['user']['pwd'] = $curPwdMD5;
        $_SESSION['user']['displayName'] = $name ? $name : $_SESSION['user']['email'];
    } else {
        $resData['succes'] = 0;
        $resData['message'] = 'Ошибка сохранения данных';
    }

    echo json_encode($resData);
}
// << Обновление данных пользователя
