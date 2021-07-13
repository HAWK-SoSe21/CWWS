<h3>Sublagerplatz anlegen</h3>
    <form action="<?= WEBROOT?><?= UV ?>PHP/sub_storage_mobile_save.inc.php" method="post" enctype="multipart/form-data">
        
        <!-- Properties -->
        <label class="datenheader" for="Substorage_mobile_name">Name</label>
        <input class="datenfeld" id="Substorage_mobile_name" type="text" name="Substorage_mobile_name">

        <label class="datenheader" for="Substorage_mobile_description">Beschreibung</label>
        <input class="datenfeld" id="Substorage_mobile_description" type="text" name="Substorage_mobile_description">

        <!-- Kategorie -->
        <label class="datenheader" for="Substorage_mobile_category">Kategorie</label>
        <select class="datenfeld" name="Substorage_mobile_category" id="Substorage_mobile_category">
            <option value="Karton">Karton</option>
            <option value="Kiste">Kiste</option>
        </select>

        <!-- Format -->
        <label class="datenheader" for="Format_length">Länge: </label>
            <div class="datenfeld" id="Storage_format" name="Storage_format"> 
                <input class="datenfeld" id="Format_length" type="number" step="0.01" name="Format_length"><span>m</span>
            </div>
        <label class="datenheader" for="Format_width">Breite: </label>
            <div class="datenfeld" id="Storage_format" name="Storage_format"> 
                <input class="datenfeld" id="Format_width" type="number" step="0.01" name="Format_width"><span>m</span>
            </div>
        <label class="datenheader" for="Format_height">Höhe: </label>
            <div class="datenfeld" id="Storage_format" name="Storage_format"> 
                <input class="datenfeld" id="Format_height" type="number" step="0.01" name="Format_height"><span>m</span>
            </div>

        <!-- Zugehörigkeit -->
        <label class="datenheader" for="Substorage_yard_fixed_Substorage_fixed_id">Zugehörigkeit-Fix:</label>
            <select class="datenfeld" class="" name="Substorage_yard_fixed_Substorage_fixed_id" id="Substorage_yard_fixed_Substorage_fixed_id">  
                <?php foreach (getsubstoragesfixed() as $key => $substorage): ?>
                            <option value="<?= $substorage->Substorage_fixed_id ?>"><?= $substorage->Substorage_name ?></option>
                <?php endforeach; ?>
            </select>
        <label class="datenheader" for="Substorage_yard_mobile_Substorage_mobile_id">Zugehörigkeit-Mobil</label>
            <select class="datenfeld" class="" name="Substorage_yard_mobile_Substorage_mobile_id" id="Substorage_yard_mobile_Substorage_mobile_id">
                <option value = '0' ></option>
                <?php foreach (getsubstoragesmobile() as $key => $substorage): ?>
                            <option value="<?= $substorage->Substorage_mobile_id ?>"><?= $substorage->Substorage_name ?></option>
                <?php endforeach; ?>
            </select>
        
        <!-- Order -->
        <label class="datenheader" for="order_stackable">stapelbar</label>
        <input class="datenfeld" id="order_stackable" type="checkbox" name="order_stackable" value=1>

        <label class="datenheader" for="order_rotateable">drehbar</label>
        <input class="datenfeld" id="order_rotateable" type="checkbox" name="order_rotateable" value=1>

        <!-- Deckel -->
        <label class="datenheader" for="Substorage_mobile_cover">Deckel</label>
        <input class="datenfeld" id="Substorage_mobile_cover" type="checkbox" name="Substorage_mobile_cover" value=1>

        <!-- Bindung -->
        <label class="datenheader" for="Substorage_mobile_binding">an Platz gebunden</label>
        <input class="datenfeld" id="Substorage_mobile_binding" type="checkbox" name="Substorage_mobile_binding" value=1>
        
        <!-- temp. entnommen -->
        <label class="datenheader" for="Substorage_mobile_extracted">temp. entnommen</label>
        <input class="datenfeld" id="Substorage_mobile_extracted" type="checkbox" name="Substorage_mobile_extracted" value=1>

        <label class="datenheader"></label>
       
        <button type="submit" name="submit">anlegen</button>

    </form>