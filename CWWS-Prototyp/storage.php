<?php include_once 'header.php';?>
 
    <div class="main">
        <div class="maingrid">
            <div class="sidebar">

            </div>
            <div class="contentgrid">
                <div class="mainbox">
                        <section class="lagerplatz-anlegen-form">
                            <h2>Lagerplatz anlegen</h2>
                            <form action="includes/lagerplatzanlegen.inc.php" method="post">
                                <input type="text" name="Kategorie" placeholder="Kategorie...">
                                <input type="text" name="Name" placeholder="Name...">
                                <input type="text" name="Beschreibung" placeholder="Beschreibung...">
                                <input type="text" name="Laenge" placeholder="Länge...">
                                <input type="text" name="Hoehe" placeholder="Höhe...">
                                <button type="submit"name="submit">Lagerplatz anlegen</button>
                            </form>
                            <?php
                            if(isset($_GET["error"])){
                                if($_GET["error"]=="emptyinput"){
                                    echo"<p>Fill in all fields!</p>";
                                }
                                else if($_GET["error"]=="stmtfailed"){
                                    echo"<p>Something went wrong, try again!</p>";
                                }
                                else if($_GET["error"]=="none"){
                                    echo"<p>Artikel wurde angelegt.</p>";
                                }
                            }
                            ?>
                        </section>
                    </div>
                    <div class="mainbox">
                            <section class="lagerplatz-bearbeiten-form">
                            <h2>Lagerplatz bearbeiten</h2>
                            <form action="includes/lagerplatzbearbeiten.inc.php" method="post">
                                <input type="text" name="Name" placeholder="zu bearbeiten...">    
                                <input type="text" name="Kategorie" placeholder="neue Kategorie...">
                                <input type="text" name="Beschreibung" placeholder="neue Beschreibung...">
                                <input type="text" name="Laenge" placeholder="neue Länge...">
                                <input type="text" name="Hoehe" placeholder="neue Höhe...">
                                <button type="submit"name="submit">Lagerplatz anlegen</button>
                            </form>
                            <?php
                            if(isset($_GET["error"])){
                                if($_GET["error"]=="emptyinput"){
                                    echo"<p>Fill in all fields!</p>";
                                }
                                else if($_GET["error"]=="stmtfailed"){
                                    echo"<p>Something went wrong, try again!</p>";
                                }
                                else if($_GET["error"]=="none"){
                                    echo"<p>Lagerplatz erfolgreich bearbeitet</p>";
                                }
                            }
                            ?>
                        </section>
                    </div>
                    <div class="mainbox">
                        <section class="artikel-anlegen-form">
                            <h2>Lagerplatz anlegen</h2>
                            <form action="includes/lagerplatzanlegen.inc.php" method="post">
                                <input type="text" name="Kategorie" placeholder="Kategorie...">
                                <input type="text" name="Name" placeholder="Name...">
                                <input type="text" name="Beschreibung" placeholder="Beschreibung...">
                                <input type="text" name="Laenge" placeholder="Länge...">
                                <input type="text" name="Hoehe" placeholder="Höhe...">
                                <button type="submit"name="submit">Lagerplatz anlegen</button>
                            </form>
                            <?php
                            if(isset($_GET["error"])){
                                if($_GET["error"]=="emptyinput"){
                                    echo"<p>Fill in all fields!</p>";
                                }
                                else if($_GET["error"]=="stmtfailed"){
                                    echo"<p>Something went wrong, try again!</p>";
                                }
                                else if($_GET["error"]=="none"){
                                    echo"<p>Artikel wurde angelegt.</p>";
                                }
                            }
                            ?>
                        </section>
                    </div><div class="mainbox">
                            <section class="lagerplatz-bearbeiten-form">
                            <h2>Lagerplatz bearbeiten</h2>
                            <form action="includes/lagerplatzbearbeiten.inc.php" method="post">
                                <input type="text" name="Name" placeholder="zu bearbeiten...">    
                                <input type="text" name="Kategorie" placeholder="neue Kategorie...">
                                <input type="text" name="Beschreibung" placeholder="neue Beschreibung...">
                                <input type="text" name="Laenge" placeholder="neue Länge...">
                                <input type="text" name="Hoehe" placeholder="neue Höhe...">
                                <button type="submit"name="submit">Lagerplatz anlegen</button>
                            </form>
                            <?php
                            if(isset($_GET["error"])){
                                if($_GET["error"]=="emptyinput"){
                                    echo"<p>Fill in all fields!</p>";
                                }
                                else if($_GET["error"]=="stmtfailed"){
                                    echo"<p>Something went wrong, try again!</p>";
                                }
                                else if($_GET["error"]=="none"){
                                    echo"<p>Lagerplatz erfolgreich bearbeitet</p>";
                                }
                            }
                            ?>
                        </section>
                    </div>
            </div>
            
        </div>
    </div>

<?php include_once 'footer.php';?>