<div class="mainbox">
    <?php if(isset($_SESSION['userid'])):?>
        
        <?php $user = getUserById($_SESSION['userid']);?>
        <p>angemeldet als: <?= $user->User_name ?></p>
        <p>ID: <?=$user-> User_id?></p>
        <p>E-Mail: <?= $user-> User_email?></p>
        <p>Passwort-Hash: <?= $user-> User_password?></p>
        <p>Admin: <?php if($user->User_is_admin == 0){echo "nein";} else{echo "ja";}?></p>
        <p>aktiv: <?php if($user->User_is_active == 0){echo "nein";} else{echo "ja";}?></p>

        <?php if($user->User_is_admin):?>
            
            <br>
            <br>
            <h3>Nutzerverwaltung:</h3>

            <?php include_once ROOT."/PHP/status.inc.php"?>

            <?php foreach($users=getusers() as $otheruser):?>
                <form action="<?= WEBROOT?><?= UV ?>PHP/user.inc.php" method="get">
                    <br>
                    <input type="hidden" name="otheruserid" value="<?=$otheruser->User_id?>">
                    <p>Name: <?=$otheruser->User_name ?></p>
                    <p>ID: <?=$otheruser->User_id?></p>
                    <p>E-Mail: <?=$otheruser->User_email?></p>
                    <p>Passwort-Hash: <?=$otheruser-> User_password?></p>
                    <p>Admin: <?php if($otheruser->User_is_admin == 0){echo "nein ";} else{echo "ja ";}?>
                    <button type="submit" name="toggle_admin_state"><?php if($otheruser->User_is_admin == 0){echo "zum Admin machen";} else{echo "Adminrechte entziehen";}?></button></p>
                    <p>aktiv: <?php if($otheruser->User_is_active == 0){echo "nein ";} else{echo "ja ";}?>
                    <button type="submit" name="toggle_active_state"><?php if($otheruser->User_is_active == 0){echo "aktiv setzen";} else{echo "inaktiv setzen";}?></button></p>
                    <button type="submit" name="delete_user">löschen</button>
                </form>
            <?php endforeach;?>
        
        <?php else: ?>
            <br>
            <br>
            <p>Um andere Nutzer zu verwalten müssen Sie ein Admin sein.</p>
        <?php endif; ?>        
    
    <?php else: ?>

        <h3>Für diese Funktion bitte anmelden!</h3>

    <?php endif;?>
</div>
<?php

