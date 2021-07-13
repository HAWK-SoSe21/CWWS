<?php
try{
    include_once '../phpheader.php';
    if(isset($_POST['submit'])) {
        $Articel_Articel_id=$_POST["Articel_Articel_id"];
        $Substorage_mobile_id=$_POST["Substorage_mobile_id"];
        $Subarticel_quantity=$_POST["Subarticel_quantity"];
        
        $sql = "SELECT * FROM substorage_yard_mobile WHERE Articel_Articel_id = {$Articel_Articel_id} AND Substorage_mobile_id = {$Substorage_mobile_id} ";
        $Substorage_mobile = getData($sql);
        
        if($Substorage_mobile){
            $sql ="SELECT * FROM subarticel WHERE Articel_Articel_id = {$Articel_Articel_id}";
            $subarticel = getData($sql);
            $newquantity = $subarticel->Subarticel_quantity + $Subarticel_quantity;

            $sql = "UPDATE subarticel SET Subarticel_quantity = {$newquantity} WHERE Articel_Articel_id = {$Articel_Articel_id}";
            $status = updateData($sql);
            if (!$status){
                $_SESSION["status"]="subarticel quantity konnte nicht gesetzt werden 1";
                header('location: ../index.php?error=1');
                exit();
            }
            $object= getarticlebyid($Articel_Articel_id);
            if($Subarticel_quantity>=0){
                $_SESSION["status"]="Artikel: {$object->Articel_name} eingelagert";
            }
            else{
                $_SESSION["status"]="Artikel: {$object->Articel_name} entnommen";
            }

            header('location: ../index.php?error=0');
            exit();
        }
        else{
            if($Subarticel_quantity<0){
                $_SESSION["status"]="Entnahme aus leerem Sublagerplatz nicht möglich";
                header('location: ../index.php?error=1');
                exit();
            }
            else{

                $sql = "UPDATE substorage_yard_mobile SET Articel_Articel_id = {$Articel_Articel_id} WHERE Substorage_mobile_id = {$Substorage_mobile_id}";
                $status = updateData($sql);
                if($status){
                    $sql ="SELECT * FROM subarticel WHERE Articel_Articel_id = {$Articel_Articel_id}";
                    $subarticel = getData($sql);
                    $newquantity = $subarticel->Subarticel_quantity + $Subarticel_quantity; 
                     
                    $sql = "UPDATE subarticel SET Subarticel_quantity = {$newquantity} WHERE Articel_Articel_id = {$Articel_Articel_id}";
                    $status = updateData($sql);
                    if(!$status){
                        $_SESSION["status"]="subarticel quantity konnte nicht gesetzt werden 2";
                        header('location: ../index.php?error=1');
                        exit();
                    }
                    else{
                        $object= getarticlebyid($Articel_Articel_id);
                        $_SESSION["status"]="Artikel: {$object->Articel_name} eingelagert";
                        header('location: ../index.php?error=0');
                        exit();
                    }
                }
                else{
                    $_SESSION["status"]="substorage_yard_mobile.Articel_Articel_id konnte nicht gesetzt werden";
                    header('location: ../index.php?error=1');
                    exit();
                }
            }
        }

    }
    elseif(isset($_POST['clear'])){
        $_SESSION["status"]="Funktion noch nicht implementiert";
        header('location: ../index.php?error=1');
        exit();
    }
    elseif(isset($_POST['temp'])){
        $_SESSION["status"]="Funktion noch nicht implementiert";
        header('location: ../index.php?error=1');
        exit();
    }   
}
catch(Exception $e){
    session_start();
    $_SESSION["status"]="Hups! Da ist etwas schief gelaufen... {$e->getMessage()}";
    header('location: ../index.php?error=1');
}  
