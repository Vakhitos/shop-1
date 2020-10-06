<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-02 12:11:41
  from 'D:\OSPanel\domains\shop.local\views\admin\adminOrders.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ead394de9bfd4_82777317',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cadfc6ce8cddbb8dcd1b4f339e6342e19dd6bd91' => 
    array (
      0 => 'D:\\OSPanel\\domains\\shop.local\\views\\admin\\adminOrders.tpl',
      1 => 1588410700,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ead394de9bfd4_82777317 (Smarty_Internal_Template $_smarty_tpl) {
?><table border="1">


  <caption>Заказы</caption>
  <thead>
    <tr>
      <th>№</th>
      <th>Действие</th>
      <th>ID заказа</th>
      <th>Статус</th>
      <th>Дата заказа</th>
      <th>Дата оплаты</th>
      <th>Доп. информация</th>
      <th>Дата изминения заказа</th>
    </tr>
  </thead>
  <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsOrders']->value, 'item', false, NULL, 'orders', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']++;
?>
    <tr>
      <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration'] : null);?>
</td>
      <td><a href="#">Показать товар</a></td>
      <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
      <td><input type="checkbox" class="itemStatus" data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['status']) {?>checkbox="checkbox" <?php }?>> Закрыть </td>
      <td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_created'];?>
</td>
      <td>
        <input type="text" class="datePayment_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"  value="<?php echo $_smarty_tpl->tpl_vars['item']->value['date_payment'];?>
">
        <button type="button" class="datePaymentBtn" data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Сохранить</button>
      </td>
      <td><?php echo $_smarty_tpl->tpl_vars['item']->value['comment'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_modification'];?>
</td>
    </tr>

    <tr class="hiden purchasesForOrderId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
      <td colspan="8">
        <?php if ($_smarty_tpl->tpl_vars['item']->value['children']) {?>
        <table border="1" cellpadding="1" cellspacing="1" width="100%">
          <tr>
            <th>№</th>
            <th>ID</th>
            <th>Название</th>
            <th>Цена</th>
            <th>Количество</th>
          </tr>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'itemChild', false, NULL, 'products', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->value) {
?>
          <tr>
            <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration'] : null);?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
</td>
            <td><a href="/admin/products/<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
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
</table><?php }
}
