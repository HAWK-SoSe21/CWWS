<?php

include_once '../phpheader.php';

if(isset($_POST['submit'])) {
  if($_FILES["Articel_picture"]['name']) {
    $target_dir = ROOT . "/uploads/articles/";
    $pictureUrl = "/uploads/articles/" . basename($_FILES["Articel_picture"]["name"]);
    $target_file = $target_dir . basename($_FILES["Articel_picture"]["name"]);
    $uploadedFilePath = move_uploaded_file($_FILES["Articel_picture"]["tmp_name"], $target_file);
    $sql = "UPDATE `articel` SET `Articel_name` = '". $_POST['Articel_name'] ."', `Articel_format_height` = '". $_POST['Articel_format_height'] ."', `Articel_format_width` = '". $_POST['Articel_format_width'] ."', `Articel_format_length` = '". $_POST['Articel_format_length'] ."', `Articel_picture` = '". $pictureUrl ."', `Articel_description` = '". $_POST['Articel_description'] ."', `Articel_alias` = '". $_POST['Articel_alias'] ."', `Articel_expiry` = '". $_POST['Articel_expiry'] ."' WHERE `Articel_id` = '". $_POST['Articel_id'] ."'";
  } else {
      $sql = "UPDATE `articel` SET `Articel_name` = '". $_POST['Articel_name'] ."', `Articel_format_height` = '". $_POST['Articel_format_height'] ."', `Articel_format_width` = '". $_POST['Articel_format_width'] ."', `Articel_format_length` = '". $_POST['Articel_format_length'] ."', `Articel_description` = '". $_POST['Articel_description'] ."', `Articel_alias` = '". $_POST['Articel_alias'] ."', `Articel_expiry` = '". $_POST['Articel_expiry'] ."' WHERE `Articel_id` = '". $_POST['Articel_id'] ."'";
  }

  $status = setData($sql);

  if($status) {
    header('location: ../index.php?error=none');
  } else {
    header("location: ../index.php?error=stmtfailed");
  }
}
