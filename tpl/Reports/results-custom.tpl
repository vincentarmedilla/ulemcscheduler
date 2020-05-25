{*
Copyright 2012-2019 Nick Korbel

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

<script>
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
</script>

<div id="rerank_details" class="gen_comment">
        <div id="customize-column"><div class=""><div><label><input type="checkbox" name="Resource" checked="checked">Resource</label></div><div><label><input type="checkbox" checked="checked" name="Begin"> Begin</label></div><div><label><input type="checkbox" checked="checked" name="End">End</label></div><div><label><input type="checkbox" checked="checked" name="Duration">Duration</label></div><div><label><input type="checkbox" checked="checked" name="Hours">Hours</label></div><div><label><input type="checkbox" checked="checked" name="Title">Title</label></div><div><label><input type="checkbox" checked="checked" name="Description">Description</label></div><div><label><input type="checkbox" checked="checked" name="User">User</label></div><div><label><input type="checkbox" checked="checked" name="First Name">First Name</label></div><div><label><input type="checkbox" checked="checked" name="Last Name">Last Name</label></div><div><label><input type="checkbox" checked="checked" name="Email">Email</label></div><div><label><input type="checkbox" checked="checked" name="Organization">Organization</label></div><div><label><input type="checkbox" checked="checked" name="Groups"> Groups</label></div><div><label><input type="checkbox" checked="checked" name="Created">Created</label></div><div><label><input type="checkbox" checked="checked" name="Last Modified"> Last Modified</label></div><div><label><input type="checkbox" checked="checked" name="Status"> Status</label></div><div><label><input type="checkbox" checked="checked" name="Check In Time"> Check In Time</label></div><div><label><input type="checkbox" checked="checked" name="Check Out Time"> Check Out Time</label></div><div><label><input type="checkbox" checked="checked" name="Original End"> Original End</label></div></div></div>
        
</div>

{if $Report->ResultCount() > 0}
	<div id="report-actions">
		<a href="#" id="btnChart"><span class="fa fa-bar-chart"></span> {translate key=ViewAsChart}</a> |
		{if !$HideSave}
			<a href="#" id="btnSaveReportPrompt"><span class="fa fa-save"></span> {translate key=SaveThisReport}</a> |
		{/if}

		<a href="#" id="btnCsv"><span class="fa fa-download"></span> {translate key=ExportToCSV}</a> |
		<a href="#" id="btnPrint"><span class="fa fa-print"></span> {translate key=Print}</a> |
		<a href="#" id="" class="showreranks"><span class="fa fa-filter"></span> {translate key=Columns}</a>

		<form id="saveSelectedColumns" method="post" role="form" action="{$smarty.server.SCRIPT_NAME}?{QueryStringKeys::ACTION}={ReportActions::SaveColumns}">
			<input {formname key=SELECTED_COLUMNS} id="selectedColumns" type="hidden" value="{$SelectedColumns}" />
		</form>
	</div>
	<div id="customize-columns" style="top:1px;"></div>

	<table width="100%" id="report-results" chart-type="{$Definition->GetChartType()}">
        <thead>
		<tr>
			{foreach from=$Definition->GetColumnHeaders() item=column}
				{capture name="columnTitle"}{if $column->HasTitle()}{$column->Title()}{else}{translate key=$column->TitleKey()}{/if}{/capture}
				<th class="{$smarty.capture.columnTitle}" data-columnTitle="{$smarty.capture.columnTitle}" {if $smarty.capture.columnTitle eq 'Reference Number'} style="display:none;" {/if}>
					{$smarty.capture.columnTitle}
				</th>
			{/foreach}
		</tr>
        </thead>
        <tbody>
		{foreach from=$Report->GetData()->Rows() item=row}
			{cycle values=',alt' assign=rowCss}
			<tr class="{$rowCss}">
				{foreach from=$Definition->GetRow($row) item=cell}
					<td chart-value="{$cell->ChartValue()}" chart-column-type="{$cell->GetChartColumnType()}"
						chart-group="{$cell->GetChartGroup()}">{$cell->Value()}</td>
				{/foreach}
			</tr>
		{/foreach}
        </tbody>
	</table>
	<h4>{$Report->ResultCount()} {translate key=Rows}
		{if $Definition->GetTotal() != ''}
			| {$Definition->GetTotal()} {translate key=Total}
		{/if}
	</h4>
{else}
	<h2 id="report-no-data" class="no-data" style="text-align: center;">{translate key=NoResultsFound}</h2>
{/if}

<script type="text/javascript">
	$(document).ready(function () {
		$('#report-no-data, #report-results').trigger('loaded');
	});
</script>