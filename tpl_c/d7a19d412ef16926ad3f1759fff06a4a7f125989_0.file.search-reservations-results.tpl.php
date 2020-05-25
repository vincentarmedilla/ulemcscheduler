<?php
/* Smarty version 3.1.30, created on 2020-05-24 03:25:48
  from "C:\xampp\htdocs\emcscheduler\tpl\Search\search-reservations-results.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ec9cd1c739a92_66490451',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd7a19d412ef16926ad3f1759fff06a4a7f125989' => 
    array (
      0 => 'C:\\xampp\\htdocs\\emcscheduler\\tpl\\Search\\search-reservations-results.tpl',
      1 => 1590256402,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ec9cd1c739a92_66490451 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_cycle')) require_once 'C:\\xampp\\htdocs\\emcscheduler\\lib\\external\\Smarty\\plugins\\function.cycle.php';
?>

<style>
    #rerank_details {
display: none;
float:right;
background: white;
position: absolute;
right:0;
border: 1px solid black;
border-radius: 6px;
width: 150px;
padding: 15px;
overflow: hidden;
text-shadow: none;
z-index: 50;
}
</style>
<?php echo '<script'; ?>
>
$(document).ready(function() {
    $('input[type="checkbox"]').click(function() {
        var index = $(this).attr('name').substr(3);
        index--;
        $('table tr').each(function() { 
            $('td:eq(' + index + ')',this).toggle();
        });
        $('th.' + $(this).attr('name')).toggle();
    });
});

$(function () {
    
    
    
    $('a.showreranks').click(function () {
      position = $(this).position();
      $('body').append('<div class="overlay"></div>')
      $('#rerank_details').slideToggle(300);
      $('#rerank_details').css('top', position.top + 17);
      return false;
    });
});

(function (a) { 
  
  jQuery.fn.screencenter = function () {
      this.css("position","absolute");
      this.css("top", (($(window).height() - this.outerHeight()) / 2) + $(window).scrollTop() + "px");
      this.css("left", (($(window).width() - this.outerWidth()) / 2) + $(window).scrollLeft() + "px");
      return this;
  }
  
})(jQuery);
<?php echo '</script'; ?>
>
<div id="rerank_details" class="gen_comment">
        <div id="customize-column"><div class=""><div><label><input type="checkbox" name="col1" checked="checked">User</label></div><div><label><input type="checkbox" checked="checked" name="col2"> Resources</label></div><div><label><input type="checkbox" checked="checked" name="col3"> Title</label></div><div><label><input type="checkbox" checked="checked" name="col4"> Description</label></div><div><label><input type="checkbox" checked="checked" name="col5"> Begin</label></div><div><label><input type="checkbox" checked="checked" name="col6"> End</label></div><div><label><input type="checkbox" checked="checked" name="col7"> Duration</label></div><div><label><input type="checkbox" checked="checked" name="col8"> Order No.</label></div><div><label><input type="checkbox" checked="checked" name="col9"> Created</label></div><div><label><input type="checkbox" checked="checked" name="col10"> Last Modified</label></div></div></div>
        
</div>


<div id="report-actions">
		

		
		<a href="#" id="btnCustomizeColumns" class="showreranks"><span class="fa fa-filter"></span> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Columns'),$_smarty_tpl);?>
</a>

		
	</div>
<table class="table" id="reservationTable">
	<thead>
	<tr>
		<th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'OwnerUser'),$_smarty_tpl);?>
</th>
		<th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Resource'),$_smarty_tpl);?>
</th>
		<th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ProjectLead'),$_smarty_tpl);?>
</th>
		<th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Title'),$_smarty_tpl);?>
</th>
		<th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Description'),$_smarty_tpl);?>
</th>
		<th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ClientName'),$_smarty_tpl);?>
</th>
		<th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ProjOrderNo'),$_smarty_tpl);?>
</th>
		<th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'RequestNo'),$_smarty_tpl);?>
</th>
		<th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'BeginDate'),$_smarty_tpl);?>
</th>
		<th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'EndDate'),$_smarty_tpl);?>
</th>
		<th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Duration'),$_smarty_tpl);?>
</th>
		<th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Created'),$_smarty_tpl);?>
</th>
		<th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'LastModified'),$_smarty_tpl);?>
</th>
	</tr>
	</thead>
	<tbody>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Reservations']->value, 'reservation');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['reservation']->value) {
?>
		<?php smarty_function_cycle(array('values'=>'row0,row1','assign'=>'rowCss'),$_smarty_tpl);?>

		<?php if ($_smarty_tpl->tpl_vars['reservation']->value->RequiresApproval) {?>
			<?php $_smarty_tpl->_assignInScope('rowCss', 'pending');
?>
		<?php }?>
		<?php $_smarty_tpl->_assignInScope('reservationId', $_smarty_tpl->tpl_vars['reservation']->value->ReservationId);
?>
		<tr class="<?php echo $_smarty_tpl->tpl_vars['rowCss']->value;?>
 editable" data-seriesId="<?php echo $_smarty_tpl->tpl_vars['reservation']->value->SeriesId;?>
" data-refnum="<?php echo $_smarty_tpl->tpl_vars['reservation']->value->ReferenceNumber;?>
">
			<td class="user"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['fullname'][0][0]->DisplayFullName(array('first'=>$_smarty_tpl->tpl_vars['reservation']->value->FirstName,'last'=>$_smarty_tpl->tpl_vars['reservation']->value->LastName,'ignorePrivacy'=>($_smarty_tpl->tpl_vars['reservation']->value->OwnerId == $_smarty_tpl->tpl_vars['UserId']->value)),$_smarty_tpl);?>
</td>
			<td class="resource"><?php echo $_smarty_tpl->tpl_vars['reservation']->value->ResourceName;?>
</td>
			
			<td class="user">
			    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['reservation']->value->ProjLead, 'p');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
?>
    				<?php echo $_smarty_tpl->tpl_vars['p']->value;?>

				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			</td>
			
			<td class="title"><?php echo $_smarty_tpl->tpl_vars['reservation']->value->Title;?>
</td>
			<td class="description"><?php echo $_smarty_tpl->tpl_vars['reservation']->value->Description;?>
</td>
			<td class="clientname"><?php echo $_smarty_tpl->tpl_vars['reservation']->value->Client_name;?>
</td>
			<td class="description"><?php echo $_smarty_tpl->tpl_vars['reservation']->value->project_no;?>
</td>
			<td class="description"><?php echo $_smarty_tpl->tpl_vars['reservation']->value->Request_No;?>
</td>
			<td class="date"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['reservation']->value->StartDate,'timezone'=>$_smarty_tpl->tpl_vars['Timezone']->value,'key'=>'short_reservation_date'),$_smarty_tpl);?>
</td>
			<td class="date"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['reservation']->value->EndDate,'timezone'=>$_smarty_tpl->tpl_vars['Timezone']->value,'key'=>'short_reservation_date'),$_smarty_tpl);?>
</td>
			<td class="duration"><?php echo $_smarty_tpl->tpl_vars['reservation']->value->GetDuration()->__toString();?>
</td>
			<td class="created"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['reservation']->value->CreatedDate,'timezone'=>$_smarty_tpl->tpl_vars['Timezone']->value,'key'=>'short_datetime'),$_smarty_tpl);?>
</td>
			<td class="created"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['reservation']->value->ModifiedDate,'timezone'=>$_smarty_tpl->tpl_vars['Timezone']->value,'key'=>'short_datetime'),$_smarty_tpl);?>
</td>
		</tr>

		
		
		
		
		
		
		


	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</tbody>
</table>
<?php echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function () {
		$('#report-no-data, #report-results').trigger('loaded');
	});
<?php echo '</script'; ?>
><?php }
}
