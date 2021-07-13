<?php
//Autoren: MAx Recke, PHP-TEAM
try{
    include_once '../phpheader.php';
    if(isset($_POST['submit'])) {
    

        if($_FILES["Articel_group_picture"]['name']){
            $target_dir = ROOT . "/uploads/articlegroups/";
            $pictureUrl = "/uploads/articlegroups/" . basename($_FILES["Articel_group_picture"]["name"]);
            $target_file = $target_dir . basename($_FILES["Articel_group_picture"]["name"]);
            $uploadedFilePath = move_uploaded_file($_FILES["Articel_group_picture"]["tmp_name"], $target_file);
        }
        else{
            $pictureUrl = "/images/article.png";
        }
        
        $authenticatedUserId = $_SESSION["userid"];
        
        $propreties_id = getData("SELECT Properties_Properties_id FROM `articel_group` WHERE `Articel_group_id` = '". $_POST['Articel_group_id'] ."'");
        $sql_props = "UPDATE `properties` 
                      SET    `Properties_name`= '". $_POST['Articel_group_name'] ."' , 
                             `Properties_description`= '". $_POST['Articel_group_description'] ."' 
                      WHERE  `Properties_id` = '". $propreties_id->Properties_Properties_id ."'
                       ";
        $propId = setData($sql_props);

        $modified_date = date('Y-m-d H:i:s');
        $sql_last_mod = "UPDATE last_modified
                         SET   `last_modified_datetime` = '".$modified_date. "' ,
                               `last_modified_user_id` = '".$authenticatedUserId. "'
                         WHERE  `last_modified_id` = '". $_POST['last_modified_last_modified_id'] ."'
                        ";
        $last_modID = setData($sql_last_mod);

        $sql = "UPDATE  `articel_group`
                SET     `Articel_group_picture`='".$pictureUrl."'
                WHERE   `Articel_group_id` = '". $_POST['Articel_group_id'] ."'
                ";
        $status = setData($sql);
        
        if($status){
            $articlegroup =getarticlegroupbyid($status);
            $_SESSION["status"]="Artikelgruppe {$articlegroup->Articel_group_name} wurde bearbeitet";
            header('location: ../index.php?error=0');
        }
        else{
            $_SESSION["status"]="Hups! Da ist etwas schief gelaufen...";
            header('location: ../index.php?error=1');
        }
    }
}
catch(Exception $e) {
  session_start();
  $_SESSION["status"]="Hups! Da ist etwas schief gelaufen... {$e->getMessage()}";
  header('location: ../index.php?error=1');
} 