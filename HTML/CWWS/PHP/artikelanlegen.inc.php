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
        if( empty($_POST['Articel_name']) ||
            empty($_POST['Articel_description'] ) ||
            empty($_POST['Articel_alias']) ||
            empty($_POST['Articel_format_height']) ||
            empty($_POST['Articel_format_width']) ||
            empty($_POST['Articel_format_length']) ||
            empty($_POST['Articel_expiry']))
        {
            header("location: ../pages/storage.php?error=emptyinput");
            exit();
        }

        $target_dir = ROOT . "/uploads/articles/";
        $pictureUrl = "/uploads/articles/" . basename($_FILES["Articel_picture"]["name"]);
        $target_file = $target_dir . basename($_FILES["Articel_picture"]["name"]);
        $uploadedFilePath = move_uploaded_file($_FILES["Articel_picture"]["tmp_name"], $target_file);
        
        if(isset($_SESSION["userid"])){
            $authenticatedUserId = $_SESSION["userid"];
        }
        else{
            $authenticatedUserId = $_POST["User_User_id"];
        }

        $sql ="INSERT INTO  `articel`
                            (`Articel_name`, 
                            `Articel_format_height`, 
                            `Articel_format_width`, 
                            `Articel_format_length`, 
                            `Articel_picture`, 
                            `Articel_description`, 
                            `Articel_alias`, 
                            `Articel_expiry`, 
                            `User_User_id`) 
                VALUES     ('". $_POST['Articel_name'] ."', 
                            '". $_POST['Articel_format_height'] ."', 
                            '". $_POST['Articel_format_width'] ."', 
                            '". $_POST['Articel_format_length'] ."', 
                            '". $pictureUrl ."', 
                            '". $_POST['Articel_description'] ."', 
                            '". $_POST['Articel_alias'] ."', 
                            '". $_POST['Articel_expiry'] ."', 
                            $authenticatedUserId)";

        $status = setData($sql);

        if($status) {
            header('location: ../pages/storage.php?error=none2');
        }
        else{
            header('location: ../pages/storage.php?error=stmtfailed');
        }
    }

?>