<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-03 16:08:21
  from 'D:\OSPanel\domains\shop.my\views\admin\adminCategory.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eaec2456c4be9_46958605',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed8fdb01f967130b1c3b4824077ed033eecad65e' => 
    array (
      0 => 'D:\\OSPanel\\domains\\shop.my\\views\\admin\\adminCategory.tpl',
      1 => 1588149796,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eaec2456c4be9_46958605 (Smarty_Internal_Template $_smarty_tpl) {
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
