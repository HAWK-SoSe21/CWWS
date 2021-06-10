<?php
    define("WEBROOT", 'http://localhost/CWWS');
    define("ROOT", $_SERVER['DOCUMENT_ROOT'] . '/CWWS');

    $GLOBALS["user"] = null;
    session_start();

    if(isset($_SESSION["userid"])){
        $GLOBALS["user"] = $_SESSION["userid"];
    }

    include_once ROOT.'/PHP/functions.inc.php';
    include_once ROOT.'/PHP/dbh.inc.php';
    include_once ROOT.'/PHP/helpers.inc.php';

    $message = '';
    if(isset($_SESSION["userid"])){
      $authenticatedUserId = $_SESSION["userid"];
    }

    if(isset($_POST['submit'])) {
      if($_FILES["Articel_picture"]['name']) {
        $target_dir = ROOT . "/uploads/articles/";
        $pictureUrl = "/uploads/articles/" . basename($_FILES["Articel_picture"]["name"]);
        $target_file = $target_dir . basename($_FILES["Articel_picture"]["name"]);
        $uploadedFilePath = move_uploaded_file($_FILES["Articel_picture"]["tmp_name"], $target_file);
        $sql = "UPDATE `articel` SET `Articel_name` = '". $_POST['Articel_name'] ."', `Articel_format_height` = '". $_POST['Articel_format_height'] ."', `Articel_format_width` = '". $_POST['Articel_format_width'] ."', `Articel_format_length` = '". $_POST['Articel_format_length'] ."', `Articel_picture` = '". $pictureUrl ."', `Articel_description` = '". $_POST['Articel_description'] ."', `Articel_alias` = '". $_POST['Articel_alias'] ."', `Articel_expiry` = '". $_POST['Articel_expiry'] ."' WHERE `Articel_id` = '". $_POST['Articel_id'] ."'";
      } 
      else {
          $sql = "UPDATE `articel` SET `Articel_name` = '". $_POST['Articel_name'] ."', `Articel_format_height` = '". $_POST['Articel_format_height'] ."', `Articel_format_width` = '". $_POST['Articel_format_width'] ."', `Articel_format_length` = '". $_POST['Articel_format_length'] ."', `Articel_description` = '". $_POST['Articel_description'] ."', `Articel_alias` = '". $_POST['Articel_alias'] ."', `Articel_expiry` = '". $_POST['Articel_expiry'] ."' WHERE `Articel_id` = '". $_POST['Articel_id'] ."'";
      }

      $status = setData($sql);

      if($status) {
        header('location: ../pages/storage.php?error=none3');
      }
      else{
        header('location: ../pages/storage.php?error=stmtfailed');
      }
    }

?>