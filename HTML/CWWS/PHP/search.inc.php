<?php
//Autoren: Max Recke, PHP-Team
try{
   #include_once '../phpheader.php';
   if ((isset($_POST['suchen']) && !empty($_POST['suchbegriff']))){
      $searchqblank=$_POST['suchbegriff'];
      $searchq = "%{$_POST['suchbegriff']}%";
      $sql =  "SELECT *,properties.Properties_name as Articel_name 
              FROM articel, properties 
              WHERE properties.Properties_id = articel.Properties_Properties_id 
              AND properties.Properties_name LIKE '".$searchq."'";
      $articlesearchresults = getDatas($sql);
      
      
      $searchq = "%{$_POST['suchbegriff']}%";
      $sql =  "SELECT *,properties.Properties_name as Articel_group_name 
                FROM articel_group, properties 
                WHERE properties.Properties_id = articel_group.Properties_Properties_id 
                AND properties.Properties_name LIKE '".$searchq."'";
      $articlegroupsearchresults = getDatas($sql);
      
      if($articlesearchresults||$articlegroupsearchresults){
        $articlecount=count($articlesearchresults);
        $articlegroupcount=count($articlegroupsearchresults);
        $searchstatus = "{$articlecount} Artikel und {$articlegroupcount} Artikelgruppen gefunden";
      }
      else{
        $searchstatus = "keine Suchergebnisse";
      }
    }
    elseif((isset($_POST['suchen']) && empty($_POST['suchbegriff']))){
      $searchstatus="Suchbegriff fehlt";
    }
    

}
catch(Exception $e) {
  session_start();
  $_SESSION["status"]="Hups! Da ist etwas schief gelaufen... {$e->getMessage()}";
  header('location: ../CWWS/index.php?error=1');
}
   
