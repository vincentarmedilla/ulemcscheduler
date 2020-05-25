{*
Copyright 2011-2019 Nick Korbel

This file is part of Booked Scheduler.

Booked Scheduler is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Booked Scheduler is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Booked Scheduler.  If not, see <http://www.gnu.org/licenses/>.
*}

{block name="header"}{include file='globalheader.tpl' Qtip=true Owl=true printCssFiles='css/reservation.print.css'}
{/block}

{function name="displayResource"}
    <div class="resourceName" id="{$resource->GetId()}" style="background-color:{$resource->GetColor()};color:{$resource->GetTextColor()}">
        <span class="resourceDetails" data-resourceId="{$resource->GetId()}">{$resource->Name}</span>
        {if $resource->GetRequiresApproval()}<span class="fa fa-lock" data-tooltip="approval"></span>{/if}
        {if $resource->IsCheckInEnabled()}<i class="fa fa-sign-in" data-tooltip="checkin"></i>{/if}
        {if $resource->IsAutoReleased()}<i class="fa fa-clock-o" data-tooltip="autorelease"
                                           data-autorelease="{$resource->GetAutoReleaseMinutes()}"></i>{/if}
    </div>
{/function}
<style>
    .required-field:after {
        color: #d00;
        content: "*";
        position: absolute;
        margin-left: 3px;
        top: 4px;
    }
    select option:disabled{
        color:red;
    }
</style>

<style>
    .customAttribute {
        width: 475px;
    }

    .customAttribute .form-group input {
        width: 400px;
    }
    .customAttribute .checkbox {
    /*.customAttribute .checkbox {
        width: 900px;
    }*/

</style>
<script>
    $(".nomail").hide();
</script>
<div id="page-reservation">
    <div id="reservation-box">
        <form id="form-reservation" method="post" enctype="multipart/form-data" role="form">

            <div class="row">
                <div class="col-md-6 col-xs-12 col-top reservationHeader">
                    <label class="radio-inline"><h3>{block name=reservationHeader}{translate key="CreateReservationHeading"}{/block}</h3></label>
                    <label class="radio-inline">
      					<input type="radio" name="status" value="1" {if $status eq '1'} checked {/if} {if $status eq '1'} checked {else} checked {/if}>Temporary
    				</label>
    				<label class="radio-inline">
      					<input type="radio" name="status" value="2" {if $status eq '2'} checked {/if}>Confirmed
    				</label>
                </div>

                <div class="col-md-6 col-xs-12 col-top">
                    <div class="pull-right-sm">
                        <a href="#" id="btnViewAvailability"><i class="fa fa-calendar"></i> {translate key="ViewAvailability"}</a>
                        <button type="button" class="btn btn-default" onclick="window.location='{$ReturnUrl}'">
                            <span class="hidden-xs">{translate key='Cancel'}</span>
                            <span class="visible-xs"><i class="fa fa-arrow-circle-left"></i></span>
                        </button>
                        {block name="submitButtons"}
                            <button type="button"  class="btn btn-success save create">
                                <span class="glyphicon glyphicon-ok-circle"></span>
                                {translate key='Create'}
                            </button>
                        {/block}
                    </div>
                </div>
            </div>

            <div class="row">
                {assign var="detailsCol" value="col-xs-12"}
                {assign var="participantCol" value="col-xs-12"}

                {if $ShowParticipation && $AllowParticipation && $ShowReservationDetails}
                    {assign var="detailsCol" value="col-xs-12 col-sm-6"}
                    {assign var="participantCol" value="col-xs-12 col-sm-6"}
                {/if}

                <div id="reservationDetails"
                     class="{$detailsCol} {if $ShowParticipation && $AllowParticipation && $ShowReservationDetails}detailsBorder{/if}">
                    <div class="col-xs-12">
                        <div class="form-group">
                            {if $ShowUserDetails && $ShowReservationDetails}
                                <a href="#" id="userName" data-userid="{$UserId}">{$ReservationUserName}</a>
                            {else}
                                {translate key=Private}
                            {/if}
                            
                            {if $CanChangeUser}
                                <a href="#" id="showChangeUsers" class="small-action">{translate key=Change} <i
                                            class="fa fa-user"></i></a>
                                <div class="modal fade" id="changeUserDialog" tabindex="-1" role="dialog"
                                     aria-labelledby="usersModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;
                                                </button>
                                                <h4 class="modal-title"
                                                    id="usersModalLabel">{translate key=ChangeUser}</h4>
                                            </div>
                                            <div class="modal-body scrollable-modal-content">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">{translate key='Cancel'}</button>
                                                <button type="button"
                                                        class="btn btn-primary">{translate key='Done'}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {/if}
                            <div id="availableCredits" {if !$CreditsEnabled}style="display:none" }{/if}>
                                {translate key=AvailableCredits}
                                <span id="availableCreditsCount">{$CurrentUserCredits}</span> |
                                {translate key=CreditsRequired}
                                <span id="requiredCreditsCount"><span class="fa fa-spin fa-spinner"></span></span>
                                <span id="creditCost"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12" id="changeUsers">
                        <div class="form-group">
                            <label for="changeUserAutocomplete" class="no-show">{translate key=User}</label>
<!--                             <input type="text" id="changeUserAutocomplete" -->
<!--                                    class="form-control inline-block user-search"/> -->
								<select id="users" class="form-control selectpicker" data-live-search="true">
					<option value="" selected disabled>Select User</option>
					{foreach from=$group_users key=myId item=i name=foo}
						
						<option value="{$i.fname} {$i.lname}({$i.email})={$i.user_id}">
							{$i.fname} - {$i.email} ---- {$smarty.foreach.foo.iteration}
						</option>
						
					{/foreach}
				</select>
				
				<input id="userId" type="hidden" {formname key=USER_ID} value="{$UserId}"/>
