<h3>festen Sublagerlatz anlegen</h3>
    <form action="<?= WEBROOT?><?= UV ?>PHP/sub_storage_fixed_save.inc.php" method="post" enctype="multipart/form-data">
    <label class="datenheader" for="Substorage_fixed_name">Name:</label>
        <input class="datenfeld" id="Substorage_fixed_name" type="text" name="Substorage_fixed_name">

        <label class="datenheader" for="Substorage_fixed_description">Beschreibung:</label>
        <input class="datenfeld" id="Substorage_fixed_description" type="text" name="Substorage_fixed_description">

        <label class="datenheader" for="Substorage_fixed_category">Kategorie:</label>
        <select class="datenfeld" name="Substorage_fixed_category" id="Substorage_fixed_category">
            <option value="Fach">Fach</option>
            <option value="Schublade">Schublade</option>
        </select>

        <label class="datenheader" for="Format_length">Länge: </label>
        <input class="datenfeld" id="Format_length" type="number" step="0.01" min="0" name="Format_length">

        <label class="datenheader" for="Format_width">Breite: </label>
        <input class="datenfeld" id="Format_width" type="number" step="0.01" min="0" name="Format_width">

        <label class="datenheader" for="Format_height">Höhe: </label>
        <input class="datenfeld" id="Format_height" type="number" step="0.01" min="0" name="Format_height">


        <label class="datenheader" for="Substorage_yard_Substorage_id">Möbelzugehörigkeit:</label>
            <select class="datenfeld" name="Substorage_yard_Substorage_id" id="Substorage_yard_Substorage_id">
                <?php foreach ($subtorages=getsubstorages() as $key => $substorage): ?>
                            <option value="<?= $substorage->Substorage_id ?>"><?= $substorage->Substorage_name ?></option>
                <?php endforeach; ?>
            </select>

        <label class="datenheader"></label>
        <button type="submit" name="submit">anlegen</button>

    </form>