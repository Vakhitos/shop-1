<?php
include_once 'config.php';

// Инициализация подключения к БД >>
$pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_passwd);
// <<



