<?php
/* Smarty version 3.1.30, created on 2020-05-25 03:29:45
  from "C:\xampp2\htdocs\scheduleremc\tpl\Schedule\schedule.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ecb1f89e673b6_94930876',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b0ec448164158ac7be7255a1801c446c965232f8' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\scheduleremc\\tpl\\Schedule\\schedule.tpl',
      1 => 1590335654,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:globalheader.tpl' => 1,
    'file:Schedule/schedule-reservations-grid.tpl' => 1,
    'file:javascript-includes.tpl' => 1,
    'file:globalfooter.tpl' => 1,
  ),
),false)) {
function content_5ecb1f89e673b6_94930876 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'displayGeneralReserved' => 
  array (
    'compiled_filepath' => 'C:\\xampp2\\htdocs\\scheduleremc\\tpl_c\\b0ec448164158ac7be7255a1801c446c965232f8_0.file.schedule.tpl.php',
    'uid' => 'b0ec448164158ac7be7255a1801c446c965232f8',
    'call_name' => 'smarty_template_function_displayGeneralReserved_17324063365ecb1f89d22353_96965546',
  ),
  'displayMyReserved' => 
  array (
    'compiled_filepath' => 'C:\\xampp2\\htdocs\\scheduleremc\\tpl_c\\b0ec448164158ac7be7255a1801c446c965232f8_0.file.schedule.tpl.php',
    'uid' => 'b0ec448164158ac7be7255a1801c446c965232f8',
    'call_name' => 'smarty_template_function_displayMyReserved_17324063365ecb1f89d22353_96965546',
  ),
  'displayAdminReserved' => 
  array (
    'compiled_filepath' => 'C:\\xampp2\\htdocs\\scheduleremc\\tpl_c\\b0ec448164158ac7be7255a1801c446c965232f8_0.file.schedule.tpl.php',
    'uid' => 'b0ec448164158ac7be7255a1801c446c965232f8',
    'call_name' => 'smarty_template_function_displayAdminReserved_17324063365ecb1f89d22353_96965546',
  ),
  'displayMyParticipating' => 
  array (
    'compiled_filepath' => 'C:\\xampp2\\htdocs\\scheduleremc\\tpl_c\\b0ec448164158ac7be7255a1801c446c965232f8_0.file.schedule.tpl.php',
    'uid' => 'b0ec448164158ac7be7255a1801c446c965232f8',
    'call_name' => 'smarty_template_function_displayMyParticipating_17324063365ecb1f89d22353_96965546',
  ),
  'displayReserved' => 
  array (
    'compiled_filepath' => 'C:\\xampp2\\htdocs\\scheduleremc\\tpl_c\\b0ec448164158ac7be7255a1801c446c965232f8_0.file.schedule.tpl.php',
    'uid' => 'b0ec448164158ac7be7255a1801c446c965232f8',
    'call_name' => 'smarty_template_function_displayReserved_17324063365ecb1f89d22353_96965546',
  ),
  'displayPastTime' => 
  array (
    'compiled_filepath' => 'C:\\xampp2\\htdocs\\scheduleremc\\tpl_c\\b0ec448164158ac7be7255a1801c446c965232f8_0.file.schedule.tpl.php',
    'uid' => 'b0ec448164158ac7be7255a1801c446c965232f8',
    'call_name' => 'smarty_template_function_displayPastTime_17324063365ecb1f89d22353_96965546',
  ),
  'displayReservable' => 
  array (
    'compiled_filepath' => 'C:\\xampp2\\htdocs\\scheduleremc\\tpl_c\\b0ec448164158ac7be7255a1801c446c965232f8_0.file.schedule.tpl.php',
    'uid' => 'b0ec448164158ac7be7255a1801c446c965232f8',
    'call_name' => 'smarty_template_function_displayReservable_17324063365ecb1f89d22353_96965546',
  ),
  'displayRestricted' => 
  array (
    'compiled_filepath' => 'C:\\xampp2\\htdocs\\scheduleremc\\tpl_c\\b0ec448164158ac7be7255a1801c446c965232f8_0.file.schedule.tpl.php',
    'uid' => 'b0ec448164158ac7be7255a1801c446c965232f8',
    'call_name' => 'smarty_template_function_displayRestricted_17324063365ecb1f89d22353_96965546',
  ),
  'displayUnreservable' => 
  array (
    'compiled_filepath' => 'C:\\xampp2\\htdocs\\scheduleremc\\tpl_c\\b0ec448164158ac7be7255a1801c446c965232f8_0.file.schedule.tpl.php',
    'uid' => 'b0ec448164158ac7be7255a1801c446c965232f8',
    'call_name' => 'smarty_template_function_displayUnreservable_17324063365ecb1f89d22353_96965546',
  ),
  'displaySlot' => 
  array (
    'compiled_filepath' => 'C:\\xampp2\\htdocs\\scheduleremc\\tpl_c\\b0ec448164158ac7be7255a1801c446c965232f8_0.file.schedule.tpl.php',
    'uid' => 'b0ec448164158ac7be7255a1801c446c965232f8',
    'call_name' => 'smarty_template_function_displaySlot_17324063365ecb1f89d22353_96965546',
  ),
));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>



























<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12411657405ecb1f89dda3d2_10254527', "header");
?>


<div id="page-schedule">

    <?php $_smarty_tpl->_assignInScope('startTime', microtime(true));
?>

    <?php if ($_smarty_tpl->tpl_vars['ShowResourceWarning']->value) {?>
        <div class="alert alert-warning no-resource-warning"><span
                    class="fa fa-warning"></span> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'NoResources'),$_smarty_tpl);?>
 <a
                    href="admin/manage_resources.php"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AddResource'),$_smarty_tpl);?>
</a></div>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['CanViewAdmin']->value) {?>
        <div id="slow-schedule-warning" class="alert alert-warning no-show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

            We noticed this page is taking a long time to load. To speed ths page up, try
            reducing the number of <a class="alert-link" href="admin/manage_resources.php">resources</a> on this
            schedule or
            reducing the number of <a class="alert-link" href="admin/manage_schedules.php">days</a> being shown.
            <br/><br/>
            This page is taking <span id="warning-time"></span> seconds to load
            <span id="warning-resources"></span> resources for <span id="warning-days"></span> days.

            <button type="button" class="close close-forever" aria-label="Do not show again">
                <span aria-hidden="true">Do not show again</span>
            </button>
        </div>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['IsAccessible']->value) {?>
        <div id="defaultSetMessage" class="alert alert-success hidden">
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'DefaultScheduleSet'),$_smarty_tpl);?>

        </div>
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3342757785ecb1f89e12638_62400028', "schedule_control");
?>


        <?php if ($_smarty_tpl->tpl_vars['ScheduleAvailabilityEarly']->value) {?>
            <div class="alert alert-warning center">
                <strong>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ScheduleAvailabilityEarly'),$_smarty_tpl);?>

                    <a href="#" class="change-date" data-year="<?php echo $_smarty_tpl->tpl_vars['ScheduleAvailabilityStart']->value->Year();?>
"
                       data-month="<?php echo $_smarty_tpl->tpl_vars['ScheduleAvailabilityStart']->value->Month();?>
"
                       data-day="<?php echo $_smarty_tpl->tpl_vars['ScheduleAvailabilityStart']->value->Day();?>
">
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['format_date'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['ScheduleAvailabilityStart']->value,'timezone'=>$_smarty_tpl->tpl_vars['timezone']->value),$_smarty_tpl);?>

                    </a> -
                    <a href="#" class="change-date" data-year="<?php echo $_smarty_tpl->tpl_vars['ScheduleAvailabilityEnd']->value->Year();?>
"
                       data-month="<?php echo $_smarty_tpl->tpl_vars['ScheduleAvailabilityEnd']->value->Month();?>
"
                       data-day="<?php echo $_smarty_tpl->tpl_vars['ScheduleAvailabilityEnd']->value->Day();?>
">
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['format_date'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['ScheduleAvailabilityEnd']->value,'timezone'=>$_smarty_tpl->tpl_vars['timezone']->value),$_smarty_tpl);?>

                    </a>
                </strong>
            </div>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['ScheduleAvailabilityLate']->value) {?>
            <div class="alert alert-warning center">
                <strong>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ScheduleAvailabilityLate'),$_smarty_tpl);?>

                    <a href="#" class="change-date" data-year="<?php echo $_smarty_tpl->tpl_vars['ScheduleAvailabilityStart']->value->Year();?>
"
                       data-month="<?php echo $_smarty_tpl->tpl_vars['ScheduleAvailabilityStart']->value->Month();?>
"
                       data-day="<?php echo $_smarty_tpl->tpl_vars['ScheduleAvailabilityStart']->value->Day();?>
">
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['format_date'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['ScheduleAvailabilityStart']->value,'timezone'=>$_smarty_tpl->tpl_vars['timezone']->value),$_smarty_tpl);?>

                    </a> -
                    <a href="#" class="change-date" data-year="<?php echo $_smarty_tpl->tpl_vars['ScheduleAvailabilityEnd']->value->Year();?>
"
                       data-month="<?php echo $_smarty_tpl->tpl_vars['ScheduleAvailabilityEnd']->value->Month();?>
"
                       data-day="<?php echo $_smarty_tpl->tpl_vars['ScheduleAvailabilityEnd']->value->Day();?>
">
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['format_date'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['ScheduleAvailabilityEnd']->value,'timezone'=>$_smarty_tpl->tpl_vars['timezone']->value),$_smarty_tpl);?>

                    </a>
                </strong>
            </div>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['AllowConcurrentReservations']->value) {?>
            <div class="alert alert-warning center">
                <strong>
                    <a href="<?php echo Pages::CALENDAR;?>
?sid=<?php echo $_smarty_tpl->tpl_vars['ScheduleId']->value;?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['format_date'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['ScheduleAvailabilityStart']->value,'timezone'=>$_smarty_tpl->tpl_vars['timezone']->value),$_smarty_tpl);
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'OnlyViewedCalendar'),$_smarty_tpl);?>
</a>
                </strong>
            </div>
        <?php }?>

        <?php if (!$_smarty_tpl->tpl_vars['HideSchedule']->value) {?>
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17096632685ecb1f89e289b7_85302239', "legend");
?>

            
            <div class="row">
            	<div id="reservations-left" class="col col-lg-2">
                <div id="reservations-left" class="col-md-12 default-box">
                    <div class="reservations-left-header"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ResourceFilter'),$_smarty_tpl);?>

                        <a href="#" class="pull-right toggle-sidebar" title="Hide Reservation Filter"><i
                                    class="glyphicon glyphicon-remove"></i>
                            <span class="no-show">Hide Reservation Filter</span>
                        </a>
                    </div>

                    <div class="reservations-left-content">
                        <form method="get" role="form" id="advancedFilter">

                            <?php if (count($_smarty_tpl->tpl_vars['ResourceAttributes']->value)+count($_smarty_tpl->tpl_vars['ResourceTypeAttributes']->value) > 5) {?>
                                <div>
                                    <input type="submit" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Filter'),$_smarty_tpl);?>
"
                                           class="btn btn-success btn-sm" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'SUBMIT'),$_smarty_tpl);?>
/>
                                </div>
                            <?php }?>

                            <div>
                                
                                <div id="resourceGroups"></div>
                            </div>
                            <div id="resettable">
                               <!-- <div class="form-group col-xs-12">
                                    <label for="maxCapactiy"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'MinimumCapacity'),$_smarty_tpl);?>
</label>
                                    <input type='number' min='0' id='maxCapactiy' size='5' maxlength='5'
                                           class="form-control input-sm" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'MAX_PARTICIPANTS'),$_smarty_tpl);?>

                                           value="<?php echo $_smarty_tpl->tpl_vars['MaxParticipantsFilter']->value;?>
"/>
                                </div> -->
                                
                                <div class="form-group col-xs-12">
                                    <label for="resourceType"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ResourceType'),$_smarty_tpl);?>
</label>
                                   
                                    
                                    <select id="resourceType" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'RESOURCE_TYPE_ID'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'RESOURCE_TYPE_ID'),$_smarty_tpl);?>

                                            class="form-control input-sm">
                                        <option value="">- All -</option>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['resourceTypes']->value, 'i', false, 'myId', 'foo', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['myId']->value => $_smarty_tpl->tpl_vars['i']->value) {
?>
                                            <?php if ($_smarty_tpl->tpl_vars['i']->value['resource_type_name'] == '') {?>
						
                                                <?php } else { ?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['i']->value['resource_type_id'];?>
" label="<?php echo $_smarty_tpl->tpl_vars['i']->value['resource_type_name'];?>
">
							<?php echo $_smarty_tpl->tpl_vars['i']->value['resource_type_name'];?>

						</option>
                                                <?php }?>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                    </select>
                                </div>

                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ResourceAttributes']->value, 'attribute');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['attribute']->value) {
?>
                                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->DisplayControl(array('type'=>"AttributeControl",'attribute'=>$_smarty_tpl->tpl_vars['attribute']->value,'align'=>'vertical','searchmode'=>true,'namePrefix'=>'r','inputClass'=>"input-sm",'class'=>"customAttribute col-xs-12"),$_smarty_tpl);?>

                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ResourceTypeAttributes']->value, 'attribute');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['attribute']->value) {
?>
                                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->DisplayControl(array('type'=>"AttributeControl",'attribute'=>$_smarty_tpl->tpl_vars['attribute']->value,'align'=>'vertical','searchmode'=>true,'namePrefix'=>'rt','inputClass'=>"input-sm",'class'=>"customAttribute col-xs-12"),$_smarty_tpl);?>

                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


                                <div class="btn-submit">
                                    <button type="submit" class="btn btn-success btn-sm"
                                            value="submit"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Filter'),$_smarty_tpl);?>
</button>
                                </div>
                                <div class="btn-clear">
                                    <button id="show_all_resources" type="button"
                                            class="btn btn-default btn-xs"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ClearFilter'),$_smarty_tpl);?>
</button>
                                </div>

                            </div>

                            <input type="hidden" id="sid" name="sid" value="<?php echo $_smarty_tpl->tpl_vars['ScheduleId']->value;?>
"/>
                            <input type="hidden" name="sds"
                                   value="<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SpecificDates']->value, 'd');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['d']->value) {
echo $_smarty_tpl->tpl_vars['d']->value->Format('Y-m-d');?>
,<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
"/>
                            <input type="hidden" name="sd" value="<?php echo $_smarty_tpl->tpl_vars['DisplayDates']->value->GetBegin()->Format('Y-m-d');?>
"/>
                            <input type="hidden" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'SUBMIT'),$_smarty_tpl);?>
 value="true"/>
                            <input type="hidden" name="clearFilter" id="clearFilter" value="0"/>
                        </form>
                    </div>
                	
                </div>
                
                 <div id="reservations-left" class="col-md-12 default-box" style="margin-top: 15px;">
                    <div class="reservations-left-header">ToolTip Settings</div>

                   
                	<div class="reservations-left-content">
                	<form method="post" action="#">
                		
                		
                		<label><input type="checkbox" class="tfields" name="fields"   value="owner" <?php if (in_array('owner',$_smarty_tpl->tpl_vars['userFields']->value)) {?>checked="checked" <?php }?>> Owner</label><br>
                		<label><input type="checkbox" class="tfields" name="fields"   value="date_time" <?php if (in_array('date_time',$_smarty_tpl->tpl_vars['userFields']->value)) {?>checked="checked" <?php }?>> Date and Time</label><br>
                		<label><input type="checkbox" class="tfields" name="fields"   value="duration" <?php if (in_array('duration',$_smarty_tpl->tpl_vars['userFields']->value)) {?>checked="checked" <?php }?>> Duration</label><br>
                       <label><input type="checkbox" class="tfields" name="fields"   value="title" <?php if (in_array('title',$_smarty_tpl->tpl_vars['userFields']->value)) {?>checked="checked" <?php }?>> Title</label><br>
                       <label><input type="checkbox" class="tfields" name="fields"  value="description" <?php if (in_array('description',$_smarty_tpl->tpl_vars['userFields']->value)) {?> checked="checked" <?php }?>> Description</label><br>
                       <label><input type="checkbox" class="tfields" name="fields"  value="resources"  <?php if (in_array('resources',$_smarty_tpl->tpl_vars['userFields']->value)) {?>checked="checked" <?php }?>> Resource</label><br>
                       <label><input type="checkbox" class="tfields" name="fields"  value="projectlead" <?php if (in_array('projectlead',$_smarty_tpl->tpl_vars['userFields']->value)) {?> checked="checked" <?php }?>> Project Lead</label><br>
                       <label><input type="checkbox" class="tfields" name="fields"  value="testengineer" <?php if (in_array('testengineer',$_smarty_tpl->tpl_vars['userFields']->value)) {?> checked="checked" <?php }?>> Test Engineers</label><br>
                       <label><input type="checkbox" class="tfields" name="fields" value="clientname" <?php if (in_array('clientname',$_smarty_tpl->tpl_vars['userFields']->value)) {?> checked="checked"<?php }?>> Client Name</label><br>
                       <label><input type="checkbox" class="tfields" name="fields"  value="orderno" <?php if (in_array('orderno',$_smarty_tpl->tpl_vars['userFields']->value)) {?> checked="checked" <?php }?>> Order No.</label><br>
                       <label><input type="checkbox" class="tfields" name="fields"  value="requestno" <?php if (in_array('requestno',$_smarty_tpl->tpl_vars['userFields']->value)) {?> checked="checked" <?php }?>> Request No.</label><br>
                       <label><input type="checkbox" class="tfields" name="fields"  value="clientonsite" <?php if (in_array('clientonsite',$_smarty_tpl->tpl_vars['userFields']->value)) {?> checked="checked" <?php }?>> Client on site</label><br>
                       <label><input type="checkbox" class="tfields" name="fields"  value="sampleonsite" <?php if (in_array('sampleonsite',$_smarty_tpl->tpl_vars['userFields']->value)) {?> checked="checked" <?php }?>> Sample on site</label><br>
                    </div>
                    <div class="btn-submit form-group col-xs-12" style="margin-bottom:10px;">
                    	<input type="hidden" id="userId" name="userId" value="<?php echo $_smarty_tpl->tpl_vars['userId']->value;?>
">
                         <button type="submit" class="btn btn-success btn-sm" value="Save" id="updateFields">Save</button>
                   </div>
                    </form>
                </div>
               </div>
				
				
				
				
                <div id="reservations" class="col-md-10 col-sm-12">
                    <div>
                        <a href="#" id="restore-sidebar" title="Show Reservation Filter"
                           class="hidden toggle-sidebar"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ResourceFilter'),$_smarty_tpl);?>
 and Tooltip Setting <i
                                    class="glyphicon glyphicon-filter"></i> <i
                                    class="glyphicon glyphicon-chevron-right"></i></a>
                    </div>
                    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10725452055ecb1f89e42908_34908485', "reservations");
?>

                </div>
            </div>
        <?php }?>
    <?php } else { ?>
        <div class="error"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'NoResourcePermission'),$_smarty_tpl);?>
</div>
    <?php }?>
    <div class="clearfix">&nbsp;</div>
    <input type="hidden" name="scheduleId" value="<?php echo $_smarty_tpl->tpl_vars['ScheduleId']->value;?>
" id="scheduleId"/>

    <div class="row no-margin">
        <div class="col-sm-9 visible-md visible-lg">&nbsp;</div>
        <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'date_navigation');?>

    </div>
    <?php $_smarty_tpl->_assignInScope('endTime', microtime(true));
?>

</div>

<form id="moveReservationForm">
    <input id="moveReferenceNumber" type="hidden" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REFERENCE_NUMBER'),$_smarty_tpl);?>
 />
    <input id="moveStartDate" type="hidden" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'BEGIN_DATE'),$_smarty_tpl);?>
 />
    <input id="moveResourceId" type="hidden" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'RESOURCE_ID'),$_smarty_tpl);?>
 />
    <input id="moveSourceResourceId" type="hidden" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'ORIGINAL_RESOURCE_ID'),$_smarty_tpl);?>
 />
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['csrf_token'][0][0]->CSRFToken(array(),$_smarty_tpl);?>

</form>

<?php $_smarty_tpl->_subTemplateRender("file:javascript-includes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('Qtip'=>true,'FloatThead'=>true,'Select2'=>true), 0, false);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10707910185ecb1f89e477b7_78012300', "scripts-before");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10083595635ecb1f89e5e426_92905312', "scripts-common");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11939902855ecb1f89e61256_19989298', "scripts-after");
?>



<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->DisplayControl(array('type'=>"DatePickerSetupControl",'ControlId'=>'datepicker','DefaultDate'=>$_smarty_tpl->tpl_vars['FirstDate']->value,'NumberOfMonths'=>$_smarty_tpl->tpl_vars['PopupMonths']->value,'ShowButtonPanel'=>'true','OnSelect'=>'dpDateChanged','FirstDay'=>$_smarty_tpl->tpl_vars['FirstWeekday']->value),$_smarty_tpl);?>


<?php $_smarty_tpl->_subTemplateRender("file:globalfooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
/* smarty_template_function_displayGeneralReserved_17324063365ecb1f89d22353_96965546 */
if (!function_exists('smarty_template_function_displayGeneralReserved_17324063365ecb1f89d22353_96965546')) {
function smarty_template_function_displayGeneralReserved_17324063365ecb1f89d22353_96965546($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
    <?php if ($_smarty_tpl->tpl_vars['Slot']->value->IsPending()) {?>
        <?php $_smarty_tpl->_assignInScope('class', 'pending');
?>
    <?php } elseif ($_smarty_tpl->tpl_vars['Slot']->value->HasCustomColor()) {?>
        <?php $_smarty_tpl->_assignInScope('color', (((('style="background-color:').($_smarty_tpl->tpl_vars['Slot']->value->Color())).(' !important;color:')).($_smarty_tpl->tpl_vars['Slot']->value->TextColor())).(' !important;"'));
?>
    <?php }?>
    <?php $_smarty_tpl->_assignInScope('newname', $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escapequotes'][0][0]->EscapeQuotes(explode("=>",$_smarty_tpl->tpl_vars['Slot']->value->Label($_smarty_tpl->tpl_vars['SlotLabelFactory']->value))));
?>
    
    <?php if (!isset($_GET['st'])) {?>
    <td <?php echo (($tmp = @$_smarty_tpl->tpl_vars['spantype']->value)===null||$tmp==='' ? 'col' : $tmp);?>
span="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->PeriodSpan();?>
" class="reserved reserved2  <?php echo $_smarty_tpl->tpl_vars['OwnershipClass']->value;?>
  clickres slot"
        resid="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->Id();?>
" <?php echo $_smarty_tpl->tpl_vars['color']->value;?>
 <?php if ($_smarty_tpl->tpl_vars['Draggable']->value) {?>draggable="true"<?php }?> data-resourceId="<?php echo $_smarty_tpl->tpl_vars['ResourceId']->value;?>
"
        id="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->Id();?>
|<?php echo $_smarty_tpl->tpl_vars['Slot']->value->Date()->Format('Ymd');?>
" <?php if ($_smarty_tpl->tpl_vars['newname']->value[0] == 1) {?>style="background-color: white;border-width: 2px;border-color: #408AD2;color:black"<?php }?>><?php echo $_smarty_tpl->tpl_vars['newname']->value[1];?>
</td>
   <?php } elseif ($_GET['st'] == 'myregistration') {?>
   		 <td <?php echo (($tmp = @$_smarty_tpl->tpl_vars['spantype']->value)===null||$tmp==='' ? 'col' : $tmp);?>
span="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->PeriodSpan();?>
" class="<?php if ($_GET['st'] == 'myregistration') {?> reserved <?php }?> <?php if ($_GET['st'] == 'myregistration') {?> <?php echo $_smarty_tpl->tpl_vars['OwnershipClass']->value;?>
 <?php }?> clickres slot"
        resid="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->Id();?>
" <?php echo $_smarty_tpl->tpl_vars['color']->value;?>
 <?php if ($_smarty_tpl->tpl_vars['Draggable']->value) {?>draggable="true"<?php }?> data-resourceId="<?php echo $_smarty_tpl->tpl_vars['ResourceId']->value;?>
"
        id="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->Id();?>
|<?php echo $_smarty_tpl->tpl_vars['Slot']->value->Date()->Format('Ymd');?>
" <?php if ($_GET['st'] == 'myregistration') {
if ($_smarty_tpl->tpl_vars['newname']->value[0] == 1) {?>style="background-color: white;border-width: 2px;border-color: #408AD2;"<?php }
}?>><?php echo $_smarty_tpl->tpl_vars['newname']->value[1];
echo $_GET['st'];?>
</td>
   <?php } elseif ($_GET['st'] == 'reserve') {?>
   		<td <?php echo (($tmp = @$_smarty_tpl->tpl_vars['spantype']->value)===null||$tmp==='' ? 'col' : $tmp);?>
span="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->PeriodSpan();?>
"  class="<?php if ($_GET['st'] == 'reserve') {?> reserved reserved2 <?php }?> <?php if ($_GET['st'] == 'reserve') {?> nostyle <?php }?> clickres slot"
        resid="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->Id();?>
" <?php echo $_smarty_tpl->tpl_vars['color']->value;?>
 <?php if ($_smarty_tpl->tpl_vars['Draggable']->value) {?>draggable="true"<?php }?> data-resourceId="<?php echo $_smarty_tpl->tpl_vars['ResourceId']->value;?>
"
        id="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->Id();?>
|<?php echo $_smarty_tpl->tpl_vars['Slot']->value->Date()->Format('Ymd');?>
" <?php if ($_GET['st'] == 'myregistration') {
if ($_smarty_tpl->tpl_vars['newname']->value[0] == 1) {?>style="background-color: white;border-width: 2px;border-color: #408AD2;"<?php }
}?>><?php echo $_smarty_tpl->tpl_vars['newname']->value[1];
echo $_GET['st'];?>
</td>
   <?php }
}}
/*/ smarty_template_function_displayGeneralReserved_17324063365ecb1f89d22353_96965546 */
/* smarty_template_function_displayMyReserved_17324063365ecb1f89d22353_96965546 */
if (!function_exists('smarty_template_function_displayMyReserved_17324063365ecb1f89d22353_96965546')) {
function smarty_template_function_displayMyReserved_17324063365ecb1f89d22353_96965546($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
    <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'displayGeneralReserved', array('Slot'=>$_smarty_tpl->tpl_vars['Slot']->value,'Href'=>$_smarty_tpl->tpl_vars['Href']->value,'SlotRef'=>$_smarty_tpl->tpl_vars['SlotRef']->value,'OwnershipClass'=>'mine','Draggable'=>true,'ResourceId'=>$_smarty_tpl->tpl_vars['ResourceId']->value), true);?>

<?php
}}
/*/ smarty_template_function_displayMyReserved_17324063365ecb1f89d22353_96965546 */
/* smarty_template_function_displayAdminReserved_17324063365ecb1f89d22353_96965546 */
if (!function_exists('smarty_template_function_displayAdminReserved_17324063365ecb1f89d22353_96965546')) {
function smarty_template_function_displayAdminReserved_17324063365ecb1f89d22353_96965546($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
    <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'displayGeneralReserved', array('Slot'=>$_smarty_tpl->tpl_vars['Slot']->value,'Href'=>$_smarty_tpl->tpl_vars['Href']->value,'SlotRef'=>$_smarty_tpl->tpl_vars['SlotRef']->value,'OwnershipClass'=>'admin','Draggable'=>true,'ResourceId'=>$_smarty_tpl->tpl_vars['ResourceId']->value), true);?>

<?php
}}
/*/ smarty_template_function_displayAdminReserved_17324063365ecb1f89d22353_96965546 */
/* smarty_template_function_displayMyParticipating_17324063365ecb1f89d22353_96965546 */
if (!function_exists('smarty_template_function_displayMyParticipating_17324063365ecb1f89d22353_96965546')) {
function smarty_template_function_displayMyParticipating_17324063365ecb1f89d22353_96965546($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
    <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'displayGeneralReserved', array('Slot'=>$_smarty_tpl->tpl_vars['Slot']->value,'Href'=>$_smarty_tpl->tpl_vars['Href']->value,'SlotRef'=>$_smarty_tpl->tpl_vars['SlotRef']->value,'OwnershipClass'=>'participating','ResourceId'=>$_smarty_tpl->tpl_vars['ResourceId']->value), true);?>

<?php
}}
/*/ smarty_template_function_displayMyParticipating_17324063365ecb1f89d22353_96965546 */
/* smarty_template_function_displayReserved_17324063365ecb1f89d22353_96965546 */
if (!function_exists('smarty_template_function_displayReserved_17324063365ecb1f89d22353_96965546')) {
function smarty_template_function_displayReserved_17324063365ecb1f89d22353_96965546($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
    <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'displayGeneralReserved', array('Slot'=>$_smarty_tpl->tpl_vars['Slot']->value,'Href'=>$_smarty_tpl->tpl_vars['Href']->value,'SlotRef'=>$_smarty_tpl->tpl_vars['SlotRef']->value,'OwnershipClass'=>'','Draggable'=>((string)$_smarty_tpl->tpl_vars['CanViewAdmin']->value),'ResourceId'=>$_smarty_tpl->tpl_vars['ResourceId']->value), true);?>

<?php
}}
/*/ smarty_template_function_displayReserved_17324063365ecb1f89d22353_96965546 */
/* smarty_template_function_displayPastTime_17324063365ecb1f89d22353_96965546 */
if (!function_exists('smarty_template_function_displayPastTime_17324063365ecb1f89d22353_96965546')) {
function smarty_template_function_displayPastTime_17324063365ecb1f89d22353_96965546($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
	<?php if ($_GET['st'] == 'myregistration' || $_GET['st'] == 'reserve' || $_GET['st'] == 'block') {?>
    <td <?php echo (($tmp = @$_smarty_tpl->tpl_vars['spantype']->value)===null||$tmp==='' ? 'col' : $tmp);?>
span="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->PeriodSpan();?>
" ref="<?php echo $_smarty_tpl->tpl_vars['SlotRef']->value;?>
"
        class=" slot"  draggable="<?php echo $_smarty_tpl->tpl_vars['CanViewAdmin']->value;?>
" resid="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->Id();?>
"
        data-resourceId="<?php echo $_smarty_tpl->tpl_vars['ResourceId']->value;?>
" style="color:white"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escapequotes'][0][0]->EscapeQuotes($_smarty_tpl->tpl_vars['Slot']->value->Label($_smarty_tpl->tpl_vars['SlotLabelFactory']->value));?>
</td>
    <?php } else { ?>
    <td <?php echo (($tmp = @$_smarty_tpl->tpl_vars['spantype']->value)===null||$tmp==='' ? 'col' : $tmp);?>
span="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->PeriodSpan();?>
" ref="<?php echo $_smarty_tpl->tpl_vars['SlotRef']->value;?>
"
        class="pasttime slot"  draggable="<?php echo $_smarty_tpl->tpl_vars['CanViewAdmin']->value;?>
" resid="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->Id();?>
"
        data-resourceId="<?php echo $_smarty_tpl->tpl_vars['ResourceId']->value;?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escapequotes'][0][0]->EscapeQuotes($_smarty_tpl->tpl_vars['Slot']->value->Label($_smarty_tpl->tpl_vars['SlotLabelFactory']->value));?>
</td>
    <?php }
}}
/*/ smarty_template_function_displayPastTime_17324063365ecb1f89d22353_96965546 */
/* smarty_template_function_displayReservable_17324063365ecb1f89d22353_96965546 */
if (!function_exists('smarty_template_function_displayReservable_17324063365ecb1f89d22353_96965546')) {
function smarty_template_function_displayReservable_17324063365ecb1f89d22353_96965546($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
    <td <?php echo (($tmp = @$_smarty_tpl->tpl_vars['spantype']->value)===null||$tmp==='' ? 'col' : $tmp);?>
span="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->PeriodSpan();?>
" ref="<?php echo $_smarty_tpl->tpl_vars['SlotRef']->value;?>
" class="reservable clickres slot"
        data-href="<?php echo $_smarty_tpl->tpl_vars['Href']->value;?>
"
        data-start="<?php echo rawurlencode($_smarty_tpl->tpl_vars['Slot']->value->BeginDate()->Format('Y-m-d H:i:s'));?>
"
        data-end="<?php echo rawurlencode($_smarty_tpl->tpl_vars['Slot']->value->EndDate()->Format('Y-m-d H:i:s'));?>
"
        data-resourceId="<?php echo $_smarty_tpl->tpl_vars['ResourceId']->value;?>
">&nbsp;
    </td>
<?php
}}
/*/ smarty_template_function_displayReservable_17324063365ecb1f89d22353_96965546 */
/* smarty_template_function_displayRestricted_17324063365ecb1f89d22353_96965546 */
if (!function_exists('smarty_template_function_displayRestricted_17324063365ecb1f89d22353_96965546')) {
function smarty_template_function_displayRestricted_17324063365ecb1f89d22353_96965546($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
    <td <?php echo (($tmp = @$_smarty_tpl->tpl_vars['spantype']->value)===null||$tmp==='' ? 'col' : $tmp);?>
span="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->PeriodSpan();?>
" class="restricted slot">&nbsp;</td>
<?php
}}
/*/ smarty_template_function_displayRestricted_17324063365ecb1f89d22353_96965546 */
/* smarty_template_function_displayUnreservable_17324063365ecb1f89d22353_96965546 */
if (!function_exists('smarty_template_function_displayUnreservable_17324063365ecb1f89d22353_96965546')) {
function smarty_template_function_displayUnreservable_17324063365ecb1f89d22353_96965546($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
    <td <?php echo (($tmp = @$_smarty_tpl->tpl_vars['spantype']->value)===null||$tmp==='' ? 'col' : $tmp);?>
span="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->PeriodSpan();?>
"
        class="unreservable slot"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['Slot']->value->Label($_smarty_tpl->tpl_vars['SlotLabelFactory']->value), ENT_QUOTES, 'UTF-8', true);?>
</td>
<?php
}}
/*/ smarty_template_function_displayUnreservable_17324063365ecb1f89d22353_96965546 */
/* smarty_template_function_displaySlot_17324063365ecb1f89d22353_96965546 */
if (!function_exists('smarty_template_function_displaySlot_17324063365ecb1f89d22353_96965546')) {
function smarty_template_function_displaySlot_17324063365ecb1f89d22353_96965546($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
    <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, $_smarty_tpl->tpl_vars['DisplaySlotFactory']->value->GetFunction($_smarty_tpl->tpl_vars['Slot']->value,$_smarty_tpl->tpl_vars['AccessAllowed']->value), array('Slot'=>$_smarty_tpl->tpl_vars['Slot']->value,'Href'=>$_smarty_tpl->tpl_vars['Href']->value,'SlotRef'=>$_smarty_tpl->tpl_vars['SlotRef']->value,'ResourceId'=>$_smarty_tpl->tpl_vars['ResourceId']->value), true);?>

<?php
}}
/*/ smarty_template_function_displaySlot_17324063365ecb1f89d22353_96965546 */
/* {block "header"} */
class Block_12411657405ecb1f89dda3d2_10254527 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php $_smarty_tpl->_subTemplateRender("file:globalheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('Qtip'=>true,'FloatThead'=>true,'Select2'=>true,'cssFiles'=>'scripts/css/jqtree.css','printCssFiles'=>'css/schedule.print.css'), 0, false);
?>

<?php
}
}
/* {/block "header"} */
/* {block "actions"} */
class Block_5624956255ecb1f89dee178_55099873 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                            <a href="#" id="make_default"
                               style="display:none;"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_image'][0][0]->PrintImage(array('src'=>"star_boxed_full.png",'altKey'=>"MakeDefaultSchedule"),$_smarty_tpl);?>
