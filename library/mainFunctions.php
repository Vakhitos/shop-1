<?php

function loadPage($smarty, $controllerName, $actionName = 'index')
{
    include_once PathPrefix . $controllerName . PathPostfix;
    $function = $actionName . 'Action';
    $function($smarty);
}

// Загрузка шаблона:
function loadTemplate($smarty, $templateName)
{
    $smarty->display($templateName . TemplatePostfix);
}

function createSmartyRsArray($rs)
{
    if (!$rs) return false;
    $smartyRs = array();
    foreach ($rs as $row) {
        $smartyRs[] = $row;
    }
    return $smartyRs;
}

// Перенапровление на страницу *n
function redirect($url)
{
    if (!$url) $url = '/';
    header("Location: {$url}");
    exit;
}

// Функция Отладки кода:
function d($value = null, $die = 1)
{
    function debugOut($a)
    {
        echo '<br><b>'. basename($a['file']) . '</b>'
            . "&nbsp;<font color='red'>({$a['line']})</font>"
            . "&nbsp;<font color='green'>({$a['function']})</font>"
            . "&nbsp; --". dirname($a['file']);
    }
    echo '<pre>';
    $trace = debug_backtrace();
    array_walk($trace, 'debugOut');
    echo "\n\n";
    var_dump($value);
    echo '</pre>';

    if ($die) die;
}