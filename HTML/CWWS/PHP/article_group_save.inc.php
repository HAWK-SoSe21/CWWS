<?php
    include_once '../phpheader.php';
if(isset($_POST['submit'])) {
    $sql_props = "INSERT INTO `properties`(`Properties_name`) VALUES ('". $_POST['article_group_name'] ."');";
    $propId = setData($sql_props);
    $sql = "INSERT INTO `articel_group`(`Properties_Properties_id`) VALUES ('". $propId."')";
    $status = setData($sql);

    if($status) {
        header('location: ../index.php?error=none');
    }
    else{
        header("location: ../index.php?error=stmtfailed");
    }
}
