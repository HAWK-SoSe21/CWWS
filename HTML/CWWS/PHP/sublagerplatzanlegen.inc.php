<?php
    include_once '../phpheader.php';

    if(isset($_POST['submit'])) {
    $target_dir = ROOT . "/uploads/sub_storages/";
    $pictureUrl = "/uploads/sub_storages/" . basename($_FILES["Substorage_picture"]["name"]);
    $target_file = $target_dir . basename($_FILES["Substorage_picture"]["name"]);
    $uploadedFilePath = move_uploaded_file($_FILES["Substorage_picture"]["tmp_name"], $target_file);
    $authenticatedUserId = $_SESSION["userid"];
    $sql = "INSERT INTO `substorage_yard`(`Substorage_name`, `Substorage_description`, `Storage_yard_Storage_id`, `Substorage_picture`, `Storage_yard_User_User_id`) VALUES ('". $_POST['Substorage_name'] ."', '". $_POST['Substorage_description'] ."', '". $_POST['Storage_yard_Storage_id'] ."', '". $pictureUrl ."','". $authenticatedUserId."');";

    $status = setData($sql);

    if($status) {
        header('location: ../index.php?error=none');
      }
      else{
      header("location: ../index.php?error=stmtfailed");
      }
    }