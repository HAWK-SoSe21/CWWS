<?php include_once '../header.php';?>

    <div class="main">
        <div class="mainbox">
            <section class="signup-form">
                <h2>Sign Up</h2>
                <form action="<?php ROOT ?>/CWWS/PHP/signup.inc.php" method="post">
                    <input type="text" name="firstname" placeholder="Vorname...">
                    <input type="text" name="lastname" placeholder="Nachname...">
                    <input type="text" name="email" placeholder="Email...">
                    <input type="text" name="birthday" placeholder="Geburtstag...">
                    <input type="password" name="pwd" placeholder="Password...">
                    <input type="password" name="pwdrepeat" placeholder="Repeat password...">
                    <button type="submit"name="submit">Sign Up</button>
                </form>
                <?php
                if(isset($_GET["error"])){
                    if($_GET["error"]=="emptyinput"){
                        echo"<p>Fill in all fields!</p>";
                    }
                    else if($_GET["error"]=="invaliduid"){
                        echo"<p>Choose a proper username!</p>";
                    }
                    else if($_GET["error"]=="invalidemail"){
                        echo"<p>Choose a valif E-Mail!</p>";
                    }
                    else if($_GET["error"]=="passwordsdontmatch"){
                        echo"<p>Passwords don't match!</p>";
                    }
                    else if($_GET["error"]=="usernametaken"){
                        echo"<p>Username already taken!</p>";
                    }
                    else if($_GET["error"]=="stmtfailed"){
                        echo"<p>Something went wrong, try again!</p>";
                    }
                    else if($_GET["error"]=="none"){
                        echo"<p>You have signed up.</p>";
                    }
                }
                ?>
            </section>
        </div>
    </div>

<?php include_once '../footer.php'?>