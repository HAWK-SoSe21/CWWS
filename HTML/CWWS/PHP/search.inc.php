<?php
    #include_once '../phpheader.php';
    if (isset($_POST['suchen'])){
        $searchq = $_POST['suchbegriff'];
        $searchq = preg_replace("#[^0-9a-z]#","",$searchq);

        $sql = "SELECT * FROM properties WHERE Properties_name LIKE '%$searchq%'";
        $searchresults= getDatas($sql);
        return $searchresults;
    }
    
    
?>