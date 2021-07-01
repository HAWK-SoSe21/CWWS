<?php
    include_once '../phpheader.php';

    if(isset($_POST['submit'])) {
    $authenticatedUserId = $_SESSION["userid"];
    $sql_props = "INSERT INTO `properties`(`Properties_name`, `Properties_description`) VALUES ('". $_POST['Substorage_fixed_name'] ."', '". $_POST['Substorage_fixed_description'] ."');";
    $propId = setData($sql_props);
    $sql_storage_yard = "INSERT INTO `storage_yard_fixed`(`	Substorage_fixed_category`,`User_User_id`,`Properties_Properties_id`) VALUES ('".$pictureUrl."', '".$authenticatedUserId."', '". $propId."')";
    $status = setData($sql_storage_yard);

    if($status) {
        header('location: ../index.php?error=none');
      }
      else{
      header("location: ../index.php?error=stmtfailed");
      }
    }