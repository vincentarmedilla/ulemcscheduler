<!DOCTYPE html>
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
<html lang="{$HtmlLang}" dir="{$HtmlTextDirection}">
<head>
    <title>{if $TitleKey neq ''}{translate key=$TitleKey args=$TitleArgs}{else}{$Title}{/if}</title>
    <meta http-equiv="Content-Type" content="text/html; charset={$Charset}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex"/>
    {if $ShouldLogout}
        <!--meta http-equiv="REFRESH"
			  content="{$SessionTimeoutSeconds};URL={$Path}logout.php?{QueryStringKeys::REDIRECT}={$smarty.server.REQUEST_URI|urlencode}"-->
    {/if}
    <link rel="shortcut icon" href="{$Path}{$FaviconUrl}"/>
    <link rel="icon" href="{$Path}{$FaviconUrl}"/>
    <link rel="stylesheet" href="../scripts/css/menu.css" type="text/css"/>
    <link rel="stylesheet" href="scripts/css/menu.css" type="text/css"/>
    <style>
        .error-msg {
            color:red;
        }
        #message {
            padding-bottom: 10px;
            padding-left: 20px;
        }
    </style>
    <!-- JavaScript -->
    {if $UseLocalJquery}
        {jsfile src="js/jquery-3.3.1.min.js"}
        {jsfile src="js/jquery-migrate-3.0.1.min.js"}
        {jsfile src="js/jquery-ui.1.12.1.custom.min.js"}
        {jsfile src="bootstrap/js/bootstrap.min.js"}
    {else}
        <script
                src="https://code.jquery.com/jquery-3.3.1.min.js"
                integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-migrate-3.0.1.min.js"></script>
        <script
                src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
                integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
                crossorigin="anonymous"></script>
        <script type="text/javascript"
                src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    {/if}

    <!-- End JavaScript -->

    <!-- CSS -->
    {if $UseLocalJquery}
        {cssfile src="scripts/css/smoothness/jquery-ui.1.12.1.custom.min.css"}
        {cssfile src="css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet"}
        {cssfile src="scripts/bootstrap/css/bootstrap.css" rel="stylesheet"}
        {if $Qtip}
            {cssfile src="css/jquery.qtip.min.css" rel="stylesheet"}
        {/if}
        {if $Validator}
            {cssfile src="css/bootstrapValidator.min.css" rel="stylesheet"}
        {/if}
        {if $InlineEdit}
            {cssfile src="scripts/js/x-editable/css/bootstrap-editable.css" rel="stylesheet"}
            {cssfile src="scripts/js/wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet"}
        {/if}

    {else}
        <link rel="stylesheet"
              href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css"
              type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
              type="text/css"/>
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"
              type="text/css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/qtip2/3.0.3/jquery.qtip.min.css"
              type="text/css"/>
        {if $Validator}
            <link rel="stylesheet"
                  href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"
                  type="text/css"/>
        {/if}
        {if $InlineEdit}
            <link rel="stylesheet"
                  href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/css/bootstrap-editable.css"
                  type="text/css"/>
            {cssfile src="scripts/js/wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet"}
        {/if}
    {/if}
    {if $Select2}
        {cssfile src="scripts/css/select2/select2-4.0.5.min.css"}
        {*{cssfile src="scripts/css/select2/select2-bootstrap.min.css"}*}
    {/if}
    {if $Timepicker}
        {cssfile src="scripts/css/timePicker.css" rel="stylesheet"}
    {/if}
    {if $Fullcalendar}
        {cssfile src="scripts/css/fullcalendar.min.css"}
        <link rel='stylesheet' type='text/css' href='{$Path}scripts/css/fullcalendar.print.css' media='print'/>
    {/if}
    {if $Owl}
        {cssfile src="scripts/js/owl-2.2.1/assets/owl.carousel.min.css"}
        {cssfile src="scripts/js/owl-2.2.1/assets/owl.theme.default.css"}
    {/if}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css">
    {jsfile src="js/jquery-ui-timepicker-addon.js"}
    {cssfile src="scripts/css/jquery-ui-timepicker-addon.css"}
    {cssfile src="booked.css"}
    {if $cssFiles neq ''}
        {assign var='CssFileList' value=','|explode:$cssFiles}
        {foreach from=$CssFileList item=cssFile}
            {cssfile src=$cssFile}
        {/foreach}
    {/if}
    {if $CssUrl neq ''}
        {cssfile src=$CssUrl}
    {/if}
    {if $CssExtensionFile neq ''}
        {cssfile src=$CssExtensionFile}
    {/if}

    {if $printCssFiles neq ''}
        {assign var='PrintCssFileList' value=','|explode:$printCssFiles}
        {foreach from=$PrintCssFileList item=cssFile}
            <link rel='stylesheet' type='text/css' href='{$Path}{$cssFile}' media='print'/>
        {/foreach}
    {/if}
    <!-- End CSS -->
