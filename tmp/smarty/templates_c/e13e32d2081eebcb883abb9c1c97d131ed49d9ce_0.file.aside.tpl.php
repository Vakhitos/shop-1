<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-20 20:17:01
  from 'D:\OSPanel\domains\shop\views\default\aside.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e9dd90d870c34_32364729',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e13e32d2081eebcb883abb9c1c97d131ed49d9ce' => 
    array (
      0 => 'D:\\OSPanel\\domains\\shop\\views\\default\\aside.tpl',
      1 => 1587398916,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e9dd90d870c34_32364729 (Smarty_Internal_Template $_smarty_tpl) {
?><aside>

    <h1>Категории товаров</h1>
    <nav>
        <ul>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
            <li>
                <a href="/?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>

                <?php if (isset($_smarty_tpl->tpl_vars['item']->value['children'])) {?>
                <ul>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'itemChild');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->value) {
?>
                    <li><a href="/?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</a></li>
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

    <section class="user">

        <?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)) {?>
        <div class="userBlock">
            <h1 class="userBlock__title">Кабинет пользователя</h1>
            <a href="#" class="userBlock__link userLink"><?php echo $_smarty_tpl->tpl_vars['arUser']->value['displayName'];?>
</a>
            <a href="/user/logout/" class="userBlock__link logoutLink">Выход</a>
        </div>
        <?php } else { ?>
        <div class="userBlock hide">
            <h1 class="userBlock__title">Кабинет пользователя</h1>
            <a href="#" class="userBlock__link userLink"></a>
            <a href="/user/logout/" class="userBlock__link logoutLink">Выход</a>
        </div>

        <div class="authBlock">
            <h1 class="authBlock__title">Авторизация</h1>
            <form action="" class="authBlock__form">
                <input class="authBlock__input loginEmail" type="text" name="loginEmail" placeholder="Введите Имя">
                <input class="authBlock__input loginPwd" type="password" name="loginPwd" placeholder="Введите Пароль">
                <button type="submit" class="authBlock__btn">Войти</button>
            </form>
        </div>

        <div class="registerBlock">
            <h1 class="registerBlock__title">Регистрация</h1>
            <form class="registerBlock__form">
                <input class="registerBlock__input" type="text" name="name" value="" placeholder="Введите Имя">
                <input class="registerBlock__input" type="email" name="email" value="" placeholder="Введите Email*">
                <input class="registerBlock__input" type="phone" name="phone" value="" placeholder="Введите Телефон">
                <input class="registerBlock__input" type="password" name="pwd1" value="" placeholder="Введите Пароль*">
                <input class="registerBlock__input" type="password" name="pwd2" value="" placeholder="Повторите Пароль*">

                <button class="registerBlock__btn">Зарегистрироваться</button>
            </form>
        </div>
        <?php }?>
    </section>
</aside><?php }
}
