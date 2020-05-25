<?php
/* Smarty version 3.1.30, created on 2020-05-24 13:00:10
  from "C:\xampp2\htdocs\scheduleremc\tpl\json_data.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5eca53ba545ef2_46986408',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '423b09b4edc4f5be05170c09b3d7e12083ad5f1f' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\scheduleremc\\tpl\\json_data.tpl',
      1 => 1590243420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eca53ba545ef2_46986408 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['data']->value != '') {
echo $_smarty_tpl->tpl_vars['data']->value;?>

<?php }
if ($_smarty_tpl->tpl_vars['error']->value != '') {
echo $_smarty_tpl->tpl_vars['error']->value;?>

<?php }
}
}
