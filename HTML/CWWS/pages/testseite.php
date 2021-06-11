<?php include_once '../header.php';?>

            <div class="main">
                <div class="maingrid">
                    
                
                    <div id="idsidebar" class="sidebar">
                        <ul>
                            <header>Funktionen</header>
                            <select id="dropdownlagerplaetze">
                                <option value="lagerplatz-anlegen">Lagerplatz anlegen</option>
                                <option value="lagerplatz-bearbeiten">Lagerplatz bearbeiten</option>
                                <option value="artikel-bearbeiten">Artikel anlegen</option>
                                <option value="artikel-bearbeiten">Artikel bearbeiten</option>
                            </select>
                            <li><a href="#">Lagerplatz anlegen</a></li> 
                            <li><a href="#">Lagerplatz berbeiten</a></li> 
                            <li><a href="#">Artikel anlegen</a></li> 
                            <li><a href="#">Artikel bearbeiten</a></li> 
                        </ul> 
                    </div>
                    
                    
                    <button id="sidebarbtn" class="sidebarbutton" onclick="togglesidebar()">></button>
                    
                    
                    
                    <div class="content">
                        
                        <div id="explorer" class="mainbox">
                                <h3>Explorer</h3>
                                
                                <div class="explorer">
                                    <div class="liste">
                                        <?php
                                            require_once ROOT.'/PHP/dbh.inc.php';
                                            require_once ROOT.'/PHP/functions.inc.php';
                                              
                                            explorerliste($conn);
                                        ?>
                                    </div>
                                </div>
                        </div>

                        <div id="funktionen" class="mainbox">
                            
                        <h3>Funktion auswählen</h3>
                                
                                <select id="dropdown1">
                                    <option value="option1">Lagerplatz anlegen</option>
                                    <option value="option2">Lagerplatz bearbeiten</option>
                                    <option value="option3">Artikel anlegen</option>
                                    <option value="option4">Artikel bearbeiten</option>
                                </select>
                            
                                <div id="option1" class="group">
                                    <section class="lagerplatz-anlegen-form">
                                        <h3>Lagerplatz anlegen</h3>
                                        <form action="<?php ROOT?>/CWWS/PHP/lagerplatzanlegen.inc.php" method="post" enctype="multipart/form-data">
                                            <input type="text" name="Storage_name" placeholder="Name...">
                                            <input type="text" name="Storage_category" placeholder="Kategorie...">
                                            <input type="text" name="Storage_description" placeholder="Beschreibung...">
                                            <input type="text" name="Storage_format_length" placeholder="Länge...">
                                            <input type="text" name="Storage_format_heigth" placeholder="Höhe...">
                                            <input type="text" name="Storage_format_width" placeholder="Breite...">
                                            <input type="text" name="Storage_furniture" placeholder="Möbel...">
                                            <input type="text" name="User_User_id" placeholder="User-ID">
                                            <p>Bild: </p><input type="file" name="Storage_picture">
                                            <button type="submit"name="submit">Lagerplatz anlegen</button>
                                        </form>
                                        <?php
                                        if(isset($_GET["error"])){
                                            if($_GET["error"]=="emptyinput"){
                                                echo"<p>Sie haben ein Feld ausgelassen.</p>";
                                            }
                                            else if($_GET["error"]=="stmtfailed"){
                                                echo"<p>Da ist etwas schief gelaufen.</p>";
                                            }
                                            else if($_GET["error"]=="none1"){
                                                echo"<p>Lagerplatz wurde angelegt.</p>";
                                            }
                                        }
                                        ?>
                                    </section> 
                                </div>

                                <div id="option2" class="group">
                                    <?php
                                        if(isset($_GET['ids'])) {
                                            $sql = "SELECT * FROM storage_yard WHERE Storage_id = '" . $_GET['ids'] . "'";
                                            $storage = getData($sql);
                                        }
                                    ?>
                                    <section class="lagerplatz-bearbeiten-form">
                                        <h3>Lagerplatz bearbeiten</h3>
                                        <form action="<?php ROOT?>/CWWS/PHP/lagerplatzbearbeiten.inc.php" method="post">
                                            <input type="hidden" name="Storage_id" value="<?php if(isset($storage)){echo $storage->Storage_id;} ?>">
                                        
                                            <label for="name">Name</label>
                                            <input type="text" name="Storage_name" value="<?php if(isset($storage)){echo $storage->Storage_name;} ?>">
                                        
                                            <label for="name">Beschreibung</label>
                                            <input type="text" name="Storage_description" value="<?php if(isset($storage)){echo $storage->Storage_description;} ?>">
                                        
                                            <label for="name">Kategorie</label>
                                            <input type="text" name="Storage_category" value="<?php if(isset($storage)){echo $storage->Storage_category;} ?>">
                                        
                                            <label for="name">Höhe</label>
                                            <input type="number" name="Storage_format_heigth" value="<?php if(isset($storage)){echo $storage->Storage_format_heigth;} ?>">
                                        
                                            <label for="name">Breite</label>
                                            <input type="number" name="Storage_format_width" value="<?php if(isset($storage)){echo $storage->Storage_format_width;} ?>">
                                        
                                            <label for="name">Länge</label>
                                            <input type="number" name="Storage_format_length" value="<?php if(isset($storage)){echo $storage->Storage_format_length;} ?>">
                                        
                                            <label for="name">Möbel</label>
                                            <input type="text" name="Storage_furniture" value="<?php if(isset($storage)){echo $storage->Storage_furniture;} ?>">

                                            <label for="name">Bild</label>
                                            <img style="height: 100px; width: 200px" src="<?php if(isset($storage)){echo WEBROOT . $storage->Storage_picture;} ?>" alt="">
                                            <input type="file" name="Storage_picture" value="<?php if(isset($storage)){echo $storage->Storage_picture;} ?>">
                                            
                                            <button type="submit"name="submit">Lagerplatz bearbeiten</button>
                                        </form>
                                        <?php
                                        if(isset($_GET["error"])){
                                            if($_GET["error"]=="emptyinput"){
                                                echo"<p>Sie haben ein Feld ausgelassen.</p>";
                                            }
                                            else if($_GET["error"]=="stmtfailed"){
                                                echo"<p>Da ist etwas schief gelaufen.</p>";
                                            }
                                            else if($_GET["error"]=="none"){
                                                echo"<p>Lagerplatz erfolgreich bearbeitet</p>";
                                            }
                                        }
                                        ?>
                                    </section>
                                </div>

                                <div id="option3" class="group">
                                    <section class="artikel-anlegen-form">
                                        <h3>Artikel anlegen</h3>
                                        <form action="<?php ROOT?>/CWWS/PHP/artikelanlegen.inc.php" method="post">
                                            <input type="text" name="Articel_name" placeholder="Name...">
                                            <input type="text" name="Articel_alias" placeholder="Pseudonym...">
                                            <input type="text" name="Articel_description" placeholder="Beschreibung...">
                                            <input type="text" name="Articel_format_height" placeholder="Länge...">
                                            <input type="text" name="Articel_format_width" placeholder="Breite...">
                                            <input type="text" name="Articel_format_length" placeholder="Höhe...">
                                            <input type="text" name="Articel_expiry" placeholder="Ablaufdatum...">
                                            <p>Bild: </p><input type="file" name="Bild">
                                            <button type="submit"name="submit">Artikel anlegen</button>
                                        </form>
                                        <?php
                                        if(isset($_GET["error"])){
                                            if($_GET["error"]=="emptyinput"){
                                                echo"<p>Sie haben ein Feld ausgelassen.</p>";
                                            }
                                            else if($_GET["error"]=="stmtfailed"){
                                                echo"<p>Da ist etwas schief gelaufen.</p>";
                                            }
                                            else if($_GET["error"]=="none2"){
                                                echo"<p>Artikel wurde angelegt.</p>";
                                            }
                                            
                                        }
                                        ?>
                                    </section>
                                </div>

                                <div id="option4" class="group">
                                    <?php
                                        if(isset($_GET['ida'])) {
                                            $sql = "SELECT * FROM articel WHERE Articel_id = '" . $_GET['ida'] . "'";
                                            $article = getData($sql);
                                        }
                                    ?>
                                    <section class="artikel-bearbeiten-form">
                                        <h3>Artikel bearbeiten</h3>
                                        <form action="<?php ROOT?>/CWWS/PHP/artikelbearbeiten.inc.php" method="post">
                                            <label for="name">Name</label>
                                            <input type="text" name="Articel_name" value="<?php if(isset($article)){echo $article->Articel_name;} ?>">
                                            <label for="name">Pseudonym</label>
                                            <input type="text" name="Articel_alias" value="<?php if(isset($article)){echo $article->Articel_alias;} ?>">
                                            <label for="name">Beschreibung</label>
                                            <input type="text" name="Articel_description" value="<?php if(isset($article)){echo $article->Articel_description;} ?>">
                                            <label for="name">Länge</label>
                                            <input type="number" name="Articel_format_length" value="<?php if(isset($article)){echo $article->Articel_format_length;} ?>">
                                            <label for="name">Breite</label>
                                            <input type="number" name="Articel_format_width" value="<?php if(isset($article)){echo $article->Articel_format_width;} ?>">
                                            <label for="name">Höhe</label>
                                            <input type="number" name="Articel_format_height" value="<?php if(isset($article)){echo $article->Articel_format_height;} ?>">
                                            <label for="name">Ablaufdatum</label>
                                            <input type="date" name="Articel_expiry" value="<?php if(isset($article)){echo $article->Articel_expiry;} ?>">
                                            <label for="name">Bild</label>
                                            <img style="height: 100px; width: 200px" src="<?php if(isset($article)){echo  WEBROOT . $article->Articel_picture;} ?>" alt="">
                                            <input type="file" name="Articel_picture">
                                            <button type="submit"name="submit">Artikel bearbeiten</button>
                                        </form>
                                        <?php
                                        
                                        if(isset($_GET["error"])){
                                            if($_GET["error"]=="emptyinput"){
                                                echo"<p>Sie haben ein Feld ausgelassen.</p>";

                                            }
                                            else if($_GET["error"]=="stmtfailed"){
                                                echo"<p>Da ist etwas schief gelaufen.</p>";
                                            }
                                            else if($_GET["error"]=="none3"){
                                                echo"<p>Artikel erfolgreich bearbeitet</p>";
                                            }
                                        }
                                        ?>
                                    </section>
                                </div>

                        </div>
                        
                        <div id="objekte" class="mainbox">  
                            
                            <h3>Objektfenster</h3>
                            <div class="objektfenster">
                                <?php
                                    require_once ROOT.'/PHP/dbh.inc.php';
                                    require_once ROOT.'/PHP/functions.inc.php';
                                    $objektarray = mysqli_fetch_array(getlagerplatz($conn,"raum3"));
                                    echo '
                                        <p class="datenheader">Name:</p><p class="datenfeld">'.$objektarray['Storage_name'].'</p>
                                        <p class="datenheader">ID:</p><p class="datenfeld">'.$objektarray['Storage_id'].'</p>
                                        <p class="datenheader">Beschreibung:</p><p class="datenfeld">'.$objektarray['Storage_description'].'</p>
                                        <p class="datenheader">Kategorie:</p><p class="datenfeld">'.$objektarray['Storage_category'].'</p>
                                        <p class="datenheader">Maße:</p><p class="datenfeld">'.$objektarray['Storage_format_length'].'m x '.$objektarray['Storage_format_width'].'m x '.$objektarray['Storage_format_heigth'].'m</p>
                                        <p class="datenheader">Nutzerliste:</p><p class="datenfeld">'.$objektarray['User_User_id'].'</p>
                                        <p class="datenheader">Bild:</p><img class="datenfeld" src='.$objektarray['Storage_picture'].' alt ="images/lager.png"></img>   
                                    ';
                                ?>                                          
                            </div>
                        </div>

                        <div id="übersicht" class="mainbox">
                            <?php
                            
                                $sql = "SELECT * FROM storage_yard";
                                $Storages = getDatas($sql);
                            ?>    
                            

                            <table border="2">
                                <tr>
                                    <th>Fotos</th>
                                    <th>Lageplatz id</th>
                                    <th>Lageplatz Name</th>
                                    <th>Lageplatz Description</th>
                                    <th>Lagerplatzkategorie</th>
                                    <th>Lageplatz height</th>
                                    <th>Lageplatz width</th>
                                    <th>Lageplatz length</th>
                                    <th>Lageplatz furniture</th>
                                    <th>Actions</th>
                                </tr>
                                <?php foreach ($Storages as $Storag): ?>
                                <tr>
                                        <td>
                                        <img style="height: 70px; width: 70px" src="<?= WEBROOT . $Storag->Storage_picture ?>" alt="">
                                        </td>
                                        <td><?= $Storag->Storage_id ?></td>
                                        <td><?= $Storag->Storage_name ?></td>
                                        <td><?= $Storag->Storage_description ?></td>
                                        <td><?= $Storag->Storage_category ?></td>
                                        <td><?= $Storag->Storage_format_heigth ?></td>
                                        <td><?= $Storag->Storage_format_width ?></td>
                                        <td><?= $Storag->Storage_format_length ?></td>
                                        <td><?= $Storag->Storage_furniture ?></td>
                                        <td>
                                        <a href="<?= WEBROOT . '/pages/storages/edit.php?id=' . $Storag->Storage_id  ?>">Modifizieren</a>
                                        </td>
                                </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>    
                    </div>
                </div>     
            </div>

<?php include_once '../footer.php';?>