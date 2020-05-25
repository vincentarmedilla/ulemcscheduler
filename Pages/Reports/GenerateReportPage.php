<?php
/**
 * Copyright 2012-2019 Nick Korbel
 *
 * This file is part of Booked Scheduler.
 *
 * Booked Scheduler is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Booked Scheduler is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Booked Scheduler.  If not, see <http://www.gnu.org/licenses/>.
 */

require_once(ROOT_DIR . 'Pages/SecurePage.php');
require_once(ROOT_DIR . 'Pages/Reports/IDisplayableReportPage.php');
require_once(ROOT_DIR . 'Pages/Ajax/AutoCompletePage.php');
require_once(ROOT_DIR . 'Presenters/Reports/GenerateReportPresenter.php');
require_once(ROOT_DIR . 'Presenters/Reports/ReportCsvColumnView.php');
require_once(ROOT_DIR . 'lib/Application/Schedule/namespace.php');
require_once(ROOT_DIR . 'config/dbconfig.php');
require_once(ROOT_DIR . 'config/crud.php');

interface IGenerateReportPage extends IDisplayableReportPage, IActionPage
{
	/**
	 * @return string|Report_Usage
	 */
	public function GetUsage();

	/**
	 * @return string|Report_ResultSelection
	 */
	public function GetResultSelection();
        
        public function SetSchedules($schedules);

	/**
	 * @return string|Report_GroupBy
	 */
	public function GetGroupBy();

	/**
	 * @return string|Report_Range
	 */
	public function GetRange();

	/**
	 * @return string
	 */
	public function GetStart();

	/**
	 * @return string
	 */
	public function GetEnd();

	/**
	 * @return int[]
	 */
	public function GetResourceIds();

	/**
	 * @return int[]
	 */
	public function GetResourceTypeIds();

	/**
	 * @return int[]
	 */
	public function GetAccessoryIds();

	/**
	 * @return int[]
	 */
	public function GetScheduleIds();

	/**
	 * @return int
	 */
	public function GetUserId();

	/**
	 * @return int
	 */
	public function GetParticipantId();

	/**
	 * @return int[]
	 */
	public function GetGroupIds();

	/**
	 * @return string
	 */
	public function GetReportName();

	/**
	 * @param array|BookableResource[] $resources
	 */
	public function BindResources($resources);

	/**
	 * @param array|AccessoryDto[] $accessories
	 */
	public function BindAccessories($accessories);

	/**
	 * @param array|Schedule[] $schedules
	 */
	public function BindSchedules($schedules);

	/**
	 * @param array|GroupItemView[] $groups
	 */
	public function BindGroups($groups);

	/**
	 * @return bool
	 */
	public function GetIncludeDeleted();

	/**
	 * @param ResourceType[] $resourceTypes
	 */
	public function BindResourceTypes($resourceTypes);

	/**
	 * @return string
	 */
	public function GetSelectedColumns();
}

class GenerateReportPage extends ActionPage implements IGenerateReportPage
{
	/**
	 * @var GenerateReportPresenter
	 */
	private $presenter;

	public function __construct()
	{
		parent::__construct('Reports', 1);
		$this->presenter = new GenerateReportPresenter(
				$this,
				ServiceLocator::GetServer()->GetUserSession(),
				new ReportingService(new ReportingRepository()),
				new ResourceRepository(),
				new ScheduleRepository(),
				new GroupRepository(),
				new UserRepository());
	}

	public function ProcessAction()
	{
		$this->presenter->ProcessAction();
	}

	public function ProcessDataRequest($dataRequest)
	{
		// no-op
	}
        
        public function SetSchedules($schedules)
	{
		$this->Set('Schedules', $schedules);
	}
        
