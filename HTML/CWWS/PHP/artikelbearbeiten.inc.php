<?php

include_once '../phpheader.php';
$authenticatedUserId = $GLOBALS["user"];

if(isset($_POST['submit'])) {
  if($_FILES["Articel_picture"]['name']) {
    $target_dir = ROOT . "/uploads/articles/";
    $pictureUrl = "/uploads/articles/" . basename($_FILES["Articel_picture"]["name"]);
    $target_file = $target_dir . basename($_FILES["Articel_picture"]["name"]);
    $uploadedFilePath = move_uploaded_file($_FILES["Articel_picture"]["tmp_name"], $target_file);
    $sql = "UPDATE `articel` SET `Articel_expiry` = '". $_POST['Articel_expiry'] ."', `aliase` = '". $_POST['Articel_alias'] ."', `Articel_picture` = '". $pictureUrl ."', `Substorage_yard_Substorage_mobile_id` = '". $_POST['Substorage_yard_Substorage_mobile_id'] ."' WHERE `Articel_id` = '". $_POST['Articel_id'] ."'";
  } else {
    $sql = "UPDATE `articel` SET `Articel_expiry` = '". $_POST['Articel_expiry'] ."', `aliase` = '". $_POST['Articel_alias'] ."', `Substorage_yard_Substorage_mobile_id` = '". $_POST['Substorage_yard_Substorage_mobile_id'] ."' WHERE `Articel_id` = '". $_POST['Articel_id'] ."'";
  }


  $propreties_id = getData("SELECT Properties_Properties_id FROM `articel` WHERE `Articel_id` = '". $_POST['Articel_id'] ."'");
  $format_id = getData("SELECT Format_Format_id FROM `articel` WHERE `Articel_id` = '". $_POST['Articel_id'] ."'");
  $sql_prop = "UPDATE `properties` SET `Properties_name` = '". $_POST['Articel_name'] ."', `Properties_description` = '" . $_POST['Articel_description'] . "' WHERE `Properties_id` = '". $propreties_id->Properties_Properties_id ."'";
  $sql_format= "UPDATE `format` SET `Format_height` = '". $_POST['Articel_format_height'] ."', `Format_width` = '" . $_POST['Articel_format_width'] . "', `Format_length` = '" . $_POST['Articel_format_length'] . "' WHERE `Format_id` = '". $format_id->Format_Format_id ."'";
  $status = setData($sql_prop);
  $status = setData($sql_format);
  $status = setData($sql);
  //dd($sql_prop, $sql, $sql_format);
  if($status) {
    header('location: ../index.php?error=none');
  }
  else{
    header("location: ../index.php?error=stmtfailed");
  }
}
