<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-04 16:13:57
  from 'D:\OSPanel\domains\shop.my\views\default\product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eb015159a6d32_54888528',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c1f4f1576bda7f8e59794c592f9ecfee45ed1813' => 
    array (
      0 => 'D:\\OSPanel\\domains\\shop.my\\views\\default\\product.tpl',
      1 => 1588447050,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eb015159a6d32_54888528 (Smarty_Internal_Template $_smarty_tpl) {
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
" 
                                href="#" class="product-view__link removeCart removeCart_<?php echo $_smarty_tpl->tpl_vars['rsProduc']->value['id'];?>
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

<?php }
}
