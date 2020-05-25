<?php
require_once('../../config/dbconfig.php');

$database = new Connection();
$db = $database->openConnection();
$sth = $db->prepare("UPDATE resources SET userid = :userid WHERE resource_id = :resourceid");
$sth->bindParam(':userid', $_POST['uid'], PDO::PARAM_STR);
$sth->bindParam(':resourceid', $_POST['rid'], PDO::PARAM_STR);
$sth->execute();
