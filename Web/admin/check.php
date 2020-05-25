<?php

require_once('../../config/dbconfig.php');

$database = new Connection();
$db = $database->openConnection();
$sth = $db->prepare("SELECT * FROM resources where  name = ?");
$sth->execute(array($_POST['resourceName']));
if( $sth->rowCount() > 0 ){
    $valid = false;
} else {
    $valid = true;
}
echo json_encode(array(
    'valid' => $valid,
));
?>