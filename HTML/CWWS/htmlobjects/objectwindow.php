<h3>Objektfenster</h3>
<div id="objektfenster" class="mainbox">
    <?php if(isset($_GET['storageid'])):?>
        <?php
            $sql = "SELECT *, properties.Properties_name as Storage_name, properties.Properties_description as Storage_description  FROM storage_yard, properties WHERE storage_yard.Properties_Properties_id = properties.Properties_id and Storage_id = '" . $_GET['storageid'] . "'";
            $object = getData($sql);
        ?>

        <p class="datenheader">Name:</p><p class="datenfeld" id="selectedobject"><?=$object->Storage_name?></p>
        <p class="datenheader">Raum_ID:</p><p class="datenfeld"><?=$object->Storage_id?></p>
        <p class="datenheader">Beschreibung:</p><p class="datenfeld"><?=$object->Storage_description?></p>

        <p class="datenheader">User_ID:</p><p class="datenfeld"><?=$object->User_User_id?></p>
        <p class="datenheader">Bild:</p><img class="datenfeld" src="<?= UPLOADS_ROOT . ($object->Storage_picture ?? 'images/storage.png')?>" alt ="Image not found" onerror="this.onerror=null;this.src='<?= UPLOADS_ROOT ?>images/storage.png';">



    <?php elseif(isset($_GET['substorageid'])):?>
        <?php
            $sql = "SELECT *, properties.Properties_name as Substorage_name, properties.Properties_description as Substorage_description  FROM substorage_yard, properties WHERE substorage_yard.Properties_Properties_id = properties.Properties_id and Substorage_id = '" . $_GET['substorageid'] . "'";
            $object = getData($sql);
        ?>

        <p class="datenheader">Name:</p><p class="datenfeld" id="selectedobject"><?=$object->Substorage_name?></p>
        <p class="datenheader">ID:</p><p class="datenfeld"><?=$object->Substorage_id?></p>
        <p class="datenheader">Beschreibung:</p><p class="datenfeld"><?=$object->Substorage_description?></p>
        <p class="datenheader">Kategorie:</p><p class="datenfeld"><?=$object->Substorage_category?></p>
        <p class="datenheader">Anzahl Sublagerplätze:</p><p class="datenfeld"><?=$object->Substorage_quantity?></p>
        <p class="datenheader">Lagerplatz Zugehörigkeit:</p><p class="datenfeld"><?=$object->Storage_yard_Storage_id?></p>
        <p class="datenheader">Bild:</p><img class="datenfeld" src="<?= UPLOADS_ROOT . ($object->Substorage_yard_picture ?? 'images/substorage.png') ?>" alt ="Image not found" onerror="this.onerror=null;this.src='<?= UPLOADS_ROOT ?>images/substorage.png';">

    

    <?php elseif(isset($_GET['substoragefixedid'])):?>
        <?php
            $sql = "SELECT *,
                            properties.Properties_name as Substorage_name,
                            properties.Properties_description as Substorage_description
                    FROM    substorage_yard_fixed, properties, format
                    WHERE   substorage_yard_fixed.Properties_Properties_id = properties.Properties_id
                    AND     format.Format_id = substorage_yard_fixed.Format_Format_id
                    AND     Substorage_fixed_id = '" . $_GET['substoragefixedid'] . "'";
            $object = getData($sql);

        ?>

        <p class="datenheader">Name:</p><p class="datenfeld" id="selectedobject"><?=$object->Substorage_name?></p>
        <p class="datenheader">ID:</p><p class="datenfeld"><?=$object->Substorage_fixed_id?></p>
        <p class="datenheader">Beschreibung:</p><p class="datenfeld"><?=$object->Substorage_description?></p>
        <p class="datenheader">Kategorie:</p><p class="datenfeld"><?=$object->Substorage_fixed_category?></p>
        <p class="datenheader">Höhe:</p><p class="datenfeld"><?=$object->Format_height?></p>
        <p class="datenheader">Breite:</p><p class="datenfeld"><?=$object->Format_width?></p>
        <p class="datenheader">Länge:</p><p class="datenfeld"><?=$object->Format_length?></p>
        <p class="datenheader">Möbelzugehörigkeit:</p><p class="datenfeld"><?=$object->Substorage_yard_Substorage_id?></p>
        <p class="datenheader">Bild:</p><img class="datenfeld" src="<?= UPLOADS_ROOT . ($object->Substorage_fixed_picture ?? 'images/substorage.png') ?>" alt ="Image not found" onerror="this.onerror=null;this.src='<?= UPLOADS_ROOT ?>images/substorage.png';">
    
        <?php elseif(isset($_GET['substoragemobileid'])):?>
        <?php
            $sql = "SELECT *,
                            properties.Properties_name as Substorage_name,
                            properties.Properties_description as Substorage_description
                    FROM    substorage_yard_mobile, properties, format
                    WHERE   substorage_yard_mobile.Properties_Properties_id = properties.Properties_id
                    AND     format.Format_id = substorage_yard_mobile.Format_Format_id
                    AND     Substorage_mobile_id = '" . $_GET['substoragemobileid'] . "'";
            $object = getData($sql);

        ?>

        <p class="datenheader">Name:</p><p class="datenfeld" id="selectedobject"><?=$object->Substorage_name?></p>
        <p class="datenheader">ID:</p><p class="datenfeld"><?=$object->Substorage_mobile_id?></p>
        <p class="datenheader">Beschreibung:</p><p class="datenfeld"><?=$object->Substorage_description?></p>
        <p class="datenheader">Kategorie:</p><p class="datenfeld"><?=$object->Substorage_mobile_category?></p>
        <p class="datenheader">Cover:</p><p class="datenfeld"><?=$object->Substorage_mobile_cover?></p>
        <p class="datenheader">Höhe:</p><p class="datenfeld"><?=$object->Format_height?></p>
        <p class="datenheader">Breite:</p><p class="datenfeld"><?=$object->Format_width?></p>
        <p class="datenheader">Länge:</p><p class="datenfeld"><?=$object->Format_length?></p>
        <p class="datenheader">Lagerplatz:</p><p class="datenfeld"><?=$object->Substorage_yard_fixed_Substorage_fixed_id?></p>
        <p class="datenheader">Bild:</p><img class="datenfeld" src="<?= UPLOADS_ROOT . ($object->Substorage_mobile_picture ?? 'images/substorage.png') ?>" alt ="Image not found" onerror="this.onerror=null;this.src='<?= UPLOADS_ROOT ?>images/substorage.png';">
    
    <?php elseif(isset($_GET['articleid'])):?>
    <?php
        $sql = "SELECT  *, properties.Properties_name as Articel_name,
                        properties.Properties_description as Articel_description,
                        (SELECT SUM(Subarticel_quantity) as Subarticel_quantity FROM subarticel WHERE Articel_Articel_id = articel.Articel_id) as quantity
                FROM    articel, properties, format
                WHERE   articel.Properties_Properties_id = properties.Properties_id
                AND     format.Format_id = articel.Format_Format_id
                and     Articel_id = '" . $_GET['articleid'] . "'";
        $object = getData($sql);

        $sql = "SELECT *,
                        properties.Properties_name as Substorage_name,
                        properties.Properties_description as Substorage_description
                FROM    substorage_yard_mobile, properties, format
                WHERE   substorage_yard_mobile.Properties_Properties_id = properties.Properties_id
                AND     format.Format_id = substorage_yard_mobile.Format_Format_id
                AND     Substorage_mobile_id = '" . $object->Substorage_yard_Substorage_mobile_id . "'";
        $subStorageMobile = getData($sql);
    ?>

        <p class="datenheader">Name:</p><p class="datenfeld" id="selectedobject"><?=$object->Articel_name?></p>
        <p class="datenheader">ID:</p><p class="datenfeld"><?=$object->Articel_id?></p>
        <p class="datenheader">Beschreibung:</p><p class="datenfeld"><?=$object->Articel_description?></p>
        <p class="datenheader">mobiler Lagerplatz:</p><p class="datenfeld"><?=$subStorageMobile->Substorage_name?></p>
        <p class="datenheader">Alias:</p><p class="datenfeld"><?=$object->aliase?></p>
        <p class="datenheader">Anzahl:</p><p class="datenfeld"><?=$object->quantity?></p>
        <p class="datenheader">Maße:</p><p class="datenfeld"><?=$object->Format_length?>m x <?=$object->Format_width?>m x <?=$object->Format_height?>m</p>
        <p class="datenheader">Ablaufdatum:</p><p class="datenfeld"><?=$object->Articel_expiry?></p>
        <p class="datenheader">Bild:</p>
        <img class="datenfeld" src="<?= UPLOADS_ROOT . ($object->Articel_picture ?? 'images/article.png') ?>" alt ="Image not found"  onerror="this.onerror=null;this.src='<?= UPLOADS_ROOT ?>images/article.png';"> 
    
    <?php elseif(isset($_GET['subarticleid'])):?>

        <p>subarticel <?= $_GET['subarticleid'] ?> ausgewählt</p>
        

    <?php else:?>

        <?php if (isset($_GET['msg'])): ?>
          <?= $_GET['msg'] ?>
        <?php else: ?>
          <p>kein Objekt ausgewählt.</p>
        <?php endif; ?>

    <?php endif?>
</div>