</a>
                            <a href="#" class="schedule-style" id="schedule_standard"
                               schedule-display="<?php echo ScheduleStyle::Standard;?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_image'][0][0]->PrintImage(array('src'=>"table.png",'altKey'=>"StandardScheduleDisplay"),$_smarty_tpl);?>
</a>
                            <a href="#" class="schedule-style" id="schedule_tall"
                               schedule-display="<?php echo ScheduleStyle::Tall;?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_image'][0][0]->PrintImage(array('src'=>"table-tall.png",'altKey'=>"TallScheduleDisplay"),$_smarty_tpl);?>
</a>
                            <a href="#" class="schedule-style hidden-sm hidden-xs" id="schedule_wide"
                               schedule-display="<?php echo ScheduleStyle::Wide;?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_image'][0][0]->PrintImage(array('src'=>"table-wide.png",'altKey'=>"WideScheduleDisplay"),$_smarty_tpl);?>
</a>
                            <a href="#" class="schedule-style hidden-sm hidden-xs" id="schedule_week"
                               schedule-display="<?php echo ScheduleStyle::CondensedWeek;?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_image'][0][0]->PrintImage(array('src'=>"table-week.png",'altKey'=>"CondensedWeekScheduleDisplay"),$_smarty_tpl);?>
</a>
                            <div>
                                <?php if ($_smarty_tpl->tpl_vars['SubscriptionUrl']->value != null && $_smarty_tpl->tpl_vars['ShowSubscription']->value) {?>
                                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_image'][0][0]->PrintImage(array('src'=>"feed.png"),$_smarty_tpl);?>

                                    <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['SubscriptionUrl']->value->GetAtomUrl();?>
">Atom</a>
                                    |
                                    <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['SubscriptionUrl']->value->GetWebcalUrl();?>
">iCalendar</a>
                                <?php }?>
                            </div>
                        <?php
}
}
/* {/block "actions"} */
/* {block "schedule_control"} */
class Block_3342757785ecb1f89e12638_62400028 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <div class="row">
                <?php $_smarty_tpl->_assignInScope('titleWidth', "col-sm-12 col-xs-12");
