<?php

// Константы для обращения к контроллерам:
define('PathPrefix', '../controllers/');
define('PathPostfix', 'Controller.php');

// Переменные для поключения к Базе Данных >>
$db_host   = 'localhost'; // Имя хостинга
$db_name   = 'shop';      // Назвние БД
$db_user   = 'root';      // Имя пользователя
$db_passwd = '';          // Пароль БД
// << 

// Используемый Шаблон:
$template = 'default';
$templateAdmin = 'admin';


// Путь к файлам Шаблона:
define('TemplatePrefix', "../views/{$template}/");
define('TemplateAdminPrefix', "../views/{$templateAdmin}/");
define('TemplatePostfix', '.tpl');

// Путь к файлам шаблонов в Вебпространстве:
define('TemplateWebPath', "/templates/{$template}/");
define('TemplateAdminWebPath', "/templates/{$templateAdmin}/");

// >> Инициализация шаблонизатора Smarty:
require('../library/Smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir(TemplatePrefix);
$smarty->setCompileDir('../tmp/smarty/templates_c');
$smarty->setCacheDir('../tmp/smarty/cache');
$smarty->setConfigDir('../library/Smarty/configs');

$smarty->assign('templateWebPath', TemplateWebPath);
// <<