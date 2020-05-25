<?php
require_once('../config/crud.php');

$obj = new bookingClass;

$begin = $_POST['Bd'].' '.$_POST['Bt'];
$end = $_POST['Ed'].' '.$_POST['Et'];

//pass vairable to check for duplicate
$data = $obj->getBlockUsers($begin, $end);
echo json_encode($data);
