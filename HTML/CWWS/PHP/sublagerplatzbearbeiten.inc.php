<?php
try{
  #erstellt: PHP-Team
  #überarbeitet: Nick Heinemann
  include_once '../phpheader.php';
  $authenticatedUserId = $GLOBALS["user"];
  $modified_date = date('Y-m-d H:i:s');
  if(isset($_POST['submit'])) {
    if($_FILES["Substorage_picture"]['name']) {
      $target_dir = ROOT . "/uploads/sub_storages/";
      $pictureUrl = "/uploads/sub_storages/" . basename($_FILES["Substorage_picture"]["name"]);
      $target_file = $target_dir . basename($_FILES["Substorage_picture"]["name"]);
      $uploadedFilePath = move_uploaded_file($_FILES["Substorage_picture"]["tmp_name"], $target_file);
      $sql =  "UPDATE   `substorage_yard`
              SET       `Substorage_quantity` = '". $_POST['Substorage_quantity'] ."',
                        `Substorage_category` = '". $_POST['Substorage_category'] ."',
                        `Storage_yard_Storage_id` = '". $_POST['Storage_yard_Storage_id'] ."',
                        `Substorage_picture` = '". $pictureUrl ."'
              WHERE     `Substorage_id` = '". $_POST['Substorage_id'] ."'";
    } else {
      $sql =  "UPDATE   `substorage_yard`
              SET       `Substorage_quantity` = '". $_POST['Substorage_quantity'] ."',
                        `Substorage_category` = '". $_POST['Substorage_category'] ."',
                        `Storage_yard_Storage_id` = '". $_POST['Storage_yard_Storage_id'] ."'
              WHERE     `Substorage_id` = '". $_POST['Substorage_id'] ."'";
    }

    $propreties_id = getData( "SELECT   Properties_Properties_id
                              FROM `substorage_yard`
                              WHERE `Substorage_id` = '". $_POST['Substorage_id'] ."'");
    $sql_prop =   "UPDATE   `properties`
                  SET       `Properties_name` = '". $_POST['Substorage_name'] ."',
                            `Properties_description` = '" . $_POST['Substorage_description'] . "'
                  WHERE     `Properties_id` = '". $propreties_id->Properties_Properties_id ."'";
    
    $last_modID = getData( "SELECT  *
                            FROM    `substorage_yard`
                            WHERE   `Substorage_id` = '". $_POST['Substorage_id'] ."'");
    $sql_last_mod = "UPDATE   `last_modified`
                    SET       `last_modified_datetime` = '".$modified_date."',
                              `last_modified_user_id` = '" .$authenticatedUserId. "'
                    WHERE     `last_modified_id` = '". $last_modID->last_modified_last_modified_id ."'";
    
    $status = setData($sql);
    $status = setData($sql_prop);
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

