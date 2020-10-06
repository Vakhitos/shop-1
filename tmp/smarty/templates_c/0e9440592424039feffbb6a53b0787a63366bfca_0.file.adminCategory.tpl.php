<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-29 11:43:18
  from 'D:\OSPanel\domains\shop.local\views\admin\adminCategory.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ea93e26a3b591_63545103',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0e9440592424039feffbb6a53b0787a63366bfca' => 
    array (
      0 => 'D:\\OSPanel\\domains\\shop.local\\views\\admin\\adminCategory.tpl',
      1 => 1588149796,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ea93e26a3b591_63545103 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="updateCategory">
  <table>
    <caption>Редактирование категорий</caption>
    <thead>
      <th>№</ht>
      <!-- <th>ID</ht> -->
      <th>Название</ht>
      <th>Выбор категории</ht>
      <th>Действие</ht>
    </thead>
    <tbody>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item', false, NULL, 'categories', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_categories']->value['iteration']++;
?>


      <tr>

        <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_categories']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_categories']->value['iteration'] : null);?>
</td>

        <!-- <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td> -->
        <td>
          <input type="edit" class="itemName_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" />
        </td>
        <td>
          <select name="" id="" class="parentId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
            <option value="0">
              Гланая категория

              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsMainCategories']->value, 'mainItem');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['mainItem']->value) {
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['mainItem']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['parent_id'] == $_smarty_tpl->tpl_vars['mainItem']->value['id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['mainItem']->value['name'];?>

              <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

          </select>
        </td>
        <td>
          <button class="updateCategory__btn" data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
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
