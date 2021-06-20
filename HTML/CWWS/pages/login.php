<?php include_once '../header.php';?>

<div class="main">
    <div class="mainbox">
        <section class="login-form">
            <h2>Login</h2>
            <form action="<?php ROOT ?>../PHP/login.inc.php" method="post">
                <input type="text" name="uid" placeholder="Nutzername oder Email...">
                <input type="password" name="pwd" placeholder="Passwort...">
                <button type="submit"name="submit">Login</button>
            </form>
            <?php
                if(isset($_GET["error"])){
                    if($_GET["error"]=="emptyinput"){
                        echo"<p>Ein Feld wurde ausgelassen!</p>";
                    }
                    else if($_GET["error"]=="wronglogin"){
                        echo"<p>Nutzername oder Passwort falsch!</p>";
                    }
                }
            ?>
        </section>
    </div>
</div>

<?php include_once '../footer.php'?>