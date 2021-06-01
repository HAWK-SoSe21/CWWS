<?php 
    if (isset($_POST["submit"])){
        $Name = $_POST["Name"];
        $Kategorie = $_POST["Kategorie"];
        $Beschreibung = $_POST["Beschreibung"];
        $Laenge = $_POST["Laenge"];
        $Hoehe = $_POST["Hoehe"];
        $Breite = $_POST["Breite"];
        #$Bild = file_get_contents($_FILES['Bild']['tmp_name']);

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if (emptyInputLagerplatzanlegen($Name,$Kategorie,$Beschreibung,$Laenge,$Hoehe,$Breite)!==false){
            header("location ../storage.php?error=emptyinput");
            exit();
        }

        Lagerplatzanlegen($conn,$Name,$Kategorie,$Beschreibung,$Laenge,$Hoehe,$Breite);

    }
    else{
        header("location: ../storage.php");
        exit();
    }
?>