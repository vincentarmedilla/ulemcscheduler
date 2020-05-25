<?php
/**
 * Copyright 2011-2019 Nick Korbel
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

require_once(ROOT_DIR . 'Pages/Admin/AdminPage.php');
require_once(ROOT_DIR . 'Pages/IPageable.php');
require_once(ROOT_DIR . 'Presenters/Admin/ManageGroupsPresenter.php');
require_once(ROOT_DIR . 'Domain/Access/namespace.php');
require_once(ROOT_DIR . 'config/crud.php');

interface IManageGroupsPage extends IActionPage
{
    /**
     * @return int
     */
    public function GetGroupId();

    /**
     * @param $groups GroupItemView[]|array
     */
    public function BindGroups($groups);

    /**
     * @param PageInfo $pageInfo
     */
    public function BindPageInfo(PageInfo $pageInfo);

    /**
     * @return int
     */
    public function GetPageNumber();

    /**
     * @return int
     */
    public function GetPageSize();

    /**
     * @param $response string
     */
    public function SetJsonResponse($response);

    /**
     * @return int
     */
    public function GetUserId();

    /**
     * @param $resources array|BookableResource[]
     */
    public function BindResources($resources);

    /**
     * @param $schedules Schedule[]
     */
    public function BindSchedules($schedules);

    /**
     * @param $roles array|RoleDto[]
     */
    public function BindRoles($roles);

    /**
     * @return int[]|array
     */
    public function GetAllowedResourceIds();

    /**
     * @return string
     */
    public function GetGroupName();

    /**
     * @return int[]|array
     */
    public function GetRoleIds();

    /**
     * @param $adminGroups GroupItemView[]|array
     */
    public function BindAdminGroups($adminGroups);

    /**
     * @return int
     */
    public function GetAdminGroupId();

    /**
     * @return bool
     */
    public function AutomaticallyAddToGroup();

    /**
     * @return int[]
     */
    public function GetUserIds();

    /**
     * @return int[]
     */
    public function GetGroupAdminIds();

    /**
     * @return int[]
     */
    public function GetResourceAdminIds();

    /**
     * @return int[]
     */
    public function GetScheduleAdminIds();
}

class ManageGroupsPage extends ActionPage implements IManageGroupsPage
{
    protected $CanChangeRoles = true;
    /**
     * @var ManageGroupsPresenter
     */
    protected $presenter;

    /**
     * @var PageablePage
     */
    private $pageable;

    public function __construct()
    {
        parent::__construct('ManageGroups', 1);
        $this->presenter = new ManageGroupsPresenter($this, new GroupRepository(), new ResourceRepository(), new ScheduleRepository());

        $this->pageable = new PageablePage($this);
    }

    public function ProcessPageLoad()
    {
        $this->presenter->PageLoad();

        $obj = new bookingClass;

        $user = ServiceLocator::GetServer()->GetUserSession();

        $this->Set('group_users',$obj->getUsers($user->Groups));

        $this->Set('chooseText', Resources::GetInstance()->GetString('Choose') . '...');
        $this->Set('CanChangeRoles', $this->CanChangeRoles);
        $this->Display('Admin/manage_groups.tpl');
    }

    public function BindPageInfo(PageInfo $pageInfo)
    {
        $this->pageable->BindPageInfo($pageInfo);
    }

    public function GetPageNumber()
    {
        return $this->pageable->GetPageNumber();
    }

    public function GetPageSize()
    {
        return $this->pageable->GetPageSize();
    }

    public function BindGroups($groups)
    {
        $this->Set('groups', $groups);
    }

    public function ProcessAction()
    {
        $this->presenter->ProcessAction();
    }

    public function GetGroupId()
    {
        $groupId = $this->GetForm(FormKeys::GROUP_ID);
        if (!empty($groupId)) {
            return $groupId;
        }
        return $this->GetQuerystring(QueryStringKeys::GROUP_ID);
    }

    public function SetJsonResponse($response)
    {
        parent::SetJson($response);
    }

    public function GetUserId()
    {
        return $this->GetForm(FormKeys::USER_ID);
    }

    public function BindResources($resources)
    {
        $this->Set('resources', $resources);
    }

    public function GetAllowedResourceIds()
    {
        return $this->GetForm(FormKeys::RESOURCE_ID);
    }

    public function GetGroupName()
    {
        return $this->GetForm(FormKeys::GROUP_NAME);
    }

    public function BindRoles($roles)
    {
        $this->Set('Roles', $roles);
    }

    public function GetRoleIds()
    {
        return $this->GetForm(FormKeys::ROLE_ID);
    }

    public function BindAdminGroups($adminGroups)
    {
        $user = ServiceLocator::GetServer()->GetUserSession();
        
        $obj = new bookingClass;
        
        $database = new Connection();
        $db = $database->openConnection();
        
        //get the resource type based on group id
        $gk = array();
        foreach($user->Groups as $value) {
            $gk[] = $obj->get_all_group_id($value);
        }
        
        $group_merge = array_reduce($gk, 'array_merge', array());
        $gid = array();
        foreach ($group_merge as $row) {
            $gid[] = $obj->getGroup($row['gid']);
        }
        
        $two = array_reduce($gid, 'array_merge', array());
        
        $one = array();
        foreach($two as $item) {
            $one[] = $item['group_id'];
        }
        
        //all group of the user
        $userGroup = array_unique($one);
        
        //get resource admin
        $radmin = array();
        foreach($userGroup as $value) {
            $radmin[] = $obj->getResourceAdmin($value);
        }
        
        $rad = array_reduce($radmin, 'array_merge', array());
        
        
        $gpid = array();
        foreach($userGroup as $value) {
            $gpid[] = $obj->getResourceTypeByGroupId($value);
        }
        
        $gResourceType = array_reduce($gpid, 'array_merge', array());
        
        $gpid2 = array();
        foreach($userGroup as $value) {
            $gpid2[] = $obj->getGroup($value);
        }
        
        $groups = array_reduce($gpid2, 'array_merge', array());
        //echo '<pre>';print_r($groups);echo '<pre>';exit();
        $this->Set('AdminGroups', $adminGroups);
        $this->Set('AdminGroup', $groups);
    }

    public function GetAdminGroupId()
    {
        return $this->GetForm(FormKeys::GROUP_ADMIN);
    }

    public function ProcessDataRequest($dataRequest)
    {
        $this->presenter->ProcessDataRequest();
    }

    public function AutomaticallyAddToGroup()
    {
        return $this->GetCheckbox(FormKeys::IS_DEFAULT);
    }

    public function GetUserIds()
    {
        return [];
    }

    public function BindSchedules($schedules)
    {
        $this->Set('Schedules', $schedules);
    }

    public function GetGroupAdminIds()
    {
        return $this->GetForm(FormKeys::GROUP_ID);
    }

    public function GetResourceAdminIds()
    {
        return $this->GetForm(FormKeys::RESOURCE_ID);
    }

    public function GetScheduleAdminIds()
    {
        return $this->GetForm(FormKeys::SCHEDULE_ID);
    }
}
