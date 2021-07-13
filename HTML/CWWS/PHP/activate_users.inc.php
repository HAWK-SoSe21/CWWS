<?php
include_once '../phpheader.php';
if(isset($_GET['user_id'])) {
    $sql = "UPDATE user SET is_active = 1 WHERE User_id = '". $_GET['user_id']."'";
    $status = setData($sql);

    header('location: ../index.php?activate_users');
}
