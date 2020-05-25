<?php

/**
 * Copyright 2017-2019 Nick Korbel
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

require_once(ROOT_DIR . 'Presenters/ActionPresenter.php');
require_once(ROOT_DIR . 'Pages/Search/SearchReservationsPage.php');
require_once(ROOT_DIR . 'Domain/Access/ReportCommandBuilder.php');
require_once(ROOT_DIR . 'config/crud.php');

class SearchReservationsPresenter extends ActionPresenter
{

    /**
     * @var ISearchReservationsPage
     */
    private $page;
    /**
     * @var UserSession
     */
    private $user;
    /**
     * @var IReservationViewRepository
     */
    private $reservationViewRepository;
    /**
     * @var IResourceService
     */
    private $resourceService;
    /**
     * @var IScheduleService
     */
    private $scheduleService;

    public function __construct(ISearchReservationsPage $page,
                                UserSession $user,
                                IReservationViewRepository $reservationViewRepository,
                                IResourceService $resourceService,
                                IScheduleService $scheduleService)
    {
        parent::__construct($page);

        $this->page = $page;
        $this->user = $user;
        $this->reservationViewRepository = $reservationViewRepository;
        $this->resourceService = $resourceService;
        $this->scheduleService = $scheduleService;

        $this->AddAction('search', 'SearchReservations');
    }

    public function PageLoad() {

        $this->page->SetResources($this->resourceService->GetAllResources(false, $this->user));
        $this->page->SetSchedules($this->scheduleService->GetAll(false, $this->user));
        $this->page->SetCurrentUser($this->user);
        $this->page->SetToday(Date::Now()->ToTimezone($this->user->Timezone));
    }

    public function SearchReservations()
    {
        $range = $this->GetSearchRange();
        $filter = ReservationsSearchFilter::GetFilter($range->GetBegin(),
            $range->GetEnd(),
            $this->page->GetUserId(),
            $this->page->GetResources(),
            $this->page->GetSchedules(),
            $this->page->GetTitle(),
            $this->page->GetDescription(),
            $this->page->GetReferenceNumber(),
            $_POST['project_no'],
            $_POST['client_name'],
            $_POST['request_no'],
            $_POST['physicalResource'],
            $_POST['humanResource'],
            $_POST['projectLead']);

        $list = $this->reservationViewRepository->GetList(0, 100, null, null, $filter);

        $this->page->ShowReservations($list->Results(), $this->user->Timezone);
    }

    /**
     * @return DateRange
     */
    private function GetSearchRange()
    {
        $range = $this->page->GetRequestedRange();
        $timezone = $this->user->Timezone;

        $today = Date::Now()->ToTimezone($timezone);

        if ($range == 'tomorrow')
        {
            return new DateRange($today->AddDays(1)->GetDate(), $today->AddDays(2)->GetDate());
        }

        if ($range == 'thisweek')
        {
            $weekday = $today->Weekday();
            $adjustedDays = (0 - $weekday);

            if ($weekday < 0)
            {
                $adjustedDays = $adjustedDays - 7;
            }

            $startDate = $today->AddDays($adjustedDays)->GetDate();

            return new DateRange($startDate, $startDate->AddDays(6));
        }

        if ($range == 'daterange')
        {
            $start = $this->page->GetRequestedStartDate();
            $end = $this->page->GetRequestedEndDate();

            if (empty($start))
            {
                $start = Date::Now()->ToTimezone($timezone)->AddMonths(-1);
            }
            if (empty($end))
            {
                $end = Date::Now()->ToTimezone($timezone)->AddMonths(1);
            }
            return new DateRange(Date::Parse($start, $timezone), Date::Parse($end, $timezone));
        }

        return new DateRange($today->GetDate(), $today->AddDays(1)->GetDate());
    }

}

