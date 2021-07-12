<?php

include_once '../phpheader.php';
$authenticatedUserId = $GLOBALS["user"];

if(isset($_POST['submit'])) {
  $propreties_id = getData("SELECT Properties_Properties_id FROM `articel_group` WHERE `Articel_group_id` = '". $_POST['Articel_group_id'] ."'");
  $sql = "UPDATE `properties` SET `Properties_name` = '". $_POST['article_group_name'] ."' WHERE `Properties_id` = '". $propreties_id->Properties_Properties_id ."'";
  $status = setData($sql);
  //dd($sql_prop, $sql, $sql_format);
  if($status) {
    header('location: ../index.php?error=none');
  }
  else{
    header("location: ../index.php?error=stmtfailed");
  }
}
