<?php
#Autoren: Max Recke
include_once '../phpheader.php';


if(isset($_POST['submit'])) {
    try{
        $userid = $_POST["userid"];
        $code = $_POST["code"];
        $name = $_POST["name"];
        $pwd = $_POST["pwd"];
        $pwdrepeat = $_POST["pwdrepeat"];

        if(emptyInputReset($name,$pwd,$pwdrepeat) !== false) {
            session_start();
            $_SESSION["status"]="ein Eingabefeld wurde ausgelassen";
            header("location: ../pages/resetaccount.php?userid={$userid}&code={$code}");
            exit();
        }
        
        if(pwdMatch($pwd,$pwdrepeat) === false) {
            session_start();
            $_SESSION["status"]="Passwörter stimmen nicht überein";
            header("location: ../pages/resetaccount.php?userid={$userid}&code={$code}");
            exit();
        }

        if($userid!==$name){
            $uidExists = uidExists($name,$name);
            if($uidExists){
                session_start();
                $_SESSION["status"]="Nutzername bereits vergeben";
                header("location: ../pages/resetaccount.php?userid={$userid}&code={$code}");
                exit();
            }
        }
        
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        $sql = "UPDATE user
                SET User_name = '".$name."', User_password = '".$hashedPwd."' 
                WHERE User_name = '".$userid."'";
                
        $result = updateData($sql);

        if($result) {
            session_start();
            $_SESSION["status"]="Nutzer {$name} wurde geändert";
            header('location: ../pages/login.php');
            exit();
        }
        else{
            session_start();
            $_SESSION["status"]="Nutzer {$name} ändern fehlgeschlagen";
            header("location: ../pages/resetaccount.php?userid={$userid}&code={$code}");
            exit();
        }
    }
    catch(Exception $e) {
        session_start();
        $_SESSION["status"]="Hups! Da ist etwas schief gelaufen... {$e->getMessage()}";
        header("location: ../pages/resetaccount.php?userid={$userid}&code={$code}");
        exit();
      }
}