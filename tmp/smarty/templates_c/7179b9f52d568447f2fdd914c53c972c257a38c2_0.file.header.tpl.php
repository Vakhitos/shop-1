<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-20 09:14:46
  from 'D:\OSPanel\domains\shop\views\default\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e9d3dd6c0faa6_35731667',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7179b9f52d568447f2fdd914c53c972c257a38c2' => 
    array (
      0 => 'D:\\OSPanel\\domains\\shop\\views\\default\\header.tpl',
      1 => 1587363270,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:aside.tpl' => 1,
  ),
),false)) {
function content_5e9d3dd6c0faa6_35731667 (Smarty_Internal_Template $_smarty_tpl) {
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
    <header>
        <div class="container">
            <div class="header__inner">
                <a href="/" class="logo">Магазин</a>



                <a href="/cart/" class="cart-link">
                    <svg class="cart-link__svg">
                        <use xlink:href="/images/sprite.svg#cart"></use>
                    </svg>
                    <div class="cart-link__number" id="cartCntItems">
                        <?php if ($_smarty_tpl->tpl_vars['cartCntItems']->value > 0) {
echo $_smarty_tpl->tpl_vars['cartCntItems']->value;
} else { ?>0<?php }?>
                    </div>
                </a>

            </div>
        </div>
    </header>
    <div class="header-line">
        <div class="container">
            <div class="header-line__inner">
                <nav class="nav-horizontal">

                    <form class="search">
                        <input type="text" class="search__input" placeholder="Поиск по сайту">
                        <button class="search__btn">
                            <svg class="search__icon">
                                <use xlink:href="/images/sprite.svg#search">
                            </svg>
                        </button>
                    </form>

                    <ul class="menu-horizontal">
                        <li class="menu-horizontal__item"><a href="#" class="menu-horizontal__link">Акции</a></li>
                        <li class="menu-horizontal__item"><a href="#" class="menu-horizontal__link">Распродажа</a></li>
                        <li class="menu-horizontal__item"><a href="#" class="menu-horizontal__link">Новости</a></li>
                        <li class="menu-horizontal__item"><a href="#" class="menu-horizontal__link">Доставка и оплата</a></li>
                        <li class="menu-horizontal__item"><a href="#" class="menu-horizontal__link">Контакты</a></li>
                    </ul>

                </nav>
            </div>
        </div>
    </div>



    <div class="wrapper">
        <div class="container">
            <div class="wrapper__inner">
                 <?php $_smarty_tpl->_subTemplateRender('file:aside.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <main><?php }
}
