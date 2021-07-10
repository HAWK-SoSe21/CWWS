<?php 
    if (isset($_POST["submit"])){
        $username = $_POST["uid"];
        $pwd = $_POST["pwd"];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if(emptyInputLogin($username,$pwd)!==false){
            session_start();
            $_SESSION["status"]="ein Eingabefeld wurde ausgelassen";
            header("location: ../pages/login.php");
            exit();
        }

        #loginUser($conn,$username,$pwd);

        $uidExists = uidExists($conn,$username,$username);

        if($uidExists===false){
            session_start();
            $_SESSION["status"]="Nutzer existiert nicht";
            header("location: ../pages/login.php");
            exit();
        }

        $userisactive = $uidExists["User_is_active"];

        if($userisactive===0){
            session_start();
            $_SESSION["status"]="Nutzer nicht freigeschaltet";
            header("location: ../pages/login.php");
            exit();
        }

        $pwdHashed = $uidExists["User_password"];
        $checkPwd = password_verify($pwd,$pwdHashed);

        if($checkPwd === false) {
            session_start();
            $_SESSION["status"]="falsches Passwort";
            header("location: ../pages/login.php");
            exit();
        }
        else if($checkPwd === true){
            session_start();
            $_SESSION["userid"]=$uidExists["User_id"];
            $_SESSION["username"]=$uidExists["User_name"];
            header("location: ../index.php");
            exit();
        }

    }
    else{
        header("location: ../pages/login.php");
        exit();
    }
?>