<?php
    function regaleauflisten(){
        $con= mysqli_connect("localhost","root","","mydb");
        $db_res=mysqli_query($con, "SELECT * FROM raum");
        if(!$db_res){
            echo("konnte nicht laden");
        }
        else{
            echo("Datenbank gelesen");
            while($row=mysqli_fetch_array($db_res)){
                echo ('<p>Raum: '.$row['Raum_ID'].'</p>');
                echo ('<p>Fläche: '.$row['Lagerflaeche'].'m²</p>');
                echo ('<p>Regale: '.$row['Anzahl_Regale'].'</p><br>');
            }
        }
    }
                
?>