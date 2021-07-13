
<?php //Autoren:Max Recke
    if(isset($_SESSION["status"])):?>
    <p><?=$_SESSION["status"]?></p>
    <?php $_SESSION["status"]=""?>
<?php endif;?>