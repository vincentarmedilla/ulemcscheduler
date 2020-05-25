<?php
/*require_once('../../config/crud.php');

$obj = new bookingClass;

$gid = $_POST['gid'];
$uid = $_POST['uid'];

//pass vairable to check for duplicate
$check = $obj->insertGroupUsers($gid,$uid);

echo $check;*/

require_once('../../config/crud.php');

$obj = new bookingClass;

$uid = $_POST['id'];

//pass vairable to check for duplicate
 $sch = $obj->getSchd($uid);
 echo $sch['default_schedule_id'];

?>