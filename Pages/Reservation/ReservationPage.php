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

require_once(ROOT_DIR . 'Pages/SecurePage.php');
require_once(ROOT_DIR . 'Presenters/Reservation/ReservationPresenter.php');
require_once(ROOT_DIR . 'config/dbconfig.php');
require_once(ROOT_DIR . 'config/crud.php');
require_once(ROOT_DIR . 'Domain/Access/namespace.php');

interface IReservationPage extends IPage
{
	/**
	 * @param $startPeriods array|SchedulePeriod[]
	 * @param $endPeriods array|SchedulePeriod[]
     * @parma $lockDates bool
	 */
	public function BindPeriods($startPeriods, $endPeriods, $lockPeriods);

	/**
	 * @param $resources array|ResourceDto[]
	 */
	public function BindAvailableResources($resources);

	/**
	 * @param $accessories Accessory[]
	 */
	public function BindAvailableAccessories($accessories);

	/**
	 * @param $groups ResourceGroupTree
	 */
	public function BindResourceGroups($groups);

	/**
	 * @param SchedulePeriod $selectedStart
	 * @param Date $startDate
	 */
	public function SetSelectedStart(SchedulePeriod $selectedStart, Date $startDate);

	/**
	 * @param SchedulePeriod $selectedEnd
	 * @param Date $endDate
	 */
	public function SetSelectedEnd(SchedulePeriod $selectedEnd, Date $endDate);

	/**
	 * @param $repeatTerminationDate Date
	 */
	public function SetRepeatTerminationDate($repeatTerminationDate);

	/**
	 * @param UserDto $user
	 */
	public function SetReservationUser(UserDto $user);

	/**
	 * @param IResource $resource
	 */
	public function SetReservationResource($resource);

	/**
	 * @param int $scheduleId
	 */
	public function SetScheduleId($scheduleId);

	/**
	 * @param ReservationUserView[] $participants
	 */
	public function SetParticipants($participants);

	/**
	 * @param ReservationUserView[] $invitees
	 */
	public function SetInvitees($invitees);

	/**
	 * @param $accessories ReservationAccessory[]|array
	 */
	public function SetAccessories($accessories);

	/**
	 * @param $attachments ReservationAttachmentView[]|array
	 */
	public function SetAttachments($attachments);

	/**
	 * @param $canChangeUser
	 */
	public function SetCanChangeUser($canChangeUser);

	/**
	 * @param bool $canShowAdditionalResources
	 */
	public function ShowAdditionalResources($canShowAdditionalResources);

	/**
	 * @param bool $canShowUserDetails
	 */
	public function ShowUserDetails($canShowUserDetails);

	/**
	 * @param bool $shouldShow
	 */
	public function SetShowParticipation($shouldShow);

	/**
	 * @param bool $showReservationDetails
	 */
	public function ShowReservationDetails($showReservationDetails);

	/**
	 * @param bool $isHidden
	 */
	public function HideRecurrence($isHidden);

	/**
	 * @param bool $allowParticipation
	 */
	function SetAllowParticipantsToJoin($allowParticipation);

	/**
	 * @param int $reminderValue
	 * @param ReservationReminderInterval $reminderInterval
	 */
	public function SetStartReminder($reminderValue, $reminderInterval);

	/**
	 * @param int $reminderValue
	 * @param ReservationReminderInterval $reminderInterval
	 */
	public function SetEndReminder($reminderValue, $reminderInterval);

    /**
     * @param DateRange $availability
     */
    public function SetAvailability(DateRange $availability);

    /**
     * @param int $weekday
     */
    public function SetFirstWeekday($weekday);

    public function MakeUnavailable();

    /**
     * @return bool
     */
    public function IsUnavailable();

    /**
     * @param TermsOfService $termsOfService
     */
    public function SetTerms($termsOfService);

    /**
     * @param bool $accepted
     */
    public function SetTermsAccepted($accepted);
}

abstract class ReservationPage extends Page implements IReservationPage
{
	protected $presenter;
	protected $available = true;

	/**
	 * @var PermissionServiceFactory
	 */
	protected $permissionServiceFactory;

