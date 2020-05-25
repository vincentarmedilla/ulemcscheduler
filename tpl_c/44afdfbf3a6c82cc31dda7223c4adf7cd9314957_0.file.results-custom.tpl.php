<?php
/* Smarty version 3.1.30, created on 2020-05-25 00:35:58
  from "C:\xampp2\htdocs\scheduleremc\tpl\Reports\results-custom.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ecaf6ce2c5036_73691203',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '44afdfbf3a6c82cc31dda7223c4adf7cd9314957' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\scheduleremc\\tpl\\Reports\\results-custom.tpl',
      1 => 1590298426,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ecaf6ce2c5036_73691203 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_cycle')) require_once 'C:\\xampp2\\htdocs\\scheduleremc\\lib\\external\\Smarty\\plugins\\function.cycle.php';
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
        <div id="customize-column"><div class=""><div><label><input type="checkbox" name="Resource" checked="checked">Resource</label></div><div><label><input type="checkbox" checked="checked" name="Begin"> Begin</label></div><div><label><input type="checkbox" checked="checked" name="End">End</label></div><div><label><input type="checkbox" checked="checked" name="Duration">Duration</label></div><div><label><input type="checkbox" checked="checked" name="Hours">Hours</label></div><div><label><input type="checkbox" checked="checked" name="Title">Title</label></div><div><label><input type="checkbox" checked="checked" name="Description">Description</label></div><div><label><input type="checkbox" checked="checked" name="User">User</label></div><div><label><input type="checkbox" checked="checked" name="First Name">First Name</label></div><div><label><input type="checkbox" checked="checked" name="Last Name">Last Name</label></div><div><label><input type="checkbox" checked="checked" name="Email">Email</label></div><div><label><input type="checkbox" checked="checked" name="Organization">Organization</label></div><div><label><input type="checkbox" checked="checked" name="Groups"> Groups</label></div><div><label><input type="checkbox" checked="checked" name="Created">Created</label></div><div><label><input type="checkbox" checked="checked" name="Last Modified"> Last Modified</label></div><div><label><input type="checkbox" checked="checked" name="Status"> Status</label></div><div><label><input type="checkbox" checked="checked" name="Check In Time"> Check In Time</label></div><div><label><input type="checkbox" checked="checked" name="Check Out Time"> Check Out Time</label></div><div><label><input type="checkbox" checked="checked" name="Original End"> Original End</label></div></div></div>
        
</div>

<?php if ($_smarty_tpl->tpl_vars['Report']->value->ResultCount() > 0) {?>
	<div id="report-actions">
		<a href="#" id="btnChart"><span class="fa fa-bar-chart"></span> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ViewAsChart'),$_smarty_tpl);?>
</a> |
		<?php if (!$_smarty_tpl->tpl_vars['HideSave']->value) {?>
			<a href="#" id="btnSaveReportPrompt"><span class="fa fa-save"></span> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'SaveThisReport'),$_smarty_tpl);?>
</a> |
		<?php }?>

		<a href="#" id="btnCsv"><span class="fa fa-download"></span> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ExportToCSV'),$_smarty_tpl);?>
</a> |
		<a href="#" id="btnPrint"><span class="fa fa-print"></span> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Print'),$_smarty_tpl);?>
</a> |
		<a href="#" id="" class="showreranks"><span class="fa fa-filter"></span> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Columns'),$_smarty_tpl);?>
</a>

		<form id="saveSelectedColumns" method="post" role="form" action="<?php echo $_SERVER['SCRIPT_NAME'];?>
?<?php echo QueryStringKeys::ACTION;?>
=<?php echo ReportActions::SaveColumns;?>
">
			<input <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'SELECTED_COLUMNS'),$_smarty_tpl);?>
 id="selectedColumns" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['SelectedColumns']->value;?>
" />
		</form>
	</div>
	<div id="customize-columns" style="top:1px;"></div>

	<table width="100%" id="report-results" chart-type="<?php echo $_smarty_tpl->tpl_vars['Definition']->value->GetChartType();?>
">
        <thead>
		<tr>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Definition']->value->GetColumnHeaders(), 'column');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['column']->value) {
?>
				<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "columnTitle", null, null);
if ($_smarty_tpl->tpl_vars['column']->value->HasTitle()) {
echo $_smarty_tpl->tpl_vars['column']->value->Title();
} else {
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>$_smarty_tpl->tpl_vars['column']->value->TitleKey()),$_smarty_tpl);
}
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
?>

				<th class="<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'columnTitle');?>
" data-columnTitle="<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'columnTitle');?>
" <?php if ($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'columnTitle') == 'Reference Number') {?> style="display:none;" <?php }?>>
					<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'columnTitle');?>

				</th>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</tr>
        </thead>
        <tbody>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Report']->value->GetData()->Rows(), 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
			<?php smarty_function_cycle(array('values'=>',alt','assign'=>'rowCss'),$_smarty_tpl);?>

			<tr class="<?php echo $_smarty_tpl->tpl_vars['rowCss']->value;?>
">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Definition']->value->GetRow($_smarty_tpl->tpl_vars['row']->value), 'cell');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cell']->value) {
?>
					<td chart-value="<?php echo $_smarty_tpl->tpl_vars['cell']->value->ChartValue();?>
" chart-column-type="<?php echo $_smarty_tpl->tpl_vars['cell']->value->GetChartColumnType();?>
"
						chart-group="<?php echo $_smarty_tpl->tpl_vars['cell']->value->GetChartGroup();?>
"><?php echo $_smarty_tpl->tpl_vars['cell']->value->Value();?>
</td>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			</tr>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </tbody>
	</table>
	<h4><?php echo $_smarty_tpl->tpl_vars['Report']->value->ResultCount();?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Rows'),$_smarty_tpl);?>

		<?php if ($_smarty_tpl->tpl_vars['Definition']->value->GetTotal() != '') {?>
			| <?php echo $_smarty_tpl->tpl_vars['Definition']->value->GetTotal();?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Total'),$_smarty_tpl);?>

		<?php }?>
	</h4>
<?php } else { ?>
	<h2 id="report-no-data" class="no-data" style="text-align: center;"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'NoResultsFound'),$_smarty_tpl);?>
</h2>
<?php }?>

<?php echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function () {
		$('#report-no-data, #report-results').trigger('loaded');
	});
<?php echo '</script'; ?>
><?php }
}