	public function ProcessPageLoad()
	{
        $obj = new bookingClass;
	$this->presenter->PageLoad();
        $user = ServiceLocator::GetServer()->GetUserSession();
        
        $database = New Connection();
        $db = $database->openConnection();

        $g = array();

        foreach($user->Groups as $value) {
            $query_get_group = $db->prepare("select * from groups where group_id = '$value' or admin_group_id  = '$value'");
            $query_get_group->execute();
            $g[] = $query_get_group->fetchAll();
        }

        $t = array_reduce($g, 'array_merge', array());

        $groups = array();
        foreach($t as $value) {
            $gid =  $value['group_id'];
            $sth = $db->prepare("select resource_id,name from resources where admin_group_id = '$gid'");
            $sth->execute();
            $result_group = $sth->fetchAll();
            $groups[] = $result_group;
        }
        
        //get shedules
        $g = array();
        foreach($user->Groups as $value) {
            $g[] = $obj->get_all_group_id($value);
        }
        $group_merge = array_reduce($g, 'array_merge', array());
         $gid = array();
        foreach ($group_merge as $row) {
            $gid[] = $obj->getGroup($row['gid']);
        }
        $two = array_reduce($gid, 'array_merge', array());
        
        $one = array();
         foreach($two as $item) {
            $one[] = $item['group_id'];
        }
       
        //get all user group id
        $userGroup = array_unique($one);
        
        $schedule_result = $obj->fetchScheduleByGroup($userGroup);
        
        //get resource by group id
        $resource = array();
        foreach($userGroup as $value) {
            $resource[] = $obj->getResource($value);
        }
        
       
        $userResource = array_reduce($resource, 'array_merge', array());
       
        
        //get resource type
        $gpid = array();
        foreach($userGroup as $value) {
            $gpid[] = $obj->getResourceTypeByGroupId($value);
        }
        $gResourceType = array_reduce($gpid, 'array_merge', array());
        
        $groups_convert = array_reduce($groups, 'array_merge', array());


        $this->Set('resource_groups',$userResource);
        $this->Set('resourceType',$gResourceType);
        $this->Set('schedules',$schedule_result);
        $this->Set('groups',$obj->getGroups($user->Groups));
		$this->Set('DateAxisFormat', Resources::GetInstance()->GetDateFormat('report_date'));
		$this->Set('group_users',$obj->getUserGroups($user->Groups));
		$this->Display('Reports/generate-report.tpl');
	}

	public function GetUsage()
	{
		return $this->GetValue(FormKeys::REPORT_USAGE);
	}

	public function GetResultSelection()
	{
		return $this->GetValue(FormKeys::REPORT_RESULTS);
	}

	public function GetGroupBy()
	{
		return $this->GetValue(FormKeys::REPORT_GROUPBY);
	}

	public function GetRange()
	{
		return $this->GetValue(FormKeys::REPORT_RANGE);
	}

	public function GetStart()
	{
		return $this->GetValue(FormKeys::REPORT_START);
	}

	public function GetEnd()
	{
		return $this->GetValue(FormKeys::REPORT_END);
	}

	public function GetResourceIds()
	{
        return $this->GetMultiFormValue(FormKeys::RESOURCE_ID);
	}

	public function GetResourceTypeIds()
	{
        return $this->GetMultiFormValue(FormKeys::RESOURCE_TYPE_ID);
	}

	public function GetScheduleIds()
	{
        return $this->GetMultiFormValue(FormKeys::SCHEDULE_ID);
	}

	public function GetUserId()
	{
		return $this->GetValue(FormKeys::USER_ID);
	}

	public function GetParticipantId()
	{
		return $this->GetValue(FormKeys::PARTICIPANT_ID);
	}

	public function GetGroupIds()
	{
        return $this->GetMultiFormValue(FormKeys::GROUP_ID);
	}

	private function GetMultiFormValue($key)
    {
        $id = $this->GetValue($key);
        if (!is_array($id) && !empty($id))
        {
            return array($id);
        }
        return $id;
    }

	public function BindReport(IReport $report, IReportDefinition $definition, $selectedColumns)
	{
		$this->Set('Definition', $definition);
		$this->Set('Report', $report);
		$this->Set('SelectedColumns', $selectedColumns);
	}

	public function BindResources($resources)
	{
		$this->Set('Resources', $resources);
	}

	public function BindResourceTypes($resourceTypes)
	{
		$this->Set('ResourceTypes', $resourceTypes);
	}

	public function BindAccessories($accessories)
	{
		$this->Set('Accessories', $accessories);
	}

	public function BindSchedules($schedules)
	{
		$this->Set('Schedules', $schedules);
	}

	public function GetAccessoryIds()
	{
		return $this->GetValue(FormKeys::ACCESSORY_ID);
	}

	public function GetReportName()
	{
		return $this->GetForm(FormKeys::REPORT_NAME);
	}

	private function GetValue($key)
	{
		$postValue = $this->GetForm($key);

		if (empty($postValue))
		{
			return $this->GetQuerystring($key);
		}

		return $postValue;
	}

	public function ShowCsv()
	{
		$this->Set('ReportCsvColumnView', new ReportCsvColumnView($this->GetVar('SelectedColumns')));
		$this->DisplayCsv('Reports/custom-csv.tpl', 'report.csv');
	}

	public function DisplayError()
	{
		$this->Display('Reports/error.tpl');
	}

	public function ShowResults()
	{
		$this->Display('Reports/results-custom.tpl');
	}

	public function PrintReport()
	{
        $this->Set('ReportCsvColumnView', new ReportCsvColumnView($this->GetVar('SelectedColumns')));
        $this->Display('Reports/print-custom-report.tpl');
	}

	public function BindGroups($groups)
	{
		$this->Set('Groups', $groups);
	}

	public function GetIncludeDeleted()
	{
		$include = $this->GetValue(FormKeys::INCLUDE_DELETED);
		return isset($include);
	}

	public function GetSelectedColumns()
	{
		return $this->GetForm(FormKeys::SELECTED_COLUMNS);
	}
}

