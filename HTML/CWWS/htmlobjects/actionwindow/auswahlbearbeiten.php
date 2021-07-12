<h3>Auswahl bearbeiten</h3>

    <!-- Lagerplatz -->
    <?php if(isset($_GET['storageid'])): ?>
     
     <form action="<?= WEBROOT?><?= UV ?>PHP/lagerplatzbearbeiten.inc.php" method="post" enctype="multipart/form-data">
     <input type="hidden" name="Storage_id" value="<?= $object->Storage_id ?>">

         <!-- Properties -->
         <label class="datenheader" for="Storage_name">Name:</label>
         <input class="datenfeld"  type="text" name="Storage_name" value="<?= $object->Storage_name ?>">

         <label class="datenheader" for="Storage_description">Beschreibung:</label>
         <input class="datenfeld" type="text" name="Storage_description" value="<?= $object->Storage_description ?>">
         
         <!-- Format -->
         <label class="datenheader">Länge: </label>
             <div class="datenfeld">
                 <input class="datenfeld" type="text" name="Storage_Format_length" value="<?= $object->Storage_Format_length ?>"><span> m</span>
             </div>
        <label class="datenheader">Breite: </label>
             <div class="datenfeld">
                 <input class="datenfeld" type="text" name="Storage_Format_width" value="<?= $object->Storage_Format_width ?>"><span> m</span>
             </div>
         <label class="datenheader" >Höhe: </label>
             <div class="datenfeld">
                 <input class="datenfeld" type="text" name="Storage_Format_height" value="<?= $object->Storage_Format_height ?>"><span> m</span>
             </div>

         <!-- Picture -->
         <label class="datenheader" for="Storage_picture">Bild:</label>
         <input class="datenfeld" type="file" name="Storage_picture" value="<?= $object->Storage_picture ?>">
         
         <label class="datenheader"> </label>
         <button type="submit" name="submit">bearbeiten</button>
         <br>
         <button type="submit" name="delete">löschen</button>

     </form>

    <!-- Möbel -->
    <?php elseif(isset($_GET['substorageid'])):?>


        <form action="<?= WEBROOT?><?= UV ?>PHP/sublagerplatzbearbeiten.inc.php" method="post" enctype="multipart/form-data">

            <input  type="hidden" name="Substorage_id" value="<?= $object->Substorage_id ?>">

            <label class="datenheader" for="Substorage_name">Name:</label>
            <input class="datenfeld"  type="text" name="Substorage_name" value="<?= $object->Substorage_name ?>">


            <label class="datenheader" for="Substorage_description">Beschreibung:</label>
            <input class="datenfeld" type="text" name="Substorage_description" value="<?= $object->Substorage_description ?>">

            <label class="datenheader" for="Substorage_category">Kategorie:</label>
            <select class="datenfeld" name="Substorage_category" id="Substorage_category">
                <option <?= "Schrank" == $object->Substorage_category ? 'selected' : ''  ?> value="Schrank">Schrank</option>
                <option <?= "Regal" == $object->Substorage_category ? 'selected' : ''  ?> value="Regal">Regal</option>
            </select>

            <label class="datenheader" for="Substorage_quantity" >Anzahl fester Sublagerplätze:</label>
            <input class="datenfeld" id="Substorage_quantity" type="number" min="0" name="Substorage_quantity" value="<?= $object->Substorage_quantity ?>">

            <label class="datenheader" for="Storage_yard_Storage_id">Raumzugehörigkeit:</label>
            <select name="Storage_yard_Storage_id">
                <?php foreach ($storages=getstorages() as $key => $storage): ?>
                <option <?= $storage->Storage_id == $object->Storage_yard_Storage_id ? 'selected' : ''  ?> value="<?= $storage->Storage_id ?>"><?= $storage->Storage_name ?></option>
                <?php endforeach; ?>
            </select>


            <label class="datenheader" for="Substorage_picture">Bild:</label>
            <input class="datenfeld" type="file" name="Substorage_picture">

            <label clas="datenheader"></label>
            <button type="submit" name="submit">bearbeiten</button>

            <label clas="datenheader"></label>
            <button type="submit" name="delete">löschen</button>

        </form>

    <!-- Substorage_fixed -->
    <?php elseif(isset($_GET['substoragefixedid'])): ?>
        <?php
            $sql = "SELECT *,
                            properties.Properties_name as Substorage_name,
                            properties.Properties_description as Substorage_description,
                            format.Format_height as Substorage_fixed_Format_height,
                            format.Format_width as Substorage_fixed_Format_width,
                            format.Format_length as Substorage_fixed_Format_length,
                            format.Format_volume as Substorage_fixed_volume
                    FROM    substorage_yard_fixed,
                            properties,
                            format
                    WHERE   substorage_yard_fixed.Properties_Properties_id = properties.Properties_id
                    AND     format.Format_id = substorage_yard_fixed.Format_Format_id
                    AND     Substorage_fixed_id = '" . $_GET['substoragefixedid'] . "'";
            $object = getData($sql);

        ?>
        <form action="<?= WEBROOT?><?= UV ?>PHP/sub_storage_fixed_update.inc.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="Substorage_fixed_id" value="<?= $object->Substorage_fixed_id ?>">
            <label class="datenheader" for="Substorage_fixed_name">Name:</label>
            <input class="datenfeld" id="Substorage_fixed_name" type="text" name="Substorage_fixed_name" value="<?=$object->Substorage_name?>">

            <label class="datenheader" for="Substorage_fixed_description">Beschreibung:</label>
            <input class="datenfeld" id="Substorage_fixed_description" type="text" name="Substorage_fixed_description" value="<?=$object->Substorage_description?>">

            <label class="datenheader" for="Substorage_fixed_category">Kategorie:</label>
            <select class="datenfeld" name="Substorage_fixed_category" id="Substorage_fixed_category">
                <option  <?= $object->Substorage_fixed_category == "Fach" ? "selected" : "" ?> value="Fach">Fach</option>
                <option <?= $object->Substorage_fixed_category == "Schublade" ? "selected" : "" ?> value="Schublade">Schublade</option>
            </select>

            <!-- Format -->
            <label class="datenheader">Länge: </label>
                <div class="datenfeld">
                    <input class="datenfeld" type="text" name="Substorage_fixed_Format_length" value="<?= $object->Substorage_fixed_Format_length ?>"><span> m</span>
                </div>
            <label class="datenheader">Breite: </label>
                <div class="datenfeld">
                    <input class="datenfeld" type="text" name="Substorage_fixed_Format_width" value="<?= $object->Substorage_fixed_Format_width ?>"><span> m</span>
                </div>
            <label class="datenheader" >Höhe: </label>
                <div class="datenfeld">
                    <input class="datenfeld" type="text" name="Substorage_fixed_Format_height" value="<?= $object->Substorage_fixed_Format_height ?>"><span> m</span>
                </div>

            <label class="datenheader" for="Substorage_yard_Substorage_id">Möbelzugehörigkeit:</label>
                <select class="datenfeld" class="" name="Substorage_yard_Substorage_id" id="Substorage_yard_Substorage_id">
                    <?php foreach (getsubstorages() as $key => $substorage): ?>
                                <option <?= $substorage->Substorage_id == $object->Substorage_yard_Substorage_id ? 'selected' : '' ?> value="<?= $substorage->Substorage_id ?>"><?= $substorage->Substorage_name ?></option>
                    <?php endforeach; ?>
                </select>
            
            <label class="datenheadr"></label>
            <button type="submit" name="submit">bearbeiten</button>

            <label class="datenheadr"></label>
            <button type="submit" name="delete">löschen</button>


        </form>

    <?php elseif(isset($_GET['articleid'])):?>

        <?php
            $sql = "SELECT  *, properties.Properties_name as Articel_name, properties.Properties_description as Articel_description
                FROM    articel, properties, format
                WHERE   articel.Properties_Properties_id = properties.Properties_id
                AND     format.Format_id = articel.Format_Format_id
                and     Articel_id = '" . $_GET['articleid'] . "'";
            $object = getData($sql);
        ?>

        <form action="<?= WEBROOT?><?= UV ?>PHP/artikelbearbeiten.inc.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="Articel_id" value="<?= $object->Articel_id ?>">

            <label class="datenheader" for="Articel_name">Name:</label>
            <input class="datenfeld"  type="text" name="Articel_name" value="<?= $object->Articel_name ?>">

            <label class="datenheader" for="Articel_description">Beschreibung:</label>
            <input class="datenfeld" type="text" name="Articel_description" value="<?= $object->Articel_description ?>">


            <label class="datenheader" for="Articel_format_height">Höhe:</label>
            <input class="datenfeld" type="number" step="0.01" min="0" name="Articel_format_height" value="<?= $object->Format_height ?>">


            <label class="datenheader" for="Articel_format_width">Breite:</label>
            <input class="datenfeld" type="number" step="0.01" min="0" name="Articel_format_width" value="<?= $object->Format_width ?>">


            <label class="datenheader" for="Articel_format_length">Länge:</label>
            <input class="datenfeld" type="number" step="0.01" min="0" name="Articel_format_length" value="<?= $object->Format_length ?>">


            <label class="datenheader" for="Articel_alias">Alias:</label>
            <input class="datenfeld" type="text" name="Articel_alias" value="<?= $object->aliase ?>">


            <label class="datenheader" for="Articel_expiry">Ablaufdatum:</label>
            <input class="datenfeld" type="date" name="Articel_expiry" value="<?= $object->Articel_expiry ?>">

            <label class="datenheader" for="Substorage_yard_Substorage_mobile_id">Beweglicher Lagerplatz:</label>
            <select name="Substorage_yard_Substorage_mobile_id">
                <?php foreach (getmobilesubstorages() as $key => $storage): ?>
                <option <?= $storage->Substorage_mobile_id == $object->Substorage_yard_Substorage_mobile_id ? 'selected' : ''  ?> value="<?= $storage->Substorage_mobile_id ?>"><?= $storage->Substorage_mobile_name ?></option>
                <?php endforeach; ?>
            </select>


            <label class="datenheader" for="Articel_picture">Bild:</label>
            <input class="datenfeld" type="file" name="Articel_picture">
        
            <label clas="datenheader"></label>
            <button type="submit" name="submit">bearbeiten</button>

            <label clas="datenheader"></label>
            <button type="submit" name="delete">löschen</button>
        </form>

    
    <?php elseif(isset($_GET['substoragemobileid'])): ?>

        <form action="<?= WEBROOT?><?= UV ?>PHP/sub_storage_mobile_update.inc.php" method="post" enctype="multipart/form-data">
        <input class="datenfeld" id="Substorage_mobile_id" type="hidden" name="Substorage_mobile_id" value="<?=$object->Substorage_mobile_id?>">
        
        <label class="datenheader" for="Substorage_mobile_name">Name:</label>
        <input class="datenfeld" id="Substorage_mobile_name" type="text" name="Substorage_mobile_name" value="<?=$object->Substorage_name?>">
        
        <label class="datenheader" for="Substorage_mobile_description">Beschreibung:</label>
        <input class="datenfeld" id="Substorage_mobile_description" type="text" name="Substorage_mobile_description"<?=$object->Substorage_description?>>

        <label class="datenheader" for="Substorage_mobile_category">Kategorie:</label>
        <select class="datenfeld" name="Substorage_mobile_category" id="Substorage_mobile_category">
            <option  <?= $object->Substorage_mobile_category == "Räume" ? "selected" : "" ?> value="Räume">Fach</option>
            <option <?= $object->Substorage_mobile_category == "Schränke" ? "selected" : "" ?> value="Schränke">Schublade</option>
        </select>

        <label class="datenheader" for="Format_length">Länge:</label>
        <input class="datenfeld" id="Format_length" type="number" step="0.01" min="0" name="Format_length" value="<?=$object->Format_length?>">
        
        <label class="datenheader" for="Format_width">Breite:</label>
        <input class="datenfeld" id="Format_width" type="number" step="0.01" min="0" name="Format_width" value="<?=$object->Format_width?>">
        
        <label class="datenheader" for="Format_height">Höhe:</label>
        <input class="datenfeld" id="Format_height" type="number" step="0.01" min="0" name="Format_height" value="<?=$object->Format_height?>">

        <label class="datenheader" for="Substorage_yard_Substorage_id">Möbelzugehörigkeit:</label>
            <select class="datenfeld" class="" name="Substorage_yard_Substorage_id" id="Substorage_yard_Substorage_id">
                <?php foreach (getsubstoragesfixed() as $key => $substorage): ?>
                    <option <?= $substorage->Substorage_fixed_id == $object->Substorage_yard_fixed_Substorage_fixed_id ? 'selected' : '' ?> value="<?= $substorage->Substorage_fixed_id ?>"><?= $substorage->Substorage_name ?></option>
                <?php endforeach; ?>
            </select>

        <label class="datenheader" for="Substorage_mobile_picture">Bild:</label>
        <input class="datenfeld" type="file" name="Substorage_mobile_picture" id="Substorage_fixed_picture">

        <label class="datenheader" for="Substorage_mobile_cover">Deckel:</label>
        <input class="datenfeld" id="Substorage_mobile_cover" type="checkbox" name="Substorage_mobile_cover" value="<?=$object->Substorage_mobile_cover?>">

        <label class="datenheadr"></label>
        <button type="submit" name="submit">bearbeiten</button>

        <label class="datenheadr"></label>
        <button type="submit" name="delete">löschen</button>


    </form>

    <?php else:?>


        <p>Kein Objekt ist zur Bearbeitung ausgewählt.</p>


    <?php endif?>
</div>