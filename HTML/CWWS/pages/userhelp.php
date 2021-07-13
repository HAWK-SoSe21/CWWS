<?php include_once '../header.php';?>
    
    <div class="main">
        <div class="mainbox">
            <h3>Nutzername oder Passwort vergessen?</h3>    
                <form action="<?= WEBROOT?><?= UV ?>/PHP/userhelp.inc.php" method="post">
                <div class="userloggedin">
                    <label for="email">E-Mail:</label>
                    <input type="email" name="email" placeholder="beispiel@beispiel.com">
                    <p></p>
                <button type="submit" name="submit">Rücksetzungslink anfordern</button>
                </div>
                <br>
                </form>
                <?php if(isset($_SESSION["status"])):?>
                    <?php if($_SESSION["status"]==="Ein Rücksetzungslink wurde an Ihre E-Mail versandt."):?>
                        <li><a href="<?= $_SESSION["url_passwordcode"]?>">Link zum Rücksetzen weil kein E-Mail-Server im Localhost</a></li>
                    <?php endif?>    
                <?php endif?>
            <?php include_once ROOT."/PHP/status.inc.php"?>
        </div>
        
    </div>
    
<?php include_once '../footer.php';?>