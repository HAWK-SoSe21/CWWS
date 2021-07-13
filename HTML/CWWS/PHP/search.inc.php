<?php
#Max Recke
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
    // $sql = "SELECT *
    //         FROM properties
    //         WHERE Properties_name
    //         LIKE '{$searchq}' ";
            
    //         //  proarticel.Properties_Properties_id IN (SELECT Properties_id FROM properties WHERE properties.Properties_name LIKE '%$searchq%')
    //         //  OR articel.aliase LIKE '$searchq'
    //         //  LIMIT 1";
    // $searchresultsprop = getDatas($sql);
    // if(!$searchresultsprop) {
    //   $_SESSION["status"]="Hups! Da ist etwas schief gelaufen...";
    //   header('location: ../CWWS/index.php?error=0');
    //   exit();
    // }
    // else{

    //   echo "test";
    //   foreach($searchresultsprop as $prop){
    //     $sql = "SELECT *, properties.Properties_name as articel_name, properties.Properties_description as articel_description  FROM articel, properties WHERE articel.Properties_Properties_id =  {$prop->Properties_id}";
    //     $article = getData($sql);
    //     if($article){
    //       echo "artikel";
    //     }
    //     $sql = "SELECT *, properties.Properties_name as articel_group_name, properties.Properties_description as articel_group_description FROM articel_group, properties WHERE articel_group.Properties_Properties_id = {$prop->Properties_id}";
    //     $articlegroup = getData($sql);
    //     if($articlegroup){
    //       echo "artikelgruppe";
    //     }
    //   }
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
   
