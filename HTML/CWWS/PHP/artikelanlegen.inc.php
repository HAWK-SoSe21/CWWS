<?php
try{
    include_once '../phpheader.php';
    if(isset($_POST['submit'])) {
    

        if(isset($_POST["Articel_picture"])){
            $target_dir = ROOT . "/uploads/articles/";
            $pictureUrl = "/uploads/articles/" . basename($_FILES["Articel_picture"]["name"]);
            $target_file = $target_dir . basename($_FILES["Articel_picture"]["name"]);
            $uploadedFilePath = move_uploaded_file($_FILES["Articel_picture"]["tmp_name"], $target_file);
        }
        else{
            $pictureUrl = "/images/article.png";
        }
        
        $authenticatedUserId = $_SESSION["userid"];

        $sql_props = "INSERT INTO `properties`(`Properties_name`, `Properties_description`) 
                      VALUES ('". $_POST['Articel_name'] ."', '". $_POST['Articel_description'] ."')";
        $propId = setData($sql_props);

        $sql_format = "INSERT INTO `format` (`Format_height`, `Format_width`, `Format_length`) 
                       VALUES ('". $_POST['Articel_format_height'] ."',
                               '". $_POST['Articel_format_width'] ."',
                               '". $_POST['Articel_format_length'] ."')";
        $formatId = setData($sql_format);

        $sql_order = "INSERT INTO   order
                                    (order_stackable,
                                    order_rotateable)
                      VALUES      ('". $_POST['Articel_stackable'] ."',
                                    '". $_POST['Articel_rotatable'] ."')";
        $orderID = setData($sql_order);


        $modified_date = date('Y-m-d H:i:s');
        // $sql_last_mod = "INSERT INTO    last_modified
        //                                 (last_modified_datetime,
        //                                 last_modified_user_id)
        //                 VALUES          ('".$modified_date. "',
        //                                 '".$authenticatedUserId. "')
        //                 ";
        // $last_mod_id = setData($sql_last_mod);

        $sql_usage = "INSERT INTO `usage_statistics`(Usage_statistics_number_of_accesses, Usage_statistics_last_modified) VALUES ('".'0'."','".$modified_date."');";
        $usageId = setData($sql_usage);

        $sql = "INSERT INTO `articel`
                            (`Articel_picture`,
                            `Properties_Properties_id`, 
                            `Articel_expiry`,  
                            `Format_Format_id`, 
                            `Substorage_yard_Substorage_mobile_id`, 
                            `User_User_id`,
                            `order_order_id`,
                            `Usage_statistics_Usage_statistics_id`) 
                VALUES ('".$pictureUrl."', 
                        '". $propId."', 
                        '".$_POST["Articel_expiry"]. "', 
                        '" . $formatId . "', 
                        '".$_POST["Substorage_yard_Substorage_mobile_id"]. "', 
                        '".$authenticatedUserId. "',
                        '".$orderID. "',
                        '".$usageId. "')";
        $status = setData($sql);
        
        if($status){
            
            $article= getarticlebyid($status);
            if(isset($_POST["Articel_alias"])){
                $sql_aliase = "INSERT INTO `aliase` (`aliase1`,`Articel_Articel_id`) 
                       VALUES ('". $_POST['Articel_alias'] ."','". $article->Articel_id ."')";
                $aliasid = setData($sql_aliase);
            }
            session_start();
            $_SESSION["status"]="Artikel {$article->Articel_name} wurde angelegt";
            header('location: ../index.php');
        }
        else{
            session_start();
            $_SESSION["status"]="Hups! Da ist etwas schief gelaufen... {$e->getMessage()}";
            header('location: ../index.php');
        }
    }
}  
catch(Exception $e) {
    session_start();
    $_SESSION["status"]="Hups! Da ist etwas schief gelaufen... {$e->getMessage()}";
    header('location: ../index.php');
}  