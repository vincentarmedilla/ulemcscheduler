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

$gid = $_POST['gid'];
$rid = $_POST['rid'];

//pass vairable to check for duplicate
$check = $obj->insertGroupResource($rid, $gid);

echo $check; 


?>