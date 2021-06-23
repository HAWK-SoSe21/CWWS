<select id="dropdown1" value="bearbeiten">
    <option value="bearbeiten">Auswahl bearbeiten</option>
    <option value="lagerplatzanlegen">Lagerplatz anlegen</option>
    <option value="sublagerplatzanlegen">Sublagerplatz anlegen</option>
    <option value="artikelanlegen">Artikel anlegen</option>

</select>
<div  class="mainbox">
    <div id="lagerplatzanlegen" class="actionwindow">

        <h3>Lagerplatz anlegen</h3>

        <form action="<?= WEBROOT?><?= UV ?>PHP/lagerplatzanlegen.inc.php" method="post" enctype="multipart/form-data">

            <label class="datenheader" for="Storage_description" >Beschreibung</label>
            <input class="datenfeld" id="Storage_description" type="text" name="Storage_description">


            <label class="datenheader" for="Storage_category">Kategorie</label>
                <select class="datenfeld" name="Storage_category" id="Storage_category">
                    <option value="Räume">Räume</option>
                    <option value="Schränke">Schränke</option>
                    <option value="Regale">Regale</option>
                    <option value="Boxen">Boxen</option>
                </select>

            <label class="datenheader" for="Storage_format_length">Länge</label>
            <input class="datenfeld" type="text" name="Storage_format_length" id="Storage_format_length">

            <label class="datenheader" for="Storage_format_width">Breite</label>
            <input class="datenfeld" type="text" name="Storage_format_width" id="Storage_format_width">

            <label class="datenheader" for="Storage_format_heigth">Höhe</label>
            <input class="datenfeld" type="text" name="Storage_format_heigth"id="Storage_format_heigth">

            <label class="datenheader" for="Format_Format_id">Formatvorlage</label>
                <select class="datenfeld" class="" name="Storage_yard_Storage_id" id="Storage_yard_Storage_id">
                    <?php foreach ($storages=getformates() as $key => $format): ?>
                                <option value="<?= $format->Format_id ?>"><?= $format->Format_length ?>m x <?= $format->Format_width ?>m x <?= $format->Format_height ?></option>
                    <?php endforeach; ?>
                </select>

            <label class="datenheader" for="Storage_furniture">Möbel</label>
            <input class="datenfeld" type="text" name="Storage_furniture" id="Storage_furniture">

            <label class="datenheader" for="Storage_picture">Bild</label>
            <input class="datenfeld" type="file" name="Storage_picture" id="Storage_picture">

            <button type="submit" name="submit">anlegen</button>

        </form>


    </div>
</div>

<div class="mainbox">
    <div  id="sublagerplatzanlegen" class="actionwindow">

        <h3>Sublagerplatz anlegen</h3>
        <form action="<?= WEBROOT?><?= UV ?>PHP/sublagerplatzanlegen.inc.php" method="post" enctype="multipart/form-data">

            <label class="datenheader" for="Substorage_name">Name</label>
            <input class="datenfeld" id="Substorage_name" type="text" name="Substorage_name">


            <label class="datenheader" for="Substorage_description" >Beschreibung</label>
            <input class="datenfeld" id="Substorage_description" type="text" name="Substorage_description">


            <label class="datenheader" for="Storage_yard_Storage_id">Lagerlatzzugehörigkeit</label>
                <select class="datenfeld" class="" name="Storage_yard_Storage_id" id="Storage_yard_Storage_id">
                    <?php foreach ($storages=getstorages() as $key => $storage): ?>
                                <option value="<?= $storage->Storage_id ?>"><?= $storage->Storage_name ?></option>
                    <?php endforeach; ?>
                </select>

            <label class="datenheader" for="Substorage_picture">Bild</label>
            <input class="datenfeld" type="file" name="Substorage_picture" id="Substorage_picture">

            <button type="submit" name="submit">anlegen</button>

        </form>
    </div>
</div>

<div class="mainbox">
    <div id="artikelanlegen" class="actionwindow">

        <h3>Artikel anlegen</h3>
        <form action="<?= WEBROOT?><?= UV ?>PHP/artikelanlegen.inc.php" method="post" enctype="multipart/form-data">

            <label class="datenheader" for="Articel_name">Name</label>
            <input class="datenfeld" id="Articel_name" type="text" name="Articel_name">


            <label class="datenheader" for="Articel_description" >Beschreibung</label>
            <input class="datenfeld" id="Articel_description" type="text" name="Articel_description">

            <label class="datenheader" for="Articel_format_height">Höhe</label>
            <input class="datenfeld" type="text" name="Articel_format_height"id="Articel_format_height">

            <label class="datenheader" for="Articel_format_width">Breite</label>
            <input class="datenfeld" type="text" name="Articel_format_width" id="Articel_format_width">


            <label class="datenheader" for="Articel_format_length">Länge</label>
            <input class="datenfeld" type="text" name="Articel_format_length" id="Articel_format_length">


            <label class="datenheader" for="Articel_picture">Bild</label>
            <input class="datenfeld" type="file" name="Articel_picture" id="Articel_picture">

            <label class="datenheader"  for="name">Pseudonym</label>
            <input class="datenfeld" type="text" name="Articel_alias" id="Articel_alias">

            <label class="datenheader"  for="Articel_expiry">Ablaufdatum</label>
            <input  class="datenfeld" type="date" name="Articel_expiry" id="Articel_expiry">

            <button type="submit" name="submit">anlegen</button>

        </form>
    </div>
</div>

