<?php
require_once('../../config/crud.php');

$obj = new bookingClass;

$gids = $_POST['gids'];
$uid = $_POST['uid'];

$output = $obj->getUsersByGroup($gids,$uid);

echo json_encode($output);

?>