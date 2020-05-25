<?php
require_once('../config/crud.php');

$obj = new bookingClass;

$obj->updateFields(json_encode($_POST['field']),$_POST['userId']);

//echo $encoded = json_encode($_POST['field']);