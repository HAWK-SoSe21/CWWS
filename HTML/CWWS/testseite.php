<?php include_once 'header.php';?>

            <div class="main">
                <div class="maingrid">
                        <div id="idsidebar" class="sidebar">
                            <ul>
                               <header>Funktionen</header>
                               <li><a href="#">Lagerplatz anlegen</a></li> 
                               <li><a href="#">Lagerplatz berbeiten</a></li> 
                               <li><a href="#">Artikel anlegen</a></li> 
                               <li><a href="#">Artikel bearbeiten</a></li> 
                            </ul> 
                        </div>
                        <button id="sidebarbtn" class="sidebarbutton" onclick="togglesidebar()">></button>
                        <div class="content">
                            <div class="mainbox"><h3>Funktionen</h3></div>
                            <div class="mainbox">
                                <h3>Explorer</h3>
                                <div class="explorer">
                                    <div class="liste">
                                        <?php
                                            require_once 'includes/dbh.inc.php';
                                            require_once 'includes/functions.inc.php';

                                            explorerliste($conn);
                                        ?>

                                    </div>
                                    <div class="objektfenster">
                                
                                        <?php
                                            
                                                $objekt = getlagerplatz("raum1");
                                               echo '
                                                <div class="lagerplatz">
                                                    <p class="datenheader">Name:</p><p class="datenfeld">'.$objekt['Storage_name'].'</p>
                                                    <p class="datenheader">ID:</p><p class="datenfeld">'.$objekt['Storage_id'].'</p>
                                                    <p class="datenheader">Beschreibung:</p><p class="datenfeld">ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                                                    <p class="datenheader">Kategorie:</p><p class="datenfeld"></p>
                                                    <p class="datenheader">Bild:</p><p class="datenfeld"></p>
                                                    <p class="datenheader">Maße:</p><p class="datenfeld"></p>
                                                    <p class="datenheader">Nutzerliste:</p><p class="datenfeld">Ingo, Stefan, Anne, Angela</p>
                                                </div>
                                               ';
                                            
                                        ?>                                          
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                    
            </div>

<?php include_once 'footer.php';?>