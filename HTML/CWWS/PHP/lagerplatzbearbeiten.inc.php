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
        if($_FILES["Storage_picture"]['name']) {
            $target_dir = ROOT . "/uploads/storages/";
            $pictureUrl = "/uploads/storages/" . basename($_FILES["Storage_picture"]["name"]);
            $target_file = $target_dir . basename($_FILES["Storage_picture"]["name"]);
            $uploadedFilePath = move_uploaded_file($_FILES["Storage_picture"]["tmp_name"], $target_file);
            $sql = "UPDATE  `storage_yard` 
                    SET     `Storage_name` = '". $_POST['Storage_name'] ."', 
                            `Storage_description` = '". $_POST['Storage_description'] ."', 
                            `Storage_category` = '". $_POST['Storage_category'] ."', 
                            `Storage_format_heigth` = '". $_POST['Storage_format_heigth'] ."', 
                            `Storage_picture` = '". $pictureUrl ."', 
                            `Storage_format_width` = '". $_POST['Storage_format_width'] ."',
                            `Storage_format_length` = '". $_POST['Storage_format_length'] ."',
                            `Storage_furniture` = '". $_POST['Storage_furniture'] ."' 
                    WHERE   `Storage_id` = '". $_POST['Storage_id'] ."'";
        } 
        else {
            $sql = "UPDATE  `storage_yard` 
                    SET     `Storage_name` = '". $_POST['Storage_name'] ."', 
                            `Storage_description` = '". $_POST['Storage_description'] ."', 
                            `Storage_category` = '". $_POST['Storage_category'] ."', 
                            `Storage_format_heigth` = '". $_POST['Storage_format_heigth'] ."', 
                            `Storage_format_width` = '". $_POST['Storage_format_width'] ."', 
                            `Storage_format_length` = '". $_POST['Storage_format_length'] ."', 
                            `Storage_furniture` = '". $_POST['Storage_furniture'] ."' 
                    WHERE   `Storage_id` = '". $_POST['Storage_id'] ."'";
        }

      $status = setData($sql);

      if($status) {
        header('location: ../pages/storage.php?error=none4');
      }
      else{
        header('location: ../pages/storage.php?error=stmtfailed');
      }
    }

?>