?>
                <?php if (!$_smarty_tpl->tpl_vars['HideSchedule']->value) {?>
                    <?php $_smarty_tpl->_assignInScope('titleWidth', "col-sm-6 col-xs-12");
?>
                    <div id="schedule-actions" class="col-sm-3 col-xs-12">
                        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5624956255ecb1f89dee178_55099873', "actions", $this->tplIndex);
?>

                    </div>
                <?php }?>

                <div id="schedule-title" class="schedule_title <?php echo $_smarty_tpl->tpl_vars['titleWidth']->value;?>
 col-xs-12">
                    <label for="schedules" class="no-show">Schedule</label>
                    <select id="schedules" class="form-control" style="width:auto;">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Schedules']->value, 'schedule');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['schedule']->value) {
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['schedule']->value->GetId();?>
"
                                    <?php if ($_smarty_tpl->tpl_vars['schedule']->value->GetId() == $_smarty_tpl->tpl_vars['ScheduleId']->value) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['schedule']->value->GetName();?>
</option>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </select>
                    <a href="#" id="calendar_toggle" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ShowHideNavigation'),$_smarty_tpl);?>
">
                        <span class="glyphicon glyphicon-calendar"></span>
                        <span class="no-show"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ShowHideNavigation'),$_smarty_tpl);?>
