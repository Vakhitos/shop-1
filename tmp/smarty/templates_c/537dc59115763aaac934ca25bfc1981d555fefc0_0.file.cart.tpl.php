<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-17 14:27:28
  from 'D:\OSPanel\domains\shop\views\default\cart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e9992a036e3e4_89692446',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '537dc59115763aaac934ca25bfc1981d555fefc0' => 
    array (
      0 => 'D:\\OSPanel\\domains\\shop\\views\\default\\cart.tpl',
      1 => 1587122821,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e9992a036e3e4_89692446 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="section">
    <hgroup>
        <h1>Карзина</h1>
    </hgroup>
    <div class="row">
        <div class="col">
            <?php if (!$_smarty_tpl->tpl_vars['rsProducts']->value) {?>
            <div class="warning">
                <h1>Ваша карзина пуста.</h1>
            </div>
            <?php } else { ?>

            <div class="block-cart">
                <h1 class="block-cart__title">Вашы заказы:</h1>
                <table class="block-cart__table">
                    <tr class="block-cart__head">
                        <td class="block-cart__col">Номер</td>
                        <td class="block-cart__col">Ноименование</td>
                        <td class="block-cart__col">Количество</td>
                        <td class="block-cart__col">Цена за единицу</td>
                        <td class="block-cart__col">Цена</td>
                        <td class="block-cart__col">Действия</td>
                    </tr>
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
                            <input type="text" data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="itemCnt itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="1">
                        </td>
                        <td class="block-cart__col">
                            <span class="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
</span>
                        </td>
                        <td class="block-cart__col">
                            <span class="block-cart__price itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
 itemRealPrice"><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
</span>
                        </td>
                        <td class="block-cart__col">
                            <a data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" href="#" class="product-view__link removeCart removeCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Удалить</a>
                            <a data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" href="#" class="product-view__link addCart addCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
 hide">Востановить</a>
                        </td>

                    </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                </table>
            </div>

            <?php }?>
        </div>

    </div>
</section><?php }
}
