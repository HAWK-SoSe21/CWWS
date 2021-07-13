<!-- Max Recke -->
<h3>Artikel einlagern/entnehmen</h3>

<form action="<?= WEBROOT?><?= UV ?>PHP/sub_artikelanlegen.inc.php" method="post" enctype="multipart/form-data">

    <label class="datenheader" for="Articel_Articel_id">Artikel:</label>
    <select name="Articel_Articel_id">
        <?php foreach (getarticles() as $key => $article): ?>
            <option value="<?= $article->Articel_id ?>"><?= $article->articel_name ?></option>
        <?php endforeach; ?>
    </select>

    <label class="datenheader" for="Substorage_mobile_id">in:</label>
    <select name="Substorage_mobile_id">
        <?php foreach (getmobilesubstorages() as $key => $mobilesubstorage): ?>
            <option value="<?= $mobilesubstorage->Substorage_mobile_id  ?>"><?= $mobilesubstorage->Substorage_mobile_name?></option>
        <?php endforeach; ?>
    </select>

    <label class="datenheader" for="Subarticel_quantity" >Anzahl einlagern/entnehmen:</label>
    <input class="datenfeld" id="Subarticel_quantity" type="number" step="1" name="Subarticel_quantity">
    
    <div class="buttonbar" style="display: flex;">
        
        <button type="submit" name="submit" style="margin-left:10px; padding: 5px;">einlagern/entnehmen</button>
        
        
        <button type="submit" name="clear" style="margin-left:10px; padding: 5px;">leer räumen</button>
        
        
        <button type="submit" name="temp" style="margin-left:10px; padding: 5px;">temporär entnehmen</button>
    </div>
    

</form>