</span>
                    </a>
                    <div id="individualDates">
                        <div class="checkbox inline">
                            <input type='checkbox' id='multidateselect'/>
                            <label for='multidateselect'><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'SpecificDates'),$_smarty_tpl);?>
</label>
                        </div>
                        <a class="btn btn-default btn-sm" href="#" id="individualDatesGo"><i
                                    class="fa fa-angle-double-right"></i>
                            <span class="no-show"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'SpecificDates'),$_smarty_tpl);?>
</span>
                        </a>
                    </div>
                    <div id="individualDatesList"></div>
                </div>

                <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "date_navigation", null, null);
?>

                    <?php if (!$_smarty_tpl->tpl_vars['HideSchedule']->value) {?>
                        <div class="schedule-dates col-sm-3 col-xs-14" style="font-size: 20px;">
                            <?php $_smarty_tpl->_assignInScope('TodaysDate', Date::Now());
?>
                            <a href="#" class="change-date btn-link btn-success" data-year="<?php echo $_smarty_tpl->tpl_vars['TodaysDate']->value->Year();?>
"
                               data-month="<?php echo $_smarty_tpl->tpl_vars['TodaysDate']->value->Month();?>
" data-day="<?php echo $_smarty_tpl->tpl_vars['TodaysDate']->value->Day();?>
"
                               alt="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Today'),$_smarty_tpl);?>
"><i class="fa fa-home"></i>
                                <span class="no-show"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Today'),$_smarty_tpl);?>
</span>
                            </a>
                            <?php $_smarty_tpl->_assignInScope('FirstDate', $_smarty_tpl->tpl_vars['DisplayDates']->value->GetBegin());
?>
                            <?php $_smarty_tpl->_assignInScope('LastDate', $_smarty_tpl->tpl_vars['DisplayDates']->value->GetEnd()->AddDays(-1));
?>
                            <a href="#" class="change-date" data-year="<?php echo $_smarty_tpl->tpl_vars['PreviousDate']->value->Year();?>
"
                               data-month="<?php echo $_smarty_tpl->tpl_vars['PreviousDate']->value->Month();?>
"
                               data-day="<?php echo $_smarty_tpl->tpl_vars['PreviousDate']->value->Day();?>
"><?php ob_start();
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Back'),$_smarty_tpl);
$_prefixVariable1=ob_get_clean();
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_image'][0][0]->PrintImage(array('src'=>"arrow_large_left.png",'alt'=>$_prefixVariable1),$_smarty_tpl);?>
</a>
                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['FirstDate']->value),$_smarty_tpl);?>
 - <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['LastDate']->value),$_smarty_tpl);?>

                            <a href="#" class="change-date" data-year="<?php echo $_smarty_tpl->tpl_vars['NextDate']->value->Year();?>
