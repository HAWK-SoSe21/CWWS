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



    function uidExists($uid,$email){
        $sql = "SELECT * FROM user WHERE User_email = '".$email."' OR User_name = '".$uid."';";
        $result = getData($sql);

        if($result){
            return $result;
        }
        else{
            $result = false;
            return $result;
        }
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



    function userinfo(){
        if(isset($_SESSION["userid"])){
            return $_SESSION["username"];
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



    function getstorages(){
        $sql = "SELECT *, properties.Properties_name as Storage_name, properties.Properties_description as Storage_description  FROM storage_yard, properties WHERE storage_yard.Properties_Properties_id = properties.Properties_id;";
        $Storages = getDatas($sql);
        return $Storages;

    }



    function getsubstoragesinstorage($Storage){

        $sql = "SELECT * FROM substorage_yard WHERE Storage_yard_Storage_id = $Storage->Storage_id;";
        $Substorages = getDatas($sql);
        return $Substorages;
    }

    function getsubstoragesinroom($Storage){

    }

    function getfixedubstoragesinsubstorage($substorage){

    }

    function getsubstorages(){

        $sql = "SELECT *, properties.Properties_name as Substorage_name, properties.Properties_description as Substorage_description  FROM substorage_yard, properties WHERE substorage_yard.Properties_Properties_id = properties.Properties_id;";
        $Substorages = getDatas($sql);
        return $Substorages;
    }

    

    function getsubstoragesfixed(){

        $sql = "SELECT *, properties.Properties_name as Substorage_name, properties.Properties_description as Substorage_description  FROM substorage_yard_fixed, properties WHERE substorage_yard_fixed.Properties_Properties_id = properties.Properties_id;";
        $SubstoragesFixed = getDatas($sql);
        return $SubstoragesFixed;
    }

    function getarticles(){

        $sql = "SELECT *, properties.Properties_name as articel_name, properties.Properties_description as articel_description  FROM articel, properties WHERE articel.Properties_Properties_id = properties.Properties_id;";
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


    function getformates(){
        $sql = "SELECT * FROM format;";
        $articles = getDatas($sql);
        return $articles;
    }


    function getproperties(){
        $sql = "SELECT * FROM format;";
        $articles = getDatas($sql);
        return $articles;
    }

    function getmobilesubstorages(){
        $sql = "SELECT *, properties.Properties_name as Substorage_mobile_name, properties.Properties_description as Substorage_mobile_description  FROM substorage_yard_mobile, properties WHERE substorage_yard_mobile.Properties_Properties_id = properties.Properties_id;";
        $Storages = getDatas($sql);
        return $Storages;
    }

    function getfixedsubstorages(){
        $sql = "SELECT *, properties.Properties_name as Substorage_fixed_name, properties.Properties_description as Substorage_fixed_description  FROM substorage_yard_fixed, properties WHERE substorage_yard_fixed.Properties_Properties_id = properties.Properties_id;";
        $Storages = getDatas($sql);
        return $Storages;
    }

    function getarticlegroups(){
        $sql = "SELECT *, properties.Properties_name as Articel_group_name, properties.Properties_description as Articel_group_description  FROM articel_group, properties WHERE Articel_group.Properties_Properties_id = properties.Properties_id;";
        $Articles = getDatas($sql);
        return $Articles;
    }

    function getsubarticles(){
        $sql = "SELECT * FROM subarticel;";
        $subarticles = getDatas($sql);
        return $subarticles;
    }

    function getUserById($id) {
        $sql = "SELECT * FROM user WHERE User_id = ${id};";
        $user = getData($sql);
        return $user;
    }
    function getusers(){
        $sql = "SELECT * FROM user;";
        $user = getDatas($sql);
        return $user;
    }



?>
