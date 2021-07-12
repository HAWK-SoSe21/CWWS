<?php
#erstellt: PHP-Team
#überarbeitet: Nick Heinemann
    include_once '../phpheader.php';

    if(isset($_POST['submit'])) {

        $target_dir = ROOT . "/uploads/storages/";
        $pictureUrl = "/uploads/storages/" . basename($_FILES["Storage_picture"]["name"]);
        $target_file = $target_dir . basename($_FILES["Storage_picture"]["name"]);
        $uploadedFilePath = move_uploaded_file($_FILES["Storage_picture"]["tmp_name"], $target_file);
        $authenticatedUserId = $_SESSION["userid"];
        $modified_date = date('Y-m-d H:i:s');
        $sql_format = "INSERT INTO  `format`
                                    (`Format_height`,
                                    `Format_width`,
                                    `Format_length`)
                      VALUES        ('". $_POST['Storage_Format_height'] ."',
                                    '". $_POST['Storage_Format_width'] ."',
                                    '". $_POST['Storage_Format_length'] ."');";
        $formatId = setData($sql_format);
        $sql_props =  "INSERT INTO  `properties`
                                    (`Properties_name`,
                                    `Properties_description`)
                      VALUES        ('". $_POST['Storage_name'] ."',
                                    '". $_POST['Storage_description'] ."');";
        $propId = setData($sql_props);
        $sql_usage =  "INSERT INTO  `usage_statistics`()
                      VALUES        ();";
        $usageId = setData($sql_usage);
        $sql_storage_yard =   "INSERT INTO  `storage_yard`
                                          (`Storage_picture`,
                                          `Storage_last_modified`,
                                          `Usage_statistics_idUsage_statistics`, 
                                          `Format_Format_id`,
                                          `Properties_Properties_id`,
                                          `user_User_id`)
                            VALUES        ('".$pictureUrl."',
                                          '".$modified_date."',
                                          '".$usageId."',
                                          '".$formatId."',
                                          '".$propId."',
                                          '".$authenticatedUserId."')";
        $status = setData($sql_storage_yard);
        
        if($status) {
          header('location: ../index.php?error=none');
        }
        else{
        header("location: ../index.php?error=stmtfailed");
        }
    }

    


?>
