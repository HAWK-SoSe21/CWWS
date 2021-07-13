<?php
    include_once 'phpheader.php';
?>

<!DOCTYPE html>	
<html><!-- Autoren: Frnak Guane Bi, Daniel Weber -->
    <head>
        <meta charset="utf-8" />
        <title>CWWS</title>
        <link rel="stylesheet" href="<?= WEBROOT ?><?= UV ?>CSS/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8"/>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    </head>
    
    <body>
        <div id="header" class="header">
             <div class="infobox">
                <div class="brand">CWWS</div>
                <div class="userleiste">
                    <?php if(isset($_SESSION["userid"])):?>  
                            
                            <div class="status"> 
                                <ion-icon name="person-circle-outline"></ion-icon>
                                <div class="infobox-name">User: <?php echo userinfo();?>
                                </div>
                            </div>

                            <li><a href="<?php WEBROOT ?><?= UV ?>PHP/logout.inc.php">
                                <ion-icon name="log-out"></ion-icon>  
                                <div class="infobox-name">Abmelden</div>
                            </a></li>
                    <?php else: ?>
                            <li><a href="<?php WEBROOT ?><?= UV ?>pages/signup.php"> 
                                <ion-icon name="pencil"></ion-icon>
                                <div class="infobox-name">Registrieren</div>
                            </a></li>
                            <li><a href="<?php WEBROOT ?><?= UV ?>pages/login.php">
                                <ion-icon name="log-in"></ion-icon> 
                                <div class="infobox-name">Anmelden</div>
                            </a></li>
                    <?php endif ?>
                </div>   
            </div>


            <div class="navbar">
                <li><a href="<?php WEBROOT ?><?= UV ?>index.php">
                    <ion-icon name="albums"></ion-icon>
                    <div class="navbar-name">CWWS</div>
                </a></li>

                <li><a href="<?php WEBROOT ?><?= UV ?>pages/about.php">
                    <ion-icon name="book"></ion-icon>
                    <div class="navbar-name">Handbuch</div>
                </a></li>

                <li><a href="<?php WEBROOT ?><?= UV ?>pages/user.php">
                    <ion-icon name="people"></ion-icon>
                    <div class="navbar-name">User</div>
                </a></li>
            </div>
            <div class="tabs">
            </div>
        </div> 