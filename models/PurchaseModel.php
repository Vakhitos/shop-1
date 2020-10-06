<?php

function setPurchaseForOrder($orderId, $cart){
  global $pdo;

  $sql = "INSERT INTO purchase (order_id, product_id, price, amount)
  VALUES ";

  $values = array();
  foreach($cart as $item){
    $values[] = "('{$orderId}', '{$item['id']}', '{$item['price']}', '{$item['cnt']}')";

    $sql .= implode(', ', $values);
    $statement = $pdo->prepare($sql);
    $statement->execute();

    return $statement;

  }
}

function getPurchaseForOrder($orderId){
  global $pdo;

$sql = "SELECT `pe`.*, `ps`.name FROM purchase as `pe` JOIN products as `ps` ON `pe`.product_id = `ps`.id WHERE `pe`.order_id = {$orderId}";
  $statement = $pdo->prepare($sql);
  $statement->execute();
  $rs = $statement->fetchAll(PDO::FETCH_ASSOC);

  return $rs;
}