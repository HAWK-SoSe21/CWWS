array(1) { [0]=> array(10) { ["Substorage_mobile_name"]=> string(11) "Amir Cortez" ["Substorage_mobile_description"]=> string(0) "" ["Substorage_mobile_category"]=> string(6) "Räume" ["Substorage_mobile_cover"]=> string(20) "Doloribus natus aut " ["Substorage_mobile_Format_Format_id"]=> string(0) "" ["Format_length"]=> string(20) "Vero similique vitae" ["Format_width"]=> string(20) "Anim eos maiores bla" ["Format_height"]=> string(20) "Aliquam sunt iure su" ["Substorage_yard_Substorage_id"]=> string(1) "7" ["submit"]=> string(0) "" } }



<?php

include_once '../phpheader.php';
$authenticatedUserId = $GLOBALS["user"];

if(isset($_POST['submit'])) {
  if($_FILES["Substorage_mobile_picture"]['name']) {
    $target_dir = ROOT . "/uploads/sub_storages_fixed/";
    $pictureUrl = "/uploads/sub_storages_fixed/" . basename($_FILES["Substorage_mobile_picture"]["name"]);
    $target_file = $target_dir . basename($_FILES["Substorage_mobile_picture"]["name"]);
    $uploadedFilePath = move_uploaded_file($_FILES["Substorage_mobile_picture"]["tmp_name"], $target_file);
    $sql = "UPDATE `substorage_yard_mobile` SET `Substorage_mobile_category` = '". $_POST['Substorage_mobile_category'] ."', `Substorage_mobile_cover` = '". $_POST['Substorage_mobile_cover'] ."', `Substorage_yard_fixed_Substorage_fixed_id` = '". $_POST['Substorage_yard_Substorage_id'] ."', `Substorage_mobile_picture` = '". $pictureUrl ."' WHERE `Substorage_mobile_id` = '". $_POST['Substorage_mobile_id'] ."'";
  } else {
    $sql = "UPDATE `substorage_yard_mobile` SET `Substorage_mobile_category` = '". $_POST['Substorage_mobile_category'] ."', `Substorage_mobile_cover` = '". $_POST['Substorage_mobile_cover'] ."', `Substorage_yard_fixed_Substorage_fixed_id` = '". $_POST['Substorage_yard_Substorage_id'] ."' WHERE `Substorage_mobile_id` = '". $_POST['Substorage_mobile_id'] ."'";
  }

  $propreties_id = getData("SELECT Properties_Properties_id FROM `substorage_yard_mobile` WHERE `Substorage_mobile_id` = '". $_POST['Substorage_mobile_id'] ."'");
  $format_id = getData("SELECT Format_Format_id FROM `substorage_yard_mobile` WHERE `Substorage_mobile_id` = '". $_POST['Substorage_mobile_id'] ."'");
  $sql_prop = "UPDATE `properties` SET `Properties_name` = '". $_POST['Substorage_mobile_name'] ."', `Properties_description` = '" . $_POST['Substorage_mobile_description'] . "' WHERE `Properties_id` = '". $propreties_id->Properties_Properties_id ."'";
  $sql_format= "UPDATE `format` SET `Format_height` = '". $_POST['Format_height'] ."', `Format_width` = '" . $_POST['Format_width'] . "', `Format_length` = '" . $_POST['Format_length'] . "' WHERE `Format_id` = '". $format_id->Format_Format_id ."'";
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