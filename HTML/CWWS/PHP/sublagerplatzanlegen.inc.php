<?php
#erstellt: PHP-Team
#überarbeitet: Nick Heinemann
    include_once '../phpheader.php';

    if(isset($_POST['submit'])) {
        $target_dir = ROOT . "/uploads/sub_storages/";
        $pictureUrl = null;

        if(isset($_FILES["Substorage_picture"]["name"])) {
            $pictureUrl = "/uploads/sub_storages/" . basename($_FILES["Substorage_picture"]["name"]);
            $target_file = $target_dir . basename($_FILES["Substorage_picture"]["name"]);
            $uploadedFilePath = move_uploaded_file($_FILES["Substorage_picture"]["tmp_name"], $target_file);
        }
        $authenticatedUserId = $_SESSION["userid"];
        $modified_date = date('Y-m-d H:i:s');

        $sql_props =    "INSERT INTO    `properties`
                                        (`Properties_name`,
                                        `Properties_description`)
                        VALUES          ('". $_POST['Substorage_name']. "',
                                        '". $_POST['Substorage_description']. "');
                        ";
        $propId = setData($sql_props);
        $sql_last_mod = "INSERT INTO    `last_modified`
                                        (`last_modified_datetime`,
                                        `last_modified_user_id`)
                        VALUES          ('".$modified_date. "',
                                        '".$authenticatedUserId. "');
                        ";
        $last_modID = setData($sql_last_mod);
        $sql_substorage_yard = "INSERT INTO     `substorage_yard`
                                                (`Substorage_picture`,
                                                `Properties_Properties_id`,
                                                `Substorage_quantity`,
                                                `Substorage_category`,
                                                `Storage_yard_Storage_id`,
                                                `last_modified_last_modified_id`)
                                VALUES          ('".$pictureUrl."',
                                                '". $propId."',
                                                '".$_POST["Substorage_quantity"]. "',
                                                '".$_POST["Substorage_category"]. "',
                                                '".$_POST["Storage_yard_Storage_id"]. "',
                                                '". $last_modID."')";
        $status = setData($sql_substorage_yard);

    if($status) {
        header('location: ../index.php?error=none');
      }
      else{
      header("location: ../index.php?error=stmtfailed");
      }
    }