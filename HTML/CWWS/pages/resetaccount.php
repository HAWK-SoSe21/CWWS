<?php include_once '../header.php';?>
    
    <div class="main">
        <div class="mainbox">
            <?php if(isset($_GET['userid']) and isset($_GET["code"])):?>
                <?php 
                    $usertoreset = uidExists($_GET['userid'],$_GET['userid']);
                ?>
                <?php if($usertoreset===false):?> 
                    <?php include_once ROOT."/htmlobjects/linkfail.php"?>
                <?php else:?>
                   <?php 
                        $checkPwd = pwdMatch($_GET["code"],$usertoreset->User_password);
                    ?> 
                    <?php if($checkPwd === false):?>
                        <?php include_once ROOT."/htmlobjects/linkfail.php"?>
                    <?php else:?>
                        
                        <h3>Nutzer bearbeiten:</h3>
                        <br>  
                        <form action="<?= WEBROOT?><?= UV ?>PHP/resetaccount.inc.php" method="post">
                            <input type="hidden" name="userid" value="<?=$_GET["userid"]?>">
                            <input type="hidden" name="code" value="<?=$_GET["code"]?>">
                            <input type="text" name="name" value="<?=$usertoreset->User_name?>">
                            <input type="password" name="pwd" placeholder="neues Passwort...">
                            <input type="password" name="pwdrepeat" placeholder="neues Passwort wiederholen...">
                            <button type="submit"name="submit">Änderungen übernehmen</button>
                        </form>
                        <?php include_once ROOT."/PHP/status.inc.php"?>
                    <?php endif?>
                <?php endif?>
            <?php else:?>
                <p>Diese Funktion funktioniert nur über einen Rücksetzlink.</p>
                <img src="../images/hackerman.jpg" alt="Hallo Hackerman">
            <?php endif?>
        </div>
        
    </div>
    
<?php include_once '../footer.php';?>