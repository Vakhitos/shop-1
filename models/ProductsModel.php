<?php

// Модель для таблицы Продукции

// Получить последние добавленые:

function getLastProducts($limit = null)
{
    global $pdo;
    $sql = "SELECT * FROM products WHERE status = 1 ORDER BY id DESC";

    if ($limit) {
        $sql .= " LIMIT {$limit}";
    }
    $statement = $pdo->prepare($sql);
    $statement->execute();


    $rs = $statement->fetchAll(PDO::FETCH_ASSOC);

    return createSmartyRsArray($rs);
}

function getProductsByCat($itemId)
{
    $itemId = intval($itemId);
    global $pdo;

    $sql = "SELECT * FROM products WHERE category_id = '{$itemId}'";
    $statement = $pdo->prepare($sql);
    $statement->execute();

    $rs = $statement->fetchAll(PDO::FETCH_ASSOC);

    return createSmartyRsArray($rs);
}

function getProductById($itemId)
{
    $itemId = intval($itemId);
    global $pdo;

    $sql = "SELECT * FROM products WHERE id = '{$itemId}'";
    $statement = $pdo->prepare($sql);
    $rs = $statement->execute();

    $rs = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $rs;
}

function getProductsFromArray($itemIds)
{

    $strIds = implode(', ', $itemIds);

    global $pdo;
    $sql = "SELECT * FROM products WHERE id in ({$strIds})";

    $statement = $pdo->prepare($sql);
    $statement->execute();
    $rs = $statement->fetchAll(PDO::FETCH_ASSOC);

    return createSmartyRsArray($rs);
}

// Получаем все продукты
function getProducts()
{
    global $pdo;

    $sql = "SELECT * FROM products ORDER BY category_id";
    $statement = $pdo->prepare($sql);
    $statement->execute();

    $rs = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $rs;
}

function insertProduct($itemName, $itemPrice, $itemDesc, $itemCat)
{
    global $pdo;

    $sql = "INSERT INTO products SET name = '{$itemName}',
     price = '{$itemPrice}',
      description = '{$itemDesc}',
       category_id = '{$itemCat}'";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    return $statement;
}

function updateProduct($itemId, $itemName, $itemPrice, $itemStatus, $itemDesc, $itemCat, $newFileName = null)
{
    $set = array();
    if ($itemName) {
        $set[] = "name = '{$itemName}'";
    }
    if ($itemPrice > 0) {
        $set[] = "price = '{$itemPrice}'";
    }
    if ($itemStatus !== null) {
        $set[] = "status = '{$itemStatus}'";
    }
    if ($itemDesc) {
        $set[] = "description = '{$itemDesc}'";
    }
    if ($itemCat) {
        $set[] = "category_id = '{$itemCat}'";
    }
    if ($newFileName) {
        $set[] = "image = '{$newFileName}'";
    }

    $setStr = implode(", ", $set);

    global $pdo;
    $sql = "UPDATE products SET {$setStr} WHERE id = '{$itemId}'";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    return $statement;
}

function updateProductImage($itemId, $newFileName)
{
    $rs = updateProduct($itemId, null, null, null, null, null, $newFileName);
    return $rs;
}




