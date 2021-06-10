<?php
    if(isset($_POST["submit"])){
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $birthday = $_POST["birthday"];
        $pwd = $_POST["pwd"];
        $pwdrepeat = $_POST["pwdrepeat"];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if(emptyInputSignup($firstname,$lastname,$email,$birthday,$pwd,$pwdrepeat) !== false) {
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
        if(uidExists($conn,$email) !== false) {
            header("location: ../pages/signup.php?error=usernametaken");
            exit();
        }

        createUser($conn,$firstname,$lastname, $email, $birthday, $pwd);
    }
    else{
        header("location: ../pages/signup.php");
        exit();
    }
?>