<div class="mainbox">
    <div id="bearbeiten" class="actionwindow">
        <h3>Auswahl bearbeiten</h3>
        <?php if(isset($_GET['storageid'])): ?>


            <form action="<?= WEBROOT?><?= UV ?>PHP/lagerplatzbearbeiten.inc.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="Storage_id" value="<?= $object->Storage_id ?>">

                <label class="datenheader" for="Storage_name">Name</label>
                <input class="datenfeld"  type="text" name="Storage_name" value="<?= $object->Storage_name ?>">


                <label class="datenheader" for="Storage_description">Beschreibung</label>
                <input class="datenfeld" type="text" name="Storage_description" value="<?= $object->Storage_description ?>">


                <label class="datenheader" for="Storage_category">Kategorie</label>
                <select class="datenfeld" name="Storage_category">
                    <option <?= $object->Storage_category == 'Räume' ? 'selected' : ''  ?> value="Räume">Räume</option>
                    <option <?= $object->Storage_category == 'Schränke' ? 'selected' : ''  ?> value="Schränke">Schränke</option>
                    <option <?= $object->Storage_category == 'Regale' ? 'selected' : ''  ?> value="Regale">Regale</option>
                    <option <?= $object->Storage_category == 'Boxen' ? 'selected' : ''  ?> value="Boxen">Boxen</option>
                </select>

                <label class="datenheader" for="Storage_format_heigth">Höhe</label>
                <input class="datenfeld" type="text" name="Storage_format_heigth" value="<?= $object->Storage_format_heigth ?>">


                <label class="datenheader" for="Storage_format_width">Breite</label>
                <input class="datenfeld" type="text" name="Storage_format_width" value="<?= $object->Storage_format_width ?>">


                <label class="datenheader" for="Storage_format_length">Länge</label>
                <input class="datenfeld" type="text" name="Storage_format_length" value="<?= $object->Storage_format_length ?>">


                <label class="datenheader" for="Storage_furniture">Möbel</label>
                <input class="datenfeld" type="text" name="Storage_furniture" value="<?= $object->Storage_furniture ?>">

                <label class="datenheader" for="Storage_picture">Bild</label>
                <input class="datenfeld" type="file" name="Storage_picture" value="<?= $object->Storage_picture ?>">

                <button type="submit" name="submit">bearbeiten</button>
            </form>


        <?php elseif(isset($_GET['substorageid'])):?>


            <form action="<?= WEBROOT?><?= UV ?>PHP/sublagerplatzbearbeiten.inc.php" method="post" enctype="multipart/form-data">

                <input  type="hidden" name="Substorage_id" value="<?= $object->Substorage_id ?>">

                <label class="datenheader" for="Substorage_name">Name</label>
                <input class="datenfeld"  type="text" name="Substorage_name" value="<?= $object->Substorage_name ?>">


                <label class="datenheader" for="Substorage_description">Beschreibung</label>
                <input class="datenfeld" type="text" name="Substorage_description" value="<?= $object->Substorage_description ?>">

                <label for="Storage_yard_Storage_id">Lagerplatz</label>
                <select name="Storage_yard_Storage_id">
                    <?php foreach ($storages=getstorages() as $key => $storage): ?>
                    <option <?= $storage->Storage_id == $object->Storage_yard_Storage_id ? 'selected' : ''  ?> value="<?= $storage->Storage_id ?>"><?= $storage->Storage_name ?></option>
                    <?php endforeach; ?>
                </select>


                <label class="datenheader" for="Substorage_picture">Storage_picture</label>
                <input class="datenfeld" type="file" name="Substorage_picture" value="<?= $object->Substorage_picture ?>">

                <button type="submit" name="submit">bearbeiten</button>
            </form>


        <?php elseif(isset($_GET['articleid'])):?>


            <form action="<?= WEBROOT?><?= UV ?>PHP/artikelbearbeiten.inc.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="Articel_id" value="<?= $object->Articel_id ?>">

                <label class="datenheader" for="Articel_name">Name</label>
                <input class="datenfeld"  type="text" name="Articel_name" value="<?= $object->Articel_name ?>">

                <label class="datenheader" for="Articel_description">Beschreibung</label>
                <input class="datenfeld" type="text" name="Articel_description" value="<?= $object->Articel_description ?>">


                <label class="datenheader" for="Articel_format_height">Höhe</label>
                <input class="datenfeld" type="text" name="Articel_format_height" value="<?= $object->Articel_format_height ?>">


                <label class="datenheader" for="Articel_format_width">Breite</label>
                <input class="datenfeld" type="text" name="Articel_format_width" value="<?= $object->Articel_format_width ?>">


                <label class="datenheader" for="Articel_format_length">Länge</label>
                <input class="datenfeld" type="text" name="Articel_format_length" value="<?= $object->Articel_format_length ?>">


                <label class="datenheader" for="Articel_alias">Pseudonym</label>
                <input class="datenfeld" type="text" name="Articel_alias" value="<?= $object->Articel_alias ?>">


                <label class="datenheader" for="Articel_expiry">Ablaufdatum</label>
                <input class="datenfeld" type="date" name="Articel_expiry" value="<?= $object->Articel_expiry ?>">


                <label class="datenheader" for="Articel_picture">Bild</label>
                <input class="datenfeld" type="file" name="Articel_picture" value="<?= $object->Articel_picture ?>">

                <button type="submit" name="submit">bearbeiten</button>
            </form>


        <?php else:?>


            <p>Kein Objekt ist zur Bearbeitung ausgewählt.</p>


        <?php endif?>

    </div>
</div>


</div>
