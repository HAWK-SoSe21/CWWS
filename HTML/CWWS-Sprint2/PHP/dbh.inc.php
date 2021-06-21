<?php
    $servername = "localhost";
    $dBUsername = "root";
    $dBPassword = "";
    $dBName = "cwws_25052021";

    $conn = mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);

    if(!$conn){
        die("Connection failed: ".mysqli_connect_error());
    }
?>