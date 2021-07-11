
    
    <h1>Passwort oder Nutzername vergessen</h1>
    Gib hier deine E-Mail-Adresse ein, um einen Rücksetzungslink anzufordern.<br><br>
    
    <form action="<?= WEBROOT?><?= UV ?>PHP/userhelp.inc.php" method="post">
    E-Mail:<br>
    <input type="email" name="email" value="<?php echo isset($_POST['email']) ? htmlentities($_POST['email']) : ''; ?>"><br>
    <input type="submit" value="Abschicken">
    </form>