<?php

include_once '../phpheader.php';
$authenticatedUserId = $GLOBALS["user"];

if(isset($_POST['submit'])) {
  if($_FILES["Substorage_picture"]['name']) {
    $target_dir = ROOT . "/uploads/sub_storages/";
    $pictureUrl = "/uploads/sub_storages/" . basename($_FILES["Substorage_picture"]["name"]);
    $target_file = $target_dir . basename($_FILES["Substorage_picture"]["name"]);
    $uploadedFilePath = move_uploaded_file($_FILES["Substorage_picture"]["tmp_name"], $target_file);
    $sql = "UPDATE `substorage_yard` SET `Substorage_name` = '". $_POST['Substorage_name'] ."', `Substorage_description` = '". $_POST['Substorage_description'] ."', `Storage_yard_Storage_id` = '". $_POST['Storage_yard_Storage_id'] ."', `Substorage_picture` = '". $pictureUrl ."', `Storage_yard_User_User_id`  = '". $authenticatedUserId ."' WHERE `Substorage_id` = '". $_POST['Substorage_id'] ."'";
  } else {
      $sql = "UPDATE `substorage_yard` SET `Substorage_name` = '". $_POST['Substorage_name'] ."', `Substorage_description` = '". $_POST['Substorage_description'] ."', `Storage_yard_Storage_id` = '". $_POST['Storage_yard_Storage_id'] ."', `Storage_yard_User_User_id`  = '". $authenticatedUserId ."' WHERE `Substorage_id` = '". $_POST['Substorage_id'] ."'";
  }

  $status = setData($sql);

  if($status) {
    header('location: ../index.php?error=none');
  }
  else{
    header("location: ../index.php?error=stmtfailed");
  }
}
