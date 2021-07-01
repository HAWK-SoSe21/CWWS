<?php
    include_once 'phpheader.php';
?>

<!DOCTYPE html>	
<html>
    <head>
        <meta charset="utf-8" />
        <title>CWWS</title>
        <link rel="stylesheet" href="<?= WEBROOT ?><?= UV ?>CSS/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8"/>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    </head>
    
    <body>
        <div id="header" class="header">
            <div class="navbar">
                <li><a href="<?php WEBROOT ?><?= UV ?>index.php">CWWS</a></li>
                <li><a href="<?php WEBROOT ?><?= UV ?>pages/about.php">Handbuch</a></li>
                
                <?php if(isset($_SESSION["userid"])):?>
                    <li><a href="<?php WEBROOT ?><?= UV ?>PHP/logout.inc.php">Abmelden</a></li>
                
                <?php else: ?>
                    <li><a href="<?php WEBROOT ?><?= UV ?>pages/signup.php">Registrieren</a></li>
                    <li><a href="<?php WEBROOT ?><?= UV ?>pages/login.php">Anmelden</a></li>                   
                <?php endif ?>
            </div>
            
            <div class="infobox">
                <div class="brand">CWWS</div>
                <div class="status">User: <?php echo userinfo();?></div>
            </div>
        </div> 