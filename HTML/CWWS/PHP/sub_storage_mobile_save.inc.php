<?php
#erstellt: PHP-Team
#überarbeitet: Nick Heinemann
    include_once '../phpheader.php';


    if(isset($_POST['submit'])) {
        #$target_dir = ROOT . "/uploads/sub_storages_mobile/";
        #$pictureUrl = null;

        #if(isset($_FILES["Substorage_mobile_picture"]["name"])) {
        #    $pictureUrl = "/uploads/sub_storages_fixed/" . basename($_FILES["Substorage_mobile_picture"]["name"]);
        #    $target_file = $target_dir . basename($_FILES["Substorage_mobile_picture"]["name"]);
        #    $uploadedFilePath = move_uploaded_file($_FILES["Substorage_mobile_picture"]["tmp_name"], $target_file);
        #}
        $authenticatedUserId = $_SESSION["userid"];
        $modified_date = date('Y-m-d H:i:s');

        $sql_props =    "INSERT INTO    `properties`
                                        (`Properties_name`,
                                        `Properties_description`)
                        VALUES          ('". $_POST['Substorage_mobile_name'] ."',
                                        '". $_POST['Substorage_mobile_description'] ."');";
        $propId = setData($sql_props);
        $sql_format =   "INSERT INTO    `format`
                                        (`Format_height`,
                                        `Format_width`,
                                        `Format_length`)
                        VALUES          ('". $_POST['Format_height'] ."',
                                        '". $_POST['Format_width'] ."',
                                        '". $_POST['Format_length'] ."')";
        $formatId = setData($sql_format);
        $sql_last_mod = "INSERT INTO    `last_modified`
                                        (`last_modified_datetime`,
                                        `last_modified_user_id`)
                        VALUES          ('".$modified_date. "',
                                        '".$authenticatedUserId. "')
                        ";
        $last_modID = setData($sql_last_mod);
        $sql_order = "INSERT INTO   `order`
                                    (`order_stackable`,
                                    `order_rotateable`)
                        VALUES      ('". $_POST['order_stackable'] ."',
                                    '". $_POST['order_rotateable'] ."')
                        ";
        $orderID = setData($sql_order);
        if(is_null($_POST['Substorage_yard_mobile_Substorage_mobile_id'])) {
            $sql_substorage_yard = "INSERT INTO `substorage_yard_mobile`
                                                (`Substorage_mobile_cover`,
                                                `Substorage_mobile_category`,
                                                `Substorage_mobile_binding`,
                                                `Substorage_mobile_extracted`,
                                                `Substorage_yard_fixed_Substorage_fixed_id`,
                                                `Substorage_yard_mobile_Substorage_mobile_id`,
                                                `Format_Format_id`,
                                                `Properties_Properties_id`,
                                                `last_modified_last_modified_id`,
                                                `order_order_id`)
                                    VALUES      ('". $_POST['Substorage_mobile_cover'] ."',
                                                '". $_POST['Substorage_mobile_category'] ."',
                                                '". $_POST['Substorage_mobile_binding'] ."',
                                                '". $_POST['Substorage_mobile_extracted'] ."',
                                                '". $_POST['Substorage_yard_fixed_Substorage_fixed_id'] ."',
                                                '". $_POST['Substorage_yard_mobile_Substorage_mobile_id'] ."',
                                                '". $formatId."',
                                                '" . $propId . "',
                                                '". $last_modID."',
                                                '". $orderID ."')
                                    ";
        } else{
            $sql_substorage_yard = "INSERT INTO `substorage_yard_mobile`
                                                (`Substorage_mobile_cover`,
                                                `Substorage_mobile_category`,
                                                `Substorage_mobile_binding`,
                                                `Substorage_mobile_extracted`,
                                                `Substorage_yard_fixed_Substorage_fixed_id`,
                                                `Format_Format_id`,
                                                `Properties_Properties_id`,
                                                `last_modified_last_modified_id`,
                                                `order_order_id`)
                                    VALUES      ('". $_POST['Substorage_mobile_cover'] ."',
                                                '". $_POST['Substorage_mobile_category'] ."',
                                                '". $_POST['Substorage_mobile_binding'] ."',
                                                '". $_POST['Substorage_mobile_extracted'] ."',
                                                '". $_POST['Substorage_yard_fixed_Substorage_fixed_id'] ."',
                                                '". $formatId."',
                                                '" . $propId . "',
                                                '". $last_modID."',
                                                '". $orderID ."')
                                    ";
        }
        $status = setData($sql_substorage_yard);

    if($status) {
        header('location: ../index.php?error=none');
      }
      else{
      header("location: ../index.php?error=stmtfailed");
      }
    }
