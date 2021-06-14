<?php include_once 'header.php';?>

<div class="main">
    <div class="mainbox">
        <section class="login-form">
            <h2>Login</h2>
<<<<<<< Updated upstream:HTML/CWWS/login.php
            <form action="includes/login.inc.php" method="post">
=======
            <form action="<?php ROOT ?>../PHP/login.inc.php" method="post">
>>>>>>> Stashed changes:HTML/CWWS/pages/login.php
                <input type="text" name="uid" placeholder="Email...">
                <input type="password" name="pwd" placeholder="Password...">
                <button type="submit"name="submit">Login</button>
            </form>
            <?php
                if(isset($_GET["error"])){
                    if($_GET["error"]=="emptyinput"){
                        echo"<p>Fill in all fields!</p>";
                    }
                    else if($_GET["error"]=="wronglogin"){
                        echo"<p>Incorrect login information!</p>";
                    }
                }
            ?>
        </section>
    </div>
</div>

<?php include_once 'footer.php'?>