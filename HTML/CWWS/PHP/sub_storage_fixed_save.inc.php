<?php
#erstellt: PHP-Team
#überarbeitet: Nick Heinemann
    include_once '../phpheader.php';

    if(isset($_POST['submit'])) {
        #$target_dir = ROOT . "/uploads/sub_storages_fixed/";
        #$pictureUrl = null;

        #if(isset($_FILES["Substorage_fixed_picture"]["name"])) {
            #$pictureUrl = "/uploads/sub_storages_fixed/" . basename($_FILES["Substorage_fixed_picture"]["name"]);
            #$target_file = $target_dir . basename($_FILES["Substorage_fixed_picture"]["name"]);
            #$uploadedFilePath = move_uploaded_file($_FILES["Substorage_fixed_picture"]["tmp_name"], $target_file);
        #}
        $authenticatedUserId = $_SESSION["userid"];
        $modified_date = date('Y-m-d H:i:s');

        $sql_props =    "INSERT INTO    `properties`
                                        (`Properties_name`,
                                        `Properties_description`)
                        VALUES          ('". $_POST['Substorage_fixed_name'] ."',
                                        '". $_POST['Substorage_fixed_description'] ."');";
        $propId = setData($sql_props);
        $sql_format =   "INSERT INTO    `format`
                                        (`Format_height`,
                                        `Format_width`,
                                        `Format_length`)
                        VALUES          ('". $_POST['Substorage_fixed_Format_height'] ."',
                                        '". $_POST['Substorage_fixed_Format_width'] ."',
                                        '". $_POST['Substorage_fixed_Format_length'] ."')";
        $formatId = setData($sql_format);
        $sql_last_mod = "INSERT INTO    `last_modified`
                                        (`last_modified_datetime`,
                                        `last_modified_user_id`)
                        VALUES          ('".$modified_date. "',
                                        '".$authenticatedUserId. "');
                        ";
        $last_modID = setData($sql_last_mod);
        $sql_substorage_yard =  "INSERT INTO    `substorage_yard_fixed`
                                                (`Properties_Properties_id`,
                                                `Substorage_fixed_category`,
                                                `Substorage_yard_Substorage_id`,
                                                `Format_Format_id`,
                                                `last_modified_last_modified_id`)
                                VALUES          ('". $propId."',
                                                '".$_POST["Substorage_fixed_category"]. "',
                                                '".$_POST["Substorage_yard_Substorage_id"]. "',
                                                '" . $formatId . "',
                                                '". $last_modID."')";
        $status = setData($sql_substorage_yard);
    if($status) {
        header('location: ../index.php?error=none');
      }
      else{
      header("location: ../index.php?error=stmtfailed");
      }
    }
