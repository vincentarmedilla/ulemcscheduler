<?php
/* Smarty version 3.1.30, created on 2020-05-23 20:07:55
  from "C:\xampp\htdocs\emcscheduler\tpl\Ajax\respopup.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ec9667b32f7f9_20190299',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7d3ae6bb710fc5050b2ac93cc7065f1d59d78a1a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\emcscheduler\\tpl\\Ajax\\respopup.tpl',
      1 => 1590204904,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ec9667b32f7f9_20190299 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'C:\\xampp\\htdocs\\emcscheduler\\lib\\external\\Smarty\\plugins\\modifier.truncate.php';
?>

<style>
    .customAttribute {
        float: left;
        padding-right: 10px;
    }
    .attributeValue {
        float:left;
    }
    .temp {
    border: 2px solid #408AD2 ;
    text-align:center;
    }
</style>
<?php if ($_smarty_tpl->tpl_vars['status']->value == '2') {?>
<div style="background-color: #408AD2 ; color:white;text-align:center;">CONFIRMED/RESERVED</div>
<?php } else { ?>
<div class="temp">TEMPORARY</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['authorized']->value) {?>
	<?php if (in_array('owner',$_smarty_tpl->tpl_vars['userFields']->value)) {?>
    <?php echo $_smarty_tpl->tpl_vars['fullName']->value;?>
 (<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
) <br>
    <?php }?>
    
    <?php if (in_array('date_time',$_smarty_tpl->tpl_vars['userFields']->value)) {?>
    <strong>Date and Time:</strong> <!--  <?php $_smarty_tpl->_assignInScope('key', "res_popup");
?>-->
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['startDate']->value,'key'=>'res_popup'),$_smarty_tpl);?>
 - <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['endDate']->value,'key'=>$_smarty_tpl->tpl_vars['key']->value),$_smarty_tpl);?>
 <br>
    <?php if ($_smarty_tpl->tpl_vars['startDate']->value->DateEquals($_smarty_tpl->tpl_vars['endDate']->value)) {?>
        <?php $_smarty_tpl->_assignInScope('key', "res_popup_time");
?>
    <?php }?>
    <?php }?>
    
    <?php if (in_array('duration',$_smarty_tpl->tpl_vars['userFields']->value)) {?>
<!--    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['startDate']->value,'key'=>'res_popup'),$_smarty_tpl);?>
 - <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['endDate']->value,'key'=>$_smarty_tpl->tpl_vars['key']->value),$_smarty_tpl);?>
 <br> -->
    <strong>Duration:</strong> <?php echo $_smarty_tpl->tpl_vars['duration']->value;?>
 <br>
    <?php }?>
    
    <?php if (in_array('title',$_smarty_tpl->tpl_vars['userFields']->value)) {?>
    <strong>Title:</strong> <?php if ($_smarty_tpl->tpl_vars['title']->value != '') {
echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['title']->value,30,"...",true);
} else {
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'NoTitleLabel'),$_smarty_tpl);
}?><br>
    <?php }?>
    
    <?php if (in_array('description',$_smarty_tpl->tpl_vars['userFields']->value)) {?>
    <strong>Description:</strong> <?php if ($_smarty_tpl->tpl_vars['summary']->value != '') {
echo nl2br(smarty_modifier_truncate($_smarty_tpl->tpl_vars['summary']->value,30,"..."));
} else {
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'NoDescriptionLabel'),$_smarty_tpl);
}?> <br>
    <?php }?>
    
     <?php if (in_array('resources',$_smarty_tpl->tpl_vars['userFields']->value)) {?>
    <strong>Resource:</strong>
<!--      <pre><?php echo print_r($_smarty_tpl->tpl_vars['engineers']->value);?>
</pre> -->
<!--     <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['resources']->value, 'resource', false, NULL, 'resource_loop', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['resource']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_resource_loop']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_resource_loop']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_resource_loop']->value['iteration'] == $_smarty_tpl->tpl_vars['__smarty_foreach_resource_loop']->value['total'];
?> -->
<!--     	<?php $_smarty_tpl->_assignInScope('newname', explode(" ",$_smarty_tpl->tpl_vars['resource']->value->Name()));
?> -->
<!--     	<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', 'fullname', null);
echo $_smarty_tpl->tpl_vars['newname']->value[1];?>
 <?php echo $_smarty_tpl->tpl_vars['newname']->value[2];
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
?>
 -->
<!--     	 <?php if (!in_array($_smarty_tpl->tpl_vars['fullname']->value,$_smarty_tpl->tpl_vars['eng']->value)) {?> -->
<!--         <div><?php echo $_smarty_tpl->tpl_vars['resource']->value->Name();?>
</div> -->
<!--         <?php }?> -->
<!--         <?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_resource_loop']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_resource_loop']->value['last'] : null)) {?> <?php }?> -->
<!--     <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
 <br> -->

	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['resource']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
		<?php if ($_smarty_tpl->tpl_vars['value']->value['userid'] == '') {?>
			<div><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</div>
		<?php }?>
        
        
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
<br>
     <?php }?>
    
    <?php if (in_array('projectlead',$_smarty_tpl->tpl_vars['userFields']->value)) {?>
    <strong>Project Lead:</strong>  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['participants']->value, 'user', false, NULL, 'participant_loop', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_participant_loop']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_participant_loop']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_participant_loop']->value['iteration'] == $_smarty_tpl->tpl_vars['__smarty_foreach_participant_loop']->value['total'];
?>
    <?php if (!$_smarty_tpl->tpl_vars['user']->value->IsOwner()) {?>
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['fullname'][0][0]->DisplayFullName(array('first'=>$_smarty_tpl->tpl_vars['user']->value->FirstName,'last'=>$_smarty_tpl->tpl_vars['user']->value->LastName),$_smarty_tpl);?>

    <?php }?>
    <?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_participant_loop']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_participant_loop']->value['last'] : null)) {?>, <?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
<br>
<?php }?>
	
	 
	 <?php if (in_array('testengineer',$_smarty_tpl->tpl_vars['userFields']->value)) {?>
    <strong>Test Engineers:</strong>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['engineers']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
        <?php echo $_smarty_tpl->tpl_vars['value']->value['fullname'];?>
,
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    
    <br>
    
	<?php }?>
	
	<?php if (in_array('clientname',$_smarty_tpl->tpl_vars['userFields']->value)) {?>  
    <div><strong>Client Name:</strong> <?php echo $_smarty_tpl->tpl_vars['client_name']->value;?>
</div><br>
    <?php }?>
    
    <?php if (in_array('orderno',$_smarty_tpl->tpl_vars['userFields']->value)) {?>  
    <strong>Order No./Project No.:</strong> <?php echo $_smarty_tpl->tpl_vars['project']->value;?>
<br>
    <?php }?>
    
    <?php if (in_array('requestno',$_smarty_tpl->tpl_vars['userFields']->value)) {?>  
    <strong>Request No.:</strong> <?php echo $_smarty_tpl->tpl_vars['request_no']->value;?>
<br>
     <?php }?>
     
     <?php if (in_array('clientonsite',$_smarty_tpl->tpl_vars['userFields']->value)) {?>
    <strong>Client on site:</strong> <?php if ($_smarty_tpl->tpl_vars['cos']->value == '1') {?> Yes <?php } else { ?> No <?php }?><br>
    <?php }?>
    
     <?php if (in_array('sampleonsite',$_smarty_tpl->tpl_vars['userFields']->value)) {?>
    <strong>Sample on site:</strong> <?php if ($_smarty_tpl->tpl_vars['sos']->value == '1') {?> Yes <?php } else { ?> No <?php }?>
    <?php }?>
    
    


<?php }?>



<?php }
}
