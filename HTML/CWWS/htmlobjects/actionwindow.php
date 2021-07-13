<!-- Autoren: Daniel Weber -->
<div class="actab">
    <div class="acheader">
        <button class="actiontablinks">Funktionen</button>
    </div>
    <div class="dropdown">
    <button class="dropbtn">
        <div class="dropbtn-name">Anlegen</div> <ion-icon name="chevron-down-outline"></ion-icon></button>
    <div class="dropdown-content">
        <button class="actiontablinks" onclick="openfunction(event, 'lagerplatzanlegen')">Raum</button>
        <button class="actiontablinks" onclick="openfunction(event, 'sublagerplatzanlegen')">Möbel</button>
        <button class="actiontablinks" onclick="openfunction(event, 'festensublagerplatzanlegen')">Festen Sublagerplatz</button>
        <button class="actiontablinks" onclick="openfunction(event, 'beweglichensublagerplatzanlegen')">Beweglichen Sublagerplatz</button>
        <button class="actiontablinks" onclick="openfunction(event, 'artikelanlegen')">Artikel</button>
        <button class="actiontablinks" onclick="openfunction(event, 'artikelgruppeanlegen')">Artikelgruppe</button>
    </div>
    </div>
    <div class="actiontab">
        <button onclick="openfunction(event, 'bearbeiten')" class="actiontablinks">Bearbeiten</button>
        <button onclick="openfunction(event, 'artikeleinlagernentnehmen')" class="actiontablinks">Entnehmen/Einlagern</button>
    </div>
</div> 
<br>
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

<div id="artikelgruppeanlegen" class="actionwindow">
    <?php include_once ROOT."htmlobjects/actionwindow/artikelgruppeanlegen.php"?>
</div>

<div id="bearbeiten" class="actionwindow">
    <?php include_once ROOT."htmlobjects/actionwindow/auswahlbearbeiten.php"?>
</div>


