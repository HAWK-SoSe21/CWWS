<?php
    if(isset($_POST["submit"])){
        try{
            $name = $_POST["name"];
            $email = $_POST["email"];
            $pwd = $_POST["pwd"];
            $pwdrepeat = $_POST["pwdrepeat"];

            require_once 'helpers.inc.php';
            require_once 'functions.inc.php';

            if(emptyInputSignup($name,$email,$pwd,$pwdrepeat) !== false) {
                session_start();
                $_SESSION["status"]="ein Eingabefeld wurde ausgelassen";
                header("location: ../pages/signup.php");
                exit();
            }
            if(invalidemail($email) !== false) {
                session_start();
                $_SESSION["status"]="keine gültige E-Mail Adresse";
                header("location: ../pages/signup.php");
                exit();
            }
            if(pwdMatch($pwd,$pwdrepeat) === false) {
                session_start();
                $_SESSION["status"]="Passwörter stimmen nicht überein";
                header("location: ../pages/signup.php");
                exit();
            }
            
            $uidExists = uidExists($name,$email);

            if($uidExists){
                session_start();
                $_SESSION["status"]="Nutzername oder E-Mail bereits vergeben";
                header("location: ../pages/signup.php");
                exit();
            }

            #createUser($conn, $name, $email, $pwd);
            
            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
            $User_is_active = 0;
            $User_is_admin = 0;
            $sql = "INSERT INTO user (User_name,User_email,User_password,User_is_admin,User_is_active) 
                    VALUES ('".$name."', '". $email."', '".$hashedPwd. "', '".$User_is_admin. "', '" .$User_is_active. "')";
            $result = setData($sql);
            if($result) {
                session_start();
                $_SESSION["status"]="Nutzer {$name} wurde angelegt";
                header('location: ../pages/signup.php');
            }
            else{
                session_start();
                $_SESSION["status"]="Nutzer {$name} anlegen fehlgeschlagen";
                header('location: ../pages/signup.php');
            }
        }
        catch(Exception $e) {
            session_start();
            $_SESSION["status"]="Hups! Da ist etwas schief gelaufen... {$e->getMessage()}";
            header('location: ../pages/signup.php');
          }
    }
    else{
        header("location: ../pages/signup.php");
        exit();
    }
?>
