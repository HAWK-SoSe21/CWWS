<?php
    include_once '../phpheader.php';

    if(isset($_POST['submit'])) {
        
        $target_dir = ROOT . "/uploads/storages/";
        $pictureUrl = "/uploads/storages/" . basename($_FILES["Storage_picture"]["name"]);
        $target_file = $target_dir . basename($_FILES["Storage_picture"]["name"]);
        $uploadedFilePath = move_uploaded_file($_FILES["Storage_picture"]["tmp_name"], $target_file);
        $authenticatedUserId = $_SESSION["userid"];
        $sql = "INSERT INTO `storage_yard`(`Storage_name`, `Storage_description`, `Storage_category`, `Storage_picture`, `Storage_format_heigth`, `Storage_format_width`, `Storage_format_length`, `Storage_furniture`, `User_User_id`) VALUES ('". $_POST['Storage_name'] ."', '". $_POST['Storage_description'] ."', '". $_POST['Storage_category'] ."', '". $pictureUrl ."', '". $_POST['Storage_format_heigth'] ."', '". $_POST['Storage_format_width'] ."', '". $_POST['Storage_format_length'] ."', '". $_POST['Storage_furniture'] ."', $authenticatedUserId)";
      
        $status = setData($sql);
      
        if($status) {
          header('location: ../index.php?error=none');
        }
        else{
        header("location: ../index.php?error=stmtfailed");
        }
    }

    
?>