<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-17 07:46:26
  from 'D:\OSPanel\domains\shop\views\default\category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e9934a2ce68f0_72463746',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4627984ffecdea5818b05e7276dd1061d03fe15c' => 
    array (
      0 => 'D:\\OSPanel\\domains\\shop\\views\\default\\category.tpl',
      1 => 1587098767,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e9934a2ce68f0_72463746 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="section">
    <hgroup>
        <h1><?php echo $_smarty_tpl->tpl_vars['rsCategory']->value['name'];?>
</h1>
    </hgroup>

        <?php if ($_smarty_tpl->tpl_vars['rsProducts']->value) {?>
        <div class="product-line">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
            <div class="col">
                <!-- Карточка товара >> -->
                <article class="card-product">
                    <figure class="card-product__media">
                        <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/">
                            <img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" class="card-product__img" />
                        </a>
                    </figure>
    
                    <div class="card-product__footer">
                        <h2 class="card-product__name">
                            <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
                        </h2>
                        <span class="card-product__price"><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
</span>
                    </div>
                </article>
                <!-- << Карточка товара -->
            </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
        <?php } elseif ($_smarty_tpl->tpl_vars['rsChildCats']->value) {?> 
        <div class="product-line">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsChildCats']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
            <div class="col">
                <a href="/category/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/">
                <article class="card-category">
                        <h2 class="card-category__name"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</h2>
                </article>
                </a>
            </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
        <?php } else { ?>
        <div class="warning">
            <h1>В данном разделе товары отсутствуют.</h1>
        </div>
        <?php }?>
    </div>

</section><?php }
}
