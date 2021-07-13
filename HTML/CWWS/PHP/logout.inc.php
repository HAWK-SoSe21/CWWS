<?php
//Autoren: Max Recke, PHP-Team
    session_start();
    session_unset();
    session_destroy();

    header("location: ../index.php");
    exit();
?>