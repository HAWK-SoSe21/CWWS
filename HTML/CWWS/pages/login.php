<?php include_once '../header.php';?>

<div class="main">
    <div class="mainbox">
        <section class="login-form">
            
            <form action="<?php ROOT ?>../PHP/login.inc.php" method="post">
                <input type="text" name="uid" placeholder="Nutzername oder Email...">
                <input type="password" name="pwd" placeholder="Passwort...">
                <button type="submit"name="submit">Anmelden</button>
            </form>

            <?php include_once ROOT."/PHP/status.inc.php"?>
            
        </section>
    </div>
</div>

<?php include_once '../footer.php'?>