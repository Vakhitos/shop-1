<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-03 15:52:07
  from 'D:\OSPanel\domains\shop.my\views\default\user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eaebe779a4046_39615091',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a3b7e06482c791d2be9f6caee9ce5a5d8b2c00b8' => 
    array (
      0 => 'D:\\OSPanel\\domains\\shop.my\\views\\default\\user.tpl',
      1 => 1587910428,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eaebe779a4046_39615091 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- 01 -->
<!-- Кабинет Пользователя -->

<section>
  <div class="container">
    <div class="section__inner">
      <div class="user_acount">
        <div class="user_acount__header">
          <h2 class="user_acount__title">Ваш личный кабинет</h2>
        </div>
        <div class="user_acount__content">
          <table class="user_acount__table">
            <tr class="user_acount__row user_acount__email">
              <td>Логин (email)</td>
              <td><?php echo $_smarty_tpl->tpl_vars['arUser']->value['email'];?>
</td>
            </tr>
            <tr class="user_acount__row">
              <td>Имя</td>
              <td>
                <input class="user_acount__input newName" type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['displayName'];?>
" />
              </td>
            </tr>
            <tr class="user_acount__row">
              <td>Телефон</td>
              <td>
                <input class="user_acount__input newPhone" type="phone" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['phone'];?>
" />
              </td>
            </tr>
            <tr class="user_acount__row">
              <td>Адрес</td>
              <td>
                <input class="user_acount__input newAdress" type="adress" name="adress" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['adress'];?>
" />
              </td>
            </tr>
            <tr class="user_acount__row">
              <td>Новый пароль</td>
              <td>
                <input class="user_acount__input newPwd1" type="password" name="pwd1" value="" />
              </td>
            </tr>
            <tr class="user_acount__row">
              <td>Повторите пароль</td>
              <td>
                <input class="user_acount__input newPwd2" type="password" name="pwd2" value="" />
              </td>
            </tr>
            <tr class="user_acount__row">
              <td>Для подтверждения введите текущий пароль</td>
              <td>
                <input class="user_acount__input curPwd" type="password" value="" />
              </td>
            </tr>
          </table>
          <a class="user_acount__btn">Сохранить</a>
          <?php echo '<script'; ?>
><?php echo '</script'; ?>
>
        </div>
        <div class="user_acount__footer"></div>
      </div>
    </div>
  </div>
</section>


<section class="section">
  <hgroup>
    <h1 class="section__title">Ваши заказы</h1>
  </hgroup>
  <!-- Звказы текущего пользователя >> -->
  <div class="user-orders">
    <?php if (!$_smarty_tpl->tpl_vars['rsUserOrders']->value) {?>
    <div class="warning">
      <h1>У вас пока нет заказов.</h1>
    </div>
    <?php } else { ?>
    <table>
      <thead>
        <tr>
          <th scope="col">№</th>
          <th scope="col">Действие</th>
          <th scope="col">ID Заказа</th>
          <th scope="col">Статус</th>
          <th scope="col">Дата создания</th>
          <th scope="col">Дата оплаты</th>
          <th scope="col">Доп. информация</th>
        </tr>
      </thead>
      <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsUserOrders']->value, 'item', false, NULL, 'orders', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']++;
?>
        <tr>
          <th scope="row"><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration'] : null);?>
</td>
          <td><a href="#">Показать товар заказа</a></td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_created'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_payment'];?>
&nbsp</td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['comment'];?>
</td>
        </tr>
        <tr class="hideme purchasesForOrderId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
          <td colspan="7">
            <?php if ($_smarty_tpl->tpl_vars['item']->value['children']) {?>
            <table border="1">
              <tr>
                <th>№</th>
                <th>ID</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Количество</th>
              </tr>
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'itemChild', false, NULL, 'products', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
                <tr>
                  <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
</td>
                  <td><a href="/products/<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</a></td>
                  <td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['price'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['amount'];?>
</td>
                </tr>
              <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </table>
            <?php }?>
          </td>
        </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </tbody>
    </table>
    <?php }?>
  </div>
  <!-- << -->
</section><?php }
}
