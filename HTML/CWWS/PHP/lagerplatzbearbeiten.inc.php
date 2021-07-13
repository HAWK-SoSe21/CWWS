<?php
try{
  #erstellt: PHP-Team
  #überarbeitet: Nick Heinemann
  include_once '../phpheader.php';

  $authenticatedUserId = $_SESSION["userid"];
  if(isset($_POST['submit'])) {
    if($_FILES["Storage_picture"]['name']) {
      $target_dir = ROOT . "/uploads/storages/";
      $pictureUrl = "/uploads/storages/" . basename($_FILES["Storage_picture"]["name"]);
      $target_file = $target_dir . basename($_FILES["Storage_picture"]["name"]);
      $uploadedFilePath = move_uploaded_file($_FILES["Storage_picture"]["tmp_name"], $target_file);
      $sql_storage = "UPDATE storage_yard SET User_User_id = '". $authenticatedUserId ."', Storage_picture = '". $pictureUrl ."' WHERE Storage_id = '". $_POST['Storage_id'] ."'";
    } else {
      $sql_storage = "UPDATE storage_yard SET User_User_id = '". $authenticatedUserId ."' WHERE Storage_id = '". $_POST['Storage_id'] ."'";
    }
    setData($sql_storage);
    
    $propreties_id = getData( "SELECT   Properties_Properties_id
                              FROM      storage_yard
                              WHERE     Storage_id = '". $_POST['Storage_id'] ."'");
    $sql_prop = "UPDATE   properties
                SET       Properties_name = '". $_POST['Storage_name'] ."',
                          Properties_description = '" . $_POST['Storage_description'] . "'
                WHERE     Properties_id = '". $propreties_id->Properties_Properties_id ."'";
    $status = setData($sql_prop);

    $format_id = getData( "SELECT   * 
                          FROM      storage_yard 
                          WHERE     Storage_id = '". $_POST['Storage_id'] ."'");
    $sql_format = "UPDATE format
                  SET     Format_height = {$_POST['Storage_Format_height']},
                          Format_width = {$_POST['Storage_Format_width']},
                          Format_length =  {$_POST['Storage_Format_length']}
                  WHERE   Format_id = {$format_id->Format_Format_id}";
    $status = setData($sql_format);

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
}
catch(Exception $e) {
  session_start();
  $_SESSION["status"]="Hups! Da ist etwas schief gelaufen... {$e->getMessage()}";
  header('location: ../index.php?error=1');
}  