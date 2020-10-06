<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-16 17:55:29
  from 'D:\OSPanel\domains\shop\views\default\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e9871e1867e43_19844241',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e62e368ae6d6bc48b2866893d82662a8370ecbe' => 
    array (
      0 => 'D:\\OSPanel\\domains\\shop\\views\\default\\index.tpl',
      1 => 1587048901,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e9871e1867e43_19844241 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="section">
  <hgroup>
    <h1>Последнее поступление</h1>
  </hgroup>

  <div class="product-line">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>
    <div class="col">
      <!-- Карточка товара >> -->
      <article class="card-product">
        <figure class="card-product__media">
          <a href="product/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
/">
            <img
              src="/images/products/<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
"
              class="card-product__img"
            />
          </a>
        </figure>

        <div class="card-product__footer">
          <h2 class="card-product__name">
            <a href="product/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</a>
          </h2>
          <span class="card-product__price"><?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
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
</section>
<?php }
}
