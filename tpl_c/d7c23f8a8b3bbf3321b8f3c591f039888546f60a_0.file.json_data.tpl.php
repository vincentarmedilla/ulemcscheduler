<?php
/* Smarty version 3.1.30, created on 2020-05-25 03:29:55
  from "C:\xampp2\htdocs\scheduleremc\tpl\json_data.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ecb1f938c8757_76494164',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd7c23f8a8b3bbf3321b8f3c591f039888546f60a' => 
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
function content_5ecb1f938c8757_76494164 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['data']->value != '') {
echo $_smarty_tpl->tpl_vars['data']->value;?>

<?php }
if ($_smarty_tpl->tpl_vars['error']->value != '') {
echo $_smarty_tpl->tpl_vars['error']->value;?>

<?php }
}
}
