<?php
    function emptyInputSignup($name,$email,$username,$pwd,$pwdrepeat){
        $result=false;
        if(empty($name)||empty($email)||empty($username)||empty($pwd)||empty($pwdrepeat)){
            $result= TRUE;
        }
        else{
            $result= FALSE;
        }
        return $result;
    }

    function invalidUid($username){
        $result=false;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            $result= TRUE;
        }
        else{
            $result= FALSE;
        }
        return $result;
    }

    function invalidemail($email){
        $result=false;
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $result= TRUE;
        }
        else{
            $result= FALSE;
        }
        return $result;
    }

    function pwdMatch($pwd,$pwdrepeat){
        $result=false;
        if($pwdrepeat!==$pwd){
            $result= TRUE;
        }
        else{
            $result= FALSE;
        }
        return $result;
    }

    function uidExists($conn,$email){
        $sql = "SELECT * FROM user WHERE User_email = ?;";
        $stmt = mysqli_stmt_init($conn);
        
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }
    

        mysqli_stmt_bind_param($stmt, "s",$email);
        mysqli_stmt_execute($stmt);

        $resultData =mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }
        else{
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    function createUser($conn, $firstname, $lastname, $email, $birthday, $pwd){
        $sql = "INSERT INTO user (User_first_name,User_second_name,User_email,User_birthday,User_password) VALUES (?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }
        
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sssss",$firstname, $lastname, $email, $birthday, $hashedPwd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../signup.php?error=none");
        exit();
    }

    function emptyInputLogin($username,$pwd){
        $result=false;
        if(empty($username)||empty($pwd)){
            $result= TRUE;
        }
        else{
            $result= FALSE;
        }
        return $result;
    }

    function loginUser($conn,$username,$pwd){
        $uidExists = uidExists($conn,$username);

        if($uidExists===false){
            header("location: ../login.php?error=wronglogin");
            exit();
        }
    
        $pwdHashed = $uidExists["User_password"];
        $checkPwd = password_verify($pwd,$pwdHashed);

        if($checkPwd === false) {
            header("location: ../login.php?error=wronglogin");

            exit();
        }
        else if($checkPwd === true){
            session_start();
            $_SESSION["userid"]=$uidExists["User_id"];
            $_SESSION["username"]=$uidExists["User_first_name"];
            header("location: ../index.php");
            exit();
        }
    }

    function userinfo(){
        if(isset($_SESSION["userid"])){
            return $_SESSION["username"];
        }
        else{
            return "not logged in";
        }   
    }

    function emptyInputLagerplatzanlegen($Name,$Kategorie,$Beschreibung,$Laenge,$Hoehe,$Breite){
        $result=false;
        if(empty($Name)||empty($Kategorie)||empty($Beschreibung)||empty($Laenge)||empty($Hoehe)||empty($Breite)){
            $result= TRUE;
        }
        else{
            $result= FALSE;
        }
        return $result;
    }

    function Lagerplatzanlegen($conn,$Name,$Kategorie,$Beschreibung,$Laenge,$Hoehe,$Breite){
        $sql = "INSERT INTO storage_yard (Storage_name,Storage_description,Storage_category,Storage_format_heigth,Storage_format_width,Storage_format_length) VALUES (?, ?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../storage.php?error=stmtfailed");
            exit();
        }
        
        mysqli_stmt_bind_param($stmt, "ssssss",$Name, $Beschreibung, $Kategorie, $Hoehe, $Breite, $Laenge);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../storage.php?error=none");
        exit();
    }
?>