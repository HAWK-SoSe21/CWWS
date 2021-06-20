<?php include_once '../header.php';?>

    <div class="main">
        <div class="mainbox">
            <section class="signup-form">
                <h2>Sign Up</h2>
                <form action="<?php ROOT ?>../PHP/signup.inc.php" method="post">
                    <input type="text" name="uid" placeholder="Nutzer-ID...">
                    <input type="text" name="email" placeholder="Email...">
                    <input type="password" name="pwd" placeholder="Passwort...">
                    <input type="password" name="pwdrepeat" placeholder="Passwort wiederholen...">
                    <button type="submit"name="submit">Sign Up</button>
                </form>
                <?php
                if(isset($_GET["error"])){
                    if($_GET["error"]=="emptyinput"){
                        echo"<p>Ein Feld wurde ausgelassen!</p>";
                    }
                    else if($_GET["error"]=="invaliduid"){
                        echo"<p>Nutzername nicht möglich!</p>";
                    }
                    else if($_GET["error"]=="invalidemail"){
                        echo"<p>Nutze eine valide E-Mailadresse!</p>";
                    }
                    else if($_GET["error"]=="passwordsdontmatch"){
                        echo"<p>Passwörter stimmen nicht überein!</p>";
                    }
                    else if($_GET["error"]=="usernametaken"){
                        echo"<p>Nutzername schon belegt!</p>";
                    }
                    else if($_GET["error"]=="stmtfailed"){
                        echo"<p>Da ist etwas schief gelaufen!</p>";
                    }
                    else if($_GET["error"]=="none"){
                        echo"<p>Signup erfolgreich.</p>";
                    }
                }
                ?>
            </section>
        </div>
    </div>

<?php include_once '../footer.php'?>