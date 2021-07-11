<?php 
    if (isset($_POST["submit"])){
        $username = $_POST["uid"];
        $pwd = $_POST["pwd"];
        if(!isset($_SESSION["loginattempt{$username}"])){
            $_SESSION["loginattempt"]=1;
        }
        
        require_once 'helpers.inc.php';
        require_once 'functions.inc.php';

        if(emptyInputLogin($username,$pwd)!==false){
            session_start();
            $_SESSION["status"]="ein Eingabefeld wurde ausgelassen";
            header("location: ../pages/login.php");
            exit();
        }

        #loginUser($conn,$username,$pwd);

        $uidExists = uidExists($username,$username);

        if($uidExists===false){
            session_start();
            $_SESSION["status"]="Nutzer existiert nicht";
            header("location: ../pages/login.php");
            exit();
        }

        $userisactive = $uidExists->User_is_active;

        if($userisactive==='0'){
            session_start();
            $_SESSION["status"]="Nutzer nicht freigeschaltet";
            header("location: ../pages/login.php");
            exit();
        }

        $pwdHashed = $uidExists->User_password;
        $checkPwd = password_verify($pwd,$pwdHashed);

        if($checkPwd === false){
            session_start();
            $restattempts=3-$_SESSION["loginattempt{$username}"];
            $_SESSION["status"]="falsches Passwort, {$restattempts} Versuch(e) verbleibend";
            $_SESSION["loginattempt{$username}"]++;
            if($_SESSION["loginattempt{$username}"]>3){
                $sql = "UPDATE user SET User_is_active = 0 WHERE User_id = {$uidExists->User_id}";
        
                $status = updateData($sql);
                
                if($status){
                    $_SESSION["status"]= "Nutzer {$uidExists->User_name} wurde gesperrt. Admin kontaktieren zur Entsperrung.";
                }
                else{
                    $_SESSION["status"]= "Aktivitätsstatus ändern fehlgeschlagen";
                }
            }
            header("location: ../pages/login.php");
            exit();
        }
        else if($checkPwd === true){
            session_start();
            $_SESSION["userid"]=$uidExists->User_id;
            $_SESSION["username"]=$uidExists->User_name;
            header("location: ../index.php");
            exit();
        }

    }
    else{
        header("location: ../pages/login.php");
        exit();
    }
?>