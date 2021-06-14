<?php
    define("WEBROOT", 'http://localhost/CWWS');
    define("ROOT", $_SERVER['DOCUMENT_ROOT'] . '/CWWS');

    $GLOBALS["user"] = null;
    session_start();

    if(isset($_SESSION["userid"])){
        $GLOBALS["user"] = $_SESSION["userid"];
    }

    include_once ROOT.'/PHP/functions.inc.php';
    include_once ROOT.'/PHP/dbh.inc.php';
    include_once ROOT.'/PHP/helpers.inc.php';
?>

<!DOCTYPE html>	
<html>
    <head>
        <meta charset="utf-8" />
        <title>CWWS</title>
        <link rel="stylesheet" href="<?= WEBROOT ?>/CSS/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8"/>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    </head>
    
    <body>
        <div id="header" class="header">
            <div class="navbar">
                <li><a href="<?php WEBROOT ?>/CWWS/index.php">CWWS</a></li>
                <li><a href="<?php WEBROOT ?>/CWWS/pages/testseite.php">Testseite</a></li>
                <li><a href="<?php WEBROOT ?>/CWWS/pages/about.php">Handbuch</a></li>
                <?php
                        if(isset($_SESSION["userid"])){
                            echo "<li><a href=".WEBROOT."/PHP/logout.inc.php".">Log out</a></li>";
                        }
                        else{
                            echo "<li><a href=".WEBROOT."/pages/signup.php".">Sign up</a></li>";
                            echo "<li><a href=".WEBROOT."/pages/login.php".">Log in</a></li>";
                        }                    
                    ?>
            </div>
            
            <div class="infobox">
                <div class="brand">CWWS</div>
                <div class="status">User: <?php echo userinfo();?></div>
            </div>
        </div> 