<!--                             | -->
<!--                             <button id="promptForChangeUsers" type="button" class="btn inline"> -->
<!--                                 <i class="fa fa-users"></i> -->
<!--                                 {translate key='AllUsers'} -->
<!--                             </button> -->
                        </div>
                    </div>

                    <div class="col-xs-12 reservationDates">
                        <div class="col-md-6 no-padding-left">
                            <div class="form-group no-margin-bottom">
                                <label for="BeginDate" class="reservationDate">{translate key='BeginDate'}</label>
                                <input type="text" id="BeginDate"
                                       class="form-control input-sm inline-block dateinput{if $LockPeriods} no-show{/if}"
                                       value="{formatdate date=$StartDate}"/>
                                <input type="hidden" id="formattedBeginDate" {formname key=BEGIN_DATE}
                                       value="{formatdate date=$StartDate key=system}"/>
                                <select id="BeginPeriod" {formname key=BEGIN_PERIOD}
                                        class="form-control input-sm inline-block timeinput{if $LockPeriods} no-show{/if}"
                                        title="Begin time">
                                    {foreach from=$StartPeriods item=period}
                                        {if $period->IsReservable()}
                                            {assign var='selected' value=''}
                                            {if $period eq $SelectedStart}
                                                {assign var='selected' value=' selected="selected"'}
                                                {assign var='startPeriod' value=$period}
                                            {/if}
                                            <option value="{$period->Begin()}"{$selected}>{$period->Label()}</option>
                                        {/if}
                                    {/foreach}
                                </select>
                                {if $LockPeriods}{formatdate date=$StartDate} {$startPeriod->Label()}{/if}
                            </div>
                        </div>
                        <div class="col-md-6 no-padding-left">
                            <div class="form-group no-margin-bottom">
                                <label for="EndDate" class="reservationDate">{translate key='EndDate'}</label>
                                <input type="text" id="EndDate"
                                       class="form-control input-sm inline-block dateinput{if $LockPeriods} no-show{/if}"
                                       value="{formatdate date=$EndDate}"/>
                                <input type="hidden" id="formattedEndDate" {formname key=END_DATE}
                                       value="{formatdate date=$EndDate key=system}"/>
                                <select id="EndPeriod" {formname key=END_PERIOD}
                                        class="form-control  input-sm inline-block timeinput{if $LockPeriods} no-show{/if}"
                                        title="End time">
                                    {foreach from=$EndPeriods item=period name=endPeriods}
                                        {if $period->IsReservable()}
                                            {assign var='selected' value=''}
                                            {if $period eq $SelectedEnd}
                                                {assign var='selected' value=' selected="selected"'}
                                                {assign var='endPeriod' value=$period}
                                            {/if}
                                            <option value="{$period->End()}"{$selected}>{$period->LabelEnd()}</option>
                                        {/if}
                                    {/foreach}
                                </select>
                                {if $LockPeriods}{formatdate date=$EndDate} {$endPeriod->LabelEnd()}{/if}
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 reservationLength">
                        <div class="form-group">
                            {*<span class="like-label">{translate key=ReservationLength}</span>*}
                            <div class="durationText">
                                <span id="durationDays">0</span> {translate key=days}
                                <span id="durationHours">0</span> {translate key=hours}
                                <span id="durationMinutes">0</span> {translate key=minutes}
                            </div>
                        </div>
                    </div>

                    {if !$HideRecurrence}
                        <div class="col-xs-12">
                            {control type="RecurrenceControl" RepeatTerminationDate=$RepeatTerminationDate}
                        </div>
                    {/if}

                    <div class="col-xs-12 reservationResources" id="reservation-resources">
                        <div class="form-group">
                            <div class="pull-left">
                                {*<div>
                                    <label>Human Resources</label>
                                    {if $ShowAdditionalResources}
                                        <a id="btnAddResources" href="#"
                                           class="small-action" data-toggle="modal"
                                           data-target="#dialogResourceGroupsHuman">{translate key=Change} <span
                                                    class="fa fa-plus-square"></span></a>
                                    {/if}
                                </div>*}

                                <div>
                                    <label>Physical {translate key="Resources"}</label>
                                    {if $ShowAdditionalResources}
                                        <a id="btnAddResources" href="#"
                                           class="small-action" data-toggle="modal"
                                           data-target="#dialogResourceGroups">{translate key=Change} <span
                                                    class="fa fa-plus-square"></span></a>
                                    {/if}
                                </div>



                                <div id="primaryResourceContainer" class="inline">
                                    <input type="hidden" id="scheduleId" {formname key=SCHEDULE_ID}
                                           value="{$ScheduleId}"/>
                                    <input class="resourceId" type="hidden"
                                           id="primaryResourceId" {formname key=RESOURCE_ID} value="{$ResourceId}"/>
                                    {if !empty($smarty.get.rn)}
                                    <div class="resourceName" id="{$ResourceId}" style="background-color:;color:">
                                        <span class="resourceDetails" data-resourceid="{$ResourceId}" resource-details-bound="1">{$ResourceName}</span>
                                    </div>
                                    {else}
                                        {displayResource resource=$Resource}
                                    {/if}
                                </div>

                                <div id="additionalResources">
                                    {*{if !empty({$smarty.get.redirect})}*}
                                    {foreach from=$AvailableResources item=resource}
                                        {if is_array($AdditionalResourceIds) && in_array($resource->Id, $AdditionalResourceIds)}
                                            <input class="resourceId" type="hidden"
                                                   name="{FormKeys::ADDITIONAL_RESOURCES}[]" value="{$resource->Id}"/>
                                            {displayResource resource=$resource}
                                        {/if}
                                    {/foreach}
                                    {* {/if}*}
                                </div>
                            </div>
                            <div class="accessoriesDiv">
                                {if $ShowReservationDetails && $AvailableAccessories|count > 0}
                                    <label>{translate key="Accessories"}</label>
                                    <a href="#" id="addAccessoriesPrompt"
                                       class="small-action" data-toggle="modal"
                                       data-target="#dialogAddAccessories">{translate key='Add'} <span
                                                class="fa fa-plus-square"></span></a>
                                    <div id="accessories"></div>
                                {/if}
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 reservationTitle">
                        <div class="required form-group has-feedback">
                            <label class="required-field" for="reservationTitle">{translate key="ReservationTitle"}</label>
                            {textbox name="RESERVATION_TITLE" class="form-control" value="ReservationTitle" id="reservationTitle" maxlength="300" data-validation="required" data-validation-length="min4" data-validation-error-msg="Title is Required"}
                            {if $TitleRequired}
                                <i class="glyphicon glyphicon-asterisk form-control-feedback"
                                   data-bv-icon-for="reservationTitle"></i>
                            {/if}
                        </div>
                    </div>

                    <div class="col-xs-12 reservationDescription">
                        <div class="form-group has-feedback">
                            <label for="reservationTitle">Description of booking</label>
                            <textarea id="description" name="{FormKeys::DESCRIPTION}"
                                      class="form-control" data-validation-length="min4" data-validation-error-msg="Description is Required"
                                      {if $DescriptionRequired}required="required"{/if}>{$Description}</textarea>
                            {if $DescriptionRequired}
                                <i class="glyphicon glyphicon-asterisk form-control-feedback"
                                   data-bv-icon-for="description"></i>
                            {/if}

                        </div>
                    </div>

                    {if !empty($ReferenceNumber)}
                        {*<div class="col-xs-12">
                            <div class="form-group">
                                <label>{translate key=ReferenceNumber}</label>
                                {$ReferenceNumber}
                            </div>
                        </div>*}
                    {/if}
                </div>

                <div class="{$participantCol}">
                    {if $ShowParticipation && $AllowParticipation && $ShowReservationDetails}
                        {include file="Reservation/participation.tpl"}
                    {else}
                        {include file="Reservation/private-participation.tpl"}
                    {/if}
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6 detailsBorder" id="reservationDetails">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label  for="reservationTitle">Client Name</label>
                            <input type="text" class="form-control" id="client" name="client"  data-validation-length="" required data-validation-error-msg="Client is Required" value="{$client_name}">

                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="pwd">Order No. / Project No.</label>
                            <input type="text" class="form-control" id="projects" name="projects" value="{$project}">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="pwd">Request No.</label>
                            <input type="text" class="form-control" id="request_no" name="request_no" value="{$request_no}">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label><input type="checkbox" {if $cos eq '1'} checked {/if}  name="client_on_sites" id="client_on_sites" value="1">Client On Site?</label>
                            &nbsp;&nbsp;&nbsp;
                            <label><input type="checkbox" {if $sos eq '1'} checked {/if} name="sample_on_site" id="sample_on_site" value="1">Sample On Site?</label>
                        </div>
                    </div>
                </div>
                
                	<div class="col-xs-12 col-sm-6">
                		<div class="col-xs-12 reservationDates">
                        <div class="col-md-6 no-padding-left">
                            <div class="form-group no-margin-bottom">
                                <label for="BeginDate" class="reservationDate">Actual Start</label>
                                <select id="AcutalStart" name="AcutalStart" class="form-control input-sm inline-block timeinput" title="Begin time">
                                	<option value="00:00:00">12:00 am</option>
        <option value="01:00:00">1:00 am</option>
        <option value="02:00:00">2:00 am</option>
        <option value="03:00:00">3:00 am</option>
        <option value="04:00:00">4:00 am</option>
        <option value="05:00:00">5:00 am</option>
        <option value="06:00:00">6:00 am</option>
        <option value="07:00:00">7:00 am</option>
        <option value="08:00:00">8:00 am</option>
        <option value="09:00:00">9:00 am</option>
        <option value="10:00:00">10:00 am</option>
        <option value="11:00:00">11:00 am</option>
        <option value="12:00:00">12:00 pm</option>
        <option value="13:00:00">1:00 pm</option>
        <option value="14:00:00">2:00 pm</option>
        <option value="15:00:00">3:00 pm</option>
        <option value="16:00:00">4:00 pm</option>
        <option value="17:00:00">5:00 pm</option>
        <option value="18:00:00">6:00 pm</option>
        <option value="19:00:00">7:00 pm</option>
        <option value="20:00:00">8:00 pm</option>
        <option value="21:00:00">9:00 pm</option>
        <option value="22:00:00">10:00 pm</option>
        <option value="23:00:00">11:00 pm</option>                                           
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 no-padding-left">
                            <div class="form-group no-margin-bottom">
                                <label for="EndDate" class="reservationDate">Actual End</label>
                                <select id="ActualEnd" name=""ActualEnd"" class="form-control  input-sm inline-block timeinput" title="End time">
                                	 	<option value="00:00:00">12:00 am</option>
                                        <option value="01:00:00">1:00 am</option>
                                        <option value="02:00:00">2:00 am</option>
                                        <option value="03:00:00">3:00 am</option>
                                        <option value="04:00:00">4:00 am</option>
                                        <option value="05:00:00">5:00 am</option>
                                        <option value="06:00:00">6:00 am</option>
                                        <option value="07:00:00">7:00 am</option>
                                        <option value="08:00:00">8:00 am</option>
                                        <option value="09:00:00">9:00 am</option>
                                        <option value="10:00:00">10:00 am</option>
                                        <option value="11:00:00">11:00 am</option>
                                        <option value="12:00:00">12:00 pm</option>
                                        <option value="13:00:00">1:00 pm</option>
                                        <option value="14:00:00">2:00 pm</option>
                                        <option value="15:00:00">3:00 pm</option>
                                        <option value="16:00:00">4:00 pm</option>
                                        <option value="17:00:00">5:00 pm</option>
                                        <option value="18:00:00">6:00 pm</option>
                                        <option value="19:00:00">7:00 pm</option>
                                        <option value="20:00:00">8:00 pm</option>
                                        <option value="21:00:00">9:00 pm</option>
                                        <option value="22:00:00">10:00 pm</option>
                                        <option value="23:00:00">11:00 pm</option>                                 
                                </select>
                            </div>
                        </div>
                    </div>
                	</div>
                
            </div>



            {*<div class="row col-xs-12 same-height">
                <div id="custom-attributes-placeholder" class="col-xs-12">
                </div>
            </div>*}

            {if $RemindersEnabled}
                <div class="row col-xs-12">
                    <div class="col-xs-12 reservationReminders">
                        <div>
                            <label>{translate key=SendReminder}</label>
                        </div>
                        <div id="reminderOptionsStart">
                            <div class="checkbox">
                                <input type="checkbox" id="startReminderEnabled"
                                       class="reminderEnabled" {formname key=START_REMINDER_ENABLED}/>
                                <label for="startReminderEnabled" style="min-width:0;"></label>
                                <label for="startReminderTime" class="no-show">Start Reminder Time</label>
                                <label for="startReminderInterval" class="no-show">Start Reminder Interval</label>
                                <input type="number" min="0" max="999" size="3" maxlength="3" value="15"
                                       class="reminderTime form-control input-sm inline-block" {formname key=START_REMINDER_TIME}
                                       id="startReminderTime"/>
                                <select class="reminderInterval form-control input-sm inline-block" {formname key=START_REMINDER_INTERVAL}
                                        id="startReminderInterval">
                                    <option value="{ReservationReminderInterval::Minutes}">{translate key=minutes}</option>
                                    <option value="{ReservationReminderInterval::Hours}">{translate key=hours}</option>
                                    <option value="{ReservationReminderInterval::Days}">{translate key=days}</option>
                                </select>

                                <span class="reminderLabel">{translate key=ReminderBeforeStart}</span>
                            </div>
                        </div>
                        <div id="reminderOptionsEnd">
                            <div class="checkbox">
                                <input type="checkbox" id="endReminderEnabled"
                                       class="reminderEnabled" {formname key=END_REMINDER_ENABLED}/>
                                <label for="endReminderEnabled" style="min-width:0;"></label>
                                <label for="endReminderTime" class="no-show">End Reminder Time</label>
                                <label for="endReminderInterval" class="no-show">End Reminder Interval</label>
                                <input type="number" min="0" max="999" size="3" maxlength="3" value="15"
                                       class="reminderTime form-control input-sm inline-block" {formname key=END_REMINDER_TIME}
                                       id="endReminderTime"/>
                                <select class="reminderInterval form-control input-sm inline-block" {formname key=END_REMINDER_INTERVAL}
                                        id="endReminderInterval">
                                    <option value="{ReservationReminderInterval::Minutes}">{translate key=minutes}</option>
                                    <option value="{ReservationReminderInterval::Hours}">{translate key=hours}</option>
                                    <option value="{ReservationReminderInterval::Days}">{translate key=days}</option>
                                </select>
                                <span class="reminderLabel">{translate key=ReminderBeforeEnd}</span>
                            </div>

                        </div>
                        <div class="clear">&nbsp;</div>
                    </div>
                </div>
            {/if}

            {if $UploadsEnabled}
                <div class="row col-xs-12">
                    <div class="col-xs-12 reservationAttachments">

                        <label>{translate key=AttachFile} <span class="note">({$MaxUploadSize}
                                MB {translate key=Maximum})</span>
                        </label>

                        <div id="reservationAttachments">
                            <div class="attachment-item">
                                <label for="reservationUploadFile">Reservation Upload File</label>
                                <input type="file" {formname key=RESERVATION_FILE multi=true}
                                       id="reservationUploadFile"/>
                                <a class="add-attachment" href="#">{translate key=Add} <i class="fa fa-plus-square"></i></a>
                                <a class="remove-attachment" href="#"><span
                                            class="no-show">{translate key=Delete}</span><i
                                            class="fa fa-minus-square"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}

            {if $Terms != null}
                <div class="row col-xs-12" id="termsAndConditions">
                    <div class="col-xs-12">
                        {if $TermsAccepted}
                            <div class="margin-top-25">
                                <i class="fa fa-check-square-o"></i> {translate key=IAccept}
                                <a href="{$Terms->DisplayUrl()}" style="vertical-align: middle" target="_blank">{translate key=TheTermsOfService}</a>
                            </div>
                        {else}
                            <div class="checkbox">
                                <input type="checkbox"
                                       id="termsAndConditionsAcknowledgement" {formname key=TOS_ACKNOWLEDGEMENT} {if $TermsAccepted}checked="checked"{/if}/>
                                <label for="termsAndConditionsAcknowledgement">{translate key=IAccept}</label>
                                <a href="{$Terms->DisplayUrl()}" style="vertical-align: middle"
                                   target="_blank">{translate key=TheTermsOfService}</a>
                            </div>
                        {/if}
                    </div>
                </div>
            {/if}

            <input type="hidden" {formname key=RESERVATION_ID} value="{$ReservationId}"/>
            <input type="hidden" {formname key=REFERENCE_NUMBER} value="{$ReferenceNumber}" id="referenceNumber"/>
            <input type="hidden" {formname key=RESERVATION_ACTION} value="{$ReservationAction}"/>
            <input type="hidden" {formname key=DELETE_REASON} value="" id="hdnDeleteReason"/>

            <input type="hidden" {formname key=SERIES_UPDATE_SCOPE} id="hdnSeriesUpdateScope"
                   value="{SeriesUpdateScope::FullSeries}"/>

            <div class="row">
                <div class="reservationButtons col-md-6 col-md-offset-6 col-xs-12">
                    <div class="pull-right-sm">
                        <button type="button" class="btn btn-default" onclick="window.location='{$ReturnUrl}'">
                            <span class="hidden-xs">{translate key='Cancel'}</span>
                            <span class="visible-xs"><i class="fa fa-arrow-circle-left"></i></span>
                        </button>
                        {block name="submitButtons"}
                            <button type="button" {if $resource.email eq $email} disabled {/if} class="btn btn-success save create">
                                <span class="glyphicon glyphicon-ok-circle"></span>
                                {translate key='Create'}
                            </button>
                        {/block}
                    </div>
                </div>
            </div>

            {csrf_token}

            {if $UploadsEnabled}
                {block name='attachments'}
                {/block}
            {/if}

            <div id="retrySubmitParams" class="no-show"></div>
        </form>
    </div>

    <div class="modal fade " id="dialogResourceGroups" tabindex="-1" role="dialog" aria-labelledby="resourcesModalLabel"
         aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    {*<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>*}
                    <h4 class="modal-title" id="resourcesModalLabel">Physical Resource</h4>

                    {foreach from=$ResourceGroupsAsJson|json_decode item=result }
                        {* <pre>{$result->children|@print_r}</pre>*}
                        {foreach from=$result->children|@array_reverse item=results }
                            {assign var="rsr" value="{$results->resource_id}"}
                        {/foreach}
                    {/foreach}

                </div>
                <div class="modal-body scrollable-modal-content">

                    <select id="physical_list" class="form-control">
                        <option>Select a resource</option>
                        {foreach from=$ResourceGroupsAsJson|json_decode item=result }
                            {foreach from=$result->children item=row}
                                {if {$row->email} eq ''}
                                    
                                        <option     resource-id-pull="{$row->resource_id}" class="{$row->resource_id}" value="{$row->resource_id}">
                                            {$row->resource_name}
                                        </option>
                                    
                                {/if}
                            {/foreach}
                        {/foreach}
                    </select><br>
                    <ul class="jqtree_common jqtree-tree">
                        {foreach from=$ResourceGroupsAsJson|json_decode item=result }
                            {foreach from=$result->children item=row}


                                {if {$row->email} eq ''}
                                    <li class="jqtree_common">
                                        {else}
                                    <li class="jqtree_common" style="display: none">
                                {/if}
                                {*<li class="jqtree_common">*}
                                        <div class="jqtree-element jqtree_common">
                                <span class="jqtree-title jqtree_common">
                                    <label id="demos">
                                        {if empty({$smarty.get.rid})}
                                            <input {if $row->resource_id|in_array:$resource_id}{*{if {$rsr} eq {$row->resource_id}}*} checked {/if} type="checkbox" value={$row->resource_id} resource-id="{$row->resource_id}" id="{$row->resource_id}" name="nomail" group-id="0" reservation-color="" reservation-text-color="" requires-approval="0" requires-checkin="0" class="PrResources additionalResourceCheckbox {if empty({$row->email})}pr_{$row->resource_id} pr {else}hr_{$row->resource_id} hr {/if}"" name="pr_{$row->resource_id}">
                                        {$row->resource_name}
                                        {*{if empty({$smarty.get.srn})}
                                            2<input {if {$ResourceId} eq {$row->resource_id}} checked {/if} type="checkbox" resource-id="{$row->resource_id}" id="{$row->resource_id}" name="nomail" group-id="0" reservation-color="" reservation-text-color="" requires-approval="0" requires-checkin="0" class="additionalResourceCheckbox {if empty({$row->email})}pr_{$row->resource_id} pr {else}hr_{$row->resource_id} hr {/if}"" name="pr_{$row->resource_id}">

                                        {/if}*}
                                        {else}
                                         {*<input {if {$resource.resource_id} eq {$row->resource_id}} checked {/if} type="checkbox" resource-id="{$row->resource_id}" id="{$row->resource_id}" name="nomail" group-id="0" reservation-color="" reservation-text-color="" requires-approval="0" requires-checkin="0" class="additionalResourceCheckbox nomail">*}
                                            <input {if {$ResourceId} eq {$row->resource_id}} checked {/if} type="checkbox" value={$row->resource_id} resource-id="{$row->resource_id}" id="{$row->resource_id}"  group-id="0" reservation-color="" reservation-text-color="" requires-approval="0" requires-checkin="0" class="PrResources additionalResourceCheckbox {if empty({$row->email})}pr_{$row->resource_id} pr {else}hr_{$row->resource_id} hr {/if}" name="pr_{$row->resource_id} physical_resource">
                                            {$row->resource_name}
                                        {/if}
                                    </label>
                                </span>
                                        </div>
                                    </li>



                                {*{/if}*}
                            {/foreach}
                        {/foreach}
                    </ul>

                    <input type="hidden" name="human" id="human" value="physical">
                </div>
                <div class="modal-footer">
                    <div id="checking-availability" class="pull-left">{translate key=CheckingAvailability} <i
                                class="fa fa-spinner fa-spin" aria-hidden="true"></i></div>
                    <button type="button" class="btn btn-default btnClearAddResources"
                            data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btnConfirmAddResources">{translate key='Done'}</button>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="dialogResourceGroupsHuman" tabindex="-1" role="dialog" aria-labelledby="resourcesModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="resourcesModalLabel">Human Resource</h4>
                </div>
                <div class="modal-body scrollable-modal-content">
                    {* <div id="resourceGroups"></div>*}
                    <div class="participationText">
                        <span class="hidden-xs">{translate key=Add}</span>
                        {*<input type="text" id="inviteeAutocompleteHuman" class="form-control inline-block user-search" placeholder="{translate key=NameOrEmail}"/>*}
                        {if $CanViewAdmin}
                            <input type="text" id="inviteeAutocompleteHuman" class="form-control inline-block user-search" placeholder="{translate key=NameOrEmail}"/>
                        {else}
                            {*<span class="hidden-xs">|</span>*}
                            <select id="group_user_list_human" class="form-control">
                                <option value="" selected>Select User</option>
                                {foreach from=$ResourceGroupsAsJson|json_decode item=result }
                                    {foreach from=$result->children item=row}
                                        {if {$row->email} neq ''}
                                            {if $row->resource_id neq $smarty.get.rid}
                                                {if $row->userid neq $owner_id}
                                                <option resource-id-human="{$row->resource_id}" class="{$row->resource_id}" value="{$row->firstname} {$row->lastname}({$row->email}) = {$row->userid}">
                                                    {$row->resource_name}
                                                </option>
                                                    {/if}
                                            {/if}
                                        {/if}
                                    {/foreach}
                                {/foreach}
                                {*{foreach from=$group_users_human key=myId item=i}
                                    <option value="{$i.fname} {$i.lname}({$i.email}) = {$i.user_id}">
                                        {$i.fname} - {$i.email}
                                    </option>
                                {/foreach}*}
                            </select>
                        {/if}
                        {*<span class="hidden-xs">|</span>*}
                    </div>
                    <ul class="jqtree_common jqtree-tree" style="padding-top: 20px;">
                        {foreach from=$ResourceGroupsAsJson|json_decode item=result }
                            {foreach from=$result->children item=row}
                                {if {$row->email} neq ''}
                                    <li class="jqtree_common">
                                        {else}
                                    <li class="jqtree_common" style="display: none">
                                {/if}
                                    {*<li class="jqtree_common">*}
                                        <div class="jqtree-element jqtree_common">
                                <span class="jqtree-title jqtree_common">
                                   {* <label id="demos">
                                        <input   {if $row->resource_id|in_array:$resource_id} checked {/if} type="checkbox" resource-id-human-checkbox="{$row->resource_id}" resource-id="{$row->resource_id}" id="{$row->resource_id}" name="hr_{$row->resource_id}" group-id="0" reservation-color="" reservation-text-color="" requires-approval="0" requires-checkin="0" class="additionalResourceCheckbox hr" value="({$row->firstname} {$row->lastname}{$row->email})">
                                            {$row->resource_name}
                                    </label>*}

                                    <label id="demos">
                                        {if empty({$smarty.get.rid})}
                                        {if $row->userid neq $owner_id}
                                            <input {if $row->resource_id|in_array:$resource_id}{*{if {$rsr} eq {$row->resource_id}}*} checked {/if} type="checkbox" resource-id-human-checkbox="{$row->resource_id}" resource-id="{$row->resource_id}" id="{$row->resource_id}" name="hr_{$row->resource_id}" group-id="0" reservation-color="" reservation-text-color="" requires-approval="0" requires-checkin="0" class="additionalResourceCheckbox {if empty({$row->email})}pr_{$row->resource_id}{else}hr_{$row->resource_id}{/if}" {if {$row->email} neq ''} value="{$row->firstname} {$row->lastname} ({$row->email})=>{$row->userid}" {else} value="0" {/if}>
                                        {$row->resource_name}
                                        {/if}
                                        {if empty({$smarty.get.rn})}
                                            {if $row->userid neq $owner_id}
                                            <input {if {$ResourceId} eq {$row->resource_id}} checked {/if} type="checkbox" resource-id-human-checkbox="{$row->resource_id}" resource-id="{$row->resource_id}" id="{$row->resource_id}" name="hr_{$row->resource_id}" group-id="0" reservation-color="" reservation-text-color="" requires-approval="0" requires-checkin="0" class="additionalResourceCheckbox {if empty({$row->email})}pr_{$row->resource_id}{else}hr_{$row->resource_id}{/if}" {if {$row->email} neq ' '} value="{$row->firstname} {$row->lastname} ({$row->email})=>{$row->userid}" {else} value="0" {/if}>
                                            {/if}
                                        {/if}
                                        {else}
                                         {*<input {if {$resource.resource_id} eq {$row->resource_id}} checked {/if} type="checkbox" resource-id="{$row->resource_id}" id="{$row->resource_id}" name="nomail" group-id="0" reservation-color="" reservation-text-color="" requires-approval="0" requires-checkin="0" class="additionalResourceCheckbox nomail">*}
                                        {if $row->userid neq $owner_id}
                                            <input {if {$ResourceId} eq {$row->resource_id}} checked {/if} type="checkbox" resource-id-human-checkbox="{$row->resource_id}" resource-id="{$row->resource_id}" id="{$row->resource_id}" name="hr_{$row->resource_id}" group-id="0" reservation-color="" reservation-text-color="" requires-approval="0" requires-checkin="0" class="additionalResourceCheckbox {if empty({$row->email})}pr_{$row->resource_id}{else}hr_{$row->resource_id}{/if}" {if empty($row->email)} value="0" {else} value="{$row->firstname} {$row->lastname} ({$row->email})=>{$row->userid}" {/if}>
                                            {$row->resource_name}
                                            {/if}
                                        {/if}
                                    </label>
                                </span>
                                        </div>
                                    </li>

                            {/foreach}
                        {/foreach}
                    </ul>
                    <input type="hidden" name="human" id="human" value="physical2323">
                </div>
                <div class="modal-footer">
                    <div id="checking-availability-human" class="pull-left">{translate key=CheckingAvailability} <i
                                class="fa fa-spinner fa-spin" aria-hidden="true"></i></div>
                    {* <div id="checking-availability" class="pull-left">{translate key=CheckingAvailability} <i
                                 class="fa fa-spinner fa-spin" aria-hidden="true"></i></div>*}
                    {*<button type="button" class="btn btn-default btnClearAddResources"
                            data-dismiss="modal">{translate key='Cancel'}</button>
                    <button type="button" class="btn btn-primary btnConfirmAddResourcesHuman">{translate key='Done'}</button>*}
                    {*<button type="button" class="btn btn-primary btnConfirmAddResourcesHuman">{translate key='Done'}</button>*}
                    {*<button type="button" class="btn btn-primary btnConfirmAddResourcesHuman">{translate key='Done'}</button>*}
                    <button class="btn btn-default" data-dismiss="modal" aria-label="Close">Close</button>
                    <button type="button" class="btn btn-primary btnConfirmAddResourcesHuman">Done</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="dialogAddAccessories" tabindex="-1" role="dialog" aria-labelledby="accessoryModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="accessoryModalLabel">{translate key=AddAccessories}</h4>
                </div>
                <div class="modal-body scrollable-modal-content">
                    <table class="table table-condensed">
                        <thead>
                        <tr>
                            <th>{translate key=Accessory}</th>
                            <th>{translate key=QuantityRequested}</th>
                            <th>{translate key=QuantityAvailable}</th>
                        </tr>
                        </thead>
                        <tbody>
                        {foreach from=$AvailableAccessories item=accessory}
                            <tr accessory-id="{$accessory->GetId()}">
                                <td>{$accessory->GetName()}</td>
                                <td>
                                    <input type="hidden" class="name" value="{$accessory->GetName()}"/>
                                    <input type="hidden" class="id" value="{$accessory->GetId()}"/>
                                    <input type="hidden" class="resource-ids"
                                           value="{','|implode:$accessory->ResourceIds()}"/>
                                    <label for="accessory{$accessory->GetId()}"
                                           class="no-show">{$accessory->GetName()}</label>
                                    {if $accessory->GetQuantityAvailable() == 1}
                                        <input type="checkbox"
                                               name="accessory{$accessory->GetId()}"
                                               id="accessory{$accessory->GetId()}"
                                               value="1"
                                               size="3"/>
                                    {else}
                                        <input type="number" min="0" max="999"
                                               class="form-control input-sm accessory-quantity"
                                               name="accessory{$accessory->GetId()}"
                                               id="accessory{$accessory->GetId()}"
                                               value="0" size="3"/>
                                    {/if}
                                </td>
                                <td accessory-quantity-id="{$accessory->GetId()}"
                                    accessory-quantity-available="{$accessory->GetQuantityAvailable()}">{$accessory->GetQuantityAvailable()|default:'&infin;'}</td>
                            </tr>
                        {/foreach}
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button id="btnCancelAddAccessories" type="button" class="btn btn-default"
                            data-dismiss="modal">{translate key='Cancel'}</button>
                    <button id="btnConfirmAddAccessories" type="button"
                            class="btn btn-primary">{translate key='Done'}</button>
                </div>
            </div>
        </div>
    </div>

    <div id="wait-box" class="wait-box">
        <div id="creatingNotification">
            <h3 id="createUpdateMessage" class="no-show">
                {block name="ajaxMessage"}
                    {translate key=CreatingReservation}
                {/block}
            </h3>
            <h3 id="checkingInMessage" class="no-show">
                {translate key=CheckingIn}
            </h3>
            <h3 id="checkingOutMessage" class="no-show">
                {translate key=CheckingOut}
            </h3>
            <h3 id="joiningWaitingList" class="no-show">
                {translate key=AddingToWaitlist}
            </h3>
            {html_image src="reservation_submitting.gif"}
        </div>
        <div id="result"></div>
    </div>

    <div id="user-availability-box">

    </div>

