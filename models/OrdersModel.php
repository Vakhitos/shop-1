<?php
/*
** Модель для таблицы заказов ( orders )
*/

// Создание заказа ( без привязки товара )
function makeNewOrder($name, $phone, $adress)
{
  global $pdo;
  // Инициализация переменных
  $userId = $_SESSION['user']['id'];
  $comment = "id пользователя: {$userId} <br/>
              Имя: {$name}<br/>
              Тел: {$phone}<br/>
              Адрес: {$adress}";
  $dateCreated = date('Y.m.d H:i:s');
  $userIp = $_SERVER['REMOTE_ADDR'];

  $sql = "INSERT INTO orders (user_id, date_created, date_payment, status, comment, user_ip)
   VALUES ('{$userId}', '{$dateCreated}', null, '0', '{$comment}', '{$userIp}')";
  $statement = $pdo->prepare($sql);
  $statement->execute();

  if ($statement) {
    $sql = "SELECT id FROM orders ORDER BY id DESC LIMIT 1";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $rs = $statement->fetchAll();

    if (isset($rs[0])) {
      return $rs[0]['id'];
    }
  }

  return false;
}


/*
** Получаем список заказов с привязкой к продуктам для пользователя $userId.
**
** @param integer $userId  ID пользователя.
** @return array ( Массив заказов с привязкой к продуктам ).
*/
function getOrderWithProductsByUser($userId)
{
  global $pdo;

  $userId = intval($userId);
  $sql = "SELECT * FROM orders WHERE user_id = '{$userId}' ORDER BY id DESC";
  $statement = $pdo->prepare($sql);
  $statement->execute();
  $rs = $statement->fetchAll(PDO::FETCH_ASSOC);
  $smartyRs = array();
  foreach ($rs as $row) {
    $rsChildren = getPurchaseForOrder($row['id']);
    if ($rsChildren) {
      $row['children'] = $rsChildren;
    }
    $smartyRs[] = $row;
  }

  return $smartyRs;
}


function getOrders()
{
    global $pdo;
    $sql = "SELECT o.*,
                u.name,
                u.email,
                u.phone,
                u.adress
                FROM orders AS `o` LEFT JOIN users AS `u` ON o.user_id = u.id ORDER BY id DESC";
    
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $smartyRs = array();
  

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $rsChildren = getProductsForOrder($row['id']);

        if ($rsChildren) {
            $row['children'] = $rsChildren;
            $smartyRs[] = $row;
        }
        
    }
    return $smartyRs;
    
}

function getProductsForOrder($orderId){
  global $pdo;

  $sql = "SELECT * FROM purchase AS pe LEFT JOIN products AS ps ON pe.product_id = ps.id WHERE (`order_id` = '{$orderId}')";
  $statement = $pdo->prepare($sql);
  $statement->execute();
  $rs = $statement->fetchAll(PDO::FETCH_ASSOC);

  return $rs;
  
}

function updateOrderStatus($itemId, $status){
  global $pdo;
  $status = intval($status);
  $sql = "UPDATE orders SET `status` = '{$status}' WHERE id = '{$itemId}'";
  $statement = $pdo->prepare($sql);
  $rs = $statement->execute();

  return $rs;
}

function updateOrderDatePayment($itemId, $datePayment){
  global $pdo;
  $sql = "UPDATE orders SET `date_payment` = '{$datePayment}' WHERE id = '{$itemId}'";
  $statement = $pdo->prepare($sql);
  $rs = $statement->execute();

  return $rs;
}