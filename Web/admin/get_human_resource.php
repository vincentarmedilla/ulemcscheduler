<?php
    require_once('../../config/dbconfig.php');
    $database = new Connection();
    $db = $database->openConnection();
    $users = $db->prepare('Select * from users');
    $users->execute();
    $all_users = $users->fetchAll();

    $rid = $_POST['rid'];
    $hr = $db->prepare("Select * from resources a
                            inner join users b 
                            on a.userid = b.user_id
                            where resource_id = '$rid' LIMIT 1");
    $hr->execute();
    $user_hr = $hr->fetch();
    ?>

    <strong style="color:red;"><?php echo $user_hr['fname'].' '.$user_hr['lname']; ?></strong>
<!--<select class="form-control" id="human_resources_list" name="human_resources_list">
    <option selected>Select User</option>
    <?php /*foreach($all_users as $usr) { */?>
        <option value="<?php /*echo $usr['user_id'];*/?> => <?php /*echo $rid;*/?>" <?php /*if($usr['user_id'] == $user_hr['userid']) {*/?> selected <?php /*} */?>>
            <?php /*echo $usr['fname'].' '.$usr['lname'];*/?>
        </option>
    <?php /*} */?>
</select>-->
