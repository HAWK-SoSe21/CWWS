<?php
try{
  #erstellt: PHP-Team
  #├╝berarbeitet: Nick Heinemann
  include_once '../phpheader.php';
  $authenticatedUserId = $GLOBALS["user"];
  $modified_date = date('Y-m-d H:i:s');

  if(isset($_POST['submit'])) {
    #if($_FILES["Substorage_fixed_picture"]['name']) {
    #  $target_dir = ROOT . "/uploads/sub_storages_fixed/";
    #  $pictureUrl = "/uploads/sub_storages_fixed/" . basename($_FILES["Substorage_fixed_picture"]["name"]);
    #  $target_file = $target_dir . basename($_FILES["Substorage_fixed_picture"]["name"]);
    #  $uploadedFilePath = move_uploaded_file($_FILES["Substorage_fixed_picture"]["tmp_name"], $target_file);
    #  $sql =  "UPDATE `substorage_yard_fixed` 
    #          SET     `User_User_id` = '". $authenticatedUserId ."', 
    #                  `Substorage_fixed_category` = '". $_POST['Substorage_fixed_category'] ."',
    #                  `Substorage_yard_Substorage_id` = '". $_POST['Substorage_yard_Substorage_id'] ."',
    #                  `Substorage_fixed_picture` = '". $pictureUrl ."'
    #          WHERE   `Substorage_fixed_id` = '". $_POST['Substorage_fixed_id'] ."'";
    #} else {
    $sql =  "UPDATE `substorage_yard_fixed`
            SET     `Substorage_fixed_category` = '". $_POST['Substorage_fixed_category'] ."',
                    `Substorage_yard_Substorage_id` = '". $_POST['Substorage_yard_Substorage_id'] ."'
            WHERE   `Substorage_fixed_id` = '". $_POST['Substorage_fixed_id'] ."'";
    #}

    $propreties_id = getData( "SELECT   Properties_Properties_id 
                              FROM      `substorage_yard_fixed`
                              WHERE `Substorage_fixed_id` = '". $_POST['Substorage_fixed_id'] ."'");
    $format_id = getData( "SELECT   Format_Format_id 
                          FROM      `substorage_yard_fixed`
                          WHERE     `Substorage_fixed_id` = '". $_POST['Substorage_fixed_id'] ."'");
    $last_modID = getData(  "SELECT  *
                            FROM    `substorage_yard_fixed`
                            WHERE   `Substorage_fixed_id` = '". $_POST['Substorage_fixed_id'] ."'");

    $sql_prop = "UPDATE   `properties`
                SET       `Properties_name` = '". $_POST['Substorage_fixed_name'] ."',
                          `Properties_description` = '" . $_POST['Substorage_fixed_description'] . "'
                WHERE     `Properties_id` = '". $propreties_id->Properties_Properties_id ."'";
    $sql_format=  "UPDATE `format`
                  SET     `Format_height` = '". $_POST['Substorage_fixed_Format_height'] ."',
                          `Format_width` = '" . $_POST['Substorage_fixed_Format_width'] . "',
                          `Format_length` = '" . $_POST['Substorage_fixed_Format_length'] . "'
                  WHERE   `Format_id` = '". $format_id->Format_Format_id ."'";
    $sql_last_mod = "UPDATE   `last_modified`
                    SET       `last_modified_datetime` = '".$modified_date."',
                              `last_modified_user_id` = '" .$authenticatedUserId. "'
                    WHERE     `last_modified_id` = '". $last_modID->last_modified_last_modified_id ."'";
    
    $status = setData($sql_prop);
    $status = setData($sql_format);
    $status = setData($sql);
    $status = setData($sql_last_mod);

    if($status) {
      header('location: ../index.php?error=none');
    }
    else{
      header("location: ../index.php?error=stmtfailed");
    }
  }
}
catch(Exception $e) {
  session_start();
  $_SESSION["status"]="Hups! Da ist etwas schief gelaufen... {$e->getMessage()}";
  header('location: ../index.php?error=1');
}  