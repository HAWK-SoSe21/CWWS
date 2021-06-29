<select id="dropdown1" value="bearbeiten">
    
    <option value="bearbeiten">Auswahl bearbeiten</option>
    <option value="lagerplatzanlegen">Lagerplatz anlegen</option>
    <option value="sublagerplatzanlegen">Sublagerplatz anlegen</option>
    <option value="festensublagerplatzanlegen">festen Sublagerlatz anlegen</option>
    <option value="beweglichensublagerplatzanlegen">beweglichen Sublagerlatz anlegen</option>
    <option value="artikelanlegen">Artikel anlegen</option>
    <option value="artikeleinlagernentnehmen">Artikel einlagern/entnehmen</option>

</select>

<div id="lagerplatzanlegen" class="actionwindow">   
    <div  class="mainbox">

        <h3>Lagerplatz anlegen</h3>

        <form action="<?= WEBROOT?><?= UV ?>PHP/lagerplatzanlegen.inc.php" method="post" enctype="multipart/form-data">

            <label class="datenheader" for="Storage_name" >Name</label>
            <input class="datenfeld" id="Storage_name" type="text" name="Storage_name">

            <label class="datenheader" for="Storage_description" >Beschreibung</label>
            <input class="datenfeld" id="Storage_description" type="text" name="Storage_description">

            <label class="datenheader" for="Storage_Format_length">Länge: </label>
            <input class="datenfeld" id="Storage_Format_length" type="number" step="0.01" min="0" name="Storage_Format_length">
            
            <label class="datenheader" for="Storage_Format_width">Breite: </label>
            <input class="datenfeld" id="Storage_Format_width" type="number" step="0.01" min="0" name="Storage_Format_width">
            
            <label class="datenheader" for="Storage_Format_height">Höhe: </label>
            <input class="datenfeld" id="Storage_Format_height" type="number" step="0.01" min="0" name="Storage_Format_height">

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
                
            <label class="datenheader" for="Substorage_fixed_Format_length">Länge: </label>
            <input class="datenfeld" id="Substorage_fixed_Format_length" type="number" step="0.01" min="0" name="Substorage_fixed_Format_length">
            
            <label class="datenheader" for="Substorage_fixed_Format_width">Breite: </label>
            <input class="datenfeld" id="Substorage_fixed_Format_width" type="number" step="0.01" min="0" name="Substorage_fixed_Format_width">
            
            <label class="datenheader" for="Substorage_fixed_Format_height">Höhe: </label>
            <input class="datenfeld" id="Substorage_fixed_Format_height" type="number" step="0.01" min="0" name="Substorage_fixed_Format_height">
        
            
            <label class="datenheader" for="Substorage_yard_Substorage_id">Möbelzugehörigkeit</label>
                <select class="datenfeld" name="Substorage_yard_Substorage_id" id="Substorage_yard_Substorage_id">
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

      

            <label class="datenheader" for="Substorage_mobile_name">Name</label>
            <input class="datenfeld" id="Substorage_mobile_name" type="text" name="Substorage_mobile_name">


            <label class="datenheader" for="Substorage_mobile_description">Beschreibung</label>
            <input class="datenfeld" id="Substorage_mobile_description" type="text" name="Substorage_mobile_description">

            <label class="datenheader" for="Substorage_mobile_category">Kategorie</label>
            <select class="datenfeld" name="Substorage_mobile_category" id="Substorage_mobile_category">
                <option value="Karton">Karton</option>
                <option value="Kiste">Kiste</option>
            </select> 

            <label class="datenheader" for="Substorage_mobile_cover">Deckel</label>
            <input class="datenfeld" id="Substorage_mobile_cover" type="checkbox" name="Substorage_mobile_cover">
                
            <label class="datenheader" for="Substorage_mobile_Format_length">Länge:</label>
            <input class="datenfeld"  id="Substorage_mobile_Format_length" type="number" step="0.01" min="0" name="Substorage_mobile_Format_length">
            
            <label class="datenheader" for="Substorage_mobile_Format_width">Breite:</label>
            <input class="datenfeld"  id="Substorage_mobile_Format_width" type="number" step="0.01" min="0" name="Substorage_mobile_Format_width">
            
            <label class="datenheader" for="Substorage_mobile_Format_height">Höhe:</label>
            <input  class="datenfeld" id="Substorage_mobile_Format_height" type="number" step="0.01" min="0" name="Substorage_mobile_Format_height">
        

            <label class="datenheader" for="Substorage_yard_mobile_Substorage_fixed_id">liegt in festem Sublagerplatz</label>
                <select class="datenfeld" name="Substorage_yard_mobile_Substorage_fixed_id" id="Substorage_yard_fixed_Substorage_fixed_id">
                    <?php foreach ($fixedsubtorages=getfixedsubstorages() as $key => $fixedsubstorage): ?>
                        <option value="<?= $fixedsubstorage->Substorage_fixed_id ?>"><?= $fixedsubstorage->Substorage_fixed_name ?></option>
                    <?php endforeach; ?>
                </select>

            

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

            <label class="datenheader" for="Articel_format_length">Länge</label>
            <input class="datenfeld" type="number" step="0.01" min="0" name="Articel_format_length" id="Articel_format_length">
            
            <label class="datenheader" for="Articel_format_width">Breite</label>
            <input class="datenfeld" type="number" step="0.01" min="0" name="Articel_format_width" id="Articel_format_width">
            
            <label class="datenheader" for="Articel_format_height">Höhe</label>
            <input class="datenfeld" type="number" step="0.01" min="0" name="Articel_format_height"id="Articel_format_height">
            
            <label class="datenheader"  for="name">drehbar</label>
            <input class="datenfeld" type="checkbox" name="Articel_rotatable" id="Articel_alias">

            <label class="datenheader"  for="name">stabelbar</label>
            <input class="datenfeld" type="checkbox" name="Articel_stackable" id="Articel_alias">

            <label class="datenheader"  for="Articel_group_Articel_group_id">Artikelgruppe</label>
            <select class="datenfeld" name="Articel_group_Articel_group_id" id="Articel_group_Articel_group_id">
                        <option value="">keine Gruppe</option>
                    <?php foreach ($articlegroup=getarticlegroups() as $key => $articlegroup): ?>
                        <option value="<?= $articlegroup->Articel_group_id ?>"><?= $articlegroup->Articel_group_name ?></option>
                    <?php endforeach; ?>
                </select>

            <label class="datenheader"  for="Articel_expiry">Ablaufdatum</label>
            <input  class="datenfeld" type="date" name="Articel_expiry" id="Articel_expiry">

            <label class="datenheader" for="Articel_picture">Bild</label>
            <input class="datenfeld" type="file" name="Articel_picture" id="Articel_picture">

            <button type="submit" name="submit">anlegen</button>

        </form>
    </div>
