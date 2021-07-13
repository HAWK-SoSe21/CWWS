<!-- Autoren: Frank Guane Bi -->
<?php include_once 'header.php';?>

            <div class="main">
                <?php if(isset($_SESSION["userid"])):?>

                    <?php include_once ROOT.'/htmlobjects/cwwscontent.php'?>

                <?php else:?>

                    <div class="mainbox">

                        <h3>Willkommen beim CWWS</h3>
                        <p>Bitte melden Sie sich an um das System zu nutzen.</p>
                    </div>

                <?php endif?>
            </div>

<?php include_once 'footer.php';?>
