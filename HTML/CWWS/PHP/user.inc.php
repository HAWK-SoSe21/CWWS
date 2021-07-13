<?php
//Autoren: Max Recke, PHP-Team
include_once '../phpheader.php';

try{
    if(isset($_GET["toggle_admin_state"])){
        
        $sql = "UPDATE user SET User_is_admin = !User_is_admin WHERE User_id = {$_GET["otheruserid"]}";
        
        $status = updateData($sql);
        
        if($status){
            $_SESSION["status"]= "Nutzer {$_GET["otheruserid"]} Adminstatus geändert";
            header('location: ../pages/user.php');
            exit();
        }
        else{
            $_SESSION["status"]= "Adminstatus ändern fehlgeschlagen";
            header('location: ../pages/user.php');
            exit();
        }
    }
    if(isset($_GET["toggle_active_state"])){
        
        $sql = "UPDATE user SET User_is_active = !User_is_active WHERE User_id = {$_GET["otheruserid"]}";
        
        $status = updateData($sql);
        
        if($status){
            $_SESSION["status"]= "Nutzer {$_GET["otheruserid"]} Aktivitätsstatus geändert";
            header('location: ../pages/user.php');
            exit();
        }
        else{
            $_SESSION["status"]= "Aktivitätsstatus ändern fehlgeschlagen";
            header('location: ../pages/user.php');
            exit();
        }
    }
    if(isset($_GET["delete_user"])){
        
        $sql = "DELETE FROM user WHERE user.User_id = {$_GET["otheruserid"]}";
        
        $status = updateData($sql);
        
        if($status){
            $_SESSION["status"]= "Nutzer {$_GET["otheruserid"]} gelöscht";
            header('location: ../pages/user.php');
            exit();
        }
        else{
            $_SESSION["status"]= "Nutzer löschen fehlgeschlagen";
            header('location: ../pages/user.php');
            exit();
        }
    }

} catch (Exception $e) {
    echo 'PHP-Fehler: ',  $e->getMessage(), "\n";
}