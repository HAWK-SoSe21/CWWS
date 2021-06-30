<?php
    include_once '../phpheader.php';


if(isset($_POST['submit'])) {
    $sql = "SELECT * FROM articel WHERE aliase = '" . $_POST["Articel_alias"] . "'";
    if (getData($sql)) {
      header('location: ../index.php?error=stmtfailed&msg=There is another article with the same alais already added, please choose another alias !');
      return;
    }


    $target_dir = ROOT . "/uploads/articles/";
    $pictureUrl = "/uploads/articles/" . basename($_FILES["Articel_picture"]["name"]);
    $target_file = $target_dir . basename($_FILES["Articel_picture"]["name"]);
    $uploadedFilePath = move_uploaded_file($_FILES["Articel_picture"]["tmp_name"], $target_file);
    $authenticatedUserId = $_SESSION["userid"];
    $sql_props = "INSERT INTO `properties`(`Properties_name`, `Properties_description`) VALUES ('". $_POST['Articel_name'] ."', '". $_POST['Articel_description'] ."');";
    $propId = setData($sql_props);
    $sql_format = "INSERT INTO `format` (`Format_height`, `Format_width`, `Format_length`) VALUES ('". $_POST['Articel_format_height'] ."','". $_POST['Articel_format_width'] ."','". $_POST['Articel_format_length'] ."')";
    $formatId = setData($sql_format);
    $sql = "INSERT INTO `articel`(`Articel_picture`,`Properties_Properties_id`, `Articel_expiry`, `aliase`, `Format_Format_id`, `Substorage_yard_Substorage_mobile_id`) VALUES ('".$pictureUrl."', '". $propId."', '".$_POST["Articel_expiry"]. "', '".$_POST["Articel_alias"]. "', '" . $formatId . "', '".$_POST["Substorage_yard_Substorage_mobile_id"]. "')";
    $status = setData($sql);

    if($status) {
        header('location: ../index.php?error=none');
    }
    else{
        header("location: ../index.php?error=stmtfailed");
    }
}