	public function __construct($title = null)
	{
		parent::__construct($title);

		if (is_null($this->permissionServiceFactory))
		{
			$this->permissionServiceFactory = new PermissionServiceFactory();
		}
	}

	/**
	 * @return IReservationPresenter
	 */
	protected abstract function GetPresenter();

	/**
	 * @return string
	 */
	protected abstract function GetTemplateName();

	/**
	 * @return string
	 */
	protected abstract function GetReservationAction();

    public function PageLoad()
    {
        //$user = parent::LoadById('485');

        $this->presenter = $this->GetPresenter();
        $this->presenter->PageLoad();

        $this->Set('ReturnUrl', $this->GetReturnUrl());
        $this->Set('ReservationAction', $this->GetReservationAction());
        $this->Set('MaxUploadSize', UploadedFile::GetMaxSize());
        $this->Set('MaxUploadCount', UploadedFile::GetMaxUploadCount());
        $this->Set('UploadsEnabled', Configuration::Instance()->GetSectionKey(ConfigSection::UPLOADS, ConfigKeys::UPLOAD_ENABLE_RESERVATION_ATTACHMENTS, new BooleanConverter()));
        $this->Set('AllowParticipation', !Configuration::Instance()->GetSectionKey(ConfigSection::RESERVATION, ConfigKeys::RESERVATION_PREVENT_PARTICIPATION,  new BooleanConverter()));
        $this->Set('AllowGuestParticipation', Configuration::Instance()->GetSectionKey(ConfigSection::RESERVATION, ConfigKeys::RESERVATION_ALLOW_GUESTS, new BooleanConverter()));
        $remindersEnabled = Configuration::Instance()->GetSectionKey(ConfigSection::RESERVATION, ConfigKeys::RESERVATION_REMINDERS_ENABLED, new BooleanConverter());
        $emailEnabled = Configuration::Instance()->GetKey(ConfigKeys::ENABLE_EMAIL, new BooleanConverter());
        $this->Set('RemindersEnabled', $remindersEnabled && $emailEnabled);

        $this->Set('RepeatEveryOptions', range(1, 20));
        $this->Set('RepeatOptions', array(
                'none' => array('key' => 'DoesNotRepeat', 'everyKey' => ''),
                'daily' => array('key' => 'Daily', 'everyKey' => 'days'),
                'weekly' => array('key' => 'Weekly', 'everyKey' => 'weeks'),
                'monthly' => array('key' => 'Monthly', 'everyKey' => 'months'),
                'yearly' => array('key' => 'Yearly', 'everyKey' => 'years'),
            )
        );
        $this->Set('DayNames', array(
                0 => 'DaySundayAbbr',
                1 => 'DayMondayAbbr',
                2 => 'DayTuesdayAbbr',
                3 => 'DayWednesdayAbbr',
                4 => 'DayThursdayAbbr',
                5 => 'DayFridayAbbr',
                6 => 'DaySaturdayAbbr',
            )
        );

        $this->Set('TitleRequired', Configuration::Instance()->GetSectionKey(ConfigSection::RESERVATION, ConfigKeys::RESERVATION_TITLE_REQUIRED, new BooleanConverter()));
        $this->Set('DescriptionRequired', Configuration::Instance()->GetSectionKey(ConfigSection::RESERVATION, ConfigKeys::RESERVATION_DESCRIPTION_REQUIRED, new BooleanConverter()));

        $this->Set('CreditsEnabled', Configuration::Instance()->GetSectionKey(ConfigSection::CREDITS, ConfigKeys::CREDITS_ENABLED, new BooleanConverter()));
        $user = ServiceLocator::GetServer()->GetUserSession();
        
        $database = New Connection();
        $db = $database->openConnection();

        if($_GET['rn'] == '') {
            $rf = $_GET['srn'];
        } else {
            $rf = $_GET['rn'];
        }

        $obj = new bookingClass;

        if(isset($_GET['rid'])) {
            $resource_id = $_GET['rid'];
        }

        if(isset($_GET['rn'])) {
            $reservation_instances = $obj->getReservationInstance($_GET['rn']);
            $series = $obj->getReservationResources($reservation_instances['series_id']);
            $resource_id = $series['resource_id'];
        }

        if(isset($_GET['srn'])) {
            $reservation_instances = $obj->getReservationInstance($_GET['srn']);
            $series = $obj->getReservationResources($reservation_instances['series_id']);
            $resource_id = $series['resource_id'];
        }

        $group_id = $obj->gerResource($resource_id);
       
        $get_group_id = $obj->get__group_id($group_id['admin_group_id']);
        //echo $get_group_id['admin_group_id'];exit();
        $get_all_group_id = $obj->get_all_group_id($get_group_id['admin_group_id']);
        $gid = array();
        foreach($get_all_group_id as $grp) {
            $gid[] = $grp['group_id'];
        }
         
        $user_ids = $obj->fetchUserId($gid);
        $uid = array();
        foreach($user_ids as $u) {
            $uid[] = $u['user_id'];
        }

        $get_users = $obj->getAllUsersGroups($uid);



        $v = $user->Groups[0];
        $grp = $db->prepare("select * from groups where group_id  = '$v' or admin_group_id = '$v'");
        $grp->execute();
        $resultgrp = $grp->fetch();
        if($resultgrp['admin_group_id'] != '1') {
            $r = $resultgrp['admin_group_id'];
            //echo "select * from groups where group_id  = '$r' or admin_group_id = '$r'";
            $grp1 = $db->prepare("select * from groups where group_id  = '$r' or admin_group_id = '$r'");
            $grp1->execute();
            $resultgrp1 = $grp1->fetchAll();
        }


        $sth = $db->prepare("select * from reservation_instances where reference_number = '$rf'");
        $sth->execute();
        $result = $sth->fetch();
        $sr = $result['series_id'];
        $sth1 = $db->prepare("select * from reservation_series where series_id = '$sr'");
        $sth1->execute();
        $result1 = $sth1->fetch();

        $sth3 = $db->prepare("select * from reservation_resources where series_id = '$sr'");
        $sth3->execute();
        $result3 = $sth3->fetchAll();
        $resource_id = array();
        foreach($result3 as $row) {
            $resource_id[] = $row['resource_id'];
        }

        $sid = $_GET['sid'];
        $sth2 = $db->prepare("select a.*, b.*,c.email from schedules a 
INNER JOIN resources b ON a.schedule_id = b.schedule_id 
LEFT JOIN users c ON b.userid = c.user_id
where a.schedule_id = '$sid' ");
        $sth2->execute();
        $physical = $sth2->fetch();

        $resource_id_physical[] = $physical['resource_id'];


        $rid = $_GET['rid'];
        $qrid = $db->prepare("select a.resource_id, a.name, b.* from resources a 
                                    LEFT JOIN users b ON a.userid = b.user_id where a.resource_id = '$rid'");
        $qrid->execute();
        $result_qrid = $qrid->fetch();

        //get the id groups based on user groups
        $g = array();

        foreach($user->Groups as $value) {
            $query_get_group = $db->prepare("select * from groups where group_id = '$value' or admin_group_id  = '$value'");
            $query_get_group->execute();
            $g[] = $query_get_group->fetchAll();
        }

        $t = array_reduce($g, 'array_merge', array());

        //list of user based on group id
        $group_users = array();
        foreach($t as $value) {
            $gid =  $value['group_id'];
            $sth = $db->prepare("select a.*,b.lname,b.fname,b.email,b.user_id as uid,c.resource_id,c.name from user_groups a
                                left join users b on a.user_id = b.user_id
                                left join resources c on b.user_id = c.userid
                                where a.group_id = '$gid'");
            $sth->execute();
            $result_group = $sth->fetchAll();
            $group_users[] = $result_group;
        }

        //echo '<pre>';print_r($group_users);echo '</pre>';exit();

        //get human resource
        $human = array();
        foreach($user->Groups as $value) {
            $sth = $db->prepare("select a.*,b.lname,b.fname,b.email,b.user_id as uid,c.resource_id,c.name from user_groups a
                                left join users b on a.user_id = b.user_id
                                left join resources c on b.user_id = c.userid
                                where a.group_id = '$value' and c.userid IS NOT NULL");
            $sth->execute();
            $result_group = $sth->fetchAll();
            $human[] = $result_group;
        }

        //get all resource with HR
        $all_hr = $db->prepare("select a.name,a.resource_id,b.lname,fname,user_id from resources a
                                inner join users b on a.userid = b.user_id");
        $all_hr->execute();
        $result_hr = $all_hr->fetchAll();

        $cutest1 = array();
        foreach($result_hr as $cu1){
            $cutest1[$cu1['user_id']] = $cu1['user_id'];
        }


        $convert_users= array_reduce($group_users, 'array_merge', array());
        $convert_human= array_reduce($human, 'array_merge', array());


        $cutest = array();
        foreach($convert_users as $cu){
            $cutest[$cu['user_id']] = $cu['user_id'];
        }

        $result12=array_intersect_key($cutest1,$cutest);


        $te = array_diff($cutest,$result12);


        foreach($te as $key=>$value) {
            $pl = $db->prepare("select user_id,fname,lname,email from users where user_id = '$key'");
            $pl->execute();
            $pl_result[] = $pl->fetch();
        }



        $lead_users = array();
        foreach ($convert_users as $key => $value) {
            $lead_users[$value['user_id']] = $value;
        }

        $get_user_hr = $db->prepare("select a.*, b.*,c.*,d.* from reservation_instances a 
LEFT JOIN reservation_resources b ON a.series_id = b.series_id
LEFT JOIN resources c ON b.resource_id = c.resource_id
LEFT JOIN users d ON c.userid = d.user_id
where a.reference_number = '$rf' ");
        $get_user_hr->execute();
        $result_hr = $get_user_hr->fetch();



        $this->Set('client_name',$result1['client_name']);
        $this->Set('status',$result1['status']);
        $this->Set('project',$result1['project']);
        $this->Set('request_no',$result1['request_no']);
        $this->Set('cos',$result1['client_on_site']);
        $this->Set('sos',$result1['sample_on_site']);
        $this->Set('physical',$resource_id_physical);
        $this->Set('resource',$result_qrid);
        $this->Set('resource_id',$resource_id);
        //$this->Set('group_users',$obj->getUserGroups($user->Groups));
        $this->Set('group_users',/*$obj->getUsers($user->Groups)*/$obj->getUserGroups($user->Groups));
        //$this->Set('group_users', $get_users);
        $this->Set('project_lead',$pl_result);
        $this->Set('result_hr',$result_hr);
        $this->Set('group_users_human',$convert_human);
        $this->Set('owner_id',$user->UserId);
        $this->Set('email',$user->Email);
        if ($this->IsUnavailable())
        {
            $this->RedirectToError(ErrorMessages::RESERVATION_NOT_AVAILABLE);
            return;
        }
        $this->Display($this->GetTemplateName());
        /*if(empty($_GET['redirect'])) {
            $this->Display($this->GetTemplateName());
        } else {
            $this->Display('Reservation/duplicate.tpl');
        }*/
    }

	public function BindPeriods($startPeriods, $endPeriods, $lockPeriods)
	{
		$this->Set('StartPeriods', $startPeriods);
		$this->Set('EndPeriods', $endPeriods);
		$this->Set('LockPeriods', $lockPeriods);
	}

	public function BindAvailableResources($resources)
	{
		$this->Set('AvailableResources', $resources);
	}

	public function ShowAdditionalResources($shouldShow)
	{
		$this->Set('ShowAdditionalResources', $shouldShow);
	}

	public function BindAvailableAccessories($accessories)
	{
		$this->Set('AvailableAccessories', $accessories);
	}

	public function BindResourceGroups($groups)
	{
		$this->Set('ResourceGroupsAsJson', json_encode($groups->GetGroups()));
	}

	public function SetSelectedStart(SchedulePeriod $selectedStart, Date $startDate)
	{
		$this->Set('SelectedStart', $selectedStart);
		$this->Set('StartDate', $startDate);
	}

	public function SetSelectedEnd(SchedulePeriod $selectedEnd, Date $endDate)
	{
		$this->Set('SelectedEnd', $selectedEnd);
		$this->Set('EndDate', $endDate);
	}

	public function SetReservationUser(UserDto $user)
	{
		$this->Set('ReservationUserName', $user->FullName());
		$this->Set('UserId', $user->Id());
		$this->Set('CurrentUserCredits', $user->CurrentCreditCount());
	}

	public function SetReservationResource($resource)
	{
	    $rf = $_GET['rn'];
        $obj = new bookingClass;
        $result = $obj->getMainResource($rf);
        if(empty($result['resource_id'])) {
            $id = $resource->GetId();
        } else {
            $id = $result['resource_id'];
        }
		$this->Set('ResourceName', $resource->GetName());
		//$this->Set('ResourceId', $resource->GetId());
        $this->Set('ResourceId', $id);
		$this->Set('Resource', $resource);
        $this->Set('ResourceName', $result['name']);
	}

	public function SetScheduleId($scheduleId)
	{
		$this->Set('ScheduleId', $scheduleId);
	}

	public function SetRepeatTerminationDate($repeatTerminationDate)
	{
		$this->Set('RepeatTerminationDate', $repeatTerminationDate);
	}

	public function SetParticipants($participants)
	{
		$this->Set('Participants', $participants);
	}

	public function SetInvitees($invitees)
	{
		$this->Set('Invitees', $invitees);
	}

	public function SetAllowParticipantsToJoin($allowParticipantsToJoin)
	{
		$this->Set('AllowParticipantsToJoin', $allowParticipantsToJoin);
	}

	public function SetAccessories($accessories)
	{
		$this->Set('Accessories', $accessories);
	}

	public function SetAttachments($attachments)
	{
		$this->Set('Attachments', $attachments);
	}

	public function SetCanChangeUser($canChangeUser)
	{
		$this->Set('CanChangeUser', $canChangeUser);
	}

	public function ShowUserDetails($canShowUserDetails)
	{
		$this->Set('ShowUserDetails', $canShowUserDetails);
	}

	public function SetShowParticipation($shouldShow)
	{
		$this->Set('ShowParticipation', $shouldShow);
	}

	public function ShowReservationDetails($showReservationDetails)
	{
		$this->Set('ShowReservationDetails', $showReservationDetails);
	}

	public function HideRecurrence($isHidden)
	{
		$this->Set('HideRecurrence', $isHidden);
	}

	protected function GetReturnUrl()
	{
		$redirect = $this->GetQuerystring(QueryStringKeys::REDIRECT);
		if (!empty($redirect))
		{
			return $redirect;
		}
		return $this->GetLastPage(Pages::SCHEDULE);
	}

	protected function LoadInitializerFactory()
	{
		$userRepository = new UserRepository();
		return new ReservationInitializerFactory(
				new ScheduleRepository(), $userRepository, new ResourceService(new ResourceRepository(),
																			   $this->permissionServiceFactory->GetPermissionService(),
																			   new AttributeService(new AttributeRepository()),
																			   $userRepository,
																			   new AccessoryRepository()),
				new ReservationAuthorization(AuthorizationServiceFactory::GetAuthorizationService())
		);
	}

	public function SetStartReminder($reminderValue, $reminderInterval)
	{
		$this->Set('ReminderTimeStart', $reminderValue);
		$this->Set('ReminderIntervalStart', $reminderInterval);
	}

	public function SetEndReminder($reminderValue, $reminderInterval)
	{
		$this->Set('ReminderTimeEnd', $reminderValue);
		$this->Set('ReminderIntervalEnd', $reminderInterval);
	}

    public function SetAvailability(DateRange $availability)
    {
        $this->Set('AvailabilityStart', $availability->GetBegin());
        $this->Set('AvailabilityEnd', $availability->GetEnd());
    }

    public function SetFirstWeekday($weekday)
    {
        $this->Set('FirstWeekday', $weekday);
    }

    public function MakeUnavailable()
    {
        $this->available = false;
    }

    public function IsUnavailable()
    {
        return !$this->available;
    }

    public function SetTerms($termsOfService)
    {
        $this->Set('Terms', $termsOfService);
    }
}