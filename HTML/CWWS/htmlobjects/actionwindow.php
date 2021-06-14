<div class="content">
    <div class="mainbox">
        <h3>Lagerplatz anlegen</h3>
        <form action="php/lagerplatzanlegen.inc.php" class="" method="post" enctype="multipart/form-data">
            <label for="name">Name</label>
            <div class="">
            <input type="text" name="Storage_name">
            <div class="">
            <label for="name">Beschreibung</label>
            <input type="text" name="Storage_description">
            </div>
            <div class="">
            <label for="name">Kategorie</label>
            <input type="text" name="Storage_category">
            </div>
            <div class="">
            <label for="name">Bild</label>
            <input type="file" name="Storage_picture">
            </div>
            <div class="">
            <label for="name">Höhe</label>
            <input type="number" name="Storage_format_heigth">
            </div>
            <div class="">
            <label for="name">Breite</label>
            <input type="number" name="Storage_format_width">
            </div>
            <div class="">
            <label for="name">Länge</label>
            <input type="number" name="Storage_format_length">
            </div>
            <div class="">
            <label for="name">Möbel</label>
            <input type="text" name="Storage_furniture">
            </div>
            <button type="submit" name="submit">submit</button>
        </form>
    </div>
</div>
