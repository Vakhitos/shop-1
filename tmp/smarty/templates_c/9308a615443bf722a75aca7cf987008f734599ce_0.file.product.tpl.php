<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-17 13:44:53
  from 'D:\OSPanel\domains\shop\views\default\product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e9988a5011914_57407175',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9308a615443bf722a75aca7cf987008f734599ce' => 
    array (
      0 => 'D:\\OSPanel\\domains\\shop\\views\\default\\product.tpl',
      1 => 1587120290,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e9988a5011914_57407175 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="section">
    <div class="row">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProduct']->value, 'rsProduc');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rsProduc']->value) {
?>
        <div class="col">
            <article class="product-view">
                <div class="product-view__content">
                    <div class="product-view__media">
                        <figure>
                            <img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['rsProduc']->value['image'];?>
" class="product-view__img" />
                            <div class="product-view__footer">
                                <span class="product-view__price">Стоимость: <?php echo $_smarty_tpl->tpl_vars['rsProduc']->value['price'];?>
 rub</span>
                                <a  data-id="<?php echo $_smarty_tpl->tpl_vars['rsProduc']->value['id'];?>
" href="#" class="product-view__link removeCart removeCart_<?php echo $_smarty_tpl->tpl_vars['rsProduc']->value['id'];?>
 <?php if (!$_smarty_tpl->tpl_vars['itemInCart']->value) {?> hide <?php }?>">Удалить из Карзины</a>
                                <a  data-id="<?php echo $_smarty_tpl->tpl_vars['rsProduc']->value['id'];?>
" href="#" class="product-view__link addCart addCart_<?php echo $_smarty_tpl->tpl_vars['rsProduc']->value['id'];?>
 <?php if ($_smarty_tpl->tpl_vars['itemInCart']->value) {?> hide <?php }?>">Положить в Карзину</a>
                            </div>
                        </figure>
                    </div>
                    <div class="product-view__info">
                        <hgroup>
                            <h1 class="product-view__name"><?php echo $_smarty_tpl->tpl_vars['rsProduc']->value['name'];?>
</h1>
                        </hgroup>
                        <p class="product-view__desc"><?php echo $_smarty_tpl->tpl_vars['rsProduc']->value['description'];?>
</p>
                    </div>
                </div>
            </article>
        </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
</section>

<?php echo '<script'; ?>
>

<?php echo '</script'; ?>
><?php }
}
