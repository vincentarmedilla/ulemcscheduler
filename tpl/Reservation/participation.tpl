{*
Copyright 2012-2019 Nick Korbel

This file is part of Booked Scheduler.

Booked Scheduler is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Booked Scheduler is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty ofProject Lead
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Booked Scheduler.  If not, see <http://www.gnu.org/licenses/>.
*}
<style>
    .disabled {
  background-color: lightgrey;
  }
</style>
<div id="reservationParticipation">
	<div class="row">
	
		<label for="participantAutocomplete">{*{translate key="ParticipantList"}*}Project Lead/Engineers</label>
		<span class="badge" id="participantBadge">0</span>
		<br/>
		<div class="participationText">
			<span class="hidden-xs">{translate key=Add}</span>
			{if $CanViewAdmin}
				<input type="text" id="participantAutocomplete" class="form-control inline-block user-search" placeholder="{translate key=NameOrEmail}"/>
			{else}
				{*<span class="hidden-xs">|</span>*}



				<select id="project_lead" class="form-control selectpicker" data-live-search="true">
					<option value="" selected disabled>Select User</option>
					{foreach from=$group_users key=myId item=i name=foo}
						
						<option value="{$i.fname} {$i.lname}({$i.email})={$i.user_id}">
							{$i.fname} - {$i.email} ---- {$smarty.foreach.foo.iteration}
						</option>
						
					{/foreach}
				</select>
			{/if}

			{*<span class="hidden-xs">|</span>*}
		</div>
		{*<div class="participationButtons">
			<button id="promptForParticipants" type="button" class="btn btn-link inline">
				<i class="fa fa-user"></i>
				{translate key='Users'}
			</button>
			*}{*<button id="promptForGroupParticipants" type="button" class="btn btn-link inline">
				<i class="fa fa-users"></i>
				{translate key='Groups'}
			</button>*}{*
		</div>*}

		<div id="participantList"></div>
	</div>

	<div class="row">
		<label for="participantAutocomplete">{*{translate key="ParticipantList"}*}Human Resource/Test Engineers</label>
		<span class="badge" id="inviteeBadge">0</span>
		<br/>
		<div class="participationText">
			<span class="hidden-xs">{translate key=Add}</span>
			{if $CanViewAdmin}
				<input type="text" id="inviteeAutocomplete" class="form-control inline-block user-search" placeholder="{translate key=NameOrEmail}"/>
			{else}
				{*<span class="hidden-xs">|</span>*}
				<select id="group_user_list_human_engineer" class="form-control selectpicker" data-live-search="true">
					<option  disabled selected>Select User</option>
					{foreach from=$ResourceGroupsAsJson|json_decode item=result }
						{foreach from=$result->children item=row}
							{if {$row->email} neq ''}
								
									<option resource-id-human-engineer="{$row->resource_id}" value="{$row->firstname} {$row->lastname}({$row->email})={$row->userid}={$row->resource_id}">
										{$row->resource_name} - {$row->email}
									</option>
								
							{/if}
						{/foreach}
					{/foreach}
				</select>
			{/if}

			{*<span class="hidden-xs">|</span>*}
		</div>

		<div id="inviteeList">

		</div>
	</div>

	{*<div class="row">
		<label for="inviteeAutocomplete">*}{*{translate key="InvitationList"}*}{*Human Resource/Test Engineers</label>
		<span class="badge" id="inviteeBadge">0</span>
		<br/>
		*}{*<pre>{$group_users|@print_r}</pre>*}{*

		<div class="participationText">
			<span class="hidden-xs">{translate key=Add}</span>
			{if $CanViewAdmin}
			<input type="text" id="inviteeAutocomplete" class="form-control inline-block user-search" placeholder="{translate key=NameOrEmail}"/>
			{else}
			*}{*<span class="hidden-xs">|</span>*}{*
				<select id="group_user_list_human_engineer" class="form-control">
					<option value="" selected>Select User</option>
					{foreach from=$ResourceGroupsAsJson|json_decode item=result }
						{foreach from=$result->children item=row}
							{if {$row->email} neq ''}
							{if $row->userid neq $owner_id}
								<option resource-id-human-engineer="{$row->resource_id}" value="{$row->firstname} {$row->lastname}({$row->email}) = {$row->userid}">
									{$row->resource_name} - {$row->email}
								</option>
							{/if}
							{/if}
						{/foreach}
					{/foreach}
				</select>
			*}{*<select id="group_user_list" class="form-control">
				<option value="" selected>Select User</option>
				{foreach from=$group_users key=myId item=i}
					<option value="{$i.fname} {$i.lname}({$i.email}) = {$i.user_id}">
						{$i.fname} - {$i.email}
					</option>
				{/foreach}
			</select>*}{*
			{/if}
		</div>


		*}{*<pre>{$group_users|@print_r}</pre>*}{*

		<div class="participationButtons">
			*}{*<button id="promptForInvitees" type="button" class="btn btn-link inline">
				<i class="fa fa-user"></i>
				{translate key='Users'}
			</button>*}{*
			*}{*<button id="promptForGroupInvitees" type="button" class="btn btn-link inline">
				<i class="fa fa-users"></i>
				{translate key='Groups'}
			</button>*}{*
			{if $AllowGuestParticipation}
				<button id="promptForGuests" type="button" class="btn btn-link inline">
					<i class="fa fa-user-plus"></i>
					{translate key='Guest'}
				</button>
			{/if}
		</div>

		<div id="inviteeList">
			{if !empty($resource.user_id)}
			<div class="user"><a href="#" class="remove" onclick="remove_user('{$smarty.get.rid}')"><span class="fa fa-remove"></span></a> <a href="#" class="bindableUser" data-userid="{$resource.user_id}" user-details-bound="1">{$resource.fname} {$resource.lname} ({$resource.email})</a><input type="hidden" class="id" name="invitationList[]" value="{$resource.user_id}"></div>
			{/if}

			*}{*{if $smarty.get.rn}

				<div class="user"><a href="#" class="remove" onclick="remove_user('{$result_hr.resource_id}')"><span class="fa fa-remove"></span></a> <a href="#" class="bindableUser" data-userid="{$result_hr.user_id}" user-details-bound="1">{$result_hr.fname} {$result_hr.lname} ({$result_hr.email})</a><input type="hidden" class="id" name="invitationList[]" value="{$result_hr.user_id}"></div>
			{/if}*}{*
		</div>

		*}{*<div id="allowParticipation">
			<div class="checkbox">
				<input type="checkbox" {if $AllowParticipantsToJoin}checked="checked"{/if} {formname key=ALLOW_PARTICIPATION} id="allowParticipationCheckbox">
				<label for="allowParticipationCheckbox">{translate key=AllowParticipantsToJoin}</label>
			</div>
		</div>*}{*

		<div class="modal fade" id="inviteeDialog" tabindex="-1" role="dialog" aria-labelledby="inviteeModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="inviteeModalLabel">*}{*{translate key=InviteOthers}*}{*Test Engineer</h4>
					</div>
					<div class="modal-body scrollable-modal-content">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">{translate key='Done'}</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="inviteeGuestDialog" tabindex="-1" role="dialog" aria-labelledby="inviteeGuestModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="inviteeGuestModalLabel">{translate key=InviteOthers}</h4>
					</div>
					<div class="modal-body">
						<div class="form-group row">
							<label for="txtGuestEmail" class="col-xs-2 form-control-label">{translate key=Email}</label>
							<div class="col-xs-8">
								<input id="txtGuestEmail" type="email" class="form-control"/>
							</div>
							<div class="col-xs-2">
								<button id="btnAddGuest" class="btn btn-link" type="button"><span class="no-show">{translate key='Guest'}</span><i class="fa fa-user-plus icon add"></i></button>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">{translate key='Done'}</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="inviteeGroupDialog" tabindex="-1" role="dialog" aria-labelledby="inviteeGroupModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="inviteeGroupModalLabel">{translate key=InviteOthers}</h4>
					</div>
					<div class="modal-body scrollable-modal-content">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">{translate key='Done'}</button>
					</div>
				</div>
			</div>
		</div>

	</div>*}

	<div class="modal fade" id="participantDialog" tabindex="-1" role="dialog" aria-labelledby="participantModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="participantModalLabel">{*{translate key=AddParticipants}*}Project Lead</h4>
				</div>
				<div class="modal-body scrollable-modal-content">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">{translate key='Done'}</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="participantGroupDialog" tabindex="-1" role="dialog" aria-labelledby="participantGroupModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="participantGroupModalLabel">{translate key=AddParticipants}</h4>
				</div>
				<div class="modal-body scrollable-modal-content">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">{translate key='Done'}</button>
				</div>
			</div>
		</div>
	</div>
</div>
