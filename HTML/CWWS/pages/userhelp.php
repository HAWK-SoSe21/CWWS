<?php include_once '../header.php';?>
    
    <div class="main">
        <div class="mainbox">
            <h3>Nutzername oder Passwort vergessen</h3>    
            <form action="<?= WEBROOT?><?= UV ?>/PHP/userhelp.inc.php" method="post">
                <label for="email">E-Mail:</label>
                <input type="email" name="email" placeholder="beispiel@beispiel.com">
                <button type="submit" name="submit">Rücksetzungslink anfordern</button>
            </form>
            <?php include_once ROOT."/PHP/status.inc.php"?>
        </div>
        
    </div>
    
<?php include_once '../footer.php';?>