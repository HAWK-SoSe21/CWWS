<select id="dropdown1" value="bearbeiten">
    
    <option value="bearbeiten">Auswahl bearbeiten</option>
    <option value="lagerplatzanlegen">Lagerplatz anlegen</option>
    <option value="sublagerplatzanlegen">Sublagerplatz anlegen</option>
    <option value="festensublagerplatzanlegen">festen Sublagerlatz anlegen</option>
    <option value="beweglichensublagerplatzanlegen">beweglichen Sublagerlatz anlegen</option>
    <option value="artikelanlegen">Artikel anlegen</option>

</select>

<div id="lagerplatzanlegen" class="actionwindow">   
    <div  class="mainbox">

        <h3>Lagerplatz anlegen</h3>

        <form action="<?= WEBROOT?><?= UV ?>PHP/lagerplatzanlegen.inc.php" method="post" enctype="multipart/form-data">

            <label class="datenheader" for="Storage_name" >Name</label>
            <input class="datenfeld" id="Storage_name" type="text" name="Storage_name">

            <label class="datenheader" for="Storage_description" >Beschreibung</label>
            <input class="datenfeld" id="Storage_description" type="text" name="Storage_description">

            <label class="datenheader" for="Storage_format">neues Format</label>
            <div class="datenfeld" id="Storage_format" name="Storage_format"> 
                <label class="numinputlabel" for="Storage_Format_length">Länge: </label>
                <input class="numinput" id="Storage_Format_length" type="number" step="0.01" name="Storage_Format_length"><span>m</span>
                <label class="numinputlabel" for="Storage_Format_width">Breite: </label>
                <input class="numinput" id="Storage_Format_width" type="number" step="0.01" name="Storage_Format_width"><span>m</span>
                <label class="numinputlabel" for="Storage_Format_height">Höhe: </label>
                <input class="numinput" id="Storage_Format_height" type="number" step="0.01" name="Storage_Format_height"><span>m</span>
            </div>

            <label class="datenheader" for="Storage_picture">Bild</label>
            <input class="datenfeld" type="file" name="Storage_picture" id="Storage_picture">

            <button type="submit" name="submit">anlegen</button>

        </form>
    </div>
</div>

<div id="sublagerplatzanlegen" class="actionwindow">
    <div class="mainbox">

        <h3>Sublagerplatz anlegen</h3>
        <form action="<?= WEBROOT?><?= UV ?>PHP/sublagerplatzanlegen.inc.php" method="post" enctype="multipart/form-data">

            <label class="datenheader" for="Substorage_name">Name</label>
            <input class="datenfeld" id="Substorage_name" type="text" name="Substorage_name">


            <label class="datenheader" for="Substorage_description" >Beschreibung</label>
            <input class="datenfeld" id="Substorage_description" type="text" name="Substorage_description">

            <label class="datenheader" for="Substorage_category">Kategorie</label>
            <select class="datenfeld" name="Substorage_category" id="Substorage_category">
                <option value="Schrank">Schrank</option>
                <option value="Regal">Regal</option>
            </select> 

            <label class="datenheader" for="Substorage_quantity" >Anzahl Sublagerplätze</label>
            <input class="datenfeld" id="Substorage_quantity" type="number" min="0" name="Substorage_quantity">


            <label class="datenheader" for="Storage_yard_Storage_id">Lagerlatzzugehörigkeit</label>
                <select class="datenfeld" class="" name="Storage_yard_Storage_id" id="Storage_yard_Storage_id">
                    <?php foreach ($storages=getstorages() as $key => $storage): ?>
                                <option value="<?= $storage->Storage_id ?>"><?= $storage->Storage_name ?></option>
                    <?php endforeach; ?>
                </select>

            <label class="datenheader" for="Substorage_yard_picture">Bild</label>
            <input class="datenfeld" type="file" name="Substorage_yard_picture" id="Substorage_yard_picture">

            <button type="submit" name="submit">anlegen</button>

        </form>
    </div>
</div>


<div id="festensublagerplatzanlegen" class="actionwindow">
    <div class="mainbox">

        <h3>festen Sublagerplatz anlegen</h3>
        <form action="<?= WEBROOT?><?= UV ?>PHP/festensublagerplatzanlegen.inc.php" method="post" enctype="multipart/form-data">

            <label class="datenheader" for="Substorage_fixed_name">Name</label>
            <input class="datenfeld" id="Substorage_fixed_name" type="text" name="Substorage_fixed_name">

            <label class="datenheader" for="Substorage_fixed_description">Beschreibung</label>
            <input class="datenfeld" id="Substorage_fixed_description" type="text" name="Substorage_fixed_description">

            <label class="datenheader" for="Substorage_fixed_category">Kategorie</label>
            <select class="datenfeld" name="Substorage_fixed_category" id="Substorage_fixed_category">
                <option value="Fach">Fach</option>
                <option value="Schublade">Schublade</option>
            </select> 
                
            <label class="datenheader" for="Substorage_fixed_format">neues Format</label>
            <div class="datenfeld" id="Substorage_fixed_format" name="Substorage_fixed_format"> 
                <label class="numinputlabel" for="Substorage_fixed_Format_length">Länge: </label>
                <input class="numinput" id="Substorage_fixed_Format_length" type="number" step="0.01" name="Substorage_fixed_Format_length"><span>m</span>
                <label class="numinputlabel" for="Substorage_fixed_Format_width">Breite: </label>
                <input class="numinput" id="Substorage_fixed_Format_width" type="number" step="0.01" name="Substorage_fixed_Format_width"><span>m</span>
                <label class="numinputlabel" for="Substorage_fixed_Format_height">Höhe: </label>
                <input class="numinput" id="Substorage_fixed_Format_height" type="number" step="0.01" name="Substorage_fixed_Format_height"><span>m</span>
            </div>
            
            <label class="datenheader" for="Substorage_yard_Substorage_id">Möbelzugehörigkeit</label>
                <select class="datenfeld" class="" name="Substorage_yard_Substorage_id" id="Substorage_yard_Substorage_id">
                    <?php foreach ($subtorages=getsubstorages() as $key => $substorage): ?>
                                <option value="<?= $substorage->Substorage_id ?>"><?= $substorage->Substorage_name ?></option>
                    <?php endforeach; ?>
                </select>

            <button type="submit" name="submit">anlegen</button>

        </form>
    </div>
