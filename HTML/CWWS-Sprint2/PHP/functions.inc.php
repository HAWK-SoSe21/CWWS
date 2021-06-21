<?php


    function emptyInputSignup($uid,$email,$pwd,$pwdrepeat){
        $result=false;
        if(empty($uid)||empty($email)||empty($pwd)||empty($pwdrepeat)){
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



    function uidExists($conn,$uid,$email){
        $sql = "SELECT * FROM user WHERE User_email = ? OR User_name = ?;";
        $stmt = mysqli_stmt_init($conn);
        
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../pages/signup.php?error=stmtfailed");
            exit();
        }
    

        mysqli_stmt_bind_param($stmt, "ss",$email,$uid);
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



    function createUser($conn, $uid, $email, $pwd){
        $sql = "INSERT INTO user (User_name,User_email,User_password) VALUES (?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../pages/signup.php?error=stmtfailed");
            exit();
        }
        
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sss",$uid, $email, $hashedPwd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../pages/signup.php?error=none");
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
        $uidExists = uidExists($conn,$username,$username);

        if($uidExists===false){
            header("location: ../pages/login.php?error=wronglogin1");
            exit();
        }
    
        $pwdHashed = $uidExists["User_password"];
        $checkPwd = password_verify($pwd,$pwdHashed);

        if($checkPwd === false) {
            header("location: ../pages/login.php?error=wronglogin2");
            exit();
        }
        else if($checkPwd === true){
            session_start();
            $_SESSION["userid"]=$uidExists["User_name"];
            header("location: ../index.php");
            exit();
        }
    }



    function userinfo(){
        if(isset($_SESSION["userid"])){
            return $_SESSION["userid"];
        }
        else{
            return "nicht angemeldet";
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



    function Lagerplatzanlegen($conn,$Name,$Kategorie,$Beschreibung,$Laenge,$Hoehe,$Breite,$User_User_id){
        $sql = "INSERT INTO storage_yard (Storage_name,Storage_description,Storage_category,Storage_format_heigth,Storage_format_width,Storage_format_length,User_User_id) VALUES (?, ?, ?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../pages/storage.php?error=stmtfailed");
            exit();
        }
        $userid=1;
        if(!mysqli_stmt_bind_param($stmt, "sssssss",$Name, $Beschreibung, $Kategorie, $Hoehe, $Breite, $Laenge,$User_User_id)){
            header("location: ../pages/storage.php?error=bindparamfailed");
        }
        
        if(!mysqli_stmt_execute($stmt)){
            header("location: ../pages/storage.php?error=stmtexecutefailed");
        }
        mysqli_stmt_close($stmt);
        header("location: ../pages/storage.php?error=none");
        exit();
    }



    function getstorages(){
        
        $sql = "SELECT * FROM storage_yard";
        $Storages = getDatas($sql);
        return $Storages;
        
    }



    function getsubstoragesinstorage($Storage){

        $sql = "SELECT * FROM substorage_yard WHERE Storage_yard_Storage_id = $Storage->Storage_id;";
        $Substorages = getDatas($sql);
        return $Substorages;
    }



    function getsubstorages(){

        $sql = "SELECT * FROM substorage_yard";
        $Substorages = getDatas($sql);
        return $Substorages; 
    }



    function getarticles(){

        $sql = "SELECT * FROM articel;";
        $articles = getDatas($sql);
        return $articles;
    }



    function getlagerplatz($conn,$Storage_name){

        $sql = "SELECT * FROM storage_yard WHERE Storage_name ='$Storage_name';";
        $res=mysqli_query($conn, $sql);
        if(!$res){
            
        }
        else{
            return $res;
        }
    }


    
?>