class ReservationsSearchFilter
{
    /**
     * @param Date|null $startDate
     * @return SqlFilterNull
     */
    public static function GetFilter($startDate, $endDate, $userId, $resourceIds, $scheduleIds, $title, $description, $referenceNumber, $projectNo, $clientName, $requestNumber, 
        $physicalResource, $humanResource, $projectLead)
    {
       
       if(empty($scheduleIds)) {
           $scheduleIds = (array) null;
           $obj = new bookingClass;
           $builder = new ReportCommandBuilder;
           $user = ServiceLocator::GetServer()->GetUserSession();
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
           //get shedules
           $schedule_result = $obj->fetchScheduleByGroup($userGroup);
           
           $schd = array();
           foreach($schedule_result as $s) {
               $schd[] = $s['schedule_id'];
           }
          
           $scheduleIds = $schd;
          
       } else {
           $scheduleIds = $scheduleIds;
       }
        //$scheduleIds = (array) null;
        //$scheduleIds = array('20','21','36','29');
        
        $filter = new SqlFilterNull();
        $surroundFilter = null;
        $startFilter = null;
        $endFilter = null;

        if (!empty($startDate) && !empty($endDate))
        {
            $surroundFilter = new SqlFilterLessThan(new SqlRepeatingFilterColumn(TableNames::RESERVATION_INSTANCES_ALIAS, ColumnNames::RESERVATION_START, 1), $startDate->ToDatabase(), true);
            $surroundFilter->_And(new SqlFilterGreaterThan(new SqlRepeatingFilterColumn(TableNames::RESERVATION_INSTANCES_ALIAS, ColumnNames::RESERVATION_END, 1), $endDate->ToDatabase(), true));
        }
        if (!empty($startDate))
        {
            $startFilter = new SqlFilterGreaterThan(new SqlRepeatingFilterColumn(TableNames::RESERVATION_INSTANCES_ALIAS, ColumnNames::RESERVATION_START, 2), $startDate->ToDatabase(), true);
            $endFilter = new SqlFilterGreaterThan(new SqlRepeatingFilterColumn(TableNames::RESERVATION_INSTANCES_ALIAS, ColumnNames::RESERVATION_END, 2), $startDate->ToDatabase(), true);
        }
        if (!empty($endDate))
        {
            if ($startFilter == null)
            {
                $startFilter = new SqlFilterLessThan(new SqlRepeatingFilterColumn(TableNames::RESERVATION_INSTANCES_ALIAS, ColumnNames::RESERVATION_START, 3), $endDate->ToDatabase(), true);
            }
            else
            {
                $startFilter->_And(new SqlFilterLessThan(new SqlRepeatingFilterColumn(TableNames::RESERVATION_INSTANCES_ALIAS, ColumnNames::RESERVATION_START, 4), $endDate->ToDatabase(), true));
            }
            if ($endFilter == null)
            {
                $endFilter = new SqlFilterLessThan(new SqlRepeatingFilterColumn(TableNames::RESERVATION_INSTANCES_ALIAS, ColumnNames::RESERVATION_END, 3), $endDate->ToDatabase(), true);
            }
            else
            {
                $endFilter->_And(new SqlFilterLessThan(new SqlRepeatingFilterColumn(TableNames::RESERVATION_INSTANCES_ALIAS, ColumnNames::RESERVATION_END, 4), $endDate->ToDatabase(), true));
            }
        }
        if (!empty($referenceNumber))
        {
            $filter->_And(new SqlFilterEquals(ColumnNames::REFERENCE_NUMBER, $referenceNumber));
        }
        if (!empty($title))
        {
            $filter->_And(new SqlFilterLike(new SqlFilterColumn(TableNames::RESERVATION_SERIES_ALIAS, ColumnNames::RESERVATION_TITLE), $title));
        }
        if (!empty($description))
        {
            $filter->_And(new SqlFilterLike(new SqlFilterColumn(TableNames::RESERVATION_SERIES_ALIAS, ColumnNames::RESERVATION_DESCRIPTION), $description));
        }
        if (!empty($projectNo))
        {
            $filter->_And(new SqlFilterLike(new SqlFilterColumn(TableNames::RESERVATION_SERIES_ALIAS, ColumnNames::PROJECT_NUMBER), $projectNo));
        }
        if (!empty($clientName))
        {
            $filter->_And(new SqlFilterLike(new SqlFilterColumn(TableNames::RESERVATION_SERIES_ALIAS, ColumnNames::CLIENT), $clientName));
        }
        if (!empty($requestNumber))
        {
            $filter->_And(new SqlFilterLike(new SqlFilterColumn(TableNames::RESERVATION_SERIES_ALIAS, ColumnNames::REQUEST_NUMBER), $requestNumber));
        }
        if (!empty($scheduleIds))
        {
            $filter->_And(new SqlFilterIn(new SqlFilterColumn(TableNames::RESOURCES, ColumnNames::SCHEDULE_ID), $scheduleIds));
        }
        if (!empty($resourceIds))
        {
            
            $filter->_And(new SqlFilterIn(new SqlFilterColumn(TableNames::RESOURCES, ColumnNames::RESOURCE_ID), $resourceIds));
        }
        
        if(!empty($physicalResource) || !empty($humanResource))
        {
             
            if($physicalResource == "PR"){
                $resourceType = "";
                $filter->_And(new SqlFilterEquals(new SqlFilterColumn(TableNames::RESOURCES, ColumnNames::USERID), $resourceType));
            }
   
            else if($humanResource == "HR"){
                $resourceType = "null";
                $filter->_And(new SqlFilterEquals(new SqlFilterColumn(TableNames::RESOURCES, ColumnNames::USERID), $resourceType));
            }
            
        }
        
        if (!empty($userId))
        {
            $filter->_And(new SqlFilterEquals(new SqlFilterColumn(TableNames::USERS, ColumnNames::USER_ID), $userId));
        }
        else {
            if (Configuration::Instance()->GetSectionKey(ConfigSection::PRIVACY, ConfigKeys::PRIVACY_HIDE_RESERVATION_DETAILS, new BooleanConverter()))
            {
                $filter->_And(new SqlFilterEquals(new SqlFilterColumn(TableNames::USERS, ColumnNames::USER_ID), ServiceLocator::GetServer()->GetUserSession()->UserId));
            }
        }

        if (!empty($projectLead))
        {
            $filter->_And(new SqlFilterEquals(new SqlFilterColumn(TableNames::USERS, ColumnNames::USER_ID), $projectLead));
        }
        else {
            if (Configuration::Instance()->GetSectionKey(ConfigSection::PRIVACY, ConfigKeys::PRIVACY_HIDE_RESERVATION_DETAILS, new BooleanConverter()))
            {
                $filter->_And(new SqlFilterEquals(new SqlFilterColumn(TableNames::USERS, ColumnNames::USER_ID), ServiceLocator::GetServer()->GetUserSession()->UserId));
            }
        }
        
        
        
        if ($surroundFilter != null || $startFilter != null || $endFilter != null)
        {
            $dateFilter = new SqlFilterNull(true);
            $dateFilter->_Or($surroundFilter)->_Or($startFilter)->_Or($endFilter);
            $filter->_And($dateFilter);
        }

        return $filter;
    }
}