</head>
<body {if $HideNavBar == true}style="padding-top:0;"{/if}>

{if $HideNavBar == false}
    <nav id="header-ul" class="navbar navbar-default {if $IsDesktop}navbar-fixed-top{else}navbar-static-top adjust-nav-bar-static{/if}"
         role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#booked-navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"
                   href="{$HomeUrl}"><div class="row">{html_image style="padding-left: 17px" src="/ul_logo.png?{$Version}" alt="$Title" class="logo"}<div style="float: right; color:white; padding-right: 17px;padding-top: 15px;">EMC Scheduler</div></div></a>
            </div>


            <div class="collapse navbar-collapse" id="booked-navigation">

                {*<ul class="nav navbar-nav">
                    {if $LoggedIn}
                        <li id="navDashboard"><a href="{$Path}{Pages::DASHBOARD}">{translate key="Dashboard"}</a></li>
                        <li class="dropdown" id="navMyAccountDropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{translate key="MyAccount"} <b
                                        class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li id="navProfile"><a href="{$Path}{Pages::PROFILE}">{translate key="Profile"}</a></li>
                                <li id="navPassword"><a
                                            href="{$Path}{Pages::PASSWORD}">{translate key="ChangePassword"}</a></li>
                                <li id="navNotification">
                                    <a href="{$Path}{Pages::NOTIFICATION_PREFERENCES}">{translate key="NotificationPreferences"}</a>
                                </li>
                                {if $ShowParticipation}
                                    <li id="navInvitations">
                                        <a href="{$Path}{Pages::PARTICIPATION}">{translate key="OpenInvitations"}</a>
                                    </li>
                                {/if}
                                {if $CreditsEnabled}
                                    <li id="navUserCredits">
                                        <a href="{$Path}{Pages::CREDITS}">{translate key="Credits"}</a>
                                    </li>
                                {/if}
                            </ul>
                        </li>
                        <li class="dropdown" id="navScheduleDropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{translate key="Schedule"} <b
                                        class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li id="navBookings"><a href="{$Path}{Pages::SCHEDULE}">{translate key="Bookings"}</a>
                                </li>
                                <li id="navMyCalendar"><a
                                            href="{$Path}{Pages::MY_CALENDAR}">{translate key="MyCalendar"}</a></li>
                                <li id="navResourceCalendar"><a
                                            href="{$Path}{Pages::CALENDAR}">{translate key="ResourceCalendar"}</a></li>
                                <!--<li class="menuitem"><a href="#">{translate key="Current Status"}</a></li>-->
                                <li id="navFindATime"><a href="{$Path}{Pages::OPENINGS}">{translate key="FindATime"}</a>
                                </li>
                                <li id="navFindATime"><a
                                            href="{$Path}{Pages::SEARCH_RESERVATIONS}">{translate key="SearchReservations"}</a>
                                </li>
                            </ul>
                        </li>
                        {if $CanViewAdmin}
                            <li class="dropdown" id="navApplicationManagementDropdown">
                                <a href="#" class="dropdown-toggle"
                                   data-toggle="dropdown">{translate key="ApplicationManagement"}
                                    <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li id="navManageReservations"><a
                                                href="{$Path}admin/manage_reservations.php">{translate key="ManageReservations"}</a>
                                    </li>
                                    <li id="navManageBlackouts"><a
                                                href="{$Path}admin/manage_blackouts.php">{translate key="ManageBlackouts"}</a>
                                    </li>
                                    <li id="navManageQuotas"><a
                                                href="{$Path}admin/manage_quotas.php">{translate key="ManageQuotas"}</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li id="navManageSchedules"><a
                                                href="{$Path}admin/manage_schedules.php">{translate key="ManageSchedules"}</a>
                                    <li id="navManageResources"><a
                                                href="{$Path}admin/manage_resources.php">{translate key="ManageResources"}</a>
                                    </li>
                                    <li id="navManageAccessories"><a
                                                href="{$Path}admin/manage_accessories.php">{translate key="ManageAccessories"}</a>
                                    </li>

                                    <li class="divider"></li>
                                    <li id="navManageUsers"><a
                                                href="{$Path}admin/manage_users.php">{translate key="ManageUsers"}</a>
                                    </li>
                                    <li id="navManageGroups"><a
                                                href="{$Path}admin/manage_groups.php">{translate key="ManageGroups"}</a>
                                    </li>

                                    <li id="navManageAnnouncements"><a
                                                href="{$Path}admin/manage_announcements.php">{translate key="ManageAnnouncements"}</a>
                                    </li>
                                    <li class="divider"></li>
                                    {if $PaymentsEnabled}
                                        <li id="navManagePayments"><a
                                                    href="{$Path}admin/manage_payments.php">{translate key="ManagePayments"}</a>
                                        </li>
                                    {/if}
                                    *}{*<li class="dropdown-header">{translate key=Customization}</li>*}{*
                                    <li id="navManageAttributes"><a
                                                href="{$Path}admin/manage_attributes.php">{translate key="CustomAttributes"}</a>
                                    </li>
                                </ul>
                            </li>
                        {/if}
                        {if $CanViewResponsibilities}
                            <li class="dropdown" id="navResponsibilitiesDropdown">
                                <a href="#" class="dropdown-toggle"
                                   data-toggle="dropdown">{translate key="Responsibilities"} <b
                                            class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    {if $CanViewGroupAdmin}
                                        <li id="navResponsibilitiesGAUsers"><a
                                                    href="{$Path}admin/manage_group_users.php">{translate key="ManageUsers"}</a>
                                        </li>
                                        <li id="navResponsibilitiesGAReservations"><a
                                                    href="{$Path}admin/manage_group_reservations.php">{translate key="GroupReservations"}</a>
                                        </li>
                                        <li id="navResponsibilitiesGAGroups"><a
                                                    href="{$Path}admin/manage_admin_groups.php">{translate key="ManageGroups"}</a>
                                        </li>
                                    {/if}
                                    {if $CanViewResourceAdmin || $CanViewScheduleAdmin}
                                        <li id="navResponsibilitiesRAResources"><a
                                                    href="{$Path}admin/manage_admin_resources.php">{translate key="ManageResources"}</a>
                                        </li>
                                        <li id="navResponsibilitiesRABlackouts"><a
                                                    href="{$Path}admin/manage_blackouts.php">{translate key="ManageBlackouts"}</a>
                                        </li>
                                    {/if}
                                    {if $CanViewResourceAdmin}
                                        <li id="navResponsibilitiesRAReservations">
                                            <a href="{$Path}admin/manage_resource_reservations.php">{translate key="ResourceReservations"}</a>
                                        </li>
                                    {/if}
                                    {if $CanViewScheduleAdmin}
                                        <li id="navResponsibilitiesSASchedules">
                                            <a href="{$Path}admin/manage_admin_schedules.php">{translate key="ManageSchedules"}</a>
                                        </li>
                                        <li id="navResponsibilitiesSAReservations">
                                            <a href="{$Path}admin/manage_schedule_reservations.php">{translate key="ScheduleReservations"}</a>
                                        </li>
                                    {/if}
                                    <li id="navResponsibilitiesAnnouncements">
                                        <a href="{$Path}admin/manage_announcements.php">{translate key="ManageAnnouncements"}</a>
                                    </li>
                                </ul>
                            </li>
                        {/if}
                        {if $CanViewReports}
                            <li class="dropdown" id="navReportsDropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{translate key="Reports"} <b
                                            class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li id="navGenerateReport">
                                        <a href="{$Path}reports/{Pages::REPORTS_GENERATE}">{translate key=GenerateReport}</a>
                                    </li>
                                    <li id="navSavedReports">
                                        <a href="{$Path}reports/{Pages::REPORTS_SAVED}">{translate key=MySavedReports}</a>
                                    </li>
                                    <li id="navCommonReports">
                                        <a href="{$Path}reports/{Pages::REPORTS_COMMON}">{translate key=CommonReports}</a>
                                    </li>
                                </ul>
                            </li>
                        {/if}
                    {/if}

                </ul>*}
                <ul class="nav navbar-nav navbar-right">
                    {if $ShowScheduleLink}
                        <li class="dropdown" id="navScheduleDropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{translate key="Schedule"} <b
                                        class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li id="navViewSchedule"><a href="view-schedule.php">{translate key='ViewSchedule'}</a>
                                </li>
                                <li id="navViewCalendar"><a href="view-calendar.php">{translate key='ViewCalendar'}</a>
                                </li>
                            </ul>
                        </li>
                    {/if}
                    {if $CanViewAdmin}
                        <li class="dropdown" id="navHelpDropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="no-show">Configuration</span>
                                <span class="fa fa-cog"></span>
                                {if $ShowNewVersion}<span class="badge badge-new-version new-version"
                                                          id="newVersionBadge">{translate key=NewVersion}</span>{/if}
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                {if $EnableConfigurationPage}
                                    <li id="navManageConfiguration"><a
                                                href="{$Path}admin/manage_configuration.php">{translate key="ManageConfiguration"}</a>
                                    </li>
                                {/if}
                                <li id="navEmailTemplates"><a
                                            href="{$Path}admin/manage_email_templates.php">{translate key="ManageEmailTemplates"}</a>
                                </li>
                                <li id="navLookAndFeel"><a
                                            href="{$Path}admin/manage_theme.php">{translate key="LookAndFeel"}</a>
                                </li>
                                <li id="navImport"><a href="{$Path}admin/import.php">{translate key="Import"}</a>
                                </li>
                                <li id="navServerSettings"><a
                                            href="{$Path}admin/server_settings.php">{translate key="ServerSettings"}</a>
                                </li>
                                <li id="navDataCleanup"><a
                                            href="{$Path}admin/data_cleanup.php">{translate key="DataCleanup"}</a>
                                </li>
                                {if $ShowNewVersion}
                                    <li class="divider new-version"></li>
                                    <li id="navNewVersion" class="new-version">
                                        <a href="https://www.bookedscheduler.com/whatsnew">{translate key=WhatsNew}</a>
                                    </li>
                                {/if}
                            </ul>
                        </li>
                    {/if}
                    {*<li class="dropdown" id="navHelpDropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{translate key="Help"} <b
                                    class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li id="navHelp"><a href="{$Path}help.php">{translate key=Help}</a></li>
                            {if $CanViewAdmin}
                                <li id="navHelpAdmin"><a
                                        href="{$Path}help.php?ht=admin">{translate key=Administration}</a></li>{/if}
                            <li id="navAbout"><a href="{$Path}help.php?ht=about">{translate key=About}</a></li>
                        </ul>
                    </li>*}
                    {if $LoggedIn}
                        <li id="navSignOut"><a href="{$Path}logout.php">{translate key="SignOut"}</a></li>
                    {else}
                        <li id="navLogIn"><a href="{$Path}index.php">{translate key="LogIn"}</a></li>
                    {/if}
                </ul>
            </div>
        </div>
    </nav>
{/if}

