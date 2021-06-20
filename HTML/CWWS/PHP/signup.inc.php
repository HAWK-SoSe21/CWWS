<?php
    if(isset($_POST["submit"])){
        $uid = $_POST["uid"];
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];
        $pwdrepeat = $_POST["pwdrepeat"];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if(emptyInputSignup($uid,$email,$pwd,$pwdrepeat) !== false) {
            header("location: ../pages/signup.php?error=emptyinput");
            exit();
        }
        if(invalidemail($email) !== false) {
            header("location: ../pages/signup.php?error=invalidemail");
            exit();
        }
        if(pwdMatch($pwd,$pwdrepeat) !== false) {
            header("location: ../pages/signup.php?error=passwordsdontmatch");
            exit();
        }
        if(uidExists($conn, $uid, $email) !== false) {
            header("location: ../pages/signup.php?error=usernametaken");
            exit();
        }

        createUser($conn, $uid, $email, $pwd);
    }
    else{
        header("location: ../pages/signup.php");
        exit();
    }
?>