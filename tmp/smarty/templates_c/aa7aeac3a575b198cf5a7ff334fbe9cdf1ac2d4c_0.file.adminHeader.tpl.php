<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-03 16:08:21
  from 'D:\OSPanel\domains\shop.my\views\admin\adminHeader.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eaec24559d882_41361800',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa7aeac3a575b198cf5a7ff334fbe9cdf1ac2d4c' => 
    array (
      0 => 'D:\\OSPanel\\domains\\shop.my\\views\\admin\\adminHeader.tpl',
      1 => 1588069456,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:adminAside.tpl' => 1,
  ),
),false)) {
function content_5eaec24559d882_41361800 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/style.css" />
  <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
</head>

<body>
  <header class="adminHeader">
    <div class="adminContainer">
      <div class="adminHeader__inner">
      
      </div>
    </div>
  </header>
  <div class="adminHeaderLine">
    <div class="adminContainer">
      <div class="adminHeaderLine__inner">
      <nav class="nav-gorizontal">
         <menu class="menu">
           <li class="menu__item"><a href="#" class="menu__link">Управление сайтом</a></li>
         </menu>
       </nav>
      </div>
    </div>
  </div>
  <div class="adminWrapper">
    <div class="adminContainer">
      <div class="adminWrapper__inner">
        <?php $_smarty_tpl->_subTemplateRender('file:adminAside.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <div class="work-area">
          
       <?php }
}
