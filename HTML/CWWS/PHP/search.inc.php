<?php
    #include_once '../phpheader.php';
    if (isset($_POST['suchen'])) {
        $searchq = $_POST['suchbegriff'];
        $sql = "SELECT *
                FROM articel
                WHERE articel.Properties_Properties_id IN (SELECT Properties_id FROM properties WHERE properties.Properties_name LIKE '%$searchq%')
                OR articel.aliase LIKE '$searchq'
                LIMIT 1";
        $searchresults = getData($sql);
        if(!$searchresults) {
          header("location: index.php?error=stmtfailed&msg=Your search keyword doesnt match any records !");
          return;
        }

        header('location: index.php?articleid=' . $searchresults->Articel_id);
    }
