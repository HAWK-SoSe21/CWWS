<?php
    include_once '../phpheader.php';


    if(isset($_POST['submit'])) {
        $target_dir = ROOT . "/uploads/sub_storages_mobile/";
        $pictureUrl = null;
        
        if(isset($_FILES["Substorage_mobile_picture"]["name"])) {
            $pictureUrl = "/uploads/sub_storages_fixed/" . basename($_FILES["Substorage_mobile_picture"]["name"]);
            $target_file = $target_dir . basename($_FILES["Substorage_mobile_picture"]["name"]);
            $uploadedFilePath = move_uploaded_file($_FILES["Substorage_mobile_picture"]["tmp_name"], $target_file);
        }
        $authenticatedUserId = $_SESSION["userid"];

        $sql_props = "INSERT INTO `properties`(`Properties_name`, `Properties_description`) VALUES ('". $_POST['Substorage_mobile_name'] ."', '". $_POST['Substorage_mobile_description'] ."');";
        $propId = setData($sql_props);
        $sql_format = "INSERT INTO `format` (`Format_height`, `Format_width`, `Format_length`) VALUES ('". $_POST['Format_height'] ."','". $_POST['Format_width'] ."','". $_POST['Format_length'] ."')";
        $formatId = setData($sql_format);
        $sql_substorage_yard = "INSERT INTO `substorage_yard_mobile` (`Substorage_mobile_cover`, `Substorage_mobile_picture`, `Substorage_mobile_category`, `Substorage_yard_fixed_Substorage_fixed_id`, `Format_Format_id`, `Properties_Properties_id`) 
                                                            VALUES ('". $_POST['Substorage_mobile_cover'] ."', '".$pictureUrl."', '". $_POST['Substorage_mobile_category'] ."', '". $_POST['Substorage_yard_Substorage_id'] ."', '". $formatId."', '" . $propId . "')";
        
        $status = setData($sql_substorage_yard);
    if($status) {
        header('location: ../index.php?error=none');
      }
      else{
      header("location: ../index.php?error=stmtfailed");
      }
    }