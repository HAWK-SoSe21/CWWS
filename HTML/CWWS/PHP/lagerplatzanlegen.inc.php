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

    if(isset($_POST['submit'])) {
        if( empty($_POST['Storage_name']) ||
            empty($_POST['Storage_description'] ) ||
            empty($_POST['Storage_category']) ||
            empty($_POST['Storage_format_heigth']) ||
            empty($_POST['Storage_format_width']) ||
            empty($_POST['Storage_format_length']) ||
            empty($_POST['Storage_furniture']))
        {
            header("location: ../pages/storage.php?error=emptyinput");
            exit();
        }

        $target_dir = ROOT . "/uploads/storages/";
        $pictureUrl = "uploads/storages/" . basename($_FILES["Storage_picture"]["name"]);
        $target_file = $target_dir . basename($_FILES["Storage_picture"]["name"]);
        $uploadedFilePath = move_uploaded_file($_FILES["Storage_picture"]["tmp_name"], $target_file);
        
        if(isset($_SESSION["userid"])){
            $authenticatedUserId = $_SESSION["userid"];
        }
        else{
            $authenticatedUserId = $_POST["User_User_id"];
        }
        
        
        $sql = 
        "INSERT INTO `storage_yard` (
                `Storage_name`, 
                `Storage_description`, 
                `Storage_category`, 
                `Storage_picture`, 
                `Storage_format_heigth`, 
                `Storage_format_width`, 
                `Storage_format_length`, 
                `Storage_furniture`, 
                `User_User_id`) 
            VALUES (
                '". $_POST['Storage_name'] ."', 
                '". $_POST['Storage_description'] ."', 
                '". $_POST['Storage_category'] ."', 
                '". $pictureUrl ."', 
                '". $_POST['Storage_format_heigth'] ."', 
                '". $_POST['Storage_format_width'] ."', 
                '". $_POST['Storage_format_length'] ."', 
                '". $_POST['Storage_furniture'] ."', 
                $authenticatedUserId)";

        $status = setData($sql);

        if($status) {
            header('location: ../pages/storage.php?error=none1');
        }
        else{
            header('location: ../pages/storage.php?error=stmtfailed');
        }
    }

?>