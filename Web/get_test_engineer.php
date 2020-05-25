<?php
require_once('../config/dbconfig.php');
$database = New Connection();
$db = $database->openConnection();
$rid = $_POST['resourceId'];
$sth2 = $db->prepare("select a.*, b.* from resources a inner join  users b
                    on a.userid = b.user_id where a.resource_id = '$rid'");

$sth2->execute();
$result1 = $sth2->fetch();
echo json_encode($result1);
