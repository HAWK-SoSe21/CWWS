<h3>Raum anlegen</h3>

    <form action="<?= WEBROOT?><?= UV ?>PHP/lagerplatzanlegen.inc.php" method="post" enctype="multipart/form-data">

    <label class="datenheader" for="Storage_name" >Name:</label>
        <input class="datenfeld" id="Storage_name" type="text" name="Storage_name">

        <label class="datenheader" for="Storage_description" >Beschreibung:</label>
        <input class="datenfeld" id="Storage_description" type="text" name="Storage_description">

        <label class="datenheader" for="Storage_picture">Bild:</label>
        <input class="datenfeld" type="file" name="Storage_picture" id="Storage_picture">

        <label class="datenheader"></label>
        <button type="submit" name="submit">anlegen</button>


    </form>