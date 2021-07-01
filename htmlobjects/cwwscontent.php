<?php if(isset($_SESSION['userid'])):?>


    <div class="maingrid">


        <div id="idsidebar" class="sidebar">
            <ul>
                <header>Funktionen</header>
                <li><a href="<?=$_SERVER['REQUEST_URI'];?>?action=createstorage">Lagerplatz anlegen</a></li>
                <li><a href="<?=$_SERVER['REQUEST_URI'];?>?action=createarticle">Artikel anlegen</a></li>
                <li><a href="<?=$_SERVER['REQUEST_URI'];?>?action=createsubstorage">Sublagerplatz anlegen</a></li>
                <li><a href="<?=$_SERVER['REQUEST_URI'];?>?action=edit">Auswahl bearbeiten</a></li>
            </ul>
        </div>


        <button id="idsidebarbutton" class="sidebarbutton" onclick="togglesidebar()">></button>



        <div class="content">


            <div id="explorer" class="mainbox">

                <?php include_once ROOT.'/htmlobjects/explorerwindow.php'?>

            </div>



            <div id="objekte" class="mainbox">  

                <?php include_once ROOT.'/htmlobjects/objectwindow.php'?>

            </div>




            <div id="funktionen" class="mainbox">

                <?php include_once ROOT.'/htmlobjects/actionwindow.php'?>

            </div>


        </div>
    </div>


<?php else: ?>
    <h3>Für diese Funktion bitte anmelden!</h3>
<?php endif ?>
