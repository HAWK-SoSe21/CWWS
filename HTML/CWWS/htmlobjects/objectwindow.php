<h3>Objektfenster</h3>
<div class="objektfenster">
    <?php if(isset($_GET['storageid'])):?>
        <?php
            $sql = "SELECT * FROM storage_yard WHERE Storage_Id = '" . $_GET['storageid'] . "'";
            $object = getData($sql);
        ?> 

        <p class="datenheader">Name:</p><p class="datenfeld" id="selectedobject"><?=$object->Storage_name?></p>
        <p class="datenheader">ID:</p><p class="datenfeld"><?=$object->Storage_id?></p>
        <p class="datenheader">Beschreibung:</p><p class="datenfeld"><?=$object->Storage_description?></p>
        <p class="datenheader">Kategorie:</p><p class="datenfeld"><?=$object->Storage_category?></p>
        <p class="datenheader">Maße:</p><p class="datenfeld"><?=$object->Storage_format_length?>m x <?=$object->Storage_format_width?>m x <?=$object->Storage_format_heigth?>m</p>
        <p class="datenheader">Möbel:</p><p class="datenfeld"><?=$object->Storage_furniture?></p>
        <p class="datenheader">Nutzerliste:</p><p class="datenfeld"><?=$object->User_User_id?></p>
        <p class="datenheader">Bild:</p><img class="datenfeld" src="<?=$object->Storage_picture?>" alt ="Image not found" onerror="this.onerror=null;this.src='<?php WEBROOT ?>images/storage.png';">   
    
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
            <p class="datenheader">Bild:</p><img class="datenfeld" src="<?php WEBROOT ?>images/article.png" alt ="Image not found" onerror="this.onerror=null;this.src='<?php WEBROOT ?>images/article.png';">

            

    <?php elseif(isset($_GET['substorageid'])):?>
            <?php
            $sql = "SELECT * FROM substorage_yard WHERE Substorage_Id = '" . $_GET['substorageid'] . "'";
            $object = getData($sql);
            ?>

            <p class="datenheader">Name:</p><p class="datenfeld" id="selectedobject"><?=$object->Substorage_name?></p>
            <p class="datenheader">ID:</p><p class="datenfeld"><?=$object->Substorage_id?></p>
            <p class="datenheader">Beschreibung:</p><p class="datenfeld"><?=$object->Substorage_description?></p>
            <p class="datenheader">Lagerplatz:</p><p class="datenfeld"><?=$object->Storage_yard_Storage_id?></p>
            <p class="datenheader">Lagerplatz:</p><p class="datenfeld"><?=$object->Storage_yard_User_User_id?></p>
            <p class="datenheader">Bild:</p><img class="datenfeld" src="<?php WEBROOT ?>images/substorage.png" alt ="Image not found" onerror="this.onerror=null;this.src='<?php WEBROOT ?>images/substorage.png';">

    <?php else:?>

            <p>kein Objekt ausgewählt.</p>
            
    <?php endif?>
</div>