</div>

{block name=extras}{/block}

{include file="javascript-includes.tpl" Qtip=true Owl=true}

{control type="DatePickerSetupControl" ControlId="BeginDate" AltId="formattedBeginDate" DefaultDate=$StartDate MinDate=$AvailabilityStart MaxDate=$AvailabilityEnd FirstDay=$FirstWeekday}
{control type="DatePickerSetupControl" ControlId="EndDate" AltId="formattedEndDate" DefaultDate=$EndDate MinDate=$AvailabilityStart MaxDate=$AvailabilityEnd FirstDay=$FirstWeekday}
{control type="DatePickerSetupControl" ControlId="EndRepeat" AltId="formattedEndRepeat" DefaultDate=$RepeatTerminationDate MinDate=$AvailabilityStart MaxDate=$AvailabilityEnd FirstDay=$FirstWeekday}

{jsfile src="js/jquery.autogrow.js"}
{jsfile src="js/moment.min.js"}
{jsfile src="resourcePopup.js"}
{jsfile src="userPopup.js"}
{jsfile src="date-helper.js"}
{jsfile src="recurrence.js"}
{jsfile src="reservation.js"}
{jsfile src="autocomplete.js"}
{jsfile src="force-numeric.js"}
{jsfile src="reservation-reminder.js"}
{jsfile src="ajax-helpers.js"}
{jsfile src="js/tree.jquery.js"}

