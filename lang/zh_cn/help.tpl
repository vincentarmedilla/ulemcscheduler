﻿{*
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
{include file='globalheader.tpl'}
<h1>CVC Rental帮助</h1>

<div id="help">
    <h2>注册</h2>

    <p>
        如果管理员已经启动了预约程序的注册功能，那么用户需要注册才能使用该程序。用户注册了账户后，就能够登陆并访问该用户权限内的任何资源。
    </p>

    <h2>预约</h2>

    <p>
        在"时间表"这个菜单选项中，您将找到"预约"这个选项。"预约"菜单打开的页面中将显示可用的、预留的和封锁的资源预约方格并允许预约您权限内的资源。
    </p>

    <h3>描述</h3>

    <p>
        在"预约"界面，查找到您要预约的资源、时间和日期。单击该资源对应时间段的"方格"将允许您更改预留的详细信息。单击创建按钮将会检查资源可用性、预订
		资源和发送电子邮件。您将会收到一个参考数字用以跟进预约。
    </p>

    <p>
		您对预约所做的更改将在保存预约之后生效。
	</p>

    <p>
		只有程序管理员才可以对已经过去的时间进行预约操作。
	</p>

    <h3>查找时间</h3>
    <p>
        在“时间表”选项下有一个“查找时间”的选项。这使您能够搜索符合条件的任何可用资源和可用预约时间段。
    </p>

    <h3>更多资源</h3>

    <p>
		您可以将您权限内的多个资源添加到一个预约中。要为您的预约添加更多资源，请单击更多资源链接，显示在您预约的主资
		源名称旁边。然后，您可以通过选择它们并点击完成按钮来添加更多资源。
	</p>

    <p>
		要从预约中删除其他附加资源，请单击更多资源链接，取消选择需删除的资源，然后单击完成按钮。
	</p>

    <p>
		附加资源应与首选主资源遵循相同的规则。例如，如果您尝试使用资源1和资源2创建2小时的预约，而资源1的最大时间长度为3小时，
		资源2的最大时间长度为1小时，那么您的预约将被拒绝。（即预定的时间长度必须符合两个资源的限制条件方可共同预订）
	</p>

    <p>
		通过将鼠标箭头悬停在资源名称上，可以查看该资源的详细信息。
	</p>

    <h3>重复时段</h3>

    <p>
		可以用多种不同方式对预约进行配置，在日期包含的范围内对所有的重复选项都是可行的。
	</p>

    <p>
		重复选项提供灵活的选择可能性。例如：每隔2天重复一次，将在您指定的时间段内的时间里每隔2天重复创建预约。
		每周重复，比如每一周的星期一、星期三、星期五，那么将在您指定的时间段内每周的这些日子重复创建预约。
		如果您在2011-01-15创建预订，重复月份，那么每三个月后在该月的15号创建预约。自从2011-01-15是1月份的第三个星期六，和
		日期重复和周重复一样将每三个月在该月的第三个星期六创建预约。
	</p>

    <h3>额外参与者</h3>

    <p>
		您可以在预约时添加参与者或邀请其他人。添加其他人将会将他包含在预约中，并且不会发送邀请。
		被邀请的用户将会收到一封邮件，邀请者将发送邀请邮件，并向被邀请者提供接受或拒绝邀请的选项。 
		接受邀请会将用户添加到参与者列表。 拒绝邀请会将用户从受邀者列表中移除
    </p>

    <p>
        参与者的总数受资源所能容纳的参与者数量限制
    </p>

    <h3>附件</h3>

    <p>
		在预约执行期间，附件可以被认为是对象来使用。比如可以是投影仪或者椅子。
		要添加附件到您的预约，请点击附件标题右侧的添加链接。
		从那里您将可以为每个可用附件选择一个数量。 预约进行期间可用的附件数量取决于您添加了多少个附件。
	</p>

    <h3>代人预约</h3>

    <p>
		管理员和组管理员可以通过单击用户名称右侧的更改链接来为其他用户预约。	
	</p>

    <p>
		管理员和组管理员还可以修改和删除其他人拥有的预约。
	</p>

    <h2>更新预约</h2>

    <p>
		您可以更新您创建的或者您代为创建的所有预约。
	</p>

    <h3>从系列更新特定实例</h3>

    <p>
		如果一个预约被设置为重复，则会创建一个系列。在您进行更改并更新预约后，系统会询问您将要更改应用于哪个系列。
		您可以将更改应用于您正在查看的实例（仅此实例），并且不会更改其他系列。您可以更新所有实例以将更改应用于尚
		未发生的每个预约实例。您也可以将更改应用于尚未发生的实例，这将更新所有预约实例，也包括您正在查看的实例之后
		的所有实例。
    </p>

    <p>只有管理员才能更改过去的预约。</p>

    <h2>删除预约</h2>

    <p>
		删除预约将完全从时间表中删除。它将不再显示在程序中的任何地方。
	</p>

    <h3>从系列中删除特定实例</h3>

    <p>
		与更新预约类似，删除时可以选择要删除的实例。
	</p>

    <p>只有管理员可以删除过去的预约。</p>

    <h2>添加预约到日历(Outlook&reg;, iCal, Mozilla Lightning, Evolution)</h2>

    <p>
		查看或更新预约时，您将看到一个添加到Outlook的按钮。如果您的计算机上安装了Outlook,那那么您将会被要求添加会议。 
		如果未安装，将提示您下载.ics文件，这是一个标准的日历格式。 您可以使用此文件将预约添加到支持iCalendar文件格
		式的任何应用程序。
	</p>

    <h2>订阅日历</h2>

    <p>
		可以为日程表，资源和用户发布日历。要使此功能正常工作，管理员必须在配置文件中配置了订阅密钥。 要启用计划和资
		源级日历预订，只需在管理计划或资源时启用订阅。要打开个人日历订阅表，请打开“时间表” - >“我的日历”。 在页面的右侧，您
		将找到一个指向允许或关闭日历订阅的链接。
    </p>

    <p> 
		要订阅时间表日历，请打开“时间表” - >“资源日历”，然后选择所需的计划。在页面的右侧，您将找到一个链接至订阅当前日历的链接。
		订阅资源日历遵循相同的步骤。要订阅您的个人日历，请打开“时间表”- >我的日历。 在页面的右侧，您将找到一个链接至订阅当前
		日历的链接。
	</p>

    <p>
		默认情况下，过去7天和将来365天的事可以被复原。这可以通过订阅URL上的以下两个查询字符串参数进行自定义。
		pastDayCount和futureDayCount将分别覆盖过去和未来天数。
	</p>

    <h3> 日历客户端 (Outlook&reg;, iCal, Mozilla Lightning, Evolution)</h3>

    <p>
		大多情况下，只需点击“订阅此日历”链接即可自动在日历客户端中设置订阅。 对于Outlook，如果不自动添加，请打开“日历”视图，
		然后右键单击“我的日历”，然后选择“添加日历” -> Form Internet。粘贴在预约计划程序中订阅此日历链接下的URL中。
	</p>

    <h3> 谷歌日历</h3>

    <p>
		打开Goog​​le日历设置。单击日历选项卡。点击浏览有趣的日历。点击 add by URL.粘贴在CVC Rental中订阅此日历链接下的URL中。
	</p>

    <h2>配额</h2>

    <p>
		管理员可以根据各种条件配置配额规则。如果您的预约违反任何配额，您将收到通知，预约将被拒绝。
	</p>

    <h2>等待资源可用</h2>

    <p>
		如果时间不可用，您可以注册来接收可用的通知。此选项将会在预约提醒界面显示。
	</p>

    <h2>预约板块视图</h2>

    <p>
		预约提供了板块友好的资源视图。要启动这个视图，打开{$ScriptUrl}/resource-display.php 从这个角度看，用户可以查看
		当前的可用性，确认其他预约并进行新的预约。
	</p>

</div>
{include file="javascript-includes.tpl"}
{include file='globalfooter.tpl'}