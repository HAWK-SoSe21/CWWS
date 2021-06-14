<?php

include_once '../phpheader.php';

$message = '';
$authenticatedUserId = $_SESSION["userid"];

$storage = null;

if(isset($_GET['id'])) {
  $sql = "SELECT * FROM storage_yard WHERE Storage_id = '" . $_GET['id'] . "'";
  $storage = getData($sql);
}

if(!$storage) {
  header('location: index.php');
}

if(isset($_POST['submit'])) {
  if($_FILES["Storage_picture"]['name']) {
    $target_dir = ROOT . "/uploads/storages/";
    $pictureUrl = "/uploads/storages/" . basename($_FILES["Storage_picture"]["name"]);
    $target_file = $target_dir . basename($_FILES["Storage_picture"]["name"]);
    $uploadedFilePath = move_uploaded_file($_FILES["Storage_picture"]["tmp_name"], $target_file);
    $sql = "UPDATE `storage_yard` SET `Storage_name` = '". $_POST['Storage_name'] ."', `Storage_description` = '". $_POST['Storage_description'] ."', `Storage_category` = '". $_POST['Storage_category'] ."', `Storage_format_heigth` = '". $_POST['Storage_format_heigth'] ."', `Storage_picture` = '". $pictureUrl ."', `Storage_format_width` = '". $_POST['Storage_format_width'] ."', `Storage_format_length` = '". $_POST['Storage_format_length'] ."', `Storage_furniture` = '". $_POST['Storage_furniture'] ."' WHERE `Storage_id` = '". $_POST['Storage_id'] ."'";
  } else {
      $sql = "UPDATE `storage_yard` SET `Storage_name` = '". $_POST['Storage_name'] ."', `Storage_description` = '". $_POST['Storage_description'] ."', `Storage_category` = '". $_POST['Storage_category'] ."', `Storage_format_heigth` = '". $_POST['Storage_format_heigth'] ."', `Storage_format_width` = '". $_POST['Storage_format_width'] ."', `Storage_format_length` = '". $_POST['Storage_format_length'] ."', `Storage_furniture` = '". $_POST['Storage_furniture'] ."' WHERE `Storage_id` = '". $_POST['Storage_id'] ."'";
  }

  $status = setData($sql);

  if($status) {
    header('location: ../index.php?error=none');
  }
  else{
  header("location: ../index.php?error=stmtfailed");
  }
}