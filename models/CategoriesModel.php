<?php


// ПОЛУЧЕНИЕ КАТЕГОРИЙ ТОВАРА С ПРИВЯЗКОЙ ДОЧЕРНИХ >>
function getAllCategories()
{
    global $pdo;

    $sql = "SELECT * FROM categories WHERE parent_id = 0";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $rs = $statement->fetchAll(PDO::FETCH_ASSOC);
  
    $smartyRs = array();
    foreach ($rs as $row) {
        $rsChildren = getChildrenCategories($row['id']);
        if ($rsChildren) {
            $row['children'] = $rsChildren;
            $smartyRs[] = $row;
        }
    }
    return $smartyRs;
}

function getChildrenCategories($catId)
{
    global $pdo;

    $sql = "SELECT * FROM categories WHERE parent_id = '{$catId}'";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $rs = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    return $rs;
}
// <<



// ПОЛУЧЕНИЕ КАТЕГОРИЙ ПО ID >>
function getCatById($catId)
{
    global $pdo;

    $catId = intval($catId);
    $sql = "SELECT * FROM categories WHERE id = '{$catId}'";

    $statement = $pdo->prepare($sql);
    $statement->execute();
    $rs = $statement->fetch();

    return $rs;
}

// Получить все главные категории
function getAllMainCategories()
{
    global $pdo;

    $sql = 'SELECT * FROM categories WHERE parent_id = 0';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $rs = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $rs;
}

// Добавление новой категории
function insertCat($catName, $catParentId = 0)
{
    global $pdo;

    $sql = "INSERT INTO categories (`parent_id`, `name`) VALUES ('{$catParentId}', '{$catName}')";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $id = $pdo->lastInsertId();

    return $id;
}

// Получить только категории

function getAllCategoriy()
{
    global $pdo;

    $sql = "SELECT * FROM categories ORDER BY parent_id ASC";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $rs = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $rs;
}


// Обновление категрий

function updateCategoryData($itemId, $parentId = -1, $newName = '')
{
    global $pdo;

    $set = array();

    if ($newName) {
        $set[] = "name = '{$newName}'";
    }

    if ($parentId > -1) {
        $set[] = "parent_id = '{$parentId}'";
    }

    $setStr = implode(", ", $set);
    $sql = "UPDATE categories SET {$setStr} WHERE id = '{$itemId}'";
    $statement = $pdo->prepare($sql);
    $rs = $statement->execute();

    return $rs;
}
