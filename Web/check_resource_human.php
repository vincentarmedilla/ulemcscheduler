<?php
require_once('../config/dbconfig.php');
$database = New Connection();
$db = $database->openConnection();
$uid = $_POST['userId'];;
$sth2 = $db->prepare("select a.*, b.* from users a inner join  resources b
                    on a.user_id = b.userid where b.userid = '$uid'  ");
$sth2->execute();
$result1 = $sth2->fetch();
echo json_encode($result1);
