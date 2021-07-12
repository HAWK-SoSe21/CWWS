<?php include_once '../header.php';?>

<div class="main">
    <div class="mainbox">
        <h3>Anmeldung</h3>
        <section class="login-form">
            
            <form action="<?php ROOT ?>../PHP/login.inc.php" method="post">
                <input type="text" name="uid" placeholder="Nutzername oder Email...">
                <input type="password" name="pwd" placeholder="Passwort...">
                <button type="submit"name="submit">Anmelden</button>
            </form>
            <?php include_once ROOT."/PHP/status.inc.php"?>
        
        </section>
    </div>
    <br>
        <section class="login-form">
            <li>
            <a href="<?php WEBROOT ?><?= UV ?>pages/userhelp.php">
                <p>Nutzername oder Passwort vergessen<ion-icon name="help-circle-outline"></ion-icon></p>    
            </a>
            </li>
        </section>
</div>

<?php include_once '../footer.php'?>