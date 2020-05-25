{*
Copyright 2017-2019 Nick Korbel

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

{include file='globalheader.tpl' Select2=true Qtip=true}

<div class="page-search-reservations">

    <form role="form" name="searchForm" id="searchForm" method="post"
          action="{$smarty.server.SCRIPT_NAME}?action=search">

        <div class="form-group col-sm-4">
            <label for="schedules" class="no-show">{translate key=Schedules}</label>
            <select id="schedules" class="form-control" multiple="multiple" {formname key=SCHEDULE_ID multi=true}>
                {foreach from=$Schedules item=schedule}
                    <option value="{$schedule->GetId()}">{$schedule->GetName()}</option>
                {/foreach}
            </select>
        </div>
        
        <div class="form-group col-sm-4">
            <select id="resources" class="form-control" multiple="multiple" {formname key=RESOURCE_ID multi=true}>
                {foreach from=$Resources item=resource}
                    <option value="{$resource->GetId()}">{$resource->GetName()}</option>
                {/foreach}
            </select>
        </div>
        
        <div class="form-group col-sm-2">
            <label style="font-size:13px"><input type="checkbox" id="physicalResource" name="physicalResource" value="PR" onclick="oncheckEvent()"> Physical</label>&nbsp;&nbsp;
            <label style="font-size:13px"><input type="checkbox" id="humanResource" name="humanResource" value="HR" onclick="oncheckEvent()"> Human</label>
        </div>
        
        <div class="form-group col-sm-2">
           <select id="userFilter" name="userFilter" class="form-control">
                <option selected>Owner/User</option>
                {foreach from=$group_users key=myId item=i}
                    <option value="{$i.user_id}">
                        {$i.fname} - {$i.email}
                    </option>
                {/foreach}
            </select>
            <input id="userId" name="userId" type="hidden" value=""/>
                    <span  ref="userFilter,userId"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-sm-4">
           <select id="userFilter2" name="userFilter2" class="form-control">
                <option selected>Select Project Lead</option>
                {foreach from=$group_users key=myId item=i}
                    <option value="{$i.user_id}">
                        {$i.fname} - {$i.email}
                    </option>
                {/foreach}
            </select>
            <input id="projectLead" name="projectLead" type="hidden" value=""/>
                    <span  ref="userFilter2,projectLead"></span>
        </div>

        <div class="form-group col-sm-4">
            <label for="title" class="no-show">{translate key=Title}</label>
            <input type="search" id="title" class="form-control" {formname key=RESERVATION_TITLE}
                   placeholder="{translate key=Title}"/>
<!--             <span class="searchclear glyphicon glyphicon-remove-circle" ref="title"></span> -->
        </div>

        <div class="form-group col-sm-4">
            <label for="description" class="no-show">{translate key=Description}</label>
            <input type="search" id="description" class="form-control" {formname key=DESCRIPTION}
                   placeholder="{translate key=Description}"/>
<!--             <span class="searchclear glyphicon glyphicon-remove-circle" ref="description"></span> -->
        </div>

        <div class="form-group col-sm-4">
            <label for="referenceNumber" class="no-show">Client Name</label>
            <input type="search" id="client_name" class="form-control" name="client_name"
                   placeholder="Client Name"/>
<!--             <span class="searchclear glyphicon glyphicon-remove-circle" ref="client_name"></span> -->
        </div>
        
        <div class="form-group col-sm-4">
            <label for="referenceNumber" class="no-show">Request No.</label>
            <input type="search" id="request_no" class="form-control" name="request_no"
                   placeholder="Request No."/>
<!--             <span class="searchclear glyphicon glyphicon-remove-circle" ref="request_no"></span> -->
        </div>
        <div class="form-group col-sm-2">
            <label for="referenceNumber" class="no-show">Order No./Project No.</label>
            <input type="search" id="project_no" class="form-control" name="project_no"
                   placeholder="Order No./Project No."/>
        </div>
        <div class="form-group col-sm-2">
            <label style="font-size:13px"><input type="checkbox" {if $cos eq '1'} checked {/if}  name="client_on_sites" id="client_on_sites" value="1">Client On Site</label>&nbsp;
            <label style="font-size:13px"><input type="checkbox" {if $sos eq '1'} checked {/if} name="sample_on_site" id="sample_on_site" value="1">Sample On Site</label>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-xs-12">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-default">
                    <input type="radio" id="today"
                           value="today" {formname key=AVAILABILITY_RANGE} />
                    <span class="hidden-xs">{translate key=Today}</span>
                    <span> {format_date date=$Today key=calendar_dates}</span>
                </label>
                <label class="btn btn-default">
                    <input type="radio" id="tomorrow" value="tomorrow" {formname key=AVAILABILITY_RANGE} />
                    <span class="hidden-xs">{translate key=Tomorrow}</span>
                    <span> {format_date date=$Tomorrow key=calendar_dates}</span>
                </label>
                <label class="btn btn-default">
                    <input type="radio" id="thisweek" value="thisweek" {formname key=AVAILABILITY_RANGE} />
                    <span class="hidden-xs">{translate key=ThisWeek}</span>
                    <span class="visible-xs">{translate key=Week}</span>
                </label>

                <label class="btn btn-default active">
                    <input type="radio" id="daterange" value="daterange"
                           checked="checked" {formname key=AVAILABILITY_RANGE} />
                    <i class="fa fa-calendar"></i><span class="hidden-xs"> {translate key=DateRange}</span>
                </label>
            </div>

            <label for="beginDate" class="no-show">{translate key=BeginDate}</label>
            <input type="text" id="beginDate" class="form-control inline dateinput"
                   placeholder="{translate key=BeginDate}"/>
            <input type="hidden" id="formattedBeginDate" {formname key=BEGIN_DATE}
                   value="{formatdate date=$BeginDate key=system}"/>
            -
            <label for="endDate" class="no-show">{translate key=EndDate}</label>
            <input type="text" id="endDate" class="form-control inline dateinput"
                   placeholder="{translate key=EndDate}"/>
            <input type="hidden" id="formattedEndDate" {formname key=END_DATE}
                   value="{formatdate date=$EndDate key=system}"/>
        </div>

        <div class="col-xs-4"></div>

        <div class="clearfix"></div>

        <div class="form-group col-xs-12">
            <button type="submit" class="btn btn-success col-xs-12" onclick="chkBox()"
                    value="submit" {formname key=SUBMIT}>{translate key=SearchReservations}</button>
            {indicator}
        </div>
    </form>

    <div class="clearfix"></div>
    <div id="reservation-results"></div>

    {csrf_token}

    {include file="javascript-includes.tpl" Select2=true Qtip=2 Clear=true}
    {jsfile src="js/jquery.cookie.js"}
    {jsfile src="ajax-helpers.js"}
    {jsfile src="resourcePopup.js"}
    {jsfile src="autocomplete.js"}
    {jsfile src="reservationPopup.js"}
    {jsfile src="reservation-search.js"}

    {control type="DatePickerSetupControl" ControlId="beginDate" AltId="formattedBeginDate" DefaultDate=$BeginDate}
    {control type="DatePickerSetupControl" ControlId="endDate" AltId="formattedEndDate" DefaultDate=$EndDate}

    <script type="text/javascript">

        $(document).ready(function () {
            var opts = {
                autocompleteUrl: "{$Path}ajax/autocomplete.php?type={AutoCompleteType::User}",
                reservationUrlTemplate: "{$Path}reservation.php?{QueryStringKeys::REFERENCE_NUMBER}=[refnum]",
                popupUrl: "{$Path}ajax/respopup.php"
            };

            var search = new ReservationSearch(opts);
            search.init();
           
            $('#userFilter').select2({
                placeholder: '{translate key=Resources}'
            });

            $('#userFilter').on('select2:select', function (e) {
                var data = $("#userFilter").val();
                $("#userId").val(data);
            });
            
            $('#resources').select2({
                placeholder: '{translate key=ResourcesPhysicalHR}'
            });

            $('#schedules').select2({
                placeholder: '{translate key=Schedules}'
            });
          
            
            $('#userFilter2').select2({
                placeholder: '{translate key=Resources}'
            });

            $('#userFilter2').on('select2:select', function (e) {
                var data = $("#userFilter2").val();
                $("#projectLead").val(data);
            });
            
                      
        });
        
        function chkBox(){
        
                if(document.getElementById("physicalResource").checked && document.getElementById("humanResource").checked)
	                {
	                     document.getElementById("physicalResource").value = "";
	                     document.getElementById("humanResource").value = "";
	                } else {
	                     document.getElementById("physicalResource").value = "PR";
	                     document.getElementById("humanResource").value = "HR";
	               }
		}
        
        function oncheckEvent(){
        
              if(document.getElementById("physicalResource").checked || document.getElementById("humanResource").checked)
              { 
                       document.getElementById("resources").disabled = true;
              } else{
              
                       document.getElementById("resources").disabled = false;
              }
             
        }
    </script>
</div>

{include file='globalfooter.tpl'}