"
                               data-month="<?php echo $_smarty_tpl->tpl_vars['NextDate']->value->Month();?>
"
                               data-day="<?php echo $_smarty_tpl->tpl_vars['NextDate']->value->Day();?>
"><?php ob_start();
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Forward'),$_smarty_tpl);
$_prefixVariable2=ob_get_clean();
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_image'][0][0]->PrintImage(array('src'=>"arrow_large_right.png",'alt'=>$_prefixVariable2),$_smarty_tpl);?>
</a>

                            <?php if ($_smarty_tpl->tpl_vars['ShowFullWeekLink']->value) {?>
                                <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['add_querystring'][0][0]->AddQueryString(array('key'=>'SHOW_FULL_WEEK','value'=>1),$_smarty_tpl);?>
"
                                   id="showFullWeek">(<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ShowFullWeek'),$_smarty_tpl);?>
)</a>
                            <?php }?>
                        </div>
                    <?php }?>
                <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
?>


                <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'date_navigation');?>

            </div>
            <div type="text" id="datepicker" style="display:none;"></div>
        <?php
}
}
/* {/block "schedule_control"} */
/* {block "legend"} */
class Block_17096632685ecb1f89e289b7_85302239 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                <div class="hidden-xs row col-sm-12 schedule-legend">
                    <div class="center">
                        <div class="legend reservable"><a style="color:black" href="?st=open"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Reservable'),$_smarty_tpl);?>
