<?php
    include_once '../phpheader.php';


if(isset($_POST['submit'])) {
    $sql = "INSERT INTO `subarticel`(`Subarticel_quantity`, `Articel_Articel_id`) VALUES ('".$_POST["Subarticel_quantity"]. "', '".$_POST["Articel_Articel_id"]. "')";
    $status = setData($sql);

    if($status) {
        header('location: ../index.php?error=none');
    }
    else{
        header("location: ../index.php?error=stmtfailed");
    }
}
