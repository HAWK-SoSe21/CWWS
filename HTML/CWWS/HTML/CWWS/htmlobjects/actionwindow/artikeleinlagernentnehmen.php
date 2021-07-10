<h3>Artikel einlagern/entnehmen</h3>

<form action="<?= WEBROOT?><?= UV ?>PHP/sub_artikelanlegen.inc.php" method="post" enctype="multipart/form-data">

    <label class="datenheader" for="article">Artikel:</label>
    <select name="Articel_Articel_id">
        <?php foreach (getarticles() as $key => $article): ?>
        <option value="<?= $article->Articel_id ?>"><?= $article->articel_name ?></option>
        <?php endforeach; ?>
    </select>

    <label class="datenheader" for="Subarticel_quantity" >Anzahl einlagern/entnehmen:</label>
    <input class="datenfeld" id="Subarticel_quantity" type="number" step="1" name="Subarticel_quantity">

    <label class="datenheader"></label>
    <button type="submit" name="submit">einlagern/entnehmen</button>

</form>