</a></div>
                        <div class="legend unreservable"><a style="color:white" href="?st=block"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Unreservable'),$_smarty_tpl);?>
</a></div>
                        <div class="legend reserved reserved2"><a style="color:white" href="?st=reserve"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Reserved'),$_smarty_tpl);?>
</a></div>
                        <?php if ($_smarty_tpl->tpl_vars['LoggedIn']->value) {?>
                        <div class="legend  participating" style="border: 2px solid #408AD2 ;
    text-align:center;"><a href="?st=temporary">Temporary</a></div>
                            <div class="legend reserved mine"><a href="?st=myregistration" style="color:white"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'MyReservation'),$_smarty_tpl);?>
</a></div>
                            
                            
                            <div class="legend reserved participating"><a href="?st=test_engineer" style="color:white">Test Engineer</a></div>
                            
                        <?php }?>
                        
                        <div class="legend pasttime"><a href="?st=past" style="color:black"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Past'),$_smarty_tpl);?>
</a></div>
                        
                    </div>
                </div>
            <?php
}
}
/* {/block "legend"} */
/* {block "reservations"} */
class Block_10725452055ecb1f89e42908_34908485 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                        <?php $_smarty_tpl->_subTemplateRender("file:Schedule/schedule-reservations-grid.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                    <?php
}
}
/* {/block "reservations"} */
/* {block "scripts-before"} */
class Block_10707910185ecb1f89e477b7_78012300 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<?php
}
}
/* {/block "scripts-before"} */
/* {block "scripts-common"} */
class Block_10083595635ecb1f89e5e426_92905312 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"js/moment.min.js"),$_smarty_tpl);?>

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"schedule.js"),$_smarty_tpl);?>

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"resourcePopup.js"),$_smarty_tpl);?>

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"js/tree.jquery.js"),$_smarty_tpl);?>

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"js/jquery.cookie.js"),$_smarty_tpl);?>

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"ajax-helpers.js"),$_smarty_tpl);?>

    
    <?php echo '<script'; ?>
 type="text/javascript">

		
    	$(document).ready(function () {
    		
    		
    		$("#updateFields").click(function(){
    			
    			var field = [];
    			 $("input[name='fields']:checked").each(function(){
    				 field.push(this.value);
    		     });
    		     var userId = $('#userId').val();

    		     
    			$.post("update_fields.php",
    					  {
    						field: field, userId:userId
    					  },
    					  function(data, status){
        					  alert('ToolTip Settings Updated');
        					  location.reload(); 
    					    //alert("Data: " + data + "\nStatus: " + status);
    					  });
    			  return false;
    			});
    	});
    	
        <?php if ($_smarty_tpl->tpl_vars['LoadViewOnly']->value) {?>
        $(document).ready(function () {
            var scheduleOptions = {
                reservationUrlTemplate: "view-reservation.php?<?php echo QueryStringKeys::REFERENCE_NUMBER;?>
=[referenceNumber]",
                summaryPopupUrl: "ajax/respopup.php",
                cookieName: "<?php echo $_smarty_tpl->tpl_vars['CookieName']->value;?>
",
                scheduleId: "<?php echo $_smarty_tpl->tpl_vars['ScheduleId']->value;?>
",
                scriptUrl: '<?php echo $_smarty_tpl->tpl_vars['ScriptUrl']->value;?>
',
                selectedResources: [<?php echo implode(',',$_smarty_tpl->tpl_vars['ResourceIds']->value);?>
],
                specificDates: [<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SpecificDates']->value, 'd');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['d']->value) {
?>'<?php echo $_smarty_tpl->tpl_vars['d']->value->Format('Y-m-d');?>
',<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
],
                disableSelectable: '<?php echo $_smarty_tpl->tpl_vars['IsMobile']->value;?>
'
            };
            var schedule = new Schedule(scheduleOptions, <?php echo $_smarty_tpl->tpl_vars['ResourceGroupsAsJson']->value;?>
);
            <?php if ($_smarty_tpl->tpl_vars['AllowGuestBooking']->value) {?>
            schedule.init();
            schedule.initUserDefaultSchedule(true);
            <?php } else { ?>
            schedule.initNavigation();
            schedule.initRotateSchedule();
            schedule.initReservations();
            schedule.initResourceFilter();
            schedule.initResources();
            schedule.initUserDefaultSchedule(true);
            <?php }?>
        });
        <?php } else { ?>
        $(document).ready(function () {
            var scheduleOpts = {
                reservationUrlTemplate: "<?php echo $_smarty_tpl->tpl_vars['Path']->value;
echo Pages::RESERVATION;?>
?<?php echo QueryStringKeys::REFERENCE_NUMBER;?>
=[referenceNumber]",
                summaryPopupUrl: "<?php echo $_smarty_tpl->tpl_vars['Path']->value;?>
ajax/respopup.php",
                setDefaultScheduleUrl: "<?php echo $_smarty_tpl->tpl_vars['Path']->value;
echo Pages::PROFILE;?>
?action=changeDefaultSchedule&<?php echo QueryStringKeys::SCHEDULE_ID;?>
=[scheduleId]",
                cookieName: "<?php echo $_smarty_tpl->tpl_vars['CookieName']->value;?>
",
                scheduleId: "<?php echo strtr($_smarty_tpl->tpl_vars['ScheduleId']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
",
                scriptUrl: '<?php echo $_smarty_tpl->tpl_vars['ScriptUrl']->value;?>
',
                selectedResources: [<?php echo implode(',',$_smarty_tpl->tpl_vars['ResourceIds']->value);?>
],
                specificDates: [<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SpecificDates']->value, 'd');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['d']->value) {
?>'<?php echo $_smarty_tpl->tpl_vars['d']->value->Format('Y-m-d');?>
',<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
],
                updateReservationUrl: "<?php echo $_smarty_tpl->tpl_vars['Path']->value;?>
ajax/reservation_move.php",
                lockTableHead: <?php echo $_smarty_tpl->tpl_vars['LockTableHead']->value;?>
,
                disableSelectable: '<?php echo $_smarty_tpl->tpl_vars['IsMobile']->value;?>
'
            };

            var schedule = new Schedule(scheduleOpts, <?php echo $_smarty_tpl->tpl_vars['ResourceGroupsAsJson']->value;?>
);
            schedule.init();
        });
        <?php }?>

        $('#schedules').select2({
            width: 'resolve'
        });

        var pageLoadTime = <?php echo round($_smarty_tpl->tpl_vars['endTime']->value-$_smarty_tpl->tpl_vars['startTime']->value);?>
;
        var resourceCount = <?php echo count($_smarty_tpl->tpl_vars['Resources']->value);?>
;
        var dayCount = <?php echo count($_smarty_tpl->tpl_vars['BoundDates']->value);?>
;

        if (pageLoadTime > 10 && !cookies.isDismissed('slow-schedule-warning')) {
            $('#slow-schedule-warning').removeClass('no-show');
            $('#warning-time').text(pageLoadTime);
            $('#warning-resources').text(resourceCount);
            $('#warning-days').text(dayCount);
        }

        $('#slow-schedule-warning').find('.close-forever').on('click', function (e) {
            cookies.dismiss('slow-schedule-warning', '<?php echo $_smarty_tpl->tpl_vars['ScriptUrl']->value;?>
');
            $('#slow-schedule-warning').addClass('no-show');
        });
        
        $(document).ready(function(){
             
        });
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "scripts-common"} */
/* {block "scripts-after"} */
class Block_11939902855ecb1f89e61256_19989298 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<?php
}
}
/* {/block "scripts-after"} */
}