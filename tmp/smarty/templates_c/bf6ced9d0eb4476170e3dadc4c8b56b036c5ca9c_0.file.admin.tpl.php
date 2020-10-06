<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-29 11:01:41
  from 'D:\OSPanel\domains\shop.local\views\admin\admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ea93465f07630_50529573',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf6ced9d0eb4476170e3dadc4c8b56b036c5ca9c' => 
    array (
      0 => 'D:\\OSPanel\\domains\\shop.local\\views\\admin\\admin.tpl',
      1 => 1588147300,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ea93465f07630_50529573 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="section">
<h2 class="section__title">Добавить категорию</h2>
  <form class="blockNewCategory">
    <div class="input-block">
      <small>Имя категории</small>
      <input type="text" name="newCategoryName" class="blockNewCategory__input newCategoryName" value=""> <br>
    </div>
    <div class="input-block">
      <small>Подкатегория</small>
      <select name="generalCatId" class="blockNewCategory__select">
        <option value="0">Главная категория
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </option>
      </select>
    </div>
    <button type="button" class="newCategoryBtn blockNewCategory__btn">Добавить</button>
  </form>

</section><?php }
}
