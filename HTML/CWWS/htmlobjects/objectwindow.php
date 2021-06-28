<h3>Objektfenster</h3>
<div id="objektfenster" class="mainbox">
    <?php if(isset($_GET['storageid'])):?>
        <?php
            $sql = "SELECT *, properties.Properties_name as Storage_name, properties.Properties_description as Storage_description, usage_statistics.Usage_statistics_last_modified as last_modified FROM storage_yard, properties, usage_statistics WHERE storage_yard.Properties_Properties_id = properties.Properties_id and storage_yard.Usage_statistics_idUsage_statistics = usage_statistics.Usage_statistics_id  and Storage_id = '" . $_GET['storageid'] . "'";
            $object = getData($sql);
        ?>

        <p class="datenheader">Name:</p><p class="datenfeld" id="selectedobject"><?=$object->Storage_name?></p>
        <p class="datenheader">ID:</p><p class="datenfeld"><?=$object->Storage_id?></p>
        <p class="datenheader">Beschreibung:</p><p class="datenfeld"><?=$object->Storage_description?></p>

        <p class="datenheader">Bearbeitet::</p><p class="datenfeld"><?=$object->last_modified?></p>
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

    <?php elseif(isset($_GET['fixedsubstorageid'])):?>
        <?php
            $sql = "SELECT *, properties.Properties_name as fixed_substorage_name, properties.Properties_description as fixed_substorage_description  FROM substorage_yard_fixed, properties WHERE substorage_yard_fixed.Properties_Properties_id = properties.Properties_id and Substorage_fixed_id = '" . $_GET['fixedsubstorageid'] . "'";
            $object = getData($sql);
        ?>

        <p class="datenheader">Name:</p><p class="datenfeld" id="selectedobject"><?=$object->fixed_substorage_name?></p>
        <p class="datenheader">ID:</p><p class="datenfeld"><?=$object->Substorage_fixed_id?></p>
        <p class="datenheader">Beschreibung:</p><p class="datenfeld"><?=$object->fixed_substorage_description?></p>
        <p class="datenheader">Kategorie:</p><p class="datenfeld"><?=$object->Substorage_fixed_category?></p>
        <p class="datenheader">SubLagerplatz Zugehörigkeit:</p><p class="datenfeld"><?=$object->Substorage_yard_Substorage_id?></p>

    <?php elseif(isset($_GET['articleid'])):?>
            <?php
                $sql = "SELECT * FROM articel WHERE Articel_Id = '" . $_GET['articleid'] . "'";
                $object = getData($sql);
            ?>

            <p class="datenheader">Name:</p><p class="datenfeld" id="selectedobject"><?=$object->Articel_name?></p>
            <p class="datenheader">ID:</p><p class="datenfeld"><?=$object->Articel_id?></p>
            <p class="datenheader">Beschreibung:</p><p class="datenfeld"><?=$object->Articel_description?></p>
            <p class="datenheader">Alias:</p><p class="datenfeld"><?=$object->Articel_alias?></p>
            <p class="datenheader">Maße:</p><p class="datenfeld"><?=$object->Articel_format_length?>m x <?=$object->Articel_format_width?>m x <?=$object->Articel_format_height?>m</p>
            <p class="datenheader">Ablaufdatum:</p><p class="datenfeld"><?=$object->Articel_expiry?></p>
            <p class="datenheader">Bild:</p>
            <img class="datenfeld" src="<?= UPLOADS_ROOT . ($object->Articel_picture ?? 'images/article.png') ?>" alt ="Image not found"  onerror="this.onerror=null;this.src='<?= UPLOADS_ROOT ?>images/article.png';">

    <?php else:?>

            <p>kein Objekt ausgewählt.</p>

    <?php endif?>
</div>
