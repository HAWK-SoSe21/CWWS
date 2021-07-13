<?php
try{
    include_once '../phpheader.php';
    if(isset($_POST['submit'])) {
    

        if(isset($_POST["Articel_group_picture"])){
            $target_dir = ROOT . "/uploads/articlegroups/";
            $pictureUrl = "/uploads/articlegroups/" . basename($_FILES["Articel_group_picture"]["name"]);
            $target_file = $target_dir . basename($_FILES["Articel_group_picture"]["name"]);
            $uploadedFilePath = move_uploaded_file($_FILES["Articel_group_picture"]["tmp_name"], $target_file);
        }
        else{
            $pictureUrl = "/images/article.png";
        }
        
        $authenticatedUserId = $_SESSION["userid"];

        $sql_props = "INSERT INTO `properties`(`Properties_name`, `Properties_description`) 
                      VALUES ('". $_POST['Articel_group_name'] ."', '". $_POST['Articel_group_description'] ."')";
        $propId = setData($sql_props);

        $modified_date = date('Y-m-d H:i:s');
        $sql_last_mod = "INSERT INTO    `last_modified`
                                        (`last_modified_datetime`,
                                        `last_modified_user_id`)
                        VALUES          ('".$modified_date. "',
                                        '".$authenticatedUserId. "');
                        ";
        $last_modID = setData($sql_last_mod);

        $sql = "INSERT INTO `articel_group`
                            (`Articel_group_picture`,
                            `last_modified_last_modified_id`, 
                            `Properties_Properties_id`) 
                VALUES ('".$pictureUrl."', 
                        '".$last_modID."', 
                        '".$propId."')";
        $status = setData($sql);
        
        if($status){
            $articlegroup =getarticlegroupbyid($status);
            $_SESSION["status"]="Artikelgruppe {$articlegroup->Articel_group_name} wurde angelegt";
            header('location: ../index.php?error=0');
        }
        else{
            $_SESSION["status"]="Hups! Da ist etwas schief gelaufen... {$e->getMessage()}";
            header('location: ../index.php?error=1');
        }
    }
}  
catch(Exception $e) {
    $_SESSION["status"]="Hups! Da ist etwas schief gelaufen... {$e->getMessage()}";
    header('location: ../index.php?error=1');
}  