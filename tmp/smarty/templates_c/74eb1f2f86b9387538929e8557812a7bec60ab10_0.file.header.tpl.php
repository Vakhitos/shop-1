<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-03 11:30:05
  from 'D:\OSPanel\domains\shop.local\views\default\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eae810d2b2974_54497608',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '74eb1f2f86b9387538929e8557812a7bec60ab10' => 
    array (
      0 => 'D:\\OSPanel\\domains\\shop.local\\views\\default\\header.tpl',
      1 => 1588494578,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:aside.tpl' => 1,
  ),
),false)) {
function content_5eae810d2b2974_54497608 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
/css/style.css" />
  <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
</head>

<body>
  <header class="header">
    <div class="header-top">
      <div class="container">
        <div class="header-top__inner">
          <a href="/" class="logo">Магазин</a>
          <a href="/cart/" class="goToBasket">
            <svg class="goToBasket__icon">
              <use xlink:href="/images/sprite.svg#cart"></use>
            </svg>
            <span class="goToBasket__counter" id="cartCntItems">
              <?php if ($_smarty_tpl->tpl_vars['cartCntItems']->value > 0) {
echo $_smarty_tpl->tpl_vars['cartCntItems']->value;
} else { ?>0<?php }?>
            </span>
          </a>

        </div>
      </div>
    </div>
    <div class="header-bottom">
      <div class="container">
        <div class="header-bottom__inner">

        </div>
      </div>
    </div>
  </header>

  <div class="wrapper">
    <div class="container">
      <div class="wrapper__inner">

        <?php $_smarty_tpl->_subTemplateRender('file:aside.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <main class="work-area"><?php }
}
