<div class="usercontent">
    <div class="userinfo">
        <?php if(isset($_SESSION['userid'])):?>
            
            <?php $user = getUserById($_SESSION['userid']);?>
            <p class="datenheader">angemeldet als: </p><p class="datenfeld"><?= $user->User_name ?></p>
            <p class="datenheader">ID: </p><p class="datenfeld"><?=$user-> User_id?></p>
            <p class="datenheader">E-Mail: </p><p class="datenfeld"><?= $user-> User_email?></p>
            <!-- <p>Passwort-Hash: <?= $user-> User_password?></p> -->
            <p class="datenheader">Admin: </p><p class="datenfeld"><?php if($user->User_is_admin == 0){echo "nein";} else{echo "ja";}?></p>
            <p class="datenheader">aktiv: </p><p class="datenfeld"><?php if($user->User_is_active == 0){echo "nein";} else{echo "ja";}?></p>
    </div>
    <div class="userbox">
            <?php if($user->User_is_admin):?>
                
                <h3>Nutzerverwaltung:</h3>
                
                    <?php include_once ROOT."/PHP/status.inc.php"?>

                    <?php foreach($users=getusers() as $otheruser):?>
                        <form action="<?= WEBROOT?><?= UV ?>PHP/user.inc.php" method="get">
                            <br>
                            <input type="hidden" name="otheruserid" value="<?=$otheruser->User_id?>">
                        <div class="useradmin">
                            <p class="datenheader">Name:</p><p class="datenfeld"> <?=$otheruser->User_name ?></p><p></p>
                            <p class="datenheader">ID: </p><p class="datenfeld"><?=$otheruser->User_id?></p><p></p>
                            <p class="datenheader">E-Mail: </p><p class="datenfeld"><?=$otheruser->User_email?></p><p></p>
                            <!-- <p>Passwort-Hash:<p>Passwort-Hash: <?=$otheruser-> User_password?></p> -->
                            <p class="datenheader">Admin: </p><p class="datenfeld"><?php if($otheruser->User_is_admin == 0){echo "nein ";} else{echo "ja ";}?></p>
                            <button type="submit" name="toggle_admin_state"><?php if($otheruser->User_is_admin == 0){echo "zum Admin machen";} else{echo "Adminrechte entziehen";}?></button>
                            <p class="datenheader">aktiv: </p><p class="datenfeld"><?php if($otheruser->User_is_active == 0){echo "nein ";} else{echo "ja ";}?></p>
                            <button type="submit" name="toggle_active_state"><?php if($otheruser->User_is_active == 0){echo "aktiv setzen";} else{echo "inaktiv setzen";}?></button>
                            <p></p><button type="submit" name="delete_user">löschen</button>
                        </form>
                    </div>
                    <?php endforeach;?>
 
                <?php else: ?>
                    <br>
                    <br>
                    <p>Um andere Nutzer zu verwalten müssen Sie ein Admin sein.</p>
                <?php endif; ?>        
            
            <?php else: ?>

                <h3>Bitte melden Sie sich für diese Funktion an!</h3>
        <?php endif;?>
    </div>
</div>
<?php
