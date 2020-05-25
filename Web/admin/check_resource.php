<?php
require_once('../../config/crud.php');

$obj = new bookingClass;

$table = $_POST['table_name'];
$column = $_POST['column'];
$data = $_POST['data'];

//pass vairable to check for duplicate
$check =$obj->checkResource($table,$column,$data);

echo $check;

?>