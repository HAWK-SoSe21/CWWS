<?php
#erstellt: PHP-Team
#überarbeitet: Nick Heinemann
#try{
      include_once '../phpheader.php';
      $authenticatedUserId = $GLOBALS["user"];
      $modified_date = date('Y-m-d H:i:s');

      if(isset($_POST['submit'])) {
        #if($_FILES["Substorage_mobile_picture"]['name']) {
        #  $target_dir = ROOT . "/uploads/sub_storages_fixed/";
        #  $pictureUrl = "/uploads/sub_storages_fixed/" . basename($_FILES["Substorage_mobile_picture"]["name"]);
        #  $target_file = $target_dir . basename($_FILES["Substorage_mobile_picture"]["name"]);
        #  $uploadedFilePath = move_uploaded_file($_FILES["Substorage_mobile_picture"]["tmp_name"], $target_file);
        #  $sql = "UPDATE  `substorage_yard_mobile`
        #          SET     `User_User_id` = '". $authenticatedUserId ."',
        #                  `Substorage_mobile_category` = '". $_POST['Substorage_mobile_category'] ."',
        #                  `Substorage_mobile_cover` = '". $_POST['Substorage_mobile_cover'] ."',
        #                  `Substorage_yard_fixed_Substorage_fixed_id` = '". $_POST['Substorage_yard_Substorage_id'] ."',
        #                  `Substorage_mobile_picture` = '". $pictureUrl ."'
        #          WHERE   `Substorage_mobile_id` = '". $_POST['Substorage_mobile_id'] ."'";
        #} else {
        #}
        if(($_POST['Substorage_yard_mobile_Substorage_mobile_id'])== '0') {
          $sql = "UPDATE  `substorage_yard_mobile`
                SET     `Substorage_mobile_category` = '". $_POST['Substorage_mobile_category'] ."',
                        `Substorage_mobile_cover` = '". $_POST['Substorage_mobile_cover'] ."',
                        `Substorage_mobile_binding` = '". $_POST['Substorage_mobile_binding'] ."',
                        `Substorage_mobile_extracted` = '". $_POST['Substorage_mobile_extracted'] ."',
                        `Substorage_yard_fixed_Substorage_fixed_id` = '". $_POST['Substorage_yard_fixed_Substorage_fixed_id'] ."'
                WHERE   `Substorage_mobile_id` = '". $_POST['Substorage_mobile_id'] ."'";
        } else{
          $sql = "UPDATE  `substorage_yard_mobile`
                SET     `Substorage_mobile_category` = '". $_POST['Substorage_mobile_category'] ."',
                        `Substorage_mobile_cover` = '". $_POST['Substorage_mobile_cover'] ."',
                        `Substorage_mobile_binding` = '". $_POST['Substorage_mobile_binding'] ."',
                        `Substorage_mobile_extracted` = '". $_POST['Substorage_mobile_extracted'] ."',
                        `Substorage_yard_fixed_Substorage_fixed_id` = '". $_POST['Substorage_yard_fixed_Substorage_fixed_id'] ."',
                        `Substorage_yard_mobile_Substorage_mobile_id` = '". $_POST['Substorage_yard_mobile_Substorage_mobile_id'] ."'
                WHERE   `Substorage_mobile_id` = '". $_POST['Substorage_mobile_id'] ."'";
        }

        $propreties_id =  getData(" SELECT Properties_Properties_id
                                    FROM `substorage_yard_mobile`
                                    WHERE `Substorage_mobile_id` = '". $_POST['Substorage_mobile_id'] ."'");
        $format_id =      getData(" SELECT Format_Format_id
                                    FROM `substorage_yard_mobile`
                                    WHERE `Substorage_mobile_id` = '". $_POST['Substorage_mobile_id'] ."'");
        $last_modID =     getData(" SELECT  *
                                    FROM    `substorage_yard_mobile`
                                    WHERE   `Substorage_mobile_id` = '". $_POST['Substorage_mobile_id'] ."'");
        $orderID =        getData(" SELECT  *
                                    FROM    `substorage_yard_mobile`
                                    WHERE   `Substorage_mobile_id` = '". $_POST['Substorage_mobile_id'] ."'");
        
        $sql_prop =    "UPDATE `properties` 
                        SET     `Properties_name` = '". $_POST['Substorage_mobile_name'] ."',
                                `Properties_description` = '" . $_POST['Substorage_mobile_description'] . "'
                        WHERE   `Properties_id` = '". $propreties_id->Properties_Properties_id ."'";
        $sql_format=    "UPDATE `format`
                        SET     `Format_height` = '". $_POST['Format_height'] ."',
                                `Format_width` = '" . $_POST['Format_width'] . "',
                                `Format_length` = '" . $_POST['Format_length'] . "'
                        WHERE `Format_id` = '". $format_id->Format_Format_id ."'";
        $sql_last_mod = "UPDATE   `last_modified`
                        SET       `last_modified_datetime` = '".$modified_date."',
                                  `last_modified_user_id` = '" .$authenticatedUserId. "'
                        WHERE     `last_modified_id` = '". $last_modID->last_modified_last_modified_id ."'";
        $sql_order =    "UPDATE   `order`
                        SET       `order_stackable` = '". $_POST['order_stackable'] ."',
                                  `order_rotateable` = '". $_POST['order_rotateable'] ."'
                        WHERE     `order_id` = '". $orderID->order_order_id ."'";
        
        $status = setData($sql_prop);
        $status = setData($sql_format);
        $status = setData($sql_last_mod);
        $status = setData($sql_order);
        $status = setData($sql);

        if($status) {
          header('location: ../index.php?error=none');
        }
        else{
          header("location: ../index.php?error=stmtfailed");
        }
    }
#}
#catch(Exception $e) {
#    session_start();
#    $_SESSION["status"]="Hups! Da ist etwas schief gelaufen... {$e->getMessage()}";
#    header('location: ../index.php?error=1');
#}  