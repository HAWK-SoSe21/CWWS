<?php include_once '../header.php';?>

    <div class="main">
        <div class="mainbox">

            <h3>Registrierung</h3>
            <section class="signup-form">

                <form action="<?php ROOT ?>../PHP/signup.inc.php" method="post">
                    <input type="text" name="name" placeholder="Nutzer-Name...">
                    <input type="text" name="email" placeholder="Email...">
                    <input type="password" name="pwd" placeholder="Passwort...">
                    <input type="password" name="pwdrepeat" placeholder="Passwort wiederholen...">
                    <button type="submit"name="submit">Registrieren</button>
                </form>
                <?php include_once ROOT."/PHP/status.inc.php"?>
            </section>
        </div>
    </div>

<?php include_once '../footer.php'?>