</div>
<div id="artikeleinlagernentnehmen" class="actionwindow">
    <div class="mainbox">

        <h3>Artikel einlagern/entnehmen</h3>
        <form action="<?= WEBROOT?><?= UV ?>PHP/artikellagern.inc.php" method="post" enctype="multipart/form-data">

            <label class="datenheader"  for="Subarticel_Articel_Articel_id">Artikel</label>
            <select class="datenfeld" name="Subarticel_Articel_Articel_id" id="Subarticel_Articel_Articel_id">
                <option value="">Pflichtfeld</option>
                <?php foreach ($articles=getarticles() as $key => $article): ?>
                    <option value="<?= $article->Articel_id ?>"><?= $article->Articel_name ?></option>
                <?php endforeach; ?>
            </select>

            <label class="datenheader" for="Subarticel_binding">Lagerort</label>
            <select class="datenfeld" name="Subarticel_binding" id="Subarticel_binding">
                <?php foreach ($mobilesubstorages=getmobilesubstorages() as $key => $mobilesubstorage): ?>
                            <option value="<?= $mobilesubstorage->Substorage_mobile_id ?>"><?= $mobilesubstorage->Substorage_mobile_name ?></option>
                <?php endforeach; ?>
            </select>
            
            <label class="datenheader" for="Subarticel_quantity">Anzahl einlagern/entnehmen</label>
            <input class="datenfeld" type="number" step="1" name="Subarticel_quantity"id="Subarticel_quantity">

            <button type="submit" name="submit">einlagern/entnehmen</button>

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

                <label class="datenheader" for="Storage_format_height">Höhe</label>
                <input class="datenfeld" type="text" name="Storage_format_height" value="<?= $object->Storage_format_height ?>">


                <label class="datenheader" for="Storage_format_width">Breite</label>
                <input class="datenfeld" type="text" name="Storage_format_width" value="<?= $object->Storage_format_width ?>">


                <label class="datenheader" for="Storage_format_length">Länge</label>
                <input class="datenfeld" type="text" name="Storage_format_length" value="<?= $object->Storage_format_length ?>">


                <label class="datenheader" for="Storage_picture">Bild</label>
                <input class="datenfeld" type="file" name="Storage_picture" value="<?= $object->Storage_picture ?>">

                <button type="submit" name="submit">bearbeiten</button>
                <button type="submit" name="delete">löschen</button>
            </form>
            


        <?php elseif(isset($_GET['substorageid'])):?>


            <form action="<?= WEBROOT?><?= UV ?>PHP/sublagerplatzbearbeiten.inc.php" method="post" enctype="multipart/form-data">

                <label class="datenheader" for="Substorage_name">Name</label>
                <input class="datenfeld"  type="text" name="Substorage_name" value="<?= $object->Substorage_name ?>">


                <label class="datenheader" for="Substorage_description">Beschreibung</label>
                <input class="datenfeld" type="text" name="Substorage_description" value="<?= $object->Substorage_description ?>">


                <label class="datenheader" for="Substorage_yard__category">Kategorie</label>
                <select class="datenfeld" name="Substorage_yard_category" id="Substorage_yard_category">
                    <option <?= $object->Substorage_category == 'Schrank' ? 'selected' : ''  ?> value="Schrank">Schrank</option>
                    <option <?= $object->Substorage_category == 'Kiste' ? 'selected' : ''  ?>value="Kiste">Regal</option>
                </select> 


                <label for="Storage_yard_Storage_id">Lagerplatz</label>
                <select name="Storage_yard_Storage_id">
                    <?php foreach ($storages=getstorages() as $key => $storage): ?>
                    <option <?= $storage->Storage_id == $object->Storage_yard_Storage_id ? 'selected' : ''  ?> value="<?= $storage->Storage_id ?>"><?= $storage->Storage_name ?></option>
                    <?php endforeach; ?>
                </select>


                <label class="datenheader" for="Substorage_picture">Storage_picture</label>
                <input class="datenfeld" type="file" name="Substorage_picture" value="<?= $object->Substorage_picture ?>">

                <button type="submit" name="submit">bearbeiten</button>
                <button type="submit" name="delete">löschen</button>
            </form>

        
        <?php elseif(isset($_GET['fixedsubstorageid'])):?>

            <form action="<?= WEBROOT?><?= UV ?>PHP/festensublagerplatzbearbeiten.inc.php" method="post" enctype="multipart/form-data">

                <label class="datenheader" for="Substorage_fixed_name">Name</label>
                <input class="datenfeld"  type="text" name="Substorage_fixed_name" value="<?= $object->Substorage_fixed_name ?>">


                <label class="datenheader" for="Substorage_fixed_description">Beschreibung</label>
                <input class="datenfeld" type="text" name="Substorage_fixed_description" value="<?= $object->Substorage_fixed_description ?>">


                <label class="datenheader" for="Substorage_fixed_category">Kategorie</label>
                <select class="datenfeld" name="Substorage_fixed_category" id="Substorage_fixed_category">
                    <option <?= $object->Substorage_fixed_category == 'Fach' ? 'selected' : ''  ?> value="Fach">Fach</option>
                    <option <?= $object->Substorage_fixed_category == 'Schublade' ? 'selected' : ''  ?>value="Schublade">Schublade</option>
                </select> 

                <label class="datenheader" for="Substorage_fixed_format_height">Höhe</label>
                <input class="datenfeld" type="text" name="Substorage_fixed_format_height" value="<?= $object->format_height ?>">


                <label class="datenheader" for="Substorage_fixed_format_width">Breite</label>
                <input class="datenfeld" type="text" name="Substorage_fixed_format_width" value="<?= $object->format_width ?>">


                <label class="datenheader" for="Substorage_fixed_format_length">Länge</label>
                <input class="datenfeld" type="text" name="Substorage_fixed_format_length" value="<?= $object->format_length ?>">

                <label for="Substorage_yard_Substorage_id">Lagerplatz</label>
                <select name="Substorage_yard_Substorage_id">
                    <?php foreach ($substorages=getsubstorages() as $key => $substorage): ?>
                    <option <?= $substorage->Substorage_id == $object->Substorage_yard_Substorage_id ? 'selected' : ''  ?> value="<?= $substorage->Substorage_id ?>"><?= $substorage->Substorage_name ?></option>
                    <?php endforeach; ?>
                </select>

                <button type="submit" name="submit">bearbeiten</button>
                <button type="submit" name="delete">löschen</button>
            </form>
        
        
        <?php elseif(isset($_GET['mobilesubstorageid'])):?>

            <form action="<?= WEBROOT?><?= UV ?>PHP/beweglichensublagerplatzbearbeiten.inc.php" method="post" enctype="multipart/form-data">

            <label class="datenheader" for="Substorage_mobile_name">Name</label>
            <input class="datenfeld" id="Substorage_mobile_name" type="text" name="Substorage_mobile_name" value="<?= $object->Substorage_mobile_name ?>">


            <label class="datenheader" for="Substorage_mobile_description">Beschreibung</label>
            <input class="datenfeld" id="Substorage_mobile_description" type="text" name="Substorage_mobile_description" value="<?= $object->Substorage_mobile_description ?>">


            <label class="datenheader" for="Substorage_mobile_category">Kategorie</label>
            <select class="datenfeld" name="Substorage_mobile_category" id="Substorage_mobile_category">
                    <option <?= $object->Substorage_mobile_category == 'Box' ? 'selected' : ''  ?> value="Box">Box</option>
                    <option <?= $object->Substorage_mobile_category == 'Karton' ? 'selected' : ''  ?>value="Karton">Karton</option>
                </select> 

            <label class="datenheader" for="Substorage_mobile_cover">Deckel</label>
            <input class="datenfeld" id="Substorage_mobile_cover" type="checkbox" name="Substorage_mobile_cover" value="<?= $object->Substorage_mobile_cover ?>">
                
            <label class="datenheader" for="Substorage_mobile_Format_length">Länge:</label>
            <input class="datenfeld"  id="Substorage_mobile_Format_length" type="number" step="0.01" min="0" name="Substorage_mobile_Format_length" value="<?= $object->Substorage_mobile_Format_length ?>">
            
            <label class="datenheader" for="Substorage_mobile_Format_width">Breite:</label>
            <input class="datenfeld"  id="Substorage_mobile_Format_width" type="number" step="0.01" min="0" name="Substorage_mobile_Format_width" value="<?= $object->Substorage_mobile_Format_width ?>">
            
            <label class="datenheader" for="Substorage_mobile_Format_height">Höhe:</label>
            <input  class="datenfeld" id="Substorage_mobile_Format_height" type="number" step="0.01" min="0" name="Substorage_mobile_Format_height" value="<?= $object->Substorage_mobile_Format_height ?>">
        

            <label class="datenheader" for="Substorage_yard_fixed_Substorage_fixed_id">liegt in festem Sublagerplatz</label>
                <select class="datenfeld" name="Substorage_yard_fixed_Substorage_fixed_id" id="Substorage_yard_fixed_Substorage_fixed_id">
                    <?php foreach ($fixedsubtorages=getfixedsubstorages() as $key => $fixedsubstorage): ?>
                        <option <?= $fixedsubstorage->Substorage_fixed_id == $object->Substorage_yard_fixed_Substorage_fixed_id ? 'selected' : ''  ?> value="<?= $fixedsubstorage->Substorage_fixed_id ?>"><?= $fixedsubstorage->Substorage_fixed_name ?></option>
                    <?php endforeach; ?>
                </select>

                <button type="submit" name="submit">bearbeiten</button>
                <button type="submit" name="delete">löschen</button>
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


                <label class="datenheader" for="Articel_rotatable">drehbar</label>
                <input class="datenfeld" type="checkbox" name="Articel_rotatable" value="<?= $object->Articel_rotatable ?>">

                <label class="datenheader" for="Articel_stackable">stapelbar</label>
                <input class="datenfeld" type="checkbox" name="Articel_stackable" value="<?= $object->Articel_stackable ?>">


                <label class="datenheader" for="Articel_expiry">Ablaufdatum</label>
                <input class="datenfeld" type="date" name="Articel_expiry" value="<?= $object->Articel_expiry ?>">

                <label class="datenheader"  for="Articel_group_Articel_group_id">Artikelgruppe</label>
                <select class="datenfeld" name="Articel_group_Articel_group_id" id="Articel_group_Articel_group_id">
                        <option value="">keine Gruppe</option>
                    <?php foreach ($articlegroups=getarticlegroups() as $key => $articlegroup): ?>
                        <option <?= $articlegroup->Articel_group_id == $object->Articel_group_Articel_group_id ? 'selected' : ''  ?> value="<?= $articlegroup->Articel_group_id ?>"><?= $articlegroup->Articel_group_name ?></option>
                    <?php endforeach; ?>
                </select>


                <label class="datenheader" for="Articel_picture">Bild</label>
                <input class="datenfeld" type="file" name="Articel_picture" value="<?= $object->Articel_picture ?>">

                <button type="submit" name="submit">bearbeiten</button>
                <button type="submit" name="delete">löschen</button>
            </form>

            
        <?php elseif(isset($_GET['subarticleid'])):?>


            <form action="<?= WEBROOT?><?= UV ?>PHP/subartikelbearbeiten.inc.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="Articel_id" value="<?= $object->Articel_id ?>">

                <label class="datenheader" for="Articel_stackable">stapelbar</label>
                <input class="datenfeld" type="checkbox" name="Articel_stackable" value="<?= $object->Articel_stackable ?>">

                <label class="datenheader" for="Articel_expiry">Ablaufdatum</label>
                <input class="datenfeld" type="date" name="Articel_expiry" value="<?= $object->Articel_expiry ?>">

                <label class="datenheader"  for="Articel_group_Articel_group_id">Artikelgruppe</label>
                <select class="datenfeld" name="Articel_group_Articel_group_id" id="Articel_group_Articel_group_id">
                        <option value="">keine Gruppe</option>
                    <?php foreach ($articles=getarticles() as $key => $article): ?>
                        <option <?= $article->Articel_id == $object->Articel_Articel_id ? 'selected' : ''  ?> value="<?= $article->Articel_id ?>"><?= $article->Articel_name ?></option>
                    <?php endforeach; ?>
                </select>

                <label class="datenheader"  for="Subarticel_binding">Artikelgruppe</label>
                <select class="datenfeld" name="Subarticel_binding" id="Subarticel_binding">
                    <?php foreach ($mobilesubstorages=getmobilesubstorages() as $key => $mobilesubstorage): ?>
                        <option <?= $mobilesubstorage->Substorage_mobile_id == $object->Subarticel_binding ? 'selected' : ''  ?> value="<?= $mobilesubstorage->Substorage_mobile_id ?>"><?= $mobilesubstorage->Substorage_mobile_name ?></option>
                    <?php endforeach; ?>
                </select>

                <button type="submit" name="submit">bearbeiten</button>
                <button type="submit" name="delete">löschen</button>
            </form>
            


        <?php else:?>


            <p>Kein Objekt ist zur Bearbeitung ausgewählt.</p>


        <?php endif?>

        
    </div>
</div>

</div>
