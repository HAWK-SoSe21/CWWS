<!-- Autoren: Nick Heinemann -->
<h3>festen Sublagerlatz anlegen</h3>
    <form action="<?= WEBROOT?><?= UV ?>PHP/sub_storage_fixed_save.inc.php" method="post" enctype="multipart/form-data">

        <!-- Properties -->
        <label class="datenheader" for="Substorage_fixed_name">Name:</label>
        <input class="datenfeld" id="Substorage_fixed_name" type="text" name="Substorage_fixed_name">

        <label class="datenheader" for="Substorage_fixed_description">Beschreibung:</label>
        <input class="datenfeld" id="Substorage_fixed_description" type="text" name="Substorage_fixed_description">

        <!-- Kategorie -->
        <label class="datenheader" for="Substorage_fixed_category">Kategorie:</label>
        <select class="datenfeld" name="Substorage_fixed_category" id="Substorage_fixed_category">
            <option value="Fach">Fach</option>
            <option value="Schublade">Schublade</option>
        </select>

        <!-- Format -->
        <label class="datenheader" for="Substorage_fixed_Format_length">Länge: </label>
            <div class="datenfeld" id="Storage_format" name="Storage_format"> 
                <input class="datenfeld" id="Substorage_fixed_Format_length" type="number" step="0.01" name="Substorage_fixed_Format_length"><span>m</span>
            </div>
        <label class="datenheader" for="Substorage_fixed_Format_width">Breite: </label>
            <div class="datenfeld" id="Storage_format" name="Storage_format"> 
                <input class="datenfeld" id="Substorage_fixed_Format_width" type="number" step="0.01" name="Substorage_fixed_Format_width"><span>m</span>
            </div>
        <label class="datenheader" for="Substorage_fixed_Format_height">Höhe: </label>
            <div class="datenfeld" id="Storage_format" name="Storage_format"> 
                <input class="datenfeld" id="Substorage_fixed_Format_height" type="number" step="0.01" name="Substorage_fixed_Format_height"><span>m</span>
            </div>

        <label class="datenheader" for="Substorage_yard_Substorage_id">Möbelzugehörigkeit:</label>
            <select class="datenfeld" name="Substorage_yard_Substorage_id" id="Substorage_yard_Substorage_id">
                <?php foreach ($subtorages=getsubstorages() as $key => $substorage): ?>
                            <option value="<?= $substorage->Substorage_id ?>"><?= $substorage->Substorage_name ?></option>
                <?php endforeach; ?>
            </select>

        <label class="datenheader"></label>
        <button type="submit" name="submit">anlegen</button>

    </form>