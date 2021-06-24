<?php

include_once '../phpheader.php';

if(isset($_POST['submit'])) {
  if($_FILES["Storage_picture"]['name']) {
    $target_dir = ROOT . "/uploads/storages/";
    $pictureUrl = "/uploads/storages/" . basename($_FILES["Storage_picture"]["name"]);
    $target_file = $target_dir . basename($_FILES["Storage_picture"]["name"]);
    $uploadedFilePath = move_uploaded_file($_FILES["Storage_picture"]["tmp_name"], $target_file);
    $sql_storage = "UPDATE `storage_yard` SET `Storage_picture` = '". $pictureUrl ."' WHERE `Storage_id` = '". $_POST['Storage_id'] ."'";
    setData($sql_storage);
  } 

  $propreties_id = getData("SELECT Properties_Properties_id FROM `storage_yard` WHERE `Storage_id` = '". $_POST['Storage_id'] ."'");
  $sql_prop = "UPDATE `properties` SET `Properties_name` = '". $_POST['Storage_name'] ."', `Properties_description` = '" . $_POST['Storage_description'] . "' WHERE `Properties_id` = '". $propreties_id->Properties_Properties_id ."'";
  $status = setData($sql_prop);

  if($status) {
    header('location: ../index.php?error=none');
  }
  else{
    header("location: ../index.php?error=stmtfailed");
  }
}


if(isset($_POST['delete'])) {
  echo "test";
  header('location: ../index.php?error=functionnotimplemented');
}
