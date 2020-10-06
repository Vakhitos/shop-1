<?php

// МОДЕЛЬ АВТОРИЗАЦИИ ПОЛЬЗОВАТЕЛЯ >>
function loginUser($email, $pwd)
{
    global $pdo;

    $email = htmlspecialchars($email);
    $pwd = md5($pwd);

    $sql = "SELECT * FROM users WHERE (email = :email and pwd = :pwd) LIMIT 1";
    $params = ['email' => $email, 'pwd' => $pwd];
    $statement = $pdo->prepare($sql);
    $rs = $statement->execute($params);
    $rs = $statement->fetchAll(PDO::FETCH_ASSOC);

    if (isset($rs[0])) {
        $rs['success'] = 1;
    } else {
        $rs['success'] = 0;
    }
    return $rs;
}
// <<

// МОДЕЛЬ РЕГИСТРАЦИИ НОВОГО ПОЛЬЗОВАТЕЛЯ >>
function registerNewUser($email, $pwdMD5, $name, $phone, $adress)
{
    global $pdo;

    $sql = "INSERT INTO users (email, pwd, name, phone, adress) VALUES (:email, :pwdMD5, :name, :phone, :adress)";
    $statement = $pdo->prepare($sql);
    $params = ['email' => $email, 'pwdMD5' => $pwdMD5, 'name' => $name, 'phone' => $phone, 'adress' => $adress];
    $rs = $statement->execute($params);

    if ($rs) {
        $sql = "SELECT * FROM users WHERE email = :email and pwd = :pwdMD5 LIMIT 1";
        $params = ['email' => $email, 'pwdMD5' => $pwdMD5];
        $statement = $pdo->prepare($sql);
        $rs = $statement->execute($params);
        $rs = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (isset($rs[0])) {
            $rs['success'] = 1;
        } else {
            $rs['success'] = 0;
        }
    } else {
        $rs['success'] = 0;
    }

    return $rs;
}

// Проверка сушествующего Email при регистрации
function checkUserEmail($email)
{
    global $pdo;

    $sql = "SELECT id FROM users WHERE email = :email";
    $statement = $pdo->prepare($sql);
    $params = ['email' => $email];
    $rs = $statement->execute($params);
    $rs = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $rs;
}
// <<


// МОДЕЛЬ ИЗМИНЕНИЯ ДАННЫХ ТЕКУЩЕГО ПОЛЬЗОВАТЕЛЯ >>
function updateUserData($name, $phone, $adress, $pwd1, $pwd2, $curPwd)

{
    global $pdo;
    $email = htmlspecialchars($_SESSION['user']['email']);
    $pwd1 = trim($pwd1);
    $pwd2 = trim($pwd2);

    $newPwd = null;
    if ($pwd1 && ($pwd1 == $pwd2)) {
        $newPwd = md5($pwd1);
    }

    $sql = "UPDATE users SET ";

    if ($newPwd) {
        $sql .= "pwd = '{$newPwd}', ";
    }

    $sql .= "name = '{$name}', phone = '{$phone}', adress = '{$adress}' WHERE email = '{$email}' AND pwd = '{$curPwd}' LIMIT 1";

    $statement = $pdo->prepare($sql);
    $rs = $statement->execute();
    return $rs;
}
// <<

/*
** Получение данных заказа текущего пользователя.
** @return array ( Массив заказов с привязкой к продуктам ).
*/
function getCurUserOrders()
{
    $userId = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : 0;
    $rs = getOrderWithProductsByUser($userId); // >> OrdersModel.php

    return $rs;
}