<script type="text/javascript">

    $(function () {
    	$('#BeginPeriod').on('change', function() {
    	    //alert( $(this).find(":selected").val() );
    	    //test();
    	});

    	function test()
    	{
    		alert($('#EndPeriod option:selected').val());
    	}
		
    	$('#users').on('change', function() {
    		var items = this.value.split('=');
    		
    		$('input[id=userId]').val(items[1]);
    		
    		$("#userName").text(items[0]);
    		$("#userName").attr("data-userid",items[1]);
    	});

        var scopeOptions = {
            instance: '{SeriesUpdateScope::ThisInstance}',
            full: '{SeriesUpdateScope::FullSeries}',
            future: '{SeriesUpdateScope::FutureInstances}'
        };

        var reservationOpts = {
            additionalResourceElementId: '{FormKeys::ADDITIONAL_RESOURCES}',
            accessoryListInputId: '{FormKeys::ACCESSORY_LIST}[]',
            returnUrl: '{$ReturnUrl}',
            scopeOpts: scopeOptions,
            createUrl: 'ajax/reservation_save.php',
            updateUrl: 'ajax/reservation_update.php',
            deleteUrl: 'ajax/reservation_delete.php',
            checkinUrl: 'ajax/reservation_checkin.php?action={ReservationAction::Checkin}',
            checkoutUrl: 'ajax/reservation_checkin.php?action={ReservationAction::Checkout}',
            waitlistUrl: 'ajax/reservation_waitlist.php',
            userAutocompleteUrl: "ajax/autocomplete.php?type={AutoCompleteType::User}",
            groupAutocompleteUrl: "ajax/autocomplete.php?type={AutoCompleteType::Group}",
            changeUserAutocompleteUrl: "ajax/autocomplete.php?type={AutoCompleteType::MyUsers}",
            maxConcurrentUploads: '{$MaxUploadCount}',
            guestLabel: '({translate key=Guest})',
            accessoriesUrl: 'ajax/available_accessories.php?{QueryStringKeys::START_DATE}=[sd]&{QueryStringKeys::END_DATE}=[ed]&{QueryStringKeys::START_TIME}=[st]&{QueryStringKeys::END_TIME}=[et]&{QueryStringKeys::REFERENCE_NUMBER}=[rn]',
            resourcesUrl: 'ajax/unavailable_resources.php?{QueryStringKeys::START_DATE}=[sd]&{QueryStringKeys::END_DATE}=[ed]&{QueryStringKeys::START_TIME}=[st]&{QueryStringKeys::END_TIME}=[et]&{QueryStringKeys::REFERENCE_NUMBER}=[rn]',
            creditsUrl: 'ajax/reservation_credits.php',
            creditsEnabled: '{$CreditsEnabled}',
            emailUrl: 'ajax/reservation_email.php?{QueryStringKeys::REFERENCE_NUMBER}={$ReferenceNumber}',
            availabilityUrl: 'ajax/availability.php?{QueryStringKeys::SCHEDULE_ID}={$ScheduleId}'
        };

        var reminderOpts = {
            reminderTimeStart: '{$ReminderTimeStart}',
            reminderTimeEnd: '{$ReminderTimeEnd}',
            reminderIntervalStart: '{$ReminderIntervalStart}',
            reminderIntervalEnd: '{$ReminderIntervalEnd}'
        };

        var reservation = new Reservation(reservationOpts);
        reservation.init('{$UserId}', '{format_date date=$StartDate key=system_datetime timezone=$Timezone}', '{format_date date=$EndDate key=system_datetime timezone=$Timezone}');

        var reminders = new Reminder(reminderOpts);
        reminders.init();

        {foreach from=$Participants item=user}
        reservation.addParticipant("{$user->FullName|escape:'javascript'}", "{$user->UserId|escape:'javascript'}");
        {/foreach}

        {foreach from=$Invitees item=user}
        reservation.addInvitee("{$user->FullName|escape:'javascript'}", '{$user->UserId}');
        {/foreach}

        {foreach from=$ParticipatingGuests item=guest}
        reservation.addParticipatingGuest('{$guest}');
        {/foreach}

        {foreach from=$InvitedGuests item=guest}
        reservation.addInvitedGuest('{$guest}');
        {/foreach}

        {foreach from=$Accessories item=accessory}
        reservation.addAccessory({$accessory->AccessoryId}, {$accessory->QuantityReserved}, "{$accessory->Name|escape:'javascript'}");
        {/foreach}

        reservation.addResourceGroups({$ResourceGroupsAsJson});

        var recurOpts = {
            repeatType: '{$RepeatType}',
            repeatInterval: '{$RepeatInterval}',
            repeatMonthlyType: '{$RepeatMonthlyType}',
            repeatWeekdays: [{foreach from=$RepeatWeekdays item=day}{$day}, {/foreach}],
            autoSetTerminationDate: $('#referenceNumber').val() != ''
        };

        var recurrence = new Recurrence(recurOpts);
        recurrence.init();

        recurrence.onChange(reservation.repeatOptionsChanged);

        var ajaxOptions = {
            target: '#result', // target element(s) to be updated with server response
            beforeSubmit: reservation.preSubmit, // pre-submit callback
            success: reservation.showResponse,  // post-submit callback
            async: true
        };

        $('#form-reservation').submit(function () {
            $(this).ajaxSubmit(ajaxOptions);
            return false;
        });

        $('#description').autogrow();
        $('#userName').bindUserDetails();

        $.blockUI.defaults.css.width = '60%';
        $.blockUI.defaults.css.left = '20%';

        var resources = $('#reservation-resources');
        resources.tooltip({
            selector: '[data-tooltip]', title: function () {
                var tooltipType = $(this).data('tooltip');
                if (tooltipType === 'approval') {
                    return "{translate key=RequiresApproval}";
                }
                if (tooltipType === 'checkin') {
                    return "{translate key=RequiresCheckInNotification}";
                }
                if (tooltipType === 'autorelease') {
                    var text = "{translate key=AutoReleaseNotification args='%s'}";
                    return text.replace('%s', $(this).data('autorelease'));
                }
            }
        });
    });

    $('.modal').on('shown.bs.modal', function () {
        $(this).find('[autofocus]').focus();
    });
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>
    $.validate({
        lang: 'en'
    });
</script>
{include file='globalfooter.tpl'}