</div>

<div id="beweglichensublagerplatzanlegen" class="actionwindow">
    <div class="mainbox">

        <h3>Sublagerplatz anlegen</h3>
        <form action="<?= WEBROOT?><?= UV ?>PHP/beweglichensublagerplatzanlegen.inc.php" method="post" enctype="multipart/form-data">

      

            <label class="datenheader" for="Substorage_fixed_name">Name</label>
            <input class="datenfeld" id="Substorage_fixed_name" type="text" name="Substorage_fixed_name">


            <label class="datenheader" for="Substorage_fixed_description">Beschreibung</label>
            <input class="datenfeld" id="Substorage_fixed_description" type="text" name="Substorage_fixed_description">

            <label class="datenheader" for="Substorage_fixed_category">Kategorie</label>
            <select class="datenfeld" name="Substorage_fixed_category" id="Substorage_fixed_category">
                <option value="Karton">Karton</option>
                <option value="Kiste">Kiste</option>
            </select> 

            <label class="datenheader" for="Substorage_mobile_cover">Deckel</label>
            <input class="datenfeld" id="Substorage_mobile_cover" type="text" name="Substorage_mobile_cover">

            <label class="datenheader" for="Substorage_fixed_Format_Format_id">Formatvorlage</label>
                <select class="datenfeld" class="" name="Substorage_fixed_Format_Format_id" id="Substorage_fixed_Format_Format_id">
                <option value="">keine Vorlage</option>
                    <?php foreach ($formates=getformates() as $key => $format): ?>
                        <option value="<?= $format->Format_id ?>"><?= $format->Format_length ?>m x <?= $format->Format_width ?>m x <?= $format->Format_height ?></option>
                    <?php endforeach; ?>
                </select>
                
            <label class="datenheader" for="neuesformat">neues Format</label>
            <div class="datenfeld">
                <input type="checkbox" id="neuesformat" name="neuesformat" value="neuesformat"> 
                <label for="Format_length">Länge</label>
                <input id="Format_length" type="text" name="Format_length">
                <label for="Format_width">Breite</label>
                <input id="Format_width" type="text" name="Format_width">
                <label for="Format_height">Höhe</label>
                <input id="Format_height" type="text" name="Format_height">
            </div>

            <label class="datenheader" for="Substorage_yard_Substorage_id">Möbelzugehörigkeit</label>
                <select class="datenfeld" class="" name="Substorage_yard_Substorage_id" id="Substorage_yard_Substorage_id">
                    <?php foreach ($subtorages=getsubstorages() as $key => $substorage): ?>
                                <option value="<?= $substorage->Storage_id ?>"><?= $substorage->Storage_name ?></option>
                    <?php endforeach; ?>
                </select>

            <label class="datenheader" for="Substorage_fixed_picture">Bild</label>
            <input class="datenfeld" type="file" name="Substorage_fixed_picture" id="Substorage_fixed_picture">

            <button type="submit" name="submit">anlegen</button>

        </form>
    </div>
</div>

<div id="artikelanlegen" class="actionwindow">
    <div class="mainbox">

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



<div id="bearbeiten" class="actionwindow">
    <div class="mainbox">
        
        <h3>Auswahl bearbeiten</h3>
        <?php if(isset($_GET['storageid'])): ?>

            <form action="<?= WEBROOT?><?= UV ?>PHP/lagerplatzbearbeiten.inc.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="Storage_id" value="<?= $object->Storage_id ?>">

                <label class="datenheader" for="Storage_name">Name</label>
                <input class="datenfeld"  type="text" name="Storage_name" value="<?= $object->Storage_name ?>">


                <label class="datenheader" for="Storage_description">Beschreibung</label>
                <input class="datenfeld" type="text" name="Storage_description" value="<?= $object->Storage_description ?>">


                <label class="datenheader" for="Storage_picture">Bild</label>
                <input class="datenfeld" type="file" name="Storage_picture" value="<?= $object->Storage_picture ?>">

                <button type="submit" name="submit">bearbeiten</button>
                <button type="submit" name="delete">löschen</button>
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
