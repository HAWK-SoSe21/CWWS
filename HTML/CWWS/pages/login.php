<?php include_once '../header.php';?>

<div class="main">
    <div class="mainbox">
        <section class="login-form">
            <h2>Login</h2>
            <form action="<?php ROOT ?>/CWWS/PHP/login.inc.php" method="post">
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

<?php include_once '../footer.php'?>