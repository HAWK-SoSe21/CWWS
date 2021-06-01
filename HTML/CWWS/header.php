<?php
    session_start();
?>
<!DOCTYPE html>	
<html>
    <head>
        <meta charset="utf-8" />
        <title>Page Title</title>
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8"/>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    </head>
    
    <body>
        <div class="header">
            <div class="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="storage.php">Lager</a></li>
                <li><a href="preferences.php">Einstellungen</a></li>
                <li><a href="about.php">Handbuch</a></li>
                <li><a href="testseite.php">Testseite</a></li>
                <?php
                        if(isset($_SESSION["userid"])){
                            echo "<li><a href="."user.php".">Account</a></li>";
                            echo "<li><a href="."includes/logout.inc.php".">Log out</a></li>";
                        }
                        else{
                            echo "<li><a href="."signup.php".">Sign up</a></li>";
                            echo "<li><a href="."login.php".">Log in</a></li>";
                        }                    
                    ?>
            </div>
            
            <div class="infobox">
                <div class="brand">CWWS</div>
                <div class="status">User:<?php include_once 'includes/functions.inc.php'; echo userinfo();?></div>
             </div>
        </div> 