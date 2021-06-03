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
                                            require_once 'includes/dbh.inc.php';
                                            require_once 'includes/functions.inc.php';
                                            $objektarray = mysqli_fetch_array(getlagerplatz($conn,"raum1"));
                                            echo '
                                            <div class="lagerplatz">
                                                <p class="datenheader">Name:</p><p class="datenfeld">'.$objektarray['Storage_name'].'</p>
                                                <p class="datenheader">ID:</p><p class="datenfeld">'.$objektarray['Storage_id'].'</p>
                                                <p class="datenheader">Beschreibung:</p><p class="datenfeld">'.$objektarray['Storage_description'].'</p>
                                                <p class="datenheader">Kategorie:</p><p class="datenfeld">'.$objektarray['Storage_category'].'</p>
                                                <p class="datenheader">Bild:</p><p class="datenfeld">'.$objektarray['Storage_id'].'</p>
                                                <p class="datenheader">Maße:</p><p class="datenfeld">'.$objektarray['Storage_format_length'].'m x '.$objektarray['Storage_format_width'].'m x '.$objektarray['Storage_format_heigth'].'m</p>
                                                <p class="datenheader">Nutzerliste:</p><p class="datenfeld">'.$objektarray['User_User_id'].'</p>
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