<h3>Möbel anlegen</h3>
    <form action="<?= WEBROOT?><?= UV ?>PHP/sublagerplatzanlegen.inc.php" method="post" enctype="multipart/form-data">
        <!-- Properties -->
        <label class="datenheader" for="Substorage_name">Name:</label>
        <input class="datenfeld" id="Substorage_name" type="text" name="Substorage_name">

        <label class="datenheader" for="Substorage_description" >Beschreibung:</label>
        <input class="datenfeld" id="Substorage_description" type="text" name="Substorage_description">


        <label class="datenheader" for="Substorage_category">Kategorie:</label>
        <select class="datenfeld" name="Substorage_category" id="Substorage_category">
            <option value="Schrank">Schrank</option>
            <option value="Regal">Regal</option>
        </select>

        <label class="datenheader" for="Substorage_quantity" >Anzahl Sublagerplätze:</label>
        <input class="datenfeld" id="Substorage_quantity" type="number" min="0" name="Substorage_quantity">

        <label class="datenheader" for="Storage_yard_Storage_id">LagerP.-Zugehörigkeit:</label>
            <select class="datenfeld" class="" name="Storage_yard_Storage_id" id="Storage_yard_Storage_id">
                <?php foreach ($storages=getstorages() as $key => $storage): ?>
                            <option value="<?= $storage->Storage_id ?>"><?= $storage->Storage_name ?></option>
                <?php endforeach; ?>
            </select>

        <label class="datenheader" for="Substorage_picture">Bild:</label>
        <input class="datenfeld" type="file" name="Substorage_picture" id="Substorage_picture">

        <label class="datenheader"></label>
        <button type="submit" name="submit">anlegen</button>
    </form>