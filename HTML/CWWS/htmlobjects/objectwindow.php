<!-- Autoren: Nick Heinemann, Max Recke -->
<h3>Objektfenster</h3>
<div id="objektfenster" class="mainbox">
    <!-- Lagerplatz -->
    <?php if(isset($_GET['storageid'])):?>
        <?php
            $sql = "SELECT *,
                            properties.Properties_name as Storage_name,
                            properties.Properties_description as Storage_description,
                            usage_statistics.Usage_statistics_number_of_accesses as usage_num_accesses,
                            usage_statistics.Usage_statistics_last_modified as usage_last_mod,
                            format.Format_height as Storage_Format_height,
                            format.Format_width as Storage_Format_width,
                            format.Format_length as Storage_Format_length,
                            format.Format_volume as Storage_volume
                    FROM    storage_yard,
                            properties,
                            usage_statistics,
                            format
                    WHERE   storage_yard.Properties_Properties_id = properties.Properties_id
                            AND storage_yard.Usage_statistics_idUsage_statistics = usage_statistics.Usage_statistics_id
                            AND storage_yard.Format_Format_id = format.Format_id
                            AND Storage_id = '" . $_GET['storageid'] . "'";
            $object = getData($sql);
        ?>

        <p class="datenheader">Name:</p><p class="datenfeld" id="selectedobject"><?=$object->Storage_name?></p>
        <p class="datenheader">Raum_ID:</p><p class="datenfeld"><?=$object->Storage_id?></p>
        <p class="datenheader">Beschreibung:</p><p class="datenfeld"><?=$object->Storage_description?></p>
        <p class="datenheader">Bearbeitet:</p><p class="datenfeld"><?=$object->Storage_last_modified?></p>
        <p class="datenheader">Von ID:</p><p class="datenfeld"><?=$object->user_User_id?></p>
        <p class="datenheader">Anzahl der Zugriffe:</p><p class="datenfeld"><?=$object->usage_num_accesses?></p>
        <p class="datenheader">letzter Zugriffe:</p><p class="datenfeld"><?=$object->usage_last_mod?></p>
        <p class="datenheader">L??nge:</p>
            <div class="datenfeld">
                <p class="datenfeld"><?=$object->Storage_Format_length?></p><span> m</span>
            </div>
        <p class="datenheader">Breite:</p>
            <div class="datenfeld">
                <p class="datenfeld"><?=$object->Storage_Format_width?></p><span> m</span>
            </div>
        <p class="datenheader">H??he:</p>
            <div class="datenfeld">
                <p class="datenfeld"><?=$object->Storage_Format_height?></p><span>m</span>
            </div>
        <p class="datenheader">Volumen:</p>
            <div class="datenfeld">
                <p class="datenfeld"><?=$object->Storage_volume?></p><span></span>
            </div>
        <p class="datenheader">Bild:</p><img class="datenfeld" src="<?= UPLOADS_ROOT . ($object->Storage_picture ?? 'images/storage.png')?>" alt ="Image not found" onerror="this.onerror=null;this.src='<?= UPLOADS_ROOT ?>images/storage.png';">


    <!-- M??bel -->
    <?php elseif(isset($_GET['substorageid'])):?>
        <?php
            $sql =  "SELECT     *,
                                properties.Properties_name as Substorage_name,
                                properties.Properties_description as Substorage_description,
                                last_modified.last_modified_datetime as last_modified_datetime,
                                last_modified.last_modified_user_id as last_modified_user_id
                    FROM        substorage_yard,
                                properties,
                                last_modified
                    WHERE       substorage_yard.Properties_Properties_id = properties.Properties_id
                                AND substorage_yard.last_modified_last_modified_id = last_modified.last_modified_id
                                AND Substorage_id = '" . $_GET['substorageid'] . "'";
            $object = getData($sql);
        ?>

        <p class="datenheader">Name:</p><p class="datenfeld" id="selectedobject"><?=$object->Substorage_name?></p>
        <p class="datenheader">ID:</p><p class="datenfeld"><?=$object->Substorage_id?></p>
        <p class="datenheader">Beschreibung:</p><p class="datenfeld"><?=$object->Substorage_description?></p>
        <p class="datenheader">Kategorie:</p><p class="datenfeld"><?=$object->Substorage_category?></p>
        <p class="datenheader">Anzahl Sublagerpl??tze:</p><p class="datenfeld"><?=$object->Substorage_quantity?></p>
        <p class="datenheader">Lagerplatz Zugeh??rigkeit ID:</p><p class="datenfeld"><?=$object->Storage_yard_Storage_id?></p>
        <p class="datenheader">Bearbeitet:</p><p class="datenfeld"><?=$object->last_modified_datetime?></p>
        <p class="datenheader">Von ID:</p><p class="datenfeld"><?=$object->last_modified_user_id?></p>
        <p class="datenheader">Bild:</p><img class="datenfeld" src="<?= UPLOADS_ROOT . ($object->Substorage_picture ?? 'images/substorage.png') ?>"
                                    alt ="Image not found" onerror="this.onerror=null;this.src='<?= UPLOADS_ROOT ?>images/substorage.png';">


    <!-- Sub_fixed -->
    <?php elseif(isset($_GET['substoragefixedid'])):?>
        <?php
            $sql = "SELECT *,
                            properties.Properties_name as Substorage_name,
                            properties.Properties_description as Substorage_description,
                            format.Format_height as Substorage_fixed_Format_height,
                            format.Format_width as Substorage_fixed_Format_width,
                            format.Format_length as Substorage_fixed_Format_length,
                            format.Format_volume as Substorage_fixed_volume,
                            last_modified.last_modified_datetime as last_modified_datetime,
                            last_modified.last_modified_user_id as last_modified_user_id
                    FROM    substorage_yard_fixed,
                            properties,
                            format,
                            last_modified
                    WHERE   substorage_yard_fixed.Properties_Properties_id = properties.Properties_id
                    AND     format.Format_id = substorage_yard_fixed.Format_Format_id
                    AND     substorage_yard_fixed.last_modified_last_modified_id = last_modified.last_modified_id
                    AND     Substorage_fixed_id = '" . $_GET['substoragefixedid'] . "'";
            $object = getData($sql);

        ?>

        <p class="datenheader">Name:</p><p class="datenfeld" id="selectedobject"><?=$object->Substorage_name?></p>
        <p class="datenheader">ID:</p><p class="datenfeld"><?=$object->Substorage_fixed_id?></p>
        <p class="datenheader">Beschreibung:</p><p class="datenfeld"><?=$object->Substorage_description?></p>
        <p class="datenheader">Kategorie:</p><p class="datenfeld"><?=$object->Substorage_fixed_category?></p>
        <p class="datenheader">L??nge:</p>
            <div class="datenfeld">
                <p class="datenfeld"><?=$object->Substorage_fixed_Format_length?></p><span> m</span>
            </div>
        <p class="datenheader">Breite:</p>
            <div class="datenfeld">
                <p class="datenfeld"><?=$object->Substorage_fixed_Format_width?></p><span> m</span>
            </div>
        <p class="datenheader">H??he:</p>
            <div class="datenfeld">
                <p class="datenfeld"><?=$object->Substorage_fixed_Format_height?></p><span>m</span>
            </div>
        <p class="datenheader">Volumen:</p>
            <div class="datenfeld">
                <p class="datenfeld"><?=$object->Substorage_fixed_volume?></p><span></span>
            </div>
        <p class="datenheader">Bearbeitet:</p><p class="datenfeld"><?=$object->last_modified_datetime?></p>
        <p class="datenheader">Von ID:</p><p class="datenfeld"><?=$object->last_modified_user_id?></p>
        <p class="datenheader">M??belzugeh??rigkeit ID:</p><p class="datenfeld"><?=$object->Substorage_yard_Substorage_id?></p>
        <p class="datenheader">Zugeh??rige Artikel IDs:</p><p class="datenfeld"><?=$object->Articel_Articel_id?></p>
       
    <!-- Sub_mob -->
    <?php elseif(isset($_GET['substoragemobileid'])):?>
        <?php
            $sql = "SELECT *,
                            properties.Properties_name as Substorage_mobile_name,
                            properties.Properties_description as Substorage_mobile_description,
                            format.Format_height as Format_height,
                            format.Format_width as Format_width,
                            format.Format_length as Format_length,
                            format.Format_volume as Format_volume,
                            last_modified.last_modified_datetime as last_modified_datetime,
                            last_modified.last_modified_user_id as last_modified_user_id,
                            order.order_stackable as order_stackable,
                            order.order_rotateable as order_rotateable
                    FROM    substorage_yard_mobile,
                            properties,
                            format,
                            last_modified,
                            `order`
                    WHERE   properties.Properties_id = substorage_yard_mobile.Properties_Properties_id
                    AND     format.Format_id = substorage_yard_mobile.Format_Format_id
                    AND     last_modified.last_modified_id = substorage_yard_mobile.last_modified_last_modified_id
                    AND     order.order_id = substorage_yard_mobile.order_order_id
                    AND     Substorage_mobile_id = '" . $_GET['substoragemobileid'] . "'";
            $object = getData($sql);

        ?>

        <p class="datenheader">Name:</p><p class="datenfeld" id="selectedobject"><?=$object->Substorage_mobile_name?></p>
        <p class="datenheader">ID:</p><p class="datenfeld"><?=$object->Substorage_mobile_id?></p>
        <p class="datenheader">Beschreibung:</p><p class="datenfeld"><?=$object->Substorage_mobile_description?></p>
        <p class="datenheader">Kategorie:</p><p class="datenfeld"><?=$object->Substorage_mobile_category?></p>
        <p class="datenheader">L??nge:</p>
            <div class="datenfeld">
                <p class="datenfeld"><?=$object->Format_length?></p><span> m</span>
            </div>
        <p class="datenheader">Breite:</p>
            <div class="datenfeld">
                <p class="datenfeld"><?=$object->Format_width?></p><span> m</span>
            </div>
        <p class="datenheader">H??he:</p>
            <div class="datenfeld">
                <p class="datenfeld"><?=$object->Format_height?></p><span>m</span>
            </div>
        <p class="datenheader">Volumen:</p>
            <div class="datenfeld">
                <p class="datenfeld"><?=$object->Format_volume?></p><span></span>
            </div>

        <p class="datenheader">Deckel: </p><p class="datenfeld">
            <?php if($object->Substorage_mobile_cover == 0){echo "nein ";} else{echo "ja ";}?></p>
        <p class="datenheader">Stapelbar: </p><p class="datenfeld">
            <?php if($object->order_stackable == 0){echo "nein ";} else{echo "ja ";}?></p>
        <p class="datenheader">Rotierbar: </p><p class="datenfeld">
            <?php if($object->order_rotateable == 0){echo "nein ";} else{echo "ja ";}?></p>
        <p class="datenheader">an Platz gebunden: </p><p class="datenfeld">
            <?php if($object->Substorage_mobile_binding == 0){echo "nein ";} else{echo "ja ";}?></p>
        <p class="datenheader">temp. entnommen: </p><p class="datenfeld">
            <?php if($object->Substorage_mobile_extracted == 0){echo "nein ";} else{echo "ja ";}?></p>

        <p class="datenheader">Bearbeitet:</p><p class="datenfeld"><?=$object->last_modified_datetime?></p>
        <p class="datenheader">Von ID:</p><p class="datenfeld"><?=$object->last_modified_user_id?></p>
        <p class="datenheader">Zugeh??rigkeit-Fix ID:</p><p class="datenfeld"><?=$object->Substorage_yard_fixed_Substorage_fixed_id?></p>
        <p class="datenheader">Zugeh??rigkeit-Mobil ID:</p><p class="datenfeld"><?=$object->Substorage_yard_mobile_Substorage_mobile_id?></p>
        <p class="datenheader">Zugeh??rige Artikel IDs:</p><p class="datenfeld"><?=$object->Articel_Articel_id?></p>
       
    <!-- Artikel -->
    <?php elseif(isset($_GET['articleid'])):?>
        
        <?php
            $object= getarticlebyid($_GET['articleid']);
           
            if(!$object){
                $_SESSION["status"]="Artikel holen fail";
                echo $_SESSION["status"];
            }

            $sql_storages = "SELECT *,
                                    properties.Properties_name as Substorage_mobile_name,
                                    properties.Properties_description as Substorage_mobile_description
                            FROM    substorage_yard_mobile, properties
                            WHERE   substorage_yard_mobile.Properties_Properties_id = properties.Properties_id
                            AND     Articel_Articel_id  = {$_GET['articleid']}";
            $subStoragesMobile = getDatas($sql_storages);
        ?>

        <p class="datenheader">Name:</p>
        <p class="datenfeld" id="selectedobject"><?=$object->Articel_name?></p>

        <p class="datenheader">ID:</p>
        <p class="datenfeld"><?=$object->Articel_id?></p>

        <p class="datenheader">Beschreibung:</p>
        <p class="datenfeld"><?=$object->Articel_description?></p>

        <p class="datenheader">Ma??e:</p>
        <p class="datenfeld"><?=$object->Articel_length?>m x <?=$object->Articel_width?>m x <?=$object->Articel_height?>m</p>

        <p class="datenheader">Alias:</p>
        <p class="datenfeld"><?=$object->Articel_alias?></p>

        <p class="datenheader">gelagert in:</p>
        <p class="datenfeld"><?php foreach($subStoragesMobile as $subStorageMobile){echo "{$subStorageMobile->Substorage_mobile_name}, ";}?></p>

        <p class="datenheader">Gruppe:</p>
        <p class="datenfeld">geht noch nicht</p>

        <p class="datenheader">Anzahl:</p>
        <p class="datenfeld"><?=$object->Articel_quantity?></p>

        <p class="datenheader">Ablaufdatum:</p>
        <p class="datenfeld"><?=$object->Articel_expiry?></p>

        <p class="datenheader">User:</p>
        <p class="datenfeld"><?=$object->Articel_user_name?></p>

        <p class="datenheader">Anzahl Zugriffe:</p>
        <p class="datenfeld"><?=$object->Articel_number_of_accesses?></p>

        <p class="datenheader">letzter Zugriff:</p>
        <p class="datenfeld"><?=$object->Articel_last_modified?></p>

        <p class="datenheader">drehbar:</p>
        <p class="datenfeld"><?php if($object->Articel_rotateable === '0'){echo "nein ";} else{echo "ja ";}?></p>

        <p class="datenheader">stabelbar:</p>
        <p class="datenfeld"><?php if($object->Articel_stackable === '0'){echo "nein ";} else{echo "ja ";}?></p>

        <p class="datenheader">zerbrechlich:</p>
        <p class="datenfeld"><?php if($object->Articel_fragile === '0'){echo "nein ";} else{echo "ja ";}?></p>

        <p class="datenheader">Bild:</p>
        <img class="datenfeld" src="<?= UPLOADS_ROOT.($object->Articel_picture ?? 'images/article.png')?>" alt ="Image not found"  onerror="this.onerror=null;this.src='<?= UPLOADS_ROOT ?>images/article.png';">

    <?php elseif(isset($_GET['subarticleid'])):?>

        <p>subarticel <?= $_GET['subarticleid'] ?> ausgew??hlt</p>

    <?php elseif(isset($_GET['articlegroupid'])):?>

        <?php
            $object=getarticlegroupbyid($_GET['articlegroupid']);
           
            if(!$object){
                $_SESSION["status"]="Artikelgruppe holen fail";
                echo $_SESSION["status"];
            }
        ?>

        <p class="datenheader">Name:</p>
        <p class="datenfeld" id="selectedobject"><?=$object->Articel_group_name?></p>

        <p class="datenheader">ID:</p>
        <p class="datenfeld"><?=$object->Articel_group_id?></p>

        <p class="datenheader">Beschreibung:</p>
        <p class="datenfeld"><?=$object->Articel_group_description?></p> 
        
        <p class="datenheader">Bild:</p>
        <img class="datenfeld" src="<?= UPLOADS_ROOT.($object->Articel_group_picture ?? 'images/article.png')?>" alt ="Image not found"  onerror="this.onerror=null;this.src='<?= UPLOADS_ROOT ?>images/article.png';">
    
    <?php else:?>

        <?php if (isset($_GET['msg'])): ?>
          <?= $_GET['msg'] ?>
        <?php else: ?>
          <p>kein Objekt ausgew??hlt.</p>
        <?php endif; ?>

    <?php endif?>
</div>
