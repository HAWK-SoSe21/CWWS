<!-- Max Recke -->
<h3>Artikel anlegen</h3>
    <form action="<?= WEBROOT?><?= UV ?>PHP/artikelanlegen.inc.php" method="post" enctype="multipart/form-data">

        <label class="datenheader" for="Articel_name">Name:</label>
        <input class="datenfeld" id="Articel_name" type="text" name="Articel_name">

        <label class="datenheader" for="Articel_description" >Beschreibung:</label>
        <input class="datenfeld" id="Articel_description" type="text" name="Articel_description">

        <label class="datenheader" for="Articel_format_length">Länge:</label>
        <input class="datenfeld" type="number" step="0.01" min="0"  name="Articel_format_length" id="Articel_format_length">

        <label class="datenheader" for="Articel_format_width">Breite:</label>
        <input class="datenfeld" type="number" step="0.01" min="0"  name="Articel_format_width" id="Articel_format_width">

        <label class="datenheader" for="Articel_format_height">Höhe:</label>
        <input class="datenfeld" type="number" step="0.01" min="0" name="Articel_format_height"id="Articel_format_height">
        

        <label class="datenheader"  for="Articel_alias">Alias:</label>
        <input class="datenfeld" type="text" name="Articel_alias" id="Articel_alias">

        <label class="datenheader"  for="Articel_group_Articel_group_id">Artikelgruppe:</label>
        <select class="datenfeld" name="Articel_group_Articel_group_id" id="Articel_group_Articel_group_id">
                <option value="">keine Gruppe</option>
            <?php foreach ($articlegroup=getarticlegroups() as $key => $articlegroup): ?>
                <option value="<?= $articlegroup->Articel_group_id ?>"><?= $articlegroup->Articel_group_name ?></option>
            <?php endforeach; ?>
        </select>

        <label class="datenheader"  for="Articel_expiry">Ablaufdatum:</label>
        <input class="datenfeld" type="date" name="Articel_expiry" id="Articel_expiry">
   
        <label class="datenheader"  for="Articel_rotatable">drehbar:</label>
        <input class="datenfeld" type="checkbox" name="Articel_rotatable">

        <label class="datenheader"  for="Articel_stackable">stabelbar:</label>
        <input class="datenfeld" type="checkbox" name="Articel_stackable">

        <label class="datenheader"  for="Articel_fragile">zerbrechlich:</label>
        <input class="datenfeld" type="checkbox" name="Articel_fragile">

        <label class="datenheader" for="Articel_picture">Bild:</label>
        <input class="datenfeld" type="file" name="Articel_picture">

        <label class="datenheader"> </label>
        <button type="submit" name="submit">anlegen</button>

    </form>