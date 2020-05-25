<?php
/* Smarty version 3.1.30, created on 2020-05-24 17:24:30
  from "C:\xampp2\htdocs\scheduleremc\tpl\Ajax\reservation\update_successful.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5eca91ae0056a8_72439426',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5b4787bdf18c218f3247940e0ec476d89378c7b7' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\scheduleremc\\tpl\\Ajax\\reservation\\update_successful.tpl',
      1 => 1590243420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Ajax/reservation/save_successful.tpl' => 1,
  ),
),false)) {
function content_5eca91ae0056a8_72439426 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_subTemplateRender("file:Ajax/reservation/save_successful.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('divId'=>"reservation-updated",'messageKey'=>"ReservationUpdated"), 0, false);
}
}
