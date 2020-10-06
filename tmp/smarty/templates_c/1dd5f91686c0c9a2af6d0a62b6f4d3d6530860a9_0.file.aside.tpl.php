<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-03 00:42:12
  from 'D:\OSPanel\domains\shop.local\views\default\aside.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eade934637d21_20355638',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1dd5f91686c0c9a2af6d0a62b6f4d3d6530860a9' => 
    array (
      0 => 'D:\\OSPanel\\domains\\shop.local\\views\\default\\aside.tpl',
      1 => 1588455730,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eade934637d21_20355638 (Smarty_Internal_Template $_smarty_tpl) {
?><aside class="aside">

  <div class="aside__block">
    <h3 class="aside__title">Категории</h3>
    <nav>
      <ul class="menu-categories">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
        <li class="menu-categories__item">
          <a href="/?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/" class="menu-categories__link"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
          <?php if (isset($_smarty_tpl->tpl_vars['item']->value['children'])) {?>
          <ul class="menu-children">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'itemChild');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->value) {
?>
            <li class="menu-children__item">
              <a href="/?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
/" class="menu-children__link"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</a>
            </li>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </ul>
          <?php }?>
        </li>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </ul>
    </nav>
  </div>

  <?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)) {?>
  <section class="aside__section block-user">
    <h2 class="aside__title">Кабинет пользователя</h2>
    <div class="user">
      <a href="/user/" class="user__link user__privat"><?php echo $_smarty_tpl->tpl_vars['arUser']->value['displayName'];?>
</a>
      <a href="/user/logout/" class="user__link user__logout">Выход</a>
    </div>
  </section>
  <?php } else { ?>

  <section class="aside__section block-user hide">
    <h2 class="aside__title">Кабинет пользователя</h2>
    <div class="user">
      <a href="/user/" class="user__link user__privat"></a>
      <a href="/user/logout/" class="user__link user__logout">Выход</a>
    </div>
  </section>

  <?php if (!isset($_smarty_tpl->tpl_vars['hideLoginBox']->value)) {?>
  <div class="block-registration">
    <section class="aside__section">
      <h2 class="aside__title">Авторизация</h2>
      <form action="" class="login">
        <input class="login__input login__email" type="text" name="email" placeholder="Введите Имя">
        <input class="login__input login__pwd" type="password" name="pwd" placeholder="Введите Пароль">
        <button type="submit" class="login__btn">Войти</button>
      </form>

      <h2 class="aside__title register-toggle">Регистрация</h2>
      <form class="register hide">
        <input class="register__input" type="text" name="name" value="" placeholder="Введите Имя">
        <input class="register__input" type="email" name="email" value="" placeholder="Введите Email*">
        <input class="register__input" type="phone" name="phone" value="" placeholder="Введите Телефон">
        <input class="register__input" type="adress" name="adress" value="" placeholder="Введите адрес">
        <input class="register__input" type="password" name="pwd1" value="" placeholder="Введите Пароль*">
        <input class="register__input" type="password" name="pwd2" value="" placeholder="Повторите Пароль*">

        <button class="register__btn">Зарегистрироваться</button>
      </form>
    </section>
  </div>
  <?php }?>
  <?php }?>
</aside><?php }
}
