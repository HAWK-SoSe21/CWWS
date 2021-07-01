<h3>Sublagerplatz anlegen</h3>
    <form action="<?= WEBROOT?><?= UV ?>PHP/sub_storage_mobile_save.inc.php" method="post" enctype="multipart/form-data">
    <label class="datenheader" for="Substorage_mobile_name">Name</label>
        <input class="datenfeld" id="Substorage_mobile_name" type="text" name="Substorage_mobile_name">


        <label class="datenheader" for="Substorage_mobile_description">Beschreibung</label>
        <input class="datenfeld" id="Substorage_mobile_description" type="text" name="Substorage_mobile_description">

        <label class="datenheader" for="Substorage_mobile_category">Kategorie</label>
        <select class="datenfeld" name="Substorage_mobile_category" id="Substorage_mobile_category">
            <option value="Karton">Karton</option>
            <option value="Kiste">Kiste</option>
        </select>

        <label class="datenheader" for="Format_length">Länge:</label>
        <input class="datenfeld"  id="Format_length" type="number" step="0.01" min="0" name="Format_length">

        <label class="datenheader" for="Format_width">Breite:</label>
        <input class="datenfeld"  id="Format_width" type="number" step="0.01" min="0" name="Format_width">

        <label class="datenheader" for="Format_height">Höhe:</label>
        <input  class="datenfeld" id="Format_height" type="number" step="0.01" min="0" name="Format_height">


        <label class="datenheader" for="Substorage_yard_Substorage_id">Möbelzugehörigkeit</label>
            <select class="datenfeld" class="" name="Substorage_yard_Substorage_id" id="Substorage_yard_Substorage_id">
                <?php foreach (getsubstoragesfixed() as $key => $substorage): ?>
                            <option value="<?= $substorage->Substorage_fixed_id ?>"><?= $substorage->Substorage_name ?></option>
                <?php endforeach; ?>
            </select>
        
        <label class="datenheader" for="Substorage_mobile_cover">Deckel</label>
        <input class="datenfeld" id="Substorage_mobile_cover" type="checkbox" name="Substorage_mobile_cover">


        <label class="datenheader"></label>

       
        <button type="submit" name="submit">anlegen</button>

    </form>