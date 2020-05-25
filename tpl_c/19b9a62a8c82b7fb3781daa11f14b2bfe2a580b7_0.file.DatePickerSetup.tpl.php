<?php
/* Smarty version 3.1.30, created on 2020-05-25 03:29:54
  from "C:\xampp2\htdocs\scheduleremc\tpl\Controls\DatePickerSetup.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ecb1f926ba829_23668303',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '19b9a62a8c82b7fb3781daa11f14b2bfe2a580b7' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\scheduleremc\\tpl\\Controls\\DatePickerSetup.tpl',
      1 => 1590243420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ecb1f926ba829_23668303 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'datePickerDateFormat' => 
  array (
    'compiled_filepath' => 'C:\\xampp2\\htdocs\\scheduleremc\\tpl_c\\19b9a62a8c82b7fb3781daa11f14b2bfe2a580b7_0.file.DatePickerSetup.tpl.php',
    'uid' => '19b9a62a8c82b7fb3781daa11f14b2bfe2a580b7',
    'call_name' => 'smarty_template_function_datePickerDateFormat_21401568275ecb1f926ad863_22678453',
  ),
));
?>


<?php echo '<script'; ?>
 type="text/javascript">
    $(function () {
        $("#<?php echo $_smarty_tpl->tpl_vars['ControlId']->value;?>
").<?php if ($_smarty_tpl->tpl_vars['HasTimepicker']->value) {?>datetimepicker<?php } else { ?>datepicker<?php }?>({
            numberOfMonths: <?php echo $_smarty_tpl->tpl_vars['NumberOfMonths']->value;?>
,
            showButtonPanel: <?php echo $_smarty_tpl->tpl_vars['ShowButtonPanel']->value;?>
,
            onSelect: <?php echo $_smarty_tpl->tpl_vars['OnSelect']->value;?>
,
            dayNames: <?php echo $_smarty_tpl->tpl_vars['DayNames']->value;?>
,
            dayNamesShort: <?php echo $_smarty_tpl->tpl_vars['DayNamesShort']->value;?>
,
            dayNamesMin: <?php echo $_smarty_tpl->tpl_vars['DayNamesMin']->value;?>
,
            dateFormat: '<?php echo $_smarty_tpl->tpl_vars['DateFormat']->value;?>
',
            <?php if ($_smarty_tpl->tpl_vars['FirstDay']->value >= 0 && $_smarty_tpl->tpl_vars['FirstDay']->value <= 6) {?>
            firstDay: <?php echo $_smarty_tpl->tpl_vars['FirstDay']->value;?>
,
            <?php }?>
            monthNames: <?php echo $_smarty_tpl->tpl_vars['MonthNames']->value;?>
,
            monthNamesShort: <?php echo $_smarty_tpl->tpl_vars['MonthNamesShort']->value;?>
,
            currentText: "<?php ob_start();
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Today'),$_smarty_tpl);
$_prefixVariable24=ob_get_clean();
echo strtr($_prefixVariable24, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
",
            timeFormat: "<?php echo $_smarty_tpl->tpl_vars['TimeFormat']->value;?>
",
            altFieldTimeOnly: false,
            controlType: 'select'
            <?php if ($_smarty_tpl->tpl_vars['AltId']->value != '') {?>
            ,
            altField: "#<?php echo $_smarty_tpl->tpl_vars['AltId']->value;?>
",
            altFormat: '<?php echo $_smarty_tpl->tpl_vars['AltFormat']->value;?>
'
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['DefaultDate']->value) {?>
            ,
            defaultDate: <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'datePickerDateFormat', array('date'=>$_smarty_tpl->tpl_vars['DefaultDate']->value), true);?>

            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['MinDate']->value) {?>
            ,
            minDate: <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'datePickerDateFormat', array('date'=>$_smarty_tpl->tpl_vars['MinDate']->value->AddDays(1)), true);?>

            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['MaxDate']->value) {?>
            ,
            maxDate: <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'datePickerDateFormat', array('date'=>$_smarty_tpl->tpl_vars['MaxDate']->value->AddDays(1)), true);?>

            <?php }?>
            });

        <?php if ($_smarty_tpl->tpl_vars['AltId']->value != '') {?>
        $("#<?php echo $_smarty_tpl->tpl_vars['ControlId']->value;?>
").change(function () {
            if ($(this).val() == '') {
                $("#<?php echo $_smarty_tpl->tpl_vars['AltId']->value;?>
").val('');
            }
            else {
                var dateVal = $("#<?php echo $_smarty_tpl->tpl_vars['ControlId']->value;?>
").<?php if ($_smarty_tpl->tpl_vars['HasTimepicker']->value) {?>datetimepicker<?php } else { ?>datepicker<?php }?>('getDate');
                var dateString = dateVal.getFullYear() + '-' + ('0' + (dateVal.getMonth() + 1)).slice(-2) + '-' + ('0' + dateVal.getDate()).slice(-2);
                <?php if ($_smarty_tpl->tpl_vars['HasTimepicker']->value) {?>
                dateString = dateString + ' ' + dateVal.getHours() + ':' + dateVal.getMinutes();
                <?php }?>
                $("#<?php echo $_smarty_tpl->tpl_vars['AltId']->value;?>
").val(dateString);
            }
        });
        <?php }?>

    });
<?php echo '</script'; ?>
><?php }
/* smarty_template_function_datePickerDateFormat_21401568275ecb1f926ad863_22678453 */
if (!function_exists('smarty_template_function_datePickerDateFormat_21401568275ecb1f926ad863_22678453')) {
function smarty_template_function_datePickerDateFormat_21401568275ecb1f926ad863_22678453($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
new Date(<?php echo $_smarty_tpl->tpl_vars['date']->value->Year();?>
, <?php echo $_smarty_tpl->tpl_vars['date']->value->Month()-1;?>
, <?php echo $_smarty_tpl->tpl_vars['date']->value->Day();?>
)
<?php
}}
/*/ smarty_template_function_datePickerDateFormat_21401568275ecb1f926ad863_22678453 */
}
