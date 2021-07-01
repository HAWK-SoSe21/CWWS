<?php
    include_once '../phpheader.php';

    if(isset($_POST['submit'])) {

        $target_dir = ROOT . "/uploads/storages/";
        $pictureUrl = "/uploads/storages/" . basename($_FILES["Storage_picture"]["name"]);
        $target_file = $target_dir . basename($_FILES["Storage_picture"]["name"]);
        $uploadedFilePath = move_uploaded_file($_FILES["Storage_picture"]["tmp_name"], $target_file);
        $authenticatedUserId = $_SESSION["userid"];
        $sql_props = "INSERT INTO `properties`(`Properties_name`, `Properties_description`) VALUES ('". $_POST['Storage_name'] ."', '". $_POST['Storage_description'] ."');";
        $propId = setData($sql_props);
        $sql_storage_yard = "INSERT INTO `storage_yard`(`Storage_picture`,`User_User_id`,`Properties_Properties_id`) VALUES ('".$pictureUrl."', '".$authenticatedUserId."', '". $propId."')";
        $status = setData($sql_storage_yard);
        
        if($status) {
          header('location: ../index.php?error=none');
        }
        else{
        header("location: ../index.php?error=stmtfailed");
        }
    }

    


?>
