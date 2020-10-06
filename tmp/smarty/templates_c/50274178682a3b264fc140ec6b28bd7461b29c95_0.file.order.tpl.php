<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-25 21:09:19
  from 'D:\OSPanel\domains\shop.local\views\default\order.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ea47ccf4938b8_01199013',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '50274178682a3b264fc140ec6b28bd7461b29c95' => 
    array (
      0 => 'D:\\OSPanel\\domains\\shop.local\\views\\default\\order.tpl',
      1 => 1587838155,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ea47ccf4938b8_01199013 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="section">
  <hgroup>
    <h1><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</h1>
  </hgroup>
  <div class="row">
    <div class="col">
      <div class="block-cart">
        <form action="/cart/saveorder/">
          <table class="block-cart__table">
            <thead class="block-cart__head">
              <td class="block-cart__col">Номер</td>
              <td class="block-cart__col">Ноименование</td>
              <td class="block-cart__col">Количество</td>
              <td class="block-cart__col">Цена за единицу</td>
              <td class="block-cart__col">Стоимость</td>
            </thead>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item', false, NULL, 'products', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
            <tr>
              <td class="block-cart__col"><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
</td>
              <td class="block-cart__col">
                <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
              </td>
              <td class="block-cart__col">
                <span class="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['cnt'];?>
</span>
              </td>
              <td class="block-cart__col">
                <span class="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
</span>
              </td>
              <td class="block-cart__col">
                <span class="block-cart__price itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
 itemRealPrice"><?php echo $_smarty_tpl->tpl_vars['item']->value['realPrice'];?>
</span>
              </td>

            </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

          </table>
          <?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)) {?>
          <?php $_smarty_tpl->_assignInScope('buttonClass', '');?>
          <h2>Данные заказчика</h2>
          <?php $_smarty_tpl->_assignInScope('name', $_smarty_tpl->tpl_vars['arUser']->value['name']);?>
          <?php $_smarty_tpl->_assignInScope('phone', $_smarty_tpl->tpl_vars['arUser']->value['phone']);?>
          <?php $_smarty_tpl->_assignInScope('adress', $_smarty_tpl->tpl_vars['arUser']->value['adress']);?>
          <table class="block-cart__table">

            <tr>
              <td class="block-cart__col">Имя*</td>
              <td class="block-cart__col">
                <input type="text" name="name" id="name" class="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
">
              </td>
            </tr>
            <tr>
              <td class="block-cart__col">Телефон*</td>
              <td class="block-cart__col">
                <input type="text" name="phone" id="phone" class="phone" value="<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
">
              </td>
            </tr>
            <tr>
              <td class="block-cart__col">Адрес*</td>
              <td class="block-cart__col">
                <input type="text" name="adress" id="adress" class="adress" value="<?php echo $_smarty_tpl->tpl_vars['adress']->value;?>
">
              </td>
            </tr>
          </table>
          <?php } else { ?>
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
                <input class="register__input" type="password" name="pwd1" value="" placeholder="Введите Пароль*">
                <input class="register__input" type="password" name="pwd2" value="" placeholder="Повторите Пароль*">

                <button class="register__btn">Зарегистрироваться</button>
              </form>
            </section>
          </div>
          <?php $_smarty_tpl->_assignInScope('buttonClass', "hide");?>
          <?php }?>
          <button  class="btnSaveOrder <?php echo $_smarty_tpl->tpl_vars['buttonClass']->value;?>
">Оформить заказ</button>
        </form>
      </div>
    </div>
  </div>
</section><?php }
}
