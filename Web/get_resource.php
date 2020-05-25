<?php
require_once('../config/dbconfig.php');
$database = New Connection();
$db = $database->openConnection();
$rid = $_POST['rid'];

$sth2 = $db->prepare("select * from   resources 
                     where resource_id = '$rid'  ");
$sth2->execute();
$result1 = $sth2->fetch();
echo json_encode($result1);