<div id="main" class="container-fluid">
    <script src="https://secure.aadcdn.microsoftonline-p.com/lib/1.0.11/js/adal.min.js"></script>
    <script type="text/javascript">

        // #1: Set up ADAL
        var authContext = new AuthenticationContext({
            clientId: '1346064b-755d-41c7-a74c-85e215f33102',
            postLogoutRedirectUri: 'https://ulgolinuxtest.eastasia.cloudapp.azure.com/booking/Web/logout.php',
        });

        // Make an AJAX request to the Microsoft Graph API and print the response as JSON.
        var getCurrentUser = function (access_token) {
            document.getElementById('api_response').textContent = 'Calling API...';
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'https://graph.microsoft.com/v1.0/me', true);
            xhr.setRequestHeader('Authorization', 'Bearer ' + access_token);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Do something with the response
                    document.getElementById('api_response').textContent =
                        JSON.stringify(JSON.parse(xhr.responseText), null, '  ');
                } else {
                    var udetails = JSON.parse(xhr.responseText);
                    var res = udetails.userPrincipalName.split("@");
                    document.cookie = "uid="+res[0];
                    var uid = res[0];
                    // TODO: Do something with the error (or non-200 responses)
                    document.getElementById('api_response').textContent =
                        'ERROR:\n\n' + xhr.responseText;
                }
            };
            xhr.send();
        }

        if (authContext.isCallback(window.location.hash)) {

            // Handle redirect after token requests
            authContext.handleWindowCallback();
            var err = authContext.getLoginError();
            if (err) {
                // TODO: Handle errors signing in and getting tokens
                document.getElementById('api_response').textContent =
                    'ERROR:\n\n' + err;
            }

        } else {

            // If logged in, get access token and make an API request
            var user = authContext.getCachedUser();
            if (user) {

                document.getElementById('username').textContent = 'Signed in as: ' + user.userName;
                document.getElementById('api_response').textContent = 'Getting access token...';

                // Get an access token to the Microsoft Graph API
                authContext.acquireToken(
                    'https://graph.microsoft.com',
                    function (error, token) {

                        if (error || !token) {
                            // TODO: Handle error obtaining access token
                            document.getElementById('api_response').textContent =
                                'ERROR:\n\n' + error;
                            return;
                        }

                        // Use the access token
                        getCurrentUser(token);
                    }
                );

            } else {
                //document.getElementById('username').textContent = 'Not signed in.';
            }
        }
        
    </script>
    <style>
        .list-group {
            margin-bottom:0px;
            display:none;
        }
        .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:focus, .navbar-inverse .navbar-nav>.open>a:hover{
            background-color:#AB1D26;
        }
        .navbar-inverse .navbar-nav>li>a {
            background-color:#AB1D26;
            color:white;
        }
        .navbar-nav li:hover {
            background: #d9534f;
            color:white;
        }
        .navbar-collapse a:hover {
            color:white;
        }

        .list-group li a {
            padding-left: 15px;
        }

        ul.emc-menu li a {
            color:#696969;
            display:block;
            line-height:1.5;
            text-decoration:none;
            width:100%;
        }


        .list-group-item {
            padding:0px 0px;
  
        }

        .sidenav {
            height: 100%;
            width: 160px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            padding-top: 20px;
        }

        .sidenav a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            color: #818181;
            display: block;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }
        
         .texthide{        
           display: none;
            
        }
        

		
    </style>

    <div id="main" class="container-fluid row">
        <div class="col-md-2">
            {if $LoggedIn}
                <nav class="navbar navbar-inverse sidebar sidenav" role="navigation" style="border-color: white; padding-top: 50px; background-color: #AB1D26;">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
                            <ul class="nav navbar-nav emc-menu">
                                <li><a href="{$Path}{Pages::DASHBOARD}"><img src="/qa/Web/img/emc_dashboard_white.png"  width="18">
                                <span class="texthide">{translate key="Dashboard"}</span></a></li>
                                <li class="dropdown">
                                    <a href="#shedule"  class="collapse" data-toggle="collapse" data-parent="#schedule">
                                    <img src="/qa/Web/img/emc_calendar_white.png"  width="18">
                                    <span class="texthide">{translate key="Schedule"}</span></a>
                                    <div class="collapse" id="shedule">
                                        <ul class="list-group">
                                            <li class="list-group-item"><a href="{$Path}{Pages::SCHEDULE}">{translate key="Bookings"}</a></li>
                                            <li class="list-group-item"><a href="{$Path}{Pages::MY_CALENDAR}">{translate key="MyCalendar"}</a></li>
                                            <li class="list-group-item"><a href="{$Path}{Pages::CALENDAR}">{translate key="ResourceCalendar"}</a></li>
                                           {* <li class="list-group-item"><a href="{$Path}{Pages::OPENINGS}">{translate key="FindATime"}</a></li>*}
                                            <li class="list-group-item"><a href="{$Path}{Pages::SEARCH_RESERVATIONS}">{translate key="SearchReservations"}</a></li>
                                        </ul>
                                    </div>
                                </li>
                                {if $CanViewAdmin}
                                    <li class="dropdown">
                                        <a href="#application" class="dropdown-toggle" data-toggle="collapse" data-parent="#application">
                                        <img src="/qa/Web/img/emc_setting_white.png"  width="18">
                                        <span class="texthide">Application Management</span></a>
                                        <div class="collapse" id="application">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <a href="{$Path}admin/manage_reservations.php">{translate key="ManageReservations"}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="{$Path}admin/manage_blackouts.php">{translate key="ManageBlackouts"}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="{$Path}admin/manage_quotas.php">{translate key="ManageQuotas"}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="{$Path}admin/manage_schedules.php">{translate key="ManageSchedules"}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="{$Path}admin/manage_resources.php">{translate key="ManageResources"}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="{$Path}admin/manage_accessories.php">{translate key="ManageAccessories"}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="{$Path}admin/manage_users.php">{translate key="ManageUsers"}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="{$Path}admin/manage_groups.php">{translate key="ManageGroups"}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="{$Path}admin/manage_announcements.php">{translate key="ManageAnnouncements"}</a>
                                                </li>
                                                {if $PaymentsEnabled}
                                                    <li id="list-group-item"><a
                                                                href="{$Path}admin/manage_payments.php">{translate key="ManagePayments"}</a>
                                                    </li>
                                                {/if}
                                                <li class="list-group-item">
                                                    <a href="{$Path}admin/manage_attributes.php">{translate key="CustomAttributes"}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                {/if}
                                {if $CanViewResponsibilities}
                                    <li class="dropdown">
                                        <a href="#respon" class="dropdown-toggle" data-toggle="collapse" data-parent="#respon">
                                        <img src="/qa/Web/img/emc_setting_white.png"  width="18">
                                        <span class="texthide">{translate key="Responsibilities"}</span> </a>
                                        <div class="collapse" id="respon">
                                            <ul class="list-group">
                                                {if $CanViewGroupAdmin}
                                                    <li class="list-group-item"><a
                                                                href="{$Path}admin/manage_group_users.php">{translate key="ManageUsers"}</a>
                                                    </li>
                                                    <li class="list-group-item"><a
                                                                href="{$Path}admin/manage_group_reservations.php">{translate key="GroupReservations"}</a>
                                                    </li>
                                                    <li class="list-group-item"><a
                                                                href="{$Path}admin/manage_admin_groups.php">{translate key="ManageGroups"}</a>
                                                    </li>
                                                {/if}
                                                {if $CanViewResourceAdmin || $CanViewScheduleAdmin}
                                                    <li class="list-group-item"><a
                                                                href="{$Path}admin/manage_admin_resources.php">{translate key="ManageResources"}</a>
                                                    </li>
                                                    <li class="list-group-item"><a
                                                                href="{$Path}admin/manage_blackouts.php">{translate key="ManageBlackouts"}</a>
                                                    </li>
                                                {/if}
                                                {if $CanViewResourceAdmin}
                                                    <li class="list-group-item">
                                                        <a href="{$Path}admin/manage_resource_reservations.php">{translate key="ResourceReservations"}</a>
                                                    </li>
                                                {/if}
                                                {if $CanViewScheduleAdmin}
                                                    <li class="list-group-item">
                                                        <a href="{$Path}admin/manage_admin_schedules.php">{translate key="ManageSchedules"}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <a href="{$Path}admin/manage_schedule_reservations.php">{translate key="ScheduleReservations"}</a>
                                                    </li>
                                                {/if}
                                                <li class="list-group-item">
                                                    <a href="{$Path}admin/manage_announcements.php">{translate key="ManageAnnouncements"}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                {/if}
                                {if $CanViewReports}
                                    <li class="dropdown">
                                        <a href="#report" class="dropdown-toggle" data-toggle="collapse" data-parent="#report">
                                        <img src="/qa/Web/img/emc_reports_white.png"  width="18">
                                        <span class="texthide">{translate key="Reports"}</span></a>
                                        <div class="collapse" id="report">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <a href="{$Path}reports/{Pages::REPORTS_GENERATE}">{translate key=GenerateReport}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="{$Path}reports/{Pages::REPORTS_SAVED}">{translate key=MySavedReports}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="{$Path}reports/{Pages::REPORTS_COMMON}">{translate key=CommonReports}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                {/if}
                                <li class="dropdown">
                                    <a href="#profile" class="dropdown-toggle" data-toggle="collapse" data-parent="#profile">
                                    <img src="/qa/Web/img/emc_user_white.png"  width="18"><span class="texthide">Profile</span></a>
                                    <div class="collapse" id="profile">
                                        <ul class="list-group">
                                            <li class="list-group-item"><a href="{$Path}{Pages::PROFILE}">{translate key="Profile"}</a></li>
                                            <li class="list-group-item"><a href="{$Path}{Pages::NOTIFICATION_PREFERENCES}">{translate key="NotificationPreferences"}</a></li>
                                            {if $ShowParticipation}
                                                {*<li class="list-group-item">
                                                    <a href="{$Path}{Pages::PARTICIPATION}">{translate key="OpenInvitations"}</a>
                                                </li>*}
                                            {/if}
                                            {if $CreditsEnabled}
                                                <li class="list-group-item">
                                                    <a href="{$Path}{Pages::CREDITS}">{translate key="Credits"}</a>
                                                </li>
                                            {/if}
                                        </ul>
                                    </div>
                                </li>
                                <div style="background-color: #AB1D26; color: #AB1D26;">test</div>

                            </ul>
                        </div>
                    </div>
                </nav>
            {/if}
        </div>

        <div class="" style="width:93%; left:85px; position: absolute;">