<?php
    include_once '../phpheader.php';

    if(isset($_POST['submit'])) {
    
      $sql_props = "INSERT INTO `properties`(`Properties_name`, `Properties_description`) VALUES ('". $_POST['Substorage_fixed_name'] ."', '". $_POST['Substorage_fixed_description'] ."');";
      $propId = setData($sql_props);
      $sql_format = "INSERT INTO `format`(`Format_height`, `Format_width`, `Format_length`) VALUES ('". $_POST['Substorage_fixed_Format_height'] ."', '". $_POST['Substorage_fixed_Format_width'] ."', '". $_POST['Substorage_fixed_Format_length'] ."');";
      $formatId = setData($sql_format);
      $sql_fixed_substorage_yard = "INSERT INTO `substorage_yard_fixed`(`Substorage_fixed_category`,`Format_Format_id`,`Substorage_yard_Substorage_id`,`Properties_Properties_id`) VALUES ( '". $_POST['Substorage_fixed_category']."','". $formatId."', '". $_POST['Substorage_yard_Substorage_id']."','". $propId."')";
      $status = setData($sql_fixed_substorage_yard);

      if($status) {
          header('location: ../index.php?error=none');
        }
        else{
        header("location: ../index.php?error=stmtfailed");
        }
    }