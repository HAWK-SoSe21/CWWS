<?php
    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];
        $pwdrepeat = $_POST["pwdrepeat"];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if(emptyInputSignup($name,$email,$pwd,$pwdrepeat) !== false) {
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

        createUser($conn, $name, $email, $pwd);
    }
    else{
        header("location: ../pages/signup.php");
        exit();
    }
?>
