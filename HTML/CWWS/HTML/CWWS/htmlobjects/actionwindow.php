<select id="dropdown1" value="bearbeiten">

<option value="bearbeiten">Auswahl bearbeiten</option>
    <option value="lagerplatzanlegen">Raum anlegen</option>
    <option value="sublagerplatzanlegen">Möbel anlegen</option>
    <option value="festensublagerplatzanlegen">festen Sublagerlatz anlegen</option>
    <option value="beweglichensublagerplatzanlegen">beweglichen Sublagerlatz anlegen</option>
    <option value="artikelanlegen">Artikel anlegen</option>
    <option value="artikeleinlagernentnehmen">Artikel einlagern/entnehmen</option>

</select>

<div id="lagerplatzanlegen" class="actionwindow">
    <?php include_once ROOT."htmlobjects/actionwindow/lagerplatzanlegen.php";?>
</div>

<div id="sublagerplatzanlegen" class="actionwindow">
    <?php include_once ROOT."htmlobjects/actionwindow/sublagerplatzanlegen.php"?>
</div>

<div id="festensublagerplatzanlegen" class="actionwindow">
    <?php include_once ROOT."htmlobjects/actionwindow/festensublagerplatzanlegen.php"?>
</div>

<div id="beweglichensublagerplatzanlegen" class="actionwindow">
    <?php include_once ROOT."htmlobjects/actionwindow/beweglichensublagerplatzanlegen.php"?>
</div>

<div id="artikelanlegen" class="actionwindow">
    <?php include_once ROOT."htmlobjects/actionwindow/artikelanlegen.php"?>
</div>

<div id="artikeleinlagernentnehmen" class="actionwindow">
    <?php include_once ROOT."htmlobjects/actionwindow/artikeleinlagernentnehmen.php"?>
</div>

<div id="bearbeiten" class="actionwindow">
    <?php include_once ROOT."htmlobjects/actionwindow/auswahlbearbeiten.php"?>
</div>
