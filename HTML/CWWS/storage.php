<?php include_once 'header.php';?>
 
            <div class="main">
                <div class="maingrid">
                    <div class="sidebar">
                      
                    </div>
                
                    <div class="content">
                        <div class="mainbox">
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
                                    <form action="includes/lagerplatzanlegen.inc.php" method="post" enctype="multipart/form-data">
                                        <input type="text" name="Name" placeholder="Name...">
                                        <input type="text" name="Kategorie" placeholder="Kategorie...">
                                        <input type="text" name="Beschreibung" placeholder="Beschreibung...">
                                        <input type="text" name="Laenge" placeholder="Länge...">
                                        <input type="text" name="Hoehe" placeholder="Höhe...">
                                        <input type="text" name="Breite" placeholder="Breite...">
                                        <p>Bild: </p><input type="file" name="Bild">
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
                                        else if($_GET["error"]=="none"){
                                            echo"<p>Lagerplatz wurde angelegt.</p>";
                                        }
                                    }
                                    ?>
                                </section> 
                            </div>
                            <div id="option2" class="group">
                                <section class="lagerplatz-bearbeiten-form">
                                    <h3>Lagerplatz bearbeiten</h3>
                                    <form action="includes/lagerplatzbearbeiten.inc.php" method="post">
                                    <input type="text" name="Name" placeholder="Name...">
                                        <input type="text" name="Kategorie" placeholder="Kategorie...">
                                        <input type="text" name="Beschreibung" placeholder="Beschreibung...">
                                        <input type="text" name="Laenge" placeholder="Länge...">
                                        <input type="text" name="Hoehe" placeholder="Höhe...">
                                        <input type="text" name="Breite" placeholder="Breite...">
                                        <p>Bild: </p><input type="file" name="Bild">
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
                                    <form action="includes/artikelanlegen.inc.php" method="post">
                                        <input type="text" name="Name" placeholder="Name...">
                                        <input type="text" name="Format" placeholder="Format...">
                                        <input type="text" name="Beschreibung" placeholder="Beschreibung...">
                                        <input type="text" name="Pseodonym" placeholder="Pseudonym...">
                                        <input type="text" name="Ablaufdatum" placeholder="Ablaufdatum...">
                                        <input type="text" name="Einlagezeitpunkt" placeholder="Einlagezeitpunkt...">
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
                                        else if($_GET["error"]=="none"){
                                            echo"<p>Artikel wurde angelegt.</p>";
                                        }
                                    }
                                    ?>
                                </section>
                            </div>
                            <div id="option4" class="group">
                                <section class="artikel-bearbeiten-form">
                                    <h3>Artikel bearbeiten</h3>
                                    <form action="includes/artikelbearbeiten.inc.php" method="post">
                                        <input type="text" name="Name" placeholder="Name...">
                                        <input type="text" name="Format" placeholder="Format...">
                                        <input type="text" name="Beschreibung" placeholder="Beschreibung...">
                                        <input type="text" name="Pseodonym" placeholder="Pseudonym...">
                                        <input type="text" name="Ablaufdatum" placeholder="Ablaufdatum...">
                                        <input type="text" name="Einlagezeitpunkt" placeholder="Einlagezeitpunkt...">
                                        <p>Bild: </p><input type="file" name="Bild">
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
                                        else if($_GET["error"]=="none"){
                                            echo"<p>Artikel erfolgreich bearbeitet</p>";
                                        }
                                    }
                                    ?>
                                </section>
                            </div>
                        </div>
                    </div>  
            </div>
            </div>
<?php include_once 'footer.php';?>