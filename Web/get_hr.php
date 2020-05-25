<?php
require_once('../config/dbconfig.php');
$database = New Connection();
$db = $database->openConnection();
$rid = $_POST['rid'];;
$sth2 = $db->prepare("select a.*, b.* from users a inner join  resources b
                    on a.user_id = b.userid where b.resource_id = '$rid'  ");
$sth2->execute();
$result1 = $sth2->fetch();
echo json_encode($result1);
