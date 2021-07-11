<h3>Raum anlegen</h3>

    <form action="<?= WEBROOT?><?= UV ?>PHP/lagerplatzanlegen.inc.php" method="post" enctype="multipart/form-data">

    <!-- Properties -->
    <label class="datenheader" for="Storage_name" >Name:</label>
    <input class="datenfeld" id="Storage_name" type="text" name="Storage_name">

    <label class="datenheader" for="Storage_description" >Beschreibung:</label>
    <input class="datenfeld" id="Storage_description" type="text" name="Storage_description">

    <!-- Format -->
    <label class="datenheader" for="Storage_Format_lengtht">Länge: </label>
        <div class="datenfeld" id="Storage_format" name="Storage_format"> 
            <input class="datenfeld" id="Storage_Format_length" type="number" step="0.01" name="Storage_Format_length"><span>m</span>
        </div>
    <label class="datenheader" for="Storage_Format_width">Breite: </label>
        <div class="datenfeld" id="Storage_format" name="Storage_format"> 
            <input class="datenfeld" id="Storage_Format_width" type="number" step="0.01" name="Storage_Format_width"><span>m</span>
        </div>
    <label class="datenheader" for="Storage_Format_height">Höhe: </label>
        <div class="datenfeld" id="Storage_format" name="Storage_format"> 
            <input class="datenfeld" id="Storage_Format_height" type="number" step="0.01" name="Storage_Format_height"><span>m</span>
        </div>

    <!-- Picture -->
    <label class="datenheader" for="Storage_picture">Bild:</label>
    <input class="datenfeld" type="file" name="Storage_picture" id="Storage_picture">

    <label class="datenheader"></label>
    <button type="submit" name="submit">anlegen</button>


    </form>