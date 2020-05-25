<?php
/* Smarty version 3.1.30, created on 2020-05-25 03:29:53
  from "C:\xampp2\htdocs\scheduleremc\tpl\Reservation\participation.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ecb1f91c33aa1_11133910',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2ea8b5ddda1cb80c0380e02fb2951bbdc09e68ee' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\scheduleremc\\tpl\\Reservation\\participation.tpl',
      1 => 1590243420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ecb1f91c33aa1_11133910 (Smarty_Internal_Template $_smarty_tpl) {
?>

<style>
    .disabled {
  background-color: lightgrey;
  }
</style>
<div id="reservationParticipation">
	<div class="row">
	
		<label for="participantAutocomplete">Project Lead/Engineers</label>
		<span class="badge" id="participantBadge">0</span>
		<br/>
		<div class="participationText">
			<span class="hidden-xs"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Add'),$_smarty_tpl);?>
</span>
			<?php if ($_smarty_tpl->tpl_vars['CanViewAdmin']->value) {?>
				<input type="text" id="participantAutocomplete" class="form-control inline-block user-search" placeholder="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'NameOrEmail'),$_smarty_tpl);?>
"/>
			<?php } else { ?>
				



				<select id="project_lead" class="form-control selectpicker" data-live-search="true">
					<option value="" selected disabled>Select User</option>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['group_users']->value, 'i', false, 'myId', 'foo', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['myId']->value => $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['iteration']++;
?>
						
						<option value="<?php echo $_smarty_tpl->tpl_vars['i']->value['fname'];?>
 <?php echo $_smarty_tpl->tpl_vars['i']->value['lname'];?>
(<?php echo $_smarty_tpl->tpl_vars['i']->value['email'];?>
)=<?php echo $_smarty_tpl->tpl_vars['i']->value['user_id'];?>
">
							<?php echo $_smarty_tpl->tpl_vars['i']->value['fname'];?>
 - <?php echo $_smarty_tpl->tpl_vars['i']->value['email'];?>
 ---- <?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['iteration'] : null);?>

						</option>
						
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				</select>
			<?php }?>

			
		</div>
		

		<div id="participantList"></div>
	</div>

	<div class="row">
		<label for="participantAutocomplete">Human Resource/Test Engineers</label>
		<span class="badge" id="inviteeBadge">0</span>
		<br/>
		<div class="participationText">
			<span class="hidden-xs"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Add'),$_smarty_tpl);?>
</span>
			<?php if ($_smarty_tpl->tpl_vars['CanViewAdmin']->value) {?>
				<input type="text" id="inviteeAutocomplete" class="form-control inline-block user-search" placeholder="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'NameOrEmail'),$_smarty_tpl);?>
"/>
			<?php } else { ?>
				
				<select id="group_user_list_human_engineer" class="form-control selectpicker" data-live-search="true">
					<option  disabled selected>Select User</option>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, json_decode($_smarty_tpl->tpl_vars['ResourceGroupsAsJson']->value), 'result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
?>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['result']->value->children, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
							<?php ob_start();
echo $_smarty_tpl->tpl_vars['row']->value->email;
$_prefixVariable21=ob_get_clean();
if ($_prefixVariable21 != '') {?>
								
									<option resource-id-human-engineer="<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;?>
" value="<?php echo $_smarty_tpl->tpl_vars['row']->value->firstname;?>
 <?php echo $_smarty_tpl->tpl_vars['row']->value->lastname;?>
(<?php echo $_smarty_tpl->tpl_vars['row']->value->email;?>
)=<?php echo $_smarty_tpl->tpl_vars['row']->value->userid;?>
=<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_id;?>
">
										<?php echo $_smarty_tpl->tpl_vars['row']->value->resource_name;?>
 - <?php echo $_smarty_tpl->tpl_vars['row']->value->email;?>

									</option>
								
							<?php }?>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				</select>
			<?php }?>

			
		</div>

		<div id="inviteeList">

		</div>
	</div>

	

	<div class="modal fade" id="participantDialog" tabindex="-1" role="dialog" aria-labelledby="participantModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="participantModalLabel">Project Lead</h4>
				</div>
				<div class="modal-body scrollable-modal-content">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Done'),$_smarty_tpl);?>
</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="participantGroupDialog" tabindex="-1" role="dialog" aria-labelledby="participantGroupModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="participantGroupModalLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AddParticipants'),$_smarty_tpl);?>
</h4>
				</div>
				<div class="modal-body scrollable-modal-content">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Done'),$_smarty_tpl);?>
</button>
				</div>
			</div>
		</div>
	</div>
</div>
<?php }
}
