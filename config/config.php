<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);
// $ip = $_SERVER['REMOTE_ADDR'];
// $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
// $country = $details->country; // -> "US

// if($country == 'UK') {
//     $lang = 'en_gb';
// } else {
//     $lang = 'en_us';
// }
$conf['settings']['app.title'] = 'UL - EMC Scheduler';
$conf['settings']['default.timezone'] = 'Africa/Abidjan';
$conf['settings']['allow.self.registration'] = 'false';
$conf['settings']['admin.email'] = 'alvin.capil@ul.com';
$conf['settings']['admin.email.name'] = 'Booked Administrator';
$conf['settings']['default.page.size'] = '50';
$conf['settings']['enable.email'] = 'false';
$conf['settings']['default.language'] = 'en_us';
$conf['settings']['script.url'] = 'http://localhost/scheduleremc/Web/';
$conf['settings']['image.upload.directory'] = 'Web/uploads/images';
$conf['settings']['image.upload.url'] = 'uploads/images';
$conf['settings']['cache.templates'] = 'false';
$conf['settings']['use.local.js.libs'] = 'false';
$conf['settings']['registration.captcha.enabled'] = 'false';
$conf['settings']['registration.require.email.activation'] = 'false';
$conf['settings']['registration.auto.subscribe.email'] = 'false';
$conf['settings']['registration.notify.admin'] = 'true';
$conf['settings']['inactivity.timeout'] = '120';
$conf['settings']['name.format'] = '{first} {last}';
$conf['settings']['css.extension.file'] = '';
$conf['settings']['disable.password.reset'] = 'false';
$conf['settings']['home.url'] = '';
$conf['settings']['logout.url'] = '';
$conf['settings']['default.homepage'] = '1';
$conf['settings']['schedule']['use.per.user.colors'] = 'false';
//allow all in calendar
$conf['settings']['schedule']['show.inaccessible.resources'] = 'false';
$conf['settings']['schedule']['reservation.label'] = '{status} => {title} {name}';
$conf['settings']['schedule']['hide.blocked.periods'] = 'true';
$conf['settings']['ics']['subscription.key'] = '8f4a2b90d54790113c0e';
$conf['settings']['ics']['future.days'] = '30';
$conf['settings']['ics']['past.days'] = '0';


$conf['settings']['privacy']['view.schedules'] = 'true';       			// if unauthenticated users can view schedules
$conf['settings']['privacy']['view.reservations'] = 'false';    			// if unauthenticated users can view reservations
$conf['settings']['privacy']['hide.user.details'] = 'false';    			// if personal user details should be displayed to non-administrators
$conf['settings']['privacy']['hide.reservation.details'] = 'false';			// if reservation details should be displayed to non-administrators. options are true, false, current, future, past
$conf['settings']['privacy']['allow.guest.reservations'] = 'false';


$conf['settings']['reservation']['start.time.constraint'] = 'none';		// when reservations can be created or edited. options are future, current, none
$conf['settings']['reservation']['updates.require.approval'] = 'false';		// if updates to previously approved reservations require approval again
$conf['settings']['reservation']['prevent.participation'] = 'false';		// if participation and invitation options should be removed
$conf['settings']['reservation']['prevent.recurrence'] = 'false';			// if recurring reservations are disabled for non-administrators
$conf['settings']['reservation']['enable.reminders'] = 'false';				// if reminders are enabled. this requires email to be enabled and the reminder job to be configured
$conf['settings']['reservation']['allow.guest.participation'] = 'false';
$conf['settings']['reservation']['allow.wait.list'] = 'false';
$conf['settings']['reservation']['checkin.minutes.prior'] = '5';
$conf['settings']['reservation']['default.start.reminder'] = '';			// the default start reservation reminder. format is ## interval. for example, 10 minutes, 2 hours, 6 days.
$conf['settings']['reservation']['default.end.reminder'] = '';				// the default end reservation reminder. format is ## interval. for example, 10 minutes, 2 hours, 6 days.
$conf['settings']['reservation']['title.required'] = 'false';
$conf['settings']['reservation']['description.required'] = 'false';


$conf['settings']['reservation.notify']['resource.admin.add'] = 'false';
$conf['settings']['reservation.notify']['resource.admin.update'] = 'false';
$conf['settings']['reservation.notify']['resource.admin.delete'] = 'false';
$conf['settings']['reservation.notify']['resource.admin.approval'] = 'false';
$conf['settings']['reservation.notify']['application.admin.add'] = 'false';
$conf['settings']['reservation.notify']['application.admin.update'] = 'false';
$conf['settings']['reservation.notify']['application.admin.delete'] = 'false';
$conf['settings']['reservation.notify']['application.admin.approval'] = 'false';
$conf['settings']['reservation.notify']['group.admin.add'] = 'false';
$conf['settings']['reservation.notify']['group.admin.update'] = 'false';
$conf['settings']['reservation.notify']['group.admin.delete'] = 'false';
$conf['settings']['reservation.notify']['group.admin.approval'] = 'false';
$conf['settings']['uploads']['enable.reservation.attachments'] = 'false';
$conf['settings']['uploads']['reservation.attachment.path'] = 'uploads/reservation';
$conf['settings']['uploads']['reservation.attachment.extensions'] = 'txt,jpg,gif,png,doc,docx,pdf,xls,xlsx,ppt,pptx,csv';
$conf['settings']['database']['type'] = 'mysql';
$conf['settings']['database']['user'] = 'root';
$conf['settings']['database']['password'] = '';
$conf['settings']['database']['hostspec'] = '127.0.0.1';
$conf['settings']['database']['name'] = 'dev';

