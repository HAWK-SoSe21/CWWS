<!-- Franck Guane Bi -->
<h3>Artikelgruppe anlegen</h3>
    <form action="<?= WEBROOT?><?= UV ?>PHP/artikelgruppeanlegen.inc.php" method="post" enctype="multipart/form-data">

        <label class="datenheader" for="Articel_group_name">Name:</label>
        <input class="datenfeld" id="Articel_group_name" type="text" name="Articel_group_name">

        <label class="datenheader" for="Articel_group_description" >Beschreibung:</label>
        <input class="datenfeld" id="Articel_group_description" type="text" name="Articel_group_description">

        <label class="datenheader" for="Articel_group_picture">Bild:</label>
        <input class="datenfeld" type="file" name="Articel_group_picture">

        <label class="datenheader"></label>
        <button type="submit" name="submit">anlegen</button>

    </form>