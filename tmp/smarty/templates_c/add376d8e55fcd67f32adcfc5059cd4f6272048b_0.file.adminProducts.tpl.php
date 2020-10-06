<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-29 19:05:18
  from 'D:\OSPanel\domains\shop.local\views\admin\adminProducts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ea9a5be91b4f2_17722785',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'add376d8e55fcd67f32adcfc5059cd4f6272048b' => 
    array (
      0 => 'D:\\OSPanel\\domains\\shop.local\\views\\admin\\adminProducts.tpl',
      1 => 1588176316,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ea9a5be91b4f2_17722785 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="section">
  <h2 class="section__title">Добавить товар</h2>
  <form class="selectNewProduct">
    <div class="input-block">
      <small>Название</small>
      <input type="edit" class="newItemName" value="">
    </div>
    <div class="input-block">
      <small>Цена</small>
      <input type="edit" class="newItemPrice" value="">
    </div>
    <div class="input-block">
      <small>Категория</small>
      <select class="newItemCatId">
        <option value="0">Выберете категорию
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'itemCat');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['itemCat']->value) {
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['itemCat']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['itemCat']->value['name'];?>

          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </select>
    </div>
    <div class="input-block">
      <small>Описание</small>
      <textarea type="text" class="newItemDesc"></textarea>
    </div>
    <button class="addProductBtn">Сохранить</button>
  </form>
</section>

<!-- Вывод товаров для редактирования -->

<div class="updateProduct">
  <table>
    <caption>Редактирование товаров</caption>
    <thead>
      <th>№</th>
      <th>ID</th>
      <th>Название</th>
      <th>Цена</th>
      <th>Категория</th>
      <th>Описание</th>
      <th>Удалить</th>
      <th>Изображение</th>

      <th>Сохранить</th>
    </thead>

    <tbody>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item', false, NULL, 'products', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
      <tr>
        <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
        <td><input type="edit"  class="itemName_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"></td>
        <td><input type="edit"  class="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
"></td>
        <td>
          <select name="" class="itemCatId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
            <option value="0">Главная категория
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'itemCat');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['itemCat']->value) {
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['itemCat']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['category_id'] == $_smarty_tpl->tpl_vars['itemCat']->value['id']) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['itemCat']->value['name'];?>
 </option> <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> </select> </td> <td>
              <textarea class="itemDesc_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
</textarea>
        </td>
        <td>
          <input type="checkbox" class="itemStatus_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['status'] == 0) {?> checked="checked" <?php }?>"> </td> <td>
          <?php if ($_smarty_tpl->tpl_vars['item']->value['image']) {?>
          <img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
">
          <?php }?>
          <form action="/admin/upload/" method="POST" enctype="multipart/form-data">
            <input type="file" name="filename"> <br>
            <input type="hidden" name="itemId" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"> <br>
            <button type="submit">Загрузить</button>
          </form>
        </td>
        <td>
          <button type="button" class="updateProductBtn" data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Сохранить</button>
        </td>
      </tr>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
  </table>
</div><?php }
}