$conf['settings']['phpmailer']['mailer'] = 'smtp';
$conf['settings']['phpmailer']['smtp.host'] = 'smtp.googlemail.com';
$conf['settings']['phpmailer']['smtp.port'] = '587';
$conf['settings']['phpmailer']['smtp.secure'] = 'tls';
$conf['settings']['phpmailer']['smtp.auth'] = 'true';
$conf['settings']['phpmailer']['smtp.username'] = 'ulmakati@gmail.com';
$conf['settings']['phpmailer']['smtp.password'] = 'Qaz2wsx3edc!';
$conf['settings']['phpmailer']['sendmail.path'] = '/usr/sbin/sendmail';

/*$conf['settings']['phpmailer']['mailer'] = 'smtp';
$conf['settings']['phpmailer']['smtp.host'] = 'smtp.sendgrid.net';
$conf['settings']['phpmailer']['smtp.port'] = '587';
$conf['settings']['phpmailer']['smtp.secure'] = 'tls';
$conf['settings']['phpmailer']['smtp.auth'] = 'true';
$conf['settings']['phpmailer']['smtp.username'] = 'apikey';
$conf['settings']['phpmailer']['smtp.password'] = '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';
$conf['settings']['phpmailer']['sendmail.path'] = '/usr/sbin/sendmail';*/

$conf['settings']['phpmailer']['smtp.debug'] = 'false';

$conf['settings']['plugins']['Authentication'] = '';
$conf['settings']['plugins']['Authorization'] = '';
$conf['settings']['plugins']['Permission'] = '';
$conf['settings']['plugins']['PostRegistration'] = '';
$conf['settings']['plugins']['PreReservation'] = '';
$conf['settings']['plugins']['PostReservation'] = '';
$conf['settings']['install.password'] = 'Qaz2wsx3edc';
$conf['settings']['pages']['enable.configuration'] = 'true';
$conf['settings']['api']['enabled'] = 'false';
$conf['settings']['api']['allow.self.registration'] = 'false';
$conf['settings']['recaptcha']['enabled'] = 'false';
$conf['settings']['recaptcha']['public.key'] = '';
$conf['settings']['recaptcha']['private.key'] = '';
$conf['settings']['email']['default.from.address'] = 'vmbarmedilla@gmail.com';
$conf['settings']['email']['default.from.name'] = '';
$conf['settings']['reports']['allow.all.users'] = 'false';
$conf['settings']['password']['minimum.letters'] = '6';
$conf['settings']['password']['minimum.numbers'] = '0';
$conf['settings']['password']['upper.and.lower'] = 'false';
$conf['settings']['reservation.labels']['ics.summary'] = '{title}';
$conf['settings']['reservation.labels']['ics.my.summary'] = '{title}';
$conf['settings']['reservation.labels']['rss.description'] = '<div><span>Start</span> {startdate}</div><div><span>End</span> {enddate}</div><div><span>Organizer</span> {name}</div><div><span>Description</span> {description}</div>';
$conf['settings']['reservation.labels']['my.calendar'] = ' {title} {resourcename}  {name}';
$conf['settings']['reservation.labels']['resource.calendar'] = ' {title} {resourcename} {name}';
$conf['settings']['reservation.labels']['reservation.popup'] = '<div style="">{name} {email}</div> {dates} {title} {resources} {participants} {accessories} {description} {attributes} {pending} {duration}';
$conf['settings']['security']['security.headers'] = 'false';
$conf['settings']['security']['security.strict-transport'] = 'true';
$conf['settings']['security']['security.x-frame'] = 'deny';
$conf['settings']['security']['security.x-xss'] = '1; mode=block';
$conf['settings']['security']['security.x-content-type'] = 'nosniff';
$conf['settings']['security']['security.content-security-policy'] = '';
$conf['settings']['google.analytics']['tracking.id'] = '';
$conf['settings']['authentication']['allow.facebook.login'] = 'false';
$conf['settings']['authentication']['allow.google.login'] = 'false';
$conf['settings']['authentication']['required.email.domains'] = '';
$conf['settings']['authentication']['hide.booked.login.prompt'] = 'false';
$conf['settings']['authentication']['captcha.on.login'] = 'false';
$conf['settings']['credits']['enabled'] = 'false';
$conf['settings']['credits']['allow.purchase'] = 'false';
$conf['settings']['slack']['token'] = '';
$conf['settings']['tablet.view']['allow.guest.reservations'] = 'false';
?>